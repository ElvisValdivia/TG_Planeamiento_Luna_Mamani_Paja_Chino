<?php
// Incluir el archivo de conexión a la base de datos
include('../Conexion/conexion.php'); // Asegúrate de que la ruta sea correcta

session_start(); // Iniciar la sesión

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Preparar la consulta para verificar las credenciales
    $sql = "SELECT * FROM usuarios WHERE usuario = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $username); // Bind del parámetro

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                // Si el usuario existe, obtener los datos
                $row = $result->fetch_assoc();
                
                // Verificar la contraseña
                if ($password === $row['contraseña']) { // Asegúrate de que las contraseñas sean en texto plano
                    // Autenticación exitosa
                    $_SESSION['usuario_id'] = $row['id']; // Guardar el ID del usuario
                    header("Location: ../principal.php");
                    exit();
                } else {
                    // Contraseña incorrecta
                    $mensaje = "Usuario o contraseña incorrectos.";
                }
            } else {
                // Usuario no encontrado
                $mensaje = "Usuario o contraseña incorrectos.";
            }
        } else {
            $mensaje = "Error en la ejecución de la consulta: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        $mensaje = "Error en la preparación de la consulta: " . $conn->error;
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" type="text/css" href="../css/Login.css">
</head>
<body>
    <div class="box">
        <div class="container">
            <header>Iniciar Sesión</header>
            
            <form action="login.php" method="post">
                <div class="input-field">
                    <i class="icon"></i>
                    <input type="text" class="input" id="username" name="username" placeholder="Usuario" required>
                </div>
                
                <div class="input-field">
                    <i class="icon"></i>
                    <input type="password" class="input" id="password" name="password" placeholder="Contraseña" required>
                </div>
                
                <input type="submit" class="submit" value="Iniciar Sesión">
            </form>
            
            <div class="bottom">
                <div class="left">
                    <label><a href="#">¿Olvidaste tu contraseña?</a></label>
                </div>
            </div>

            <!-- Mensaje de error -->
            <?php if (isset($mensaje)): ?>
                <p style="color: red;"><?php echo $mensaje; ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
