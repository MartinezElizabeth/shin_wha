<?php
include '../bdconfig/config.php';

// Validar si se recibe el ID de la reserva
if (!isset($_GET['id'])) {
    die("ID de reserva no especificado.");
}

$id_reserva = $_GET['id'];

// Consultar datos de la reserva
$query = "SELECT * FROM reservas WHERE id_reserva = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id_reserva);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Reserva no encontrada.");
}

$reserva = $result->fetch_assoc();

// Obtener las mesas disponibles
$mesas = $mysqli->query("SELECT id_mesa, numero_mesa FROM mesas");

// Obtener los clientes disponibles
$personas = $mysqli->query("SELECT id_persona, nombre_persona FROM personas");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mesas.css">
    <title>Editar Reserva</title>
</head>
<body>
    <h1>Editar Reserva</h1>
    <form action="guardar_reserva.php" method="POST">
        <input type="hidden" name="id_reserva" value="<?= $reserva['id_reserva'] ?>">

        <label for="mesa">Mesa:</label>
        <select id="mesa" name="id_mesa" required>
            <?php while ($mesa = $mesas->fetch_assoc()): ?>
                <option value="<?= $mesa['id_mesa'] ?>" <?= $mesa['id_mesa'] == $reserva['id_mesa'] ? 'selected' : '' ?>>
                    <?= $mesa['numero_mesa'] ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="cliente">Cliente:</label>
        <select id="cliente" name="personas_id_persona" required>
            <?php while ($persona = $personas->fetch_assoc()): ?>
                <option value="<?= $persona['id_persona'] ?>" <?= $persona['id_persona'] == $reserva['personas_id_persona'] ? 'selected' : '' ?>>
                    <?= $persona['nombre_persona'] ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="fecha_reserva">Fecha y Hora de la Reserva:</label>
        <input type="datetime-local" id="fecha_reserva" name="fecha_reserva" value="<?= date('Y-m-d\TH:i', strtotime($reserva['fecha_reserva'])) ?>" required>

        <label for="estado_reserva">Estado de la Reserva:</label>
        <select id="estado_reserva" name="estado_reserva" required>
            <option value="1" <?= $reserva['estado_reserva'] == 1 ? 'selected' : '' ?>>Activa</option>
            <option value="0" <?= $reserva['estado_reserva'] == 0 ? 'selected' : '' ?>>Cancelada</option>
        </select>

        <label for="reservascol">Notas:</label>
        <input type="text" id="reservascol" name="reservascol" value="<?= htmlspecialchars($reserva['reservascol'] ?? '') ?>" placeholder="Opcional">

        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
