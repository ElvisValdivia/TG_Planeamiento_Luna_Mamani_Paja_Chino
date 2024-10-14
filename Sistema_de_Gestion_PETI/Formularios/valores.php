<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Valores</title>
    <link rel="stylesheet" href="../css/valores.css"> <!-- Enlace al archivo CSS -->
</head>
<body>

<div class="container">
    <header>
        <h1>INDICE</h1>
    </header>
    <h2>3. VALORES</h2>
    
    <div class="info">
        <p>Empresa</p>
        <p>Los VALORES de una empresa son el conjunto de principios, reglas y aspectos culturales con los que se rige la organización. 
            Son las pautas de comportamiento de la empresa y generalmente son pocos, entre 3 y 6. Son tan fundamentales y tan arraigados que casi nunca cambian.</p>
        <p>Agencia de certificación</p>
        <ul>
            <li>Integridad y ética</li>
            <li>Consejo y validación imparciales</li>
            <li>Respeto por todas las personas</li>
            <li>Responsabilidad social y medioambiental</li>
        </ul>
    </div>

    <div class="form-section">
        <p class="instructions">En este apartado exponga los Valores de su empresa</p>
        <form method="post" action="">
            <label for="valor1">Valor 1:</label>
            <input type="text" id="valor1" name="valor1" required>
            
            <label for="valor2">Valor 2:</label>
            <input type="text" id="valor2" name="valor2" required>
            
            <label for="valor3">Valor 3:</label>
            <input type="text" id="valor3" name="valor3" required>
            
            <label for="valor4">Valor 4:</label>
            <input type="text" id="valor4" name="valor4" required>

            <label for="valor5">Valor 5:</label>
            <input type="text" id="valor5" name="valor5" required>

            <div class="submit-container">
                <input type="submit" name="anterior" value="2. VISIÓN">
                <input type="submit" name="siguiente" value="4. OBJETIVOS ESTRATÉGICOS">
            </div>
        </form>
    </div>

    <?php
    // Manejo de la respuesta del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $valores = [
            htmlspecialchars($_POST['valor1']),
            htmlspecialchars($_POST['valor2']),
            htmlspecialchars($_POST['valor3']),
            htmlspecialchars($_POST['valor4']),
            htmlspecialchars($_POST['valor5']),
        ];

        // Mostrar los valores recibidos
        echo "<h3>Valores recibidos:</h3>";
        foreach ($valores as $valor) {
            echo $valor . "<br>";
        }
    }
    ?>
</div>

</body>
</html>
