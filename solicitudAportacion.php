<?php
    session_start();
    include('conexion.php');
    if(empty($_SESSION['NumEmpleado5'])){
        header("location: index.php");
    }

    require_once 'resources/CifrasEnLetras.php';
    require('fpdf/fpdf.php');

    if (isset($_SESSION['NumEmpleado5'])) {
        $NumEmpleado = $_SESSION['NumEmpleado5'];
        $NombreEmp = $_SESSION['Nombres'];
        $ApellidoPatEmp = $_SESSION['ApellidoPat'];
        $ApellidoMatEmp = $_SESSION['ApellidoMat'];

        $sql = "SELECT Nombres, ApellidoPat, ApellidoMat, CantidadQuincenal, IdAhorrador, Division FROM empleado inner join cajaahorro on empleado.NumEmpleado = cajaahorro. NumEmpleado1 inner join division on empleado.IdDivision1 = division.IdDivision WHERE NumEmpleado = '$NumEmpleado' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        date_default_timezone_set("America/Mexico_City");

        $mes = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $day = date("d");
        $month = $mes[date("n")-1];
        $year = date("Y");

        $v=new CifrasEnLetras();
        $letra=($v->convertirNumeroEnLetras($row[3]));

class PDF extends FPDF
{

function Header()
{
        $this->Image('resources/SUTATESE.png',10,10,25); //Posicion x, posicion y, tamaño de la imagen
        $this->setXY(50,8);
        $this->SetFont('helvetica','B',16);
        $this->MultiCell(0, 7, utf8_decode('Sindicato Único de Trabajadores Académicos del Tecnológico de Estudios Superiores de Ecatepec'), 0, 'C');
        $this->setXY(50,20);
        $this->SetFont('helvetica','I',10);
        $this->Cell(145,10,utf8_decode('2022 año de Ricardo Flores Magón, precursor de la Revolución Mexicana'),0,0,'C',0); //ancho, largo, contenido, borde(0 no, 1 si), salto de linea (0 no, 1 si), justificacion del texto, si se rellene o no la celda 
}

// Pie de página
function Footer()
{
    $this->SetY(280);
    $this->SetFont('Arial','I',8);
    $this->MultiCell(0, 5, utf8_decode('AV. TECNOLÓGICO S/N COL. VALLE DE ANÁHUAC, ECATEPEC DE MORELOS, ESTADO DE MÉXICO, C.P.55210. TEL: 5000 2357
    Facebook: sindicato.aspatese, Twitter: @S_ASPATESE, Correo electrónico: SUTATESE@tese.edu.mx
    '), 0, 'C');
}

}
$id_encoded = base64_encode($row[4]);
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(15);
$pdf->SetFont('helvetica','B',10);
$pdf->Cell(190,10,utf8_decode('SOLICITUD DE APORTACIÓN A LA CAJA DE AHORRO'),0,1,'C');
$pdf->SetFont('helvetica','',10);
$pdf->Cell(160,10,utf8_decode('Número de Folio: '),0,0,'R');
$pdf->SetFont('helvetica','B',10);
$pdf->Cell(30,10,utf8_decode($id_encoded),0,1,'C');
$pdf->SetFont('helvetica','',10);
$pdf->Cell(145,0,utf8_decode('Ecatepec de Morelos, Estado de México a '),0,0,'R');
$pdf->Cell(45,0,utf8_decode($day.' de '.$month.' del '.$year),0,0,'C');
$pdf->Ln(10);
$pdf->Cell(0,0,utf8_decode('PROF. NICOLÁS CORTÉS MARTÍNEZ'),0,1,'L');
$pdf->Cell(0,10,utf8_decode('SECRETARIO GENERAL'),0,1,'L');
$pdf->Cell(0,0,utf8_decode('P R E S E N T E'),0,1,'L');
$pdf->Ln(5);
$pdf->MultiCell(0, 6, utf8_decode('El que suscribe servidor público docente o administrativo y agremiado a la Caja de Ahorro: '.$row[0].' '.$row[1].' '.$row[2].' con número de empleado '.$NumEmpleado.' del TECNOLÓGICO DE ESTUDIOS SUPERIORES DE ECATEPEC adscrito a a la División de '.$row[5].'.'), 0, 'J');
$pdf->Ln(2);
$pdf->MultiCell(0, 6, utf8_decode('Solicito participar en la Caja de Ahorro del SINDICATO ÚNICO DE TRABAJADORES ACADÉMICOS DEL TECNOLÓGICO DE ESTUDIOS SUPERIORES DE ECATEPEC, de manera voluntaria con una aportación quincenal de $'.$row[3].' ( '.$letra.' 00/100 M.N.), que se descontará de mi sueldo de manera quincenal a través del Departamento de Personal del TESE por el período comprendido de la PRIMERA  QUINCENA DE DICIEMBRE DE 2022 A LA SEGUNDA QUINCENA DE NOVIEMBRE DE 2023, con depósito en la cuenta del sindicato SUTATESE, por así convenir a mis intereses.'), 0, 'J');
$pdf->Ln(2);
$pdf->MultiCell(0, 6, utf8_decode('Lo anterior derivado del acuerdo y aceptación de la Caja de Ahorro en la Asamblea Ordinaria del Sindicato ASPATESE del día 29 de Septiembre del año 2006.'), 0, 'J');
$pdf->Ln(7);
$pdf->SetX(20);
$pdf->SetFont('helvetica','B',10);
$pdf->MultiCell(0, 7, utf8_decode('Ordenando como beneficiario en caso que me encuentre ausente.'), 0, 'J');
$pdf->SetX(10);
$pdf->Cell(100,6, 'Nombre Completo', 1,0,'C',0);
$pdf->Cell(60,6, 'Parentesco', 1,0,'C',0);
$pdf->Cell(30,6, 'Porcentaje', 1,1,'C',0);

    $absence = "SELECT Nombres, ApellidoPat, ApellidoMat, Porcentaje, Parentesco FROM beneficiario inner join parentesco on beneficiario.IdParentesco1 = parentesco.IdParentesco inner join cajaahorro on cajaahorro.IdAhorrador = beneficiario.IdAhorrador1 WHERE NumEmpleado1 = '$NumEmpleado' and IdTipoBeneficiario1 = 'TB1'";
    $result = mysqli_query($conn, $absence);
    $pdf->SetX(10);
    $pdf->SetFont('helvetica','',10);
    while($row=$result->fetch_assoc()){
        $pdf->Cell(100,6,utf8_decode($row['Nombres']." ".$row['ApellidoPat']." ".$row['ApellidoMat']),1,0,'C',0);
        $pdf->Cell(60,6,utf8_decode($row['Parentesco']),1,0,'C',0);
        $pdf->Cell(30,6,utf8_decode($row['Porcentaje']."%"),1,1,'C',0);
    }

$pdf->Ln(5);
$pdf->SetX(20);
$pdf->SetFont('helvetica','B',10);
$pdf->MultiCell(0, 7, utf8_decode('En caso de fallecimiento del beneficiario.'), 0, 'J');
$pdf->SetX(10);
$pdf->Cell(100,6, 'Nombre Completo', 1,0,'C',0);
$pdf->Cell(60,6, 'Parentesco', 1,0,'C',0);
$pdf->Cell(30,6, 'Porcentaje', 1,1,'C',0);

    $absence = "SELECT Nombres, ApellidoPat, ApellidoMat, Porcentaje, Parentesco FROM beneficiario inner join parentesco on beneficiario.IdParentesco1 = parentesco.IdParentesco inner join cajaahorro on cajaahorro.IdAhorrador = beneficiario.IdAhorrador1 WHERE NumEmpleado1 = '$NumEmpleado' and IdTipoBeneficiario1 = 'TB2'";
    $result = mysqli_query($conn, $absence);
    $pdf->SetX(10);
    $pdf->SetFont('helvetica','',10);
    while($row=$result->fetch_assoc()){
        $pdf->Cell(100,6,utf8_decode($row['Nombres']." ".$row['ApellidoPat']." ".$row['ApellidoMat']),1,0,'C',0);
        $pdf->Cell(60,6,utf8_decode($row['Parentesco']),1,0,'C',0);
        $pdf->Cell(30,6,utf8_decode($row['Porcentaje']."%"),1,1,'C',0);
    }



$pdf->Ln(10);
$pdf->Cell(90,10,'INTERESADO',0,0,'C');
$pdf->Cell(90,10,'Vo. Bo.',0,0,'C');
$pdf->Ln(15);
$pdf->Cell(90,10,'___________________________',0,0,'C');
$pdf->Cell(90,10,'___________________________',0,1,'C');
$pdf->Cell(90,5,utf8_decode($NombreEmp.' '.$ApellidoPatEmp.' '.$ApellidoMatEmp),0,0,'C');
$pdf->Cell(90,5,utf8_decode('PROF. NICOLÁS CORTÉS MARTÍNEZ'),0,1,'C');
$pdf->Cell(90,4,'ASOCIADO',0,0,'C');
$pdf->Cell(90,4,'SECRETARIO GENERAL',0,1,'C');

//$pdf->setAutoPageBreak(true,0); Salto de pagina cuando se termina la pagina

$pdf->Close();
$pdf->Output('D','Solicitud_Aportación_SUTATESE.pdf',true);  

    }