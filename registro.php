<?php
include_once 'conexion.php';
?>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <title>SUTATESE-Registro</title>

    <?php include("navbar.php"); ?>

</head>

<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <div class="container text-center login">
            <div style="text-align: center; margin-top: 2%">
                <img src="resources\Logo.jpg" class="img-thumbnail" alt="..." width="140" height="140" />
                <h1>REGISTRATE</h1>
            </div>

            <div class="row g-3 mt-3">
                <h3>Datos personales</h3>
                <div class="col-md-2">
                    <label for="numEmpleado" class="form-label">No. empleado <b>*</b></label>
                    <input type="number" class="form-control" id="numEmpleado" name="employee" placeholder="Ingresa tu número de empleado" />
                </div>
                <div class="col-md-4">
                    <label for="nombre" class="form-label">Nombre(s) <b>*</b></label>
                    <input type="text" class="form-control" id="nombre" name="name" placeholder="Ingresa tu nombre(s)" />
                </div>
                <div class="col-md-3">
                    <label for="apellidoPaterno" class="form-label">Apellido paterno <b>*</b></label>
                    <input type="text" class="form-control" id="apellidoPaterno" name="firstname" placeholder="Ingresa tu primer apellido" />
                </div>

                <div class="col-md-3">
                    <label for="apellidoMaterno" class="form-label">Apellido materno <b>*</b></label>
                    <input type="text" class="form-control" id="apellidoMaterno" name="lastname" placeholder="Ingresa tu segundo apellido" />
                </div>
            </div>
            <div class="row g-3 mt-3">
                <div class="col-md-3">
                    <label for="fechaNacimiento" class="form-label">Fecha de nacimiento <b>*</b></label>
                    <input type="date" class="form-control" id="fechaNacimiento" name="date" placeholder="Ingresa tu fecha de nacimiento" />
                </div>
                <div class="col-md-3">
                    <label for="curp" class="form-label">CURP <b>*</b></label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="curp" maxlength="18" name="curp" placeholder="Ingresa tu CURP" />
                        <span class="input-group-text" id="basic-addon2"><abbr title="Click para conocer su CURP"> <a class="m-0" href="https://www.gob.mx/curp/" target="_blank"><i class="fa-solid fa-circle-info"></i></a></span>
                        </abbr>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="rfc" class="form-label">RFC (con homoclave) <b>*</b></label>
                    <input type="text" class="form-control" id="rfc" minlength="12" maxlength="13" name="rfc" placeholder="Ingresa tu RFC" />
                </div>
                <div class="col-md-3">
                    <label for="fechaIngreso" class="form-label">Ingreso al TESE <b>*</b></label>
                    <input type="date" class="form-control" id="fechaIngreso" name="dateIT" placeholder="Ingresa tu fecha de ingreso al TESE" />
                </div>
            </div>
            <div class="row g-3 mt-3">
                <div class="col">
                    <label for="correo" class="form-label">Correo electrónico personal <b>*</b></label>
                    <input type="text" class="form-control" id="correo" name="email" placeholder="correo@example.com" />
                </div>
                <div class="col-md-auto">
                    <label for="celular" class="form-label">Teléfono móvil <b>*</b></label>
                    <input type="number" class="form-control" id="celular" name="cellphone" maxlength="10" placeholder="Ejem. 5555555555" />
                </div>
                <div class="col-md-auto">
                    <label for="telefono" class="form-label">Teléfono fijo <b>*</b></label>
                    <input type="number" class="form-control" id="telefono" name="phone" maxlength="10" placeholder="Ejem. 5555555555" />
                </div>
            </div>
            <hr />

            <div class="row g-3 mt-3">
                <h3>Dirección / Domicilio</h3>
                <div class="col">
                    <label for="calle" class="form-label">Calle <b>*</b></label>
                    <input type="text" class="form-control" id="calle" name="street" placeholder="Ingresa Calle" />
                </div>

                <div class="col-md-auto">
                    <label for="numero" class="form-label">Número <b>*</b></label>
                    <input type="text" class="form-control" id="numero" name="number" placeholder="Ingresa Número" />
                </div>

                <div class="col">
                    <label for="delegacion" class="form-label">Delegación / municipio <b>*</b></label>
                    <input type="text" class="form-control" id="delegacion" name="municipality" placeholder="Ingresa Delegación / Municipio" />
                </div>
            </div>

            <div class="row g-3 mt-3">
                <div class="col-md-5">
                    <label for="colonia" class="form-label">Colonia <b>*</b></label>
                    <input type="text" class="form-control" id="colonia" name="suburb" placeholder="Ingresa Colonia" />
                </div>
                <div class="col-md-5">
                    <label for="estado" class="form-label">Estado <b>*</b></label>
                    <select class="form-select" name="state">
                        <option selected disabled>Elige el estado...</option>
                        <?php
                        $ejecucion = $conn->query("Select * from estado order by Estado ASC");

                        foreach ($ejecucion as $opc) :
                        ?>
                            <option value="<?php echo $opc['IdEstado'] ?>"><?php echo $opc['Estado'] ?></option>
                        <?php
                        endforeach
                        ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="cp" class="form-label">C.P. <b>*</b></label>
                    <input type="text" class="form-control" id="cp" maxlength="5" name="cp" placeholder="Ingresa Código Postal" />
                </div>
            </div>
            <hr />

            <div class="row g-3 mt-3">
                <h3>Docente / Administrativo</h3>
                <div class="col-md-4">
                    <label for="division" class="form-label">División <b>*</b></label>
                    <select class="form-select" name="division" aria-label="Division">
                        <option selected disabled>Elige la división...</option>
                        <?php
                        $ejecucion = $conn->query("Select * from division");

                        foreach ($ejecucion as $opc) :
                        ?>
                            <option value="<?php echo $opc['IdDivision'] ?>"><?php echo $opc['Division'] ?></option>
                        <?php
                        endforeach
                        ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="experiencia" class="form-label">Experiencia docente / administrativo <b>*</b></label>
                    <input type="text" class="form-control" id="experiencia" name="experience" placeholder="Ingresa tiempo de experiencia" />

                </div>
                <div class="col-md-4">
                    <label for="experienciaP" class="form-label">Experiencia profesional <b>*</b></label>
                    <input type="text" class="form-control" id="experienciaP" name="pexperience" placeholder="Ingresa tiempo de experiencia" />
                </div>
            </div>
            <hr />

            <div class="row g-3 mt-4">
                <h3>Estudios</h3>
                <i>**En caso de no contar con algún estudio puede dejar el campo en blanco**</i>
                <h5>Licenciatura</h5>
                <div class="col">
                    <label for="licenciatura" class="form-label">Licenciatura en </label>
                    <input type="text" class="form-control" id="licenciatura" name="lic" placeholder="Ingresa nombre de la carrera" />
                </div>
                <div class="col-md-auto">
                    <label for="cedulaL" class="form-label">Cédula</label>
                    <input type="number" class="form-control" id="cedulaL" maxlength="8" name="cedulaLic" placeholder="Ingresa Cédula" />
                </div>
                <div class="col">
                    <label for="institucionL" class="form-label">Institución</label>
                    <input type="text" class="form-control" id="institucionL" name="institucionLic" placeholder="Ingresa Institución" />
                </div>
            </div>
            <div class="row g-3 mt-3">
                <h5>Maestría</h5>
                <div class="col">
                    <label for="maestría" class="form-label">Maestría en </label>
                    <input type="text" class="form-control" id="maestría" name="mae" placeholder="Ingresa nombre de la carrera" />
                </div>
                <div class="col-md-auto">
                    <label for="cedulaM" class="form-label">Cédula</label>
                    <input type="number" class="form-control" maxlength="8" id="cedulaM" name="cedulaMae" placeholder="Ingresa Cédula" />
                </div>
                <div class="col">
                    <label for="institucionM" class="form-label">Institución</label>
                    <input type="text" class="form-control" id="institucionM" name="institucionMae" placeholder="Ingresa Institución" />
                </div>
            </div>
            <div class="row g-3 mt-3 mb-4">
                <h5>Doctorado</h5>
                <div class="col">
                    <label for="doctorado" class="form-label">Doctorado en </label>
                    <input type="text" class="form-control" id="doctorado" name="doc" placeholder="Ingresa nombre de la carrera" />
                </div>
                <div class="col-md-auto">
                    <label for="cedulaD" class="form-label">Cédula</label>
                    <input type="number" class="form-control" maxlength="8" id="cedulaD" name="cedulaDoc" placeholder="Ingresa Cédula" />
                </div>
                <div class="col">
                    <label for="institucionD" class="form-label">Institución</label>
                    <input type="text" class="form-control" id="institucionD" name="institucionDoc" placeholder="Ingresa Institución" />
                </div>
            </div>
            <hr>
            <div class="text-center my-4">
                <h1>DOCUMENTOS</h1>
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <label for="reciboNomina" class="form-label">Último recibo de nómina (PDF): <b>*</b></label>
                        <div id="emailHelp" class="form-text">El PDF no deberá superar los 8 MB.</div>
                        <input type="file" class="form-control sm-2" id="reciboNomina" name="nomina">
                    </div>

                    <div class="col-md-4">
                        <label for="credencial" class="form-label">Credencial (PDF): <b>*</b></label>
                        <div id="emailHelp" class="form-text">El PDF no deberá superar los 200 KB.</div>
                        <input type="file" class="form-control sm-2" id="credencial" name="credencial">
                    </div>

                    <div class="col-md-4">
                        <label for="picture" class="form-label">Foto (JPG): <b>*</b></label>
                        <div id="emailHelp" class="form-text">El archivo no deberá superar los 200 KB.</div>
                        <input type="file" class="form-control sm-2" id="picture" name="picture">
                    </div>
                </div>
                <button type="button" class="btn boton-ingresar" onclick=location.href="index.php">Cancelar</button>
                <input type="submit" class="btn" value="Registrarme" name="Insert"></input>
                
                <?php
                    if (isset($_POST['Insert'])) {
                        $employe = $_POST['employee'];
                        $name = $_POST['name'];
                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $date = $_POST['date'];
                        $curp = $_POST['curp'];
                        $rfc = $_POST['rfc'];
                        $dateIT = $_POST['dateIT'];
                        $email = $_POST['email'];
                        $cellphone = $_POST['cellphone'];
                        $phone = $_POST['phone'];
                        $street = $_POST['street'];
                        $number = $_POST['number'];
                        $municipality = $_POST['municipality'];
                        $suburb = $_POST['suburb'];
                        $state = filter_input(INPUT_POST, "state");
                        $cp = $_POST['cp'];
                        $division = filter_input(INPUT_POST, "division");
                        $experience = $_POST['experience'];
                        $pexperience = $_POST['pexperience'];
                        $lic = $_POST['lic'];
                        $cedulaLic = $_POST['cedulaLic'];
                        $institucionLic = $_POST['institucionLic'];
                        $mae = $_POST['mae'];
                        $cedulaMae = $_POST['cedulaMae'];
                        $institucionMae = $_POST['institucionMae'];
                        $doc = $_POST['doc'];
                        $cedulaDoc = $_POST['cedulaDoc'];
                        $institucionDoc = $_POST['institucionDoc'];

                        $tipoN = $_FILES['nomina']['type'];
                        $tipoC = $_FILES['credencial']['type'];
                        $tipoP = $_FILES['picture']['type'];

                        if (empty($employe) || empty($name) || empty($firstname) || empty($lastname) || empty($date) || empty($curp) || empty($rfc) || empty($dateIT) || empty($email) || empty($cellphone) || empty($phone) || empty($street) || empty($number) || empty($municipality) || empty($suburb) || empty($state) || empty($cp) || empty($division) || empty($experience) || empty($pexperience)) {
                            echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, ingrese correctamente los valores!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                                then(function(result){
                                    if(result.value){                   
                                        window.location = "registro.php";
                                    }
                                });
                        </script>';
                        } else {
                            if ($tipoN != "" && $tipoC != "" && $tipoP != "") {
                                $tamanioN = $_FILES['nomina']['size'];
                                $rutaN = fopen($_FILES['nomina']['tmp_name'], 'r');
                                $subidaN = fread($rutaN, $tamanioN);
                                $subidaN = mysqli_escape_string($conn, $subidaN);

                                $tamanioC = $_FILES['credencial']['size'];
                                $rutaC = fopen($_FILES['credencial']['tmp_name'], 'r');
                                $subidaC = fread($rutaC, $tamanioC);
                                $subidaC = mysqli_escape_string($conn, $subidaC);

                                $tamanioP = $_FILES['picture']['size'];
                                $permitido = array("image/png", "image/jpeg");
                                if (in_array($tipoP, $permitido) == false) {
                                    die('<script> Swal.fire({icon: "error", title: "Error...", text: "¡La foto no corresponde al archivo o es demasiado grande! Por favor, intente de nuevo", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                                        then(function(result){
                                        if(result.value){                   
                                            window.location = "registro.php";
                                            }
                                        });
                                        </script>');
                                }
                                $rutaP = fopen($_FILES['picture']['tmp_name'], 'r');
                                $subidaP = fread($rutaP, $tamanioP);
                                $subidaP = mysqli_escape_string($conn, $subidaP);

                                if ($tipoN != 'application/pdf' || $tamanioN >= 8388608) {
                                    echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡La nomina no corresponde al archivo o es demasiado grande! Por favor, intente de nuevo", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                                    then(function(result){
                                        if(result.value){                   
                                            window.location = "registro.php";
                                        }
                                    });
                                    </script>';
                                } else if ($tipoC != 'application/pdf' || $tamanioC >= 204800) {
                                    echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡La credencial no corresponde al archivo o es demasiado grande! Por favor, intente de nuevo", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                                    then(function(result){
                                        if(result.value){                   
                                            window.location = "registro.php";
                                        }
                                    });
                                    </script>';
                                } else if ($tipoN != 'application/pdf' || $tamanioN >= 8388608 || $tipoC != 'application/pdf' || $tamanioC >= 204800) {
                                    echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡La nomina y la credencial no corresponden al archivo o son demasiado grandes! Por favor, intente de nuevo", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                                    then(function(result){
                                        if(result.value){                   
                                            window.location = "registro.php";
                                        }
                                    });
                                    </script>';
                                } else {
                                    $ejecucion = $conn->query("INSERT INTO empleado (NumEmpleado, Nombres, ApellidoPat, ApellidoMat, FechaNac, Curp, Rfc, FechaIng, CorreoElec, Celular, Telefono, Calle, Numero, DelMun, Colonia, IdEstado1, Cp, IdDivision1, ExpProfesional, ExpDocAdmin, Licenciatura, CedLic, InstLic, Maestria, CedMae, InstMae, Doctorado, CedDoc, InstDoc, Nomina, Credencial, Foto) 
                                VALUES ('" . $employe . "' , '" . $name . "' , '" . $firstname . "' , '" . $lastname . "', '" . $date . "' , '" . $curp . "' , '" . $rfc . "' , '" . $dateIT . "' , '" . $email . "' , '" . $cellphone . "' , '" . $phone . "' , '" . $street . "' , " . $number . " , '" . $municipality . "' , '" . $suburb . "', '" . $state . "' , " . $cp . " , '" . $division . "' , '" . $pexperience . "' , '" . $experience . "' , '" . $lic . "' , '" . $cedulaLic . "' , '" . $institucionLic . "' , '" . $mae . "' , '" . $cedulaMae . "' , '" . $institucionMae . "' , '" . $doc . "' , '" . $cedulaDoc . "' , '" . $institucionDoc . "' , '" . $subidaN . "' , '" . $subidaC . "' , '" . $subidaP . "')");
                                    if ($ejecucion === TRUE) {
                                        echo '<script> Swal.fire({icon: "success", title: "Registro con éxito", text: "¡La información ha sido enviada, su contraseña de acceso será enviada al correo registrado!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                                        then(function(result){
                                            if(result.value){                   
                                                window.location = "index.php";
                                            }
                                        });
                                        </script>';
                                    } else {
                                        echo mysqli_error($conn);
                                    }
                                    echo "Se han insertado los siguientes valores: $employe, $name, $firstname, $lastname, $date, $curp, $rfc, $dateIT, $email, $cellphone, $phone, $street, $number, $municipality, $suburb, $state, $cp, $division, $experience, $pexperience ";
                                }
                            } else {
                                echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Ingrese los documentos solicitados! Por favor, intente de nuevo", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                                    then(function(result){
                                        if(result.value){                   
                                            window.location = "registro.php";
                                        }
                                    });
                                    </script>';
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </form>

    <?php include("footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>