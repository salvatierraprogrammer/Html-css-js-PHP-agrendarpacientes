<?php
include "../../conf/conexion.php";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$idCliente = $_POST['idCliente'];
$nombreEmpresa = $_POST['nombre_empresa'];
$nombreCliente = $_POST['nombre_cliente'];
$apellidoCliente = $_POST['apellido_cliente'];
$telefonoCliente = $_POST['telefono'];
$emailCliente = $_POST['email_cliente'];

// Realizar la consulta para actualizar los datos del cliente
$sql = "UPDATE cliente SET nombre_empresa = '$nombreEmpresa', nombre_cliente = '$nombreCliente', apellido_cliente = '$apellidoCliente', telefono = '$telefonoCliente', email_cliente = '$emailCliente' WHERE id_cliente = $idCliente";

if ($conn->query($sql) === TRUE) {
    echo "Los datos del cliente se actualizaron correctamente.";
} else {
    echo "Error al actualizar los datos del cliente: " . $conn->error;
}

$conn->close();
header("Location: create.php");
exit();
?>