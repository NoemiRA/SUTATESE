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

    <title>SUTATESE - Inversionista</title>
    <?php include("navbar.php");
    ?>
</head>

<body>

    <?php

    if (isset($_SESSION['NumEmpleado5'])) {
        $NumEmpleado = $_SESSION['NumEmpleado5'];

        function estate($register, $voucher, $mss){
            ?>

                <div class="d-block justify-content-center m-3">
                    <div id="emailHelp" class="form-text">Estado: </div>
                    <div class="card">
                        <div class="card-body">
                            <h4><?php echo $mss ?></h4>
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    <button type="button" class="btn btn-link passed icono" onclick=location.href="AhorroInversionista.php" <?php echo $register ?> style="text-align: center; font-size: 40px;"> 
                        <span><i class="fa-solid fa-users"></i></span><span class="display-6 m-lg-2 fs-2 mx-2">Registro Inversionista</span>
                    </button>
                </div>
    
                <div class="d-flex justify-content-start">
                    <button type="button" class="btn btn-link passed icono" <?php echo $voucher ?> style="text-align: center; font-size: 40px;" onclick=location.href="ComprobantePago.php"> 
                        <span><i class="fa-solid fa-file-circle-plus"></i></span><span class="display-6 m-lg-2 fs-2 mx-2">Comprobante de Pago</span>
                    </button>
                </div>
            <?php
        }
        
    ?>
        <div class="row g-0 p-4" style="text-align:justify">
            <div class="col-lg-7 d-flex">
                <div class="content mx-auto p-5">
                    <h1><b>REGISTRO FONDO VARIABLE INVERSIONISTA</b></h1>
                    <h2>Procedimiento:</h2>
                    <hr>
                    <ol>
                        <li>
                            Deber?? ingresar al apartado <b>"REGISTRO INVERSIONISTA"</b> e ingresar la cantidad que desea invertir teniendo como m??nimo la cantidad de $20,000.00 M.N y como m??ximo la cantidad de $30,000.00 M.N.
                        </li>
                        <li>
                            Una vez que ha terminado, deber?? llenar el apartado <b>"BENEFICIARIO"</b> en donde se solicita llene completa y correctamente el formulario.
                        </li>
                        <li>
                            Cuando haya terminado el proceso, el bot??n de <b>"INGRESAR"</b> se habilitar?? y podr?? ingresar a un apartado donde se ver?? la lista de las personas que tambi??n quisieron ser Inversionistas y el orden en el que se encuentren es el orden que se devolver?? el dinero a las personas.
                        </li>
                        <li>
                            Si adem??s de ser inversionista desea ser ahorrador, favor de dirigirse al apartado <a href="registroCA.php">Caja de Ahorro</a> donde deber?? seguir las indicaciones para su registro.
                        </li>
                    </ol>
                    <hr>
                </div>
            </div>
            <div class="col-lg-5 d-flex p-3 bg-light">
                <div class="my-auto">
                    <?php
                        $sql = "SELECT IdInversionista, Estatus, FechaDevolucion FROM inversionista WHERE NumEmpleado6 = '$NumEmpleado'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);
                        $resp = mysqli_num_rows($result);
                
                        if($resp == 0){
                            $register = '';
                            $voucher = 'disabled';
                            $mss = "Usted no es inversionista";
                            estate($register, $voucher, $mss);
                        }else{
                            $Estatus = $row['Estatus'];

                            switch($Estatus){
                                case 1:
                                    $register = 'disabled';
                                    $voucher = 'disabled';
                                    $mss = "En espera de aprobaci??n";
                                    estate($register, $voucher, $mss);
                                    break;
                                case 2:
                                    $register = 'disabled';
                                    $voucher = '';
                                    $mss = "Inversionista aceptado";
                                    estate($register, $voucher, $mss);
                                    break;
                                case 3:
                                    $register = 'disabled';
                                    $voucher = 'disabled';
                                    $mss = "El m??ximo de inversionistas lleg?? al l??mite ??Gracias!";
                                    estate($register, $voucher, $mss);
                                    break;
                                case 4:
                                    $register = 'disabled';
                                    $voucher = '';
                                    $mss = "Pago pendiente";
                                    estate($register, $voucher, $mss);
                                    break;
                                case 5:
                                    $register = 'disabled';
                                    $voucher = 'disabled';
                                    $mss = "Pago procedente, ??Felicidades usted ya es INVERSIONISTA!";
                                    estate($register, $voucher, $mss);
                                    break;
                                case 6:
                                    $register = 'disabled';
                                    $voucher = 'disabled';
                                    $mss = "Su pago de inversi??n final se entregar?? el dia ". $row['FechaDevolucion'];
                                    estate($register, $voucher, $mss);
                                    break;

                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    <?php
    }
    include("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>