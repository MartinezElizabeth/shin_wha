<?php
include '../bdconfig/config.php';

// Validar si se recibe el ID de la reserva
if (!isset($_GET['id'])) {
    die("ID de reserva no especificado.");
}

$id_reserva = $_GET['id'];

// Consultar si la reserva existe
$query = "SELECT * FROM reservas WHERE id_reserva = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id_reserva);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Reserva no encontrada.");
}

// Eliminar la reserva
$query = "DELETE FROM reservas WHERE id_reserva = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id_reserva);

if ($stmt->execute()) {
    header("Location: listar_reservas.php");
    exit;
} else {
    die("Error al eliminar la reserva: " . $stmt->error);
}
?>
