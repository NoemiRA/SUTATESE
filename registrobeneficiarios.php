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
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>SUTATESE - Beneficiarios</title>
    <?php include("navbar.php");
    ?>

</head>

<body>
    <?php
    if (isset($_SESSION['NumEmpleado5'])) {
        $NumEmpleado = $_SESSION['NumEmpleado5'];

        $sql = "SELECT IdAhorrador FROM cajaahorro WHERE NumEmpleado1 = '$NumEmpleado'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $IdAhorrador = $row['IdAhorrador'];

    ?>
        <h2 class="p-2 text-center mt-4"><strong>BENEFICIARIOS</strong></h2>
        <h6 class="p-2 text-center mt-4"><i>**Solo puede registrar máximo 3 Beneficiarios por cada tipo, recuerde cumplir el 100% para cada uno.**</i></h6>
        <form class="row g-3 mt-3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <div class="col-lg-5 d-block">
                <div class="content px-3 my-auto text-center">

                    <div class="row g-2 m-3">
                        <h2>Datos beneficiario</h2>
                        <div class="col-md-5">
                            <label for="porcentaje1" class="form-label">Porcentaje</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="percentage" min="0" max="100" placeholder="Seleccione el procentaje para el Beneficiario" />
                                <span class="input-group-text" id="basic-addon2">%</span>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="tipobeneficiario" class="form-label">Tipo Beneficiario</label>
                                <select class="form-control" id="TB" name="TB">
                                    <option selected disabled>Elige un tipo de beneficiario...</option>
                                    <?php
                                    $ejecucion = $conn->query("Select * from tipobeneficiario");

                                    foreach ($ejecucion as $opc) :
                                    ?>
                                        <option value="<?php echo $opc['IdTipoBeneficiario'] ?>"><?php echo $opc['TipoBeneficiario'] ?></option>
                                    <?php
                                    endforeach
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row g-2 m-3">
                        <div class="col-md-4">
                            <label for="nombre1" class="form-label">Nombre(s)</label>
                            <input type="text" class="form-control" name="name" placeholder="Nombre de Beneficiario 1" />
                        </div>
                        <div class="col-md-4">
                            <label for="apellidoPaterno1" class="form-label">Apellido Paterno</label>
                            <input type="text" class="form-control" name="firstname" placeholder="Apellido Paterno de Beneficiario 1" />
                        </div>
                        <div class="col-md-4">
                            <label for="apellidoMaterno1" class="form-label">Apellido Materno</label>
                            <input type="text" class="form-control" name="lastname" placeholder="Apellido Materno de Beneficiario 1" />
                        </div>
                    </div>

                    <div class="row g-2 m-3">
                        <div class="col-md-4">
                            <label for="telefono1" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" name="phone" maxlength="10" placeholder="ejem. 5555555555" />
                        </div>

                        <div class="col-md-4">
                            <label for="correo3" class="form-label">correo electrónico</label>
                            <input type="email" class="form-control" name="email" placeholder="example@email.com" />
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tipobeneficiario" class="form-label">Parentesco...</label>
                                <select class="form-control" id="relationship" name="relationship">
                                    <option selected disabled>Elige el parentesco...</option>
                                    <?php
                                    $parentesco = $conn->query("Select * from parentesco ORDER BY Parentesco ASC;");

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
                    <button type="button" class="btn mb-5 btn-primary " name="Cancel" onclick=location.href="registroCA.php">Regresar</button>
                    <input type="submit" class="btn mb-5 btn-success" value="Registrar" name="Insert"></input>
                </div>
            </div>

            <div class="col-lg-7 d-block">
                <div class="content px-3 my-auto text-center ">
                    <h2>Beneficiarios en caso de ausencia</h2>
                    <div class="table-responsive my-4">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido Paterno</th>
                                    <th scope="col">Apellido Materno</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Porcentaje</th>
                                    <th scope="col">Parentesco</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $query = "SELECT IdBeneficiario, Nombres, ApellidoPat, ApellidoMat, CorreoElec, Telefono, Porcentaje, Parentesco FROM beneficiario INNER JOIN parentesco on beneficiario.IdParentesco1 = parentesco.IdParentesco WHERE IdAhorrador1 = '$IdAhorrador' AND IdTipoBeneficiario1 = 'TB1' ORDER BY Porcentaje DESC";
                                $result_absence = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result_absence)) {
                                    $id = $row[0];
                                    $id_encoded = base64_encode($id);
                                ?>
                                    <tr>
                                        <td><?php echo $row['Nombres']; ?></td>
                                        <td><?php echo $row['ApellidoPat']; ?></td>
                                        <td><?php echo $row['ApellidoMat']; ?></td>
                                        <td><?php echo $row['CorreoElec']; ?></td>
                                        <td><?php echo $row['Telefono']; ?></td>
                                        <td><?php echo $row['Porcentaje']; ?>%</td>
                                        <td><?php echo $row['Parentesco']; ?></td>
                                        <td>
                                        <a href="edit.php?id=<?php echo $id_encoded;?>" title="Editar beneficiario" class="btn btn-warning" type="submit"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="registrobeneficiarios.php?id=<?php echo $id_encoded;?>" title="Eliminar beneficiario" class="btn btn-danger" type="submit" value="Eliminar" onclick="return confirm ('¿Esta seguro de eliminar el Beneficiario?')"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <h2>Beneficiarios en caso de muerte</h2>
                    <div class="table-responsive my-4">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido Paterno</th>
                                    <th scope="col">Apellido Materno</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Porcentaje</th>
                                    <th scope="col">Parentesco</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $query_d = "SELECT IdBeneficiario, Nombres, ApellidoPat, ApellidoMat, CorreoElec, Telefono, Porcentaje, Parentesco FROM beneficiario INNER JOIN parentesco on beneficiario.IdParentesco1 = parentesco.IdParentesco WHERE IdAhorrador1 = '$IdAhorrador' AND IdTipoBeneficiario1 = 'TB2' ORDER BY Porcentaje DESC";
                                $result_absence = mysqli_query($conn, $query_d);
                                while ($row = mysqli_fetch_array($result_absence)) {
                                    $id_d = $row[0];
                                    $id_encoded = base64_encode($id_d);
                                ?>
                                    <tr>
                                        <td><?php echo $row['Nombres']; ?></td>
                                        <td><?php echo $row['ApellidoPat']; ?></td>
                                        <td><?php echo $row['ApellidoMat']; ?></td>
                                        <td><?php echo $row['CorreoElec']; ?></td>
                                        <td><?php echo $row['Telefono']; ?></td>
                                        <td><?php echo $row['Porcentaje']; ?>%</td>
                                        <td><?php echo $row['Parentesco']; ?></td>
                                        <td>
                                            <a href="edit.php?id=<?php echo $id_encoded;?>" title="Editar beneficiario" class="btn btn-warning" type="submit"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="registrobeneficiarios.php?id=<?php echo $id_encoded;?>" title="Eliminar beneficiario" class="btn btn-danger" type="submit" value="Eliminar" onclick="return confirm ('¿Esta seguro de eliminar el Beneficiario?')"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="content px-3 my-auto text-center ">
            
            
            <?php
                    function alertsuccess()
                    {
                        echo '<script> Swal.fire({icon: "success", title: "Datos Ingresados", text: "¡Los datos han sido ingresados correctamente!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
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
                                window.location = "registroBeneficiarios.php";
                                }
                            });
                            </script>';
                    }

                    function alertdata()
                    {
                        echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, ingrese correctamente los valores!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                        then(function(result){
                            if(result.value){                   
                                window.location = "registroBeneficiarios.php";
                            }
                        });
                        </script>';
                    }

                    function alertdelete()
                    {
                        echo '<script> Swal.fire({icon: "success", title: "Datos Eliminados", text: "¡El beneficiario se he eliminado correctamente!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){                   
                                    window.location = "registroBeneficiarios.php";
                                }
                            });
                            </script>';
                    }

                    function process($conn, $IdAhorrador, $beneficiary, $percentage, $name, $firstname, $lastname, $email, $phone, $relationship)
                    {
                        $query_ausencia = "SELECT COUNT(*) FROM beneficiario WHERE IdAhorrador1 = '$IdAhorrador' and IdTipoBeneficiario1 = '$beneficiary'";
                        $result_ausencia = mysqli_query($conn, $query_ausencia);
                        $row = mysqli_fetch_array($result_ausencia);
                        if ($row[0] >= 3) {
                    ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Los 3 Beneficiarios han sido capturados.</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php
                        } else {
                            $query_porcentage = "SELECT SUM(Porcentaje) FROM beneficiario WHERE IdAhorrador1 = '$IdAhorrador' and IdTipoBeneficiario1 = '$beneficiary'";
                            $result_porcentage = mysqli_query($conn, $query_porcentage);
                            $row = mysqli_fetch_array($result_porcentage);
                            $accumulated_percentage = $row[0];
                            $flag = 100 - $accumulated_percentage;
                            if ($flag == 0) {
                            ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>El porcentaje se ha cubierto.</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php
                            } else if ($percentage > $flag) {
                            ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    El porcentaje asignado al beneficiario debe <strong> ser menor a <?php echo $flag; ?>%</strong> 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                    <?php
                            } else {
                                if ($accumulated_percentage < 100) {
                                    $ejecucion = $conn->query("INSERT INTO beneficiario VALUES ('','$IdAhorrador','$name','$firstname','$lastname','$email','$phone','$percentage','$beneficiary','$relationship')");
                                    if ($ejecucion === TRUE) {
                                        alertsuccess();
                                    } else {
                                        alerterror();
                                    }
                                }
                            }
                        }
                    }

                    if (isset($_POST['Insert'])) {
                        $percentage = $_POST['percentage'];
                        $name = $_POST['name'];
                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $phone = $_POST['phone'];
                        $beneficiary = filter_input(INPUT_POST, "TB");
                        $email = $_POST['email'];
                        $relationship = filter_input(INPUT_POST, "relationship");

                        if (empty($percentage) || empty($name) || empty($firstname) || empty($lastname) || empty($phone) || empty($beneficiary) || empty($email) || empty($relationship)) {
                            alertdata();
                        } else {
                            process($conn, $IdAhorrador, $beneficiary, $percentage, $name, $firstname, $lastname, $email, $phone, $relationship);
                        }
                    }

                    if(isset($_GET['id'])){
                        $id_decoded = base64_decode($_GET['id']);
                        $query_delete = $conn->query("DELETE FROM beneficiario where IdBeneficiario = $id_decoded");
                        if ($query_delete === TRUE) {
                            alertdelete();
                        } else {
                            alerterror();
                        }
                    }
                    ?>
                </div>
            </div>
            
        </form>
    <?php
    }
    include("footer.php");
    ?>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</html>