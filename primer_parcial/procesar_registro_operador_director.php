<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $paterno = $_POST["paterno"];
    $materno = $_POST["materno"];
    $carnet = $_POST["carnet"];
    $celular = $_POST["celular"];
    $email = $_POST["email"];
    $rol = $_POST["rol"];
    $contrasenha = $_POST["password"];

    $hash = password_hash($contrasenha, PASSWORD_DEFAULT);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "DBAlejandro";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $sql_persona = "INSERT INTO personas (nombre, paterno, materno, rol, carnet, celular, email, contraseña) 
                    VALUES ('$nombre', '$paterno', '$materno', '$rol', '$carnet', '$celular', '$email', '$hash')";

    if ($conn->query($sql_persona) === TRUE) {
        echo "Registro exitoso. Se ha creado la persona como $rol.";
    } else {
        echo "Error al crear la persona: " . $conn->error;
    }

    $conn->close();
}
?>