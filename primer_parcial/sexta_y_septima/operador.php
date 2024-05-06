<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
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
    <h2>Clientes</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Paterno</th>
                <th>Materno</th>
                <th>Departamento</th>
                <th>Tipo de cuenta</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conexion = new mysqli("localhost", "root", "", "DBAlejandro");

            if ($conexion->connect_error) {
                die("Error en la conexión: " . $conexion->connect_error);
            }

            $consulta = "SELECT personas.nombre, personas.paterno, personas.materno, personas.departamento, cuentas_bancarias.tipo_cuenta, cuentas_bancarias.saldo
                        FROM personas
                        INNER JOIN cuentas_bancarias ON personas.id_persona = cuentas_bancarias.id_persona
                        WHERE personas.rol = 'cliente'";
            $resultado = $conexion->query($consulta);

            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila['nombre'] . "</td>";
                    echo "<td>" . $fila['paterno'] . "</td>";
                    echo "<td>" . $fila['materno'] . "</td>";
                    echo "<td>" . $fila['departamento'] . "</td>";
                    echo "<td>" . $fila['tipo_cuenta'] . "</td>";
                    echo "<td>" . $fila['saldo'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No hay clientes.</td></tr>";
            }

            $conexion->close();
            ?>
        </tbody>
    </table>
</body>

</html>