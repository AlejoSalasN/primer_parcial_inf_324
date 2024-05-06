<?php
if (isset($_GET["id"])) {
    $id_cliente = $_GET["id"];

    $servidor = "localhost";
    $usuario_bd = "root";
    $contraseña_bd = "";
    $nombre_bd = "DBAlejandro";

    $conexion = new mysqli($servidor, $usuario_bd, $contraseña_bd, $nombre_bd);

    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    $consulta_eliminar_persona = "DELETE FROM personas WHERE id_persona = $id_cliente";
    $consulta_eliminar_cuenta = "DELETE FROM cuentas_bancarias WHERE id_persona = $id_cliente";

    if ($conexion->query($consulta_eliminar_persona) === TRUE && $conexion->query($consulta_eliminar_cuenta) === TRUE) {
        echo "Cuenta eliminada exitosamente.";
    } else {
        echo "Error al eliminar la cuenta: " . $conexion->error;
    }

    $conexion->close();
}
?>
