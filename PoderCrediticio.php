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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>SUTATESE - Poder Crediticio</title>

    <?php include("navbar.php"); ?>
</head>

<body onload="quincenas();">
    <?php
    if (isset($_SESSION['NumEmpleado5'])) {
        $NumEmpleado = $_SESSION['NumEmpleado5'];
        $NombreEmp = $_SESSION['Nombres'] . " " . $_SESSION['ApellidoPat'] . " " . $_SESSION['ApellidoMat'];
    ?>
        <h1 class="text-center">PODER CREDITICIO</h1>
        <div class="row g-0 h-50 p-5">
            <div class="col-lg-6 bg-light justify-content-center">
                <form class="text-center" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <p class="text-center fs-4 fw-bold p-4">Favor de introducir los datos reales de su recibo de nómina correspondiente a la quincena indicada</p>
                    <div class="form-group row my-3 mx-3 fw-bold">
                        <label for="Nombre" class="col-sm-2 col-form-label">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Nombre" value="<?php echo $NombreEmp ?>" disabled>
                        </div>
                    </div>

                    <div class="form-group row my-3 mx-3 fw-bold">
                        <div class="col-sm-12 mb-4">
                            <input type="text" class="form-control bg-info bg-opacity-50" id="quincena" style="height: 38px;" disabled>
                        </div>
                    </div>

                    <div class="form-group row my-3 mx-3 fw-bold">
                        <label for="tpercepciones" class="col-sm-2 col-form-label">Total Percepciones: </label>

                        <div class="col-sm-10">
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" name="tpercepciones" placeholder="Ejemp: 1500.00" step="0.01">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row my-3 mx-3 fw-bold">
                        <label for="isr" class="col-sm-2 col-form-label">ISR: </label>
                        <div class="col-sm-10">
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" name="isr" placeholder="Ejemp: 1500.00" step="0.01">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row my-3 mx-3 fw-bold">
                        <label for="issemym" class="col-sm-2 col-form-label">Sumatoria ISSEMyM: </label>
                        <div class="col-sm-10">
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" name="issemym" placeholder="Ejemp: 1500.00" step="0.01">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row my-3 mx-3 fw-bold">
                        <label for="tdeducciones" class="col-sm-2 col-form-label">Total Deducciones: </label>
                        <div class="col-sm-10">
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" name="tdeducciones" placeholder="Ejemp: 1500.00" step="0.01">
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-danger m-2" onclick=location.href="prestamos.php">
                        Cancelar
                    </button>
                    <input type="submit" class="btn btn-success mx-5" value="Calcular" name="Request" onclick="prue">

                    <?php

                    function alertdata()
                    {
                        echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, ingrese correctamente los valores!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){                   
                                }
                            });
                            </script>';
                    }

                    if (isset($_POST['Request'])) {
                        date_default_timezone_set('America/Mexico_City');
                        $day = date('d');
                        $month = date('m');

                        $perceptions = $_POST['tpercepciones'];
                        $isr = $_POST['isr'];
                        $issemym = $_POST['issemym'];
                        $deductions = $_POST['tdeducciones'];

                        
                        if (empty($perceptions) || empty($isr) || empty($issemym) || empty($deductions)) {
                            alertdata();
                        } else {
                            $PoderCred = (($perceptions - ($isr + $issemym)) * 0.3) - ($deductions - $isr - $issemym);
                            
                            $totalQuincenas = 21;
                            $totalMeses = 13;
                            
                            $quincenasPago = ($totalQuincenas) - ($month * 2);
                        
                            if ($day <= 15 && $day >= 1) {
                                $quincenasPago = $quincenasPago + 1;
                                $cantidadMax = $PoderCred * $quincenasPago;

                                if ($month == 11 && $day <= 15) {
                                    $quincenasPago = $quincenasPago + 1;
                                    $cantidadMax = $PoderCred * $quincenasPago;
                                    $cantidadMax = $cantidadMax;
                                }

                                if ($month == 12 && $day <= 15) {
                                $quincenasPago = ($month * 2) - 2;
                                $cantidadMax = $PoderCred * $quincenasPago;
                                }

                            } else if ($day >= 15 && $day <= 31) {
                                $quincenasPago = $quincenasPago;
                                $cantidadMax = $PoderCred * $quincenasPago;
                                $resultadoDos = $quincenasPago;
                        
                                if ($month == 11 && $day >= 16) {
                                    $quincenasPago = -1 * ($quincenasPago);
                                    $cantidadMax = $PoderCred * $quincenasPago;
                                }
                                if ($month == 12 && $day >= 16) {
                                    $quincenasPago = ($month * 2) - 3;
                                    $resultadoDos = $quincenasPago;
                                    $cantidadMax = $PoderCred * $quincenasPago;
                                }
                            }
                            $PoderCredC = base64_encode($PoderCred);
                            $cantidadMaxC = base64_encode($cantidadMax);
                            $quincenasPagoC = base64_encode($quincenasPago);

                            if($PoderCred < 0){
                                echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡No puede solicitar un préstamo por nómina dado a que su poder créditicio es muy bajo!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){ 
                                    window.location = "poderCrediticio.php";                    
                                }
                            });
                            </script>';
                            }
                    ?>
                            <div class="form-group row my-3 mx-3 fw-bold">
                                <label for="poderCred" class="col-sm-2 col-form-label">Poder crediticio: </label>
                                <div class="col-sm-10">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control bg-warning bg-opacity-50" name="poderCred" value="<?php echo $PoderCred ?>" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row my-3 mx-3 fw-bold">
                                <label for="cantMax" class="col-sm-2 col-form-label">Cantidad Máxima: </label>
                                <div class="col-sm-10">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control bg-warning bg-opacity-50" name="cantMax" value="<?php echo $cantidadMax ?>" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <a href="peticionPrestamo.php?pc=<?php echo $PoderCredC;?>&cm=<?php echo $cantidadMaxC;?>&q=<?php echo $quincenasPagoC;?>" title="¡Deseo Solicitar el Préstamo!" class="btn btn-primary" type="submit" value="Solicitar" onclick="return confirm ('¿Esta seguro de solicitar el préstamo?')">¡Solicitar préstamo por nómina!</a>
                                    <hr>
                                </div>
                            </div>

                            <div class="form-group row ">
                                <small class="form-text text-muted my-0">
                                    <p class="my-0">¿Necesitas un préstamo de mayor cantidad?</p>
                                </small>
                            </div>
                            <small class="form-text text-muted my-0">
                                <a href="registroaval.php " title="¡Deseo Solicitar el Prestamo!" value="Solicitar">¡Deseo registrar un aval!</a>
                            </small>

                    <?php
                        }
                    }

                    ?>
                </form>
            </div>

            <div class="col-lg-6 p-4 bg-light text-center">
                <p class="text-center fs-4 fw-bold">Imágen guía y de demostración</p>
                <img src="resources\reciboNomina.jpg" class="me-3 mx-2 img-fluid" width="695" height="840">
            </div>
        </div>

    <?php
    }
    include("footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/quincena.js"></script>

</body>

</html>