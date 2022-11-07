<?php
session_start();
include('conexion.php');

if (empty($_SESSION['NumEmpleado5'])) {
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>SUTATESE - Fondo Variable Inversionista</title>

    <?php include("navbar.php");
    ?>

</head>

<body>

    <?php
    if (isset($_SESSION['NumEmpleado5'])) {
        $NumEmpleado = $_SESSION['NumEmpleado5'];
    ?>

        <div class="container-xl text-center login">
            <form class="row g-3 mt-3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="col-lg-6 d-flex">
                    <div class="content px-4 my-auto">
                        <h2>Fodo Variable Inversionista </h2>
                        <p class="parrafo-aval"> Es una opción de ahorro adicional a través de aportaciones extraordinarias que
                            constituyen el Fondo Variable INVERSIONISTA siendo el límite la cantidad necesaria para tener liquidez
                            y poder otorgar préstamos pendientes a los Asociados en los primeros meses de operación de la Caja de
                            Ahorro. Su rendimiento será del 1% mensual y serán reintegrados a los (las) INVERSIONISTAS de acuerdo
                            con el mismo orden de folio y en cuanto dejen de ser necesarios por alcanzar solvencia de la Caja de
                            Ahorro. <br><b>La cantidad mínima de inversión es de $20,000.00 (Veinte mil pesos 00/100 M.N.) y máxima de
                                $30,000.00 (Treinta mil pesos 00/100 M.N.).</b></p>
                    </div>
                </div>

                <div class="col-lg-6 d-flex align-content-start">
                    <div class="content mx-auto px-4 my-auto">
                        <div class="content px-4 my-auto ">
                            <div class="inicio">
                                <h2>Cantidad de inversión</h2>
                            </div>

                            <div class="row my-4">
                                <div class="col-md-auto">
                                    <label for="numEmpleado" class="form-label">Número empleado</label>
                                    <input type="number" class="form-control" name="numEmpleado" value="<?php echo $NumEmpleado ?>" disabled>
                                </div>

                                <div class="col-md-auto">
                                    <label for="nombre" class="form-label">Tipo de inversión:</label>
                                    <input type="text" class="form-control" id="nombre" placeholder="Fondo Variable INVERSIONISTA" disabled>
                                </div>
                            </div>

                            <div class="col-md-auto">
                                <label for="investment" class="form-label">Ingrese cantidad de inversión</label>
                                <input type="number" class="form-control" min ="20000" max="30000" name="investment" placeholder="Ejemplo: 23500">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center my-3">
                    <button type="button" class="btn btn-secondary boton-ingresar" onclick=location.href="registroInversionista.php">
                        Cancelar
                    </button>
                    <input type="submit" class="btn" name="Insert" value="Continuar"></input>
                </div>
            </form>
            <?php

            function alertdata(){
                echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, ingrese correctamente los valores!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                then(function(result){
                });
                </script>';
            }

            function alertsuccess(){
                echo '<script> Swal.fire({icon: "success", title: "Datos Ingresados", text: "¡Los datos han sido registrados, puede pasar a la siguiente etapa!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                    then(function(result){
                        if(result.value){                   
                            window.location = "registroInversionista.php";
                        }
                    });
                    </script>';
            }
            function alerterror(){
                echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, intente más tarde!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                    then(function(result){
                        if(result.value){                   
                        }
                    });
                    </script>';
            }

                if (isset($_POST['Insert'])) {
                    $investment = $_POST['investment'];

                    if(empty($investment)){
                        alertdata();
                    }else{
                        $insert = $conn->query("CALL insert_investment('$NumEmpleado',$investment)");
                        if($insert === true){
                            alertsuccess();
                        }else{
                            alerterror();
                        }
                        
                    }
                }
            ?>
        </div>

    <?php
    }
    include("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>

</html>