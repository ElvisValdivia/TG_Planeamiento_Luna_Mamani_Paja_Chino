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
            const input = event.target;
            const key = input.id; // Obtiene el ID del campo (valor1, valor2, etc.)
            const value = input.value; // Obtiene el valor actual del campo
            localStorage.setItem(key, value); // Almacena el valor en localStorage
            verificarCampos();
        }

        function inicializarCampos() {
            const campos = document.querySelectorAll('.valor-campo');
            campos.forEach((campo) => {
                const key = campo.querySelector('input').id; // Obtiene el ID del campo
                const storedValue = localStorage.getItem(key); // Obtiene el valor almacenado
                if (storedValue) {
                    campo.querySelector('input').value = storedValue; // Restaura el valor almacenado
                }
                campo.style.display = 'block'; // Muestra todos los campos
            });
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
                    <li>La excelencia en la prestación de servicios</li>
                    <li>La innovación orientada a la mejora continua de procesos, productos y servicios</li>
                    <li>La promoción del diálogo y compromiso con los grupos de interés</li>
                </ul>

                <h3>Empresa productora de café</h3>
                <p>
                    Nuestro valor es la búsqueda de la perfección o bien la pasión por la excelencia, entendida como
                    amor por lo bello y bien hecho, y la ética, entendida como construcción de valor en el tiempo a
                    través de la sostenibilidad, la transparencia, y la valorización de las personas.
                </p>

                <h3>Agencia de certificación</h3>
                <ul>
                    <li>Integridad y ética</li>
                    <li>Consejo y validación imparciales</li>
                    <li>Respeto por todas las personas</li>
                    <li>Responsabilidad social y medioambiental</li>
                </ul>
            </div>

            <h4>En este apartado exponga los Valores de su empresa</h4>

            <div class="form-section">
                <form method="post" action="">
                    <?php
                    include '../Conexion/conexion.php'; // Asegúrate de que la ruta sea correcta

                    $id_usuario = 1; // Cambia esto según la lógica de tu aplicación
                    $valoresGuardados = [];

                    // Obtener los valores guardados de la base de datos
                    $sql_select = "SELECT valores FROM empresa WHERE id_usuario = ?";
                    $stmt_select = $conn->prepare($sql_select);
                    $stmt_select->bind_param('i', $id_usuario);
                    $stmt_select->execute();
                    $stmt_select->bind_result($valores);
                    if ($stmt_select->fetch()) {
                        $valoresGuardados = explode(', ', $valores);
                    }
                    $stmt_select->close();
                    ?>

                    <div class="valor-campo">
                        <label for="valor1">Valor 1:</label>
                        <input type="text" id="valor1" name="valor1" required oninput="manejarEntrada(event)"
                            value="<?php echo isset($valoresGuardados[0]) ? htmlspecialchars($valoresGuardados[0]) : ''; ?>">
                    </div>
                    <div class="valor-campo">
                        <label for="valor2">Valor 2:</label>
                        <input type="text" id="valor2" name="valor2" required oninput="manejarEntrada(event)"
                            value="<?php echo isset($valoresGuardados[1]) ? htmlspecialchars($valoresGuardados[1]) : ''; ?>">
                    </div>
                    <div class="valor-campo">
                        <label for="valor3">Valor 3:</label>
                        <input type="text" id="valor3" name="valor3" required oninput="manejarEntrada(event)"
                            value="<?php echo isset($valoresGuardados[2]) ? htmlspecialchars($valoresGuardados[2]) : ''; ?>">
                    </div>
                    <div class="valor-campo">
                        <label for="valor4">Valor 4:</label>
                        <input type="text" id="valor4" name="valor4" oninput="manejarEntrada(event)"
                            value="<?php echo isset($valoresGuardados[3]) ? htmlspecialchars($valoresGuardados[3]) : ''; ?>">
                    </div>
                    <div class="valor-campo">
                        <label for="valor5">Valor 5:</label>
                        <input type="text" id="valor5" name="valor5" oninput="manejarEntrada(event)"
                            value="<?php echo isset($valoresGuardados[4]) ? htmlspecialchars($valoresGuardados[4]) : ''; ?>">
                    </div>
                    <div class="valor-campo">
                        <label for="valor6">Valor 6:</label>
                        <input type="text" id="valor6" name="valor6" oninput="manejarEntrada(event)"
                            value="<?php echo isset($valoresGuardados[5]) ? htmlspecialchars($valoresGuardados[5]) : ''; ?>">
                    </div>

                    <div class="submit-container">
                        <button type="submit" class="submit-button">Guardar</button>
                    </div>

                    <div class="info-box">
                        <a href="../Formularios/vision.php" class="info-item">2. VISIÓN</a>
                        <a href="../Formularios/objetivos.php" class="info-item">4. OBJETIVOS ESTRATÉGICOS</a>
                    </div>
                </form>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $valores = implode(', ', [
                        htmlspecialchars($_POST['valor1']),
                        htmlspecialchars($_POST['valor2']),
                        htmlspecialchars($_POST['valor3']),
                        htmlspecialchars($_POST['valor4']),
                        htmlspecialchars($_POST['valor5']),
                        htmlspecialchars($_POST['valor6'])
                    ]);

                    // Verifica si ya existe un registro para el usuario
                    $sql_check = "SELECT id FROM empresa WHERE id_usuario = ?";
                    $stmt_check = $conn->prepare($sql_check);
                    $stmt_check->bind_param('i', $id_usuario);
                    $stmt_check->execute();
                    $stmt_check->store_result();

                    if ($stmt_check->num_rows > 0) {
                        // Si ya existe, actualiza
                        $sql_update = "UPDATE empresa SET valores = ? WHERE id_usuario = ?";
                        $stmt_update = $conn->prepare($sql_update);
                        $stmt_update->bind_param('si', $valores, $id_usuario);
                        $stmt_update->execute();
                    } else {
                        // Si no existe, inserta
                        $sql_insert = "INSERT INTO empresa (id_usuario, valores) VALUES (?, ?)";
                        $stmt_insert = $conn->prepare($sql_insert);
                        $stmt_insert->bind_param('is', $id_usuario, $valores);
                        $stmt_insert->execute();
                    }

                    $stmt_check->close();
                    $conn->close();
                ?>
                    <div class="mensaje-confirmacion">
                        <p class="confirmacion">Los valores han sido guardados correctamente.</p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>
