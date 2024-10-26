<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnóstico de Potencial de Mejora</title>
    <link rel="stylesheet" href="../css/cadena_diagnostico.css">
</head>

<body>
    <div class="container">
        <h1>Diagnóstico de Potencial de Mejora</h1>
        <form>
            <table>
                <thead>
                    <tr>
                        <th>AUTODIAGNÓSTICO DE LA CADENA DE VALOR INTERNA</th>
                        <th>VALORACIÓN</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1. La empresa tiene una política sistematizada de cero defectos en la producción de productos/servicios.</td>
                        <td>
                            <input type="radio" name="valoracion1" value="0" required onchange="calcularPotencial()"> 0
                            <input type="radio" name="valoracion1" value="1" onchange="calcularPotencial()"> 1
                            <input type="radio" name="valoracion1" value="2" onchange="calcularPotencial()"> 2
                            <input type="radio" name="valoracion1" value="3" onchange="calcularPotencial()"> 3
                            <input type="radio" name="valoracion1" value="4" onchange="calcularPotencial()"> 4
                        </td>
                    </tr>
                    <tr>
                        <td>2. La empresa emplea los medios productivos tecnológicamente más avanzados de su sector.</td>
                        <td>
                            <input type="radio" name="valoracion2" value="0" required onchange="calcularPotencial()"> 0
                            <input type="radio" name="valoracion2" value="1" onchange="calcularPotencial()"> 1
                            <input type="radio" name="valoracion2" value="2" onchange="calcularPotencial()"> 2
                            <input type="radio" name="valoracion2" value="3" onchange="calcularPotencial()"> 3
                            <input type="radio" name="valoracion2" value="4" onchange="calcularPotencial()"> 4
                        </td>
                    </tr>
                    <tr>
                        <td>3. La empresa dispone de un sistema de información y control de gestión eficiente y eficaz.</td>
                        <td>
                            <input type="radio" name="valoracion3" value="0" required onchange="calcularPotencial()"> 0
                            <input type="radio" name="valoracion3" value="1" onchange="calcularPotencial()"> 1
                            <input type="radio" name="valoracion3" value="2" onchange="calcularPotencial()"> 2
                            <input type="radio" name="valoracion3" value="3" onchange="calcularPotencial()"> 3
                            <input type="radio" name="valoracion3" value="4" onchange="calcularPotencial()"> 4
                        </td>
                    </tr>
                    <tr>
                        <td>25. La empresa ha establecido un sistema de gestión del talento humano que permite atraer, desarrollar y retener el talento.</td>
                        <td>
                            <input type="radio" name="valoracion25" value="0" required onchange="calcularPotencial()"> 0
                            <input type="radio" name="valoracion25" value="1" onchange="calcularPotencial()"> 1
                            <input type="radio" name="valoracion25" value="2" onchange="calcularPotencial()"> 2
                            <input type="radio" name="valoracion25" value="3" onchange="calcularPotencial()"> 3
                            <input type="radio" name="valoracion25" value="4" onchange="calcularPotencial()"> 4
                        </td>
                    </tr>
                    <tr>
                        <td>POTENCIAL DE MEJORA DE LA CADENA DE VALOR INTERNA</td>
                        <td id="resultado-porcentaje">0%</td> <!-- Celda para el resultado en porcentaje -->
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

    <script>
        function calcularPotencial() {
            let total = 0;
            let respuestas = 0;

            for (let i = 1; i <= 25; i++) {
                const valoracion = document.querySelector(`input[name="valoracion${i}"]:checked`);
                if (valoracion) {
                    total += parseInt(valoracion.value);
                    respuestas++;
                }
            }

            if (respuestas > 0) {
                const potencialMejora = (total / (respuestas * 4)) * 100; // Calcular el porcentaje
                document.getElementById('resultado-porcentaje').innerHTML = `${potencialMejora.toFixed(2)}%`;
            } else {
                document.getElementById('resultado-porcentaje').innerHTML = '0%';
            }
        }
    </script>
</body>

</html>
