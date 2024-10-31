<?php
session_start(); // Iniciar la sesión

// Habilitar la visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir el archivo de conexión a la base de datos
include('../Conexion/conexion.php'); // Asegúrate de que esta ruta sea correcta

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../InicioSesion/login.php"); // Redirigir a la página de login si no está logueado
    exit();
}

// Obtener el ID del usuario desde la sesión
$id_usuario = $_SESSION['usuario_id'];

// Preparar la consulta para obtener los datos de la empresa
$sql = "SELECT * FROM empresa WHERE id_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si hay resultados
if ($result->num_rows > 0) {
    $empresa = $result->fetch_assoc(); // Obtener los datos de la empresa
} else {
    $empresa = null; // No se encontró ninguna empresa
}

$stmt->close(); // Cerrar la declaración después de su uso
$conn->close(); // Cerrar la conexión a la base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen</title>
    <link rel="stylesheet" href="../css/resumen.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Resumen de la Empresa</h1>
        </div>
        <div class="content">
            <?php if ($empresa): ?>
                <h2>Misión</h2>
                <p><?php echo htmlspecialchars($empresa['mision']); ?></p>

                <h2>Visión</h2>
                <p><?php echo htmlspecialchars($empresa['vision']); ?></p>

                <h2>Valores</h2>
                <p><?php echo htmlspecialchars($empresa['valores']); ?></p>

                <h2>Objetivos Generales</h2>
                <p><?php echo htmlspecialchars($empresa['objetivos_generales']); ?></p>

                <h2>Objetivos Específicos</h2>
                <p><?php echo htmlspecialchars($empresa['objetivos_especificos']); ?></p>

                <h2>Fortalezas</h2>
                <p><?php echo htmlspecialchars($empresa['fortalezas']); ?></p>

                <h2>Debilidades</h2>
                <p><?php echo htmlspecialchars($empresa['debilidades']); ?></p>

                <h2>Oportunidades</h2>
                <p><?php echo htmlspecialchars($empresa['oportunidades']); ?></p>

                <h2>Amenazas</h2>
                <p><?php echo htmlspecialchars($empresa['amenazas']); ?></p>

                <h2>Unidad Estratégica</h2>
                <p><?php echo htmlspecialchars($empresa['unidad_estrategica']); ?></p>

                <h2>Potencial</h2>
                <p><?php echo htmlspecialchars($empresa['potenciald']); ?></p>

                <h2>Reflexión</h2>
                <p><?php echo htmlspecialchars($empresa['reflexion']); ?></p>
            <?php else: ?>
                <p>No se encontraron datos de la empresa.</p>
            <?php endif; ?>
        </div>
        <a href="../principal.php" class="volver">Volver</a>
    </div>
</body>
</html>
