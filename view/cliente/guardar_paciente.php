<?php
include "../../conf/conexion.php";

// Obtener los valores enviados por el formulario
$idCliente = $_POST['id_cliente'];

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$diagnostico = $_POST['diagnostico'];
$edad = $_POST['edad'];
$fechaInicio = $_POST['fecha_inicio'];
$diasVisita = $_POST['dias_visita'];
$horarioVisita = $_POST['horario_visita'];
$horasTrabajar = $_POST['horas_atrabajar'];

// Realizar la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si hubo un error en la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Preparar la consulta SQL para insertar los datos en la tabla paciente
$sql = "INSERT INTO paciente (id_cliente, nombre, apellido, direccion, diagnostico, edad, fecha_inicio, dias_visita, horario_visita, horas_atrabajar)
        VALUES ('$idCliente', '$nombre', '$apellido', '$direccion', '$diagnostico', '$edad', '$fechaInicio', '$diasVisita', '$horarioVisita', '$horasTrabajar')";

// Ejecutar la consulta y verificar si se realizó correctamente
if ($conn->query($sql) === TRUE) {
    echo "Paciente guardado exitosamente.";
} else {
    echo "Error al guardar el paciente: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();

// Redirigir al usuario a la misma página
header("Location: index.php?id=$idCliente");
exit();
?>