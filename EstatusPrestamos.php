<?php
session_start();
include('conexion.php');

if (empty($_SESSION['NumEmpleado5'])) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>SUTATESE - Información Préstamos</title>
    <?php 
        include("navbar.php");
    ?>

</head>



<body>
<!-- <script>
const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
  },
  buttonsStyling: false
})

    swalWithBootstrapButtons.fire({
    icon: 'warning',
    title: 'Advertencia',
    text: 'En caso de tener cualquier duda con su préstamo, o cambiar el plazo de pago, por favor acudir al sindicato con el CÓDIGO DE PRÉSTAMO',
    // footer: '<a href="">Why do I have this issue?</a>'
    confirmButtonText: 'Ok',
    reverseButtons: true
    })
</script> -->

<?php

        if (isset($_SESSION['NumEmpleado5'])) {
            $NumEmpleado = $_SESSION['NumEmpleado5'];
            $NombreEmp = $_SESSION['Nombres'];
            $ApellidoPatEmp = $_SESSION['ApellidoPat'];
            $ApellidoMatEmp = $_SESSION['ApellidoMat'];  
    ?>
    <!-- <input type="text" value= <?php echo $opcion ?> > -->
    <div class="mx-5">
        <!-- <div class="col-lg-9"> -->
            <h2 class="my-5 fw-bold text-center fs-1">INFORMACIÓN PRÉSTAMOS</h2>
            <div class="table-responsive my-4 shadow-lg p-3 mb-5 bg-body rounded">
                <table id="table-2" class="table table-bordered fs-4 mb-5" style="width: 100%; text-align: right; border: 1px gray solid; 
                        order-collapse: collapse">
                    <thead class="text-center" style="background-color:#00102E; color: #ffffff;">
                    
                        <tr>
                            <!-- <th>No. Empleado</th> -->
                            <th>Código de préstamo</th>
                            <th>Cantidad solicitada</th>
                            <th>Tipo de préstamo</th> 
                            <th>Fecha de Deposito</th>
                            <th>Estatus Préstamo</th>
                            <!-- <th>No. Pago</th> -->
                        </tr>
                    </thead>
                    
                
                    
                    <tbody id="tbody_1" class="text-center fs-5">
                        <?php
                        if (isset($_SESSION['NumEmpleado5'])) {
                            // $query = "SELECT NumEmpleado3, IdPrestamo, CantidadSolicitada,  Estatus, FechaDeposito, IdTipoPrestamo1
                            // FROM prestamo;"; Reporte de excel
                        $query = "SELECT  NumEmpleado3, IdPrestamo, CantidadSolicitada,  Estatus, FechaDeposito, IdTipoPrestamo1 
                         FROM prestamo WHERE NumEmpleado3 = '$NumEmpleado';";
                        
                        //   $query = "SELECT  b.NumEmpleado3, IdPrestamo, b.CantidadSolicitada, b.Estatus, b.IdTipoPrestamo1, COUNT(IdPrestamo1) FROM pago a, prestamo b WHERE NumEmpleado3 = '$NumEmpleado' AND IdPrestamo1 = IdPrestamo GROUP BY IdPrestamo1 HAVING COUNT(IdPrestamo1) >= 1"; 
                        //   Consulta sobre tabla pago

                        // $query = "SELECT NumEmpleado3, IdPrestamo, CantidadSolicitada, Estatus, IdTipoPrestamo1, b.IdPrestamo1, 
                        // COUNT(IdPrestamo1) 
                        // FROM prestamo a, pago b 
                        // WHERE NumEmpleado3 = '$NumEmpleado' AND IdPrestamo1 = IdPrestamo
                        // GROUP BY IdPrestamo1 HAVING COUNT(IdPrestamo1) >= 0;"; Consulta sobre tabla prestamo
                        
                        $result_absence = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result_absence)) {
                            $id = $row[0];
                            $id_encoded = base64_encode($id);
                            $tipo = $row[5];
                            $estatus = $row[3];
                            $fecha = $row[4];
                            // $suma = $row['COUNT(IdPrestamo1)']-1; Para el número de pagos

                            if($tipo == "P1"){
                                 $ResTipo = "Aval";
                            }
                            if($tipo == "P2"){
                                $ResTipo = "Caja de Ahorro";
                           }
                           if($tipo == "P3"){
                            $ResTipo = "Nómina";
                            }
                          
                        ?>
                            <tr>
                                <td class="fw-bold"><?php echo $row['IdPrestamo']; ?> </td>
                                <td><?php echo $row['CantidadSolicitada']; ?> pesos</td>
                               
                                    <?php
                                        if($estatus == 1){
                                        $ResEst = "Pendiente de Aprobación";
                                    }
                                        if($estatus == 1 && $tipo == "P1"){
                                        $ResEst = "Falta archivo Pagaré";
                                    }
                                    if($estatus == 2){
                                        $ResEst = "Pendiente de Aprobación";
                                    }
                                        if($estatus == 3){
                                        $ResEst = "Cancelado";
                                        $ResFecha="Fecha no asignada";
                                    }
                                        if($estatus == 4){
                                        $ResEst = "Aceptado (Activo)";
                                    }
                                        if($estatus == 5){
                                        $ResEst = "Liquidado";
                                    }
                                ?>
                                 <td class="fw-bold"><?php echo $ResTipo ?></td> 
                                <!-- <td></td> -->
                                <?php
                                    if(empty($row['FechaDeposito']) || $estatus==1){
                                    $ResFecha = "Asignando fecha";
                                    } else {
                                        $ResFecha=$row['FechaDeposito'];
                                    }
                                    if(empty($row['FechaDeposito']) || $estatus == 3){
                                        $ResFecha="Fecha no asignada";
                                    }
                                    if(empty($row['FechaDeposito']) && $estatus == 4){
                                        $ResFecha="Asignando";
                                    }
                                    if(empty($row['FechaDeposito']) && $estatus == 1 || $estatus == 2 &&  $tipo == "P1"){
                                        $ResFecha="Asignando";
                                    }
                                    if(empty($row['FechaDeposito']) && $estatus == 4 &&  $tipo == "P1"){
                                        $ResFecha=$row['FechaDeposito'];
                                    }
                                        
                                ?>
                                <td><?php echo $ResFecha ?></td> 
                                <td class="fw-bold"><?php echo $ResEst ?></td>  
                               
                                <!-- <td class="fw-bold"><?php echo $suma ?></td> Para el número de pagos-->    
                                <!-- <td>Pago <?php echo $row['COUNT(IdPrestamo1)']; ?> </td> Para el número de pagos -->
                                
                            </tr>
                            
                        <?php
                        
                        }
                    }
                    
                    
                
                        ?>
                    </tbody>
                </table>
            </div>
        <!-- </div> -->

       </div>
   
        <!-- <form method="post" class="form" action="reporte.php">
            <input type="submit" name="Generar_reporte">
        </form> -->
            
        
    <?php
    }
    ?>

    <?php
        include("footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/app.js"></script>

</body>

</html>