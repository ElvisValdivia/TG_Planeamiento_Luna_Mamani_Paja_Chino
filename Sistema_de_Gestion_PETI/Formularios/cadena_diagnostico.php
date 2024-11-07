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

// Inicializar variables para el mensaje y las valoraciones
$mensaje = '';
$potenciald = 0; // Inicializar la variable para el porcentaje
$valoraciones = [];
$reflexion = ''; // Inicializar la reflexión
$fortalezas = [];
$debilidades = [];

// Cargar las valoraciones, potencial, reflexión, fortalezas y debilidades de la sesión si están disponibles
if (isset($_SESSION['valoraciones'])) {
    $valoraciones = $_SESSION['valoraciones'];
}

if (isset($_SESSION['potenciald'])) {
    $potenciald = $_SESSION['potenciald'];
}

if (isset($_SESSION['reflexion'])) {
    $reflexion = $_SESSION['reflexion'];
}

if (isset($_SESSION['fortalezas'])) {
    $fortalezas = explode(',', $_SESSION['fortalezas']);
}

if (isset($_SESSION['debilidades'])) {
    $debilidades = explode(',', $_SESSION['debilidades']);
}

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener el valor de potenciald y las valoraciones enviadas desde el formulario
    $potenciald = $_POST['potenciald'] ?? 0;

    for ($i = 1; $i <= 25; $i++) {
        $valoraciones[$i] = $_POST['valoracion' . $i] ?? null; // Guardar las valoraciones
    }

    // Almacenar las valoraciones y el potencial en la sesión
    $_SESSION['valoraciones'] = $valoraciones;
    $_SESSION['potenciald'] = $potenciald;

    // Guardar reflexión si está presente
    $reflexion = $_POST['reflexion'] ?? '';
    $_SESSION['reflexion'] = $reflexion;

    // Almacenar fortalezas y debilidades
    $fortalezas = $_POST['fortalezas'] ?? [];
    $debilidades = $_POST['debilidades'] ?? [];
    $_SESSION['fortalezas'] = implode(',', $fortalezas);
    $_SESSION['debilidades'] = implode(',', $debilidades);

    // Preparar las consultas para actualizar el campo potenciald, reflexión, fortalezas y debilidades
    $sql1 = "UPDATE empresa SET potenciald = ? WHERE id_usuario = ?";
    $sql2 = "UPDATE empresa SET reflexion = ? WHERE id_usuario = ?";
    $sql3 = "UPDATE empresa SET fortalezas = ? WHERE id_usuario = ?";
    $sql4 = "UPDATE empresa SET debilidades = ? WHERE id_usuario = ?";

    // Actualizar el potencial
    if ($stmt = $conn->prepare($sql1)) {
        $stmt->bind_param("di", $potenciald, $id_usuario);

        if ($stmt->execute()) {
            $mensaje = "El potencial de mejora se ha guardado correctamente.";
        } else {
            $mensaje = "Error al guardar el dato: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $mensaje = "Error en la preparación de la consulta: " . $conn->error;
    }

    // Actualizar la reflexión
    if ($stmt = $conn->prepare($sql2)) {
        $stmt->bind_param("si", $reflexion, $id_usuario);

        if ($stmt->execute()) {
            $mensaje .= " La reflexión, fortalezas y debilidades se ha guardado correctamente.";
        } else {
            $mensaje .= " Error al guardar la reflexión: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $mensaje .= " Error en la preparación de la consulta de reflexión: " . $conn->error;
    }

    // Actualizar fortalezas
    if ($stmt = $conn->prepare($sql3)) {
        $stmt->bind_param("si", $_SESSION['fortalezas'], $id_usuario);
        $stmt->execute();
        $stmt->close();
    }

    // Actualizar debilidades
    if ($stmt = $conn->prepare($sql4)) {
        $stmt->bind_param("si", $_SESSION['debilidades'], $id_usuario);
        $stmt->execute();
        $stmt->close();
    }

    $conn->close(); // Cerrar la conexión a la base de datos
}

// Calcular el porcentaje para mostrar en la página
$porcentaje_mostrar = ($potenciald > 0) ? $potenciald : 0;

// Definir las preguntas
$preguntas = [
    "La empresa tiene una política sistematizada de cero defectos en la producción de productos/servicios.",
    "La empresa emplea los medios productivos tecnológicamente más avanzados de su sector.",
    "La empresa dispone de un sistema de información y control de gestión eficiente y eficaz.",
    "Los medios técnicos y tecnológicos de la empresa están preparados para competir en un futuro a corto, medio y largo plazo.",
    "La empresa es un referente en su sector en I+D+i.",
    "La excelencia de los procedimientos de la empresa (en ISO, etc.) son una principal fuente de ventaja competitiva.",
    "La empresa dispone de página web, y esta se emplea no sólo como escaparate virtual de productos/servicios, sino también para establecer relaciones con clientes y proveedores.",
    "Los productos/servicios que desarrolla nuestra empresa llevan incorporada una tecnología difícil de imitar.",
    "La empresa es referente en su sector en la optimización, en términos de coste, de su cadena de producción, siendo ésta una de sus principales ventajas competitivas.",
    "La informatización de la empresa es una fuente de ventaja competitiva clara respecto a sus competidores.",
    "Los canales de distribución de la empresa son una importante fuente de ventajas competitivas.",
    "Los productos/servicios de la empresa son altamente, y diferencialmente, valorados por el cliente respecto a nuestros competidores.",
    "La empresa dispone y ejecuta un sistemático plan de marketing y ventas.",
    "La empresa tiene optimizada su gestión financiera.",
    "La empresa busca continuamente el mejorar la relación con sus clientes cortando los plazos de ejecución, personalizando la oferta o mejorando las condiciones de entrega. Pero siempre partiendo de un plan previo.",
    "La empresa es referente en su sector en el lanzamiento de innovadores productos y servicio de éxito demostrado en el mercado.",
    "Los Recursos Humanos son especialmente responsables del éxito de la empresa, considerándolos incluso como el principal activo estratégico.",
    "Se tiene una plantilla altamente motivada, que conoce con claridad las metas, objetivos y estrategias de la organización.",
    "La empresa siempre trabaja conforme a una estrategia y objetivos claros.",
    "La gestión del circulante está optimizada.",
    "Se tiene definido claramente el posicionamiento estratégico de todos los productos de la empresa.",
    "Se dispone de una política de marca basada en la reputación que la empresa genera, en la gestión de relación con el cliente y en el posicionamiento estratégico previamente definido.",
    "La cartera de clientes de nuestra empresa está altamente fidelizada, ya que tenemos como principal propósito el deleitarlos día a día.",
    "Nuestra política y equipo de ventas y marketing es una importante ventaja competitiva de nuestra empresa respecto al sector.",
    "El servicio al cliente que prestamos es uno de nuestras principales ventajas competitivas respecto a nuestros competidores."
];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnóstico de Potencial de Mejora</title>
    <link rel="stylesheet" href="../css/cadenad.css">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <a class="volver" href="../principal.php">INDICE</a>

    <div class="container">
        <h4 style="text-align: center;">A continuación seleccione la valoración de su empresa en función de cada una
            de las afirmaciones, de tal forma que <br>0 = En total en desacuerdo; 1 = No está de acuerdo; 2 = Está de
            acuerdo;
            3 = Está bastante de acuerdo; 4 = En total acuerdo.</h4>

        <form id="valoracionForm" action="" method="POST"> <!-- Acción vacía para quedarse en la misma página -->
            <table>
                <thead>
                    <tr>
                        <th>AUTODIAGNÓSTICO DE LA CADENA DE VALOR INTERNA</th>
                        <th>VALORACIÓN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < 25; $i++): ?>
                        <tr>
                            <td><?php echo ($i + 1) . ". " . $preguntas[$i]; ?></td>
                            <td>
                                <input type="radio" name="valoracion<?php echo ($i + 1); ?>" value="0" <?php echo (isset($valoraciones[$i + 1]) && $valoraciones[$i + 1] == '0') ? 'checked' : ''; ?>
                                    onchange="calcularPotencial()"> 0
                                <input type="radio" name="valoracion<?php echo ($i + 1); ?>" value="1" <?php echo (isset($valoraciones[$i + 1]) && $valoraciones[$i + 1] == '1') ? 'checked' : ''; ?>
                                    onchange="calcularPotencial()"> 1
                                <input type="radio" name="valoracion<?php echo ($i + 1); ?>" value="2" <?php echo (isset($valoraciones[$i + 1]) && $valoraciones[$i + 1] == '2') ? 'checked' : ''; ?>
                                    onchange="calcularPotencial()"> 2
                                <input type="radio" name="valoracion<?php echo ($i + 1); ?>" value="3" <?php echo (isset($valoraciones[$i + 1]) && $valoraciones[$i + 1] == '3') ? 'checked' : ''; ?>
                                    onchange="calcularPotencial()"> 3
                                <input type="radio" name="valoracion<?php echo ($i + 1); ?>" value="4" <?php echo (isset($valoraciones[$i + 1]) && $valoraciones[$i + 1] == '4') ? 'checked' : ''; ?>
                                    onchange="calcularPotencial()"> 4
                            </td>
                        </tr>
                    <?php endfor; ?>
                    <tr>
                        <td>POTENCIAL DE MEJORA DE LA CADENA DE VALOR INTERNA</td>
                        <td id="resultado-porcentaje"><?php echo $porcentaje_mostrar; ?>%</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <input type="hidden" name="potenciald" id="potenciald" value="<?php echo $porcentaje_mostrar; ?>">

            <h4 style="text-align: center;">Reflexione sobre el resultado obtenido. Anote aquellas observaciones que
                puedan ser de su interés. Identifique sus fortalezas y debilidades respecto a su cadena de valor </h4>

            <textarea name="reflexion" rows="8" cols="165"><?php echo htmlspecialchars($reflexion); ?></textarea>
            <br>
            <style>
                .table-container {
                    width: 50%;
                    margin: 0 auto;
                    font-family: Arial, sans-serif;
                }

                .table-container table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 15px;
                    /* Espaciado entre tablas */
                }

                .table-container th {
                    font-weight: bold;
                    text-align: center;
                    padding: 12px;
                }

                .fortalezas-table th {
                    background-color: #e5dbc8;
                    /* Color de fondo para Fortalezas */
                }

                .debilidades-table th {
                    background-color: #e5f0d5;
                    /* Color de fondo para Debilidades */
                }

                .table-container td {
                    border: 1px solid #000;
                    padding: 10px;
                    vertical-align: middle;
                }

                .table-container td.label-cell {
                    width: 20%;
                    /* Ancho reducido para la columna izquierda */
                    text-align: right;
                    font-weight: bold;
                    padding-right: 10px;
                }

                .table-container td.input-cell {
                    width: 80%;
                    /* Ancho amplio para la columna derecha */
                }

                .table-container input[type="text"] {
                    width: 95%;
                    /* Ajuste para el campo de texto */
                    padding: 5px;
                    box-sizing: border-box;
                }

                .info-box {
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    gap: 10px;
                    margin: 20px 0;
                }

                .info-item {
                    display: block;
                    background-color: #008080;
                    color: #fff;
                    padding: 10px;
                    text-align: center;
                    border-radius: 4px;
                    cursor: pointer;
                    text-decoration: none;
                    margin-left: 50px;
                    margin-right: 50px;
                }

                .info-item:first-child {
                    grid-column: 1;
                }

                .info-item:last-child {
                    grid-column: 2;
                }
            </style>

            <div class="table-container">
                <table class="fortalezas-table">
                    <tr>
                        <th colspan="2">FORTALEZAS</th>
                    </tr>
                    <tr>
                        <td class="label-cell">F1:</td>
                        <td class="input-cell"><input type="text" name="fortalezas[]"
                                value="<?php echo isset($fortalezas[0]) ? htmlspecialchars($fortalezas[0]) : ''; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td class="label-cell">F2:</td>
                        <td class="input-cell"><input type="text" name="fortalezas[]"
                                value="<?php echo isset($fortalezas[1]) ? htmlspecialchars($fortalezas[1]) : ''; ?>" />
                        </td>
                    </tr>
                </table>

                <table class="debilidades-table">
                    <tr>
                        <th colspan="2">DEBILIDADES</th>
                    </tr>
                    <tr>
                        <td class="label-cell">D1:</td>
                        <td class="input-cell"><input type="text" name="debilidades[]"
                                value="<?php echo isset($debilidades[0]) ? htmlspecialchars($debilidades[0]) : ''; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td class="label-cell">D2:</td>
                        <td class="input-cell"><input type="text" name="debilidades[]"
                                value="<?php echo isset($debilidades[1]) ? htmlspecialchars($debilidades[1]) : ''; ?>" />
                        </td>
                    </tr>
                </table>
            </div>


            <br>
            <<style>
                /* Estilos para el botón de guardar */
                input[type="submit"] {
                    background-color: #4CAF50;
                    /* Color de fondo */
                    color: white;
                    /* Color del texto */
                    border: none;
                    /* Eliminar borde */
                    padding: 12px 20px;
                    /* Relleno alrededor del texto */
                    text-align: center;
                    /* Alineación del texto */
                    text-decoration: none;
                    /* Quitar subrayado */
                    display: inline-block;
                    /* Mostrar en línea */
                    font-size: 16px;
                    /* Tamaño de la fuente */
                    cursor: pointer;
                    /* Cambiar cursor a mano */
                    border-radius: 8px;
                    /* Bordes redondeados */
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
                    /* Sombra para un efecto 3D */
                    transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
                    /* Animación suave */
                }

                /* Efecto al pasar el ratón sobre el botón */
                input[type="submit"]:hover {
                    background-color: #45a049;
                    /* Color de fondo al pasar el ratón */
                    transform: scale(1.05);
                    /* Aumentar el tamaño ligeramente */
                    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3);
                    /* Sombra más grande al pasar */
                }

                /* Efecto cuando el botón es presionado */
                input[type="submit"]:active {
                    background-color: #388e3c;
                    /* Color más oscuro al hacer clic */
                    transform: scale(0.98);
                    /* Disminuir tamaño al presionar */
                    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
                    /* Sombra más pequeña al hacer clic */
                }
            </style>
            <div style="display: flex; justify-content: center; margin-top: 20px;">
                <input type="submit" value="Guardar">
            </div>


        </form>

        <?php if ($mensaje): ?>
            <p style="color: green; text-align: center;"><?php echo $mensaje; ?></p>
        <?php endif; ?>
        <div class="info-box">
            <a class="info-item" href="../Formularios/cadena.php">6. CADENA DE VALOR</a>
            <a class="info-item" href="../Formularios/analisis7.php">7. BCG</a>
        </div>
    </div>



    <script>
    function calcularPotencial() {
        // Inicializa el valor de la suma total de las valoraciones
        let totalValoraciones = 0;
        let totalRespuestas = 0;

        // Itera sobre las valoraciones
        for (let i = 1; i <= 25; i++) {
            let radios = document.getElementsByName("valoracion" + i);
            for (let j = 0; j < radios.length; j++) {
                if (radios[j].checked) {
                    totalValoraciones += parseInt(radios[j].value); // Suma la respuesta seleccionada
                    totalRespuestas++;
                    break;
                }
            }
        }

        // Calcular el porcentaje
        let porcentaje = 0;
        if (totalRespuestas > 0) {
            porcentaje = (totalValoraciones / (totalRespuestas * 4)) * 100;
        }

        // Mostrar el porcentaje en el HTML
        document.getElementById("resultado-porcentaje").innerText = porcentaje.toFixed(2) + "%";

        // Actualiza el valor del input hidden para enviar el porcentaje al backend
        document.getElementById("potenciald").value = porcentaje.toFixed(2);
    }
</script>

</body>

</html>