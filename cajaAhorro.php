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
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>SUTATESE-inicio</title>
    <?php include("navbar.php");
    $poderCrediticio = 1481.06;
    $descuentoQuincenal = 0;
    ?>
</head>

<body>
    <?php
    if (isset($_SESSION['NumEmpleado5'])) {
        $NumEmpleado = $_SESSION['NumEmpleado5'];
        $NombreEmp = $_SESSION['Nombres'];
        $ApellidoPatEmp = $_SESSION['ApellidoPat'];
        $ApellidoMatEmp = $_SESSION['ApellidoMat'];

        $sql = "SELECT IdAhorrador, NumEmpleado1, CantidadQuincenal, FormatoCuota, SolicitudAportacion, IdTipoAhorro, TipoAhorro  FROM cajaahorro inner join tipoahorro on cajaahorro.IdTipoAhorro1 = tipoahorro.IdTipoAhorro WHERE NumEmpleado1 = '$NumEmpleado' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);
        $id = $row[5];
    ?>
    <div class="text-center m-5 p-3 rounded">
        <div class="row bg-light">
            <h1 class="m-3">CAJA DE AHORRO</h1>
            <div class="col-lg-3">
                <h3 class="display-5"><strong>Agremiado a la caja de ahorro</strong></h3>
            </div>
            
            <div class="col-lg-9">
                <div class="form-group row m-3 ">
                    <label for="description" class="col col-form-label fw-bold text-end">
                        Tipo de fondo:
                    </label>
                    <div class="col">
                        <input type="text" class="form-control " name="tipoFondo" id="tipoFondo" value="<?php echo $row[6] ?>" disabled>
                        
                    </div>
                </div>
                <?php
                    $i = 0;
                     $abono = "$row[2]";
                    $saldo = 0;
                    $total = $abono * 24;
                    
                    ?>
                <div class="form-group row m-3">
                    <label for="description" class="col col-form-label fw-bold text-end">
                        Descuento quincenal:
                    </label>
                    <div class="col">
                        <input type="text" class="form-control" value="<?php echo $row[2] ?>" disabled>
                    </div>
                    
                </div>
                <div class="form-group row m-3">
                    <label for="description" class="col col-form-label fw-bold text-end">
                        Total a ahorrar:
                    </label>
                    <div class="col">
                        <input type="text" class="form-control" value="$<?php echo $total ?> MXN" disabled>
                    </div>
                    
                </div>
                
            </div>
        </div>
    <div class="row-lg-7 my-4 text-center mx-0">
        <div class="table-responsive my-4 shadow p-3 mb-5 bg-body rounded">
            <table id="table-2"  class="table table-bordered " style="width: 100%; text-align: right; border: 1px gray solid; 
                                border-collapse: collapse">
                <thead class="text-center" style="background-color:#00102E; color: #ffffff;"><tr>
                    <tr>
                        <th>Quincenas</th>
                        <th>Mes</th>
                        <th>Abono</th>
                        <th>Saldos</th>
                        <th>check</th>
                    </tr>
                </thead>
                <tbody class="text-center">

                    <?php
                    while ($i < 24) {
                        $mes = 0;
                        $saldo = $saldo + $abono;
                    ?>
                        <tr>
                            <th><?php echo $i+1 ?></th>
                            <?php 
                                if($i == 0 || $i == 1){
                                echo'<td>Diciembre</td>';                                                     
                                }elseif($i == 2 || $i == 3){
                                    echo'<td>Enero</td>';
                                } elseif($i == 4 || $i == 5){
                                    echo'<td>Febrero</td>';
                                } elseif($i == 6 || $i == 7){
                                    echo'<td>Marzo</td>';
                                } elseif($i == 8 || $i == 9){
                                    echo'<td>Abril</td>';
                                } elseif($i == 10 || $i == 11){
                                    echo'<td>Mayo</td>';
                                } elseif($i == 12 || $i == 13){
                                    echo'<td>Junio</td>';
                                } elseif($i == 14 || $i == 15){
                                    echo'<td>Julio</td>';
                                } elseif($i == 16 || $i == 17){
                                    echo'<td>Agosto</td>';
                                } elseif($i == 18 || $i == 19){
                                    echo'<td>Septiembre</td>';
                                } elseif($i == 20 || $i == 21){
                                    echo'<td>Octubre</td>';
                                } elseif($i == 22 || $i == 23){
                                    echo'<td>Noviembre</td>';
                                } 

                                ?>
                            <td>$<?php echo $abono ?></td>
                            <td><strong>$<?php echo $saldo ?></strong></td>
                            <?php 
                                // date_default_timezone_set("America/Monterrey");
                                // $dia = date("j");
                                $dia = 1;
                                $mitad = 15;
                                $inicio = 1;
                                $fin = 31;
                                if($dia <= $mitad && $dia >= $inicio){ 
                                    echo '<td>Prueba1</td>'; 
                                }elseif($dia >= $mitad && $dia <= $fin){
                                    echo'<td>Prueba2</td>'; 
                                }


                                ?>
                        </tr>
                    <?php
                    $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
        <?php
    }
          include("footer.php");
    ?>
</body>
</html>