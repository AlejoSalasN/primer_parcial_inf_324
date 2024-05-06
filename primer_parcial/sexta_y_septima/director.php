<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saldo por Departamento</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Saldo por Departamento</h2>
    <table>
        <thead>
            <tr>
                <th>Departamento</th>
                <th>Saldo Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conexion = new mysqli("localhost", "root", "", "DBAlejandro");

            if ($conexion->connect_error) {
                die("Error en la conexión: " . $conexion->connect_error);
            }
            $consulta = "SELECT 
                            personas.departamento, 
                            SUM(
                                CASE 
                                    WHEN cuentas_bancarias.saldo IS NULL THEN 0 
                                    ELSE cuentas_bancarias.saldo 
                                END
                            ) AS saldo_total
                        FROM personas
                        LEFT JOIN cuentas_bancarias ON personas.id_persona = cuentas_bancarias.id_persona
                        GROUP BY personas.departamento";
            $resultado = $conexion->query($consulta);

            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila['departamento'] . "</td>";
                    echo "<td>Bs. " . $fila['saldo_total'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No hay datos disponibles.</td></tr>";
            }
            $conexion->close();
            ?>
        </tbody>
    </table>
</body>
</html>
