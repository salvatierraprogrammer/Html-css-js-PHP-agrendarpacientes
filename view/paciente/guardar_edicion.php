<?php
include "../../conf/conexion.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if (isset($_POST['idPaciente'])) {
    $idPaciente = $_POST['idPaciente'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $diagnostico = $_POST['diagnostico'];
    $edad = $_POST['edad'];
    $fechaInicio = $_POST['fechaInicio'];
    $diasVisita = $_POST['diasVisita'];
    $horarioVisita = $_POST['horarioVisita'];
    $horasAtTrabajar = $_POST['horasAtTrabajar'];
    $idCliente = $_POST['idCliente'];

    $sql = "UPDATE paciente SET nombre = '$nombre', apellido = '$apellido', direccion = '$direccion', diagnostico = '$diagnostico', edad = $edad, fecha_inicio = '$fechaInicio', dias_visita = $diasVisita, horario_visita = '$horarioVisita', horas_atrabajar = $horasAtTrabajar, id_cliente = $idCliente WHERE id_paciente = $idPaciente";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("Location: ../cliente/index.php?id=" . $idCliente);
        exit();
    } else {
        echo "Error al guardar los cambios: " . $conn->error;
    }
}

$conn->close();
?>