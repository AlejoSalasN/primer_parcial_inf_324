<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Clientes</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Paterno</th>
                <th>Materno</th>
                <th>Departamento</th>
                <th>Tipo de cuenta</th>
                <th>Saldo</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?= $cliente['nombre'] ?></td>
                    <td><?= $cliente['paterno'] ?></td>
                    <td><?= $cliente['materno'] ?></td>
                    <td><?= $cliente['departamento'] ?></td>
                    <td><?= $cliente['tipo_cuenta'] ?></td>
                    <td><?= $cliente['saldo'] ?></td>
                    <td><a href="<?= base_url('clientes/eliminar_cuenta/' . $cliente['id_cuenta']) ?>">Eliminar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
