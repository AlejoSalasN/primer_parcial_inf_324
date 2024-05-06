<?php
session_start();

if (isset($_POST['login'])) {
    $conexion = new mysqli("localhost", "root", "", "DBAlejandro");

    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $consulta = "SELECT * FROM personas WHERE email = '$email'";
    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();

        $_SESSION['id_persona'] = $usuario['id_persona'];
        if (password_verify($password, $usuario["contraseña"])) {
            switch ($usuario['rol']) {
                case 'cliente':
                    header("Location: perfil_cliente.php?id=" . $usuario["id_persona"]);
                    break;
                case 'operador':
                    header("Location: operador.php?id=" . $usuario["id_persona"]);
                    break;
                case 'director_bancario':
                    header("Location: director.php?id=" . $usuario["id_persona"]);
                    break;
                default:
                    echo "Rol no válido.";
                    break;
            }
        } else {
            echo "Contraseña incorrecta. Inténtalo de nuevo.";
        }
    } else {
        echo "Correo electrónico o contraseña incorrectos.";
    }

    $conexion->close();
}
