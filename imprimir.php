<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boleta de Pago de Pensión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background: #ffffff;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }

        .details {
            margin-bottom: 20px;
        }

        .details table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        .details th,
        .details td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .details th {
            background-color: #f8f8f8;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 20px;
        }
    </style>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>CETPRO Elías Aguirre</h1>
            <p>Boleta de Pago de Pensión</p>
            <p>Año Académico 2024</p>
        </div>

        <div class="details">
            <table>
                <tr>
                    <th>Nombre del Estudiante</th>
                    <td><?= $_GET["data-estudiante"] ?></td>
                </tr>
                <tr>
                    <th>N° de Boleta</th>
                    <td><?= $_GET["data-id"] ?></td>
                </tr>
                <tr>
                    <th>Fecha de Emisión</th>
                    <td><?= $_GET["data-fecha_pago"] ?></td>
                </tr>
                <tr>
                    <th>Mes de Pago</th>
                    <td><?= $_GET["data-pension"] ?></td>
                </tr>
            </table>

            <table>
                <tr>
                    <th>Concepto</th>
                    <th>Monto</th>
                </tr>
                <tr>
                    <td>Pensión Mensual</td>
                    <td><?= $_GET["data-pago"] ?></td>
                </tr>
                <tr>
                    <th>Total</th>
                    <th><?= $_GET["data-pago"] ?></th>
                </tr>
            </table>
        </div>

        <div class="footer">
            <p>Gracias por su pago puntual. Para consultas, comuníquese al 987654321.</p>
        </div>
    </div>
</body>

</html>