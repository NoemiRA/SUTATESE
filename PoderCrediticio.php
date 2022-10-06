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
        <div class="col-lg-6  p-4 bg-light justify-content-center">
            <form class="text-center">
                <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="Nombre" class="col-sm-2 col-form-label">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Nombre" placeholder="Noemi" disabled>
                    </div>
                </div>
                <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="sueldoBruto" class="col-sm-2 col-form-label">Sueldo Bruto: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="sueldoBruto" placeholder="Ejemp: 1500.00">
                    </div>
                </div>
                <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="isr" class="col-sm-2 col-form-label">ISR: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="isr" placeholder="Ejemp: 1500.00">
                    </div>
                </div>
                <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="issemym1" class="col-sm-2 col-form-label">ISSEMyM: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="issemym1" placeholder="Ejemp: 1500.00">
                    </div>
                </div>
                <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="issemym2" class="col-sm-2 col-form-label">ISSEMyM: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="issemym2" placeholder="Ejemp: 1500.00">
                    </div>
                </div>
                <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="issemym3" class="col-sm-2 col-form-label">ISSEMyM: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="issemym3" placeholder="Ejemp: 1500.00">
                    </div>
                </div>
                <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="issemym4" class="col-sm-2 col-form-label">ISSEMyM: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="issemym4" placeholder="Ejemp: 1500.00">
                    </div>
                </div>
                <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="issemym5" class="col-sm-2 col-form-label">ISSEMyM: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="issemym5" placeholder="Ejemp: 1500.00">
                    </div>
                </div>
                <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="calculo" class="col-sm-2 col-form-label">Cálculo: </label>
                    <div class="col-sm-10">
                        <label type="number" class="form-control" id="calculo" style="height: 38px;" ></label>
                    </div>  
                </div>
                
                <div class="form-group row my-3">
                    <small class="form-text text-muted">
                        <i>*En caso de no contar con alguna cifra coloque un cero (0)*</i>
                    </small>
                    <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="linea" class="col-sm-2 col-form-label">30% Linea de Crédito: </label>
                    <div class="col-sm-10">
                        <label type="number" class="form-control bg-warning bg-opacity-50" id="linea" style="height: 38px;" ></label>
                    </div>  
                </div>
                <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="poderCred" class="col-sm-2 col-form-label">Poder Crediticio: </label>
                    <div class="col-sm-10">
                        <label type="number" class="form-control bg-warning bg-opacity-50" id="poderCred" style="height: 38px;" ></label>
                    </div> 
                </div>
                </div>
            </form>
        </div>

        <div class="col-lg-6 p-4 bg-light justify-content-center">
            <form class="text-center">
            <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="quincena" class="col-sm-2 col-form-label">QUINCENA: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="quincena" placeholder="a de octubre 15" disabled>
                    </div>
                </div>
                <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="cuota" class="col-sm-2 col-form-label" >CUOTA SUTATESE: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="cuota" placeholder="Ejemp: 1500.00">
                    </div>
                </div>
                <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="cajaAhorro" class="col-sm-2 col-form-label">CAJA DE AHORRO: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="cajaAhorro" placeholder="Ejemp: 1500.00">
                    </div>
                </div>

                <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="descuento1" class="col-sm-2 col-form-label">RESTO DE DESCUENTOS: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="descuento1" placeholder="Ejemp: 1500.00">
                    </div>
                </div>
            
                <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="descuento2" class="col-sm-2 col-form-label">RESTO DE DESCUENTOS: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="descuento2" placeholder="Ejemp: 1500.00">
                    </div>
                </div>
                <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="descuento3" class="col-sm-2 col-form-label">RESTO DE DESCUENTOS: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="descuento3" placeholder="Ejemp: 1500.00">
                    </div>
                </div>

                <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="descuento4" class="col-sm-2 col-form-label">RESTO DE DESCUENTOS: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="descuento4" placeholder="Ejemp: 1500.00">
                    </div>
                </div>
                <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="descuento5" class="col-sm-2 col-form-label">RESTO DE DESCUENTOS: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="descuento5" placeholder="Ejemp: 1500.00">
                    </div>
                </div>
                <div class="form-group row my-3 mx-3 fw-bold">
                    <label for="descuento6" class="col-sm-2 col-form-label">RESTO DE DESCUENTOS: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="descuento6" placeholder="Ejemp: 1500.00" >
                    </div>  
                </div>
                
                <div class="form-group row my-3 mx-3">
                    <small class="form-text text-muted">
                        <i>*En caso de no contar con alguna cifra un cero (0)*</i>
                    </small>
                </div>
            </form>
        </div>
        <div class="text-center my-4 justify-content-center">
            <button type="button" class="btn btn-danger mx-2" onclick=location.href="prestamos.php">
                    Cancelar
                </button>
                <button type="button" class="btn btn-primary mx-2r" id="calcular">
                    Calcular
            </button>
            <!-- <button type="button" class="btn btn-warning mx-2" onclick=location.href="PoderCrediticio.php">
                    Limpiar
            </button> -->
        </div>
    </div>
  



    <script type="text/javascript" src="js/main.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
        integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       

    

</body>
</html>