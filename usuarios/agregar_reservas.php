<?php
include '../bdconfig/config.php';

// Validar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id_mesa = $_POST['id_mesa'];
    $personas_id_persona = $_POST['personas_id_persona'];
    $fecha_reserva = $_POST['fecha_reserva'];  // La fecha es una cadena con el formato 'YYYY-MM-DDTHH:MM'
    $estado_reserva = $_POST['estado_reserva'];
    $reservascol = $_POST['reservascol'];

    // Validar los datos antes de insertar
    if (empty($id_mesa) || empty($personas_id_persona) || empty($fecha_reserva) || !isset($estado_reserva)) {
        die("Por favor, complete todos los campos requeridos.");
    }

    // Preparar la consulta para insertar la reserva
    $query = "INSERT INTO reservas (id_mesa, fecha_reserva, estado_reserva, reservascol, personas_id_persona) 
              VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    // Cambiar la definición del bind_param para que coincida con los tipos de los parámetros
    $stmt->bind_param("isisi", $id_mesa, $fecha_reserva, $estado_reserva, $reservascol, $personas_id_persona);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirigir después de insertar
        header("Location: listar_reservas.php");
        exit();
    } else {
        die("Error al guardar la reserva: " . $stmt->error);
    }
}

// Obtener las mesas disponibles
$mesas = $mysqli->query("SELECT id_mesa, numero_mesa FROM mesas");

// Obtener los clientes/personas disponibles
$personas = $mysqli->query("SELECT id_persona, nombre_persona FROM personas");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mesas.css">
    <title>Agregar Reserva</title>
</head>
<body>
    <h1>Agregar Reserva</h1>
    <form action="guardar_reserva.php" method="POST">
        <label for="mesa">Mesa:</label>
        <select id="mesa" name="id_mesa" required>
            <?php while ($mesa = $mesas->fetch_assoc()): ?>
                <option value="<?= $mesa['id_mesa'] ?>"><?= $mesa['numero_mesa'] ?></option>
            <?php endwhile; ?>
        </select>

        <label for="persona">Cliente:</label>
        <select id="persona" name="personas_id_persona" required>
            <?php while ($persona = $personas->fetch_assoc()): ?>
                <option value="<?= $persona['id_persona'] ?>"><?= $persona['nombre_persona'] ?></option>
            <?php endwhile; ?>
        </select>

        <label for="fecha_reserva">Fecha y Hora de Reserva:</label>
        <input type="datetime-local" id="fecha_reserva" name="fecha_reserva" required>

        <label for="estado_reserva">Estado:</label>
        <select id="estado_reserva" name="estado_reserva" required>
            <option value="1">Activa</option>
            <option value="0">Cancelada</option>
        </select>

        <label for="reservascol">Notas:</label>
        <input type="text" id="reservascol" name="reservascol" placeholder="Opcional">

        <button type="submit">Guardar</button>
        <!-- Botón Cancelar -->
        <a href="listar_reservas.php">
            <button type="button" class="cancelar">CANCELAR</button>
        </a>
    </form>
</body>
</html>
