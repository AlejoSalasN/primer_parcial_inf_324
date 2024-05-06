<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Cliente</title>
    <style>
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            padding: 25px;
        }
        a {
            text-decoration: none;
            margin: 15px;
            color: black;
            font-size: 1rem;
            color: green;
            font-weight: 800;
        }
        .eliminar {
            color: red;
        }
    </style>
</head>
<body>
    <h2>Perfil de Cliente</h2>
    <?php

    $id_cliente = $_GET["id"];

    $servidor = "localhost";
    $usuario_bd = "root";
    $contraseña_bd = "";
    $nombre_bd = "DBAlejandro";

    $conexion = new mysqli($servidor, $usuario_bd, $contraseña_bd, $nombre_bd);

    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    $consulta = "SELECT personas.*, cuentas_bancarias.tipo_cuenta, cuentas_bancarias.saldo FROM personas
                INNER JOIN cuentas_bancarias ON personas.id_persona = cuentas_bancarias.id_persona
                WHERE personas.id_persona = $id_cliente";
    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows > 0) {
        $cliente = $resultado->fetch_assoc();
        echo "<p>Nombre: " . $cliente["nombre"] . "</p>";
        echo "<p>Paterno: " . $cliente["paterno"] . "</p>";
        echo "<p>Materno: " . $cliente["materno"] . "</p>";
        echo "<p>Celular: " . $cliente["celular"] . "</p>";
        echo "<p>Email: " . $cliente["email"] . "</p>";
        echo "<p>Carnet: " . $cliente["carnet"] . "</p>";
        echo "<p>Departamento: " . $cliente["departamento"] . "</p>";
        echo "<p>Tipo de cuenta: " . $cliente["tipo_cuenta"] . "</p>";
        echo "<p>Saldo: " . $cliente["saldo"] . "</p>";
        echo '<a href="editar_cliente.php?id=' . $id_cliente . '">Editar</a>';
        echo '<a href="#" class = "eliminar" onclick="confirmarEliminar(' . $id_cliente . ')">Eliminar</a>';
    } else {
        echo "Cliente no encontrado.";
    }

    $conexion->close();
    ?>

    <script>
    function confirmarEliminar(id) {
        if (confirm("¿Estás seguro de que deseas eliminar tu cuenta? Esta acción no se puede deshacer.")) {
            window.location.href = "eliminar_cuenta.php?id=" + id;
        }
    }
    </script>
</body>
</html>
