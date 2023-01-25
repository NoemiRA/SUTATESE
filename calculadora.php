<?php
session_start();
include('conexion.php');

if (empty($_SESSION['User'])) {
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
    <link rel="stylesheet" href="css/style_a.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>Calculadora</title>

    <?php include("navbar.php");?>
</head>

<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <div class="container mx-auto">
            <center><h1 class="display-3 m-4">TABLA DE AMORTIZACIÓN</h1></center>
            <div class="row">
                <div class="col-md-4 my-auto">
                    <label for="Solicitar" class="form-label mt-4">Cantidad Solicitada </label>
                    <input type="number" class="form-control" id="Solicitar" name="Solicitar" placeholder="Ingresa la cantidad solicitada..." />
                </div>
                <div class="col-md-4 my-auto">
                    <label for="Interes" class="form-label mt-4">Interés mensual </label>
                    <input type="number" class="form-control" id="Interes" name="Interes" placeholder="Ingresa el interes..." />
                </div>
                <div class="col-md-4 my-auto">
                    <label for="Plazo" class="form-label mt-4">Plazo quincenal </label>
                    <input type="number" class="form-control" id="Plazo" name="Plazo" placeholder="Ingresa el plazo..." />
                </div>
                <div class="col-md-auto m-auto p-3">
                
                    <input type="submit" class="btn btn-outline-danger rounded-pill" value="CALCULAR" name="calculator"></a>
                </div>
            </div>

            <?php
                if(isset($_POST['calculator'])){
                    $cantidadSolicitar = $_POST['Solicitar'];
                    $interest = $_POST['Interes'];
                    $plazoPago = $_POST['Plazo'];

                    $interest = $interest * 0.005;
                    $numtr = $cantidadSolicitar * ($interest);
                    $denor = (1 + $interest) ** -$plazoPago;
                    $payment = $numtr / (1 - $denor);
                    $balance = $cantidadSolicitar;
                    $val = 0;

                    ?>
                    <table id="table-2" class="table table-bordered my-4 text-center" style="width: 100%; text-align: right; border: 1px gray solid; 
                                    order-collapse: collapse">
                    <thead class="text-center" style="background-color:#00102E; color: #ffffff;">
                        <th>Quincenas</th>
                        <th>Amortización Capital</th>
                        <th>Interes</th>
                        <th>Abonos</th>
                        <th>Saldos</th>
                    </thead>
                    <tbody>
                        
                    <?php

                    for($i = 1; $i <= $plazoPago; $i++){
                        $interests = $balance * $interest;
                        $amortization = $payment - $interests;
                        $balance = $balance - $amortization;
                        $val = $val + $interests;

                        echo'<tr><th scope="row">'.$i.'</td>
                        <td>'.round($amortization,2).'</td>
                        <td>'.round($interests, 2).'</td>
                        <td>'.round($payment, 2).'</td>
                        <td>'.round($balance, 2).'</td></tr>';
                    }
                    ?>
                    </tbody>
                    </table>
                    <?php
                }          
            ?>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>