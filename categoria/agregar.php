<?php
// Procesar el formulario cuando se envía
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../bdconfig/config.php'; // Conexión a la base de datos

    // Recibe los datos del formulario
    $nombre = $_POST['nombre_categoria'];
    $descripcion = $_POST['descripcion'];

    // Verifica si la conexión está definida
    if (!isset($mysqli)) {
        die("Error: No se pudo conectar a la base de datos.");
    }

    // Prepara y ejecuta la consulta
    $query = "INSERT INTO categorias (nombre_categoria, descripcion) VALUES (?, ?)";
    $stmt = $mysqli->prepare($query);

    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $mysqli->error);
    }

    $stmt->bind_param("ss", $nombre, $descripcion);
    if ($stmt->execute()) {
        header("Location: categorias.php"); // Redirige a la lista de categorías
        exit;
    } else {
        die("Error al guardar la categoría: " . $stmt->error);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Categoría</title>
    <style>
        /* Estilo básico para la página */
        body {
            font-family: Arial, sans-serif;
            background-color: #121212; /* Fondo oscuro */
            color: #fff; /* Texto blanco */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        /* Estilo para el título */
        h1 {
            color: #ff4500; /* Naranja brillante */
            text-align: center;
            margin-top: 20px;
        }

        /* Formulario de agregar categoría */
        form {
            width: 60%;
            max-width: 500px;
            background-color: #333; /* Fondo gris oscuro */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        /* Estilo para los campos del formulario */
        label {
            display: block;
            margin-bottom: 10px;
            color: #fff;
            font-size: 1.1rem;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            background-color: #444; /* Fondo oscuro */
            color: #fff;
            border: 2px solid #80cbc4; /* Borde verde claro */
            border-radius: 5px;
            font-size: 1rem;
        }

        input[type="text"]:focus, textarea:focus {
            border-color: #ff4500; /* Borde naranja brillante al hacer foco */
            outline: none;
        }

        /* Estilo para el botón */
        button[type="submit"] {
            padding: 12px 20px;
            background-color: #ff4500; /* Naranja brillante */
            color: white; /* Texto blanco */
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 1rem;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5); /* Sombra sutil para el texto */
        }

        /* Efecto hover para el botón */
        button[type="submit"]:hover {
            background-color: #d43f00; /* Naranja más oscuro para hover */
        }

        /* Estilo para el enlace */
        a {
            color: #80cbc4; /* Verde claro */
            text-decoration: none;
            font-weight: bold;
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        /* Cambiar color de los enlaces al pasar el mouse */
        a:hover {
            color: #66b3b3; /* Hover color */
        }
    </style>
</head>
<body>
    <h1>Agregar Categoría</h1>

    <!-- Formulario para agregar categoría -->
    <form action="agregar.php" method="POST">
        <label for="nombre_categoria">Nombre:</label>
        <input type="text" id="nombre_categoria" name="nombre_categoria" required>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" rows="4" placeholder="Descripción de la categoría"></textarea>

        <button type="submit">Guardar</button>
    </form>

    <a href="categorias.php">Volver a la lista de categorías</a>
</body>
</html>
