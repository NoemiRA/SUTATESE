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
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>SUTATESE - Prestamo Caja de Ahorro</title>

    <?php include("navbar.php");
    ?>
</head>

<script>
    function confirmacion(){
        var respuesta = confirm("¿Desea solicitar el préstamo?");
        if(respuesta == true){
            return true;
        }else{
            return false;
        }
    }
</script>

<body>
    <div class="row g-0 bg-light text-center m-5">
        <?php

        function alertsuccess()
        {
            echo '<script> Swal.fire({icon: "success", title: "Prestamo Solicitado", text: "¡Para dar seguimiento a su prestamo puede visitar el apartado de ESTATUS DE PRESTAMOS!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
            then(function(result){
                if(result.value){                   
                    window.location = "prestamos.php";
                }
            });
            </script>';
        }

        function alerterror()
        {
            echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, intente más tarde!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
            then(function(result){
                if(result.value){                   
                }
            });
            </script>';
        }

        function alertdata()
        {
            echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, ingrese correctamente los valores!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
        then(function(result){
            if(result.value){                   
            }
        });
        </script>';
        }

        function notAllowed()
        {
            echo '<script> Swal.fire({icon: "error", title: "Cantidad no permitida", text: "¡La cantidad que ha ingresado es superior a su ahorro!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
        then(function(result){
            if(result.value){                   
            }
        });
        </script>';
        }

        if (isset($_SESSION['NumEmpleado5'])) {
            $NumEmpleado = $_SESSION['NumEmpleado5'];
            $ejecucion = $conn->query("CALL savingsAvailable($NumEmpleado, @saldo);");
            if ($ejecucion === TRUE) {
                $sql = "SELECT @saldo;";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                $amount = $row[0];
                if ($amount == '') {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Usted no pertenece o esta pendiente de aprobación su solicitud a la <strong> Caja de Ahorro</strong>.
                        </div>
                    <?php
                    $flag = 'disabled';
                } else if ($amount > 0) {
                    $flag = '';
                } else {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Usted ha solicitado la cantidad máxima de ahorro.</strong>
                        </div>
                    <?php
                    $flag = 'disabled';
                }
            }

        ?>
            <form class="row g-3 mt-3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <h1 class=" fw-bold m-5">PRÉSTAMO POR CAJA DE AHORRO</h1>

                <?php
                    $aval = "SELECT CantidadSolicitada FROM prestamo inner join cajaahorro on prestamo.IdAhorrador1 = cajaahorro.IdAhorrador inner join empleado on cajaahorro.NumEmpleado1 = empleado.NumEmpleado WHERE NumEmpleado1 = $NumEmpleado and prestamo.Estatus = 4";
                    $result_aval = mysqli_query($conn, $aval);
                    $row_aval = mysqli_fetch_array($result_aval);
                    $resp = mysqli_num_rows($result_aval);
                    if($resp > 0){
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Usted es aval por la cantidad de <strong>$<?php echo $row_aval[0]?></strong> más interés que genere el prestatario.
                            </div>
                        <?php
                    }
                ?>

                <div class="col p-3">
                    <label for="CantidadDisp" class="form-label fw-bold mx-2 mt-2 fs-5" style="width:100%;">Cantidad Disponible</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-dollar-sign"></i></span>
                        <input type="number" class="form-control " value="<?php echo $amount ?>" disabled>
                    </div>
                </div>

                <div class="col p-3">
                    <label for="CantidadSolicitar" class="form-label fw-bold mx-2 mt-2 fs-5" style="width:100%;">Cantidad a Solicitar</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-dollar-sign"></i></span>
                        <input type="number" class="form-control" name="CantidadSolicitar" <?php echo $flag ?> placeholder="Ejemp: 1500" />
                    </div>
                </div>

                <div>
                    <button type="button" class="btn btn-primary mx-5" onclick=location.href="prestamos.php">
                        Cancelar
                    </button>
                    <input type="submit" class="btn btn-secondary mx-5" value="Solicitar" <?php echo $flag ?> name="Request" onclick="return confirmacion()">
                </div>
        <?php

        date_default_timezone_set('America/Mexico_City');
        $day = date('d');
        $month = date('m');

        $totalQuincenas = 21;
        $totalMeses = 13;

        $quincenasPago = ($totalQuincenas) - ($month * 2);

        if ($day <= 15 && $day >= 1) {
            $quincenasPago = $quincenasPago + 1;

            if ($month == 11 && $day <= 15) {
                $quincenasPago = $quincenasPago + 1;
            }

            if ($month == 12 && $day <= 15) {
                $quincenasPago = ($month * 2) - 2;
            }
        } else if ($day >= 15 && $day <= 31) {
            $quincenasPago = $quincenasPago;

            if ($month == 11 && $day >= 16) {
                $quincenasPago = -1 * ($quincenasPago);
            }
            if ($month == 12 && $day >= 16) {
                $quincenasPago = ($month * 2) - 3;
            }
        }
                // Request
                if (isset($_POST['Request'])) {
                    if (empty($_POST['CantidadSolicitar'])) {
                        alertdata();
                    } else {
                        $CantidadSolicitar = $_POST['CantidadSolicitar'];
                        $CantidadSolicitar = ($CantidadSolicitar * 0.01 * $quincenasPago) + $CantidadSolicitar;

                        if ($CantidadSolicitar <= $amount) {
                            $ejecucion = $conn->query("CALL insert_PresCajaAhorro($NumEmpleado, $CantidadSolicitar)");
                            if ($ejecucion === TRUE) {
                                alertsuccess();
                            } else {
                                alerterror();
                            }
                        } else {
                            notAllowed();
                        }
                    }
                }

                ?>
            </form>
    </div>
<?php
    }
        include("footer.php");
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>