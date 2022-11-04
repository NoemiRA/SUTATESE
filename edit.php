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
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>SUTATESE-Caja ahorro</title>
    <?php include("navbar.php");
    ?>
</head>
    <?php 
        if(isset($_GET['id'])){
            $id_decoded = base64_decode($_GET['id']);
            $query="SELECT Nombres, ApellidoPat, ApellidoMat, CorreoElec, Telefono, Porcentaje, IdTipoBeneficiario1, IdAhorrador1, IdParentesco, Parentesco FROM beneficiario INNER JOIN parentesco on beneficiario.IdParentesco1 = parentesco.IdParentesco WHERE IdBeneficiario = '$id_decoded'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);    
            $tb = $row[6];    
            $id_ahor = $row[7]; 
            $id_rel = $row[8];
            $rel = $row[9];   
        
    ?>

<body class="justify-content-center align-items-center vh-100">
    <form method="post" action="edit.php?id=<?php echo $_GET['id'] ?>">
        <div class="container-xl p-5 text-center">
            <h2 class="p-2 text-center mt-4"><strong>EDITAR BENEFICIARIO</strong></h2>
            <div class="row g-2 m-3">
                <div class="col-md-4">
                    <label class="form-label">Nombre(s)</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $row['Nombres'] ?>" placeholder="Nombre de Beneficiario 1" />
                </div>
                <div class="col-md-4">
                    <label class="form-label">Apellido Paterno</label>
                    <input type="text" class="form-control" name="firstname" value="<?php echo $row['ApellidoPat'] ?>" placeholder="Apellido Paterno de Beneficiario 1" />
                </div>
                <div class="col-md-4">
                    <label class="form-label">Apellido Materno</label>
                    <input type="text" class="form-control" name="lastname" value="<?php echo $row['ApellidoMat'] ?>" placeholder="Apellido Materno de Beneficiario 1" />
                </div>
            </div>

            <div class="row g-2 m-3">
                <div class="col-md-6">
                    <label class="form-label">Teléfono</label>
                    <input type="text" class="form-control" name="phone" maxlength="10" value="<?php echo $row['Telefono'] ?>" placeholder="ejem. 5555555555" />
                </div>

                <div class="col-md-6">
                    <label class="form-label">correo electrónico</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $row['CorreoElec'] ?>" placeholder="example@email.com" />
                </div>
            </div>

            <div class="row g-2 m-3">
                <div class="col">
                    <label class="form-label">Porcentaje</label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="percentage"min="0" max="100" value="<?php echo $row['Porcentaje'] ?>"placeholder="Seleccione el procentaje para el Beneficiario" />
                        <span class="input-group-text" id="basic-addon2">%</span>
                    </div>
                </div>
                <div class="col-md-4">
                            <div class="form-group">
                                <label for="tipobeneficiario" class="form-label">Parentesco</label>
                                <select class="form-control" id="relationship" name="relationship">
                                    <option selected value="<?php echo $id_rel ?>"><?php echo $rel?></option>
                                    <?php
                                    $parentesco = $conn->query("Select * from parentesco where Parentesco <> '$rel' ORDER BY Parentesco ASC");

                                    foreach ($parentesco as $opc) :
                                    ?>
                                        <option value="<?php echo $opc['IdParentesco'] ?>"><?php echo $opc['Parentesco'] ?></option>
                                    <?php
                                    endforeach
                                    ?>
                                </select>
                            </div>
                        </div>
            </div>
            
            <div class="mt-5">
                <button type="button" class="btn mb-5 mt-2" name="Cancel" onclick=location.href="registrobeneficiarios.php">Cancelar</button>
                <input type="submit" class="btn mb-5 mt-2" name="Update" value="Editar"></input>
            </div>

        <?php

        if (isset($_POST['Update'])) {
            $percentage = $_POST['percentage'];
            $name = $_POST['name'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $relationship = $_POST['relationship'];

            function alertdata(){
                echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, ingrese correctamente los valores!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                then(function(result){
                });
                </script>';
            }

            function alertsuccess()
            {
                echo '<script> Swal.fire({icon: "success", title: "Datos Actualizados", text: "¡Los datos han sido actualizados correctamente!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                    then(function(result){
                        if(result.value){                   
                            window.location = "registroBeneficiarios.php";
                        }
                    });
                    </script>';
            }

            function alerterror()
            {
                echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, intente más tarde!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                    then(function(result){
                        if(result.value){                   
                        }
                    });
                    </script>';
            }

            if (empty($percentage) || empty($name) || empty($firstname) || empty($lastname) || empty($phone) || empty($email) || empty($relationship)) {
                alertdata();
            } else {
                $query_porcentage = "SELECT SUM(Porcentaje) AS percentage FROM beneficiario WHERE IdAhorrador1 = '$id_ahor' and IdTipoBeneficiario1 = '$tb' and IdBeneficiario <> $id_decoded";
                $result_porcentage = mysqli_query($conn, $query_porcentage);
                $row_porcentage = mysqli_fetch_array($result_porcentage);
                $accumulated_percentage = $row_porcentage['percentage'];
                $flag = 100 - $accumulated_percentage;
                if($percentage > $flag){
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            El porcentaje máximo permitido es de <strong><?php echo $flag; ?>%</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                }else{
                    $ejecucion = $conn->query("UPDATE beneficiario SET Nombres = '$name', ApellidoPat = '$firstname', ApellidoMat = '$lastname', CorreoElec = '$email', Telefono = '$phone', Porcentaje = '$percentage', IdParentesco1 = '$relationship' WHERE IdBeneficiario = $id_decoded");
                    if ($ejecucion === TRUE) {
                        alertsuccess();
                    } else {
                        alerterror();
                    }
                }

                // echo $percentage, $name, $firstname, $lastname, $phone, $email;
                // echo $percentage;
            }

        }
    }
        ?>
        </div>

        </form>
        <?php
        include("footer.php");
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>