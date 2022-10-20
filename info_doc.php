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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">

    <title>SUTATESE - Información Domiciliaria</title>

    <?php include("navbar.php");
    ?>
</head>

<body>

    <div class="container-xl text-center login">
        <div class="row g-0 h-100">
            <div class="col-lg-6 d-flex">

                <div class="content mx-auto px-4 my-auto">
                    <div class="inicio">
                        <h2>Información Domiciliaria</h2>
                    </div>
                    <div class="col-md-auto m-2">
                        <label for="calle" class="form-label">Calle</label>
                        <input type="text" class="form-control" id="calle" placeholder="Ingresa tu calle">
                    </div>
                    <div class="col-md-auto m-2">
                        <label for="numero" class="form-label">Número</label>
                        <input type="text" class="form-control" id="numero" placeholder="Ingresa tu número">
                    </div>
                    <div class="col-md-auto m-2">
                        <label for="delmun" class="form-label">Delegacion/Municipio</label>
                        <input type="text" class="form-control" id="delmun" placeholder="Ingresa tu Delegación ó Municipio">
                    </div>
                    <div class="col-md-auto m-2">
                        <label for="colonia" class="form-label">Colonia</label>
                        <input type="number" class="form-control" id="colonia" placeholder="Ingresa tu colonia">
                    </div>
                    <div class="col-md-auto m-2">
                        <label for="Estado" class="form-label">Estado</label>
                        <input type="text" class="form-control" id="Estado" placeholder="Ingresa tu Estado">
                    </div>
                    <div class="col-md-auto m-2">
                        <label for="cp" class="form-label">C.P.</label>
                        <input type="text" class="form-control" id="cp" placeholder="Ingresa tu C.P.">
                    </div>
                    <button type="button" class="btn btn-primary d-block mx-auto my-4" onclick=location.href="perfil.php">GUARDAR</button>
                </div>
            </div>
            <div class="col-lg-6 d-flex">
                <div class="content px-4 my-auto">
                    <p class="parrafo-doc-admin">Para la correción de un registro es importante que se capture y revise los datos
                        ingresados, posteriormente presionar el botón "Guardar" para ver los cambios reflejados.</p>

                    <br><br>

                    <p class="parrafo-manifiesto">"Manifiesto bajo protesta de decir verdad que toda la documentación presentada para este trámite,
                        así como la información ofrecida en respuesta a los formularios de aplicación, es verídica y comprobable."</p>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" 
        crossorigin="anonymous"></script>
</body>

</html>