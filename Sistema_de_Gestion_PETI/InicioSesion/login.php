<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Aquí iría tu lógica de autenticación.
    // Por ejemplo, verificar las credenciales en una base de datos.
    
    // Supongamos que la autenticación es exitosa:
    $autenticado = true; // Cambia esto según tu lógica

    if ($autenticado) {
        header("Location: ../principal.php");
        exit();
    } else {
        // Manejo de error si la autenticación falla
        echo "Usuario o contraseña incorrectos.";
    }
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
        </div>
    </div>
</body>
</html>
