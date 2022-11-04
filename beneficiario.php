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

    <title>SUTATESE - Beneficiarios</title>
    <?php include("navbar.php");
    ?>

</head>

<body>
    <h2 class="p-2 text-center mt-4"><strong>BENEFICIARIOS</strong></h2>
    <h6 class="p-2 text-center mt-4"><i>**Si desea registrar menos de 3 Benefiarios, puede dejarlo en blanco, siempre y cuando se cumpla el 100% con los demas Beneficiarios por cada uno de los casos.**</i></h6>
    <form class="row g-3 mt-3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="col-lg-6 d-flex">
            <div class="content px-3 my-auto">
                <h6 class="p-2 text-center mt-4"><i>En caso de que el docente o administrativo y agremiado a la Caja de Ahorro se encuentre ausente.</i></h6>

                <div class="row g-3 m-2">
                    <h2>Beneficiario 1</h2>
                    <div class="col-md-4">
                        <label for="nombre1" class="form-label">Nombre(s)</label>
                        <input type="text" class="form-control" name="array1[]" placeholder="Nombre de Beneficiario 1" />
                    </div>
                    <div class="col-md-4">
                        <label for="apellidoPaterno1" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" name="array1[]" placeholder="Apellido Paterno de Beneficiario 1" />
                    </div>
                    <div class="col-md-4">
                        <label for="apellidoMaterno1" class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" name="array1[]" placeholder="Apellido Materno de Beneficiario 1" />
                    </div>
                </div>

                <div class="row g-3 m-2">
                    <div class="col-md-4">
                        <label for="telefono1" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" name="array1[]" maxlength= "10" placeholder="ejem. 5555555555" />
                    </div>
                    <div class="col-md-5">
                        <label for="correo1" class="form-label">correo electrónico</label>
                        <input type="email" class="form-control" name="array1[]" placeholder="example@email.com" />
                    </div>
                    <div class="col-md-3">
                        <label for="porcentaje1" class="form-label">Porcentaje</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="array1[]" min = "0" max = "100" placeholder="Seleccione el procentaje para el Beneficiario" />
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row g-3 m-2">
                    <h2>Beneficiario 2</h2>
                    <div class="col-md-4">
                        <label for="nombre2" class="form-label">Nombre(s)</label>
                        <input type="text" class="form-control" name="array2[]" placeholder="Nombre de Beneficiario 2" />
                    </div>
                    <div class="col-md-4">
                        <label for="apellidoPaterno2" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" name="array2[]" placeholder="Apellido Paterno de Beneficiario 2" />
                    </div>
                    <div class="col-md-4">
                        <label for="apellidoMaterno2" class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" name="array2[]" placeholder="Apellido Materno de Beneficiario 2" />
                    </div>
                </div>

                <div class="row g-3 m-2">
                    <div class="col-md-4">
                        <label for="telefono2" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" name="array2[]" placeholder="ejem. 5555555555" />
                    </div>
                    <div class="col-md-5">
                        <label for="correo2" class="form-label">correo electrónico</label>
                        <input type="email" class="form-control" name="array2[]" placeholder="example@email.com" />
                    </div>
                    <div class="col-md-3">
                        <label for="porcentaje2" class="form-label">Porcentaje</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="array2[]" placeholder="Seleccione el procentaje para el Beneficiario" />
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row g-3 m-2">
                    <h2>Beneficiario 3</h2>
                    <div class="col-md-4">
                        <label for="nombre3" class="form-label">Nombre(s)</label>
                        <input type="text" class="form-control" name="array3[]" placeholder="Nombre de Beneficiario 1" />
                    </div>
                    <div class="col-md-4">
                        <label for="apellidoPaterno3" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" name="array3[]" placeholder="Apellido Paterno de Beneficiario 3" />
                    </div>
                    <div class="col-md-4">
                        <label for="apellidoMaterno3" class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" name="array3[]" placeholder="Apellido Materno de Beneficiario 3" />
                    </div>
                </div>

                <div class="row g-3 m-2">
                    <div class="col-md-4">
                        <label for="telefono3" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" name="array3[]" placeholder="ejem. 5555555555" />
                    </div>
                    <div class="col-md-5">
                        <label for="correo3" class="form-label">correo electrónico</label>
                        <input type="email" class="form-control" name="array3[]" placeholder="example@email.com" />
                    </div>
                    <div class="col-md-3">
                        <label for="porcentaje3" class="form-label">Porcentaje</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="array3[]" placeholder="Seleccione el procentaje para el Beneficiario" />
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 d-flex bg-light">
            <div class="content px-3 my-auto">
                <h6 class="p-2 text-center mt-4"><i>En caso de que el docente o administrativo y agremiado a la Caja de Ahorro fallezca.</i></h6>

                <div class="row g-3 m-2">
                    <h2>Beneficiario 1</h2>
                    <div class="col-md-4">
                        <label for="nombre1" class="form-label">Nombre(s)</label>
                        <input type="text" class="form-control" name="nombre1" placeholder="Nombre de Beneficiario 1" />
                    </div>
                    <div class="col-md-4">
                        <label for="apellidoPaterno1" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" name="apellidoPaterno1" placeholder="Apellido Paterno de Beneficiario 1" />
                    </div>
                    <div class="col-md-4">
                        <label for="apellidoMaterno1" class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" name="apellidoMaterno1" placeholder="Apellido Materno de Beneficiario 1" />
                    </div>
                </div>

                <div class="row g-3 m-2">
                    <div class="col-md-4">
                        <label for="telefono1" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" name="telefono1" placeholder="ejem. 5555555555" />
                    </div>
                    <div class="col-md-5">
                        <label for="correo1" class="form-label">correo electrónico</label>
                        <input type="email" class="form-control" name="correo1" placeholder="example@email.com" />
                    </div>
                    <div class="col-md-3">
                        <label for="porcentaje1" class="form-label">Porcentaje</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="porcentaje1" placeholder="Seleccione el procentaje para el Beneficiario" />
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row g-3 m-2">
                    <h2>Beneficiario 2</h2>
                    <div class="col-md-4">
                        <label for="nombre2" class="form-label">Nombre(s)</label>
                        <input type="text" class="form-control" name="nombre2" placeholder="Nombre de Beneficiario 2" />
                    </div>
                    <div class="col-md-4">
                        <label for="apellidoPaterno2" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" name="apellidoPaterno2" placeholder="Apellido Paterno de Beneficiario 2" />
                    </div>
                    <div class="col-md-4">
                        <label for="apellidoMaterno2" class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" name="apellidoMaterno2" placeholder="Apellido Materno de Beneficiario 2" />
                    </div>
                </div>

                <div class="row g-3 m-2">
                    <div class="col-md-4">
                        <label for="telefono2" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" name="telefono2" placeholder="ejem. 5555555555" />
                    </div>
                    <div class="col-md-5">
                        <label for="correo2" class="form-label">correo electrónico</label>
                        <input type="email" class="form-control" name="correo2" placeholder="example@email.com" />
                    </div>
                    <div class="col-md-3">
                        <label for="porcentaje2" class="form-label">Porcentaje</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="porcentaje2" placeholder="Seleccione el procentaje para el Beneficiario" />
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row g-3 m-2">
                    <h2>Beneficiario 3</h2>
                    <div class="col-md-4">
                        <label for="nombre3" class="form-label">Nombre(s)</label>
                        <input type="text" class="form-control" name="nombre3" placeholder="Nombre de Beneficiario 1" />
                    </div>
                    <div class="col-md-4">
                        <label for="apellidoPaterno3" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" name="apellidoPaterno3" placeholder="Apellido Paterno de Beneficiario 3" />
                    </div>
                    <div class="col-md-4">
                        <label for="apellidoMaterno3" class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" name="apellidoMaterno3" placeholder="Apellido Materno de Beneficiario 3" />
                    </div>
                </div>

                <div class="row g-3 m-2">
                    <div class="col-md-4">
                        <label for="telefono3" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" name="telefono3" placeholder="ejem. 5555555555" />
                    </div>
                    <div class="col-md-5">
                        <label for="correo3" class="form-label">correo electrónico</label>
                        <input type="email" class="form-control" name="correo3" placeholder="example@email.com" />
                    </div>
                    <div class="col-md-3">
                        <label for="porcentaje3" class="form-label">Porcentaje</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="porcentaje3" placeholder="Seleccione el procentaje para el Beneficiario" />
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mb-3">
            <button type="button" class="btn btn-secondary boton-ingresar" onclick=location.href="registroCA.php">
                Cancelar
            </button>
            <input type="submit" class="btn" value="Registrar" name="Insert"></input>
        </div>
        
        <?php
            if (isset($_POST['Insert'])) {
                $array1 = $_POST['array1'];
                $array2 = $_POST['array2'];
                $array3 = $_POST['array3'];

                $porcentaje = intval('$array1[5]') + intval('$array2[5]');
                echo $porcentaje;

                // if($porcentaje == 100){
                //     InsertValues($array1);
                // }else{
                //     echo $array1[5].$array2[5].$array3[5];
                //     echo'El porcentaje no corresponde a lo solicitado';
                // }
            }


            function InsertValues($valor){
                foreach($valor as $n){
                    echo$n."<br>";
                }
            }
        ?>

    </form>
    <?php include("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>