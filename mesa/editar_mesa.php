<?php
include '../bdconfig/config.php';

// Validar si se recibe el ID de la mesa
if (!isset($_GET['id'])) {
    die("ID de mesa no especificado.");
}

$id_mesa = $_GET['id'];

// Consultar datos de la mesa
$query = "SELECT * FROM mesas WHERE id_mesa = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id_mesa);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Mesa no encontrada.");
}

$mesa = $result->fetch_assoc();

// Obtener las categorías disponibles
$categorias = $mysqli->query("SELECT id_categoria, nombre_categoria FROM categorias");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mesas.css">
    <title>Editar Mesa</title>
</head>
<body>
    <h1>Editar Mesa</h1>
    <form action="guardar_mesa.php" method="POST">
        <input type="hidden" name="id_mesa" value="<?= $mesa['id_mesa'] ?>">

        <label for="numero_mesa">Número de Mesa:</label>
        <input type="number" id="numero_mesa" name="numero_mesa" value="<?= $mesa['numero_mesa'] ?>" required>

        <label for="categoria">Categoría:</label>
        <select id="categoria" name="id_categoria" required>
            <?php while ($categoria = $categorias->fetch_assoc()): ?>
                <option value="<?= $categoria['id_categoria'] ?>" <?= $categoria['id_categoria'] == $mesa['id_categoria'] ? 'selected' : '' ?>>
                    <?= $categoria['nombre_categoria'] ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="capacidad">Capacidad:</label>
        <input type="number" id="capacidad" name="capacidad" value="<?= $mesa['capacidad'] ?>" required>

        <label for="ubicacion">Ubicación:</label>
        <input type="text" id="ubicacion" name="ubicacion" value="<?= $mesa['ubicacion'] ?>" required>

        <label for="estado">Estado:</label>
        <select id="estado" name="estado" required>
            <option value="1" <?= $mesa['estado'] == 1 ? 'selected' : '' ?>>Disponible</option>
            <option value="0" <?= $mesa['estado'] == 0 ? 'selected' : '' ?>>Ocupada</option>
        </select>

        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
