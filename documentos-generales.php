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
    <link rel="stylesheet" href="css/styleS.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>SUTATESE - Documentos Generales</title>

    <?php include("navbar.php");
    ?>

</head>

<body>
    <?php
    if (isset($_SESSION['NumEmpleado5'])) {
        $NumEmpleado = $_SESSION['NumEmpleado5'];
        $NombreEmp = $_SESSION['Nombres']. ' ' . $_SESSION['ApellidoPat']. ' ' . $_SESSION['ApellidoMat'];

        $sql = "SELECT IdAhorrador FROM cajaahorro WHERE NumEmpleado1 = '$NumEmpleado'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $IdAhorrador = $row['IdAhorrador'];
    ?>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <div class="container-xl text-center login">
                <div class="row g-0 h-100">
                    <div class="col-lg-6 d-flex">
                        <div class="content px-4 my-auto">
                            <h2>Documentos Generales</h2>
                            <br>
                            <p class="parrafo-aval">
                                En esta sección se suben los documentos que se generaron con su información para inscribirse en la caja de ahorro. Dichos documentos  fueron creados cuando usted entró al apartado "Caja de Ahorro". Los documentos se encuentran  en su computadora en la carpeta de "Descargas" y deben ser los siguientes: <span class="fw-bold"> "FORMATO CUOTA S.U.T.A.T.E.S.E.", "SOLICITUD DE APORTACIÓN A LA CAJA DE AHORRO".</span> Los 2 archivos deben ser haber sido impresos para poderlos firmar por usted y por el director del SUTATESE. Una vez firmados se deben de escanear y guardar en un archivo PDF.
                            </p>
                            <p class="parrafo-aval">
                                Todos los archivos que se deben de subir son:
                            </p>
                            <br>
                            <ul class="list-group">
                                <li class="list-group-item">"FORMATO CUOTA S.U.T.A.T.E.S.E."</li>
                                <li class="list-group-item">"SOLICITUD DE APORTACIÓN A LA CAJA DE AHORRO"</li>
                            </ul>
                            <br><br>
                            <p class="parrafo-aval">
                                Una vez generados y guardados los archivos que se muestran en la tabla de arriba, por favor súbalos de manera correcta en el apartado correspondiente que se encuentra a la derecha o en la parte de abajo (Si es visto en un celular o dispositivo pequeño) con el nombre indicado en el documento.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex">
                        <div class="content mx-auto px-4 my-auto">
                            <div class="inicio">
                                <h2 class="text-center">Documentos para inscripición</h2>
                            </div>
                            <div class="row">
                                <div class="col-md-auto">
                                    <label for="numEmpleado" class="form-label">Número empleado</label>
                                    <input type="number" class="form-control" id="numEmpleado" value="<?php echo $NumEmpleado; ?>" disabled>
                                </div>
                                <div class="col-md-auto">
                                    <label for="nombre" class="form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre" value="<?php echo $NombreEmp; ?>" disabled>
                                </div>
                            </div>
                            <hr>

                            <div class="col-md-auto">
                                <label for="formatoCuota" class="form-label">FORMATO CUOTA S.U.T.A.T.E.S.E. <b>*</b></label>
                                <div id="emailHelp" class="form-text">El PDF no deberá superar los 200 KB.</div>
                                <input type="file" class="form-control" name="QuotaFormat">
                            </div>
                            <hr>
                            <div class="col-md-auto">
                                <label for="solicitudAportacion" class="form-label">SOLICITUD DE APORTACIÓN A LA CAJA DE AHORRO <b>*</b></label>
                                <div id="emailHelp" class="form-text">El PDF no deberá superar los 200 KB.</div>
                                <input type="file" class="form-control" name="ContributionRequest">
                            </div>
                            <hr>
                            <div class="d-flex mx-auto justify-content-center">
                                <button type="button" class="btn btn-primary d-block mx-2" onclick=location.href="registroCA.php">Cancelar</button>
                                <input type="submit" class="btn" value="Aceptar" name="Update"></input>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php
        if (isset($_POST['Update'])) {
            $tipoQF = $_FILES['QuotaFormat']['type'];
            $tipoCR = $_FILES['ContributionRequest']['type'];

            if ($tipoQF != "" && $tipoCR != "") {
                $tamanioQF = $_FILES['QuotaFormat']['size'];
                $rutaQF = fopen($_FILES['QuotaFormat']['tmp_name'], 'r');
                $subidaQF = fread($rutaQF, $tamanioQF);
                $subidaQF = mysqli_escape_string($conn, $subidaQF);

                $tamanioCR = $_FILES['ContributionRequest']['size'];
                $rutaCR = fopen($_FILES['ContributionRequest']['tmp_name'], 'r');
                $subidaCR = fread($rutaCR, $tamanioCR);
                $subidaCR = mysqli_escape_string($conn, $subidaCR);

                if (($tipoQF != 'application/pdf' || $tamanioQF >= 8388608) && ($tipoCR != 'application/pdf' || $tamanioCR >= 204800)) {
                    echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡El formato de Cuota y la Solicitud de Aportación no corresponden al archivo o son demasiado grandes! Por favor, intente de nuevo", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){                   
                                }
                            });
                            </script>';
                } else if ($tipoCR != 'application/pdf' || $tamanioCR >= 204800) {
                    echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡La solicitud de Aportación no corresponde al archivo o es demasiado grande! Por favor, intente de nuevo", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){                   
                                }
                            });
                            </script>';
                } else if ($tipoQF != 'application/pdf' || $tamanioQF >= 8388608) {
                    echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡El formato de Cuota no corresponde al archivo o es demasiado grande! Por favor, intente de nuevo", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){                   
                                }
                            });
                            </script>';
                } else {
                    $update = $conn->query("UPDATE cajaahorro SET FormatoCuota = '$subidaQF',SolicitudAportacion = '$subidaCR', Estatus = 3 WHERE IdAhorrador = '$IdAhorrador'");
                    if ($update === TRUE) {
                        echo '<script> Swal.fire({icon: "success", title: "Documentos subidos", text: "¡El formato de cuota y la solicitud de aportacion han sido registrados!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){ 
                                    window.location = "registroCA.php";              
                                }
                            });
                            </script>';
                    } else {
                        echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, intente más tarde!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){                   
                                }
                            });
                            </script>';
                    }
                }
            } else {
                echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Ingrese los documentos solicitados! Por favor, intente de nuevo", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){                   
                                }
                            });
                            </script>';
            }
        }
        ?>
    <?php
    }
    include("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>