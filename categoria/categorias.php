<?php
// Incluye el archivo de configuración
include '../bdconfig/config.php'; 

// Consulta para obtener las categorías
$query = "SELECT * FROM categorias";
$resultado = $mysqli->query($query); // Usa $mysqli en lugar de $conn

// Verificar si la consulta fue exitosa
if (!$resultado) {
    die("Error en la consulta: " . $mysqli->error);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/categorias.css">
    <!-- Vincular el archivo de estilos del modal -->
    <link rel="stylesheet" href="../css/categorias.css">
    <title>Gestión de Categorías</title>
    <!-- Agregar SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <h1>Gestión de Categorías</h1>
    <a href="agregar.php">Agregar Categoría</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id_categoria'] ?></td>
                    <td><?= $row['nombre_categoria'] ?></td>
                    <td><?= $row['descripcion'] ?></td>
                    <td>
                        <a href="editar.php?id=<?= $row['id_categoria'] ?>">Editar</a>
                        <!-- Enlace para eliminar con SweetAlert2 -->
                        <a href="eliminar.php?id=<?= $row['id_categoria'] ?>" onclick="return confirmEliminar(event, this.href)">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <script>
        // Función para confirmar la eliminación con SweetAlert2
        function confirmEliminar(event, url) {
            event.preventDefault(); // Evitar la redirección inmediata

            // Usar SweetAlert2 para la confirmación
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'No podrás deshacer esta acción.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#800000', // Rojo oscuro
                cancelButtonColor: '#80cbc4', // Verde claro
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url; // Redirigir si se confirma
                }
            });
        }
    </script>
</body>
</html>
