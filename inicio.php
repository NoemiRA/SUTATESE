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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>SUTATESE - Inicio</title>
    <?php include("navbar.php");
    ?>
</head>

<body onload="Saludo();" class="">
    <?php
    if (isset($_SESSION['NumEmpleado5'])) {
        $NumEmpleado = $_SESSION['NumEmpleado5'];

        $sql = "Select foto from empleado where NumEmpleado = '$NumEmpleado'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $Img = $row['foto'];

    ?>
        <div class="row g-0 h-50 p-5">
            <div class="col-lg-7 d-flex">
                <div class="content mx-auto px-2">
                    <div class="inicio my-5">
                        <h3>Sindicato Único de Trabajadores Académicos del Tecnológico de Estudios Superiores de Ecatepec</h3>
                        <div id="saludo" class="mb-5 mt-5">
                            <img src="data:image/png; base64,<?php echo base64_encode($Img) ?>" width="120" height="120" style="border-radius: 50%;">
                            <h2 class="fs-1">
                                <?php
                                echo $_SESSION['Nombres'] . " " . $_SESSION['ApellidoPat'] . " " . $_SESSION['ApellidoMat'];
                                ?>
                            </h2>
                            <h2 id="txtsaludo" class="p-3 fw-bold fs-1 mt-5"></h2>
                            <img name="tiempo" height="60" width="60">
                            <p id="fechactual" class="fst-italic fs-4"></p>
                            <p id="relojnumerico" onload="cargarReloj()" class="fw-bold fs-4"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 d-flex bg-light">
                <div class="content mx-auto align-self-center px-4 my-5">
                    <button type="button" class="btn btn-primary" style="width: 100%; height: 90px;" onclick=location.href="registroInversionista.php">INVERSIONISTAS</button>
                    <button type="button" class="btn btn-primary" style="width: 100%; height: 90px;" onclick=location.href="registroCA.php">CAJA DE AHORRO</button>
                    <button type="button" class="btn btn-primary" style="width: 100%; height: 90px;" onclick=location.href="prestamos.php">PRÉSTAMOS</button>
                    <button type="button" class="btn btn-primary" style="width: 100%; height: 90px;" onclick=location.href="datosBancarios.php">DATOS BANCARIOS</button>
                    <button type="button" class="btn btn-warning" style="width: 100%; height: 90px;" onclick=location.href="normateca.php">NORMATECA</button>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <?php include("footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/app.js"></script>
</body>

</html>