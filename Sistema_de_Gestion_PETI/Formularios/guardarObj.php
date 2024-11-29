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

// Inicializar variable para el mensaje
$mensaje = '';

// Verificar si se envió el formulario con los objetivos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $mision = $_POST['mision'] ?? ''; // Obtener misión (o un valor vacío si no se encuentra)
    $objetivos_generales = $_POST['objetivos_generales'] ?? []; // Objetivos generales
    $objetivos_especificos = $_POST['objetivos_especificos'] ?? []; // Objetivos específicos
    $unidad_estrategica = $_POST['unidad_estrategica'] ?? ''; // Obtener unidad estratégica

    // Convertir los arreglos en cadenas separadas por comas para almacenar en la base de datos
    $objetivos_generales_str = implode(", ", $objetivos_generales);
    $objetivos_especificos_str = implode(", ", array_map(function($obj) {
        return implode(", ", $obj);
    }, $objetivos_especificos));

    // Preparar la consulta para actualizar los objetivos, misión y unidad estratégica
    $sql = "UPDATE empresa SET mision = ?, objetivos_generales = ?, objetivos_especificos = ?, unidad_estrategica = ? WHERE id_usuario = ?";

    // Preparar la consulta
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssi", $mision, $objetivos_generales_str, $objetivos_especificos_str, $unidad_estrategica, $id_usuario);
        
        // Ejecutar la consulta y manejar el resultado
        if ($stmt->execute()) {
            // Establecer el mensaje de éxito en la sesión
            $_SESSION['mensaje'] = "La misión, los objetivos y la unidad estratégica se han actualizado correctamente.";
        } else {
            $_SESSION['mensaje'] = "Error al actualizar los datos: " . $stmt->error;
        }
        
        $stmt->close(); // Cerrar la declaración después de su uso
    } else {
        $_SESSION['mensaje'] = "Error en la preparación de la consulta: " . $conn->error;
    }

    $conn->close(); // Cerrar la conexión a la base de datos

    // Redirigir a objetivos.php
    header("Location: objetivos.php");
    exit(); // Asegúrate de salir después de redirigir
}
?>
