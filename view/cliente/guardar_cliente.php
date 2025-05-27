<?php

include "../../conf/conexion.php";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los valores enviados por el formulario
$nombreEmpresa = $_POST['nombre_empresa'];
$nombreCliente = $_POST['nombre_cliente'];
$apellidoCliente = $_POST['apellido_cliente'];
$telefono = $_POST['telefono'];
$emailCliente = $_POST['email_cliente'];

// Preparar la consulta SQL para insertar los datos en la tabla cliente
$sql = "INSERT INTO cliente (nombre_empresa, nombre_cliente, apellido_cliente, telefono, email_cliente)
        VALUES ('$nombreEmpresa', '$nombreCliente', '$apellidoCliente', '$telefono', '$emailCliente')";

// Ejecutar la consulta y verificar si se realizó correctamente
if ($conn->query($sql) === TRUE) {
    echo "Cliente guardado exitosamente.";
} else {
    echo "Error al guardar el cliente: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
// Redirigir al usuario a la misma página
header("Location: create.php");
exit();

?>