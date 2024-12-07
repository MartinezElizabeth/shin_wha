<?php
// Incluir archivo de configuración
include '../bdconfig/config.php';

// Verificar si se ha recibido el ID de la categoría
if (isset($_GET['id'])) {
    $id_categoria = $_GET['id'];

    // Consulta para obtener los datos de la categoría
    $query = "SELECT * FROM categorias WHERE id_categoria = $id_categoria";
    $resultado = $mysqli->query($query);
    if ($resultado) {
        $categoria = $resultado->fetch_assoc();
    } else {
        die("Error al obtener los datos de la categoría.");
    }
}

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    // Actualizar la categoría en la base de datos
    $query_update = "UPDATE categorias SET nombre_categoria = '$nombre', descripcion = '$descripcion' WHERE id_categoria = $id_categoria";
    if ($mysqli->query($query_update)) {
        header('Location: categorias.php'); // Redirigir al listado de categorías
        exit;
    } else {
        echo "Error al actualizar la categoría: " . $mysqli->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/categorias.css">
    <title>Editar Categoría</title>
</head>
<body>
    <h1>Editar Categoría</h1>
    <form action="editar.php?id=<?= $categoria['id_categoria'] ?>" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?= $categoria['nombre_categoria'] ?>" required>

        <label for="descripcion">Descripción:</label>
        <select id="descripcion" name="descripcion" required>
            <option value="<?= $categoria['descripcion'] ?>"><?= $categoria['descripcion'] ?></option>
            <!-- Aquí puedes agregar más opciones para seleccionar -->
            <option value="Mesa de lujo con habitación">Mesa de lujo con habitación</option>
            <option value="Mesa estándar">Mesa estándar</option>
            <option value="Mesa VIP">Mesa VIP</option>
        </select>

        <button type="submit">Actualizar</button>
    </form>
    <a href="categorias.php">Volver al listado</a>
</body>
</html>
