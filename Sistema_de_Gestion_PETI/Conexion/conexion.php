<?php
$host = 'localhost';
$usuario = 'root';
$contraseña = '';
$nombre_base_datos = 'bd_peti';

$conn = new mysqli($host, $usuario, $contraseña, $nombre_base_datos);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
echo "Conexión exitosa";
?>
