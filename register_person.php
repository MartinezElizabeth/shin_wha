<?php
// Incluir el archivo de configuración para la conexión a la base de datos
require 'bdconfig/config.php'; // Ruta correcta a tu archivo de configuración

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario y usar mysqli_real_escape_string con la conexión correcta
    $nombre_persona = $mysqli->real_escape_string($_POST['nombre_persona']);
    $correo = $mysqli->real_escape_string($_POST['correo']);
    $telefono = $mysqli->real_escape_string($_POST['telefono']);
    $cargo = isset($_POST['cargo']) ? $mysqli->real_escape_string($_POST['cargo']) : NULL;  // Cargo es opcional

    // Consulta SQL para insertar los datos en la base de datos
    $sql = "INSERT INTO personas (nombre_persona, correo, telefono, cargo) 
            VALUES ('$nombre_persona', '$correo', '$telefono', '$cargo')";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($mysqli->query($sql)) {
        // Si el registro fue exitoso, redirige a index.php
        header("Location: index.php");
        exit();
    } else {
        // Si ocurre un error, muestra un mensaje
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    // Cerrar la conexión (aunque no es estrictamente necesario con mysqli, es una buena práctica)
    $mysqli->close();
}
?>
