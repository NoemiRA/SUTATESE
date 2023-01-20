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
        <div class="text-center m-2 p-3 rounded mb-0 pb-0">
            <h1 class="fw-bold">PRÉSTAMO POR NÓMINA</h1>
            
            <form class="row bg-light" method="post" action="" enctype="multipart/form-data"> 
                <div class="col-lg-5">
                    <div class="row mx-3 my-2">
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
                    <div class="row mx-3 my-2">
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
                            <label for="input_cuotas" class="col col-form-label fw-bold">Plazo de pago máximo:</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="<?php echo $quincenasPago ?>" disabled name="PlazoPagoMax" id="cuotaMax" >
                                <span class="input-group-text">Quincenas</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="input_monto" class="col col-form-label fw-bold">Cantidad a solicitar:</label>
                            <div class="input-group mb-3">
                                <!-- <div class="input-group mb-3"> -->
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" placeholder="Ejemp: 1500.00" name="CantidadSolicitada" id="input_monto" max="<?php echo $cantidadMax ?>">
                                <!-- </div> -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="input_monto" class="col col-form-label fw-bold">Plazo a pagar en quincenas:</label>
                            <div class="input-group mb-3">
                                    <input type="number" class="form-control" placeholder="Ejemp: 10" name="PlazoPago" id="input_cuotas">                               
                                </div>
                            </div>
                        </div>
                
                    <!-- <div class="row mx-3 my-2 d-grid">
                        <label for="input_monto" class="col col-form-label fw-bold">Cantidad a solicitar</label>
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" placeholder="Ejemp: 1500.00" name="CantidadSolicitada" id="input_monto" max="<?php echo $cantidadMax ?>">
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="row mx-3 my-2 d-grid">
                        <label for="input_monto" class="col col-form-label fw-bold">Plazo a pagar en quincenas:</label>
                        <div class="col">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" placeholder="Ejemp: 10" name="PlazoPago" id="input_cuotas">
                            </div>
                        </div>
                    </div> -->

                    

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
                

                <div class="row mx-3 my-2 d-grid">
                    <div class="col-sm-12 mb-4">
                    <input type="text" class="form-control bg-info bg-opacity-50 fs-6" id="quincena" style="height: 38px;" disabled>
                    </div>
                </div>

                <div class="row mx-5 ">
                    <label for="reciboNomina" class="form-label fw-bold">Subir cualquiera de los recibos de nómina (PDF) de los meses que se solicitan en el recuadro azul:</label>
                    <div id="emailHelp" class="form-text">El archivo no deberá superar los 200 KB.</div>
                    <input type="file" class="form-control mb-3 mx-3" name="reciboNomina" placeholder="Ingresa recibo de nómina">
                </div>

                <!-- <div class="d-flex flex-column mb-3">
                    <div class="row m-3">
                        <a class="btn btn-danger" onclick=location.href="poderCrediticio.php">CANCELAR</a>
                    </div>
                    <div class="row m-3">
                        <input type="submit" class="btn btn-success" value="¡SOLICITAR PRESTAMO!" name="Request">
                    </div>
                </div> -->
            </div>

        <div class="col-lg-7 text-center">
            
            <!-- <div class="container text-center m-3">
                 <div class="row"> 
                    <div class="col">
                        <a class="btn btn-danger" onclick=location.href="poderCrediticio.php">CANCELAR</a>
                    </div>
                <div class="col">
                    <input type="submit" class="btn btn-success" value="¡SOLICITAR PRESTAMO!" name="Request">
                </div>
             </div> 
        </div> -->
                <div class="row mb-3">
                    
                    <div class="col m-3">
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                            INSTRUCCIONES
                        </button>
                        <!--Ventana Modal -->
                        <div class="modal fade text-center" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog text-center">
                                    <div class="modal-content text-center">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-center fw-bold" id="exampleModalLabel">Instrucciones de uso para pedir el préstamo</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <div class="col-md-auto text-center shadow-lg p-3 mb-2 bg-body rounded text-justify">
                                                <ol class="text-start">
                                                    <li>
                                                        En la parte izquierda se muestran 3 apartados que debe de llenar: 
                                                        <ul>
                                                            <li> <b> Cantidad a solicitar: </b> Deberá ingresar la cantidad que desea solicitar para su préstamo cuidando que dicha cantidad sea menor a lo máximo que puede pedir. </li>
                                                            <li><b>Plazo a pagar en quincenas:</b> Deberá ingresar la cantidad de quincenas en las que desee liquidar el préstamo siempre y cuando sea menor al plazo de pago máximo.</li>
                                                            <li><b>Subir recibo de nómina:</b> Deberá subir su recibo de nómina correspondiente a los meses solicitados en el recuadro azul, dicho recibo debe ser el mismo con el que calculó su poder crediticio.</li>
                                                        </ul> 
                                                    </li>
                                                    <li>
                                                        Si desea calcular su tabla de amortización deberá ingresar la cantidad solicitada, así como el plazo de quincenas a pagar. Posteriormente tiene que presionar el botón azul que se encuentra en la parte inferior "¡Calcular Tabla de Amortización!". Se recomienda ver la tabla de amortización antes de solicitar su préstamo.
                                                    </li>
                                                    <li>
                                                        Una vez que haya revisado su tabla de amortización y que esté de acuerdo con los pagos y las quincenas presione el botón "¡Solicitar Préstamo!" que se encuentra en la parte posterior. 
                                                    </li>
                                                </ol>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="modal-footer text-start">
                                            <input type="submit" class="btn-secondary p-2" style="background: #198754; color: white; border:none; border-radius: 5px" name="Update" value="Cerrar"></input>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        <!--Ventana Modal -->
                    </div>
                    <div class="col m-3">
                        <a class="btn btn-danger" onclick=location.href="poderCrediticio.php">CANCELAR</a>
                    </div>
                    <div class="col m-3">
                        <input type="submit" class="btn btn-success" value="¡SOLICITAR PRESTAMO!" name="Request">
                    </div>
                </div>

            <h2 class="mt-4 fw-bold">TABLA DE AMORTIZACIÓN</h2>
            <div class="table-responsive my-4 shadow-lg p-3 mb-5 bg-body rounded">
                <table id="table-2" class="table table-bordered " style="width: 100%; text-align: right; border: 1px gray solid; 
                        order-collapse: collapse">
                    <thead class="text-center" style="background-color:#00102E; color: #ffffff;">
                    
                        <tr>
                            <th>Quincena</th>
                            <th>Amortización captial</th>
                            <th>Intereses</th>
                            <th>Abonos</th>
                            <th>Saldos</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_1" class="text-center">

                        </tbody>
                    </table>
                    
            </div>
        </div>
        <?php

        function alertsuccess()
        {
            echo '<script> Swal.fire({icon: "success", title: "Datos Ingresados", text: "¡Los datos han sido ingresados correctamente!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
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
            echo '<script> Swal.fire({icon: "error", title: "Error...Información Faltante", text: "¡Por favor, ingrese correctamente los valores!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                        then(function(result){
                            if(result.value){                   
                            }
                        });
                        </script>';
        }

        function alertdoc()
        {
            echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡La nómina no corresponde al archivo o es demasiado grande!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                        then(function(result){
                            if(result.value){                   
                            }
                        });
                        </script>';
        }

        function alertsize()
        {
            echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡La cantidad solicitada o el plazo de pago es mayor a lo permitido!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                        then(function(result){
                            if(result.value){                   
                            }
                        });
                        </script>';
        }

        if (isset($_POST['Request'])) {
            $cantidadSolicitar = $_POST['CantidadSolicitada'];
            // $plazoMax = $_POST['PlazoPagoMax'];
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
                        if (($cantidadSolicitar <= $cantidadMax  && $plazoPago <= $quincenasPago )) {
                            $ejecucion = $conn->query("CALL insert_PresNomina($NumEmpleado, $PoderCred, $cantidadSolicitar, '$subidaN');");
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
        </form>
        <!-- <div class="d-flex flex-column col-lg-5 mb-4 ms-4 me-4"> 
            <button type="button" class="btn btn-primary mt-1 ms-5 me-5" onclick="calcular();" name="calcular">¡CALCULAR TABLA DE AMORTIZACIÓN!</button> 
        </div> -->
        <div class="d-flex flex-column col-lg-5 mb-4 ms-2 me-3"> 
            <button type="button" class="btn btn-primary mt-1 ms-5 me-5" onclick="calcular();" name="calcular">¡CALCULAR TABLA DE AMORTIZACIÓN!</button> 
        </div>
    </div>
    

    <?php 
    }
    include("footer.php");
    ?>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script type="text/javascript" src="js/plazo.js"></script>
            <script type="text/javascript" src="js/app.js"></script>
            <script type="text/javascript" src="js/prestamo.js"></script>
            <script type="text/javascript" src="js/quincena.js"></script>
</body>

</html>