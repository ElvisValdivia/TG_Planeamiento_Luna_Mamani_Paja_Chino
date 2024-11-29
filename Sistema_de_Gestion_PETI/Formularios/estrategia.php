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

 <!-- Tabla DAFO -->
 <p>
            Según ha ido cumplimentando en las fases anteriores, los factores internos y externos de su empresa son los siguientes:
        </p>
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


        <!-- Oportunidades -->
        <h2>Oportunidades</h2>
        <table class="matrix-table">
            <thead>
                <tr>
                    <th>FORTALEZAS</th>
                    <th>O1</th>
                    <th>O2</th>
                    <th>O3</th>
                    <th>O4</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>F1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>F2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>F3</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>F4</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>0</td>
                </tr>
            </tbody>
        </table>

        <!-- Tabla de Fortalezas y Amenazas -->
        <h2>Amenazas</h2>
        <table class="matrix-table amenazas">
            <thead>
                <tr>
                    <th>FORTALEZAS</th>
                    <th>A1</th>
                    <th>A2</th>
                    <th>A3</th>
                    <th>A4</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>F1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>F2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>F3</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>F4</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>0</td>
                </tr>
            </tbody>
        </table>

        <!-- Tabla de Debilidades y Oportunidades -->
        <h2>Oportunidades</h2>
        <table class="matrix-table">
            <thead>
                <tr>
                    <th>DEBILIDADES</th>
                    <th>O1</th>
                    <th>O2</th>
                    <th>O3</th>
                    <th>O4</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>D1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>D2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>D3</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>D4</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>0</td>
                </tr>
            </tbody>
        </table>

        <!-- Tabla de Debilidades y Amenazas -->
        <h2>Amenazas</h2>
        <table class="matrix-table amenazas">
            <thead>
                <tr>
                    <th>DEBILIDADES</th>
                    <th>A1</th>
                    <th>A2</th>
                    <th>A3</th>
                    <th>A4</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>D1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>D2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>D3</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>D4</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>0</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="container">
        <!-- Tabla de Síntesis de Resultados -->
        <h2>SÍNTESIS DE RESULTADOS</h2>
        <table class="synthesis-table">
            <thead>
                <tr>
                    <th>Relaciones</th>
                    <th>Tipología de estrategia</th>
                    <th>Puntuación</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>FO</td>
                    <td>Estrategia Ofensiva</td>
                    <td class="score">0</td>
                    <td>Deberá adoptar estrategias de crecimiento</td>
                </tr>
                <tr>
                    <td>AF</td>
                    <td>Estrategia Defensiva</td>
                    <td class="score">0</td>
                    <td>La empresa está preparada para enfrentarse a las amenazas</td>
                </tr>
                <tr>
                    <td>AD</td>
                    <td>Estrategia de Supervivencia</td>
                    <td class="score">0</td>
                    <td>Se enfrenta a amenazas externas sin las fortalezas necesarias para luchar con la competencia</td>
                </tr>
                <tr>
                    <td>OD</td>
                    <td>Estrategia de Reorientación</td>
                    <td class="score">0</td>
                    <td>La empresa no puede aprovechar las oportunidades porque carece de preparación adecuada</td>
                </tr>
            </tbody>
        </table>

        <p class="note">
            La puntuación mayor le indica la estrategia que deberá llevar a cabo.
        </p>

        <!-- Botones de Navegación -->
        <div class="navigation">
            <a href="pest.php" class="nav-button">9. PEST</a>
            <a href="matriz_came.php" class="nav-button">11. MATRIZ CAME</a>
        </div>
    </div>


</body>
</html>
