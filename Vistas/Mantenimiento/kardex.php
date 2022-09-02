<?php

require_once("../../Modelo/Factura.php");

$objfactura = new Factura;

$datos = $objfactura->ObtenerTodos();

require('../../fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();

$pdf->Image('../../img/farmacia.png', 0, 0, 70);
$pdf->SetFont('Times', 'B', 40);
$pdf->SetXY(80, 15);
$pdf->Cell(100, 8, 'KARDEX', 0, 0, 'C', 0);
$pdf->Ln(40);


$pdf->SetY(60);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(122, 170, 194);
$pdf->SetFont('Arial', 'B', 18);
$pdf->SetX(4);
$pdf->Cell(27, 25, "Fecha", 1, 0, "C", 1);
$pdf->Cell(27, 25, "Detalle", 1, 0, "C", 1);
$pdf->Ln(2);

$pdf->SetY(60);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(122, 170, 194);
$pdf->SetFont('Arial', 'B', 18);
$pdf->SetX(58);
$pdf->Cell(30, 25, "Producto", 1, 0, "C", 1);

$pdf->SetY(60);
$pdf->SetX(88);
$pdf->SetFont('Arial', 'B', 19);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(122, 170, 194);
$pdf->Cell(120, 15, "Entrada", 1, 0, "C", 1);
$pdf->Ln(2);

$pdf->SetY(75);
$pdf->SetX(88);
$pdf->SetFont('Arial', 'B', 19);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(122, 170, 194);
$pdf->Cell(40, 10, "Precio U.", 1, 0, "C", 1);
$pdf->Cell(40, 10, "Cantidad", 1, 0, "C", 1);
$pdf->Cell(40, 10, "Total", 1, 0, "C", 1);
$pdf->Ln(2);

$pdf->SetY(85);
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetTextColor(0, 0, 0);
for ($i = 0; $i < count($datos); $i++) {
    $pdf->SetX(4);
    $fecha = $datos[$i]['fecha'];
    $part1 = explode(' ', $fecha);
    $f_final = $part1[0];
    $pdf->Cell(27, 13,  "$f_final", 1, 1, "C");
}
$pdf->Ln(2);

$pdf->SetY(85);
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetTextColor(0, 0, 0);
for ($i = 0; $i < count($datos); $i++) {
    $pdf->SetX(31);
    $detalle = $datos[$i]['detalle'];
    $pdf->Cell(27, 13,  "$detalle", 1, 1, "C");
}
$pdf->Ln(2);


$pdf->SetY(85);
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetTextColor(0, 0, 0);
for ($i = 0; $i < count($datos); $i++) {
    $pdf->SetX(58);
    $nombre = $datos[$i]['nombre_Producto'];
    $pdf->Cell(30, 13,  "$nombre", 1, 1, "C");
}
$pdf->Ln(2);

$pdf->SetY(85);
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetTextColor(0, 0, 0);
for ($i = 0; $i < count($datos); $i++) {
    $pdf->SetX(88);
    $precio = $datos[$i]['precio_Venta'];
    $pdf->Cell(40, 13, "$precio", 1, 1, "C");
}
$pdf->Ln(2);

$pdf->SetY(85);
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetTextColor(0, 0, 0);
for ($i = 0; $i < count($datos); $i++) {
    $pdf->SetX(128);
    $cantidad = $datos[$i]['cantidad'];
    $pdf->Cell(40, 13, "$cantidad", 1, 1, "C");
}
$pdf->Ln(2);

$pdf->SetY(85);
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetTextColor(0, 0, 0);
for ($i = 0; $i < count($datos); $i++) {
    $pdf->SetX(168);
    $total = $datos[$i]['total'];
    $pdf->Cell(40, 13, "$total", 1, 1, "C");
}
$pdf->Ln(2);

$pdf->Output();
