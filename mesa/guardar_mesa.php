<?php
include '../bdconfig/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero_mesa = $_POST['numero_mesa'];
    $id_categoria = $_POST['id_categoria'];
    $capacidad = $_POST['capacidad'];
    $ubicacion = $_POST['ubicacion'];
    $estado = $_POST['estado'];

    $query = "INSERT INTO mesas (numero_mesa, id_categoria, capacidad, ubicacion, estado)
              VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);

    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $mysqli->error);
    }

    $stmt->bind_param("iiisi", $numero_mesa, $id_categoria, $capacidad, $ubicacion, $estado);
    if ($stmt->execute()) {
        header("Location: listar_mesas.php");
        exit;
    } else {
        die("Error al guardar la mesa: " . $stmt->error);
    }
}
?>
