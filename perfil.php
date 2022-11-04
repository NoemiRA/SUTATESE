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
    <link rel="stylesheet" href="css/styles.css">


    <title>SUTATESE-Perfil</title>

    <?php include("navbar.php");
    ?>
</head>

<body>
    <?php
    if (isset($_SESSION['NumEmpleado5'])) {
        $NumEmpleado = $_SESSION['NumEmpleado5'];
        $NombreEmp = $_SESSION['Nombres'];
        $ApellidoPatEmp = $_SESSION['ApellidoPat'];
        $ApellidoMatEmp = $_SESSION['ApellidoMat'];

        $sql = "Select foto from empleado where NumEmpleado = '$NumEmpleado'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $Img = $row['foto'];

    ?>
        <div class="container-xl login">
            <h1>Perfil del Usuario</h1>
            <div style="margin-top: 2%;">
                <form class="row g-3 mt-3">
                    <div class="col-md-auto">
                        <img src="data:image/png; base64,<?php echo base64_encode($Img) ?>" width="120" height="120" style="border-radius: 50%;">
                    </div>
                    <div class="col-md-auto">
                        <h2><?php echo $NombreEmp . " " . $ApellidoPatEmp . " " . $ApellidoMatEmp ?></h2>
                        <p>Número de empleado: <?php echo $NumEmpleado ?></p>
                        <button type="button" class="btn" style="width: 50%; height: 35px;" onclick=location.href="">Cambiar foto</button>
                    </div>

                    <div class="row p-5">
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-primary" style="width: 100%; height: 100px;" onclick=location.href="info_docen_adm.php">INFORMACIÓN DOCENTE / ADMINISTRATIVO</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-primary" style="width: 100%; height: 100px;" onclick=location.href="info-personal.php">INFORMACIÓN PERSONAL</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-primary" style="width: 100%; height: 100px;" onclick=location.href="info_doc.php">INFORMACIÓN DOMICILIO</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-primary" style="width: 100%; height: 100px;" onclick=location.href="datosBancarios.php">INFORMACIÓN BANCARIA</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }
    ?>

    <?php include("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>