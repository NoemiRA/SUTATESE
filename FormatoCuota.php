<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
        $this->Image('resources/SUTATESE.png',10,10,25); //Posicion x, posicion y, tamaño de la imagen
        $this->setXY(50,20);
        $this->SetFont('helvetica','B',16);
        $this->Cell(145,10,utf8_decode('Sindicato Único de Trabajadores Académicos del Tecnológico de Estudios Superiores de Ecatepec'),1,1,'C',0); //ancho, largo, contenido, borde(0 no, 1 si), salto de linea (0 no, 1 si), justificacion del texto, si se rellene o no la celda 
        $this->setXY(50,30);
        $this->SetFont('helvetica','I',10);
        $this->Cell(145,10,utf8_decode('2022 año de Ricardo Flores Magón, precursor de la Revolución Mexicana”'),1,0,'C',0); //ancho, largo, contenido, borde(0 no, 1 si), salto de linea (0 no, 1 si), justificacion del texto, si se rellene o no la celda 
}

// Pie de página
function Footer()
{
    // // Posición: a 1,5 cm del final
    // $this->SetY(-15);
    // // Arial italic 8
    // $this->SetFont('Arial','I',8);
    // // Número de página
    // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(20);
$pdf->SetFont('helvetica','B',10);
$pdf->Cell(190,10,'FORMATO  CUOTA  S.U.T.A.T.E.S.E.',0,1,'C');
$pdf->SetFont('helvetica','',10);
$pdf->Cell(160,10,utf8_decode('Número de Folio: '),0,0,'R');
$pdf->Cell(30,10,utf8_decode('______________'),0,1,'C');
$pdf->Cell(160,10,utf8_decode('Ecatepec de Morelos Estado de México a '),0,0,'R');
$pdf->Cell(30,10,utf8_decode('11 / Octubre / 2022'),0,1,'C');
$pdf->Ln(15);
$pdf->Cell(190,10,utf8_decode('PROF. NICOLÁS CORTÉS MARTÍNEZ'),0,1,'L');
$pdf->Cell(190,10,utf8_decode('SECRETARIO GENERAL'),0,1,'L');
$pdf->Cell(190,10,utf8_decode('P R E S E N T E'),0,1,'L');
$pdf->Ln(5);


//$pdf->setAutoPageBreak(true,0); Salto de pagina cuando se termina la pagina

$pdf->Output();
?>