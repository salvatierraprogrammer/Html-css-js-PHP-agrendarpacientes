<?php
include "../../conf/conexion.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$idCliente = isset($_GET['idCliente']) ? $_GET['id_cliente'] : '';
$idInforme = isset($_GET['idInforme']) ? $_GET['idInforme'] : '';
$idPaciente = isset($_GET['idPaciente']) ? $_GET['idPaciente'] : '';

$sql = "DELETE FROM informe WHERE id_informe = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idInforme);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    header("Location: ../paciente/show.php?id=" . $idCliente);
    exit();
} else {
    echo "Error al eliminar el informe: " . $conn->error;
}

$stmt->close();
$conn->close();
?>