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
                            <label for="CantidadSolicitar" class="form-label fw-bold">Cantidad a solicitar</label>    
                            <!-- <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-dollar-sign"></i></span> -->
                            <input type="text" class="form-control" id="CantidadSolicitar" placeholder="Ejemp: 1500" />
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
                            <label for="numEmpleado" class="form-label fw-bold">Interes Quincenal</label>
                            <input type="number" class="form-control" id="intQuincenal" placeholder="2% Quincenal" disabled>
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
                        <label for="numEmpleado" class="form-label fw-bold mb-2">Plazo de Pago</label>
                        <input type="number" class="form-control" id="plazoPAgo" placeholder="4 quincenas">
                    </div>
                </div> <!--  Cierra: Q3 -->
                <div class="col-md-auto">
                    <label for="formatoPagare" class="form-label fw-bold mt-1">Formato Pagaré</label>
                    <input type="file" class="form-control mt-2 mb-3" id="formatoPagare" placeholder="">
                </div>

                <div class="d-flex">
                    <button type="button" class="btn btn-primary d-block mx-auto my-4" onclick=location.href="prestamos.php">CANCELAR</button>
                    <button type="button" class="btn btn-primary d-block mx-auto my-4" onclick=location.href="prestamos.php">ACEPTAR</button>
                </div> 

            </div> <!--  Cierra: Col 2 -->  
        </div> <!--CIERRA: B -->

        <div class="table-responsive my-4"> <!-- C -->
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
        </div> <!--CIERRA: C -->

    </div> <!--CIERRA: A -->

    

    

    <?php include("footer.php");
    ?>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>