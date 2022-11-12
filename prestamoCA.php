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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>SUTATESE - Prestamo Caja de Ahorro</title>

    <?php include("navbar.php");
    ?>
</head>

<body>
    <?php
        if (isset($_SESSION['NumEmpleado5'])) {
            $NumEmpleado = $_SESSION['NumEmpleado5'];
            $sql = "SELECT IdAhorrador, CantidadQuincenal FROM cajaahorro WHERE NumEmpleado1 = '$NumEmpleado'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
    ?>
    
    <h1 class=" fw-bold text-center mx-5 my-5">PRÉSTAMO POR CAJA DE AHORRO</h1>
    <section class="login">
        <div class="container-xl">
            <form class="row g-3 mt-3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="col p-3">
                    <label for="CantidadDisp" class="form-label fw-bold mx-2 mt-2 fs-5" style="width:100%;">Cantidad Disponible</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-dollar-sign"></i></span>
                        <input type="number" class="form-control " value="<?php echo $row['CantidadQuincenal'] ?>" disabled>
                    </div>
                </div>

                <div class="col p-3">
                    <label for="CantidadSolicitar" class="form-label fw-bold mx-2 mt-2 fs-5" style="width:100%;">Cantidad a Solicitar</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-dollar-sign"></i></span>
                        <input type="text" class="form-control" name="CantidadSolicitar" placeholder="Ejemp: 1500" />
                    </div>
                </div>
            </form>
    
    <div class="col-lg text-center mb-5">
        <button type="button" class="btn btn-primary mx-5 text-center" onclick=location.href="prestamos.php">
            Cancelar
        </button>
        <input type="submit" class="btn btn-primary mx-5 text-center" value="Solicitar" name="Request">
    </div>
    </section>
    <?php 
        
            // Request
            if (isset($_POST['Request'])) {
                $CantidadSolicitar = $_POST['CantidadSolicitar'];
                if($CantidadSolicitar <= $row['CantidadQuincenal']){
                    echo 'La cantidad es permitida';
                }else{
                    echo'La cantidad es mayor a la permitida, por favor intente nuevamente';
                }
            }
        }
        include("footer.php");
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/app.js"></script>
</body>

</html>