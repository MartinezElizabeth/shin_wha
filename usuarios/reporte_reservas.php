<?php
require('../fpdf/fpdf.php'); // Asegúrate de tener la librería FPDF en la ruta correcta

// Conexión a la base de datos
include '../bdconfig/config.php';

// Consulta para obtener los datos de las reservas
$query = "SELECT r.id_reserva, m.numero_mesa, p.nombre_persona, r.fecha_reserva, 
                 CASE r.estado_reserva WHEN 1 THEN 'Activa' ELSE 'Cancelada' END AS estado_reserva, 
                 r.reservascol
          FROM reservas r
          JOIN mesas m ON r.id_mesa = m.id_mesa
          JOIN personas p ON r.personas_id_persona = p.id_persona";

$result = $mysqli->query($query);

// Creación del PDF
$pdf = new FPDF();
$pdf->AddPage();

// Establecer fuente
$pdf->SetFont('Arial', 'B', 16);

// Título del reporte
$pdf->SetTextColor(255, 255, 255); // Color blanco para el título
$pdf->SetFillColor(153, 0, 51); // Color de fondo rojo vino
$pdf->Cell(0, 10, 'Reporte de Reservas', 0, 1, 'C', true);

// Salto de línea
$pdf->Ln(10);

// Establecer fuente para los encabezados de la tabla
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(0, 51, 102); // Fondo azul celeste para los encabezados
$pdf->SetTextColor(255, 255, 255); // Texto blanco

// Encabezado de la tabla
$pdf->Cell(30, 10, 'ID Reserva', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Mesa', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Cliente', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Fecha de Reserva', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Estado', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Notas', 1, 1, 'C', true); // Aumentamos el tamaño de la celda para las Notas

// Establecer fuente para el contenido de la tabla
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0, 0, 0); // Texto negro

// Agregar los datos de las reservas
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(30, 10, $row['id_reserva'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['numero_mesa'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['nombre_persona'], 1, 0, 'C');
    $pdf->Cell(40, 10, date('d-m-Y H:i', strtotime($row['fecha_reserva'])), 1, 0, 'C');
    $pdf->Cell(40, 10, $row['estado_reserva'], 1, 0, 'C');
    $pdf->Cell(50, 10, $row['reservascol'], 1, 1, 'C'); // Aseguramos que se imprima correctamente la columna Notas
}

// Salto de línea para dejar espacio para la fecha
$pdf->Ln(10);

// Estilo de la fecha
$pdf->SetFont('Arial', 'I', 12);
$pdf->SetTextColor(153, 0, 51); // Rojo vino para la fecha
$pdf->Cell(0, 10, 'Fecha de generacion: ' . date('d-m-Y'), 0, 1, 'C');

// Salida del PDF
$pdf->Output();
?>
