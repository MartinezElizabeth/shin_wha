
<?php
require('../fpdf/fpdf.php'); // Asegúrate de tener la librería FPDF en la ruta correcta

// Conexión a la base de datos
include '../bdconfig/config.php';

// Consulta para obtener los datos de las mesas
$query = "SELECT m.numero_mesa, c.nombre_categoria, m.capacidad, m.ubicacion,
                 CASE m.estado WHEN 1 THEN 'Disponible' ELSE 'Ocupada' END AS estado
          FROM mesas m
          JOIN categorias c ON m.id_categoria = c.id_categoria";

$result = $mysqli->query($query);

// Creación del PDF
$pdf = new FPDF();
$pdf->AddPage();

// Establecer fuente
$pdf->SetFont('Arial', 'B', 16);

// Título del reporte
$pdf->SetTextColor(255, 255, 255); // Color blanco para el título
$pdf->SetFillColor(153, 0, 51); // Color de fondo rojo vino
$pdf->Cell(0, 10, 'Reporte de Mesas', 0, 1, 'C', true);

// Salto de línea
$pdf->Ln(10);

// Establecer fuente para los encabezados de la tabla
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(0, 51, 102); // Fondo azul celeste para los encabezados
$pdf->SetTextColor(255, 255, 255); // Texto blanco

// Encabezado de la tabla
$pdf->Cell(30, 10, 'Numero', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Categoria', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Capacidad', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Ubicacion', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Estado', 1, 1, 'C', true);

// Establecer fuente para el contenido de la tabla
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0, 0, 0); // Texto negro

// Agregar los datos de las mesas
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(30, 10, $row['numero_mesa'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['nombre_categoria'], 1, 0, 'C');
    $pdf->Cell(30, 10, $row['capacidad'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['ubicacion'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['estado'], 1, 1, 'C');
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
