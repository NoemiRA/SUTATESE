<?php
session_start();
if (empty($_SESSION['NumEmpleado5'])) {
    header("location: index.php");
}
?>
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

    $poderCrediticio = 1500.00;
    // $poderCrediticio = $_REQUEST["PodCre"];
    // $descuentoQuincenal = 0;
    
    // $poderCrediticio = $_POST["poderCred"];
    // $cantMax = $_POST["cantMax"];

    ?>
</head>



<body onload="plazo();">
    
    <div class="text-center m-5 p-3 rounded">
    <h1 class="m-3 fw-bold">PRÉSTAMO POR NÓMINA</h1>
        <div class="row bg-light">
            <div class="col-lg-5">
                <div class="form-group row mx-3 my-2 d-grid">
                    <label for="description" class="col col-form-label">
                        <strong>Poder crediticio quincenal</strong>
                    </label>
                    <div class="col">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="$ <?php echo $poderCrediticio ?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="form-group row mx-3 my-2 d-grid">
                    <label for="description" class="col col-form-label fw-bold">
                       Cantidad Disponible
                    </label>
                    <div class="col">
                        <input type="text" class="form-control" value="$" disabled>
                    </div>
                </div>
                <div class="form-group row mx-3 my-2 d-grid">
                    <label for="description" class="col col-form-label fw-bold">

                        Interés mensual

                    </label>
                    <div class="col">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="2" disabled id="input_tasa">
                            
                            <span class="input-group-text " id="basic-addon2">
                                <i class="fa-solid fa-percent"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group row mx-3 my-2 d-grid">
                    <label for="description" class="col col-form-label fw-bold">
                        Plazo de máximo a pagar:
                    </label>
                    <div class="col">
                    <input type="text" class="form-control" id="meses" style="height: 38px;" disabled ></input>
                    </div>
                </div>

                <div class="form-group row mx-3 my-2 d-grid">
                    <label for="input_monto" class="col col-form-label fw-bold">
                        Cantidad a solicitar
                    </label>
                    <div class="col">
                        <input type="number" class="form-control" placeholder="Ejemp: 1500.00" name="CantidadSolicitada" id="input_monto">
                    </div>
                </div>

                <div class="form-group row mx-3 my-2 d-grid">
                    <label for="input_cuotas" class="col col-form-label fw-bold">
                        Plazo de pago en quincenas:
                    </label>
                    <div class="col">
                        <input type="number" class="form-control" placeholder="Ejemp: 5" name="CantidadSolicitada" id="input_cuotas">
                    </div>

                      
                    
                    
                    <div class="d-flex justify-content-center">
                        <div class="d-grid m-3">
                            <label for="select_periodo" class="col col-form-label fw-bold">
                            Pago:
                            </label>
                            <select id="select_periodo" style="width: 100%" disabled> 
                                <option value="quincenal" >Quincenal</option>
                            </select>
                        </div>
                        <div class="d-grid m-3">
                            <label for="select_periodo" class="col col-form-label fw-bold">
                                Intereses:
                            </label>
                            <select id="select_tasa_tipo" style="width: 100%" disabled>
                                <option value="mensual" selected="selected" id="select_tasa_tipo">Quincenales</option>
                            </select> 
                        </div>
                    </div>
            </div>   

    <div class="d-flex flex-column mb-3">
                    <div class="row m-3">
                        <button type="button" class="btn btn-danger boton-ingresar" onclick=location.href="prestamos.php">
                            CANCELAR
                        </button>
                    </div>
                    <div class="row m-3">
                        <button type="button" class="btn btn-primary boton-ingresar" onclick="calcular();" name="calcular">
                            ¡CALCULAR!
                        </button>
                        <?php
                        if (isset($_POST['calcular'])) {
                            echo $_POST['CantidadSolicitada'];
                        }
                        ?>
                    </div>
                    <div class="row m-3">
                        <button type="button" class="btn btn-success boton-ingresar" onclick="alertaPrestamos()">
                            ¡SOLICITAR!
                        </button>
                    </div>

                </div>
</div>
            <div class="col-lg-7 ">
                <div class="table-responsive my-4 shadow-lg p-3 mb-5 bg-body rounded">
                        <table id="table-2"  class="table table-bordered " style="width: 100%; text-align: right; border: 1px gray solid; 
                            order-collapse: collapse">
                            <thead class="text-center" style="background-color:#00102E; color: #ffffff;"><tr>
                                <th >Quincena</th>
                                <th>Amortización captial</th>
                                <th>Intereses</th>
                                <th>Abonos</th>
                                <th>Saldos</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_1" class="text-center">

                            </tbody>
                        </table>
                </div>
        </div>
    </div>
</div>

   
        </div>

    <?php include("footer.php");
    ?>
            

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script type="text/javascript" src="js/plazo.js"></script>
            <!-- <script type="text/javascript" src="js/main.js"></script> -->
            <script type="text/javascript" src="js/app.js"></script>
            <script type="text/javascript" src="js/prestamo.js"></script>
            
            



</body>

</html>