<?php
include "../../conf/conexion.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$idInforme = $_GET['id'];

// Realizar la consulta para obtener el informe específico
$sqlInforme = "SELECT * FROM informe WHERE id_informe = ?";
$stmtInforme = $conn->prepare($sqlInforme);
$stmtInforme->bind_param("i", $idInforme);
$stmtInforme->execute();
$resultInforme = $stmtInforme->get_result();

if ($resultInforme->num_rows > 0) {
    $rowInforme = $resultInforme->fetch_assoc();
    $idCliente = $rowInforme['id_cliente'];
    $idPaciente = $rowInforme['id_paciente'];
    $fechaInforme = $rowInforme['fecha_informe'];
    $informeText = $rowInforme['informe_text'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Informe</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Editar Informe</h2>
        <form action="editar_informe.php" method="POST">
            <div class="form-group">
                <label for="fechaInforme">Fecha del informe:</label>
                <input type="date" class="form-control" id="fechaInforme" name="fechaInforme" value="<?php echo $fechaInforme; ?>" required>
            </div>
            <div class="form-group">
                <label for="informeText">Texto del informe:</label>
                <textarea class="form-control" id="informeText" name="informeText" rows="5" required><?php echo $informeText; ?></textarea>
            </div>
            <input type="hidden" name="idCliente" value="<?php echo $idCliente; ?>">
            <input type="hidden" name="idPaciente" value="<?php echo $idPaciente; ?>">
            <input type="hidden" name="idInforme" value="<?php echo $idInforme; ?>">
            <button type="submit" class="btn btn-warning"> Actualizar cambios</button>
            <a href="../cliente/index.php?id=<?php echo $idCliente; ?>" class="btn btn-secondary">Volver</a>
        </form>
    </div>
</body>
</html>

<?php
} else {
    echo "No se encontró el informe.";
}

$stmtInforme->close();
$conn->close();
?>







