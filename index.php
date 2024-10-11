<?php
include 'config.php';

$stmt = $pdo->query('SELECT * FROM animales');
$animales = $stmt->fetchAll();
?>

<h2>Listado de animales</h2>

<!-- Botón para crear un nuevo animal -->
<a href="create.php">Crear nuevo animal</a>
<br><br>

<table border="4">
<?php foreach ($animales as $animal): ?>
    <tr>
        <td><b> <?= $animal['nombre'] ?> </b></td> <td><?= $animal['descripcion'] ?></td><td><?= $animal['peso'] ?> kg.</td><td><?= $animal['raza'] ?></td><td><?= $animal['tipo'] ?></td>
        <td><a href="edit.php?id=<?php echo $animal['id']; ?>">Editar</a></td>
        <td><a href="delete.php?id=<?php echo $animal['id']; ?>">Eliminar</a></td>
    </tr>
<?php endforeach; ?>
</table>
