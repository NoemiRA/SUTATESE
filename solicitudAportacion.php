<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{

function Header()
{
        $this->Image('resources/SUTATESE.png',10,10,25); //Posicion x, posicion y, tamaño de la imagen
        $this->setXY(50,15);
        $this->SetFont('helvetica','B',16);
        $this->MultiCell(0, 7, utf8_decode('Sindicato Único de Trabajadores Académicos del Tecnológico de Estudios Superiores de Ecatepec'), 0, 'C');
        $this->setXY(50,30);
        $this->SetFont('helvetica','I',10);
        $this->Cell(145,10,utf8_decode('2022 año de Ricardo Flores Magón, precursor de la Revolución Mexicana'),0,0,'C',0); //ancho, largo, contenido, borde(0 no, 1 si), salto de linea (0 no, 1 si), justificacion del texto, si se rellene o no la celda 
}

// Pie de página
function Footer()
{
    $this->SetY(270);
    $this->SetFont('Arial','I',8);
    $this->MultiCell(0, 7, utf8_decode('AV. TECNOLÓGICO S/N COL. VALLE DE ANÁHUAC, ECATEPEC DE MORELOS, ESTADO DE MÉXICO, C.P.55210. TEL: 5000 2357
    Facebook: sindicato.aspatese, Twitter: @S_ASPATESE, Correo electrónico: SUTATESE@tese.edu.mx
    '), 0, 'C');
}

}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(20);
$pdf->SetFont('helvetica','B',10);
$pdf->Cell(190,10,utf8_decode('SOLICITUD DE APORTACIÓN A LA CAJA DE AHORRO'),0,1,'C');
$pdf->SetFont('helvetica','',10);
$pdf->Cell(160,10,utf8_decode('Número de Folio: '),0,0,'R');
$pdf->Cell(30,10,utf8_decode('______________'),0,1,'C');
$pdf->Cell(160,10,utf8_decode('Ecatepec de Morelos Estado de México a '),0,0,'R');
$pdf->Cell(30,10,utf8_decode('11 / Octubre / 2022'),0,1,'C');
$pdf->Ln(10);
$pdf->Cell(190,10,utf8_decode('PROF. NICOLÁS CORTÉS MARTÍNEZ'),0,1,'L');
$pdf->Cell(190,10,utf8_decode('SECRETARIO GENERAL'),0,1,'L');
$pdf->Cell(190,10,utf8_decode('P R E S E N T E'),0,1,'L');
$pdf->Ln(5);
$pdf->MultiCell(0, 7, utf8_decode('El que suscribe servidor público docente o administrativo y agremiado a la Caja de Ahorro: _________________________________________________________________________ con número de empleado _______ del TECNOLÓGICO DE ESTUDIOS SUPERIORES DE ECATEPEC adscrito a ____________________________________________.'), 0, 'J');
$pdf->Ln(2);
$pdf->MultiCell(0, 7, utf8_decode('Solicito participar en la Caja de Ahorro del SINDICATO ÚNICO DE TRABAJADORES ACADÉMICOS DEL TECNOLÓGICO DE ESTUDIOS SUPERIORES DE ECATEPEC, de manera voluntaria con una aportación quincenal de $ ___________________________________________________, que se descontará de mi sueldo de manera quincenal a través del Departamento de Personal del TESE por el período comprendido de la PRIMERA  QUINCENA DE DICIEMBRE DE 2022 A LA SEGUNDA QUINCENA DE NOVIEMBRE DE 2023, con depósito en la cuenta del sindicato SUTATESE, por así convenir a mis intereses.'), 0, 'J');
$pdf->Ln(2);
$pdf->MultiCell(0, 7, utf8_decode('Lo anterior derivado del acuerdo y aceptación de la Caja de Ahorro en la Asamblea Ordinaria del Sindicato ASPATESE del día 29 de Septiembre del año 2006.'), 0, 'J');
$pdf->Ln(5);
$pdf->Cell(190,10,'INTERESADO',0,1,'C');
$pdf->Ln(15);
$pdf->Cell(190,10,'___________________________',0,1,'C');
$pdf->Cell(190,10,'NOMBRE Y FIRMA',0,1,'C');

//$pdf->setAutoPageBreak(true,0); Salto de pagina cuando se termina la pagina

$pdf->Close();
$pdf->Output('D','Solicitud_Aportación_SUTATESE.pdf',true);  
