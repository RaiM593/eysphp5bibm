<?php
require_once("../controllers/DireccionController.php");
require_once("../config/database.php"); 

$database = new Database();
$db = $database->getConnection();

$controller = new DireccionController($db);

// GUARDAR
if ($_POST) {
    $controller->store($_POST);
}

// LISTAR
$direcciones = $controller->index();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Direcciones</title>
</head>
<body>

<h2>Registro de Dirección</h2>

<form method="POST">
    <label>Dirección:</label>
    <input type="text" name="descripcion" required>
    <button type="submit">Guardar</button>
</form>

<hr>

<h3>Lista de Direcciones</h3>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Descripción</th>
    </tr>

    <?php foreach ($direcciones as $dir): ?>
        <tr>
            <td><?php echo $dir['id']; ?></td>
            <td><?php echo $dir['descripcion']; ?></td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>