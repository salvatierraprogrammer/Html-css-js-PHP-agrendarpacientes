<?php
include "../../conf/conexion.php";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if (isset($_POST['idPaciente'])) {
    $idPaciente = $_POST['idPaciente'];
    // Realizar la consulta para eliminar el paciente
    $sql = "DELETE FROM paciente WHERE id_paciente = $idPaciente";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../cliente/index.php?id=" . $idPaciente);
        exit();
    } else {
        echo "Error al eliminar el paciente: " . $conn->error;
    }
} else {
    echo "No se proporcionó un ID de paciente válido.";
}

$conn->close();
?>