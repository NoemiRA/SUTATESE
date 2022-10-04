<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>SUTATESE-Registro Nomina</title>

    <?php include("navbar.php");
    ?>
</head>

<body>
    <!-- <section id="hero"> Si se quita este hero se hace pequeña la pagina de abajo -->
    <div class="row g-0 w-50 mx-auto mt-3">
        <div class="text-center">
            <h1>REGISTRO NÓMINA</h1>
            <label for="reciboNomina" class="form-label ">Último recibo de nómina (PDF):</label>
            <input type="file" class="form-control sm-2" id="reciboNomina" placeholder="Ingresa recibo de nómina">
            <label for="credencial" class="form-label m-3">Credencial (PDF):</label>
            <input type="file" class="form-control sm-2" id="credencial" placeholder="Ingresa credencial">
        </div>
    </div>
    <div class="row g-0 h-50 p-5">
        <div class="col-lg-6 d-flex bg-light p-4">
            <form class="text-center">
                <h3 class="p-3">PERCEPCIONES</h3>
                <div class="form-group row my-3 mx-3">
                    <label for="horasClase" class="col-sm-2 col-form-label">P003: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="horasClase" placeholder="HORAS CLASE">
                    </div>
                </div>
                <div class="form-group row my-3 mx-3">
                    <label for="materialDidactico" class="col-sm-2 col-form-label">P039: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="materialDidactico" placeholder="MATERIAL DIDÁCTICO">
                    </div>
                </div>
                <div class="form-group row my-3 mx-3">
                    <label for="despensaHoras" class="col-sm-2 col-form-label">P094: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="despensaHoras" placeholder="DESPENSA HORAS CLASE">
                    </div>
                </div>
                <div class="form-group row my-3 mx-3">
                    <label for="primaAntiguedad" class="col-sm-2 col-form-label">P099: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="primaAntiguedad" placeholder="PRIMA DE ANTIGÜEDAD">
                    </div>
                    <small class="form-text text-muted">
                        <i>*En caso de no contar con prima de antigüedad, seleccione la siguiente opción*</i>
                    </small>
                    <div class="custom-control custom-checkbox my-2 mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                        <label class="custom-control-label" for="primaAntiguedad">No cuento aún</label>
                    </div>
                </div>
                <div class="form-group row my-3 mx-3">
                    <label for="estudiosSuperiores" class="col-sm-4 col-form-label">ESTUDIOS SUPERIORES: </label>
                    <div class="col-sm-4">
                        <select id="estudiosSuperiores" class="form-control">
                            <option selected>Elige una opción...</option>
                            <option>P054 MAESTRÍA</option>
                            <option>P053 DOCTORADO</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="inputEmail3" placeholder="CANTIDAD">
                    </div>
                    <small class="form-text text-muted">
                        <i>*En caso de no contar con estudios superiores, seleccione la siguiente opción*</i>
                    </small>
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="estudiosSuperiores">
                        <label class="custom-control-label" for="estudiosSuperiores">No cuento aún</label>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-6 d-flex p-4">
            <form class="text-center">
                <h3 class="p-3">DEDUCCIONES</h3>
                <div class="form-group row my-3 mx-3">
                    <label for="isr" class="col-sm-2 col-form-label">D001: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="isr" placeholder="ISR">
                    </div>
                </div>
                <div class="form-group row my-3 mx-3">
                    <label for="svI" class="col-sm-2 col-form-label">D050: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="svI" placeholder="SEGURO DE VIDA ISSEMyM">
                    </div>
                </div>
                <div class="form-group row my-3 mx-3">
                    <label for="cuotaS" class="col-sm-2 col-form-label">D056: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="cuotaS" placeholder="Cuota SUTATESE">
                    </div>
                </div>
                <div class="form-group row my-3 mx-3">
                    <label for="pensionhc" class="col-sm-2 col-form-label">D091: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="pensionhc" placeholder="ISSEMyM Pensión Horas Clase">
                    </div>
                </div>
                <div class="form-group row my-3 mx-3">
                    <label for="Issh" class="col-sm-2 col-form-label">D188: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="Issh" placeholder="ISSEMyM Servicio Salud Horas">
                    </div>
                </div>
                <div class="form-group row my-3 mx-3">
                    <label for="Ihc" class="col-sm-2 col-form-label">D194: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="Ihc" placeholder="S.C.I. ISSEMyM Horas clase">
                    </div>
                </div>
                <div class="form-group row my-3 mx-3">
                    <label for="I" class="col-sm-2 col-form-label">D000: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="I" placeholder="ISSEMyM">
                    </div>
                </div>
                <div class="form-group row my-3 mx-3">
                    <label for="ISSEMyM" class="col-sm-2 col-form-label">D000: </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="ISSEMyM" placeholder="ISSEMyM">
                    </div>
                    <small class="form-text text-muted">
                        <i>*En caso de no contar con la opcion, seleccione la siguiente opción*</i>
                    </small>
                    <div class="custom-control custom-checkbox my-2 mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="ISSEMyM">
                        <label class="custom-control-label" for="ISSEMyM">No cuento aún</label>
                    </div>
                </div>
            </form>
        </div>
        <div class="text-center my-4">
            <button type="button" class="btn btn-secondary boton-ingresar" onclick=location.href="index.php">
                    Cancelar
                </button>
                <button type="button" class="btn btn-outline-secondary" onclick=location.href="registroNomina.php">
                    Continuar
            </button>
        </div>
    </div>
    <!-- </section> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>