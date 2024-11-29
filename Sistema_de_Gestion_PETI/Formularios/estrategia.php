<?php
session_start(); // Iniciar sesión

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../InicioSesion/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>10. IDENTIFICACIÓN DE ESTRATEGIAS</title>
    <link rel="stylesheet" href="../css/estrategia.css">
</head>
<body>
    <div class="container">
        <!-- Botón de índice -->
        <div class="indice">
            <a href="../principal.php">ÍNDICE</a>
        </div>

        <!-- Encabezado -->
        <h1>10. IDENTIFICACIÓN DE ESTRATEGIAS</h1>

        <!-- Matriz de estrategias -->
        <h2>Matriz de Estrategias</h2>
        <div class="matrix-container">
            <div class="matrix-item matriz-dafo">Matriz DAFO</div>
            <div class="matrix-item oportunidades">OPORTUNIDADES</div>
            <div class="matrix-item amenazas">AMENAZAS</div>
            <div class="matrix-item fortalezas">FORTALEZAS</div>
            <div class="matrix-item estrategias-ofensivas">ESTRATEGIAS OFENSIVAS</div>
            <div class="matrix-item estrategias-defensivas">ESTRATEGIAS DEFENSIVAS</div>
            <div class="matrix-item debilidades">DEBILIDADES</div>
            <div class="matrix-item estrategias-reorientacion">ESTRATEGIAS DE REORIENTACIÓN</div>
            <div class="matrix-item estrategias-supervivencia">ESTRATEGIAS DE SUPERVIVENCIA</div>
        </div>

        <!-- Texto descriptivo -->
        <p>
            Según ha ido cumplimentando en las fases anteriores, los factores internos y externos de su empresa son los siguientes:
        </p>

        <!-- Tabla de DAFO -->
        <div class="dafo-table">
            <div class="row debilidades">
                <div class="label">DEBILIDADES</div>
                <div class="content"></div>
            </div>
            <div class="row amenazas">
                <div class="label">AMENAZAS</div>
                <div class="content"></div>
            </div>
            <div class="row fortalezas">
                <div class="label">FORTALEZAS</div>
                <div class="content"></div>
            </div>
            <div class="row oportunidades">
                <div class="label">OPORTUNIDADES</div>
                <div class="content"></div>
            </div>
        </div>
    </div>
</body>
</html>
