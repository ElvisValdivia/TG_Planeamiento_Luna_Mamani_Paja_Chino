<?php
session_start();
include('../Conexion/conexion.php');

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../InicioSesion/login.php");
    exit();
}

$id_usuario = $_SESSION['usuario_id'];

// Obtener los datos actuales
$sql = "SELECT mision, vision, valores, unidad_estrategica, objetivos_generales, objetivos_especificos, fortalezas, debilidades, oportunidades, amenazas FROM empresa WHERE id_usuario = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $stmt->bind_result($misionGuardada, $visionGuardada, $valoresGuardados, $unidadesEstrategicasGuardadas, $objetivosGeneralesGuardados, $objetivosEspecificosGuardados, $fortalezasGuardadas, $debilidadesGuardadas, $oportunidadesGuardadas, $amenazasGuardadas);
    $stmt->fetch();
    $stmt->close();
}

// Convertir los valores guardados en arrays
$valoresArray = explode(', ', $valoresGuardados);
$unidadesEstrategicasArray = explode(', ', $unidadesEstrategicasGuardadas);
$objetivosGeneralesArray = explode(', ', $objetivosGeneralesGuardados);
$objetivosEspecificosArray = explode(', ', $objetivosEspecificosGuardados);
$fortalezasArray = explode(', ', $fortalezasGuardadas);
$debilidadesArray = explode(', ', $debilidadesGuardadas);
$oportunidadesArray = explode(', ', $oportunidadesGuardadas);
$amenazasArray = explode(', ', $amenazasGuardadas);

// Generar la fecha actual para mostrarla
$fechaActual = date("Y-m-d H:i:s");

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen Ejecutivo</title>
    <link rel="stylesheet" href="../css/resumen.css">
</head>

<body>
    <a class="volver" href="../principal.php">INDICE</a>

    <div class="container">
        <h1>Resumen Ejecutivo del Plan Estratégico</h1>

        <!-- Nombre de la empresa / proyecto -->
        <div class="info-box">
            <label for="nombre_empresa"><strong>Nombre de la empresa / proyecto:</strong></label>
            <input type="text" id="nombre_empresa" name="nombre_empresa" placeholder="Introduzca el nombre de la empresa / proyecto" />
        </div>

        <!-- Fecha de elaboración -->
        <div class="info-box">
            <label for="fecha_elaboracion"><strong>Fecha de elaboración:</strong></label>
            <input type="text" id="fecha_elaboracion" name="fecha_elaboracion" value="<?php echo $fechaActual; ?>" readonly />
        </div>

        <!-- Emprendedores / promotores -->
        <div class="info-box">
            <label for="emprendedores"><strong>Emprendedores / promotores:</strong></label>
            <input type="text" id="emprendedores" name="emprendedores" placeholder="Introduzca el/los nombre/s de el/los promotor/es del proyecto" />
        </div>

        <div class="mision-container">
            <div class="mision-title">
                <h2>MISIÓN</h2>
            </div>
            <div class="mision-rectangulo">
                <p><?php echo htmlspecialchars($misionGuardada); ?></p>
            </div>
        </div>

        <div class="mision-container">
            <div class="mision-title">
                <h2>VISIÓN</h2>
            </div>
            <div class="mision-rectangulo">
                <p><?php echo htmlspecialchars($visionGuardada); ?></p>
            </div>
        </div>

        <div class="mision-container">
            <div class="mision-title">
                <h2>VALORES</h2>
            </div>
            <div class="valores-rectangulo">
                <?php foreach ($valoresArray as $valor): ?>
                    <div class="valor-row">
                        <p><?php echo htmlspecialchars($valor); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="mision-container">
            <div class="mision-title">
                <h2>UNIDADES ESTRATÉGICAS</h2>
            </div>
            <div class="mision-rectangulo">
                <?php foreach ($unidadesEstrategicasArray as $unidad): ?>
                    <div class="unidad-row">
                        <p><?php echo htmlspecialchars($unidad); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="mision-container">
            <div class="mision-title">
                <h2>OBJETIVOS ESTRATÉGICOS</h2>
            </div>
            <div class="mision-rectangulo">
                <table>
                    <tr>
                        <th>MISIÓN</th>
                        <th>OBJETIVOS GENERALES O ESTRATÉGICOS</th>
                        <th>OBJETIVOS ESPECÍFICOS</th>
                    </tr>
                    <?php for ($i = 0; $i < 3; $i++): ?>
                        <tr>
                            <td>
                                <p><?php echo htmlspecialchars($misionGuardada); ?></p>
                            </td>
                            <td>
                                <p><?php echo htmlspecialchars($objetivosGeneralesArray[$i] ?? ''); ?></p>
                            </td>
                            <td>
                                <p><?php echo htmlspecialchars($objetivosEspecificosArray[$i] ?? ''); ?></p>
                            </td>
                        </tr>
                    <?php endfor; ?>
                </table>
            </div>
        </div>

        <div class="mision-container">
            <div class="mision-title">
                <h2>ANÁLISIS FODA</h2>
            </div>

            <table class="foda-table">
                <tr>
                    <th colspan="2">FORTALEZAS</th>
                </tr>
                <?php foreach ($fortalezasArray as $index => $fortaleza): ?>
                    <tr>
                        <td class="label-cell">F<?php echo $index + 1; ?>:</td>
                        <td class="input-cell">
                            <p><?php echo htmlspecialchars($fortaleza); ?></p>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <tr>
                    <th colspan="2">DEBILIDADES</th>
                </tr>
                <?php foreach ($debilidadesArray as $index => $debilidad): ?>
                    <tr>
                        <td class="label-cell">D<?php echo $index + 1; ?>:</td>
                        <td class="input-cell">
                            <p><?php echo htmlspecialchars($debilidad); ?></p>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <tr>
                    <th colspan="2">OPORTUNIDADES</th>
                </tr>
                <?php foreach ($oportunidadesArray as $index => $oportunidad): ?>
                    <tr>
                        <td class="label-cell">O<?php echo $index + 1; ?>:</td>
                        <td class="input-cell">
                            <p><?php echo htmlspecialchars($oportunidad); ?></p>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <tr>
                    <th colspan="2">AMENAZAS</th>
                </tr>
                <?php foreach ($amenazasArray as $index => $amenaza): ?>
                    <tr>
                        <td class="label-cell">A<?php echo $index + 1; ?>:</td>
                        <td class="input-cell">
                            <p><?php echo htmlspecialchars($amenaza); ?></p>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </div>
</body>

</html>
