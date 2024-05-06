<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Persona</title>
    <style>
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
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
    <h2>Registro de Persona</h2>
    <form action="procesar_registro_operador_director.php" method="post">
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
        <input type="password" id="password" name="password" required>

        <label for="rol">Rol:</label>
        <select id="rol" name="rol" required>
            <option value="operador">Operador</option>
            <option value="director_bancario">Director Bancario</option>
        </select>

        <button type="submit">Registrar</button>
    </form>
</body>

</html>