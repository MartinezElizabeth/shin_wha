<?php
include '../bdconfig/config.php';

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $id_reserva = $_POST['id_reserva']; // Suponiendo que existe un campo oculto para el id_reserva
    $id_mesa = $_POST['id_mesa'];
    $personas_id_persona = $_POST['personas_id_persona'];
    $fecha_reserva = $_POST['fecha_reserva'];
    $estado_reserva = $_POST['estado_reserva'];
    $reservascol = $_POST['reservascol'];

    // Verificar si se va a hacer un UPDATE o un INSERT
    if (!empty($id_reserva)) {
        // Si hay un id_reserva, se hace un UPDATE
        $query = "
            UPDATE reservas 
            SET 
                id_mesa = ?, 
                personas_id_persona = ?, 
                fecha_reserva = ?, 
                estado_reserva = ?, 
                reservascol = ?
            WHERE id_reserva = ?
        ";

        $stmt = $mysqli->prepare($query);
        // Cambiar el tipo de enlace en bind_param para que coincida con los parámetros
        $stmt->bind_param("iisssi", $id_mesa, $personas_id_persona, $fecha_reserva, $estado_reserva, $reservascol, $id_reserva);
    } else {
        // Si no hay id_reserva, se hace un INSERT
        $query = "
            INSERT INTO reservas (id_mesa, personas_id_persona, fecha_reserva, estado_reserva, reservascol)
            VALUES (?, ?, ?, ?, ?)
        ";

        $stmt = $mysqli->prepare($query);
        // Cambiar el tipo de enlace en bind_param para que coincida con los parámetros
        $stmt->bind_param("iisss", $id_mesa, $personas_id_persona, $fecha_reserva, $estado_reserva, $reservascol);
    }

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirigir al listado de reservas
        header("Location: listar_reservas.php");
        exit();
    } else {
        echo "Error al guardar o actualizar la reserva: " . $mysqli->error;
    }

    $stmt->close();
}
?>
