<?php
include '../bdconfig/config.php';

// Obtener las categorías disponibles
$categorias = $mysqli->query("SELECT id_categoria, nombre_categoria FROM categorias");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mesas.css">
    <title>Agregar Mesa</title>
</head>
<body>
    <h1>Agregar Mesa</h1>
    <form action="guardar_mesa.php" method="POST">
        <label for="numero_mesa">Número de Mesa:</label>
        <input type="number" id="numero_mesa" name="numero_mesa" required>

        <label for="categoria">Categoría:</label>
        <select id="categoria" name="id_categoria" required>
            <?php while ($categoria = $categorias->fetch_assoc()): ?>
                <option value="<?= $categoria['id_categoria'] ?>"><?= $categoria['nombre_categoria'] ?></option>
            <?php endwhile; ?>
        </select>

        <label for="capacidad">Capacidad:</label>
        <input type="number" id="capacidad" name="capacidad" required>

        <label for="ubicacion">Ubicación:</label>
        <input type="text" id="ubicacion" name="ubicacion" required>

        <label for="estado">Estado:</label>
        <select id="estado" name="estado" required>
            <option value="1">Disponible</option>
            <option value="0">Ocupada</option>
        </select>

        <button type="submit">Guardar</button>
        <!-- Botón Cancelar -->
        <a href="listar_mesas.php">
            <button type="button" class="cancelar">CANCELAR</button>
        </a>
    </form>
</body>
</html>
