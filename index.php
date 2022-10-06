<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">

    <title>SUTATESE</title>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">

            <div class="d-flex navbar-color">
                <img src="resources\SUTATESE.png" class="me-3 mx-2" alt="" width="60" height="80">
                <div class="my-auto">
                    <p class="fw-bold mb-0 ">SUTATESE</p>
                    <small>Sindicato Único de Trabajadores Académicos del Tecnológico de Estudios Superiores de Ecatepec</small>
                </div>
            </div>
        </div>
    </nav>

</head>

<body>

    <div class="container-xl text-center login">
        <div class="row g-0 h-50">
            <div class="col-lg-6">
                <div class="content mx-auto px-4 my-auto">
                    <div class="inicio">
                        <img src="resources\SUTATESE.png">
                        <h2>INICIAR SESIÓN</h2>
                    </div>
                    <div class="col mt-4">
                        <label for="correo" class="form-label">Correo:</label>
                        <input type="email" class="form-control" id="correo" placeholder="correo@example.com">
                    </div>

                    <div class="col mt-4">
                        <label for="contraseña" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" id="contraseña" placeholder="Contraseña">
                    </div>

                    <button type="button" class="btn btn-primary d-block mx-auto my-4" onclick=location.href="inicio.php">INGRESAR</button>

                    <hr>
                    <h3>Registrarse</h3>
                    <div class="d-flex">
                        <button type="button" class="btn btn-primary d-block mx-1 my-4" style="width: 100%; height: 100%" onclick=location.href="registro.php">Docente</button>
                        <button type="button" class="btn btn-primary d-block mx-1 my-4" style="width: 100%; height: 100%" onclick=location.href="registro.php">Administrativo</button>
                    </div>
                    <div class="inicio">
                        <a href="#" class=" mx-auto px-4 my-auto">¿Olvidaste tu contraseña?</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 d-flex">
                <div class="content px-4 my-auto">
                    <img src="resources\INICIO.jpeg" width="100%" height="100%">
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>