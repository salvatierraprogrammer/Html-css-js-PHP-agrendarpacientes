<?php
include "../../conf/conexion.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$idCliente = isset($_POST['idCliente']) ? $_POST['idCliente'] : '';
$idPaciente = isset($_POST['idPaciente']) ? $_POST['idPaciente'] : '';
$fechaInforme = isset($_POST['fechaInforme']) ? $_POST['fechaInforme'] : '';
$informeText = isset($_POST['informeText']) ? $_POST['informeText'] : '';

$sql = "INSERT INTO informe (id_cliente, id_paciente, fecha_informe, informe_text) VALUES ('$idCliente', '$idPaciente', '$fechaInforme', '$informeText')";

if ($conn->query($sql) === TRUE) {
    $conn->close();
    header("Location: ../cliente/index.php?id=" . $idCliente);
    exit();
} else {
    echo "Error al guardar el informe: " . $conn->error;
}

$conn->close();
?>