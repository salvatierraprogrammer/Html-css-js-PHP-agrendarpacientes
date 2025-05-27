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
<br>
    <h2 class="d-flex justify-content-center">Clientes</h2><br>
    <form action="guardar_cliente.php" method="POST">
  <div class="form-group">
    <label for="nombre_empresa">Nombre de la empresa:</label>
    <input type="text" id="nombre_empresa" name="nombre_empresa" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="nombre_cliente">Nombre del cliente:</label>
    <input type="text" id="nombre_cliente" name="nombre_cliente" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="apellido_cliente">Apellido del cliente:</label>
    <input type="text" id="apellido_cliente" name="apellido_cliente" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="email_cliente">Correo electrónico:</label>
    <input type="email" id="email_cliente" name="email_cliente" class="form-control" required>
  </div>
  <hr>
  <button type="submit" class="btn btn-primary">Guardar</button>
  <a class="btn btn-info" href="create.php"> Volver</a>
  <hr>
</form>

  </div>
  <!-- Incluir los scripts de Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>