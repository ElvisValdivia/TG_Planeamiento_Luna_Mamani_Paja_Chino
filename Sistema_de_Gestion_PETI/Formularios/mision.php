    <?php
    session_start(); // Iniciar la sesión

    // Incluir el archivo de conexión a la base de datos
    include('../Conexion/conexion.php'); // Asegúrate de que esta ruta sea correcta

    // Verificar si el usuario está logueado
    if (!isset($_SESSION['usuario_id'])) {
        header("Location: ../InicioSesion/login.php"); // Redirigir a la página de login si no está logueado
        exit();
    }

    // Obtener el ID del usuario desde la sesión
    $id_usuario = $_SESSION['usuario_id'];

    // Inicializar variable para el mensaje
    $mensaje = '';

    // Verificar si se envió el formulario con la misión
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $mision = $_POST['mision'];

        // Preparar la consulta para actualizar la misión
        $sql = "UPDATE empresa SET mision = ? WHERE id_usuario = ?";
        
        // Preparar la consulta
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("si", $mision, $id_usuario);
            
            if ($stmt->execute()) {
                $mensaje = "La misión se ha actualizado correctamente.";
            } else {
                $mensaje = "Error al actualizar la misión: " . $stmt->error;
            }
            
            $stmt->close(); // Cerrar la declaración después de su uso
        } else {
            $mensaje = "Error en la preparación de la consulta: " . $conn->error;
        }
    }

    // Recuperar la misión actualizada desde la base de datos
    $sql = "SELECT mision FROM empresa WHERE id_usuario = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $stmt->bind_result($misionGuardada);
        $stmt->fetch();
        $stmt->close();
    }

    $conn->close(); // Cerrar la conexión a la base de datos
    ?>

    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Misión</title>
        <link rel="stylesheet" href="../css/mision.css">
    </head>
    <body>
        <a class="volver" href="../principal.php">INDICE</a>
        
        <div class="container">
            <h1>1. MISIÓN</h1>
            <p>La <strong>MISIÓN</strong> es la razón de ser de la empresa/organización.</p>
            <p>
                • Debe ser clara, concisa y compartida.<br>
                • Siempre orientada hacia el cliente, no hacia el producto o servicio.<br>
                • Refleja el propósito fundamental de la empresa en el mercado.
            </p>
            <p>
                En términos generales describe la actividad y razón de ser de la organización y contribuye como una
                referencia permanente en el proceso de planificación estratégica.
                <br>Se expresa a través de una oración que define el propósito fundamental de su existencia, estableciendo
                qué hace la empresa, por qué y para quién lo hace.
            </p>

            <div class="ejemplos">
                <h3>EJEMPLOS</h3>
                <h3>Empresa de servicios</h3>
                <h2>La gestión de servicios que contribuyen a la calidad de vida de las personas y generan valor para los
                    grupos de interés.</h2>
                <h3>Empresa productora de café</h3>
                <h2>
                    Gracias a nuestro entusiasmo, trabajo en equipo y valores, queremos deleitar a todos aquellos que, en el
                    mundo, aman la calidad de vida a través del mejor café que la naturaleza pueda ofrecer.
                </h2>
                <h3>Agencia de certificación</h3>
                <h2>
                    Dar a nuestros clientes ahorro económico y trazabilidad de la gestión de la Calidad, la Salud y la
                    Seguridad, el Medio Ambiente y la Responsabilidad Social de sus productos y sistemas.
                </h2>
            </div>

            <h4>En este apartado describirá la Misión de su empresa.</h4>
            <form action="" method="POST">
                <textarea name="mision" rows="5" style="width: 100%;"><?php echo htmlspecialchars($misionGuardada); ?></textarea>
                <br>
                <button type="submit">Guardar</button>
            </form>

            <!-- Mensaje de éxito o error -->
            <?php if (isset($mensaje)): ?>
                <p><?php echo $mensaje; ?></p>
            <?php endif; ?>

            <div class="info-box">
                <a class="info-item" href="../principal.php">INDICE</a>
                <a class="info-item" href="../Formularios/vision.php">2. VISIÓN</a>
            </div>
        </div>
    </body>
    </html>
