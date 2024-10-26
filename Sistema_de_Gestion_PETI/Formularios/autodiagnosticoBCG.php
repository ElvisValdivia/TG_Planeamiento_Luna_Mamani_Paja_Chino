<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autodiagnóstico BCG</title>
    <link rel="stylesheet" href="../css/autodiagnosticoBCG.css">
</head>
<body>

<div class="container">
    <h1>Previsión de Ventas</h1>

    <table id="tablaProductos">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Ventas</th>
                <th>% S/ Total</th>
            </tr>
        </thead>
        <tbody>
            <tr id="producto1">
                <td><input type="text" value="Producto 1" oninput="actualizarNombreProducto(this, 1)"></td>
                <td><input type="number" value="20" onchange="calcularTotales()"></td>
                <td class="percent">0%</td>
            </tr>
            <tr id="producto2">
                <td><input type="text" value="Producto 2" oninput="actualizarNombreProducto(this, 2)"></td>
                <td><input type="number" value="10" onchange="calcularTotales()"></td>
                <td class="percent">0%</td>
            </tr>
            <tr id="producto3">
                <td><input type="text" value="Producto 3" oninput="actualizarNombreProducto(this, 3)"></td>
                <td><input type="number" value="15" onchange="calcularTotales()"></td>
                <td class="percent">0%</td>
            </tr>
            <tr id="producto4">
                <td><input type="text" value="Producto 4" oninput="actualizarNombreProducto(this, 4)"></td>
                <td><input type="number" value="45" onchange="calcularTotales()"></td>
                <td class="percent">0%</td>
            </tr>
            <tr id="producto5">
                <td><input type="text" value="Producto 5" oninput="actualizarNombreProducto(this, 5)"></td>
                <td><input type="number" value="40" onchange="calcularTotales()"></td>
                <td class="percent">0%</td>
            </tr>
            <tr class="total-row">
                <td>Total</td>
                <td id="totalVentas">0</td>
                <td id="totalPercent">100%</td>
            </tr>
        </tbody>
    </table>

    <h1>Tasas de Crecimiento del Mercado (TCM)</h1>

    <table id="tablaTCM">
        <thead>
            <tr>
                <th>Períodos</th>
                <th id="th_producto1">Producto 1</th>
                <th id="th_producto2">Producto 2</th>
                <th id="th_producto3">Producto 3</th>
                <th id="th_producto4">Producto 4</th>
                <th id="th_producto5">Producto 5</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2012 - 2013</td>
                <td><input type="number" value="0" oninput="actualizarTCM(1)"></td>
                <td><input type="number" value="0" oninput="actualizarTCM(2)"></td>
                <td><input type="number" value="0" oninput="actualizarTCM(3)"></td>
                <td><input type="number" value="0" oninput="actualizarTCM(4)"></td>
                <td><input type="number" value="0" oninput="actualizarTCM(5)"></td>
            </tr>
            <tr>
                <td>2013 - 2014</td>
                <td><input type="number" value="0" oninput="actualizarTCM(1)"></td>
                <td><input type="number" value="0" oninput="actualizarTCM(2)"></td>
                <td><input type="number" value="0" oninput="actualizarTCM(3)"></td>
                <td><input type="number" value="0" oninput="actualizarTCM(4)"></td>
                <td><input type="number" value="0" oninput="actualizarTCM(5)"></td>
            </tr>
            <tr>
                <td>2014 - 2015</td>
                <td><input type="number" value="0" oninput="actualizarTCM(1)"></td>
                <td><input type="number" value="0" oninput="actualizarTCM(2)"></td>
                <td><input type="number" value="0" oninput="actualizarTCM(3)"></td>
                <td><input type="number" value="0" oninput="actualizarTCM(4)"></td>
                <td><input type="number" value="0" oninput="actualizarTCM(5)"></td>
            </tr>
            <tr>
                <td>2015 - 2016</td>
                <td><input type="number" value="0" oninput="actualizarTCM(1)"></td>
                <td><input type="number" value="0" oninput="actualizarTCM(2)"></td>
                <td><input type="number" value="0" oninput="actualizarTCM(3)"></td>
                <td><input type="number" value="0" oninput="actualizarTCM(4)"></td>
                <td><input type="number" value="0" oninput="actualizarTCM(5)"></td>
            </tr>
            <tr>
                <td>2016 - 2017</td>
                <td><input type="number" value="0" oninput="actualizarTCM(1)"></td>
                <td><input type="number" value="0" oninput="actualizarTCM(2)"></td>
                <td><input type="number" value="0" oninput="actualizarTCM(3)"></td>
                <td><input type="number" value="0" oninput="actualizarTCM(4)"></td>
                <td><input type="number" value="0" oninput="actualizarTCM(5)"></td>
            </tr>
        </tbody>
    </table>

    <h1>Matriz BCG</h1>

    <table id="tablaBCG">
        <thead>
            <tr>
                <th>BCG</th>
                <th id="bcg_producto1">Producto 1</th>
                <th id="bcg_producto2">Producto 2</th>
                <th id="bcg_producto3">Producto 3</th>
                <th id="bcg_producto4">Producto 4</th>
                <th id="bcg_producto5">Producto 5</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>TCM</td>
                <td><input type="number" value="0" id="bcg_tcm_1"></td>
                <td><input type="number" value="0" id="bcg_tcm_2"></td>
                <td><input type="number" value="0" id="bcg_tcm_3"></td>
                <td><input type="number" value="0" id="bcg_tcm_4"></td>
                <td><input type="number" value="0" id="bcg_tcm_5"></td>
            </tr>
            <tr>
                <td>PRM</td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
            </tr>
            <tr>
                <td>% S/VTAS</td>
                <td id="bcg_percent_1">0%</td>
                <td id="bcg_percent_2">0%</td>
                <td id="bcg_percent_3">0%</td>
                <td id="bcg_percent_4">0%</td>
                <td id="bcg_percent_5">0%</td>
            </tr>
        </tbody>
    </table>

    <h1>Evolución de la Demanda Global Sector (en miles de soles)</h1>

    <table id="tablaEvolucion">
        <thead>
            <tr>
                <th>Años</th>
                <th id="evol_producto1">Producto 1</th>
                <th id="evol_producto2">Producto 2</th>
                <th id="evol_producto3">Producto 3</th>
                <th id="evol_producto4">Producto 4</th>
                <th id="evol_producto5">Producto 5</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2012</td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
            </tr>
            <tr>
                <td>2013</td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
            </tr>
            <tr>
                <td>2014</td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
            </tr>
            <tr>
                <td>2015</td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
            </tr>
            <tr>
                <td>2016</td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
            </tr>
            <tr>
                <td>2017</td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
                <td><input type="number" value="0"></td>
            </tr>
        </tbody>
    </table>

</div>

<script>
    function calcularTotales() {
        const filas = document.querySelectorAll("#tablaProductos tbody tr:not(.total-row)");
        let totalVentas = 0;
        let valoresVentas = [];

        // Sumar las ventas
        filas.forEach(fila => {
            const inputVentas = fila.querySelector('input[type="number"]').value;
            const ventas = parseFloat(inputVentas) || 0;
            valoresVentas.push(ventas);
            totalVentas += ventas;
        });

        // Actualizar total de ventas
        document.getElementById("totalVentas").textContent = totalVentas.toFixed(2);

        // Calcular y actualizar los porcentajes
        filas.forEach((fila, index) => {
            const percentCell = fila.querySelector(".percent");
            const porcentaje = (valoresVentas[index] / totalVentas) * 100 || 0;
            percentCell.textContent = `${porcentaje.toFixed(2)}%`;

            // Actualizar la tabla BCG con los mismos porcentajes
            document.getElementById(`bcg_percent_${index + 1}`).textContent = `${porcentaje.toFixed(2)}%`;
        });

        // Mantener el total en 100% si hay ventas
        document.getElementById("totalPercent").textContent = totalVentas > 0 ? "100%" : "0%";
    }

    function actualizarNombreProducto(input, productoId) {
        // Actualiza el nombre en la segunda tabla (TCM), BCG y Evolución de la Demanda Global
        const headerTCM = document.getElementById(`th_producto${productoId}`);
        const headerBCG = document.getElementById(`bcg_producto${productoId}`);
        const headerEvolucion = document.getElementById(`evol_producto${productoId}`);
        if (headerTCM) {
            headerTCM.textContent = input.value;
        }
        if (headerBCG) {
            headerBCG.textContent = input.value;
        }
        if (headerEvolucion) {
            headerEvolucion.textContent = input.value;
        }
    }

    function actualizarTCM(productoId) {
        // Calcula el promedio del TCM para el producto correspondiente en la tabla BCG
        const tcmInput = document.querySelectorAll(`#tablaTCM tbody tr td:nth-child(${productoId + 1}) input`);
        const valoresTCM = Array.from(tcmInput).map(input => parseFloat(input.value || 0));
        const promedioTCM = valoresTCM.reduce((suma, valor) => suma + valor, 0) / valoresTCM.length;
        document.getElementById(`bcg_tcm_${productoId}`).value = promedioTCM.toFixed(2);
    }
</script>

</body>
</html>
