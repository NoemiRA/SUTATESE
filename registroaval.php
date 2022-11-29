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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>SUTATESE-Aval</title>

    <?php include("navbar.php");
    ?>

</head>
<script>
    function cancelar(){
        var respuesta = confirm("¿Desea cancelar el prestamo?");
        if(respuesta == true){
            return true;
        }else{
            return false;
        }
    }

    function confirmacion(){
        var respuesta = confirm("¿Está seguro de la información que ha registrado para su aval y préstamo?");
        if(respuesta == true){
            return true;
        }else{
            return false;
        }
    }

</script>

<body>
    <?php
    if (isset($_SESSION['NumEmpleado5'])) {
        $NumEmpleado = $_SESSION['NumEmpleado5'];

        $ejecucion = $conn->query("CALL exist_ahorrador($NumEmpleado, @interest);");
        if ($ejecucion === TRUE) {
            $sql = "SELECT @interest;";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            $interest = $row[0];
        }
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
        
    ?>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="parrafo-aval p-5">
                <div class="row">
                    <div class="col-lg-6 mx-1">
                        <h2>¿Qué es un Aval?</h2>
                        <p class="parrafo-aval">El aval es un contrato en el que se refleja el compromiso de cumplimiento de ciertas obligaciones ante un tercero. En práctica, <i>una persona o entidad se compromete a garantizar tu deuda o las obligaciones no dinerarias que hayas contraído ante el acreedor</i>.</p>
                        <h2>Instrucciones para registrar un aval</h2>
                        <ol>
                            <li>Deberá tener a la mano <b>el número y nombre del empleado quien será su aval</b>, al igual que estar <b>consciente de la cantidad que tiene en ahorro su aval</b>. <i>Es importante que tenga los datos previos al trámite ya que de ingresar una cantidad no permitida por parte de su aval se rechazará dicho préstamo.</i></li>
                            <li>Ingrese los datos de su futuro Aval, la cantidad que sea solicitar y las quincenas en las que desea cubrir su préstamo, para visualizar su tabla de amortización seleccione el boton con la leyenda <b>¡DESEO VER MI TABLA DE AMORTIZACIÓN!</b>.</li>
                            <li>Una vez que usted esta seguro de los datos ingresados para solicitar su prestamo, presione el botón <b>¡HE LLENADO LOS DATOS Y DESEO GENERAR MI PAGARÉ!</b> y así se generará la descarga de su PDF que deberá llenar.</li>
                            <li>Lleno su documento deberá escanearlo en formato PDF no mayor a 200KB. y subirlo en el apartado correspondiente, y presionar el boton de <b>¡SOLICITAR!</b></li>
                            <li>Tiene un lapso de 30 dias antes de que su tramite este en baja si no concluye con el mismo.</li>
                        </ol>
                        <p>Nota: El plazo de pago serán las quincenas permitidas restantes hasta el fin del mes de Noviembre.</p>
                    </div>
                    <div class="col-lg-5 text-center my-1">
                        <h2>Préstamo por Aval</h2>
                        <div class="row my-4">
                            <div class="col-md-6">
                                <label for="input_tasa" class="form-label fw-bold">Interés</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="input_tasa" value="<?php echo $interest ?>" disabled>
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="pago" class="form-label fw-bold">Forma de pago</label>
                                <input type="text" class="form-control text-center" value="TRANSFERENCIA/DEPOSITO" title="TRANSFERENCIA/DEPOSITO" disabled>
                            </div>
                        </div>

                        <?php
                            $exist = "SELECT NumEmpleado3, CantidadSolicitada, Plazo, IdAhorrador1, NumEmpleado, Nombres, ApellidoPat, ApellidoMat, IdPrestamo, prestamo.Estatus from prestamo inner join cajaahorro on prestamo.IdAhorrador1 = cajaahorro.IdAhorrador inner join empleado on empleado.NumEmpleado = cajaahorro.NumEmpleado1 where NumEmpleado3 = $NumEmpleado and IdTipoPrestamo1 = 'P1' and (prestamo.Estatus = '1' OR prestamo.Estatus = '2')";
                            $result_exist = mysqli_query($conn, $exist);
                            $rowExist = mysqli_fetch_array($result_exist);
                            $countExist = mysqli_num_rows($result_exist);

                            if($countExist >= 1){
                                $Estatus = $rowExist[9];
                                $NameAval = $rowExist[6]. ' '. $rowExist[7]. ' '. $rowExist[5];
                                $IdPrestamo = $rowExist[8];
                                switch($Estatus){
                                    case 1:
                                        $amortization = 'disabled';
                                        $format = '';
                                    break;
                                    case 2:
                                        $amortization = 'disabled';
                                        $format = 'disabled';
                                    break;
                                }
                            
                        ?>
                        <div class="row my-2">
                            <div class="col-md-4">
                                <label for="numEmpleado" class="form-label fw-bold">No. Empleado (Aval)</label>
                                <input type="text" class="form-control" id="input_monto" name="NumEmp" value="<?php echo $rowExist[4], ' - ', $NameAval ?>" title="<?php echo $rowExist[4], ' - ', $NameAval ?>" disabled />
                            </div>
                            <div class="col-md-4">
                                <label for="input_monto" class="form-label fw-bold">Cantidad a solicitar</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="input_monto" <?php echo $amortization ?> name="cantSolicitada" value="<?php echo $rowExist[1] ?>" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="input_cuotas" class="form-label fw-bold mb-2">Plazo de pago</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" min="1" max="<?php echo $quincenasPago ?>" <?php echo $amortization ?> name="plazoPago" value="<?php echo $quincenasPago ?>">
                                    <span class="input-group-text">quincenas</span>
                                </div>
                            </div>
                        </div>

                        <?php
                            }else{
                                $amortization = '';
                                $format = 'disabled';

                        ?>

                        <div class="row my-2">
                            <div class="col-md-4">
                                <label for="numEmpleado" class="form-label fw-bold">No. Empleado (Aval)</label>
                                <select class="form-control" name="ne">
                                        <option selected disabled>Elige el futuro aval...</option>
                                        <?php
                                        $combo = $conn->query("Select NumEmpleado, IdAhorrador, Nombres, ApellidoPat, ApellidoMat from empleado INNER JOIN cajaahorro ON empleado.NumEmpleado = cajaahorro.NumEmpleado1 WHERE NumEmpleado <> $NumEmpleado");
                                        foreach ($combo as $opc) :
                                        ?>
                                            <option value="<?php echo $opc['IdAhorrador'] ?>"><?php echo $opc['NumEmpleado'] . ' - ' . $opc['ApellidoPat'] . ' ' . $opc['ApellidoMat'] . ' ' . $opc['Nombres'] ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                            </div>
                            <div class="col-md-4">
                                <label for="input_monto" class="form-label fw-bold">Cantidad a solicitar</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="input_monto" name="cantSolicitada" placeholder="Ejemp: 1500" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="input_cuotas" class="form-label fw-bold mb-2">Plazo de pago</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" min="1" max="<?php echo $quincenasPago ?>" name="plazoPago" placeholder="Ingrese quincenas">
                                    <span class="input-group-text">quincenas</span>
                                </div>
                            </div>
                        </div>

                        <?php
                            }
                        ?>


                        <div class="row m-2">
                            <button type="button" class="btn btn-primary my-2" onclick="calcular();" name="calcular">
                                ¡DESEO VER MI TABLA DE AMORTIZACIÓN!
                            </button>
                            <input type="submit" class="btn btn-warning my-2" name="date" <?php echo $amortization ?> value="¡HE LLENADO MIS DATOS!" onclick="return confirmacion()">
                            <button type="button" class="btn btn-success my-2" <?php echo $format?> onclick=location.href="pagare.php">¡DESEO GENERAR MI PAGARÉ!</button>
                        </div>

                        <div class="col">
                            <label for="format" class="form-label fw-bold">Formato Pagaré</label>
                            <input type="file" class="form-control" <?php echo $format?> name="format">
                        </div>
                        <div class="row my-4">
                            <div class="col">
                                <input type="submit" class="btn btn-success" name="request" <?php echo $format?> value="¡SOLICITAR PRESTAMO!">
                            </div>
                            <div class="col">
                                <input type="submit" class="btn btn-danger" name="cancel" <?php echo $format?> value="¡CANCELAR PRESTAMO!" onclick="return cancelar()">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="d-grid m-3">
                        <label for="select_periodo" class="col col-form-label fw-bold">
                            Pago:
                        </label>
                        <select id="select_periodo" style="width: 100%" disabled>
                            <option value="quincenal">Quincenal</option>
                        </select>
                    </div>
                    <div class="d-grid m-3">
                        <label for="select_periodo" class="col col-form-label fw-bold">
                            Intereses:
                        </label>
                        <select id="select_tasa_tipo" style="width: 100%" disabled>
                            <option value="mensual" selected="selected" id="select_tasa_tipo">Quincenales</option>
                        </select>
                    </div>
                </div>

                <div class="table-responsive my-4 shadow-lg p-3 mb-5 bg-body rounded">
                    <table id="table-2" class="table table-bordered " style="width: 100%; text-align: right; border: 1px gray solid; 
                            order-collapse: collapse">
                        <thead class="text-center" style="background-color:#00102E; color: white;">
                            <tr>
                                <th>Quincena</th>
                                <th>Amortización capital</th>
                                <th>Intereses</th>
                                <th>Abonos</th>
                                <th>Saldos</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_1" class="text-center">

                        </tbody>
                    </table>
                </div>

                <?php
                function alertsuccess()
                {
                    echo '<script> Swal.fire({icon: "success", title: "Datos Ingresados", text: "¡Los datos han sido ingresados correctamente!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                                then(function(result){
                                    if(result.value){ 
                                        window.location = "registroaval.php";                    
                                    }
                                });
                                </script>';
                }

                function formatsuccess()
                {
                    echo '<script> Swal.fire({icon: "success", title: "Prestamo Solicitado", text: "¡Podrá revisar su estado de aprobación en el apartado de Estatus de Prestamo!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                                then(function(result){
                                    if(result.value){ 
                                        window.location = "prestamos.php";                    
                                    }
                                });
                                </script>';
                }

                function cancelsuccess()
                {
                    echo '<script> Swal.fire({icon: "success", title: "Prestamo Cancelado", text: "¡La solicitud del prestamo ha sido cancelada!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
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

                function alertfortnight()
                {
                    echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Las quincenas no son permitidas!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){                   
                                }
                            });
                            </script>';
                }
                if (isset($_POST['date'])) {
                    $aval = filter_input(INPUT_POST, "ne");
                    $cantidadSolicitar = $_POST['cantSolicitada'];

                    $plazoPago = $_POST['plazoPago'];
                    
                    if (empty($aval) || empty($cantidadSolicitar) || empty($plazoPago)) {
                        alertdata();
                    }else{
                        if ($plazoPago > 0 && $plazoPago <= $quincenasPago) {
                            $ejecucion = $conn->query("CALL insert_PresAval($NumEmpleado, $cantidadSolicitar, '$aval', $plazoPago);");
                            if ($ejecucion === TRUE) {
                                alertsuccess();
                            }
                        } else {
                            alertfortnight();
                        }
                    }
                }
                if (isset($_POST['request'])) {
                    $tipo = $_FILES['format']['type'];
                    if ($tipo != "") {
                        $tamanio = $_FILES['format']['size'];
                        $ruta = fopen($_FILES['format']['tmp_name'], 'r');
                        $subida = fread($ruta, $tamanio);
                        $subida = mysqli_escape_string($conn, $subida);
                    
                        if ($tipo != 'application/pdf' || $tamanio >= 204800) {
                            echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡El pagare no corresponde al archivo o es demasiado grande! Por favor, intente de nuevo", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){                   
                                    window.location = "registroaval.php";
                                }
                            });
                            </script>';
                        }else{
                            $format = $conn->query("UPDATE prestamo SET nomina = '" . $subida . "', Estatus = 2 WHERE IdPrestamo = '" . $IdPrestamo . "'");
                            if ($format === TRUE) {
                                formatsuccess();
                            }else{
                                alerterror();
                            }
                        }
                    }else{
                        alertdata();
                    }
                }
                if (isset($_POST['cancel'])) {
                    $format = $conn->query("UPDATE prestamo SET Estatus = 3 WHERE IdPrestamo = '" . $IdPrestamo . "'");
                    if ($format === TRUE) {
                        cancelsuccess();
                    }else{
                        alerterror();
                    }
                }
                ?>
            </div>
        </form>
    <?php
    }
    include("footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="js/prestamo.js"></script>
    <script type="text/javascript" src="js/quincena.js"></script>
</body>

</html>