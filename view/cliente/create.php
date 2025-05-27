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

<!-- Botón para agregar cliente -->
<a href="agregar_cliente.php" class="btn btn-primary mb-3">Agregar</a>

<!-- Tabla responsive de clientes -->
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Teléfono</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include "../../conf/conexion.php";

      $conn = new mysqli($servername, $username, $password, $dbname);

      // Verificar la conexión
      if ($conn->connect_error) {
          die("Error de conexión: " . $conn->connect_error);
      }

      // Realizar la consulta para obtener los clientes
      $sql = "SELECT * FROM cliente";
      $result = $conn->query($sql);

      // Verificar si hay clientes
      if ($result->num_rows > 0) {
          // Recorrer los resultados y mostrar los datos de cada cliente en filas de la tabla
          while ($row = $result->fetch_assoc()) {
              $idCliente = $row['id_cliente'];
              $nombre = $row['nombre_cliente'] . ' ' . $row['apellido_cliente'];
              $email = $row['email_cliente'];
              $telefono = $row['telefono'];

              echo '<tr>';
              echo '<td>' . $nombre . '</td>';
              echo '<td>' . $email . '</td>';
              echo '<td>' . $telefono . '</td>';
              echo '<td>';
              echo '<a href="ver_cliente.php?id=' . $idCliente . '" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> </a> ';
              echo '<a href="editar_cliente.php?id=' . $idCliente . '" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> </a> ';
              echo '<a href="eliminar_cliente.php?id=' . $idCliente . '" class="btn btn-danger btn-sm" onclick="return confirm(\'¿Estás seguro de que deseas eliminar este cliente?\')"><i class="fas fa-trash-alt"></i> </a> ';
              echo '</td>';
              echo '</tr>';
          }
      } else {
          echo '<tr><td colspan="4">No se encontraron clientes.</td></tr>';
      }

      // Cerrar la conexión a la base de datos
      $conn->close();
      ?>
    </tbody>
  </table>
</div>

<!-- Botón de volver -->
<a href="../../index.php" class="btn btn-secondary">Volver</a>
  </div>
  <!-- Incluir los scripts de Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>