<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $paterno = $_POST["paterno"];
    $materno = $_POST["materno"];
    $carnet = $_POST["carnet"];
    $celular = $_POST["celular"];
    $departamento = $_POST["departamento"];
    $email = $_POST["email"];
    $tipo_cuenta = $_POST["tipo_cuenta"];
    $contrasenha = $_POST["password"];

    $hash = password_hash($contrasenha, PASSWORD_DEFAULT);

    $pin = generar_pin();

    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $database = "DBAlejandro";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $sql_persona = "INSERT INTO personas (nombre, paterno, materno, rol, carnet, celular, departamento, email, contraseña) 
                    VALUES ('$nombre', '$paterno', '$materno', 'cliente', '$carnet', '$celular', '$departamento', '$email', '$hash')";

    if ($conn->query($sql_persona) === TRUE) {
        $id_persona = $conn->insert_id;

        $sql_cuenta = "INSERT INTO cuentas_bancarias (id_persona, tipo_cuenta, pin) 
                       VALUES ('$id_persona', '$tipo_cuenta', '$pin')";

        if ($conn->query($sql_cuenta) === TRUE) {
            echo "Registro exitoso. Se ha creado la persona y la cuenta bancaria.";
        } else {
            echo "Error al crear la cuenta bancaria: " . $conn->error;
        }
    } else {
        echo "Error al crear la persona: " . $conn->error;
    }

    $conn->close();
}

function generar_pin()
{
    return sprintf('%04d', rand(0, 9999));
}
?>