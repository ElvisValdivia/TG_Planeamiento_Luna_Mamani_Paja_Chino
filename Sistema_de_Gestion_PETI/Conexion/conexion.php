<?php
// Datos de conexión
$servidor = "localhost";
$usuario = "root";
$contrasena = ""; // Asegúrate de que este campo esté vacío o que contenga la contraseña correcta
$base_datos = "bd_peti";
$puerto = "3306"; // Puerto especificado

// Crear conexión
$conn = new mysqli($servidor, $usuario, $contrasena, $base_datos, $puerto);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Establecer la codificación de la conexión a UTF-8
$conn->set_charset("utf8mb4");
?>
