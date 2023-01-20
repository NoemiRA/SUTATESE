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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>SUTATESE - Información Domiciliaria</title>

    <?php include("navbar.php");
    ?>
</head>

<body>
<?php
        if (isset($_SESSION['NumEmpleado5'])) {
            $NumEmpleado = $_SESSION['NumEmpleado5'];

            $sql = "Select Calle, Numero, DelMun, Colonia, IdEstado1, Estado, Cp from empleado inner join estado on empleado.IdEstado1 = estado.IdEstado where NumEmpleado = '$NumEmpleado'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            $option = $row['IdEstado1'];
    ?>
    <form class="row g-3 mt-3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="container-xl text-center login">
            <div class="row g-0 h-100">
                <div class="col-lg-6 d-flex">
                    
                    <div class="content mx-auto px-4 my-auto">
                        <div class="inicio">
                            <h2>Información Domiciliaria</h2>
                        </div>
                        <div class="col-md-auto my-3">
                            <label for="numero" class="form-label">Número empleado</label>
                            <input type="number" class="form-control" id="numero" name="numero" value="<?php echo $NumEmpleado ?>" disabled>                        
                        </div>
                        <hr>
                        
                        <div class="col-md-auto my-3">
                            <label for="calle" class="form-label">Calle</label>
                            <input type="text" class="form-control" id="calle" name="calle" value="<?php echo $row[0] ?>">
                        </div>
                        <div class="col-md-auto my-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="numero" class="form-label">Número</label>
                                    <input type="number" class="form-control" id="numero" name="numero" min="0" maxlength="18" value="<?php echo $row[1] ?>" placeholder="Ingresa tu número">
                                </div>
                                <div class="col-md-6">
                                    <label for="cp" class="form-label">C.P.</label>
                                    <input type="text" class="form-control" id="cp" name="cp" maxlength="5" value="<?php echo $row[6] ?>" placeholder="Ingresa tu C.P.">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-auto my-3">
                            <label for="estado" class="form-label">Estado</label>
                            <select class="form-select" name="estado">
                                <option selected disabled value="<?php echo $option ?>"><?php echo $row[5] ?></option>
                                    <?php
                                        $ejecucion = $conn->query("Select * from estado where IdEstado <> '$option' order by Estado ASC");
                                        
                                        foreach ($ejecucion as $opc) :
                                    ?>
                                            <option value="<?php echo $opc['IdEstado'] ?>"><?php echo $opc['Estado'] ?></option>
                                        <?php
                                        endforeach
                                        ?>
                            </select>
                        </div>
                        <div class="col-md-auto my-3">
                            <label for="delmun" class="form-label">Delegación / Municipio</label>
                            <input type="text" class="form-control" id="delmun" name="delmun"value="<?php echo $row[2] ?>">
                        </div>
                        <div class="col-md-auto my-3">
                            <label for="colonia" class="form-label">Colonia</label>
                            <input type="text" class="form-control" id="colonia" name="colonia"value="<?php echo $row[3] ?>">
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
            if(empty($_POST['estado'])){
                $estado = $option;
            }else{
                $estado = filter_input(INPUT_POST, "estado");
            }
            $calle = $_POST['calle'];
            $numero = $_POST['numero'];
            $delmun = $_POST['delmun'];
            $colonia = $_POST['colonia'];
            $cp = $_POST['cp'];
            // echo $estado;
            // echo $calle, $numero, $cp, $estado, $delmun, $colonia;

            if(empty($calle) || empty($numero) || empty($delmun) || empty($colonia) || empty($cp) || empty($estado)){
                echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, ingrese correctamente los valores!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                        then(function(result){
                        if(result.value){                   
                        window.location = "info_doc.php";
                            }
                        });
                        </script>';
            }
            else{
                
                $ejecucion = $conn->query("UPDATE empleado set Calle = '$calle', Numero = '$numero', Cp = '$cp', IdEstado1 = '$estado', DelMun = '$delmun', Colonia = '$colonia' where NumEmpleado = '$NumEmpleado'");

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
    </div>
    <?php include("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" 
        crossorigin="anonymous"></script>
</body>

</html>