<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">    
    <link rel="stylesheet" href="css/normalize.css">   
    <link rel="stylesheet" href="css/styles.css">  

    <title>SUTATESE - Docente Administrativo</title>

    <?php include("navbar.php");
    ?>
</head>

<body>

    <div class="container-xl text-center login">
  <!--  <section id="hero"> -->
        <div class="row g-0 h-100">
            <div class="col-lg-6 d-flex">
                
                <div class="content mx-auto px-4 my-auto">
                    <div class="inicio">
                        <h2>Información Docente/Administrativo</h2>
                    </div>

                    <div class="col-md-auto">
                        <label for="numEmpleado" class="form-label">Número empleado</label>
                        <input type="number" class="form-control" id="numEmpleado" disabled placeholder="172172903 (Ejemplo)">
                    </div>
                    <hr>
                    <div class="col-md-auto">
                        <label for="nombre" class="form-label">División</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Informática" disabled>
                    </div>
                    <hr>
                    <div class="col-md-auto">
                        <label for="fechaIngreso" class="form-label">Fecha de Ingreso al TESE</label>
                        <input type="date" class="form-control" id="fechaIngreso" placeholder="Ingresa tu fecha de ingreso al TESE">
                    </div>
                    <hr>
                    <div class="col-md-auto">
                        <label for="experienciaD" class="form-label">Experiencia Docente</label>
                        <input type="number" class="form-control" id="experienciaD" placeholder="25 años">
                    </div>
                    <hr>
                    <div class="col-md-auto">
                        <label for="experienciaP" class="form-label">Experiencia Profesional</label>
                        <input type="number" class="form-control" id="experienciaP" placeholder="40 años">
                    </div>

                   
                    <button type="button" class="btn btn-primary d-block mx-auto my-4" onclick=location.href="perfil.php">GUARDAR</button>   
                </div>
            </div>


            <div class="col-lg-6 d-flex">
                <div class="content px-4 my-auto">
                    <p class="parrafo-doc-admin">Para la correción de un registro es importante que se capture y revise los datos
                        ingresados, posteriormente presionar el botón "Guardar" para ver los cambios reflejados.</p>
                        
                        <br><br>
                    
                    <p class="fst-italic"><i>"Manifiesto bajo protesta de decir verdad que toda la documentación presentada para este trámite, 
                        así como la información ofrecida en respuesta a los formularios de aplicación, es verídica y comprobable."</i></p>
                        <br><br>
                        


                </div>
            </div>
        </div>

        
  <!--  </section> --> 
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html> 