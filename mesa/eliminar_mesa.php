<?php
include '../bdconfig/config.php';

if (!isset($_GET['id'])) {
    die("ID de mesa no especificado.");
}

$id_mesa = $_GET['id'];

$query = "DELETE FROM mesas WHERE id_mesa = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id_mesa);

if ($stmt->execute()) {
    header("Location: listar_mesas.php");
    exit;
} else {
    die("Error al eliminar la mesa: " . $stmt->error);
}
?>
