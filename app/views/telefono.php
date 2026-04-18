<!DOCTYPE html>
<html>
<head>
    <title>Teléfonos</title>
</head>
<body>

<h2>Registro de Teléfono</h2>

<form method="POST" action="?action=create">
    <input type="text" name="numero" placeholder="Ingrese número" required>
    <button type="submit">Guardar</button>
</form>

<hr>

<h3>Lista de teléfonos</h3>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Número</th>
    </tr>

    <?php foreach ($telefonos as $tel): ?>
        <tr>
            <td><?php echo $tel['id']; ?></td>
            <td><?php echo $tel['numero']; ?></td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>