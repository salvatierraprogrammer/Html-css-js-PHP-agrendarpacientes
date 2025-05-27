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
<br>
<h2 class="d-flex justify-content-center">Editar Cliente</h2><br>
<form action="edit_cliente.php" method="POST">
  <div class="form-group">
      <input type="hidden" name="idCliente" value="<?php echo $idCliente; ?>">

    <label for="nombre_empresa">Nombre de la empresa:</label>
    <input type="text" id="nombre_empresa" name="nombre_empresa" class="form-control" value="<?php echo $nombreEmpresa; ?>" required>
  </div>
  <div class="form-group">
    <label for="nombre_cliente">Nombre del cliente:</label>
    <input type="text" id="nombre_cliente" name="nombre_cliente" class="form-control" value="<?php echo $nombreCliente; ?>" required>
  </div>
  <div class="form-group">
    <label for="apellido_cliente">Apellido del cliente:</label>
    <input type="text" id="apellido_cliente" name="apellido_cliente" class="form-control" value="<?php echo $apellidoCliente; ?>" required>
  </div>
  <div class="form-group">
    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono" class="form-control" value="<?php echo $telefonoCliente; ?>" required>
  </div>
  <div class="form-group">
    <label for="email_cliente">Correo electrónico:</label>
    <input type="email" id="email_cliente" name="email_cliente" class="form-control" value="<?php echo $emailCliente; ?>" required>
  </div>
  <hr>
  <button type="submit" class="btn btn-warning">Actualizar</button>
  <a class="btn btn-info" href="create.php"> Volver</a>
  <hr>
</form>

  </div>
  <!-- Incluir los scripts de Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>