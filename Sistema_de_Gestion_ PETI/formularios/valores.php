<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Valores</title>
</head>
<body>
    <h2>Formulario de Valores</h2>
    <form method="post" action="">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="email">Correo Electrónico:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="edad">Edad:</label><br>
        <input type="number" id="edad" name="edad" required><br><br>

        <label for="mensaje">Mensaje:</label><br>
        <textarea id="mensaje" name="mensaje" rows="4" cols="50"></textarea><br><br>

        <input type="submit" name="enviar" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recibiendo los valores del formulario
        $nombre = htmlspecialchars($_POST['nombre']);
        $email = htmlspecialchars($_POST['email']);
        $edad = htmlspecialchars($_POST['edad']);
        $mensaje = htmlspecialchars($_POST['mensaje']);

        // Mostrando los valores
        echo "<h3>Datos Recibidos:</h3>";
        echo "Nombre: " . $nombre . "<br>";
        echo "Correo Electrónico: " . $email . "<br>";
        echo "Edad: " . $edad . "<br>";
        echo "Mensaje: " . $mensaje . "<br>";
    }
    ?>
</body>
</html>
