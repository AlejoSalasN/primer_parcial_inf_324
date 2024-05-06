<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $contraseña = $_POST["password"];

    $servidor = "localhost";
    $usuario_bd = "root";
    $contraseña_bd = "";
    $nombre_bd = "DBAlejandro";

    $conexion = new mysqli($servidor, $usuario_bd, $contraseña_bd, $nombre_bd);

    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    $consulta = "SELECT * FROM personas WHERE email = '$email'";
    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        if (password_verify($contraseña, $fila["contraseña"])) {
            if ($fila["rol"] == "cliente") {
                header("Location: perfil_cliente.php?id=" . $fila["id_persona"]);
                exit();
            } else {
                header("Location: login.php");
                exit();
            }
        } else {
            echo "Contraseña incorrecta. Inténtalo de nuevo.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
    $conexion->close();
}
?>
