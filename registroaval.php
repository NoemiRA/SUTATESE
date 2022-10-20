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
    <link rel="stylesheet" href="css/styles.css">

    <title>SUTATESE-Aval</title>

    <?php include("navbar.php");
    ?>

</head>

<body>
    <div class="container-xl text-center login">
        <!-- <section id="hero">  -->
        <div class="row g-0 h-100">
            <div class="col-lg-6 d-flex">
                <div class="content px-4 my-auto ">
                    <h2>¿Qué es un Aval?</h2>
                    <p class="parrafo-aval">El aval es un contrato en el que se refleja el compromiso de cumplimiento de ciertas obligaciones ante un tercero. En práctica, <i>una persona o entidad se compromete a garantizar tu deuda o las obligaciones no dinerarias que hayas contraído ante el acreedor</i>, ya se trate de un banco, la Administración u otra empresa. Para que ese compromiso sea válido, debe existir un contrato por escrito, que se suele oficializar con un aval notarial para proporcionarle un mayor respaldo legal.</p>

                    <h2>Instrucciones para registrar un aval</h2>
                    <p class="parrafo-aval">En la <b>normateca</b> se encuentra un archivo de nombre <b>"Formato Pagare 2023"</b> y se debe de imprimir para ser llenado y firmado por el prestatario y por el aval.
                    </p>
                    <p class="parrafo-aval">Una vez compleatado se deberá escanear y guardar en un archivo PDF para poder subirlo en el apartado de<b>"Formato Pagaré"</b>.

                    </p>
                    <br><br>

                    <p class="nota-aval">NOTA: El archivo solicitado se encuentra en la normateca con el nombre de "PAGARE 2023". Debe
                        de estar llenado correctamente como se solicita, de lo contrario la solicitud será rechazada.
                    </p>



                </div>
            </div>
            <div class="col-lg-6 d-flex">
                <div class="content mx-auto px-4 my-auto">
                    <div class="inicio">
                        <h2>¡Registra a un aval!</h2>
                    </div>
                    <br>

                    <div class="col-md-auto">
                        <label for="CantidadSolicitar" class="form-label">Cantidad a solicitar</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-dollar-sign"></i></span>
                            </abbr>
                            <input type="text" class="form-control" id="CantidadSolicitar" placeholder="Ejemp: 1500" />

                        </div>
                        <br>
                        <div class="col-md-auto">
                            <label for="numEmpleado" class="form-label">Número empleado</label>
                            <input type="number" class="form-control" id="numEmpleado" placeholder="Ingresa el número de empleado del aval">
                        </div>
                        <br>
                        <div class="col-md-auto">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Ingresa nombre(s) del aval">
                        </div>
                        <br>
                        <div class="col-md-auto">
                            <label for="apellidoPaterno" class="form-label">Apellido Paterno</label>
                            <input type="text" class="form-control" id="apellidoPaterno" placeholder="Ingresa el primer apellido del aval">
                        </div>
                        <br>
                        <div class="col-md-auto">
                            <label for="apellidoMaterno" class="form-label">Apellido Materno</label>
                            <input type="text" class="form-control" id="apellidoMaterno" placeholder="Ingresa el segundo apellido del aval">
                        </div>
                        <br>
                        <div class="col-md-auto">
                            <label for="apellidoMaterno" class="form-label">Formato Pagaré</label>
                            <input type="file" class="form-control" id="apellidoMaterno" placeholder="Ingresa el segundo apellido del aval">
                        </div>

                        <div class="d-flex">
                            <button type="button" class="btn btn-primary d-block mx-auto my-4" onclick=location.href="prestamos.php">CANCELAR</button>
                            <button type="button" class="btn btn-primary d-block mx-auto my-4" onclick=location.href="prestamos.php">ACEPTAR</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </section>  -->
        </div>
    </div>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>