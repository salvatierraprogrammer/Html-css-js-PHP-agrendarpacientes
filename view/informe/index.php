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
<?php
include "../../conf/conexion.php";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
// Obtener el ID del informe desde el parámetro de la URL
$idInforme = $_GET['id'];

// Realizar la consulta para obtener los datos del informe
$sql = "SELECT * FROM informe WHERE id_informe = $idInforme";
$result = $conn->query($sql);

// Verificar si se encontró el informe
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // $titulo = $row['titulo'];
    $fechaInforme = $row['fecha_informe'];
    $textoInforme = $row['informe_text'];

    echo '<div class="container">';
    
    echo '<div class="row justify-content-center">';
    echo '<div class="col-md-6">';
   
    echo '<div class="card">';
    echo '<div class="card-body">';
    echo '<h2>Informe</h2>';
    // echo '<h5 class="card-title">' . $titulo . '</h5>';
    echo '<p class="card-text">Fecha del informe: ' . $fechaInforme . '</p>';
    echo '<p class="card-text">Texto del informe: ' . $textoInforme . '</p>';
    echo '<hr>
    <br>
    <div class="text-center">
   
        <button onclick="history.go(-1)" class="btn btn-primary">
        <i class="fas fa-arrow-left"></i> Volver
        </button>
        
    </div>
    <hr>
    <br>';
  
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
?>
  <!-- Incluir los scripts de Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



