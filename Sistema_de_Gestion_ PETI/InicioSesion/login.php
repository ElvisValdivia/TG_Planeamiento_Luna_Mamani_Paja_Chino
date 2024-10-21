<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/Login.css">
</head>
<body>
    <div class="box">
        <div class="container">
            <header>Iniciar Sesión</header>
            
            <form action="login.php" method="post">
                <div class="input-field">
                    <i class="icon"></i> <!-- Usa iconos si están en el diseño -->
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
