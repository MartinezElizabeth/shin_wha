<?php
if (isset($_GET['id'])) {
    // Incluir la configuración de la base de datos
    include '../bdconfig/config.php';

    // Obtener el ID de la categoría a eliminar
    $id = $_GET['id'];

    // Preparar y ejecutar la consulta para eliminar
    $query = "DELETE FROM categorias WHERE id_categoria = ?";
    $stmt = $mysqli->prepare($query); // Usar $mysqli en lugar de $conn

    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $mysqli->error);
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirigir de vuelta a la página principal si la eliminación es exitosa
        header("Location: categorias.php");
        exit;
    } else {
        die("Error al eliminar la categoría: " . $stmt->error);
    }
} else {
    die("ID de categoría no proporcionado.");
}
?>
