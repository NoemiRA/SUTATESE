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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <title>SUTATESE-Registro</title>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <div class="d-flex navbar-color">
                <img src="resources\SUTATESE.png" class="me-3 mx-2" alt="" width="60" height="80" />
                <div class="my-auto">
                    <p class="fw-bold mb-0">SUTATESE</p>
                    <small>Sindicato Único de Trabajadores Académicos del Tecnológico de
                        Estudios Superiores de Ecatepec</small>
                </div>
            </div>
        </div>
    </nav>
</head>

<body>
    <div class="container-xl text-center login">
        <div style="text-align: center; margin-top: 2%">
            <img src="resources\Logo.jpg" class="img-thumbnail" alt="..." width="140" height="140" />
            <h1>REGISTRATE</h1>
        </div>

        <form class="row g-3 mt-3">
            <h3>Datos personales</h3>
            <div class="col-md-2">
                <label for="numEmpleado" class="form-label">No. empleado</label>
                <input type="number" class="form-control" id="numEmpleado" placeholder="Ingresa tu número de empleado" />
            </div>
            <div class="col-md-4">
                <label for="nombre" class="form-label">Nombre(s)</label>
                <input type="text" class="form-control" id="nombre" placeholder="Ingresa tu nombre(s)" />
            </div>
            <div class="col-md-3">
                <label for="apellidoPaterno" class="form-label">Apellido paterno</label>
                <input type="text" class="form-control" id="apellidoPaterno" placeholder="Ingresa tu primer apellido" />
            </div>

            <div class="col-md-3">
                <label for="apellidoMaterno" class="form-label">Apellido materno</label>
                <input type="text" class="form-control" id="apellidoMaterno" placeholder="Ingresa tu segundo apellido" />
            </div>
        </form>
        <form class="row g-3 mt-3">
            <div class="col-md-3">
                <label for="fechaNacimiento" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="fechaNacimiento" placeholder="Ingresa tu fecha de nacimiento" />
            </div>
            <div class="col-md-3">
                <label for="curp" class="form-label">CURP</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="curp" placeholder="Ingresa tu CURP" />

                    <span class="input-group-text" id="basic-addon2"><abbr title="Click para conocer su CURP"><a class="m-0" href="https://www.gob.mx/curp/" target="_blank"><i class="fa-solid fa-circle-info"></i></a></span>
                    </abbr>
                </div>
            </div>
            <div class="col-md-3">
                <label for="rfc" class="form-label">RFC (con homoclave)</label>
                <input type="text" class="form-control" id="rfc" placeholder="Ingresa tu RFC" />
            </div>
            <div class="col-md-3">
                <label for="fechaIngreso" class="form-label">Ingreso al TESE</label>
                <input type="date" class="form-control" id="fechaIngreso" placeholder="Ingresa tu fecha de ingreso al TESE" />
            </div>
        </form>
        <form class="row g-3 mt-3">
            <div class="col">
                <label for="correo" class="form-label">Correo electrónico personal</label>
                <input type="text" class="form-control" id="correo" placeholder="correo@example.com" />
            </div>
            <div class="col-md-auto">
                <label for="celular" class="form-label">Teléfono móvil</label>
                <input type="text" class="form-control" id="celular" placeholder="Ingresa tu número celular" />
            </div>
            <div class="col-md-auto">
                <label for="telefono" class="form-label">Teléfono fijo</label>
                <input type="text" class="form-control" id="telefono" placeholder="Ingresa tu número fijo" />
            </div>

        </form>
        <hr />

        <form class="row g-3 mt-3">
            <h3>Dirección / Domicilio</h3>
            <div class="col">
                <label for="calle" class="form-label">Calle</label>
                <input type="text" class="form-control" id="calle" placeholder="Ingresa Calle" />
            </div>

            <div class="col-md-auto">
                <label for="numero" class="form-label">Número</label>
                <input type="text" class="form-control" id="numero" placeholder="Ingresa Número" />
            </div>

            <div class="col">
                <label for="delegacion" class="form-label">Delegación / municipio</label>
                <input type="text" class="form-control" id="delegacion" placeholder="Ingresa Delegación / Municipio" />
            </div>
        </form>
        <form class="row g-3 mt-3">
            <div class="col-md-5">
                <label for="colonia" class="form-label">Colonia</label>
                <input type="text" class="form-control" id="colonia" placeholder="Ingresa Colonia" />
            </div>
            <div class="col-md-5">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" class="form-control" id="estado" placeholder="Ingresa Estado" />
            </div>
            <div class="col-md-2">
                <label for="cp" class="form-label">C.P.</label>
                <input type="text" class="form-control" id="cp" placeholder="Ingresa Código Postal" />
            </div>
        </form>
        <hr />

        <form class="row g-3 mt-3">
            <h3>Docente / Administrativo</h3>
            <div class="col-md-4">
                <label for="division" class="form-label">División</label>
                <select class="form-select" aria-label="Division">
                    <option disabled selected>Selecciona tu división</option>
                    <option value="Uno">Aeronáutica</option>
                    <option value="Dos">Bioquímica</option>
                    <option value="tres">Contaduría</option>
                    <option value="Cuatro">Electrónica</option>
                    <option value="Cinco">Gestión Empresarial</option>
                    <option value="Seis">Industrial</option>
                    <option value="Siete">Informática</option>
                    <option value="Ocho">Mecánica</option>
                    <option value="Nueve">Mecatrónica</option>
                    <option value="Diez">Química</option>
                    <option value="Once">Sistemas Computacionales</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="experiencia" class="form-label">Experiencia docente / administrativo</label>
                <input type="text" class="form-control" id="experiencia" placeholder="Ingresa tiempo de experiencia"/>
                
            </div>
            <div class="col-md-4">
                <label for="experienciaP" class="form-label">Experiencia profesional</label>
                <input type="text" class="form-control" id="experienciaP" placeholder="Ingresa tiempo de experiencia"/>
            </div>
        </form>
        <hr />

        <form class="row g-3 mt-4">
            <h3>Estudios</h3>
            <i style="
            font-size: small;
            text-align: center;
            margin-top: 10px;
            margin-bottom: 10px;
            opacity: 0.8;
            ">**En caso de no contar con algún estudio colocar "N/A" en todos los
                campos que solicite registro**</i>
            <h5>Licenciatura</h5>
            <div class="col">
                <label for="licenciatura" class="form-label">Licenciatura en </label>
                <input type="text" class="form-control" id="licenciatura" placeholder="Ingresa nombre de la carrera" />
            </div>
            <div class="col-md-auto">
                <label for="cedulaL" class="form-label">Cédula</label>
                <input type="number" class="form-control" id="cedulaL" placeholder="Ingresa Cédula" />
            </div>
            <div class="col">
                <label for="institucionL" class="form-label">Institución</label>
                <input type="text" class="form-control" id="institucionL" placeholder="Ingresa Institución" />
            </div>
        </form>
        <form class="row g-3 mt-3">
            <h5>Maestría</h5>
            <div class="col">
                <label for="maestría" class="form-label">Maestría en </label>
                <input type="text" class="form-control" id="maestría" placeholder="Ingresa nombre de la carrera" />
            </div>
            <div class="col-md-auto">
                <label for="cedulaM" class="form-label">Cédula</label>
                <input type="number" class="form-control" id="cedulaM" placeholder="Ingresa Cédula" />
            </div>
            <div class="col">
                <label for="institucionM" class="form-label">Institución</label>
                <input type="text" class="form-control" id="institucionM" placeholder="Ingresa Institución" />
            </div>
        </form>
        <form class="row g-3 mt-3 mb-4">
            <h5>Doctorado</h5>
            <div class="col">
                <label for="doctorado" class="form-label">Doctorado en </label>
                <input type="text" class="form-control" id="doctorado" placeholder="Ingresa nombre de la carrera" />
            </div>
            <div class="col-md-auto">
                <label for="cedulaD" class="form-label">Cédula</label>
                <input type="number" class="form-control" id="cedulaD" placeholder="Ingresa Cédula" />
            </div>
            <div class="col">
                <label for="institucionD" class="form-label">Institución</label>
                <input type="text" class="form-control" id="institucionD" placeholder="Ingresa Institución" />
            </div>
        </form>
        <hr>
        <div class="text-center my-4">
            <h1>DOCUMENTOS</h1>
            <label for="reciboNomina" class="form-label ">Último recibo de nómina (PDF):</label>
            <input type="file" class="form-control sm-2" id="reciboNomina" placeholder="Ingresa recibo de nómina">
            <label for="credencial" class="form-label m-3">Credencial (PDF):</label>
            <input type="file" class="form-control sm-2" id="credencial" placeholder="Ingresa credencial">
        </div>
    
        <button type="button" class="btn btn-secondary boton-ingresar" onclick=location.href="index.php">
            Cancelar
        </button>
        <button type="button" class="btn btn-outline-secondary" onclick="alertaCorreo()";>
            Enviar
        </button>
    </div>
    <?php include("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="js/app.js"></script>
</body>

</html>