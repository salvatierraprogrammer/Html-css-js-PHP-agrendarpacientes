<?php
// Información de conexión a la base de datos
$servername = "localhost";
$username = "root"; // Reemplaza "usuario_mysql" con el usuario de tu base de datos
$password = ""; // Reemplaza "contraseña_mysql" con la contraseña de tu base de datos
$dbname = "info_at"; // Reemplaza "nombre_basedatos" con el nombre de tu base de datos

// Establecer la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Aquí puedes realizar operaciones con la conexión a la base de datos, como consultas, inserciones, etc.

// Cerrar la conexión cuando hayas terminado
$conn->close();
?>