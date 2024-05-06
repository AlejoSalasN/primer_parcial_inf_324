<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $id_cliente = $_POST["id"];
    $nuevo_celular = $_POST["celular"];
    $nuevo_email = $_POST["email"];
    $nuevo_departamento = $_POST["departamento"];

    // Conectar a la base de datos (reemplazar con tus credenciales)
    $servidor = "localhost";
    $usuario_bd = "root";
    $contraseña_bd = "";
    $nombre_bd = "DBAlejandro";

    $conexion = new mysqli($servidor, $usuario_bd, $contraseña_bd, $nombre_bd);

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    // Actualizar los datos del cliente en la base de datos
    $actualizar_query = "UPDATE personas SET celular='$nuevo_celular', email='$nuevo_email', departamento='$nuevo_departamento' WHERE id_persona=$id_cliente";

    if ($conexion->query($actualizar_query) === TRUE) {
        // Redireccionar a la página del perfil del cliente
        header("Location: perfil_cliente.php?id=" . $id_cliente);
        exit();
    } else {
        echo "Error al actualizar los datos: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    // Si no se ha enviado el formulario, mostrar un mensaje de error
    echo "Acceso no autorizado.";
}
?>
