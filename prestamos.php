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

    <title>SUTATESE - Prestamos</title>
    <?php include("navbar.php");
    ?>

</head>

<body>
    <div class="row g-0 h-50 p-5">
        <div class="col-lg-7 d-flex">
            <div class="content px-3 my-auto">
                <h2 class="p-2 text-center"><strong>PRÉSTAMOS</strong></h2>
                <marquee>
                    <h1 class="display-6"><em>Es importante tener la información bancaria actualizada o dada de alta antes de solicitar un préstamo.<em></h1>
                </marquee>
                <ul>
                    <li>
                        <p class="parrafo-aval">
                            <strong>Conoce tu poder crediticio: </strong>
                            Se presenta una lista detallada acerca de sus percepciones y deducciones que se presentan en su nómina,
                            indicando a usted el poder crediticio con el que cuenta quincenalmente.
                        </p>
                    </li>
                    <li>
                        <p class="parrafo-aval">
                            <strong>Conoce tu estatus de préstamos: </strong>
                            Puede acceder a la opción una vez que ya ha realizado previa solicitud a un préstamo en cualquiera de las tres
                            opciones que también se encuentran en el menú y que a continuación se detallarán, se indica si su préstamo no
                            ha sido procedente o en caso de que lo sea, podrá visualizar el estatus de pago realizado quincenalmente.
                        </p>
                    </li>
                    <li>
                        <p class="parrafo-aval">
                            <strong>Préstamo por caja de ahorro: </strong>
                            Pertenecer a la caja de ahorro ofrece diversas ventajas para usted, una de ellas es el préstamo que puede
                            solicitar con la tasa de interés del 2%, mostrando la cantidad disponible con la que cuenta para solicitar
                            su préstamo, y la forma en la que será realizado el pago.
                        </p>
                    </li>
                    <li>
                        <p class="parrafo-aval"><strong>
                                Préstamo vía nómina: </strong> Este apartado le permite a usted solicitar un préstamo aplicando el debido
                            interés, mostrando detalladamente cada uno de los movimientos en ayuda de una tabla de amortización.
                        </p>
                    </li>
                    <li>
                        <p class="parrafo-aval">
                            <strong>Préstamo por un aval: </strong>
                            Un préstamo por aval le permite conseguir un préstamo en caso de que no cumpla con el perfil adecuado para
                            las opciones anteriores, cumpliendo con las cláusulas que lo competen, es importante que usted considere
                            llenar el formato de pagaré antes de comenzar con su tramite.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-5 d-flex bg-light">
            <div class="content mx-auto align-self-center px-4 my-3">
                <button type="button" class="btn btn-warning" style="width: 100%; height: 100px;" onclick=location.href="#">¿YA SOLICITASTE UN PRÉSTAMO? <br>¡CONOCE EL ESTATUS DE TUS PRÉSTAMOS!</button>
                <button type="button" class="btn btn-primary" style="width: 100%; height: 100px;" onclick=location.href="prestamoCA.php">PRÉSTAMO POR CAJA DE AHORRO</button>
                <button type="button" class="btn btn-primary" style="width: 100%; height: 100px;" onclick=location.href="PoderCrediticio.php">PRÉSTAMO VÍA NOMINA </button>
                <button type="button" class="btn btn-primary" style="width: 100%; height: 100px;" onclick=location.href="registroaval.php">PRÉSTAMO POR AVAL</button>
            </div>
        </div>
    </div>

    <?php
    include("footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/app.js"></script>

</body>

</html>