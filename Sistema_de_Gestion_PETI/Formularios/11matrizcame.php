<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matriz CAME</title>
    <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" href="../css/11matrizcame.css">
</head>

<body>
    <div class="container">
        <h1>11. MATRIZ CAME</h1>
        <p>
            A continuación y para finalizar de elaborar un Plan Estratégico, además de tener identificada la estrategia,
            es necesario determinar acciones que permitan corregir las debilidades, afrontar las amenazas, mantener las
            fortalezas y explotar las oportunidades.
        </p>
        <p>
            Reflexione y anote acciones a llevar a cabo teniendo en cuenta que estas acciones deben favorecer la
            ejecución exitosa de la estrategia general identificada.
        </p>
        <table class="matriz-came">
            <thead>
                <tr>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="section-title">C</td>
                    <td>Corregir las debilidades</td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="text" name="c_1" placeholder="1.">
                        <input type="text" name="c_2" placeholder="2.">
                        <input type="text" name="c_3" placeholder="3.">
                        <input type="text" name="c_4" placeholder="4.">
                    </td>
                </tr>
                <tr>
                    <td class="section-title">A</td>
                    <td>Afrontar las amenazas</td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="text" name="a_1" placeholder="5.">
                        <input type="text" name="a_2" placeholder="6.">
                        <input type="text" name="a_3" placeholder="7.">
                        <input type="text" name="a_4" placeholder="8.">
                    </td>
                </tr>
                <tr>
                    <td class="section-title">M</td>
                    <td>Mantener las fortalezas</td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="text" name="m_1" placeholder="9.">
                        <input type="text" name="m_2" placeholder="10.">
                        <input type="text" name="m_3" placeholder="11.">
                        <input type="text" name="m_4" placeholder="12.">
                    </td>
                </tr>
                <tr>
                    <td class="section-title">E</td>
                    <td>Explotar las oportunidades</td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="text" name="e_1" placeholder="13.">
                        <input type="text" name="e_2" placeholder="14.">
                        <input type="text" name="e_3" placeholder="15.">
                        <input type="text" name="e_4" placeholder="16.">
                    </td>
                </tr>
            </tbody>
        </table>
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
            <a class="info-item" href="../Formularios/estrategia.php">10. IDENTIFICACIÓN DE ESTRATEGIAS </a>
            <a class="info-item" href="../Formularios/resumen.php">RESUMEN ESTRATÉGICO </a>
        </div>
    </div>
</body>

</html>