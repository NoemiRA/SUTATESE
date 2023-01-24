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
        $NombreEmp = $_SESSION['Nombres']. ' ' . $_SESSION['ApellidoPat']. ' ' . $_SESSION['ApellidoMat'];

        $ejecucion = $conn->query("CALL exist_ahorrador($NumEmpleado, @interest);");
        if ($ejecucion === TRUE) {
            $sql_interest = "SELECT @interest;";
            $result_interest = mysqli_query($conn, $sql_interest);
            $row_interest = mysqli_fetch_array($result_interest);
            $interest = $row_interest[0];
        }

        $sql = "SELECT IdPrestamo, NumEmpleado3, CantidadSolicitada, Plazo, IdAhorrador1, NumEmpleado, Nombres, ApellidoPat, ApellidoMat, Interes from prestamo inner join cajaahorro on prestamo.IdAhorrador1 = cajaahorro.IdAhorrador inner join empleado on empleado.NumEmpleado = cajaahorro.NumEmpleado1 where NumEmpleado3 = $NumEmpleado and IdTipoPrestamo1 = 'P1' and (prestamo.Estatus = '1' OR prestamo.Estatus = '2')";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $NombreAval = $row['Nombres']. ' ' . $row['ApellidoPat']. ' ' . $row['ApellidoMat'];

        date_default_timezone_set("America/Mexico_City");

        $mes = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $day = date("d");
        $month = $mes[date("n")-1];
        $year = date("Y");

        $v=new CifrasEnLetras();
        $letra=($v->convertirNumeroEnLetras($row[2]));

        class PDF extends FPDF{
            function Header(){
                    $this->Image('resources/SUTATESE.png',10,10,25); 
                    $this->setXY(50,15);
                    $this->SetFont('helvetica','B',16);
                    $this->MultiCell(0, 7, utf8_decode('Sindicato Único de Trabajadores Académicos del Tecnológico de Estudios Superiores de Ecatepec'), 0, 'C');
                    $this->setXY(50,30);
                    $this->SetFont('helvetica','I',10);
                    $this->Cell(145,10,utf8_decode('2022 año de Ricardo Flores Magón, precursor de la Revolución Mexicana'),0,0,'C',0); 
            }

            // Pie de página
            function Footer(){
                $this->SetY(270);
                $this->SetFont('Arial','I',8);
                $this->MultiCell(0, 7, utf8_decode('AV. TECNOLÓGICO S/N COL. VALLE DE ANÁHUAC, ECATEPEC DE MORELOS, ESTADO DE MÉXICO, C.P.55210. TEL: 5000 2357
                Facebook: sindicato.aspatese, Twitter: @S_ASPATESE, Correo electrónico: SUTATESE@tese.edu.mx
                '), 0, 'C');
            }
        }
        $id= (int) filter_var($row[0], FILTER_SANITIZE_NUMBER_INT); 
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->Ln(20);
        $pdf->SetFont('helvetica','B',10);
        $pdf->Cell(190,10,utf8_decode('Pagaré FOLIO No. '.$id.' /2022.'),0,1,'R');
        $pdf->SetFont('helvetica','',10);
        $pdf->Cell(145,5,utf8_decode('Ecatepec de Morelos, Estado de México a '),0,0,'R');
        $pdf->Cell(45,5,utf8_decode($day.' de '.$month.' del '.$year),0,1,'C');
        $pdf->Ln(15);
        $pdf->SetFont('helvetica','B',15);
        $pdf->Cell(190,5,utf8_decode('BUENO POR: $ '.$row['CantidadSolicitada'].' '),0,1,'R');
        $pdf->SetFont('helvetica','',10);
        $pdf->Ln(10);
        $pdf->MultiCell(0, 7, utf8_decode(''.$NombreEmp.' DEBO Y PAGARÉ A LA ORDEN DEL SINDICATO ÚNICO DE TRABAJADORES ACADÉMICOS DEL TECNOLÓGICO DE ESTUDIOS SUPERIORES DE ECATEPEC, REPRESENTADO POR EL ING. NICOLÁS CORTÉS MARTÍNEZ EN SU CARÁCTER DE SECRETARIO GENERAL DE DICHO SINDICATO LA CANTIDAD DE $'.$row[2].' ( '.$letra.' 00/100 M.N.), APLICANDOLE UNA TASA DE INTERÉS MENSUAL DEL '.$interest.'% PAGADEROS AL 30 DE NOVIEMBRE DEL 2023 EN LAS OFICINAS QUE OCUPA EL SINDICATO. EL IMPORTE DEL NETO A PAGAR SERA CAPITAL MAS INTERESES.'), 0, 'J');
        $pdf->Ln(15);
        $pdf->SetFont('helvetica','',11);
        $pdf->Cell(80,7,utf8_decode('IMPORTE DEL PRÉSTAMO: '),0,0,'R');
        $pdf->SetFont('helvetica','',12);
        $pdf->Cell(20,7,utf8_decode('$ '.$row[2].''),0,0,'R');
        $pdf->Cell(20,7,utf8_decode(' M.N.'),0,1,'L');
        $pdf->Cell(80,7,utf8_decode('MAS  '),0,1,'R');
        $pdf->Cell(80,7,utf8_decode('INTERESES DEL PRESTAMO: '),0,0,'R');
        $pdf->SetFont('helvetica','',12);
        $pdf->Cell(20,7,utf8_decode('$ '.$row['Interes'].''),0,0,'R');
        $pdf->Cell(20,7,utf8_decode(' M.N.'),0,1,'L');
        $pdf->SetFont('helvetica','B',12);
        $pdf->Cell(80,7,utf8_decode('TOTAL CAPITAL MAS INTERESES: '),0,0,'R');
        $pdf->Cell(20,7,utf8_decode('$ '.$row['CantidadSolicitada'] + $row['Interes'].''),0,0,'R');
        $pdf->Cell(20,7,utf8_decode(' M.N.'),0,1,'L');


        $pdf->Ln(25);
        $pdf->Cell(90,10,'Firma de Conformidad.',0,0,'C');
        $pdf->Cell(90,10,'Firma de Aval.',0,0,'C');
        $pdf->Ln(30);
        $pdf->Cell(90,10,'___________________________',0,0,'C');
        $pdf->Cell(90,10,'___________________________',0,1,'C');
        $pdf->Cell(90,5,utf8_decode($NombreEmp),0,0,'C');
        $pdf->Cell(90,5,utf8_decode($NombreAval),0,1,'C');

        $pdf->Close();
        $pdf->Output('D','pagare.pdf');  
        
    }