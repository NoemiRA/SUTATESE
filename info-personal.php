<?php
    session_start();
    include('conexion.php');

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>SUTATESE - Información Personal</title>

    <?php include("navbar.php");?>
</head>

<body>
    <?php
        if (isset($_SESSION['NumEmpleado5'])) {
            $NumEmpleado = $_SESSION['NumEmpleado5'];
            $NombreEmp = $_SESSION['Nombres'];
            $ApellidoPatEmp = $_SESSION['ApellidoPat'];
            $ApellidoMatEmp = $_SESSION['ApellidoMat'];

            $sql = "Select FechaNac, Curp, Rfc, Celular, Telefono, CorreoElec from empleado where NumEmpleado = '$NumEmpleado'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
    ?>
    <form class="row g-3 mt-3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="container-xl text-center login">
            <div class="row g-0 h-100">
                <div class="col-lg-6 d-flex">
                    
                    <div class="content mx-auto px-4 my-auto">
                        <div class="inicio">
                            <h2>Información Personal y contacto</h2>
                        </div>
                    <div class="col-md-auto my-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="numero" class="form-label">Número empleado</label>
                                <input type="number" class="form-control" id="numero" name="numero" value="<?php echo $NumEmpleado ?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="nacimiento" class="form-label">Fecha Nacimiento</label>
                                <input type="date" class="form-control" id="nacimiento" name="nacimiento" value="<?php echo $row['FechaNac'] ?>">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-auto my-3">
                        <label for="nombre" class="form-label">Nombre(s)</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $NombreEmp ?>" disabled>
                    </div>
                    <div class="col-md-auto my-3">
                        <label for="apellidoPaterno" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" value="<?php echo $ApellidoPatEmp?>" disabled>
                    </div>
                    <div class="col-md-auto my-3">
                        <label for="apellidoMaterno" class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" value="<?php echo $ApellidoMatEmp ?>" disabled>
                    </div>
                    <div class="col-md-auto my-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="CURP" class="form-label">CURP</label>
                                <input type="text" class="form-control" id="CURP" name="CURP" minlength="17" maxlength="18" value="<?php echo $row['Curp'] ?>" placeholder="Ingresa tu CURP">
                            </div>
                            <div class="col-md-6">
                                <label for="RFC" class="form-label">RFC</label>
                                <input type="text" class="form-control" id="RFC" name="RFC" minlength="12" maxlength="13" value="<?php echo $row['Rfc'] ?>" placeholder="Ingresa tu RFC">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-auto my-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="celular" class="form-label">Teléfono móvil</label>
                                <input type="text" class="form-control" id="celular" name="celular" maxlength="10" value="<?php echo $row['Celular'] ?>" placeholder="Ejem. 5555555555">
                            </div>
                            <div class="col-md-6">
                                <label for="telefono" class="form-label">Teléfono fijo</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" maxlength="10" value="<?php echo $row['Telefono'] ?>" placeholder="Ejem. 5555555555">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-auto my-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="text" class="form-control" id="email" value="<?php echo $row['CorreoElec'] ?>" disabled>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 d-flex">
                <div class="content px-4 my-auto">
                    <p class="parrafo-doc-admin mb-5">Para la corrección  de un registro es importante que se capture y revise los datos
                        ingresados, posteriormente presionar el botón "Guardar" para ver los cambios reflejados.</p>
                    <p class="fst-italic"><i>"Manifiesto bajo protesta de decir verdad que toda la documentación presentada para este trámite, 
                        así como la información ofrecida en respuesta a los formularios de aplicación, es verídica y comprobable."</i></p>
                        <br><br>
                    <div>
                        <button type="button" class="btn" onclick="location.href='perfil.php'">
                            Regresar
                        </button>
                        <input type="submit" class="btn" value="Guardar" name="Update"></input>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php
        }
        //Update
        if(isset($_POST['Update'])){
            $nacimiento = $_POST['nacimiento'];
            $CURP = $_POST['CURP'];
            $RFC = $_POST['RFC'];
            $celular = $_POST['celular'];
            $telefono = $_POST['telefono'];

            if(empty($CURP) || empty($RFC) || empty($telefono) || empty($celular)){
                echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, ingrese correctamente los valores!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                        then(function(result){
                        if(result.value){                   
                        window.location = "info-personal.php";
                            }
                        });
                        </script>';
            }
            else{
                $ejecucion = $conn->query("UPDATE empleado set FechaNac = '$nacimiento', Curp = '$CURP', Rfc = '$RFC', celular = '$celular', Telefono = '$telefono' where NumEmpleado = '$NumEmpleado'");
                if($ejecucion == TRUE){
                    echo '<script> Swal.fire({icon: "success", title: "Datos Actualizados", text: "¡La información ha sido actualizada!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                        then(function(result){
                            if(result.value){                   
                            window.location = "perfil.php";
                            }
                        });
                        </script>';
                }else{
                    echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, intente más tarde!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                    then(function(result){
                        if(result.value){                   
                        window.location = "perfil.php";
                        }
                    });
                    </script>';
                }
            }
        }
        ?>
            <?php include("footer.php");?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html> 