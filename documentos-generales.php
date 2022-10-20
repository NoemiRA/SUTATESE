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

    <title>SUTATESE - Documentos Generales</title>

    <?php include("navbar.php");
    ?>

</head>

<body>
    <div class="container-xl text-center login">
     <!-- <section id="hero">  -->
        <div class="row g-0 h-100">
            <div class="col-lg-6 d-flex">
                <div class="content px-4 my-auto">  <!-- Si se le queita el "my-auto" y se alinea con el titulo de la derecha y el de la izquierda se sube-->
                    <h2>Documentos Generales</h2>
                    <br>
                    <p class="parrafo-aval">
                        En esta sección se suben los documentos que se generaron con su información para inscribirse en la caja de ahorro. Dichos docuemntos fueron creados cuando usted entró al apartado "Caja de Ahorro". Los documentos se encuentan en su computadora en la carpeta de "Descargas" y deben ser los siguientes: <span class="fw-bold"> "FORMATO CUOTA S.U.T.A.T.E.S.E.", "SOLICITUD DE APORTACIÓN A LA CAJA DE AHORRO".</span> Los 2 archivos deben ser haber sido impresos para poderlos firmar por usted y por el director del SUTATESE. Una vez firmados se deben de escanear y guardar en un archivo PDF.

                    </p>
                    <p class="parrafo-aval">
                       Todos los archivos que se deben de subir son:
                    </p>

                    <br>
                    <ul class="list-group">
                        <li class="list-group-item">"FORMATO  CUOTA  S.U.T.A.T.E.S.E."</li>
                        <li class="list-group-item">"SOLICITUD DE APORTACIÓN A LA CAJA DE AHORRO"</li>
                      </ul>
                      <br><br>
                      <p class="parrafo-aval">
                       Una vez generados y guardados los archivos que se muestran en la tabla de arriba, por favor subalos de manera correcta en el apartado correspondiente que se encuentra a la derecha o en la parte de abajo (Si es visto en un celular o dispositivo pequeño) con el nombre indicado en el documento.
                    </p>
                    

                </div>
            </div>
            <div class="col-lg-6 d-flex">
                <div class="content mx-auto px-4 my-auto">
                    <div class="inicio">
                        <h2 class="text-center">Documentos Para Inscripición</h2>
                    </div>
                    
                    <div class="col-md-auto">
                        <label for="numEmpleado" class="form-label">Número empleado</label>
                        <input type="number" class="form-control" id="numEmpleado" placeholder="618735621" disabled>
                    </div>
                    <hr>
                    
                    <div class="col-md-auto">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Noemi Ruiz" disabled>
                    </div>
                    <hr>
                    <div class="col-md-auto">
                        <label for="formatoCuota" class="form-label">FORMATO CUOTA S.U.T.A.T.E.S.E.</label>
                        <input type="file" class="form-control" id="formatoCuota">
                    </div> 
                     <hr>
                    <div class="col-md-auto">
                        <label for="solicitudAportacion" class="form-label">"SOLICITUD DE APORTACIÓN A LA CAJA DE AHORRO"</label>
                        <input type="file" class="form-control" id="solicitudAportacion">
                    </div> 
                    <hr>
                    <div class="d-flex mx-auto justify-content-center">
                        <button type="button" class="btn btn-primary d-block mx-2" onclick=location.href="registroCA.php">CANCELAR</button>
                        <button type="button" class="btn btn-primary d-block mx-2"  onclick=location.href="registroCA.php">ACEPTAR</button>
                    </div>
                    
                </div>
            </div>
        </div>
    <!-- </section>  -->
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    
</body>
</html> 