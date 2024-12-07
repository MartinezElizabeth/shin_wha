<?php
// Definir constantes de conexión
define("USER", "root");
define("SERVER", "localhost");
define("BD", "restaurt2");
define("PASS", "");

// Crear conexión a la base de datos
$mysqli = new mysqli(SERVER, USER, PASS, BD);

// Verificar si hay errores de conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

// Configuración para manejar correctamente los caracteres especiales
$mysqli->set_charset("utf8mb4");

// Mensaje opcional para depuración (puedes comentar esta línea en producción)
// echo "Conexión exitosa a la base de datos.";
?>

