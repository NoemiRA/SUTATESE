<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">

    <title>SUTATESE - Cantidad a Ahorrar</title>

    <?php include("navbar.php");
    ?>

</head>

<body>
    <div class="container-xl text-center login">
        <!-- <section id="hero">  -->
        <div class="row g-0 h-100">
            <div class="col-lg-6 d-flex">
                <div class="content px-4 my-auto ">
                    <!-- Si se le queita el "my-auto" y se alinea con el titulo de la derecha -->
                    <h2>Aportaciones a la caja de ahorro </h2>
                    <br>
                    <p class="parrafo-aval">
                        1. Las aportaciones a la Caja de Ahorro tendrá 3 orígenes: </p>
                    <p class="parrafo-aval">a) Fondo SUTATESE.
                        Es la aportación del Ahorrador. Se brinda de forma quincenal vía nómina del TESE con un mínimo de $100.00 (cien pesos 00/100 M.N.) y múltiplos de $50.00 (Cincuenta pesos 00/100 M.N). La cantidad recabada a lo largo de las 24 quincenas más el interés generado, será devuelto los primeros diez días del mes de Diciembre después del cierre del ejercicio.</p>

                    <p class="parrafo-aval">b) Fondo Fijo Voluntario SUTATESE.
                        Es una aportación voluntaria y sin plazo de término del AHORRADOR que consiste en un mínimo de 1% del sueldo base quincenal. Solo podrá ser retirado por previa solicitud de baja de la Caja de Ahorro, Separación del TESE o Fallecimiento.</p>

                    <p class="parrafo-aval">c) Fondo Variable INVERSIONISTA
                        Es una opción de ahorro adicional a través de aportaciones extraordinarias que constituyen el Fondo Variable INVERSIONISTA siendo el límite la cantidad necesaria para tener liquidez y poder otorgar préstamos pendientes a los Asociados en los primeros meses de operación de la Caja de Ahorro. Su rendimiento será del 1% mensual y serán reintegrados a los (las) INVERSIONISTAS de acuerdo con el mismo orden de folio y en cuanto dejen de ser necesarios por alcanzar solvencia de la Caja de Ahorro. La cantidad mínima de inversión es de $20,000.00 (Veinte mil pesos 00/100 M.N.) y máxima de $30,000.00 (Treinta mil pesos 00/100 M.N.). </p>

                    <p class="parrafo-aval">El límite de ahorro quincenal (inciso a) será del 30% del sueldo, considerando la suma de los Fondos. </p>
                    <p class="parrafo-aval">
                        Solo se permiten las aportaciones indicadas en este capítulo. </p>
                    <p class="parrafo-aval">
                        Ningún Asociado podrá tener derecho a rendimientos individuales mayores a los otorgados a los demás integrantes en la Caja de Ahorro.
                        Los Fondos de la Caja de Ahorro, no podrán ser utilizados para otro fin que no sea el autorizado por este Reglamento. </p>

                </div>
            </div>
            <div class="col-lg-6 d-flex">
                <div class="content mx-auto px-4 my-auto">
                    <div class="inicio">
                        <h2>Cantidad ahorrar</h2>
                    </div>

                    <div class="col-md-auto">
                        <label for="numEmpleado" class="form-label">Número empleado</label>
                        <input type="number" class="form-control" id="numEmpleado" placeholder="618735621" disabled>
                    </div>
                    <hr>

                    <div class="col-md-auto">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Noemi Ruiz" disabled>
                    </div>
                    <hr>

                    <div class="col mt-4">
                        <div class="col-md-auto">
                            <label for="division" class="form-label">Seleccione un tipo de fondo</label>
                            <select class="form-select" aria-label="Division">
                                <option disabled selected>Fondo de aportaciones</option>
                                <option value="Uno">Fondo SUTATESE</option>
                                <option value="Dos">Fondo Fijo Voluntario SUTATESE</option>
                                <option value="tres">Fondo Variable Inversionista</option> Comentada porque no se si se pone o es aparte

                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-auto">
                        <label for="numEmpleado" class="form-label">Ingrese la cantidad a ahorrar quincenalmente</label>
                        <input type="number" class="form-control" id="numEmpleado" placeholder="Ejemplo: 1500">
                    </div>

                    <div class="text-center my-3">
                        <button type="button" class="btn btn-secondary boton-ingresar" onclick="history.go(-1);">
                            Cancelar
                        </button>
                        <button type="button" class="btn btn-outline-secondary" onclick=location.href="registroCA.php">
                            Continuar
                        </button>
                    </div>

                </div>
            </div>
        </div>
        <!-- </section>  -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>