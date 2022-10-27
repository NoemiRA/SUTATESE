<?php
    session_start();
    if(empty($_SESSION['NumEmpleado5'])){
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
    

    <title>SUTATESE-normateca</title>
    <?php include("navbar.php");
    ?>
</head>

<body>
    <div class="row m-5 bg-light">
        <h1 class="m-3 text-center">NORMATECA</h1>
        <div class="col-sm-6 my-3 mb-5">
            <div class="card text-center" style="height: 100%;">
                <div class="card-body">
                    <h4 class="card-title"><b> Reglamento de la caja de ahorro del SUTATESE </b></h4>
                    <p class="card-text">
                        Reglamento de la caja de ahorro que celebra el Sindicato Único de Trabajadores Académicos del Tecnológico de 
                        Estudios Superiores de Ecatepec (SUTATESE) y los trabajadores ahorradores del Tecnológico de Estudios Superiores de Ecatepec (TESE).
                    </p>
                    <footer class="blockquote-footer mt-3">Autorizado para su aplicación en Ecatepec de Morelos, Estado de México el _______________________ por el Comité Ejecutivo, Comisión de Vigilancia y Comité de Honor y Justicia del Sindicato.</footer>
                    <a type="button" class="btn btn-outline-dark mt-3" target="_black" href="http://localhost/SUTATESE/docs/ReglCjaAhorro.pdf">
                        Ver archivo
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 my-3 mb-5">
            <div class="card text-center" style="height: 100%;">
                <div class="card-body">
                    <h2 class="card-title"><b> Formato Pagare 2023 </b></h2>
                    <p class="card-text">
                        Documento contable que contiene la promesa incondicional de una persona, denominada deudor,
                        que pagará a una segunda persona, llamada beneficiario o acreedor, una suma monetaria en un
                        determinado plazo.
                    </p>
                    <footer class="blockquote-footer my-3">Deberá ser debidamente llenado, escaneado y subirlo en la
                        parte correspondiente de  <cite title="Source Title">Préstamo por aval</cite>.</footer>
                    <a type="button" class="btn btn-outline-dark my-4" target="_black" href="http://localhost/SUTATESE/docs/Pagare2023.pdf">
                        Ver archivo
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php include("footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>