<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autodiagnóstico BCG</title>
    <link rel="stylesheet" href="../css/autodiagnosticoBCG.css">
</head>
<style>
    .volver {
    display: inline-block;
    background-color: #f08080;
    color: #ffffff;
    padding: 15px 30px;
    text-align: center;
    text-decoration: none;
    border-radius: 8px;
    border: 2px solid #4a4a4a;
    position: fixed;
    top: 50px;
    left: 190px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: background-color 0.3s;
}

.volver:hover {
    background-color: #ff6961;
}
    </style>
<body>
<a class="volver" href="../principal.php">INDICE</a>
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
                <td><input type="number" value="20" oninput="calcularTotales()"></td>
                <td class="percent">0%</td>
            </tr>
            <tr id="producto2">
                <td><input type="text" value="Producto 2" oninput="actualizarNombreProducto(this, 2)"></td>
                <td><input type="number" value="10" oninput="calcularTotales()"></td>
                <td class="percent">0%</td>
            </tr>
            <tr id="producto3">
                <td><input type="text" value="Producto 3" oninput="actualizarNombreProducto(this, 3)"></td>
                <td><input type="number" value="15" oninput="calcularTotales()"></td>
                <td class="percent">0%</td>
            </tr>
            <tr id="producto4">
                <td><input type="text" value="Producto 4" oninput="actualizarNombreProducto(this, 4)"></td>
                <td><input type="number" value="45" oninput="calcularTotales()"></td>
                <td class="percent">0%</td>
            </tr>
            <tr id="producto5">
                <td><input type="text" value="Producto 5" oninput="actualizarNombreProducto(this, 5)"></td>
                <td><input type="number" value="40" oninput="calcularTotales()"></td>
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

<h1>NIVELES DE VENTA DE LOS COMPETIDORES DE CADA PRODUCTO</h1>
<table id="tablaCompetidores">
    <thead>
        <tr>
            <th colspan="2" class="producto1">Producto 1</th>
            <th colspan="2" class="producto2">Producto 2</th>
            <th colspan="2" class="producto3">Producto 3</th>
            <th colspan="2" class="producto4">Producto 4</th>
            <th colspan="2" class="producto5">Producto 5</th>
        </tr>
        <tr>
            <th>EMPRESA</th><th id="empresa_1">12</th>
            <th>EMPRESA</th><th id="empresa_2">12</th>
            <th>EMPRESA</th><th id="empresa_3">12</th>
            <th>EMPRESA</th><th id="empresa_4">12</th>
            <th>EMPRESA</th><th id="empresa_5">12</th>
        </tr>
        <tr>
            <th>Competidor</th><th>Ventas</th>
            <th>Competidor</th><th>Ventas</th>
            <th>Competidor</th><th>Ventas</th>
            <th>Competidor</th><th>Ventas</th>
            <th>Competidor</th><th>Ventas</th>
        </tr>
    </thead>
    <tbody>
        <!-- Filas de competidores -->
        <tr><td>CP1-1</td><td><input type="number" value="0"></td><td>CP2-1</td><td><input type="number" value="0"></td><td>CP2-1</td><td><input type="number" value="0"></td><td>CP2-1</td><td><input type="number" value="0"></td><td>CP3-1</td><td><input type="number" value="0"></td></tr>
        <tr><td>CP1-2</td><td><input type="number" value="0"></td><td>CP2-2</td><td><input type="number" value="0"></td><td>CP2-2</td><td><input type="number" value="0"></td><td>CP2-2</td><td><input type="number" value="0"></td><td>CP3-1</td><td><input type="number" value="0"></td></tr>
        <tr><td>CP1-3</td><td><input type="number" value="0"></td><td>CP2-3</td><td><input type="number" value="0"></td><td>CP2-3</td><td><input type="number" value="0"></td><td>CP2-3</td><td><input type="number" value="0"></td><td>CP3-1</td><td><input type="number" value="0"></td></tr>
        <tr><td>CP1-4</td><td><input type="number" value="0"></td><td>CP2-4</td><td><input type="number" value="0"></td><td>CP2-4</td><td><input type="number" value="0"></td><td>CP2-4</td><td><input type="number" value="0"></td><td>CP3-1</td><td><input type="number" value="0"></td></tr>
        <tr><td>CP1-5</td><td><input type="number" value="0"></td><td>CP2-5</td><td><input type="number" value="0"></td><td>CP2-5</td><td><input type="number" value="0"></td><td>CP2-5</td><td><input type="number" value="0"></td><td>CP3-1</td><td><input type="number" value="0"></td></tr>
        <tr><td>CP1-6</td><td><input type="number" value="0"></td><td>CP2-6</td><td><input type="number" value="0"></td><td>CP2-6</td><td><input type="number" value="0"></td><td>CP2-6</td><td><input type="number" value="0"></td><td>CP3-1</td><td><input type="number" value="0"></td></tr>
        <tr><td>CP1-7</td><td><input type="number" value="0"></td><td>CP2-7</td><td><input type="number" value="0"></td><td>CP2-7</td><td><input type="number" value="0"></td><td>CP2-7</td><td><input type="number" value="0"></td><td>CP3-1</td><td><input type="number" value="0"></td></tr>
        <tr><td>CP1-8</td><td><input type="number" value="0"></td><td>CP2-8</td><td><input type="number" value="0"></td><td>CP2-8</td><td><input type="number" value="0"></td><td>CP2-8</td><td><input type="number" value="0"></td><td>CP3-1</td><td><input type="number" value="0"></td></tr>
        <tr><td>CP1-9</td><td><input type="number" value="0"></td><td>CP2-9</td><td><input type="number" value="0"></td><td>CP2-9</td><td><input type="number" value="0"></td><td>CP2-9</td><td><input type="number" value="0"></td><td>CP3-1</td><td><input type="number" value="0"></td></tr>
    </tbody>
    <tfoot>
        <tr>
            <td>Mayor</td><td>0</td><td>Mayor</td><td>0</td><td>Mayor</td><td>0</td><td>Mayor</td><td>0</td><td>Mayor</td><td>0</td>
        </tr>
    </tfoot>
</table>



<h1>Gráfico de la Matriz BCG</h1>

<div class="containercuadro">
        <canvas id="graficoBCG" width="800" height="400"></canvas>
        <!-- Íconos en cada cuadrante -->
        <img src="bcg-matrix/Images/incognita.png" class="icon" style="top: 50px; left: 50px;">
        <img src="bcg-matrix/Images/estrella.png" class="icon" style="top: 50px; right: 50px;">
        <img src="bcg-matrix/Images/perro.png" class="icon" style="bottom: 50px; left: 50px;">
        <img src="bcg-matrix/Images/vaca.png" class="icon" style="bottom: 50px; right: 50px;">
    </div>

    <script>
const canvas = document.getElementById('graficoBCG');
const ctx = canvas.getContext('2d');
const width = canvas.width;
const height = canvas.height;

// Lista de colores suaves para cada producto
const coloresSuaves = ["#a8dadc", "#f4a261", "#e9c46a", "#2a9d8f", "#264653"];

function scaleX(value) {
    return value * width;
}

function scaleY(value) {
    return height - value * height;
}

function calcularTotales() {
    const filas = document.querySelectorAll("#tablaProductos tbody tr:not(.total-row)");
    let totalVentas = 0;
    let valoresVentas = [];

    filas.forEach((fila, index) => {
        const inputVentas = fila.querySelector('input[type="number"]').value;
        const ventas = parseFloat(inputVentas) || 0;
        valoresVentas.push(ventas);
        totalVentas += ventas;

        // Actualizar los valores en la tabla de competidores
        document.getElementById(`empresa_${index + 1}`).textContent = ventas;
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

    // Actualizar gráfico con las posiciones de los productos
    actualizarGrafico(valoresVentas);
}

function actualizarGrafico(valoresVentas) {
    ctx.clearRect(0, 0, width, height);

    ctx.strokeStyle = 'grey';
    ctx.lineWidth = 1;
    ctx.beginPath();
    ctx.moveTo(width / 2, 0);
    ctx.lineTo(width / 2, height);
    ctx.moveTo(0, height / 2);
    ctx.lineTo(width, height / 2);
    ctx.stroke();

    ctx.font = "16px Arial";
    ctx.fillStyle = "black";
    ctx.textAlign = "center";
    ctx.fillText("", width * 0.25, height * 0.25);
    ctx.fillText("", width * 0.75, height * 0.25);
    ctx.fillText("", width * 0.25, height * 0.75);
    ctx.fillText("", width * 0.75, height * 0.75);

    valoresVentas.forEach((valor, index) => {
        const x = scaleX(Math.random());  // Ajusta la lógica de posición según sea necesario
        const y = scaleY(Math.random());  // Ajusta la lógica de posición según sea necesario

        // Color y dibujar la esfera
        ctx.fillStyle = coloresSuaves[index];
        ctx.beginPath();
        ctx.arc(x, y, 15, 0, Math.PI * 2);
        ctx.fill();

        // Texto del nombre del producto
        ctx.fillStyle = "black";
        ctx.font = "12px Arial";
        ctx.fillText(`Producto ${index + 1}`, x, y - 20);
    });
}

document.addEventListener("DOMContentLoaded", () => {
    calcularTotales();
});
</script>
<style>
    /* Botones en cuadrícula */
.info-box {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    margin: 20px 0;
}

.info-item {
    display: block;
    background-color: #2596be;
    color: #fff;
    padding: 10px;
    text-align: center;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    margin-left: 50px;
    margin-right: 50px;
}

.info-item:first-child {
    grid-column: 1;
}

.info-item:last-child {
    grid-column: 2;
}
</style>
<div class="info-box">
            <a class="info-item" href="../Formularios/analisis7.php">7. BCG</a>
            <a class="info-item" href="../Formularios/5_fuerzas_porter.php">8. ANÁLISIS PORTER</a>
        </div>

</div>

</body>
</html>
