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
    <div class="text-center m-5 p-3 rounded">
        <div class="row bg-light">
            <h1 class="m-3">CAJA DE AHORRO</h1>
            <div class="col-lg-3">
                <h3 class="display-5"><strong>Agremiado a la caja de ahorro</strong></h3>
            </div>
            <?php
                    $i = 0;
                    $abono = 1500;
                    $saldo = 0;
                    ?>
            <div class="col-lg-9">
                <div class="form-group row m-3">
                    <label for="description" class="col col-form-label">
                        Tipo de fondo
                    </label>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="" name="tipoFondo" id="tipoFondo" value="Fondo ...">

                    </div>
                </div>
                <div class="form-group row m-3">
                    <label for="description" class="col col-form-label">
                        Descuento quincenal
                    </label>
                    <div class="col">
                        <input type="text" class="form-control" value="$<?php echo $abono ?>" disabled>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive my-4">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">Quincenas</th>
                        <th scope="col">Mes</th>
                        <th scope="col">Abono</th>
                        <th scope="col">Saldos</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($i < 24) {
                        $mes = 0;
                        $saldo = $saldo + $abono;
                    ?>
                        <tr>
                            <th scope="row"><?php echo $i+1 ?></th>
                            <?php 
                                if($i == 0 || $i == 1){
                                    echo'<td>Enero</td>';
                                } elseif($i == 2 || $i == 3){
                                    echo'<td>Febrero</td>';
                                } elseif($i == 4 || $i == 5){
                                    echo'<td>Marzo</td>';
                                } elseif($i == 6 || $i == 7){
                                    echo'<td>Abril</td>';
                                } elseif($i == 8 || $i == 9){
                                    echo'<td>Mayo</td>';
                                } elseif($i == 10 || $i == 11){
                                    echo'<td>Junio</td>';
                                } elseif($i == 12 || $i == 13){
                                    echo'<td>Julio</td>';
                                } elseif($i == 14 || $i == 15){
                                    echo'<td>Agosto</td>';
                                } elseif($i == 16 || $i == 17){
                                    echo'<td>Septiembre</td>';
                                } elseif($i == 18 || $i == 19){
                                    echo'<td>Octubre</td>';
                                } elseif($i == 20 || $i == 21){
                                    echo'<td>Noviembre</td>';
                                } elseif($i == 22 || $i == 23){
                                    echo'<td>Diciembre</td>';
                                }

                                ?>
                            <td>$<?php echo $abono ?></td>
                            <td><strong>$<?php echo $saldo ?></strong></td>
                        </tr>
                    <?php
                    $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
</body>