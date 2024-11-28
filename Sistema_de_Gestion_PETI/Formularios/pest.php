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
$valoraciones = [];
$oportunidades = []; // Inicializar oportunidades
$amenazas = []; // Inicializar amenazas

// Cargar las valoraciones, reflexión, oportunidades y amenazas de la sesión si están disponibles
if (isset($_SESSION['valoraciones'])) {
    $valoraciones = $_SESSION['valoraciones'];
}

if (isset($_SESSION['oportunidades'])) {
    $oportunidades = explode(',', $_SESSION['oportunidades']);
}

if (isset($_SESSION['amenazas'])) {
    $amenazas = explode(',', $_SESSION['amenazas']);
}

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener el valor las valoraciones enviadas desde el formulario
    for ($i = 1; $i <= 25; $i++) {
        $valoraciones[$i] = $_POST['valoracion' . $i] ?? null; // Guardar las valoraciones
    }

    // Almacenar las valoraciones en la sesión
    $_SESSION['valoraciones'] = $valoraciones;

    // Almacenar oportunidades y amenazas
    $oportunidades = $_POST['oportunidades'] ?? [];
    $amenazas = $_POST['amenazas'] ?? [];
    $_SESSION['oportunidades'] = implode(',', $oportunidades);
    $_SESSION['amenazas'] = implode(',', $amenazas);

    // Preparar las consultas para actualizar el campo reflexión, oportunidades y amenazas
    $sql3 = "UPDATE empresa SET oportunidades = ? WHERE id_usuario = ?";
    $sql4 = "UPDATE empresa SET amenazas = ? WHERE id_usuario = ?";

    // Actualizar oportunidades
    if ($stmt = $conn->prepare($sql3)) {
        $stmt->bind_param("si", $_SESSION['oportunidades'], $id_usuario);
        $stmt->execute();
        $stmt->close();
    }

    // Actualizar amenazas
    if ($stmt = $conn->prepare($sql4)) {
        $stmt->bind_param("si", $_SESSION['amenazas'], $id_usuario);
        $stmt->execute();
        $stmt->close();
    }

    $conn->close(); // Cerrar la conexión a la base de datos
}

// Definir las preguntas
$preguntas = [
    "Los cambios en la composición étnica de los consumidores de nuestro mercado está teniendo un notable impacto.",
    "El envejecimiento de la población tiene un importante impacto en la demanda.",
    "Los nuevos estilos de vida y tendencias originan cambios en la oferta de nuestro sector.",
    "El envejecimiento de la población tiene un importante impacto en la oferta del sector donde operamos.",
    "Las variaciones en el nivel de riqueza de la población impactan considerablemente en la demanda de los productos/servicios del sector donde operamos.",
    "La legislación fiscal afecta muy considerablemente a la economía de las empresas del sector donde operamos.",
    "La legislación laboral afecta muy considerablemente a la operativa del sector donde actuamos.",
    "Las subvenciones otorgadas por las Administraciones Públicas son claves en el desarrollo competitivo del mercado donde operamos.",
    "El impacto que tiene la legislación de protección al consumidor, en la manera de producir bienes y/o servicios es muy importante.",
    "La normativa autonómica tiene un impacto considerable en el funcionamiento del sector donde actuamos.",
    "Las expectativas de crecimiento económico generales afectan crucialmente al mercado donde operamos.",
    "La política de tipos de interés es fundamental en el desarrollo financiero del sector donde trabaja nuestra empresa.",
    "La globalización permite a nuestra industria gozar de importantes oportunidades en nuevos mercados.",
    "La situación del empleo es fundamental para el desarrollo económico de nuestra empresa y nuestro sector.",
    "Las expectativas del ciclo económico de nuestro sector impactan en la situación económica de sus empresas.",
    "Las Administraciones Públicas están incentivando el esfuerzo tecnológico de las empresas de nuestro sector.",
    "Internet, el comercio electrónico, el wireless y otras NTIC están impactando en la demanda de nuestros productos/servicios y en los de la competencia.",
    "El empleo de NTIC´s es generalizado en el sector donde trabajamos.",
    "En nuestro sector, es de gran importancia ser pionero o referente en el empleo de aplicaciones tecnológicas.",
    "En el sector donde operamos, para ser competitivos, es condición 'sine qua non' innovar constantemente.",
    "La legislación medioambiental afecta al desarrollo de nuestro sector.",
    "Los clientes de nuestro mercado exigen que seamos socialmente responsables, en el plano medioambiental.",
    "En nuestro sector, las políticas medioambientales son una fuente de ventajas competitivas.",
    "La creciente preocupación social por el medio ambiente impacta notablemente en la demanda de productos/servicios ofertados en nuestro mercado.",
    "El factor ecológico es una fuente de diferenciación clara en el sector donde opera nuestra empresa."
];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnóstico de Potencial de Mejora</title>
    <link rel="stylesheet" href="../css/pest.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <a class="volver" href="../principal.php">INDICE</a>

    <div class="container">
        <h1>9. ANÁLISIS EXTERNO MACROENTORNO: PEST </h1>

        <p><strong>PEST</strong> es un acrónimo y las letras representan el macro entorno de la empresa.</p>

        <p><strong>Políticos:</strong> aquellos factores que puedan determinar la actividad de la empresa. Por ejemplo,
            la legislación tributaria, laboral, tratados comerciales, normas de medio ambiente, etc.</p>

        <p><strong>Económicos:</strong> los factores políticos implican efectos económicos. El comportamiento, la
            confianza del comprador y su nivel adquisitivo están relacionados con el auge, estancamiento, recesión y
            recuperación de la economía. Ejemplos de ellos son: tasas impositivas, tasas de interés, niveles de deuda y
            ahorro, tasa de empleo, índices de precio, etc.</p>

        <p><strong>Sociales:</strong> se enfoca a las fuerzas que actúan dentro de la sociedad y que afectan a las
            actitudes, opiniones e intereses de las personas. Varían de un país a otro de forma notable. Ejemplos de
            estas variables son: estratos demográficos, estilos de vida, distribuciones del ingreso, ocio, factores
            étnicos y religiosos, etc.</p>

        <p><strong>Tecnológicos:</strong> este factor es muy importante para casi toda la totalidad de las empresas
            industriales. La tecnología es una fuerza impulsora de negocios, mejora la calidad y puede reducir los
            tiempos para el mercadeo. La tecnología puede por tanto eliminar las barreras de entrada pero a veces es
            difícil la asimilación y adaptación de los cambios tecnológicos por la velocidad de los mismos. Ejemplos de
            esta variable son: las tasas de obsolescencia tecnológica, los incentivos a la modernización tecnológica, la
            automatización de los procesos de producción, el impacto de las tecnologías de información, etc.</p>

        <p>El siguiente gráfico reflejará la valoración obtenida en cada una de las variables del diagnóstico
            macro-entorno.</p>

        <br>
        <canvas id="impactChart" width="800" height="400"></canvas>



        <br>


        <h4 style="text-align: center;">A continuación marque las alternativas para valorar su empresa en función de
            cada una
            de las afirmaciones, de tal forma que <br>0 = En total en desacuerdo; 1 = No está de acuerdo; 2 = Está de
            acuerdo;
            3 = Está bastante de acuerdo; 4 = En total acuerdo.</h4>

        <form id="valoracionForm" action="" method="POST">
            <table>
                <thead>
                    <tr>
                        <th>AUTODIAGNÓSTICO ENTORNO GLOBAL P.E.S.T.</th>
                        <th>VALORACIÓN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < 25; $i++): ?>
                        <tr>
                            <td><?php echo ($i + 1) . ". " . $preguntas[$i]; ?></td>
                            <td>
                                <input type="radio" name="valoracion<?php echo ($i + 1); ?>" value="0" <?php echo (isset($valoraciones[$i + 1]) && $valoraciones[$i + 1] == '0') ? 'checked' : ''; ?>
                                    onchange="calcularPotencial(<?php echo ceil(($i + 1) / 5); ?>)"> 0
                                <input type="radio" name="valoracion<?php echo ($i + 1); ?>" value="1" <?php echo (isset($valoraciones[$i + 1]) && $valoraciones[$i + 1] == '1') ? 'checked' : ''; ?>
                                    onchange="calcularPotencial(<?php echo ceil(($i + 1) / 5); ?>)"> 1
                                <input type="radio" name="valoracion<?php echo ($i + 1); ?>" value="2" <?php echo (isset($valoraciones[$i + 1]) && $valoraciones[$i + 1] == '2') ? 'checked' : ''; ?>
                                    onchange="calcularPotencial(<?php echo ceil(($i + 1) / 5); ?>)"> 2
                                <input type="radio" name="valoracion<?php echo ($i + 1); ?>" value="3" <?php echo (isset($valoraciones[$i + 1]) && $valoraciones[$i + 1] == '3') ? 'checked' : ''; ?>
                                    onchange="calcularPotencial(<?php echo ceil(($i + 1) / 5); ?>)"> 3
                                <input type="radio" name="valoracion<?php echo ($i + 1); ?>" value="4" <?php echo (isset($valoraciones[$i + 1]) && $valoraciones[$i + 1] == '4') ? 'checked' : ''; ?>
                                    onchange="calcularPotencial(<?php echo ceil(($i + 1) / 5); ?>)"> 4
                            </td>
                        </tr>
                    <?php endfor; ?>
                    <tr>
                        <td colspan="2" class="impacto" id="mensajeImpacto1"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="impacto" id="mensajeImpacto2"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="impacto" id="mensajeImpacto3"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="impacto" id="mensajeImpacto4"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="impacto" id="mensajeImpacto5"></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h4 style="text-align: center;">A partir de la conclusión obtenida en el diagnóstico en cada uno de los
                factores, determine las oportunidades y amenazas más relevantes que desee que se reflejen en el análisis
                FODA de su Plan Estratégico
            </h4>

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

                .oportunidades-table th {
                    background-color: #edb963;
                    /* Color de fondo para Oportunidades */
                }

                .amenazas-table th {
                    background-color: #9dd0ff;
                    /* Color de fondo para Amenazas */
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
                <table class="oportunidades-table">
                    <tr>
                        <th colspan="2">OPORTUNIDADES</th>
                    </tr>
                    <tr>
                        <td class="label-cell">O1:</td>
                        <td class="input-cell"><input type="text" name="oportunidades[]"
                                value="<?php echo isset($oportunidades[0]) ? htmlspecialchars($oportunidades[0]) : ''; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td class="label-cell">O2:</td>
                        <td class="input-cell"><input type="text" name="oportunidades[]"
                                value="<?php echo isset($oportunidades[1]) ? htmlspecialchars($oportunidades[1]) : ''; ?>" />
                        </td>
                    </tr>
                </table>

                <table class="amenazas-table">
                    <tr>
                        <th colspan="2">AMENAZAS</th>
                    </tr>
                    <tr>
                        <td class="label-cell">A1:</td>
                        <td class="input-cell"><input type="text" name="amenazas[]"
                                value="<?php echo isset($amenazas[0]) ? htmlspecialchars($amenazas[0]) : ''; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td class="label-cell">A2:</td>
                        <td class="input-cell"><input type="text" name="amenazas[]"
                                value="<?php echo isset($amenazas[1]) ? htmlspecialchars($amenazas[1]) : ''; ?>" />
                        </td>
                    </tr>
                </table>
            </div>
            <br>
            <style>
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
            <a class="info-item" href="../Formularios/5_fuerzas_porter.php">8. ANÁLISIS PORTER</a>
            <a class="info-item" href="../Formularios/identificacion.php">10. IDENTIFICACIÓN DE ESTRATEGIAS</a>
        </div>
    </div>
    <script>
        // Función para calcular la media y mostrar el mensaje de impacto
        function calcularPotencial() {
            const valoraciones = [];
            for (let i = 1; i <= 25; i++) {
                let valor = document.querySelector(`input[name="valoracion${i}"]:checked`);
                if (valor) {
                    valoraciones.push(parseInt(valor.value));
                }
            }

            // Definir los mensajes específicos para cada factor
            const factores = [
                "factores sociales y demográficos",
                "factores políticos",
                "factores económicos",
                "factores tecnológicos",
                "el factor medioambiental"
            ];

            // Recorrer las filas de impacto y actualizar los mensajes
            for (let j = 0; j < 5; j++) {
                let filaStart = j * 5; // Cada fila de 5 preguntas
                let filaEnd = filaStart + 5;
                let valores = valoraciones.slice(filaStart, filaEnd);

                if (valores.length === 5) {
                    // Cálculo de la media de las valoraciones para el grupo de 5 preguntas
                    const total = valores.reduce((acc, val) => acc + val, 0);
                    const media = total / valores.length;

                    let mensaje = '';
                    if (media >= 0 && media <= 2) {
                        mensaje = `NO HAY UN NOTABLE IMPACTO DE ${factores[j].toUpperCase()} EN EL FUNCIONAMIENTO DE LA EMPRESA`;
                    } else if (media > 2) {
                        mensaje = `HAY UN NOTABLE IMPACTO DE ${factores[j].toUpperCase()} EN EL FUNCIONAMIENTO DE LA EMPRESA`;
                    }

                    // Actualizar el mensaje en la fila correspondiente
                    document.getElementById(`mensajeImpacto${j + 1}`).innerText = mensaje;
                }
            }
        }
    </script>
    <script>
        // Obtener el contexto del canvas
        const ctx = document.getElementById("impactChart").getContext("2d");

        // Configuración inicial del gráfico
        const chartData = {
            labels: [
                "Factores Sociales y Demográficos",
                "Factores Políticos",
                "Factores Económicos",
                "Factores Tecnológicos",
                "Factores Medioambientales",
            ],
            datasets: [
                {
                    label: "Nivel de Impacto (%)",
                    data: [0, 0, 0, 0, 0], // Valores iniciales
                    backgroundColor: [
                        "rgba(75, 192, 192, 0.6)",
                        "rgba(54, 162, 235, 0.6)",
                        "rgba(255, 206, 86, 0.6)",
                        "rgba(153, 102, 255, 0.6)",
                        "rgba(255, 99, 132, 0.6)",
                    ],
                    borderColor: [
                        "rgba(75, 192, 192, 1)",
                        "rgba(54, 162, 235, 1)",
                        "rgba(255, 206, 86, 1)",
                        "rgba(153, 102, 255, 1)",
                        "rgba(255, 99, 132, 1)",
                    ],
                    borderWidth: 1,
                },
            ],
        };

        const config = {
            type: "bar",
            data: chartData,
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }, // Ocultar la leyenda
                    tooltip: { enabled: true },
                },
                scales: {
                    x: {
                        title: { display: true, text: "Tipología de Factores Generales Externos" },
                    },
                    y: {
                        title: { display: true, text: "Nivel de Impacto de Factores Generales (%)" },
                        min: 0,
                        max: 120,
                        ticks: { stepSize: 20 },
                    },
                },
            },
        };

        const impactChart = new Chart(ctx, config);

        // Función para calcular los valores de impacto y actualizar el gráfico
        function actualizarGrafico() {
            const valoraciones = [];
            for (let i = 1; i <= 25; i++) {
                let valor = document.querySelector(`input[name="valoracion${i}"]:checked`);
                if (valor) {
                    valoraciones.push(parseInt(valor.value));
                }
            }

            const impactos = [];

            for (let j = 0; j < 5; j++) {
                let filaStart = j * 5; // Cada grupo de 5 preguntas
                let filaEnd = filaStart + 5;
                let valores = valoraciones.slice(filaStart, filaEnd);

                if (valores.length === 5) {
                    // Cálculo de la media de las valoraciones
                    const total = valores.reduce((acc, val) => acc + val, 0);
                    const media = total / valores.length;

                    // Escalar la media al rango de 0 a 120
                    const impacto = Math.round((media / 4) * 120);
                    impactos.push(impacto);
                } else {
                    impactos.push(0); // Si no hay suficientes datos, impacto es 0
                }
            }

            // Actualizar los datos del gráfico
            chartData.datasets[0].data = impactos;
            impactChart.update();
        }

        // Escuchar cambios en las selecciones
        document.querySelectorAll('input[type="radio"]').forEach((radio) => {
            radio.addEventListener("change", actualizarGrafico);
        });
    </script>

</body>

</html>