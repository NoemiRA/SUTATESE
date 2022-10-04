<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>SUTATESE - Prestamo Nómina</title>

    <?php include("navbar.php");
    $poderCrediticio = 1481.06;
    $descuentoQuincenal = 0;
    
    ?>
</head>

<body>
    <div class="text-center m-5 p-3 rounded">
        <div class="row bg-light">
            <h1 class="m-3">PRÉSTAMO VÍA NÓMINA</h1>
            <div class="col-lg-5">
                <div class="form-group row m-3">
                    <label for="description" class="col col-form-label">
                        <strong>Poder crediticio quincenal</strong>
                    </label>
                    <div class="col">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="$ <?php echo $poderCrediticio ?>"  disabled>
                            <div class="input-group-append">
                                <button class="btn" type="button" title="¡Conoce más sobre tu poder crediticio!" onclick=location.href="#"><i class="fa-solid fa-circle-info"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row m-3">
                    <label for="description" class="col col-form-label">
                        Cantidad a solicitar
                    </label>
                    <div class="col">
                        <input type="number" class="form-control" placeholder="Ejemp: $1500.00" name="CantidadSolicitada" id="CantidadSolicitada">
                        
                    </div>
                </div>
                <div class="form-group row m-3">
                    <label for="description" class="col col-form-label">
                        Descuento quincenal
                    </label>
                    <div class="col">
                        <input type="text" class="form-control" value="$" disabled>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="form-group row m-3">
                    <label for="description" class="col col-form-label">
                        Plazo de pago
                    </label>
                    <div class="col">
                        <input type="text" class="form-control" value="4 quincenas" disabled>
                    </div>
                </div>
                <div class="form-group row m-3">
                    <label for="description" class="col col-form-label">
                        Interés anual
                    </label>
                    <div class="col">
                        <input type="text" class="form-control" value="4%" disabled>
                    </div>
                </div>
                <div class="form-group row m-3">
                    <label for="description" class="col col-form-label">
                        Interés quincenal
                    </label>
                    <div class="col">
                        <input type="text" class="form-control" value="1%" disabled>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="row m-3">
                    <button type="button" class="btn btn-primary boton-ingresar" onclick=location.href="index.php" name="calcular">
                        ¡CALCULAR!
                    </button>
                    <?php
                        if(isset($_POST['calcular'])){
                            echo $_POST['CantidadSolicitada'];
                        }
                    ?>
                </div>
                <div class="row m-3">
                    <button type="button" class="btn btn-success boton-ingresar" onclick="alertaPrestamo()">
                        ¡SOLICITAR!
                    </button>
                </div>
                <div class="row m-3">
                    <button type="button" class="btn btn-danger boton-ingresar" onclick=location.href="prestamos.php">
                        CANCELAR
                    </button>
                </div>
            </div>
        </div>
        <div class="m-5">
            <table class="table table-sm">
                <thead>
                    <tr>
                    <th scope="col">Quincenas</th>
                    <th scope="col">Amortización capital</th>
                    <th scope="col">Intereses</th>
                    <th scope="col">Abonos</th>
                    <th scope="col">Saldos</th>                
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>10000.00<strong></td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>$955.82</td>
                        <td>$100.00</td>
                        <td>$1055.82</td>
                        <td>9044.18</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>$965.38</td>
                        <td>$90.44</td>
                        <td>$1055.82</td>
                        <td>8078.80</td>
                    </tr>
                    <tr>
                    
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
        integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
         <script type="text/javascript" src="js/app.js" ></script>  

   

        </body>
</html>