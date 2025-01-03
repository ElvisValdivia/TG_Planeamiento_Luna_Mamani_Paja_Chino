<?php
// Incluir el archivo de conexión
include '../conexion/Conexion.php'; // Ajusta la ruta si es necesario

// Inicializar variable para el mensaje de éxito y el contenido actual de visión
$mensaje = '';
$visionActual = '';

// Verificar la conexión desde Conexion.php
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del usuario desde la sesión o establecer un ID por defecto
$id_usuario = 1; // Cambia esto según el ID del usuario que quieres asociar

// Cargar el valor actual de visión al cargar la página
$sqlSelect = "SELECT vision FROM empresa WHERE id_usuario = ?";
$stmtSelect = $conn->prepare($sqlSelect);
$stmtSelect->bind_param("i", $id_usuario);
$stmtSelect->execute();
$stmtSelect->bind_result($visionActual);
$stmtSelect->fetch();
$stmtSelect->close();

// Manejar la inserción de la visión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vision = $_POST['vision'];

    // Preparar la consulta para actualizar el campo 'vision' en la tabla 'empresa'
    $sqlUpdate = "UPDATE empresa SET vision = ? WHERE id_usuario = ?";
    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bind_param("si", $vision, $id_usuario);

    if ($stmtUpdate->execute()) {
        $mensaje = "<p style='color: green;'>Visión guardada con éxito.</p>";
        $visionActual = $vision; // Actualizar el valor mostrado con el nuevo valor guardado
    } else {
        $mensaje = "<p style='color: red;'>Error al guardar la visión: " . $stmtUpdate->error . "</p>";
    }

    $stmtUpdate->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visión</title>
    <link rel="stylesheet" href="../css/vision.css">
</head>
<body>
    <a class="volver" href="../principal.php">INDICE</a>

    <div class="container">
        <h1>2. VISIÓN</h1>
        <p>
            La <strong>VISIÓN</strong> de una empresa define lo que la empresa/organización quiere lograr en el futuro.
            Es lo que la organización aspira a ser en torno a 2 - 3 años.
        </p>
        <p>
            • Debe ser retadora, positiva, compartida y coherente con la misión.<br>
            • Marca el fin último que la estrategia debe seguir.<br>
            • Proyecta la imagen de éxito que se pretende alcanzar.
        </p>
        <p>
            La visión debe ser conocida y compartida por todos los miembros de la empresa y también por aquellos que se
            relacionan con ella.
        </p>

        <div class="ejemplos">
            <h3>EJEMPLOS</h3>
            <h3>Empresa de servicios</h3>
            <h2>Ser el grupo empresarial de referencia en nuestras áreas de actividad.</h2>
            <br>
            <h3>Empresa productora de café</h3>
            <h2>
                Queremos ser en el mundo el punto de referencia de la cultura y la excelencia del café.
                Una empresa innovadora que propone los mejores productos y lugares de consumo y que, gracias a ello,
                ofrece y se convierte en líder de alta gama.
            </h2>
            <br>
            <h3>Agencia de certificación</h3>
            <h2>
                Ser líderes en nuestro sector y un actor principal en todos los segmentos de mercado en los que estamos
                presentes,
                en los mercados clave.
            </h2>
        </div>

        <h4>En este apartado describa la Visión de su empresa</h4>

        <form action="vision.php" method="POST">
            <textarea name="vision" rows="5" style="width: 100%;"><?= htmlspecialchars($visionActual); ?></textarea>
            <button type="submit" style="margin-top: 10px; padding: 10px; background-color: #2596be; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                Guardar Visión
            </button>
            <!-- Mostrar el mensaje debajo del botón -->
            <?= $mensaje; ?>
        </form>

        <div class="mision-vision-relacion">
            <p style="font-weight: bold; font-style: italic; font-size: 18px; text-align: center;">Relación entre Misión
                y Visión</p>

            <div class="relacion">
                <div class="mision">
                    <div class="elipse">
                        <p style="color: white; font-weight: bold;">Misión</p>
                    </div>
                    <p style="font-weight: bold;">¿Cuál es la situación actual?</p>
                </div>
                <div class="procesos">
                    <div class="flecha">
                        <p style="color: white; font-weight: bold;">Procesos cotidianos</p>
                    </div>
                    <p style="font-weight: bold;">¿Qué camino a seguir?</p>
                </div>
                <div class="vision">
                    <div class="elipse">
                        <p style="color: white; font-weight: bold;">Visión</p>
                    </div>
                    <p style="font-weight: bold;">¿Cuál es la situación futura?</p>
                </div>
            </div>
        </div>

        <div class="info-box">
            <a class="info-item" href="../Formularios/mision.php">1. MISIÓN</a>
            <a class="info-item" href="../Formularios/valores.php">3. VALORES</a>
        </div>
    </div>
</body>
</html>
