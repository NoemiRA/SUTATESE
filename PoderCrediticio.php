<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        

    <title>SUTATESE - Poder Crediticio</title>
   

    <?php include("navbar.php");
    ?>

</head>

<body>
   <h1 class="text-center" >PODER CREDITICIO</h1>
   <div class="row g-0 h-50 p-5">
        <div class="col-lg-6 bg-light justify-content-center">
            <form class="text-center">
            <p class="text-center fs-4 fw-bold p-4" >Favor de introducir los datos reales de su recibo de nómina correspondiente a la quincena indicada</p>
            <!-- <p class="text-start fs-4 fw-bold"></p> -->
                <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="Nombre" class="col-sm-2 col-form-label">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Nombre" placeholder="Noemi" disabled>
                    </div>
                </div>

                <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="quincena" class="col-sm-2 col-form-label">Quincena:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="quincena" placeholder="2da de Octubre" disabled>
                    </div>
                </div>

                <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="tpercepciones" class="col-sm-2 col-form-label">Total Percepciones: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="tpercepciones" placeholder="Ejemp: 1500.00" oninput="hacerSuma();">
                    </div>
                </div>

                <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="isr" class="col-sm-2 col-form-label">ISR: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="isr" placeholder="Ejemp: 1500.00" oninput="hacerSuma();">
                    </div>
                </div>

                <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="issemym" class="col-sm-2 col-form-label">Sumatoria ISSEMyM: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="issemym" placeholder="Ejemp: 1500.00" oninput="hacerSuma();">
                    </div>
                </div>


                <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="tdeducciones" class="col-sm-2 col-form-label">Total Deducciones: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="tdeducciones" placeholder="Ejemp: 1500.00" oninput="hacerSuma();">
                    </div>
                </div>

                <div class="form-group row my-1">
                    <small class="form-text text-muted">
                        <i>*En caso de no contar con alguna cifra coloque un cero (0) o deje vacio*</i>
                    </small>
                </div>

                <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="poderCred" class="col-sm-2 col-form-label">Poder crediticio: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control bg-warning bg-opacity-50" id="poderCred" style="height: 38px;" disabled ></input>
                    </div> 
                </div>
               
                <button type="button" class="btn btn-danger m-2" onclick=location.href="prestamos.php">
                    Cancelar
                </button>
            <button type="button" class="btn btn-primary m-2" id="solicitar">
                    Solicitar Préstamo
            </button>

            </form>
        </div>  
        
        <div class="col-lg-6 p-4 bg-light justify-content-center">
            <p class="text-center fs-4 fw-bold">Imágen guía y de demostración</p>
        <img src="resources\reciboNomina.jpg" class="me-3 mx-2 img-fluid" width="695" height="840">
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
        integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="js/main.js"></script>

 
    
</body>
</html>