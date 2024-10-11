<?php
include 'config.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $peso = $_POST['peso'];
    $raza = $_POST['raza'];
    $tipo = $_POST['tipo'];

    try {
        $sql = "INSERT INTO animales (nombre, descripcion, peso, raza, tipo) VALUES (:nombre, :descripcion, :peso, :raza, :tipo)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nombre' => $nombre, 'descripcion' => $descripcion, 'peso' => $peso, 'raza' => $raza, 'tipo' => $tipo]);

        $message = 'Animal añadido con éxito!';
    } catch (PDOException $e) {
        $message = 'Error al añadir el animal: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir animal</title>
</head>
<body>
<h2>Añadir nuevo animal</h2>

<?php if (!empty($message)): ?>
    <p><?= $message ?></p>
<?php endif; ?>

<form action="create.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    <br>
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion"></textarea>
    <br>
    <label for="peso">peso:</label>
    <input type="number" name="peso" id="peso" required>
    <br>
    <label for="raza">raza:</label>
    <input type="text" name="raza" id="raza" required>
    <br>
    <label for="tipo">tipo:</label>
    <input type="text" name="tipo" id="tipo" required>
    <br>
    <input type="submit" value="Añadir animal">
</form>

</body>
</html>
