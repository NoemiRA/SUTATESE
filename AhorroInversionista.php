<?php
session_start();
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

    <title>SUTATESE - Fondo Variable Inversionista</title>

    <?php include("navbar.php");
    ?>

</head>

<body>
    <div class="container-xl text-center login">
        <!-- <section id="hero">  -->
        <div class="row g-0 h-100">
            <div class="col-lg-6 d-flex">
                <div class="content px-4 my-auto">
                    <!-- Si se le queita el "my-auto" y se alinea con el titulo de la derecha -->
                    <h2>Fodo Variable Inversionista </h2>
                    <p class="parrafo-aval"> El Fondo Variable INVERSIONISTA.
                        Es una opción de ahorro adicional a través de aportaciones extraordinarias que constituyen el Fondo Variable INVERSIONISTA siendo el límite la cantidad necesaria para tener liquidez y poder otorgar préstamos pendientes a los Asociados en los primeros meses de operación de la Caja de Ahorro. Su rendimiento será del 1% mensual y serán reintegrados a los (las) INVERSIONISTAS de acuerdo con el mismo orden de folio y en cuanto dejen de ser necesarios por alcanzar solvencia de la Caja de Ahorro. La cantidad mínima de inversión es de $20,000.00 (Veinte mil pesos 00/100 M.N.) y máxima de $30,000.00 (Treinta mil pesos 00/100 M.N.).</p>
                </div>
            </div>

            <div class="col-lg-6 d-flex align-content-start">
                <div class="content mx-auto px-4 my-auto">
                    <div class="content px-4 my-auto ">
                        <div class="inicio">
                            <h2>Cantidad de inversión</h2>
                        </div>

                        <div class="col-md-auto">
                            <label for="numEmpleado" class="form-label">Número empleado</label>
                            <input type="number" class="form-control" id="numEmpleado" placeholder="618735621" disabled>
                        </div>
                        <hr>

                        <div class="col-md-auto">
                            <label for="nombre" class="form-label">Tipo de inversión:</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Fondo Variable INVERSIONISTA" disabled>
                        </div>

                        <hr>
                        <div class="col-md-auto">
                            <label for="numEmpleado" class="form-label">Ingrese una cantidad de inversión entre 20 y 30 mil pesos</label>
                            <input type="number" class="form-control" id="numEmpleado" placeholder="Ejemplo: 23500">
                        </div>
                        <hr>
                        <div class="col-md-auto">
                            <p for="numEmpleado" class="form-label">¿Deseas aparte de la inversión ahorrar en la caja de ahorro?</p>
                            <input name="checFVI" type="checkbox" id="checFVI" onChange="inversion();" />
                            <label for="chec" class="form-label m-0">Sí, deseo ahorrar</label>
                        </div>
                    </div>
                    <div class="col mt-4">
                        <div class="inicio">
                            <h2>Cantidad a ahorrar</h2>
                        </div>
                        <div class="col-md-auto">
                            <label for="division" class="form-label">Seleccione un tipo de fondo</label>
                            <select class="form-select" id="tipoFondo" aria-label="Division" disabled>
                                <option disabled selected>Fondo de aportaciones</option>
                                <option value="Uno">Fondo SUTATESE</option>
                                <option value="Dos">Fondo Fijo Voluntario SUTATESE</option>

                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-auto">
                        <label for="numEmpleado" class="form-label">Ingrese la cantidad a ahorrar quincenalmente</label>
                        <input type="number" class="form-control" id="ahorroQuincenalFVI" disabled placeholder="Ejemplo: 1500">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center my-3">
        <button type="button" class="btn btn-secondary boton-ingresar" onclick="history.go(-1);">
            Cancelar
        </button>
        <button type="button" class="btn btn-outline-secondary" onclick=location.href="registroInversionista.php">
            Continuar
        </button>
    </div>

    <?php include("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>
</html>