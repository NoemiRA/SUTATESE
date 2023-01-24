<?php
session_start();
include('conexion.php');

if (empty($_SESSION['User'])) {
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
    <link rel="stylesheet" href="css/style_a.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>Empleados</title>

    <?php include("navbar.php");?>

</head>

<script>
    function request() {
        var respuesta = confirm("¿Esta seguro de efectuar la operación? Una vez realizada es irreversible");
        if (respuesta == true) {
            return true;
        } else {
            return false;
        }
    }
</script>

<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
    <div class="principal">
            <h1 class="display-3 m-4">REGISTRO EMPLEADOS</h1>
            <a href="empleado.php" class="btn btn-success m-3 rounded-pill" data-bs-toggle="modal" data-bs-target="#accepted"><i class="fa-solid fa-list-check"></i> EMPLEADOS ACEPTADOS</a>
            <a href="empleado.php" class="btn btn-warning m-3 rounded-pill" data-bs-toggle="modal" data-bs-target="#drop"><i class="fa-solid fa-user"></i> ELIMINAR ACCESO</a>  
            <a href="empleado.php" class="btn btn-danger m-3 rounded-pill" data-bs-toggle="modal" data-bs-target="#block"><i class="fa-solid fa-user"></i> CUENTAS BLOQUEADAS</a>  

            <div class="table-responsive mx-1">
                <table class="table table-bordered table-m text-center">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Empleado</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">CURP</th>
                            <th scope="col">RFC</th>
                            <th scope="col">División</th>
                            <th scope="col">Correo Electrónico</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Licenciatura</th>
                            <th scope="col">Maestría</th>
                            <th scope="col">Doctorado</th>
                            <th scope="col">Nómina</th>
                            <th scope="col">Credencial</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT NumEmpleado, Nombres, ApellidoPat, ApellidoMat, FechaNac, Curp, Rfc, FechaIng, CorreoElec, Celular, Telefono, Calle, Numero, DelMun, Colonia, IdEstado1, Cp, IdDivision1, ExpProfesional, ExpDocAdmin, Licenciatura, CedLic, InstLic, Maestria, CedMae, InstMae, Doctorado, CedDoc, InstDoc, Nomina, Credencial, Foto, Division, Estado FROM empleado INNER JOIN DIVISION ON Division.IdDivision = empleado.IdDivision1 INNER JOIN estado ON empleado.IdEstado1 = estado.IdEstado LEFT JOIN logeo on empleado.NumEmpleado = logeo.NumEmpleado5 WHERE NumEmpleado5 IS NULL;";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            $id_request = $row[0];
                            $id_encoded_request = base64_encode($id_request);
                        ?>
                            <tr>
                                <td><?= $row['NumEmpleado'];?></td>
                                <td>
                                    <img src="data:image/png; base64,<?php echo base64_encode($row['Foto']) ?>" width="80" height="80">
                                </td>
                                <td><?= $row['ApellidoPat']. ' ' . $row['ApellidoMat']. ' ' . $row['Nombres'];?></td>
                                <td><?= $row['Curp'];?></td>
                                <td><?= $row['Rfc'];?></td>
                                <td><?= $row['Division'];?></td>
                                <td><?= $row['CorreoElec'];?></td>
                                <td><?= $row['Celular'];?></td>
                                <td><?= $row['Telefono'];?></td>
                                <td><?= $row['Calle']. ', ' . $row['Numero']. ', ' . $row['DelMun']. ', ' . $row['Colonia']. ', ' . $row['Estado']. ', ' . $row['Cp'];?></td>
                                <td><?= $row['Licenciatura']. ' - ' . $row['CedLic']. ' - ' . $row['InstLic'];?></td>
                                <td><?= $row['Maestria']. ' - ' . $row['CedMae']. ' - ' . $row['InstMae'];?></td>
                                <td><?= $row['Doctorado']. ' - ' . $row['CedDoc']. ' - ' . $row['InstDoc'];?></td>
                                <td>
                                    <a href="doc.php?id=<?= $id_encoded_request;?>&opt=payroll" class="btn btn-warning" target="_blank"><i class="fa-solid fa-file-pdf"></i></a>
                                </td>
                                <td>
                                    <a href="doc.php?id=<?= $id_encoded_request;?>&opt=credential" class="btn btn-info" target="_blank"><i class="fa-solid fa-file-pdf"></i></a>
                                </td>
                                <td class="d-flex">
                                    <a href="empleado.php?id=<?= $id_encoded_request;?>&option=accept" class="btn btn-success mx-1" name="accept" onclick="return request()"><i class="fa-solid fa-check"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>


        <!-- Modal EMPLEADOS ACEPTADOS -->
        <div class="modal fade" id="accepted" tabindex="-1" aria-labelledby="acceptedModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title display-6" id="acceptedModalLabel">EMPLEADOS ACEPTADOS</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive mx-1">
                            <table class="table table-bordered table-m text-center table-hover">
                                <thead class="table-dark">
                                    <tr>
                                    <th scope="col">Empleado</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">CURP</th>
                                    <th scope="col">RFC</th>
                                    <th scope="col">División</th>
                                    <th scope="col">Correo Electrónico</th>
                                    <th scope="col">Celular</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Licenciatura</th>
                                    <th scope="col">Maestría</th>
                                    <th scope="col">Doctorado</th>
                                    <th scope="col">Contraseña</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT NumEmpleado, Nombres, ApellidoPat, ApellidoMat, FechaNac, Curp, Rfc, FechaIng, CorreoElec, Celular, Telefono, Calle, Numero, DelMun, Colonia, IdEstado1, Cp, IdDivision1, ExpProfesional, ExpDocAdmin, Licenciatura, CedLic, InstLic, Maestria, CedMae, InstMae, Doctorado, CedDoc, InstDoc, Nomina, Credencial, Foto, Division, Estado, Contraseña FROM empleado INNER JOIN DIVISION ON Division.IdDivision = empleado.IdDivision1 INNER JOIN estado ON empleado.IdEstado1 = estado.IdEstado INNER JOIN logeo on empleado.NumEmpleado = logeo.NumEmpleado5 WHERE User = 0;";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id_request = $row[0];
                                            $id_encoded_request = base64_encode($id_request);
                                    ?>
                                        <tr>
                                            <td><?= $row['NumEmpleado'];?></td>
                                            <td>
                                                <img src="data:image/png; base64,<?php echo base64_encode($row['Foto']) ?>" width="80" height="80">
                                            </td>
                                            <td><?= $row['ApellidoPat']. ' ' . $row['ApellidoMat']. ' ' . $row['Nombres'];?></td>
                                            <td><?= $row['Curp'];?></td>
                                            <td><?= $row['Rfc'];?></td>
                                            <td><?= $row['Division'];?></td>
                                            <td><?= $row['CorreoElec'];?></td>
                                            <td><?= $row['Celular'];?></td>
                                            <td><?= $row['Telefono'];?></td>
                                            <td><?= $row['Calle']. ', ' . $row['Numero']. ', ' . $row['DelMun']. ', ' . $row['Colonia']. ', ' . $row['Estado']. ', ' . $row['Cp'];?></td>
                                            <td><?= $row['Licenciatura']. ' - ' . $row['CedLic']. ' - ' . $row['InstLic'];?></td>
                                            <td><?= $row['Maestria']. ' - ' . $row['CedMae']. ' - ' . $row['InstMae'];?></td>
                                            <td><?= $row['Doctorado']. ' - ' . $row['CedDoc']. ' - ' . $row['InstDoc'];?></td>
                                            <td><?= $row['Contraseña'];?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal ELIMINAR ACCESO -->
        <div class="modal fade" id="drop" tabindex="-1" aria-labelledby="dropModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title display-6" id="dropModalLabel">ELIMINAR ACCESO</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive mx-1">
                            <table class="table table-bordered table-m text-center table-hover">
                                <thead class="table-dark">
                                    <tr>
                                    <th scope="col">Empleado</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">CURP</th>
                                    <th scope="col">RFC</th>
                                    <th scope="col">División</th>
                                    <th scope="col">Correo Electrónico</th>
                                    <th scope="col">Celular</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Contraseña</th>
                                    <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT NumEmpleado, Nombres, ApellidoPat, ApellidoMat, FechaNac, Curp, Rfc, CorreoElec, Celular, Telefono, IdDivision1, Foto, Division, Contraseña FROM empleado INNER JOIN DIVISION ON Division.IdDivision = empleado.IdDivision1 INNER JOIN logeo on empleado.NumEmpleado = logeo.NumEmpleado5 WHERE User = 0;";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id_request = $row[0];
                                            $id_encoded_request = base64_encode($id_request);
                                    ?>
                                        <tr>
                                            <td><?= $row['NumEmpleado'];?></td>
                                            <td>
                                                <img src="data:image/png; base64,<?php echo base64_encode($row['Foto']) ?>" width="80" height="80">
                                            </td>
                                            <td><?= $row['ApellidoPat']. ' ' . $row['ApellidoMat']. ' ' . $row['Nombres'];?></td>
                                            <td><?= $row['Curp'];?></td>
                                            <td><?= $row['Rfc'];?></td>
                                            <td><?= $row['Division'];?></td>
                                            <td><?= $row['CorreoElec'];?></td>
                                            <td><?= $row['Celular'];?></td>
                                            <td><?= $row['Telefono'];?></td>
                                            <td><?= $row['Contraseña'];?></td>
                                            <td>
                                                <a href="empleado.php?id=<?= $id_encoded_request;?>&option=block" class="btn btn-danger mx-1" name="block" onclick="return request()"><i class="fa-solid fa-x"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal LIBERAR ACCESO -->
        <div class="modal fade" id="block" tabindex="-1" aria-labelledby="blockModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title display-6" id="blockModalLabel">DESBLOQUEAR ACCESO</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive mx-1">
                            <table class="table table-bordered table-m text-center table-hover">
                                <thead class="table-dark">
                                    <tr>
                                    <th scope="col">Empleado</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">CURP</th>
                                    <th scope="col">RFC</th>
                                    <th scope="col">División</th>
                                    <th scope="col">Correo Electrónico</th>
                                    <th scope="col">Celular</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Contraseña</th>
                                    <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT NumEmpleado, Nombres, ApellidoPat, ApellidoMat, FechaNac, Curp, Rfc, CorreoElec, Celular, Telefono, IdDivision1, Foto, Division, Contraseña FROM empleado INNER JOIN DIVISION ON Division.IdDivision = empleado.IdDivision1 INNER JOIN logeo on empleado.NumEmpleado = logeo.NumEmpleado5 WHERE User = 1;";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id_request = $row[0];
                                            $id_encoded_request = base64_encode($id_request);
                                    ?>
                                        <tr>
                                            <td><?= $row['NumEmpleado'];?></td>
                                            <td>
                                                <img src="data:image/png; base64,<?php echo base64_encode($row['Foto']) ?>" width="80" height="80">
                                            </td>
                                            <td><?= $row['ApellidoPat']. ' ' . $row['ApellidoMat']. ' ' . $row['Nombres'];?></td>
                                            <td><?= $row['Curp'];?></td>
                                            <td><?= $row['Rfc'];?></td>
                                            <td><?= $row['Division'];?></td>
                                            <td><?= $row['CorreoElec'];?></td>
                                            <td><?= $row['Celular'];?></td>
                                            <td><?= $row['Telefono'];?></td>
                                            <td><?= $row['Contraseña'];?></td>
                                            <td>
                                                <a href="empleado.php?id=<?= $id_encoded_request;?>&option=unlock" class="btn btn-warning mx-1" name="unlock" onclick="return request()"><i class="fa-solid fa-check"></i> DESBLOQUEAR</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            

        <?php
            function formatsuccess($Nombre, $email, $pass){
                echo '<script> Swal.fire({icon: "success", title: "Cambiado de Estatus", text: "¡El empleado '.$Nombre.' con correo: '.$email.' está dado de alta con la contraseña '.$pass.'!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){
                                    window.location = "empleado.php";                       
                                }
                            });
                            </script>';
            }

            function success(){
                echo '<script> Swal.fire({icon: "success", title: "Baja acceso", text: "¡El empleado está dado de BAJA!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){
                                    window.location = "empleado.php";                       
                                }
                            });
                            </script>';
            }

            function alerterror(){
                echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, intente más tarde!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){   
                                    window.location = "empleado.php";                  
                                }
                            });
                            </script>';
            }

            function insert($conn, $id_request){
                $chairs = '0123456789abcdefghijkLMNOPQRSTUVXYZ';
                $pass = substr(str_shuffle($chairs), 0, 8);

                $sql = "Select NumEmpleado, Nombres, ApellidoPat, ApellidoMat, CorreoElec from empleado where NumEmpleado = $id_request";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                $Nombre = $row['NumEmpleado'] .' - '. $row['Nombres'] .' '. $row['ApellidoPat'] .' '. $row['Nombres'];
                $email =$row['CorreoElec'];
                
                $format = $conn->query("INSERT INTO logeo VALUES (" . $id_request . ", '". $pass . "', 0)");
                if ($format === TRUE) {
                    formatsuccess($Nombre, $email, $pass);
                } else {
                    alerterror();
                }
            }
            function operation($conn, $us, $id_request){                
                $format = $conn->query("UPDATE logeo SET User = $us WHERE NumEmpleado5 = $id_request;");
                if ($format === TRUE) {
                    success();
                } else {
                    alerterror();
                }
            }

            if(isset($_GET['id']) && isset($_GET['option'])){
                $id_decoded = base64_decode($_GET['id']);
                $option = $_GET['option'];
                switch ($option){
                    case "accept":
                        insert($conn, $id_decoded);
                    break;
                    case "block":
                        $us = 1;
                        operation($conn, $us, $id_decoded);
                    break;
                    case "unlock":
                        $us = 0;
                        operation($conn, $us, $id_decoded);
                    break;
                    
                }
            }
        ?>
    </form>


    <script>
        let dateModal = document.getElementById('exampleModal')

        dateModal.addEventListener('shown.bs.modal', event => {
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')
            let input_date = dateModal.querySelector('.modal-body #id')
            input_date.value = id
        })
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>