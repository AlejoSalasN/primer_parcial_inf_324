<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>
<body>
    <h2>Editar Cliente</h2>
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
    $consulta = "SELECT * FROM personas WHERE id_persona = $id_cliente";
    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows > 0) {
        $cliente = $resultado->fetch_assoc();
    ?>
    <form action="actualizar_cliente.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id_cliente; ?>">
        <label for="celular">Celular:</label><br>
        <input type="text" id="celular" name="celular" value="<?php echo $cliente["celular"]; ?>"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $cliente["email"]; ?>"><br>
        <label for="departamento">Departamento:</label><br>
        <select name="departamento" id="departamento">
            <option value="La Paz">La Paz</option>
            <option value="Cochabamba">Cochabamba</option>
            <option value="Santa Cruz">Santa Cruz</option>
            <option value="Potosí">Potosí</option>
            <option value="Pando">Pando</option>
            <option value="Beni">Beni</option>
            <option value="Tarija">Tarija</option>
            <option value="Oruro">Oruro</option>
            <option value="Chuquisaca">Chuquisaca</option>
        </select><br>
        <input type="submit" value="Guardar cambios">
    </form>
    <?php
    } else {
        echo "Cliente no encontrado.";
    }
    $conexion->close();
    ?>
</body>
</html>
