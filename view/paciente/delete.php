<?php
include "../../conf/conexion.php";

$conn = new mysqli($servername, $username, $password, $dbname);
$idPaciente = $_GET['id'];

// Obtener los datos del paciente
$sql = "SELECT * FROM paciente WHERE id_paciente = $idPaciente";
$result = $conn->query($sql);

// Verificar si se encontró el paciente
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $direccion = $row['direccion'];
    $diagnostico = $row['diagnostico'];
    $edad = $row['edad'];
    $fechaInicio = $row['fecha_inicio'];
    $diasVisita = $row['dias_visita'];
    $horarioVisita = $row['horario_visita'];
    $horasAtTrabajar = $row['horas_atrabajar'];
    $idCliente = $row['id_cliente'];
} else {
    // El paciente no existe
    echo "No se encontró el paciente.";
    exit;
}
?>
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
<div class="container">
    <h2>EEliminar Paciente</h2>
    <form action="eliminar_paciente.php" method="POST">
        <input type="hidden" name="idPaciente" value="<?php echo $idPaciente; ?>">
        <div class="form-group">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
        </div>
        <div class="form-group">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $apellido; ?>">
        </div>
        <div class="form-group">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $direccion; ?>">
        </div>
        <div class="form-group">
            <label for="diagnostico" class="form-label">Diagnóstico</label>
            <input type="text" class="form-control" id="diagnostico" name="diagnostico" value="<?php echo $diagnostico; ?>">
        </div>
        <div class="form-group">
        <label for="edad" class="form-label">Edad</label>
        <input type="number" class="form-control" id="edad" name="edad" value="<?php echo $edad; ?>">
        </div>
        <div class="form-group">
            <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
            <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" value="<?php echo $fechaInicio; ?>">
        </div>
        <div class="form-group">
            <label for="diasVisita" class="form-label">Días de Visita</label>
            <input type="number" class="form-control" id="diasVisita" name="diasVisita" value="<?php echo $diasVisita; ?>">
        </div>
        <div class="form-group">
            <label for="horarioVisita" class="form-label">Horario de Visita</label>
            <input type="text" class="form-control" id="horarioVisita" name="horarioVisita" value="<?php echo $horarioVisita; ?>">
        </div>
        <div class="form-group">
            <label for="horasAtTrabajar" class="form-label">Horas a Trabajar</label>
            <input type="number" class="form-control" id="horasAtTrabajar" name="horasAtTrabajar" value="<?php echo $horasAtTrabajar; ?>">
        </div>
        <div class="form-group">
            
            <input type="hidden" class="form-control" id="idCliente" name="idCliente" value="<?php echo $idCliente; ?>">
        </div>
        <hr>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmModal">Eliminar</button>

        <a class="btn btn-info"  onclick="history.go(-1)"> Volver</a>
        <hr>
    </form>
</div>
<!-- Modal de confirmación -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModalLabel">Confirmación de eliminación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Al eliminar, se eliminarán todos los datos asociados al paciente. ¿Estás seguro de que deseas continuar?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <form action="eliminar_paciente.php" method="POST">
          <input type="hidden" name="idPaciente" value="<?php echo $idPaciente; ?>">
          <button type="submit" class="btn btn-danger">Eliminar</button>
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