<?php
ob_start();

require_once("../../Modelo/Factura.php");
require('../../fpdf/fpdf.php');

$objregistro = new Factura;
$datos = $objregistro->ObtenerTodos();


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->Image('../../img/farmacia.png',0,0,70);
    $this->SetFont('Times','B',20);
    $this->SetXY(80,15);
    $this->Cell(100,8,'REPORTE',0,0,'C',0);
    $this->Ln(40);
}

// Pie de página
function Footer()
{

    $this->SetY(-15);

    $this->SetFont('Arial','B',10);

    $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
    $this->Cell(0,7,utf8_decode("Derechos Reservados."),0,0,"C");
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetMargins(10,10,10);
$pdf->SetAutoPageBreak(true,20);
$pdf->SetX(15);
$pdf->SetFont('Helvetica','B',15);
$pdf->Cell(10,8,'N','B',0,'C',0);
$pdf->Cell(60,8,'PRODUCTO','B',0,'C',0);
$pdf->Cell(30,8,'COSTO','B',0,'C',0);
$pdf->Cell(35,8,'CANTIDAD','B',0,'C',0);
$pdf->Cell(50,8,'TOTAL','B',1,'C',0);

$pdf->SetFillColor(233,229,235);
$pdf->SetDrawColor(61, 61, 61);

$pdf->SetFont('Arial','',12);

for($i=0; $i <count($datos) ; $i++){


    $pdf->SetX(15);
$pdf->Cell(10,8,$i,'B',0,'C',1);
$nombre = $datos[$i]['nombre_Producto'];
    $pdf->Cell(48, 12,  "$nombre", 1, 1, "C");
}



$pdf->SetY(63);

for ($i=0; $i <count($datos) ; $i++) { 
    $pdf->SetX(73);
    $precio = $datos[$i]['precio_Venta'];
$pdf->Cell(48, 12, "$precio", 1, 1, "C");
}

$pdf->SetY(63);
for ($i=0; $i <count($datos) ; $i++) { 
    $pdf->SetX(121);
    $cantidad = $datos[$i]['cantidad'];
$pdf->Cell(48, 12, "$cantidad", 1, 1, "C");
}

$pdf->SetY(63);
for ($i=0; $i <count($datos) ; $i++) { 
    $pdf->SetX(169);
    $total = $datos[$i]['total'];
$pdf->Cell(48, 12, "$total", 1, 1, "C");
}

$pdf->Output();
ob_end_flush(); 
?>