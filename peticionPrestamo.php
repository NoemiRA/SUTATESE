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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>SUTATESE - Prestamo Nómina</title>
    <?php include("navbar.php"); ?>
</head>

<body onload="quincenas();">
    <?php
        if (isset($_SESSION['NumEmpleado5'])) {
            if (isset($_GET['pc']) && isset($_GET['cm']) && isset($_GET['q'])) {
                $PoderCred = base64_decode($_GET['pc']);
                $cantidadMax = base64_decode($_GET['cm']);
                $quincenasPago = base64_decode($_GET['q']);
            }
            $NumEmpleado = $_SESSION['NumEmpleado5'];
            $ejecucion = $conn->query("CALL exist_ahorrador($NumEmpleado, @interest);");
            if ($ejecucion === TRUE) {
                $sql = "SELECT @interest;";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                $interest = $row[0];
            }
        ?>
        <div class="text-center m-2 p-3 rounded">
            <h1 class="fw-bold">PRÉSTAMO POR NÓMINA</h1>

            <div class="row bg-light">
                <div class="col-lg-5">
                    <form class="" method="post" action="" enctype="multipart/form-data">
                        <div class="row mx-3 my-2">
                            <button type="button" class="btn btn-warning my-3" data-bs-toggle="modal" data-bs-target="#exampleModal">INSTRUCCIONES</button>
                            <div class="col-md-6">
                                <label for="description" class="col col-form-label fw-bold">Poder crediticio quincenal</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">$</span>
                                    <input type="text" class="form-control" value="<?php echo $PoderCred ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="description" class="col col-form-label fw-bold">Cantidad máxima a solicitar</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">$</span>
                                    <input type="text" class="form-control" id="cantMax" value="<?php echo $cantidadMax ?>" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row mx-3">
                            <div class="col-md-6">
                                <label for="description" class="col col-form-label fw-bold">Interés mensual</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="<?php echo $interest ?>" disabled id="input_tasa">
                                    <span class="input-group-text " id="basic-addon2">
                                        <i class="fa-solid fa-percent"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="input_cuotas" class="col col-form-label fw-bold">Plazo de quincenas máximo</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="<?php echo $quincenasPago ?>" disabled name="PlazoPagoMax" id="cuotaMax">
                                    <span class="input-group-text">Quincenas</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="input_monto" class="col col-form-label fw-bold">Cantidad a solicitar</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" placeholder="Ejemp: 1500.00" name="CantidadSolicitada" id="input_monto" max="<?php echo $cantidadMax ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="input_monto" class="col col-form-label fw-bold">Quincenas a pagar</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" placeholder="Ejemp: 10" name="PlazoPago" id="input_cuotas">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex" style="visibility:hidden;">
                            <select id="select_periodo" style="width: 100%" disabled>
                                <option value="quincenal"></option>
                            </select>
                            <select id="select_tasa_tipo" style="width: 100%" disabled>
                                <option value="mensual" selected="selected" id="select_tasa_tipo"></option>
                            </select>
                        </div>

                        <div class="row mx-3 d-grid">
                            <div class="col-sm-12 mb-4">
                                <input type="text" class="form-control bg-info bg-opacity-50 fs-6" id="quincena" style="height: 38px;" disabled>
                            </div>
                        </div>

                        <div class="row mx-5 ">
                            <label for="reciboNomina" class="form-label"><b>Subir cualquiera de los recibos de nómina (PDF) de los meses que se solicitan en el recuadro azul.</b><br><i>*De no ser la nómina solicitada, el prestámo no será aceptado*.</i></label>
                            <div id="emailHelp" class="form-text">El archivo no deberá superar los 200 KB.</div>
                            <input type="file" class="form-control mb-3 mx-3" name="reciboNomina" placeholder="Ingresa recibo de nómina">
                        </div>

                        <div class="row mx-4 mb-3">
                            <div class="col m-1">
                                <a class="btn btn-danger" onclick=location.href="poderCrediticio.php">CANCELAR PRÉSTAMO</a>
                            </div>
                            <div class="col m-1">
                                <input type="submit" class="btn btn-success" value="SOLICITAR PRÉSTAMO" name="Request">
                            </div>
                        </div>
                    </form>
                </div>

                <!--Ventana Modal -->
                <div class="modal fade text-center" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg text-center">
                        <div class="modal-content text-center">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-center fw-bold" id="exampleModalLabel">Instrucciones para solicitar el préstamo</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <div class="col-md-auto text-center shadow-lg p-3 mb-2 bg-body rounded text-justify">
                                    <ol class="text-start">
                                        <li>
                                            En la parte izquierda se muestran 3 apartados que debe de llenar:
                                            <ul>
                                                <li> <b> Cantidad a solicitar: </b> Deberá ingresar la cantidad que desea solicitar para su préstamo cuidando que dicha cantidad sea menor a lo máximo que puede pedir. </li>
                                                <li><b>Quincenas a pagar:</b> Deberá ingresar la cantidad de quincenas en las que desee liquidar el préstamo siempre y cuando sea menor al plazo de quincenas máximo permitido.</li>
                                                <li><b>Subir recibo de nómina:</b> Deberá subir su recibo de nómina correspondiente a los meses solicitados en el recuadro azul, dicho recibo debe ser el mismo con el que calculó su poder crediticio.</li>
                                            </ul>
                                        </li>
                                        <li>
                                            Si desea calcular su tabla de amortización deberá ingresar la cantidad solicitada, así como el plazo de quincenas a pagar. Posteriormente presione el botón azul con la leyenda <b>"CALCULAR TABLA DE AMORTIZACIÓN"</b>. Se recomienda ver la tabla de amortización antes de solicitar su préstamo.
                                        </li>
                                        <li>
                                            Una vez que haya revisado su tabla de amortización y que esté de acuerdo con los pagos así como las quincenas, presione el botón <b>"SOLICITAR PRÉSTAMO"</b> que se encuentra en la parte posterior.
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                    function alertsuccess(){
                        echo '<script> Swal.fire({icon: "success", title: "Prestamo Solicitado", text: "¡Los datos han sido ingresados correctamente!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){
                                    window.location = "peticionPrestamo.php";                   
                                }
                            });
                            </script>';
                    }

                    function alerterror(){
                        echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, intente más tarde!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){                   
                                }
                            });
                            </script>';
                    }

                    function alertdata(){
                        echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, ingrese correctamente los valores!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                        then(function(result){
                            if(result.value){                   
                            }
                        });
                        </script>';
                    }

                    function alertdoc(){
                        echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡La nómina no corresponde al archivo o es demasiado grande!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                        then(function(result){
                            if(result.value){                   
                            }
                        });
                        </script>';
                    }

                    function alertsize(){
                        echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡La cantidad solicitada o el plazo de pago es mayor a lo permitido!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                        then(function(result){
                            if(result.value){                   
                            }
                        });
                        </script>';
                    }

                    if (isset($_POST['Request'])) {
                        $cantidadSolicitar = $_POST['CantidadSolicitada'];
                        $plazoPago = $_POST['PlazoPago'];

                        if (empty($cantidadSolicitar)) {
                            alertdata();
                        } else {

                            $tipoN = $_FILES['reciboNomina']['type'];

                            if ($tipoN != '') {
                                $tamanioN = $_FILES['reciboNomina']['size'];
                                $rutaN = fopen($_FILES['reciboNomina']['tmp_name'], 'r');
                                $subidaN = fread($rutaN, $tamanioN);
                                $subidaN = mysqli_escape_string($conn, $subidaN);
                                if ($tipoN != 'application/pdf' || $tamanioN >= 204800) {
                                    alertdoc();
                                } else {
                                    if (($cantidadSolicitar <= $cantidadMax  && $plazoPago <= $quincenasPago)) {
                                        $interest = $interest * 0.005;
                                        $numtr = $cantidadSolicitar * ($interest);
                                        $denor = (1 + $interest) ** -$plazoPago;
                                        $payment = $numtr / (1 - $denor);
                                        $balance = $cantidadSolicitar;
                                        $val = 0;

                                        for($i = 1; $i <= $plazoPago; $i++){
                                            $interests = $balance * $interest;
                                            $amortization = $payment - $interests;
                                            $balance = $balance - $amortization;
                                            $val = $val + $interests;
                                        }

                                        $ejecucion = $conn->query("CALL insert_PresNomina($NumEmpleado, $PoderCred, $cantidadSolicitar, '$subidaN', round($val,2), $plazoPago);");
                                        if ($ejecucion === TRUE) {
                                            alertsuccess();
                                        } else {
                                            alerterror();
                                        }
                                    } else {
                                        alertsize();
                                    }
                                }
                            } else {
                                alertdata();
                            }
                        }
                    }
                    ?>
                <div class="col-lg-7 text-center">
                    <button type="button" class="btn btn-primary mt-3" onclick="calcular();" name="calcular">CALCULAR TABLA DE AMORTIZACIÓN</button>
                    <h3 class="fw-bold m-3">TABLA DE AMORTIZACIÓN</h3>

                    <div class="table-responsive my-2 shadow-lg p-2 bg-body rounded">
                        <table id="table-2" class="table table-bordered " style="width: 100%; text-align: right; border: 1px gray solid; 
                                    order-collapse: collapse">
                            <thead class="text-center" style="background-color:#00102E; color: #ffffff;">
                                <tr>
                                    <th>Quincena</th>
                                    <th>Amortización capital</th>
                                    <th>Intereses</th>
                                    <th>Abonos</th>
                                    <th>Saldos</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_1" class="text-center"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
        }
        include("footer.php");
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript" src="js/plazo.js"></script>
        <script type="text/javascript" src="js/prestamo.js"></script>
        <script type="text/javascript" src="js/quincena.js"></script>
</body>

</html>