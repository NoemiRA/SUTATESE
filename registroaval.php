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
    
    <div class="container text-center p-5"> <!-- A -->
        <div class="row align-items-start"> <!-- B -->
            <div class="col-lg-6 mx-1"> <!-- Col 1 -->
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
                    
            </div>  <!--  Cierra: Col 1 -->

            <div class="col-lg-5 tetx center my-1"> <!--  Col 2 -->
                <h2>Préstamo por Aval</h2>
                <div class="row my-2 "> <!--  Q -->
                        <div class="col-md-auto mt-2">
                            <label for="input_monto" class="form-label fw-bold">Cantidad a solicitar</label>    
                            <!-- <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-dollar-sign"></i></span> -->
                            <input type="text" class="form-control" id="input_monto" placeholder="Ejemp: 1500" />
                        </div> 
                        <div class="col-md-auto mt-2">
                            <label for="numEmpleado" class="form-label fw-bold">No. Empleado (Aval)</label>
                            <input type="number" class="form-control" id="numEmpleado" placeholder="No. de empleado del aval">
                        </div>       
                </div> <!--  Cierra: Q -->
                <div class="row my-2"> <!--  Q2 -->
                        <div class="col-md-auto mt-2">
                            <label for="numEmpleado" class="form-label fw-bold">Monto a Pagar</label>
                            <input type="number" class="form-control" id="descuentoQuincenal" placeholder="1500.00" disabled>
                        </div>
                        <div class="col-md-auto mt-2">
                            <label for="input_tasa" class="form-label fw-bold">Interes Mensual</label>
                            <input type="number" class="form-control" id="input_tasa" value="2" disabled>
                            
                        </div>
                        
                </div> <!--  Cierra: Q2 -->
                
                <div class="row my-2"> <!--  Q3 -->
                    <div class="col-md-auto mt-2">
                        <form class="col-md-auto p-0"> 
                                <label for="pago" class="form-label fw-bold">Forma de Pago:</label>
                                <select class="form-control" aria-label="Division">
                                    <option disabled selected>Selecciona forma de pago</option>
                                    <option value="efectivo" >Efectivo</option>
                                    <option value="nomina">Nómina</option>
                                    <option value="banco">Transferencia/Depósito</option>
                                </select>    
                        </form> 
                     </div>   
                     <div class="col-md-auto mt-2">
                        <label for="input_cuotas" class="form-label fw-bold mb-2">Plazo de Pago</label>
                        <input type="number" class="form-control" id="input_cuotas" placeholder="4 quincenas">
                    </div>
                </div> <!--  Cierra: Q3 -->
                <div class="col-md-auto">
                    <label for="formatoPagare" class="form-label fw-bold mt-1">Formato Pagaré</label>
                    <input type="file" class="form-control mt-2 mb-3" id="formatoPagare" placeholder="">
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

            </div> <!--  Cierra: Col 2 -->  
        </div> <!--CIERRA: B -->

        <div class="table-responsive my-4 shadow-lg p-3 mb-5 bg-body rounded"> <!-- C -->
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
        </div> <!--CIERRA: C -->
        <div class="d-flex justify-content-center text-center">
                        <div class="row m-2">
                            <button type="button" class="btn btn-danger boton-ingresar" onclick=location.href="prestamos.php">
                                CANCELAR
                            </button>
                        </div>
                        <div class="row m-2">
                            <button type="button" class="btn btn-primary boton-ingresar" onclick="calcular();" name="calcular">
                                ¡CALCULAR!
                            </button>
                            <?php
                            if (isset($_POST['calcular'])) {
                                echo $_POST['CantidadSolicitada'];
                            }
                            ?>
                        </div>
                        <div class="row m-2">
                            <button type="button" class="btn btn-success boton-ingresar" onclick="alertaPrestamos()">
                                ¡SOLICITAR!
                            </button>
                        </div>

                </div>

    </div> <!--CIERRA: A -->

    

    

    <?php include("footer.php");
    ?>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript" src="js/prestamo.js"></script>
</body>

</html>