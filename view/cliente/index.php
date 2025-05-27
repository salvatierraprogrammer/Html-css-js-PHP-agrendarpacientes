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
  <br>
<div class="container">

	<div class="col">
  <div class="card-body">
	
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
    echo '<div class="row">';
    echo '<div class="col-md-6">';
    echo '<div class="card">';
echo '<div class="card-body">';
echo '<h2></h2>';
echo '<h2 class="card-text"><i class="fas fa-building"></i> ' . $nombreEmpresa . '</h2>';
echo '<p class="card-text"><i class="fas fa-user"></i> ' . $nombreCliente . ' ' . $apellidoCliente . '</p>';
echo '<p class="card-text"><i class="fas fa-phone"></i> ' . $telefonoCliente . '</p>';
echo '<p class="card-text"><i class="fas fa-envelope"></i> ' . $emailCliente . '</p>';
  


echo '<hr>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
     echo '</div>';
} else {
    echo '<div class="card-body">';
    echo '<h5 class="card-title">Equipo</h5>';
    echo '<p>No se encontró el cliente.</p>';
    echo '<hr>';
    echo '</div>';
}

$conn->close();
?>

</div>

        
<?php
include "../../conf/conexion.php";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$idCliente = $_GET['id']; // Obtener el ID del cliente desde el parámetro en la URL

// Realizar la consulta para obtener los pacientes del cliente específico
$sql = "SELECT * FROM paciente WHERE id_cliente = $idCliente";
$result = $conn->query($sql);

echo '<h2>Pacientes</h2>';
echo '<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#agregarModal">Agregar</button>';
echo '<div class="row">';

// Verificar si hay pacientes del cliente específico
if ($result->num_rows > 0) {
    // Recorrer los resultados y mostrar los datos de cada paciente
    while ($row = $result->fetch_assoc()) {
        $idPaciente = $row['id_paciente'];
        $nombre = $row['nombre'];
        $apellido = $row['apellido'];
        $direccion = $row['direccion'];

        echo '<div class="col-md-3 mb-4">';
        echo '<div class="card " >';
        echo '<img src="../../public/img/informes.png" class="card-img-top" alt="Imagen de paciente" width="96">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $nombre . ' ' . $apellido . '</h5>';
        echo '<p class="card-text">' . $direccion . '</p>';
        echo '<a href="../paciente/show.php?id=' . $idPaciente . '" class="btn btn-info btn-sm mb-2 me-2"><i class="fas fa-eye me-2"></i></a>';
        echo '<a href="../paciente/edit.php?id=' . $idPaciente . '" class="btn btn-warning btn-sm mb-2 me-2"><i class="fas fa-edit me-2"></i></a>';
        echo '<a href="../paciente/delete.php?id=' . $idPaciente . '" class="btn btn-danger btn-sm mb-2 me-2"><i class="fas fa-trash-alt me-2"></i></a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p>No se encontraron pacientes para este cliente.</p>';
}

echo '</div>';
echo '<hr>';

$conn->close();
?>
		

      </div>
    </div>
  </div>


  </div>
  <hr>

<br>
<div class="text-center">
    <?php
    echo '<button onclick="history.go(-1)" class="btn btn-primary">';
    echo '<i class="fas fa-arrow-left"></i> Volver';
    echo '</button>';
    ?>
</div>
<hr>

<br>







  <!-- Modal para agregar paciente -->
  <div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="agregarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <!-- Contenido del formulario de agregar paciente -->
        <div class="container mt-5">
        <h2>Formulario de Nuevo Paciente</h2>
        <form action="guardar_paciente.php" method="POST">
            <div class="form-group">
            <!-- <input type="hidden" id="id_cliente" name="id_cliente" value="<?php echo $idCliente; ?>">          -->
            <input type="hidden" name="idCliente" value="<?php echo $idCliente; ?>">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
            <div class="form-group">
                <label for="diagnostico">Diagnóstico:</label>
                <input type="text" class="form-control" id="diagnostico" name="diagnostico" required>
            </div>
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="text" class="form-control" id="edad" name="edad" required>
            </div>
            <div class="form-group">
                <label for="fecha_inicio">Fecha de Inicio:</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
            </div>
            <div class="form-group">
                <label for="dias_visita">Días de Visita:</label>
                <input type="text" class="form-control" id="dias_visita" name="dias_visita" required>
            </div>
            <div class="form-group">
                <label for="horario_visita">Horario de Visita:</label>
                <input type="text" class="form-control" id="horario_visita" name="horario_visita" required>
            </div>
            <div class="form-group">
                <label for="horas_atrabajar">Horas a Trabajar:</label>
                <input type="text" class="form-control" id="horas_atrabajar" name="horas_atrabajar" required>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <hr>
        </form>
    </div>

      </div>
    </div>
  </div>
  <!-- Incluir los scripts de Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>