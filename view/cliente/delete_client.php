<?php
include "../../conf/conexion.php";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if (isset($_POST['idCliente'])) {
    $idCliente = $_POST['idCliente'];

    // Realizar la consulta para eliminar el cliente
    $sql = "DELETE FROM cliente WHERE id_cliente = $idCliente";
    if ($conn->query($sql) === TRUE) {
        echo "El cliente se eliminó correctamente.";
    } else {
        echo "Error al eliminar el cliente: " . $conn->error;
    }

    $conn->close();
    header("Location: create.php");
    exit();
}
?>