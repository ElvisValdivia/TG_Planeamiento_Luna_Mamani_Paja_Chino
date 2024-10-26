<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario de Valores</title>
    <link rel="stylesheet" href="../css/valores.css">

    <script>
        function verificarCampos() {
            const campos = document.querySelectorAll('.valor-campo');
            let completado = true;

            campos.forEach((campo) => {
                if (campo.style.display !== 'none' && campo.querySelector('input').value.trim() === '') {
                    completado = false;
                }
            });

            for (let i = 0; i < campos.length; i++) {
                if (completado && campos[i].style.display === 'none') {
                    campos[i].style.display = 'block';
                    break;
                }
            }
        }

        function manejarEntrada(event) {
            verificarCampos();
        }

        function inicializarCampos() {
            const campos = document.querySelectorAll('.valor-campo');
            campos[0].style.display = 'block';
            campos[1].style.display = 'block';
            campos[2].style.display = 'block';
        }

        window.onload = inicializarCampos;
    </script>
</head>

<body>
    <a class="volver" href="../principal.php">ÍNDICE</a>
    <div class="container">

        <h1>3. VALORES</h1>

        <div class="info">
            <p>Los VALORES de una empresa son el conjunto de principios, reglas y aspectos culturales con los que se
                rige la organización. Son las pautas de comportamiento de la empresa y generalmente son pocos, entre
                3 y 6. Son tan fundamentales y tan arraigados que casi nunca cambian.</p>

            <p>Ejemplo de valores:</p>
            <ul>
                <li>Integridad</li>
                <li>Compromiso con el desarrollo humano</li>
                <li>Ética profesional</li>
                <li>Responsabilidad social</li>
                <li>Innovación</li>
                <li>Etc.</li>
            </ul>

            <div class="ejemplos">
                <h3>EJEMPLOS</h3>
                <h3>Empresa de servicios</h3>
                <ul>
                    <h2>
                        <li>La excelencia en la prestación de servicios</li>
                    </h2>
                    <h2>
                        <li>La innovación orientada a la mejora continua de procesos, productos y servicios</li>
                    </h2>
                    <h2>
                        <li>La promoción del diálogo y compromiso con los grupos de interés</li>
                    </h2>
                </ul>

                <h3>Empresa productora de café</h3>
                <h2>
                    Nuestro valor es la búsqueda de la perfección o bien la pasión por la excelencia, entendida como
                    amor por lo bello y bien hecho, y la ética, entendida como construcción de valor en el tiempo a
                    través de la sostenibilidad, la transparencia, y la valorización de las personas.
                </h2>

                <h3>Agencia de certificación</h3>
                <ul>
                    <h2>
                        <li>Integridad y ética</li>
                    </h2>
                    <h2>
                        <li>Consejo y validación imparciales</li>
                    </h2>
                    <h2>
                        <li>Respeto por todas las personas</li>
                    </h2>
                    <h2>
                        <li>Responsabilidad social y medioambiental</li>
                    </h2>
                </ul>
            </div>

        </div>
        <h4>En este apartado exponga los Valores de su empresa</h4>
        <div class="form-section">
            <form method="post" action="">
                <div class="valor-campo">
                    <label for="valor1">Valor 1:</label>
                    <input type="text" id="valor1" name="valor1" required oninput="manejarEntrada(event)">
                </div>
                <div class="valor-campo">
                    <label for="valor2">Valor 2:</label>
                    <input type="text" id="valor2" name="valor2" required oninput="manejarEntrada(event)">
                </div>
                <div class="valor-campo">
                    <label for="valor3">Valor 3:</label>
                    <input type="text" id="valor3" name="valor3" required oninput="manejarEntrada(event)">
                </div>
                <div class="valor-campo" style="display: none;">
                    <label for="valor4">Valor 4:</label>
                    <input type="text" id="valor4" name="valor4" oninput="manejarEntrada(event)"
                        placeholder="Dejar en blanco si es necesario">
                </div>
                <div class="valor-campo" style="display: none;">
                    <label for="valor5">Valor 5:</label>
                    <input type="text" id="valor5" name="valor5" oninput="manejarEntrada(event)"
                        placeholder="Dejar en blanco si es necesario">
                </div>
                <div class="valor-campo" style="display: none;">
                    <label for="valor6">Valor 6:</label>
                    <input type="text" id="valor6" name="valor6" oninput="manejarEntrada(event)"
                        placeholder="Dejar en blanco si es necesario">
                </div>

                <div class="submit-container">
                    <button type="submit" class="submit-button">Enviar</button>
                </div>

                <div class="info-box">
                    <a href="../Formularios/vision.php" class="info-item">2. VISIÓN</a>
                    <a href="../Formularios/objetivos.php" class="info-item">4. OBJETIVOS ESTRATÉGICOS</a>
                </div>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $valores = [];
            for ($i = 1; $i <= 6; $i++) {
                if (isset($_POST["valor$i"]) && $_POST["valor$i"] !== '') {
                    $valores[] = htmlspecialchars($_POST["valor$i"]);
                }
            }

            echo "<h3 class='bold'>Valores recibidos:</h3>";
            foreach ($valores as $valor) {
                echo "<p class='bold'>$valor</p>";
            }
        }
        ?>
    </div>
</body>

</html>
