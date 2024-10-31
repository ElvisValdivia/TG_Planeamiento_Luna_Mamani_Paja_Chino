<?php
session_start(); // Iniciar la sesión

// Habilitar la visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir el archivo de conexión a la base de datos
include('../Conexion/conexion.php');

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../InicioSesion/login.php");
    exit();
}

// Obtener el ID del usuario desde la sesión
$id_usuario = $_SESSION['usuario_id'];

// Consulta para obtener `unidad_estrategica` desde la base de datos para el usuario actual
$sql = "SELECT unidad_estrategica FROM empresa WHERE id_usuario = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $stmt->bind_result($unidadEstrategica);
    $stmt->fetch();
    $stmt->close();
}

// Inicializar variables para almacenar los datos de la base de datos
$mision = '';
$objetivos_generales = ["", "", ""]; // Valor por defecto en caso de no obtener datos
$objetivos_especificos = [[""], [""], [""]]; // Valor por defecto en caso de no obtener datos

// Consultar la misión, objetivos generales y específicos de la base de datos
$sql = "SELECT mision, objetivos_generales, objetivos_especificos FROM empresa WHERE id_usuario = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $stmt->bind_result($mision, $objetivos_generales_str, $objetivos_especificos_str);
    if ($stmt->fetch()) {
        // Convertir los datos de la base de datos a arreglos si existen valores
        $objetivos_generales = $objetivos_generales_str ? explode(", ", $objetivos_generales_str) : ["", "", ""];
        $objetivos_especificos = $objetivos_especificos_str ? array_map(function ($obj) {
            return explode(", ", $obj);
        }, explode("], [", trim($objetivos_especificos_str, "[]"))) : [[""], [""], [""]];
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Objetivos Estratégicos</title>
    <link rel="stylesheet" href="../css/objetivos.css">
</head>

<body>
    <a class="volver" href="../principal.php">INDICE</a>

    <div class="container">
        <h1>4. OBJETIVOS ESTRATÉGICOS</h1>
        <p>El siguiente paso es establecer los objetivos de una empresa en relación al sector al que pertenece.</p>
        <p>Un <strong>OBJETIVO ESTRATÉGICO</strong> es un fin deseado, clave para la organización y para la consecución
            de su visión. Para una correcta planificación construya los objetivos formando una pirámide. Los objetivos
            de cada nivel indican qué es lo que quiere lograrse, siendo la estructura de objetivos que está en el nivel
            inmediatamente inferior la que indica el cómo. Por tanto, cada objetivo es un fin en sí mismo, pero también
            a la vez un medio para el logro de los objetivos del nivel superior.</p>

        <div class="triangulo">
            <div class="rectangulo rectangulo1">Misión, Visión y Valores</div>
            <div class="rectangulo rectangulo2">Objetivos Estratégicos o Generales</div>
            <div class="rectangulo rectangulo3">Objetivos Específicos</div>
        </div>

        <p><strong>Objetivos estratégicos:</strong> Concretan el contenido de la misión. Suelen referirse al
            crecimiento, rentabilidad y a la sostenibilidad de la empresa. Su horizonte es entre 3 a 5 años.</p>
        <p><strong>Objetivos operativos:</strong> Son la concreción anual de los objetivos estratégicos. Han de ser
            claros, concisos y medibles. Se puede distinguir dos tipos de objetivos específicos:</p>
        <ol>
            <li><strong>Funcionales:</strong> objetivos formulados por áreas o departamentos.</li>
            <li><strong>Operativos:</strong> objetivos que se centran en operaciones y acciones concretas.</li>
        </ol>

        <p style="text-align: center;">Cualquier objetivo formulado tiene que presentar los siguientes atributos:</p>

        <!-- Tabla de METAS -->
        <table class="metas-table">
            <tr>
                <th>M</th>
                <td><strong>MEDIBLES:</strong> que se les pueda asignar indicadores cuantitativos</td>
            </tr>
            <tr>
                <th>E</th>
                <td><strong>ESPECÍFICOS:</strong> que sean enunciados de forma clara, breve y comprensible</td>
            </tr>
            <tr>
                <th>T</th>
                <td><strong>TRAZABLES:</strong> que permita un registro de seguimiento y control</td>
            </tr>
            <tr>
                <th>A</th>
                <td><strong>ALCANZABLES:</strong> realistas y motivadores</td>
            </tr>
            <tr>
                <th>S</th>
                <td><strong>SENSATOS:</strong> lógicos y consecuentes con los recursos disponibles</td>
            </tr>
        </table>

        <div class="ejemplos">
            <h3>EJEMPLOS</h3>
            <h3>Empresa de servicios</h3>
            <ul>
                <li>Alcanzar los niveles de ventas previstos para los nuevos productos</li>
                <li>Reducir la rotación del personal del almacén</li>
                <li>Reducir el plazo de cobro de los clientes</li>
                <li>Reducir la siniestralidad al nivel fijado</li>
                <li>Alcanzar los objetivos de beneficios previstos</li>
                <li>Mejorar la claridad de entrega de los productos en el plazo previsto</li>
            </ul>
        </div>

        <p>En empresas de gran tamaño, se pueden formular los objetivos estratégicos en función de sus diferentes
            <strong>unidades estratégicas de negocio</strong> (UEN). Estas UEN se hacen especialmente necesarias en las
            empresas diversificadas o con multiactividad donde la heterogeneidad de los distintos negocios hace inviable
            un tratamiento estratégico conjunto de los mismos.
        </p>

        <p>Se entiende por unidad estratégica de negocio (UEN) ("strategic business unit" [SBU]) <strong>un conjunto
                homogéneo de actividades o negocios, desde el punto de vista estratégico, es decir, para el cual es
                posible formular una estrategia común y a su vez diferente de la estrategia adecuada para otras
                actividades y/o unidades estratégicas.</strong> La estrategia de cada unidad es autónoma, pero no
            independiente de las demás unidades estratégicas, puesto que se integran en la estrategia de la empresa.</p>

        <h5 style="text-align: center; font-size: 18px;">¿Cómo podemos identificar a las UEN?</h5>

        <p> La identificación de las UEN se puede realizar a partir de las tres siguientes dimensiones:</p>
        <p>•<strong> Grupos de clientes:</strong> Que atiende al tipo de clientela al cual va destinado el producto o
            servicio.</p>
        <p>•<strong> Funciones:</strong> Necesidades cubiertas por el producto o servicio.</p>
        <p>•<strong> Tecnología:</strong> Forma en la cual la empresa cubre a través del producto o servicio la
            necesidad de la clientela.</p>

        <form action="guardarObj.php" method="POST">
            <h4 style="text-align: center;">En su caso, comente en este apartado las distintas UEN que tiene su empresa
            </h4>
            <div style="display: flex; justify-content: center;">
                <table border="1" cellpadding="10">
                    <tr>
                        <td>
                            <textarea name="unidad_estrategica" rows="10"
                                cols="80"><?php echo htmlspecialchars($unidadEstrategica ?? ''); ?></textarea>
                        </td>
                    </tr>
                </table>
            </div>
            <br>

            <h4 style="text-align: center;">A continuación reflexione sobre la misión, visión y valores definidos y
                establezca los objetivos estratégicos y específicos de su empresa. Le proponemos que comience con
                definir 3
                objetivos estratégicos y dos específicos para cada uno de ellos</h4>

            <table>
                <tr>
                    <th>MISIÓN</th>
                    <th>OBJETIVOS GENERALES O ESTRATÉGICOS</th>
                    <th>OBJETIVOS ESPECÍFICOS</th>
                </tr>
                <tr>
                    <td rowspan="3">
                        <textarea name="mision" rows="5"
                            cols="30"><?php echo htmlspecialchars($mision ?? ''); ?></textarea>
                    </td>
                    <td>
                        <textarea name="objetivos_generales[]" rows="5"
                            cols="30"><?php echo htmlspecialchars($objetivos_generales[0] ?? ''); ?></textarea>
                    </td>
                    <td>
                        <textarea name="objetivos_especificos[0][]" rows="5"
                            cols="30"><?php echo htmlspecialchars($objetivos_especificos[0][0] ?? ''); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea name="objetivos_generales[]" rows="5"
                            cols="30"><?php echo htmlspecialchars($objetivos_generales[1] ?? ''); ?></textarea>
                    </td>
                    <td>
                        <textarea name="objetivos_especificos[1][]" rows="5"
                            cols="30"><?php echo htmlspecialchars($objetivos_especificos[0][1] ?? ''); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea name="objetivos_generales[]" rows="5"
                            cols="30"><?php echo htmlspecialchars($objetivos_generales[2] ?? ''); ?></textarea>
                    </td>
                    <td>
                        <textarea name="objetivos_especificos[2][]" rows="5"
                            cols="30"><?php echo htmlspecialchars($objetivos_especificos[0][2] ?? ''); ?></textarea>
                    </td>
                </tr>
            </table>
            <input type="submit" value="Guardar">
        </form>



        <div class="info-box">
            <a class="info-item" href="../Formularios/valores.php">3. VALORES</a>
            <a class="info-item" href="../Formularios/analisisIE.php">5. ANÁLISIS INTERNO Y EXTERNO</a>
        </div>

        <?php
        // Mostrar mensaje si existe
        if (isset($_SESSION['mensaje'])) {
            echo "<div class='mensaje'>" . $_SESSION['mensaje'] . "</div>";
            unset($_SESSION['mensaje']); // Limpiar mensaje después de mostrar
        }
        ?>
    </div>
</body>

</html>