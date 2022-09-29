<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>SUTATESE-inicio</title>
    <?php include("navbar.php");
    ?>
</head>

<body>
    <!-- <section id="hero"> -->
        <div class="row g-0 p-4">
            <div class="col-lg-7 d-flex bg-light">
                <div class="content mx-auto p-5">
                    <h1><b>REGISTRO A LA CAJA DE AHORRO</b></h1>
                    <h2>Procedimiento:</h2>
                    <hr>
                    <ol>
                        <li>
                            Deberá ingresar al apartado <b>"CANTIDAD A AHORRAR"</b> y llenar debidamente los campos que se solicitan.
                        </li>
                        <li>
                            Una vez que ha terminado, deberá llenar el apartado <b>"BENEFICIARIO"</b> en donde se solicita llene completa y correctamente el formulario.
                        </li>
                        <li>
                            Cuando se haya terminado el proceso, las opciones de <b>"FORMATO DE CUOTA" </b> y <b>"SOLICITUD DE APORTACIÓN" </b> serán habilitadas, es cuando usted podrá visualizarlas, corroborar que sus datos esten escritos correctamente y descargar dichos documentos.</b>
                        </li>
                        <li>
                            Una vez descargados, deberá imprimirlos y dirigirse al <i>Sindicato Único de Trabajadores Académicos
                            del Tecnológico de Estudios Superiores de Ecatepec</i> para solicitar la firma correspondiente del <i>prof. Nicolás Cortés Martínez</i>, Secretario general.
                        </li>
                        <li>
                            Ya firmado deberá escanear por separado tanto el <b>"FORMATO DE CUOTA"</b> y <b>"SOLICITUD DE APORTACIÓN"</b> para subirlos en el apartado que corresponda en la opción de <b>"SUBIR DOCUMENTOS"</b>.
                        </li>
                    </ol>
                    <hr>
                    <h2><i>Nota:</i></h2>
                    <medium>Es ampliamente recomendado que usted ya cuente con los siguientes datos para el correcto llenado de su solicitud a la caja de ahorro.</medium>
                    <ul>
                        <li>
                            Numero de empleado al igual que nombre completo <i>(para corroborar datos)</i>.
                        </li>
                        <li>
                            Ultimo recibo de pago al igual que la credencial vigente del TESE debidamente escaneados <i>(se solicita en el apartado de <b>"CANTIDAD A AHORRRAR"</b>)</i>.
                        </li>
                        <li>
                            Datos generales de asociados <i>(nombre completo, teléfono, correo electrónico)</i>.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 d-flex bg-light align-content-center">
                <div class="content mx-auto my-5">
                <?php
                        $var = 2;
                        if($var == 1){
                            echo '
                                <div class="d-flex">
                                    <button type="button" class="btn btn-link passed" onclick=location.href="cantidad-ahorro.html">
                                        <i class="fa-solid fa-money-bills fa-4x"></i><span class="display-6 m-lg-5">Cantidad a ahorrar</span>
                                    </button>
                                </div>

                                <div class="d-flex">
                                    <button type="button" class="btn btn-link passed" onclick=location.href="beneficiario.html">
                                        <i class="fa-solid fa-users-rectangle fa-4x"></i><span class="display-6 m-lg-5">Beneficiario</span>
                                    </button>
                                </div>

                                <div class="d-flex">
                                    <button type="button" class="btn btn-link passed" disabled>
                                        <i class="fa-solid fa-file-pdf fa-4x"></i><span class="display-6 m-lg-5">Formato de Cuota</span>
                                    </button>
                                </div>

                                <div class="d-flex">
                                    <button type="button" class="btn btn-link passed" disabled>
                                        <i class="fa-solid fa-file-pdf fa-4x"></i><span class="display-6 m-lg-5">Solicitud de Aportación</span>
                                    </button>
                                </div>

                                <div class="d-flex">
                                    <button type="button" class="btn btn-link passed" disabled>
                                    <i class="fa-solid fa-file-circle-plus fa-4x"></i><span class="display-6 m-lg-5">Subir documentos</span>
                                    </button>
                                </div>
                            ';
                        }if($var == 2){
                            echo '
                                <div class="d-flex">
                                    <button type="button" class="btn btn-link passed" onclick=location.href="registroCA.php" disabled>
                                        <i class="fa-solid fa-money-bills fa-4x"></i><span class="display-6 m-lg-5">Cantidad a ahorrar</span>
                                    </button>
                                </div>

                                <div class="d-flex">
                                    <button type="button" class="btn btn-link passed" onclick=location.href="beneficiario.html" disabled>
                                        <i class="fa-solid fa-users-rectangle fa-4x"></i><span class="display-6 m-lg-5">Beneficiario</span>
                                    </button>
                                </div>

                                <div class="d-flex">
                                    <button type="button" class="btn btn-link passed">
                                        <i class="fa-solid fa-file-pdf fa-4x"></i><span class="display-6 m-lg-5">Formato de Cuota</span>
                                    </button>
                                </div>

                                <div class="d-flex">
                                    <button type="button" class="btn btn-link passed">
                                        <i class="fa-solid fa-file-pdf fa-4x"></i><span class="display-6 m-lg-5">Solicitud de Aportación</span>
                                    </button>
                                </div>

                                <div class="d-flex">
                                    <button type="button" class="btn btn-link passed" onclick=location.href="documentos-generales.html">
                                    <i class="fa-solid fa-file-circle-plus fa-4x"></i><span class="display-6 m-lg-5">Subir documentos</span>
                                    </button>
                                </div>
                            ';
                        }
                    ?>
                </div>
            </div>
    <!-- </section> -->




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
        integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>