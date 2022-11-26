<?php
session_start();
include('conexion.php');

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">


    <title>SUTATESE - Perfil</title>

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

        $sql = "Select foto from empleado where NumEmpleado = '$NumEmpleado'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $Img = $row['foto'];

        

    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data"> 
        <div class="container-xl login">
            <h1>Perfil del Usuario</h1>
            <div style="margin-top: 2%;">
                <div class="row g-3 mt-3">
                    <div class="col-md-auto">
                        <img src="data:image/png; base64,<?php echo base64_encode($Img) ?>" width="120" height="120" style="border-radius: 50%;">
                    </div>
                    <div class="col-md-auto">
                        <h2><?php echo $NombreEmp . " " . $ApellidoPatEmp . " " . $ApellidoMatEmp ?></h2>
                        <p>Número de empleado: <?php echo $NumEmpleado ?></p>
                        <!-- Buton modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 50%;">
                        Cambiar foto
                        </button>
            
                        <!--Ventana Modal -->
                            <div class="modal fade text-center" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog text-center">
                                    <div class="modal-content text-center">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Cambiar foto de perfil: Foto (JPG): <b>*</b></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <div class="col-md-auto text-center shadow-lg p-3 mb-2 bg-body rounded">
                                                <p id="emailHelp" class="form-text text-center">El archivo no deberá superar los 200 KB.</p>
                                                <img src="data:image/png; base64,<?php echo base64_encode($Img) ?>" width="120" height="120" style="border-radius: 50%;">
                                                <div class="input-group mb-0 mt-3">
                                                    <input type="file" class="form-control" id="picture"  name="picture" accept=".jpg, .jpeg, .png">
                                                    <label class="input-group-text" for="picture"><i class="fa-solid fa-cloud-arrow-up"></i></label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="modal-footer text-start">
                                            <button type="button" class="btn-secondary p-2 " data-bs-dismiss="modal" style="background: #DC3545; color: white; border: none; border-radius: 5px;">Cancelar</button>
                                            <input type="submit" class="btn-secondary p-2" style="background: #198754; color: white; border:none; border-radius: 5px" name="Update" value="Guardar"></input>
                                            <?php
                                            if (isset($_POST['Update'])) {
                                                $tipoP = $_FILES['picture']['type'];
                                                if($tipoP != ""){             
                                                    $tamanioP = $_FILES['picture']['size'];
                                                    $permitido = array("image/png", "image/jpeg");
                                                    if (in_array($tipoP, $permitido) == false) {
                                                        die('<script> Swal.fire({icon: "error", title: "Error...", text: "¡La foto no corresponde al archivo o es demasiado grande! Por favor, intente de nuevo", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                                                        then(function(result){
                                                        if(result.value){                   
                                                            window.location = "perfil.php";
                                                            }
                                                        });
                                                        </script>');
                                                    }
                                                    $rutaP = fopen($_FILES['picture']['tmp_name'], 'r');
                                                    $subidaP = fread($rutaP, $tamanioP);
                                                    $subidaP = mysqli_escape_string($conn, $subidaP);
                                                    $act = $conn->query("UPDATE empleado SET foto = '$subidaP' where NumEmpleado = '$NumEmpleado'");
                                                    if ($act === true) {
                                                        echo '<script> Swal.fire({icon: "success", title: "Foto guardada", text: "¡Su foto de perfil ha sido actualizada con éxito!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                                                        then(function(result){
                                                            if(result.value){                   
                                                                window.location = "perfil.php";
                                                            }
                                                        });
                                                        </script>';
                                                    } else {
                                                        echo mysqli_error($conn);
                                                    }
                                                }else{                                           
                                                    echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Ingrese una foto! Por favor, intente de nuevo", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                                                    then(function(result){
                                                    if(result.value){                   
                                                        window.location = "perfil.php";
                                                    }});
                                                    </script>';
                                               }
                                             } 
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        <!--Ventana Modal -->
                    </div>
                    <div class="row p-5">
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-primary" style="width: 100%; height: 100px;" onclick=location.href="info_docen_adm.php">INFORMACIÓN DOCENTE / ADMINISTRATIVO</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-primary" style="width: 100%; height: 100px;" onclick=location.href="info-personal.php">INFORMACIÓN PERSONAL</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-primary" style="width: 100%; height: 100px;" onclick=location.href="info_doc.php">INFORMACIÓN DOMICILIO</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-primary" style="width: 100%; height: 100px;" onclick=location.href="datosBancarios.php">INFORMACIÓN BANCARIA</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php
    }
    ?>

    <?php include("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>