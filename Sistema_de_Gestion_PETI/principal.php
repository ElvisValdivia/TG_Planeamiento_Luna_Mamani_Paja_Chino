<?php
session_start(); // Iniciar la sesión

if (!isset($_SESSION['usuario_id'])) {
    // Redirigir a la página de inicio de sesión
    header("Location: InicioSesion/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan Estratégico</title>
    <link rel="stylesheet" href="css/principal.css">

<body>
    <div class="container">
        <h1>CÓMO ELABORAR UN PLAN ESTRATÉGICO</h1>
        <p>El éxito de las organizaciones reside en gran parte en la capacidad que tienen sus
            directivos en ejecutar una estrategia más que en la calidad de la estrategia en sí.
            Su planificación y asignación de recursos son fundamentales para el logro de la misma.
            En este sentido, un Plan Estratégico puede entenderse como el conjunto de acciones que
            han de llevarse a cabo para alinear los recursos y potencialidades al objeto de conseguir
            el estado deseado, es decir, adaptación y adquisición de competitividad empresarial.
        </p>
        <p>Esta aplicación le ayudará a reflexionar sobre la estrategia que debe llevar a cabo.
            Visualizará dónde quiere estar, dónde está actualmente y, qué camino tendrá que trazar
            para llevarle a otro estado.
        </p>

        <h2>Para visualizar dónde quiere estar su empresa tendrá que definir:</h2>
        <div class="section">
            <div class="list-container">
                <ul>
                    <li>Misión</li>
                    <li>Visión</li>
                    <li>Valores</li>
                </ul>
            </div>
        </div>

        <h2>Para entender dónde está tendrá que llevar a cabo un doble análisis:</h2>
        <div class="section">
            <div class="list-container">
                <ul>
                    <li>Análisis interno</li>
                    <li>Análisis externo</li>
                </ul>
            </div>
        </div>

        <h2>Para trazar el camino para ir de un punto a otro tendrá que:</h2>
        <div class="section">
            <div class="list-container">
                <ul>
                    <li>Identificar la estrategia más conveniente</li>
                    <li>Determinar acciones para el logro de la estrategia</li>
                </ul>
            </div>
        </div>

        <h3>Gracias al Plan Empresarial determinará la forma de lograr una ventaja 
            competitiva para su proyecto de inversión.
        </h3>

        <div class="info-box2">
            <a class="info-item" href="Formularios/informacion.php">INFORMACIÓN</a>
        </div>

        <div class="info-box">
            <a class="info-item" href="Formularios/mision.php">1. MISIÓN</a>
            <a class="info-item" href="Formularios/analisisIE.php">5. ANÁLISIS INTERNO Y EXTERNO</a>
            <a class="info-item" href="Formularios/pest.php">9. PEST</a>
            <a class="info-item" href="Formularios/vision.php">2. VISIÓN</a>
            <a class="info-item" href="Formularios/cadena.php">6. CADENA DE VALOR</a>
            <a class="info-item" href="Formularios/estrategia.php">10. IDENTIFICACIÓN ESTRATEGIA</a>
            <a class="info-item" href="Formularios/valores.php">3. VALORES</a>
            <a class="info-item" href="Formularios/analisis7.php">7. MATRIZ DE PARTICIPACIÓN</a>
            <a class="info-item" href="Formularios/11matrizcame.php">11. MATRIZ CAME</a>
            <a class="info-item" href="Formularios/objetivos.php">4. OBJETIVOS</a>
            <a class="info-item" href="Formularios/5_fuerzas_porter.php">8. LAS 5 FUERZAS DE PORTER</a>
        </div>

        <div class="info-box2">
            <a class="info-item" href="Formularios/resumen.php">RESUMEN DEL PLAN EJECUTIVO</a>
        </div>

        <!-- Botón para cerrar sesión -->
        <div class="info-box2">
            <div class="cerrar-sesion-container">
                <a class="info-item cerrar-sesion" href="Formularios/cerrar_sesion.php">CERRAR SESIÓN</a>
            </div>
        </div>

    </div>
</body>
</html>
