<?php
include '../bdconfig/config.php'; // Conexión a la base de datos

// Consulta para listar mesas con sus categorías
$query = "SELECT m.id_mesa, m.numero_mesa, c.nombre_categoria, m.capacidad, 
                 m.ubicacion, 
                 CASE m.estado WHEN 1 THEN 'Disponible' ELSE 'Ocupada' END AS estado
          FROM mesas m
          JOIN categorias c ON m.id_categoria = c.id_categoria";

$result = $mysqli->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mesas.css">
    <title>Listado de Mesas</title>
</head>
<body>
    <h1>Mesas</h1>
    <a href="agregar_mesa.php" class="btn-agregar">Agregar Mesa</a>

    <!-- Botón para generar reporte PDF -->
    <a href="reporte_mesas.php" class="btn-reporte">Generar Reporte en PDF</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Número</th>
                <th>Categoría</th>
                <th>Capacidad</th>
                <th>Ubicación</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id_mesa'] ?></td>
                <td><?= $row['numero_mesa'] ?></td>
                <td><?= $row['nombre_categoria'] ?></td>
                <td><?= $row['capacidad'] ?></td>
                <td><?= $row['ubicacion'] ?></td>
                <td><?= $row['estado'] ?></td>
                <td>
                    <a href="editar_mesa.php?id=<?= $row['id_mesa'] ?>" class="btn-editar">Editar</a>
                    <a href="eliminar_mesa.php?id=<?= $row['id_mesa'] ?>" class="btn-eliminar" onclick="return confirm('¿Está seguro de eliminar esta mesa?')">Eliminar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
