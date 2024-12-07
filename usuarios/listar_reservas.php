<?php
include '../bdconfig/config.php'; // Conexión a la base de datos

// Consulta para listar las reservas con sus mesas y personas
$query = "
    SELECT 
        r.id_reserva,
        m.numero_mesa,
        r.fecha_reserva,
        CASE r.estado_reserva WHEN 1 THEN 'Activa' ELSE 'Cancelada' END AS estado_reserva,
        p.nombre_persona,
        r.reservascol
    FROM 
        reservas r
    JOIN 
        mesas m ON r.id_mesa = m.id_mesa
    JOIN 
        personas p ON r.personas_id_persona = p.id_persona
    ORDER BY 
        r.fecha_reserva DESC
";

$result = $mysqli->query($query);

if (!$result) {
    die("Error en la consulta: " . $mysqli->error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mesas.css">
    <title>Listado de Reservas</title>
</head>
<body>
    <h1>Reservas</h1>
    <a href="agregar_reservas.php" class="btn-agregar">Agregar Reserva</a>

    <!-- Botón para generar reporte PDF -->
    <a href="reporte_reservas.php" class="btn-reporte">Generar Reporte en PDF</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Mesa</th>
                <th>Fecha Reserva</th>
                <th>Estado</th>
                <th>Cliente</th>
                <th>Notas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id_reserva'] ?></td>
                <td><?= $row['numero_mesa'] ?></td>
                <td><?= $row['fecha_reserva'] ?></td>
                <td><?= $row['estado_reserva'] ?></td>
                <td><?= $row['nombre_persona'] ?></td>
                <td><?= $row['reservascol'] ?></td>
                <td>
                    <a href="editar_reserva.php?id=<?= $row['id_reserva'] ?>" class="btn-editar">Editar</a>
                    <a href="eliminar_reservas.php?id=<?= $row['id_reserva'] ?>" class="btn-eliminar" onclick="return confirm('¿Está seguro de eliminar esta reserva?')">Eliminar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
