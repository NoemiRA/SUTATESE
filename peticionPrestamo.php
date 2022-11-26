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

    <title>SUTATESE - Prestamo Nómina</title>

    <?php include("navbar.php"); ?>
</head>



<body onload="plazo();">
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
        <div class="text-center m-5 p-3 rounded">
            <h1 class="m-3 fw-bold">PRÉSTAMO POR NÓMINA</h1>
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
                                <input type="text" class="form-control" value="<?php echo $cantidadMax ?>" disabled>
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
                            <label for="input_cuotas" class="col col-form-label fw-bold">Plazo de pago en quincenas:</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="<?php echo $quincenasPago ?>" disabled>
                                <span class="input-group-text">Quincenas</span>
                            </div>
                        </div>
                    </div>

                    <div class="row mx-3 my-2 d-grid">
                        <label for="description" class="col col-form-label fw-bold">Plazo de máximo a pagar:</label>
                        <div class="col">
                            <input type="text" class="form-control" id="meses" style="height: 38px;" disabled></input>
                        </div>
                    </div>

                    <div class="row mx-3 my-2 d-grid">
                        <label for="input_monto" class="col col-form-label fw-bold">Cantidad a solicitar</label>
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" placeholder="Ejemp: 1500.00" name="CantidadSolicitada" id="input_monto" max="<?php echo $cantidadMax ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row mx-3 my-2 d-grid">

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
                

                <div class="row mx-3 my-2 d-grid">
                    <div class="col-sm-12 mb-4">
                        <input type="text" class="form-control bg-info bg-opacity-50" id="quincena" style="height: 38px;" disabled>
                    </div>
                </div>

                <div class="row mx-5 ">
                    <label for="reciboNomina" class="form-label fw-bold">Subir cualquiera de los recibos de nómina (PDF) de los meses que se solicitan en el recuadro azul:</label>
                    <div id="emailHelp" class="form-text">El archivo no deberá superar los 200 KB.</div>
                    <input type="file" class="form-control mb-3 mx-3" name="reciboNomina" placeholder="Ingresa recibo de nómina">
                </div>

                <div class="d-flex flex-column mb-3">
                    <div class="row m-3">
                        <button class="btn btn-danger" onclick=location.href="/prestamos.php">CANCELAR</button>
                    </div>
                    <div class="row m-3">
                        <button type="button" class="btn btn-primary boton-ingresar" onclick="calcular();" name="calcular">
                            ¡CALCULAR TABLA DE AMORTIZACIÓN!
                        </button>
                    </div>
                    <div class="row m-3">
                        <input type="submit" class="btn btn-success" value="¡SOLICITAR PRESTAMO!" name="Request">
                    </div>
                </div>
            </div>

        <div class="col-lg-7 ">
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
            echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, ingrese correctamente los valores!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
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
            echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡La cantidad solicitada es mayor a lo permitido!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                        then(function(result){
                            if(result.value){                   
                            }
                        });
                        </script>';
        }

        if (isset($_POST['Request'])) {
            $cantidadSolicitar = $_POST['CantidadSolicitada'];
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
                        if (($cantidadSolicitar <= $cantidadMax)) {
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
</body>

</html>