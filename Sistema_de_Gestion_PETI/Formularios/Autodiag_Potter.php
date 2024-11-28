<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autodiagnóstico Potter</title>
    <link rel="stylesheet" href="../css/autodiag_potter.css">
</head>

<body>
    <div class="container">
        <h1>Autodiagnóstico Potter
            <a class="volver" href="../principal.php">Volver al índice</a>
        </h1>

        <div class="cuadro-texto">
            <p>
            A continuación marque en las opciones que estime conveniente según el estado actual de su empresa.
            Valore su perfil competitivo en función de las opciones disponibles.
            Al finalizar, lea la conclusión, que se proporcionará según su análisis del entorno próximo
            </p>
        </div>

        <!-- Rivalidad Empresas del Sector -->
        <div class="cuadro-secciones">
            <h3>Rivalidad Empresas del Sector</h3>
            <form id="rivalidadForm">
                <table class="tabla-seccion">
                    <thead>
                        <tr>
                            <th>Perfil Competitivo</th>
                            <th>Nada (1)</th>
                            <th>Poco (2)</th>
                            <th>Medio (3)</th>
                            <th>Alto (4)</th>
                            <th>Muy Alto (5)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Crecimiento</strong></td>
                            <td><input type="radio" name="crecimiento" value="1"></td>
                            <td><input type="radio" name="crecimiento" value="2"></td>
                            <td><input type="radio" name="crecimiento" value="3"></td>
                            <td><input type="radio" name="crecimiento" value="4"></td>
                            <td><input type="radio" name="crecimiento" value="5"></td>
                        </tr>
                        <tr>
                            <td><strong>Naturaleza de los Competidores</strong></td>
                            <td><input type="radio" name="competidores" value="1"></td>
                            <td><input type="radio" name="competidores" value="2"></td>
                            <td><input type="radio" name="competidores" value="3"></td>
                            <td><input type="radio" name="competidores" value="4"></td>
                            <td><input type="radio" name="competidores" value="5"></td>
                        </tr>
                        <tr>
                            <td><strong>Exceso de capacidad productiva</strong></td>
                            <td><input type="radio" name="capacidad" value="1"></td>
                            <td><input type="radio" name="capacidad" value="2"></td>
                            <td><input type="radio" name="capacidad" value="3"></td>
                            <td><input type="radio" name="capacidad" value="4"></td>
                            <td><input type="radio" name="capacidad" value="5"></td>
                        </tr>
                        <tr>
                            <td><strong>Rentabilidad Media del Sector</strong></td>
                            <td><input type="radio" name="rentabilidad" value="1"></td>
                            <td><input type="radio" name="rentabilidad" value="2"></td>
                            <td><input type="radio" name="rentabilidad" value="3"></td>
                            <td><input type="radio" name="rentabilidad" value="4"></td>
                            <td><input type="radio" name="rentabilidad" value="5"></td>
                        </tr>
                        <tr>
                            <td><strong>Diferenciación del Producto</strong></td>
                            <td><input type="radio" name="diferenciacion" value="1"></td>
                            <td><input type="radio" name="diferenciacion" value="2"></td>
                            <td><input type="radio" name="diferenciacion" value="3"></td>
                            <td><input type="radio" name="diferenciacion" value="4"></td>
                            <td><input type="radio" name="diferenciacion" value="5"></td>
                        </tr>
                        <tr>
                            <td><strong>Barreras de Salida</strong></td>
                            <td><input type="radio" name="salida" value="1"></td>
                            <td><input type="radio" name="salida" value="2"></td>
                            <td><input type="radio" name="salida" value="3"></td>
                            <td><input type="radio" name="salida" value="4"></td>
                            <td><input type="radio" name="salida" value="5"></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn-calcular" onclick="calcularSuma('resultado1', 'rivalidadForm')">Calcular Suma</button>
            </form>
            <p><strong>Suma total Rivalidad:</strong> <span id="resultado1">0</span></p>
        </div>

        <!-- Barreras de Entrada -->
        <div class="cuadro-secciones">
            <h3>Barreras de Entrada</h3>
            <form id="barrerasForm">
                <table class="tabla-seccion">
                    <thead>
                        <tr>
                            <th>Barreras de Entrada</th>
                            <th>Nada (1)</th>
                            <th>Poco (2)</th>
                            <th>Medio (3)</th>
                            <th>Alto (4)</th>
                            <th>Muy Alto (5)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Economías de Escala</strong></td>
                            <td><input type="radio" name="economias_escala" value="1"></td>
                            <td><input type="radio" name="economias_escala" value="2"></td>
                            <td><input type="radio" name="economias_escala" value="3"></td>
                            <td><input type="radio" name="economias_escala" value="4"></td>
                            <td><input type="radio" name="economias_escala" value="5"></td>
                        </tr>
                        <tr>
                            <td><strong>Necesidad de Capital</strong></td>
                            <td><input type="radio" name="necesidad_capital" value="1"></td>
                            <td><input type="radio" name="necesidad_capital" value="2"></td>
                            <td><input type="radio" name="necesidad_capital" value="3"></td>
                            <td><input type="radio" name="necesidad_capital" value="4"></td>
                            <td><input type="radio" name="necesidad_capital" value="5"></td>
                        </tr>
                        <tr>
                            <td><strong>Acceso a la Tecnología</strong></td>
                            <td><input type="radio" name="acceso_tecnologia" value="1"></td>
                            <td><input type="radio" name="acceso_tecnologia" value="2"></td>
                            <td><input type="radio" name="acceso_tecnologia" value="3"></td>
                            <td><input type="radio" name="acceso_tecnologia" value="4"></td>
                            <td><input type="radio" name="acceso_tecnologia" value="5"></td>
                        </tr>
                        <tr>
                            <td><strong>Reglamentos o Leyes Limitativos</strong></td>
                            <td><input type="radio" name="reglamentos" value="1"></td>
                            <td><input type="radio" name="reglamentos" value="2"></td>
                            <td><input type="radio" name="reglamentos" value="3"></td>
                            <td><input type="radio" name="reglamentos" value="4"></td>
                            <td><input type="radio" name="reglamentos" value="5"></td>
                        </tr>
                        <tr>
                            <td><strong>Trámites Burocráticos</strong></td>
                            <td><input type="radio" name="tramites_burocraticos" value="1"></td>
                            <td><input type="radio" name="tramites_burocraticos" value="2"></td>
                            <td><input type="radio" name="tramites_burocraticos" value="3"></td>
                            <td><input type="radio" name="tramites_burocraticos" value="4"></td>
                            <td><input type="radio" name="tramites_burocraticos" value="5"></td>
                        </tr>
                        <tr>
                            <td><strong>Acceso a Canales de Distribución</strong></td>
                            <td><input type="radio" name="acceso_canales" value="1"></td>
                            <td><input type="radio" name="acceso_canales" value="2"></td>
                            <td><input type="radio" name="acceso_canales" value="3"></td>
                            <td><input type="radio" name="acceso_canales" value="4"></td>
                            <td><input type="radio" name="acceso_canales" value="5"></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn-calcular" onclick="calcularSuma('resultado2', 'barrerasForm')">Calcular Suma</button>
            </form>
            <p><strong>Suma total Barreras:</strong> <span id="resultado2">0</span></p>
        </div>







        <div class="cuadro-secciones">
    <h3>Poder de los Clientes</h3>

    <form id="clientesForm" action="autodiag_potter.php" method="POST">
        <!-- Sección Poder de los Clientes -->
        <table class="tabla-seccion">
            <thead>
                <tr>
                    <th>Poder de los Clientes</th>
                    <th>Nada (1)</th>
                    <th>Poco (2)</th>
                    <th>Medio (3)</th>
                    <th>Alto (4)</th>
                    <th>Muy Alto (5)</th>
                </tr>
            </thead>
            <tbody>
                <!-- Fila 1: Número de Clientes -->
                <tr>
                    <td><strong>Número de Clientes</strong></td>
                    <td><input type="radio" name="numero_clientes" value="1"></td>
                    <td><input type="radio" name="numero_clientes" value="2"></td>
                    <td><input type="radio" name="numero_clientes" value="3"></td>
                    <td><input type="radio" name="numero_clientes" value="4"></td>
                    <td><input type="radio" name="numero_clientes" value="5"></td>
                </tr>
                <!-- Fila 2: Posibilidad de Integración Ascendente -->
                <tr>
                    <td><strong>Posibilidad de Integración Ascendente</strong></td>
                    <td><input type="radio" name="integracion_ascendente" value="1"></td>
                    <td><input type="radio" name="integracion_ascendente" value="2"></td>
                    <td><input type="radio" name="integracion_ascendente" value="3"></td>
                    <td><input type="radio" name="integracion_ascendente" value="4"></td>
                    <td><input type="radio" name="integracion_ascendente" value="5"></td>
                </tr>
                <!-- Fila 3: Rentabilidad de los Clientes -->
                <tr>
                    <td><strong>Rentabilidad de los Clientes</strong></td>
                    <td><input type="radio" name="rentabilidad_clientes" value="1"></td>
                    <td><input type="radio" name="rentabilidad_clientes" value="2"></td>
                    <td><input type="radio" name="rentabilidad_clientes" value="3"></td>
                    <td><input type="radio" name="rentabilidad_clientes" value="4"></td>
                    <td><input type="radio" name="rentabilidad_clientes" value="5"></td>
                </tr>
                <!-- Fila 4: Coste de Cambio de Proveedor para Cliente -->
                <tr>
                    <td><strong>Coste de Cambio de Proveedor para Cliente</strong></td>
                    <td><input type="radio" name="coste_cambio_proveedor" value="1"></td>
                    <td><input type="radio" name="coste_cambio_proveedor" value="2"></td>
                    <td><input type="radio" name="coste_cambio_proveedor" value="3"></td>
                    <td><input type="radio" name="coste_cambio_proveedor" value="4"></td>
                    <td><input type="radio" name="coste_cambio_proveedor" value="5"></td>
                </tr>
            </tbody>
        </table>
        <button type="button" class="btn-calcular" onclick="calcularSuma('resultado3', 'clientesForm')">Calcular Suma</button>
    </form>
    <p><strong>Suma total Poder de los Clientes:</strong> <span id="resultado3">0</span></p>
</div>

<div class="cuadro-secciones">
    <h3>Productos Sustitutivos</h3>

    <form id="sustitutivosForm" action="autodiag_potter.php" method="POST">
        <!-- Sección Productos Sustitutivos -->
        <table class="tabla-seccion">
            <thead>
                <tr>
                    <th>Productos Sustitutivos</th>
                    <th>Nada (1)</th>
                    <th>Poco (2)</th>
                    <th>Medio (3)</th>
                    <th>Alto (4)</th>
                    <th>Muy Alto (5)</th>
                </tr>
            </thead>
            <tbody>
                <!-- Fila 1: Disponibilidad de Productos Sustitutivos -->
                <tr>
                    <td><strong>Disponibilidad de Productos Sustitutivos</strong></td>
                    <td><input type="radio" name="disponibilidad_sustitutivos" value="1"></td>
                    <td><input type="radio" name="disponibilidad_sustitutivos" value="2"></td>
                    <td><input type="radio" name="disponibilidad_sustitutivos" value="3"></td>
                    <td><input type="radio" name="disponibilidad_sustitutivos" value="4"></td>
                    <td><input type="radio" name="disponibilidad_sustitutivos" value="5"></td>
                </tr>
            </tbody>
        </table>
        <button type="button" class="btn-calcular" onclick="calcularSuma('resultado4', 'sustitutivosForm')">Calcular Suma</button>
    </form>
    <p><strong>Suma total Productos Sustitutivos:</strong> <span id="resultado4">0</span></p>








<!-- Suma Total -->
<div class="suma-total-container">
    <p class="suma-total-text">
        <strong>Suma Total General:</strong> <span id="sumaTotal" class="suma-total-valor">0</span>
    </p>
    <button type="button" class="btn-calcular-total" onclick="calcularSumaTotal()">
        Calcular Suma Total
    </button>
</div>

<!-- Estado de la Empresa -->
<div class="estado-empresa-container">
    <p class="estado-empresa-text">
        <strong>Estado de la Empresa:</strong> <span id="estadoEmpresa" class="estado-empresa-valor">Sin evaluar</span>
    </p>
</div>

<script>
    function calcularSuma(resultadoId, formId) {
        const form = document.getElementById(formId);
        const inputs = form.querySelectorAll('input[type="radio"]:checked');
        let total = 0;

        inputs.forEach(input => {
            total += parseInt(input.value, 10);
        });

        document.getElementById(resultadoId).textContent = total;
    }

    function calcularSumaTotal() {
        // Obtener las sumas de las distintas secciones
        const rivalidadTotal = parseInt(document.getElementById("resultado1").textContent, 10) || 0;
        const barrerasTotal = parseInt(document.getElementById("resultado2").textContent, 10) || 0;
        const tabla3Total = parseInt(document.getElementById("resultado3").textContent, 10) || 0; 
        const tabla4Total = parseInt(document.getElementById("resultado4").textContent, 10) || 0; 
        
        // Verificar si alguna suma es 0 (ningún dato calculado)
        if (rivalidadTotal === 0 && barrerasTotal === 0 && tabla3Total === 0 && tabla4Total === 0) {
            // Si no se han hecho cálculos, mostrar el mensaje adecuado y detener el proceso
            alert("Por favor, realice todas las selecciones antes de calcular.");
            document.getElementById("estadoEmpresa").textContent = "Sin evaluar";
            return; // Detener la ejecución si no hay datos
        }

        // Calcular la suma total
        const sumaTotal = rivalidadTotal + barrerasTotal + tabla3Total + tabla4Total;
        document.getElementById("sumaTotal").textContent = sumaTotal;

        // Determinar el estado de la empresa basado en la suma total
        let mensaje = "";
        if (sumaTotal <= 35) {
            mensaje = "Estamos en un mercado altamente competitivo, en el que es muy difícil hacerse un hueco en el mercado.";
        } else if (sumaTotal <= 60) {
            mensaje = "Estamos en un mercado de competitividad relativamente alta, pero con ciertas modificaciones en el producto y la política comercial de la empresa, podría encontrarse un nicho de mercado.";
        } else if (sumaTotal <= 75) {
            mensaje = "La situación actual del mercado es favorable a la empresa.";
        } else if (sumaTotal <= 85) {
            mensaje = "Estamos en una situación excelente para la empresa.";
        }

        document.getElementById("estadoEmpresa").textContent = mensaje;
    }
</script>





<!-- Mensaje adicional -->
<div class="mensaje-análisis">
    <p>Una vez analizado el entorno próximo de su empresa, es decir, análisis externo de su microentorno, identifique las oportunidades y amenazas más relevantes que desee que se reflejen en el análisis FODA de su Plan Estratégico.</p>
</div>

<!-- Cuadro de Oportunidades -->
<div class="cuadro-oportunidades">
    <label for="oportunidades">Oportunidades:</label>
    <textarea id="oportunidades" placeholder="Escriba las oportunidades aquí..."></textarea>
</div>

<!-- Cuadro de Amenazas -->
<div class="cuadro-amenazas">
    <label for="amenazas">Amenazas:</label>
    <textarea id="amenazas" placeholder="Escriba las amenazas aquí..."></textarea>
</div>

<!-- Botón Guardar -->
<div class="boton-guardar-container">
    <button onclick="guardarDatos()">Guardar</button>
</div>

<!-- Botones de navegación -->
<div class="botones-navegacion">
    <a class="info-item" href="../formularios/5_fuerzas_porter.php">8. Análisis Porter</a>
    <a class="info-item" href="../formularios/pest.php">9. PEST</a>
</div>

<!-- Script para guardar los datos -->
<script>
    // Al cargar la página, si hay datos guardados, rellenamos los campos de texto
    window.onload = function() {
        if (localStorage.getItem('oportunidades')) {
            document.getElementById('oportunidades').value = localStorage.getItem('oportunidades');
        }
        if (localStorage.getItem('amenazas')) {
            document.getElementById('amenazas').value = localStorage.getItem('amenazas');
        }
    };

    // Función para guardar los valores de los cuadros de texto
    function guardarDatos() {
        const oportunidades = document.getElementById('oportunidades').value;
        const amenazas = document.getElementById('amenazas').value;

        // Guardamos en localStorage
        localStorage.setItem('oportunidades', oportunidades);
        localStorage.setItem('amenazas', amenazas);

        // Mostrar un mensaje de éxito
        alert('Datos guardados exitosamente.');
    }
</script>




</div>

    </div>
</body>

</html>
