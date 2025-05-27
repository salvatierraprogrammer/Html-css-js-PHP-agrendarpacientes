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

$idPaciente = $_GET['id']; // Obtener el ID del paciente desde el parámetro de la URL

// Realizar la consulta para obtener los datos del paciente
$sql = "SELECT paciente.*, cliente.nombre_empresa FROM paciente JOIN cliente ON paciente.id_cliente = cliente.id_cliente WHERE paciente.id_paciente = $idPaciente";
$result = $conn->query($sql);

// Verificar si se encontró el paciente
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $edad = $row['edad'];
    $diagnostico = $row['diagnostico'];
    $direccion = $row['direccion'];
    $fechaInicio = $row['fecha_inicio'];
    $horarioVisita = $row['horario_visita'];
    $horasATrabajar = $row['horas_atrabajar'];
    $diasVisita = $row['dias_visita'];
    $nombreEmpresa = $row['nombre_empresa'];
    $idCliente = $row['id_cliente'];
    echo '<div class="container">';
    echo '<h2>Pacientes</h2>';
    echo '<div class="row">';
    echo '<div class="col-md-6">';
    echo '<div class="card">';
    echo '<div class="card-body">';
    echo '<p class="card-title"><i class="fas fa-building"></i> Empresa: ' . $nombreEmpresa . '</p>';
    echo '<h5 class="card-text"><i class="fas fa-user"></i> Paciente: ' . $nombre . ' ' . $apellido . '</h5>';
    echo '<p class="card-text"><i class="fas fa-birthday-cake"></i> Edad: ' . $edad . ' años</p>';
    echo '<p class="card-text"><i class="fas fa-diagnoses"></i> Diagnóstico: ' . $diagnostico . '</p>';
    echo '<p class="card-text"><i class="fas fa-map-marker-alt"></i> Dirección: ' . $direccion . '</p>';
    
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<div class="col-md-6">';
    echo '<div class="card">';
    echo '<div class="card-body">';
    echo '<div class="card-info">';
    echo '<p class="card-info-item"><i class="fas fa-calendar-alt"></i> Fecha de inicio: ' . $fechaInicio . '</p>';
    echo '<p class="card-info-item"><i class="fas fa-clock"></i> Horarios de visita: ' . $horarioVisita . '</p>';
    echo '<p class="card-info-item"><i class="fas fa-clock"></i> Horas a trabajar: ' . $horasATrabajar . '</p>';
    echo '<p class="card-info-item"><i class="fas fa-calendar-check"></i> Días de visita: ' . $diasVisita . ' $</p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<hr>';
    echo '<div class="container">';

    echo '<h2>Informes</h2>';
    echo '<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#agregarModal">Agregar</button>';
    $idPaciente = $_GET['id'];
    
    // Realizar la consulta para obtener los informes del paciente específico
    $sqlInformes = "SELECT * FROM informe WHERE id_paciente = $idPaciente";
    $resultInformes = $conn->query($sqlInformes);
    
    if ($resultInformes->num_rows > 0) {
        echo '<div class="row " style="width:70%;">'; // Envoltura de fila
        while ($rowInforme = $resultInformes->fetch_assoc()) {
            $idInforme = $rowInforme['id_informe'];
            $fechaInforme = $rowInforme['fecha_informe'];
            $resumenInforme = $rowInforme['informe_text'];
    
            echo '<div class="col-md-4">';
            echo '<div class="card mb-2">';
            echo '<div class="card-body d-flex justify-content-center">';
            echo '<img src="../../public/img/card-info.png" class="card-img-top" alt="Imagen de paciente" style="width:50%;">';
            echo '</div>';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">Fecha del Informe: ' . $fechaInforme . '</h5>';
            // echo '<p class="card-text">Resumen: ' . $resumenInforme . '</p>';
            echo '<div class="text-right">';
            echo '<a href="../informe/index.php?id=' . $idInforme . '" class="btn btn-info btn-sm mb-2 me-2"><i class="fas fa-eye me-2"></i></a>';
            echo '<a href="../informe/edit_informe.php?id=' . $idInforme . '" class="btn btn-warning btn-sm mb-2 me-2"><i class="fas fa-edit me-2"></i></a>';
            echo '<a href="../informe/delete_informe.php?id=' . $idInforme . '" class="btn btn-danger btn-sm mb-2 me-2"><i class="fas fa-trash-alt me-2"></i></a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>'; // Cierre de la envoltura de fila
    } else {
        echo '<p>No se encontraron informes.</p>';
    }
  }
    
    $conn->close();
    ?>
    
   

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
<!-- Modal para agregar informe -->
<div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="agregarModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar Informe</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
      <form action="../informe/guardar_informe.php" method="POST">
  <div class="form-group">
    <label for="fechaInforme">Fecha del informe:</label>
    <input type="date" class="form-control" id="fechaInforme" name="fechaInforme" required>
  </div>
  <div class="form-group">
    <label for="informeText">Texto del informe:</label>
    <textarea class="form-control" id="informeText" name="informeText" rows="5" required></textarea>
  </div>
  <input type="hidden" name="idCliente" value="<?php echo isset($idCliente) ? $idCliente : ''; ?>">
  <input type="hidden" name="idPaciente" value="<?php echo isset($idPaciente) ? $idPaciente : ''; ?>">
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Guardar informe</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
  </div>
</form>
      </div>
    </div>
  </div>
</div>
  <div ></div>
  <!-- Incluir los scripts de Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>