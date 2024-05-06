<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maquetado de Cuentas Bancarias</title>
    <style>
        /* Estilos CSS para las tarjetas de cuenta bancaria */
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            width: 300px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            display: inline-block;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Cuentas Bancarias</h2>
    <div>
        <?php
        // Configuración de la conexión a la base de datos
        $servername = "localhost";
        $username = "root"; // Reemplaza esto con tu nombre de usuario de MySQL
        $password = ""; // Reemplaza esto con tu contraseña de MySQL
        $database = "dbalejandro";

        // Crear la conexión
        $conn = new mysqli($servername, $username, $password, $database);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Consulta SQL para obtener tres cuentas bancarias con tipos de cuenta diferentes
        $sql = "SELECT * FROM cuentas_bancarias GROUP BY tipo_cuenta LIMIT 3";
        $result = $conn->query($sql);

        // Verificar si se encontraron resultados
        if ($result && $result->num_rows > 0) {
            // Mostrar cada cuenta bancaria en una tarjeta
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card'>";
                echo "<h3>Cuenta Bancaria</h3>";
                echo "<p><strong>ID:</strong> " . $row['id_cuenta'] . "</p>";
                echo "<p><strong>Tipo de Cuenta:</strong> " . $row['tipo_cuenta'] . "</p>";
                // Agrega más detalles de la cuenta bancaria según sea necesario
                echo "</div>";
            }
        } else {
            echo "No se encontraron cuentas bancarias o no hay suficientes datos para mostrar.";
        }

        // Cerrar la conexión
        $conn->close();
        ?>
    </div>
</body>
</html>
