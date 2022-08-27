<?php

require_once("../Modelo/Factura.php");

$objregistro = new Factura;
$datos = $objregistro->ObtenerTodos();

require('../fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();

$pdf->Image('../img/farmacia.png', 0, 0, 70);
$pdf->SetFont('Times', 'B', 40);
$pdf->SetXY(80, 15);
$pdf->Cell(100, 8, 'KARDEX', 0, 0, 'C', 0);
$pdf->Ln(40);

$pdf->SetY(60);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(122, 170, 194);
$pdf->SetFont('Arial', 'B', 19);
$pdf->Cell(40, 25, "Fecha", 1, 0, "C", 1);
$pdf->Cell(40, 25, "Producto", 1, 0, "C", 1);
$pdf->Ln(2);

$pdf->SetY(60);
$pdf->SetX(90);
$pdf->SetFont('Arial', 'B', 19);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(122, 170, 194);
$pdf->Cell(120, 20, "Detalle", 1, 0, "C", 1);
$pdf->Ln(2);

$pdf->SetY(75);
$pdf->SetX(90);
$pdf->SetFont('Arial', 'B', 19);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(122, 170, 194);
$pdf->Cell(40, 10, "Precio U.", 1, 0, "C", 1);
$pdf->Cell(40, 10, "Cantidad", 1, 0, "C", 1);
$pdf->Cell(40, 10, "Total", 1, 0, "C", 1);
$pdf->Ln(2);

$pdf->SetY(85);
$pdf->SetX(10);
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetTextColor(0, 0, 0);
for ($i=0; $i <count($datos) ; $i++) { 
    $pdf->SetX(10);
    $fecha = $datos[$i]['fecha'];
    $pdf->Cell(40, 12,  "$fecha", 1, 1, "C");
}
$pdf->Ln(2);

$pdf->SetY(85);
$pdf->SetX(50);
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetTextColor(0, 0, 0);
for ($i=0; $i <count($datos) ; $i++) { 
    $pdf->SetX(50);
    $nombre = $datos[$i]['nombre_Producto'];
    $pdf->Cell(40, 12,  "$nombre", 1, 1, "C");
}
$pdf->Ln(2);

$pdf->SetY(85);
$pdf->SetX(90);
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetTextColor(0, 0, 0);
for ($i=0; $i <count($datos) ; $i++) { 
    $pdf->SetX(90);
    $precio = $datos[$i]['precio_Venta'];
$pdf->Cell(40, 12, "$precio", 1, 1, "C");
}
$pdf->Ln(2);

$pdf->SetY(85);
$pdf->SetX(130);
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetTextColor(0, 0, 0);
for ($i=0; $i <count($datos) ; $i++) { 
    $pdf->SetX(130);
    $cantidad = $datos[$i]['cantidad'];
$pdf->Cell(40, 12, "$cantidad", 1, 1, "C");
}
$pdf->Ln(2);

$pdf->SetY(85);
$pdf->SetX(170);
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetTextColor(0, 0, 0);
for ($i=0; $i <count($datos) ; $i++) { 
    $pdf->SetX(170);
    $total = $datos[$i]['total'];
$pdf->Cell(40, 12, "$total", 1, 1, "C");
}
$pdf->Ln(2);

$pdf->Output();
