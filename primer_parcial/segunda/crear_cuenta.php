<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta Bancaria</title>
    <style>
        body {
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h2>Registro de Cuenta Bancaria</h2>
    <form action="procesar_registro.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="paterno">Apellido Paterno:</label>
        <input type="text" id="paterno" name="paterno" required>

        <label for="materno">Apellido Materno:</label>
        <input type="text" id="materno" name="materno" required>

        <label for="carnet">Carnet:</label>
        <input type="text" id="carnet" name="carnet" required>

        <label for="celular">Número de Celular:</label>
        <input type="text" id="celular" name="celular" required placeholder="78945612">

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>

        <label for="password">Contraseña:</label>
        <input type="text" id="password" name="password">


        <label for="departamento">Departamento:</label>
        <select id="departamento" name="departamento" required>
            <option value="La Paz">La Paz</option>
            <option value="Cochabamba">Cochabamba</option>
            <option value="Santa Cruz">Santa Cruz</option>
            <option value="Potosí">Potosí</option>
            <option value="Pando">Pando</option>
            <option value="Oruro">Oruro</option>
            <option value="Beni">Beni</option>
            <option value="Tarija">Tarija</option>
            <option value="Chuquisaca">Chuquisaca</option>
        </select>

        <label for="tipo_cuenta">Tipo de Cuenta:</label>

        <select id="tipo_cuenta" name="tipo_cuenta" required>
            <option value="cuenta corriente">Cuenta Corriente</option>
            <option value="caja de ahorro">Caja de Ahorro</option>
            <option value="nómina">Nómina</option>
            <option value="cuenta a plazo fijo">Cuenta a Plazo Fijo</option>
        </select>

        <button type="submit">Registrar</button>
    </form>
</body>

</html>