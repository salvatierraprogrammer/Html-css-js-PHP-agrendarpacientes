<?php
include "../../conf/conexion.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$idCliente = isset($_POST['idCliente']) ? $_POST['idCliente'] : '';
$idPaciente = isset($_POST['idPaciente']) ? $_POST['idPaciente'] : '';
$idInforme = isset($_POST['idInforme']) ? $_POST['idInforme'] : '';
$fechaInforme = isset($_POST['fechaInforme']) ? $_POST['fechaInforme'] : '';
$informeText = isset($_POST['informeText']) ? $_POST['informeText'] : '';

$sql = "UPDATE informe SET fecha_informe = ?, informe_text = ? WHERE id_informe = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $fechaInforme, $informeText, $idInforme);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    header("Location: ../cliente/index.php?id=" . $idCliente);
    exit();
} else {
    echo "Error al actualizar el informe: " . $conn->error;
}

$stmt->close();
$conn->close();
?>