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

    <title>SUTATESE - Docente Administrativo</title>

    <?php include("navbar.php");
    ?>
</head>

<body>
    <?php
        if (isset($_SESSION['NumEmpleado5'])) {
            $NumEmpleado = $_SESSION['NumEmpleado5'];
            $NombreEmp = $_SESSION['Nombres'];
            $ApellidoPatEmp = $_SESSION['ApellidoPat'];
            $ApellidoMatEmp = $_SESSION['ApellidoMat'];

            $sql = "Select IdDivision, Division, FechaIng, ExpProfesional, ExpDocAdmin from empleado inner join division on division.IdDivision = empleado.IdDivision1 where NumEmpleado = '$NumEmpleado'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            $opcion = $row[0];
            
    ?>
    <form class="row g-3 mt-3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="container-xl text-center login">
            <div class="row g-0 h-100">
                <div class="col-lg-6 d-flex">
                    
                    <div class="content mx-auto px-4 my-auto">
                        <div class="inicio">
                            <h2>Información Docente/Administrativo</h2>
                        </div>
                        <div class="col-md-auto">
                            <label for="numEmpleado" class="form-label">Número empleado</label>
                            <input type="number" class="form-control" id="numEmpleado" value="<?php echo $NumEmpleado ?>" disabled>
                        </div>
                        <hr>
                        <div class="col-md-auto my-3">
                            <label for="nombre" class="form-label">División</label>
                            <select class="form-control" id="Division" name="Division">
                                <option selected disabled value="<?php echo $opcion ?>"><?php echo $row[1] ?></option>
                                <?php
                                    $ejecucion = $conn->query("Select * from division where IdDivision <> '$opcion' ORDER BY Division ASC");
                                    
                                    foreach ($ejecucion as $opc) :
                                ?>
                                        <option value="<?php echo $opc['IdDivision'] ?>"><?php echo $opc['Division'] ?></option>
                                    <?php
                                    endforeach
                                    ?>
                            </select>
                        </div>
                        <div class="col-md-auto my-3">
                            <label for="fechaIngreso" class="form-label">Fecha de Ingreso al TESE</label>
                            <input type="date" class="form-control" id="fechaIngreso" name="fechaIng" value="<?php echo $row[2] ?>">
                        </div>
                        <div class="col-md-auto my-3">
                            <label for="experienciaD" class="form-label">Experiencia Docente/Administrativo</label>
                            <input type="text" class="form-control" id="experienciaD" name="experienciaD" value="<?php echo $row[4] ?>" placeholder="Ejem. 2 años">
                        </div>
                        <div class="col-md-auto my-3">
                            <label for="experienciaP" class="form-label">Experiencia Profesional</label>
                            <input type="text" class="form-control" id="experienciaP" name="experienciaP" value="<?php echo $row[3] ?>" placeholder="Ejem. 2 años">
                        </div>
                    </div>
                </div>


                <div class="col-lg-6 d-flex">
                    <div class="content px-4 my-auto">
                        <p class="parrafo-doc-admin mb-5">Para la correción de un registro es importante que se capture y revise los datos
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
    // Update
        if (isset($_POST['Update'])) {
            if(empty($_POST['Division'])){
                $division = $opcion;
            }else{
                $division = filter_input(INPUT_POST, "Division");
            }
            $FechaIng = $_POST['fechaIng'];
            $experienciaD = $_POST['experienciaD'];
            $experienciaP = $_POST['experienciaP'];
            if(empty($FechaIng) || empty($experienciaD) || empty($experienciaP)){
                echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, ingrese correctamente los valores!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                        then(function(result){
                            if(result.value){                   
                            window.location = "info_docen_adm.php";
                            }
                        });
                        </script>';
            }else{
                $consulta = $conn->query("UPDATE empleado set IdDivision1 = '$division', FechaIng = '$FechaIng', ExpDocAdmin = '$experienciaD', ExpProfesional = '$experienciaP' where NumEmpleado = '$NumEmpleado'");
    
                if ($consulta === TRUE) {
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html> 