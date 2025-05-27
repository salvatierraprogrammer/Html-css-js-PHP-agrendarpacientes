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
include "../../conf/conexion.php";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$idCliente = $_GET['id']; // Obtener el ID del cliente desde el parámetro en la URL

// Realizar la consulta para obtener los datos del cliente
$sql = "SELECT * FROM cliente WHERE id_cliente = $idCliente";
$result = $conn->query($sql);

// Verificar si se encontró el cliente
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombreEmpresa = $row['nombre_empresa'];
    $nombreCliente = $row['nombre_cliente'];
    $apellidoCliente = $row['apellido_cliente'];
    $telefonoCliente = $row['telefono'];
    $emailCliente = $row['email_cliente'];
} else {
    echo "No se encontró el cliente.";
}

$conn->close();
?>
  <br>
<div class="container">

<?php
include "../../conf/conexion.php";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $idCliente = $_GET['id'];

    // Realizar la consulta para obtener los datos del cliente
    $sql = "SELECT * FROM cliente WHERE id_cliente = $idCliente";
    $result = $conn->query($sql);

    // Verificar si se encontró el cliente
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombreEmpresa = $row['nombre_empresa'];
        $nombreCliente = $row['nombre_cliente'];
        $apellidoCliente = $row['apellido_cliente'];
        $telefonoCliente = $row['telefono'];
        $emailCliente = $row['email_cliente'];
    } else {
        echo "No se encontró el cliente.";
    }
}

$conn->close();
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="d-flex justify-content-center">Datos del Cliente</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><i class="fas fa-building"></i> <strong>Nombre de la empresa:</strong> <?php echo $nombreEmpresa; ?></p>
                    <p><i class="fas fa-user"></i> <strong>Nombre del cliente:</strong> <?php echo $nombreCliente; ?></p>
                    <p><i class="fas fa-user"></i> <strong>Apellido del cliente:</strong> <?php echo $apellidoCliente; ?></p>
                </div>
                <div class="col-md-6">
                    <p><i class="fas fa-phone"></i> <strong>Teléfono:</strong> <?php echo $telefonoCliente; ?></p>
                    <p><i class="fas fa-envelope"></i> <strong>Correo electrónico:</strong> <?php echo $emailCliente; ?></p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-info" href="create.php">Volver</a>
        </div>
    </div>
</div>


  </div>
  <!-- Incluir los scripts de Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>