<?php
include 'config.php';

// Comprobando si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $peso=$_POST ['peso'];
    $raza=$_POST['raza'];
    $tipo=$_POST['tipo'];
    $id = $_POST['id'];

    $stmt = $pdo->prepare("UPDATE animales SET nombre = ?, descripcion = ?, peso =?, raza=?, tipo=? WHERE id = ?");
    $stmt->execute([$nombre, $descripcion, $peso, $raza, $tipo, $id]);

    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->query("SELECT * FROM animales WHERE id = $id");
$animal = $stmt->fetch();

?>

<h2>Editar animal</h2>

<form action="edit.php" method="post">
    <input type="hidden" name="id" value="<?php echo $animal['id']; ?>">
    Nombre: <input type="text" name="nombre" value="<?php echo $animal['nombre']; ?>"><br>
    Descripción: <input type="text" name="descripcion" value="<?php echo $animal['descripcion']; ?>"><br>
    Peso: <input type="number" name="peso" value="<?php echo $animal['peso']; ?>"><br>
    Raza: <input type="text" name="raza" value="<?php echo $animal['raza']; ?>"><br>
    Tipo: <input type="text" name="tipo" value="<?php echo $animal['tipo']; ?>"><br>


    <input type="submit" value="Guardar Cambios">
</form>
