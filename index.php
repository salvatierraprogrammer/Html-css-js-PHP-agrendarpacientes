<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inicio</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<!-- Iconos -->
<script src="https://kit.fontawesome.com/a7bca97345.js" crossorigin="anonymous"></script>

</head>
<body>
<?php
include "conf/conexion.php";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener los clientes
$sql = "SELECT * FROM cliente";
$result = $conn->query($sql);
?>

<div class="container">
    <br>
    <h2 class="d-flex justify-content-center">Clientes</h2><br>

    <div class="d-flex justify-content-center">
        <div class="row text-center">
        <div class="col-md-6 mb-4">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Agregar Nuevo Cliente</h5>
      <hr>
      <a href="view/cliente/create.php" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar</a>
    </div>
  </div>
</div>
            <?php
            // Verificar si hay clientes
            if ($result->num_rows > 0) {
                // Recorrer los resultados y mostrar la información del cliente en tarjetas
                while ($row = $result->fetch_assoc()) {
                    $idCliente = $row['id_cliente'];
                    $nombreCliente = $row['nombre_cliente'];
                    $apellidoCliente = $row['apellido_cliente'];
                    $cantidadPacientes = obtenerCantidadPacientes($conn, $idCliente);
                    
                    // Mostrar la tarjeta del cliente con la información obtenida
                    echo '<div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-user"></i> ' . $nombreCliente . ' ' . $apellidoCliente . '</h5>
                            <button type="button" class="btn btn-warning position-relative">                         
                                <i class="fas fa-user-friends"></i> Cantidad de Pacientes:
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                                    '. $cantidadPacientes . '
                                </span>
                                <span class="visually-hidden">unread messages</span>
                            </button>
                            <hr>
                            <a href="view/cliente/index.php?id=' . $idCliente . '" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Ingresar</a>
                        </div>
                    </div>
                </div>';
                }
            } else {
                // Si no hay clientes, mostrar un mensaje
                echo "<p>No se encontraron clientes.</p>";
            }

            // Función para obtener la cantidad de pacientes asociados a un cliente
            function obtenerCantidadPacientes($conn, $idCliente)
            {
                $sql = "SELECT COUNT(*) AS cantidad FROM paciente WHERE id_cliente = " . $idCliente;
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    return $row['cantidad'];
                }

                return 0;
            }
            ?>
        </div>
    </div>
</div>

<?php
// Cerrar la conexión
$conn->close();
?>
  <!-- Incluir los scripts de Bootstrap -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>