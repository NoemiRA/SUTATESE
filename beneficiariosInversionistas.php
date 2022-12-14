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

    <title>SUTATESE - Beneficiarios Inversionistas</title>
    <?php include("navbar.php");
    ?>

</head>

<body>
    <h2 class="p-2 text-center mt-4"><strong>BENEFICIARIOS INVERSIONISTAS</strong></h2>
    <div class="row g-0 h-50 p-3">
        <div class="col-lg-6 d-flex">
            <div class="content px-3 my-auto">
                <h6><i>En caso de que el docente o administrativo y agremiado a la Caja de Ahorro se encuentre ausente.</i></h6>

                <form class="row g-3 m-2">
                    <h2>Beneficiario 1</h2>
                    <div class="col-md-4">
                        <label for="nombre1" class="form-label">Nombre(s)</label>
                        <input type="text" class="form-control" id="nombre1" placeholder="Nombre de Beneficiario 1" />
                    </div>
                    <div class="col-md-4">
                        <label for="apellidoPaterno1" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" id="apellidoPaterno1" placeholder="Apellido Paterno de Beneficiario 1" />
                    </div>
                    <div class="col-md-4">
                        <label for="apellidoMaterno1" class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" id="apellidoMaterno1" placeholder="Apellido Materno de Beneficiario 1" />
                    </div>
                </form>

                <form class="row g-3 m-2">
                    <div class="col-md-4">
                        <label for="telefono1" class="form-label">Tel??fono</label>
                        <input type="text" class="form-control" id="telefono1" placeholder="55-5555-5555" />
                    </div>
                    <div class="col-md-5">
                        <label for="correo1" class="form-label">correo electr??nico</label>
                        <input type="email" class="form-control" id="correo1" placeholder="example@email.com" />
                    </div>
                    <div class="col-md-3">
                        <label for="porcentaje1" class="form-label">Porcentaje</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="porcentaje1" placeholder="Seleccione el procentaje para el Beneficiario" />
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
                </form>

                <hr>

                <form class="row g-3 m-2">
                    <h2>Beneficiario 2</h2>
                    <div class="col-md-4">
                        <label for="nombre2" class="form-label">Nombre(s)</label>
                        <input type="text" class="form-control" id="nombre2" placeholder="Nombre de Beneficiario 2" />
                    </div>
                    <div class="col-md-4">
                        <label for="apellidoPaterno2" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" id="apellidoPaterno2" placeholder="Apellido Paterno de Beneficiario 2" />
                    </div>
                    <div class="col-md-4">
                        <label for="apellidoMaterno2" class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" id="apellidoMaterno2" placeholder="Apellido Materno de Beneficiario 2" />
                    </div>
                </form>

                <form class="row g-3 m-2">
                    <div class="col-md-4">
                        <label for="telefono2" class="form-label">Tel??fono</label>
                        <input type="text" class="form-control" id="telefono2" placeholder="55-5555-5555" />
                    </div>
                    <div class="col-md-5">
                        <label for="correo2" class="form-label">correo electr??nico</label>
                        <input type="email" class="form-control" id="correo2" placeholder="example@email.com" />
                    </div>
                    <div class="col-md-3">
                        <label for="porcentaje2" class="form-label">Porcentaje</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="porcentaje2" placeholder="Seleccione el procentaje para el Beneficiario" />
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
                </form>

                <hr>

                <form class="row g-3 m-2">
                    <h2>Beneficiario 3</h2>
                    <div class="col-md-4">
                        <label for="nombre3" class="form-label">Nombre(s)</label>
                        <input type="text" class="form-control" id="nombre3" placeholder="Nombre de Beneficiario 1" />
                    </div>
                    <div class="col-md-4">
                        <label for="apellidoPaterno3" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" id="apellidoPaterno3" placeholder="Apellido Paterno de Beneficiario 3" />
                    </div>
                    <div class="col-md-4">
                        <label for="apellidoMaterno3" class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" id="apellidoMaterno3" placeholder="Apellido Materno de Beneficiario 3" />
                    </div>
                </form>

                <form class="row g-3 m-2">
                    <div class="col-md-4">
                        <label for="telefono3" class="form-label">Tel??fono</label>
                        <input type="text" class="form-control" id="telefono3" placeholder="55-5555-5555" />
                    </div>
                    <div class="col-md-5">
                        <label for="correo3" class="form-label">correo electr??nico</label>
                        <input type="email" class="form-control" id="correo3" placeholder="example@email.com" />
                    </div>
                    <div class="col-md-3">
                        <label for="porcentaje3" class="form-label">Porcentaje</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="porcentaje3" placeholder="Seleccione el procentaje para el Beneficiario" />
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
                </form>
                <hr>
            </div>
        </div>

        <div class="col-lg-6 d-flex bg-light">
            <div class="content px-3 my-auto">
                <h6><i>En caso de que el docente o administrativo y agremiado a la Caja de Ahorro fallezca.</i></h6>

                <form class="row g-3 m-2">
                    <h2>Beneficiario 1</h2>
                    <div class="col-md-4">
                        <label for="nombre1" class="form-label">Nombre(s)</label>
                        <input type="text" class="form-control" id="nombre1" placeholder="Nombre de Beneficiario 1" />
                    </div>
                    <div class="col-md-4">
                        <label for="apellidoPaterno1" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" id="apellidoPaterno1" placeholder="Apellido Paterno de Beneficiario 1" />
                    </div>
                    <div class="col-md-4">
                        <label for="apellidoMaterno1" class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" id="apellidoMaterno1" placeholder="Apellido Materno de Beneficiario 1" />
                    </div>
                </form>

                <form class="row g-3 m-2">
                    <div class="col-md-4">
                        <label for="telefono1" class="form-label">Tel??fono</label>
                        <input type="text" class="form-control" id="telefono1" placeholder="55-5555-5555" />
                    </div>
                    <div class="col-md-5">
                        <label for="correo1" class="form-label">correo electr??nico</label>
                        <input type="email" class="form-control" id="correo1" placeholder="example@email.com" />
                    </div>
                    <div class="col-md-3">
                        <label for="porcentaje1" class="form-label">Porcentaje</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="porcentaje1" placeholder="Seleccione el procentaje para el Beneficiario" />
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
                </form>
                <hr>
                
                <form class="row g-3 m-2">
                    <h2>Beneficiario 2</h2>
                    <div class="col-md-4">
                        <label for="nombre2" class="form-label">Nombre(s)</label>
                        <input type="text" class="form-control" id="nombre2" placeholder="Nombre de Beneficiario 2" />
                    </div>
                    <div class="col-md-4">
                        <label for="apellidoPaterno2" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" id="apellidoPaterno2" placeholder="Apellido Paterno de Beneficiario 2" />
                    </div>
                    <div class="col-md-4">
                        <label for="apellidoMaterno2" class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" id="apellidoMaterno2" placeholder="Apellido Materno de Beneficiario 2" />
                    </div>
                </form>

                <form class="row g-3 m-2">
                    <div class="col-md-4">
                        <label for="telefono2" class="form-label">Tel??fono</label>
                        <input type="text" class="form-control" id="telefono2" placeholder="55-5555-5555" />
                    </div>
                    <div class="col-md-5">
                        <label for="correo2" class="form-label">correo electr??nico</label>
                        <input type="email" class="form-control" id="correo2" placeholder="example@email.com" />
                    </div>
                    <div class="col-md-3">
                        <label for="porcentaje2" class="form-label">Porcentaje</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="porcentaje2" placeholder="Seleccione el procentaje para el Beneficiario" />
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
                </form>
                <hr>

                <form class="row g-3 m-2">
                    <h2>Beneficiario 3</h2>
                    <div class="col-md-4">
                        <label for="nombre3" class="form-label">Nombre(s)</label>
                        <input type="text" class="form-control" id="nombre3" placeholder="Nombre de Beneficiario 1" />
                    </div>
                    <div class="col-md-4">
                        <label for="apellidoPaterno3" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" id="apellidoPaterno3" placeholder="Apellido Paterno de Beneficiario 3" />
                    </div>
                    <div class="col-md-4">
                        <label for="apellidoMaterno3" class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" id="apellidoMaterno3" placeholder="Apellido Materno de Beneficiario 3" />
                    </div>
                </form>

                <form class="row g-3 m-2">
                    <div class="col-md-4">
                        <label for="telefono3" class="form-label">Tel??fono</label>
                        <input type="text" class="form-control" id="telefono3" placeholder="55-5555-5555" />
                    </div>
                    <div class="col-md-5">
                        <label for="correo3" class="form-label">correo electr??nico</label>
                        <input type="email" class="form-control" id="correo3" placeholder="example@email.com" />
                    </div>
                    <div class="col-md-3">
                        <label for="porcentaje3" class="form-label">Porcentaje</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="porcentaje3" placeholder="Seleccione el procentaje para el Beneficiario" />
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
                </form>

                <hr>

            </div>
        </div>
    </div>
    <div class="text-center mb-3">
        <button type="button" class="btn btn-secondary boton-ingresar" onclick="history.go(-1);">
            Cancelar
        </button>
        <button type="button" class="btn btn-outline-secondary" onclick=location.href="AhorroInversionista.php">
            Continuar
        </button>
    </div>
    <?php include("footer.php");
    ?>

    <!-- </section>  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/app.js"></script>
</body>

</html>