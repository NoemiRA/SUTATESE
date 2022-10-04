<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>SUTATESE - Prestamo Caja de Ahorro</title>
   

    <?php include("navbar.php");
    ?>

</head>

<body>
    <h1 class=" fw-bold text-center mx-5 my-5">PRÉSTAMO POR CAJA DE AHORRO</h1>
 <section class="login"> 
<div class="container-xl">
    <div class="row g-5 h-100">
        <form class="col-lg-6 d-flex p-0">
                <div class="col d-flex text-center">
                    <label for="CantidadDisp" class="form-label fw-bold mx-2 mt-2 fs-5" style="width:100%;">Cantidad Disponible</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-dollar-sign"></i></span>
                        <input type="number" class="form-control " id="CantidadDisp" placeholder="17892" disabled >
                    </div>
                </div>
        </form>

        <div class="col d-flex text-center p-0">
            <label for="CantidadSolicitar" class="form-label fw-bold mx-2 mt-2 fs-5" style="width:100%;">Cantidad a Solicitar</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-dollar-sign"></i></span>
                <input type="text" class="form-control" id="CantidadSolicitar" placeholder="Ejemp: 1500" />
            </div>
        </div>
    </div>
    <br><br>
</div>

<form>
    <div class="col d-grid text-center">
        <label for="division" class="form-label text-center fw-bold fs-5 mb-3"">Forma de Pago</label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon2"><i class="fa-regular fa-credit-card"></i></i></span> 
            <select class="form-select" aria-label="Division" >
                <option disabled selected class="text-center">Selecciona tu forma de pago</option>
                <option value="nomina" class="text-center">Pago por vía: Nómina</option>
                <option value="efectivo" class="text-center">Pago por vía: Efectivo</option>
                <option value="banco" class="text-center">Pago por vía: Transferencia/Depósito</option>
            </select>
        </div>
    </div>
</form>
<br><br><br>
 </section> 
 <div class="col-lg text-center">
    <button type="button" class="btn btn-primary mx-5 text-center" style="width: 25%; height: 75px;" onclick=location.href="prestamos.php">
        Cancelar
    </button>
    <button type="button" class="btn btn-primary mx-5 text-center" style="width: 25%; height: 75px;" onclick="alertaPrestamos()">
        Solicitar Préstamo
    </button>
</div>

 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/app.js" ></script> 
</body>
</html>