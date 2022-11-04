<?php
    session_start();
    if(empty($_SESSION['NumEmpleado5'])){
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
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>SUTATESE - Inversionista</title>
    <?php include("navbar.php");
    ?>
</head>

<body>
    <div class="row g-0 p-4" style="text-align:justify">
        <div class="col-lg-7 d-flex">
            <div class="content mx-auto p-5">
                <h1><b>REGISTRO FONDO VARIABLE INVERSIONISTA</b></h1>
                <h2>Procedimiento:</h2>
                <hr>
                <ol>
                    <li>
                        Deberá ingresar al apartado <b>"Registro Inversionista"</b> e ingresar la cantidad que desea invertir teniendo como mínimo la cantidad de $20,000.00 mx y como máximo la cantidad de $30,000.00 mx.
                    </li>
                    <li>
                        Una vez que ha terminado, deberá llenar el apartado <b>"BENEFICIARIO"</b> en donde se solicita llene completa y correctamente el formulario.
                    </li>
                    <li>
                        Cuando haya terminado el proceso, el botón de <b>"INGRESAR"</b> se habilitará y podrá ingresar a un apartado donde se verá la lista de las personas que también quisieron ser Inversionistas y el orden en el que se encuentren es el orden que se devolverá el dinero a las personas.
                    </li>
                    <li>
                        Si además de ser inversionista desea ser ahorrador, favor de dirigirse al apartado <a href="registroCA.php">Caja de Ahorro</a> donde deberá seguir las indicaciones para su registro.
                    </li>
                </ol>
                <hr>
            </div>
        </div>
        <div class="col-lg-5 d-flex p-3 bg-light">
            <div class="my-auto">
                <?php
                $var = 2;
                if ($var == 1) {
                    echo '
                        <div class="d-flex">
                            <button type="button" class="btn btn-link passed" onclick=location.href="AhorroInversionista.php" style="text-align: center; font-size: 40px;"> 
                                <span><i class="fa-solid fa-money-bills"></i></span><span class="display-6 m-lg-2 fs-2 mx-2">Registro Inversionista</span>
                            </button>
                        </div>

                        <div class="d-flex justify-content-start">
                            <button type="button" class="btn btn-link passed" onclick=location.href="beneficiariosInversionistas.php" style="text-align: center; font-size: 40px;"> 
                                <span><i class="fa-solid fa-users-rectangle"></i></span><span class="display-6 m-lg-2 fs-2 mx-2">Beneficiarios</span>
                            </button>
                        </div>
  
                        <div class="d-flex justify-content-start">
                            <button type="button" class="btn btn-link passed" disabled style="text-align: center; font-size: 40px;"> 
                                <span><i class="fa-solid fa-right-to-bracket"></i></span><span class="display-6 m-lg-2 fs-2 mx-2">Ingresar</span>
                            </button>
                        </div>
                    ';
                }
                if ($var == 2) {
                    echo '
                        <div class="d-flex">
                            <button type="button" class="btn btn-link passed" disabled onclick=location.href="AhorroInversionista.php" style="text-align: center; font-size: 40px;"> 
                                <span><i class="fa-solid fa-money-bills"></i></span><span class="display-6 m-lg-2 fs-2 mx-2">Registro Inversionista</span>
                            </button>
                        </div>

                        <div class="d-flex">
                            <button type="button" class="btn btn-link passed" disabled onclick=location.href="beneficiariosInversionistas.php" style="text-align: center; font-size: 40px;"> 
                                <span><i class="fa-solid fa-users-rectangle"></i></span><span class="display-6 m-lg-2 fs-2 mx-2">Beneficiarios</span>
                            </button>
                        </div>
  
                        <div class="d-flex">
                            <button type="button" class="btn btn-link passed" style="text-align: center; font-size: 40px;"> 
                                <span><i class="fa-solid fa-right-to-bracket"></i></span><span class="display-6 m-lg-2 fs-2 mx-2">Ingresar</span>
                            </button>
                        </div>
                    ';
                       
                }
                ?>
            </div>
        </div>
    </div>
        <?php include("footer.php");
    ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>