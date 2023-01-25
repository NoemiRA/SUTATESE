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

    <title>Agremiados</title>

    <?php include("navbar.php");?>

</head>

<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <div class="principal">
            <h1 class="display-3 m-4">PETICIÓN DE AGREMIADOS</h1>

            <div class="row g-0 h-50">
                <div class="d-grid gap-2 col-6 mx-auto d-md-block">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Buscar... " aria-label="Recipient's username" aria-describedby="button-addon2" name="is">
                        <input type="submit" class="btn btn-primary" value="Buscar" name="search"></input>
                    </div>
                    <a href="peticionPrestamo.php" class="btn btn-warning m-2 rounded-pill" data-bs-toggle="modal" data-bs-target="#news"><i class="fa-solid fa-plus"></i> NUEVOS AGREMIADOS</a>
                    <a href="peticionPrestamo.php" class="btn btn-success m-2 rounded-pill" data-bs-toggle="modal" data-bs-target="#accept"><i class="fa-solid fa-check"></i> AGREMIADOS ACEPTADOS</a>
                    <a href="peticionPrestamo.php" class="btn btn-danger m-2 rounded-pill" data-bs-toggle="modal" data-bs-target="#refused"><i class="fa-solid fa-x"></i> AGREMIADOS RECHAZADOS</a>
                </div>
            </div>


            <!-- Modal AGREMIADOS RECHAZADOS-->
            <div class="modal" id="refused" tabindex="-1" aria-labelledby="refusedModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title display-6" id="refusedModalLabel">AGREMIADOS RECHAZADOS</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive mx-1">
                                <table class="table table-m text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Número</th>
                                            <th scope="col">Empleado</th>
                                            <th scope="col">Correo</th>
                                            <th scope="col">Celular</th>
                                            <th scope="col">Teléfono</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT NumEmpleado1, Nombres, ApellidoPat, ApellidoMat, CorreoElec, Celular, Telefono FROM CAJAAHORRO INNER JOIN empleado on cajaahorro.NumEmpleado1 = empleado.NumEmpleado WHERE Estatus = 5";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?= $row['NumEmpleado1'];?></td>
                                                <td><?= $row['ApellidoPat']. ' ' . $row['ApellidoMat']. ' ' . $row['Nombres'];?></td>
                                                <td><?= $row['CorreoElec']; ?></td>
                                                <td><?= $row['Celular']; ?></td>
                                                <td><?= $row['Telefono']; ?></td>
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


            <!-- Modal AGREMIADOS ACEPTADOS-->
            <div class="modal" id="accept" tabindex="-1" aria-labelledby="acceptModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title display-6" id="acceptModalLabel">AGREMIADOS ACEPTADOS</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive mx-1">
                                <table class="table table-m text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Número</th>
                                            <th scope="col">Empleado</th>
                                            <th scope="col">Correo</th>
                                            <th scope="col">Celular</th>
                                            <th scope="col">Teléfono</th>
                                            <th scope="col">Cantidad Quincenal</th>
                                            <th scope="col">Tipo Ahorro</th>
                                            <th scope="col">Cantidad Total Ahorro</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $vt = 0;
                                        $query = "SELECT NumEmpleado1, Nombres, ApellidoPat, ApellidoMat, CorreoElec, Celular, Telefono, cantidadQuincenal, TipoAhorro, IdTipoAhorro1 FROM cajaahorro INNER JOIN empleado on cajaahorro.NumEmpleado1 = empleado.NumEmpleado INNER JOIN tipoahorro on cajaahorro.IdTipoAhorro1 = tipoahorro.IdTipoAhorro WHERE Estatus = 4";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $cta = $row['cantidadQuincenal'] * 24;
                                            $vt = $vt + $cta;
                                        ?>
                                            <tr>
                                                <td><?= $row['NumEmpleado1'];?></td>
                                                <td><?= $row['ApellidoPat']. ' ' . $row['ApellidoMat']. ' ' . $row['Nombres'];?></td>
                                                <td><?= $row['CorreoElec']; ?></td>
                                                <td><?= $row['Celular']; ?></td>
                                                <td><?= $row['Telefono']; ?></td>
                                                <th scope="row">$ <?= $row['cantidadQuincenal'];?> M.N.</td>
                                                <td><?= $row['TipoAhorro'];?></td>
                                                <th scope="row">$ <?= $cta;?> M.N.</td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        <tr>
                                            <th scope="row" colspan="7" class = "text-end table-active">Cantidad Total Acumulada: </td>
                                            <th scope="row" class="table-active">$ <?= $vt ?> M.N.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal NUEVOS AGREMIADOS-->
            <div class="modal" id="news" tabindex="-1" aria-labelledby="newsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title display-6" id="newsModalLabel">NUEVOS AGREMIADOS</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive mx-1">
                                <table class="table table-bordered table-m text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Id Asigando</th>
                                            <th scope="col">Empleado</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Correo</th>
                                            <th scope="col">Celular</th>
                                            <th scope="col">Teléfono</th>
                                            <th scope="col">Cantidad Quincenal</th>
                                            <th scope="col">Tipo de Ahorro</th>
                                            <th scope="col">Formato de Cuota</th>
                                            <th scope="col">Solicitud Aportación</th>                            
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT IdAhorrador, NumEmpleado1, Nombres, ApellidoPat, ApellidoMat, CorreoElec, Celular, Telefono, CantidadQuincenal, TipoAhorro FROM empleado INNER JOIN cajaahorro ON empleado.NumEmpleado = cajaahorro.NumEmpleado1 INNER JOIN tipoahorro ON cajaahorro.IdTipoAhorro1 = tipoahorro.IdTipoAhorro WHERE Estatus = 3";

                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id_request = $row[0];
                                            $id_encoded_request = base64_encode($id_request);
                                        ?>
                                            <tr>
                                                <td><?= $row['IdAhorrador'];?></td>
                                                <td><?= $row['NumEmpleado1'];?></td>
                                                <td><?= $row['ApellidoPat']. ' ' . $row['ApellidoMat']. ' ' . $row['Nombres'];?></td>
                                                <td><?= $row['CorreoElec']; ?></td>
                                                <td><?= $row['Celular']; ?></td>
                                                <td><?= $row['Telefono']; ?></td>
                                                <th scope="row">$ <?= $row['CantidadQuincenal'];?> M.N.</td>
                                                <td><?= $row['TipoAhorro'];?></td>
                                                <td>
                                                    <a href="doc.php?id=<?= $id_encoded_request;?>&opt=share" class="btn btn-info" target="_blank"><i class="fa-solid fa-file-pdf"></i></a>
                                                </td>
                                                <td>
                                                    <a href="doc.php?id=<?= $id_encoded_request;?>&opt=input" class="btn btn-info" target="_blank"><i class="fa-solid fa-file-pdf"></i></a>
                                                </td>
                                                
                                                <td class="d-flex justify-content-center">
                                                    <a href="agremiado.php?id=<?= $id_encoded_request;?>&option=docs" class="btn btn-warning mx-1" name="docs" onclick="return request()"><i class="fa-solid fa-circle-info"></i>CORREGIR</a>
                                                    <a href="agremiado.php?id=<?= $id_encoded_request;?>&option=accept" class="btn btn-success mx-1" name="accept" onclick="return request()"><i class="fa-solid fa-check"></i>ACEPTAR</a>
                                                    <a href="agremiado.php?id=<?= $id_encoded_request;?>&option=decline" class="btn btn-danger mx-1" name="cancel" onclick="return request()"><i class="fa-solid fa-x"></i>CANCELAR</a>
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
                function formatsuccess(){
                    echo '<script> Swal.fire({icon: "success", title: "Cambiado de Estatus", text: "¡El inversionista aparecerá en la siguiente etapa!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                                then(function(result){
                                    if(result.value){
                                        window.location = "agremiado.php";                       
                                    }
                                });
                                </script>';
                }

                function cancelsuccess(){
                    echo '<script> Swal.fire({icon: "success", title: "Cambiado de Estatus", text: "¡Se ha rechazado el inversionista!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                                then(function(result){
                                    if(result.value){ 
                                        window.location = "agremiado.php";  
                                    }
                                });
                                </script>';
                }

                function alerterror(){
                    echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, intente más tarde!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                                then(function(result){
                                    if(result.value){   
                                        window.location = "agremiado.php";                  
                                    }
                                });
                                </script>';
                }

                function alertdata(){
                    echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, ingrese correctamente los valores!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){       
                                    window.location = "agremiado.php";              
                                }
                            });
                            </script>';
                }

                if(isset($_GET['id']) && isset($_GET['option'])){
                    $id_decoded = base64_decode($_GET['id']);
                    $option = $_GET['option'];
                    
                    switch ($option){
                        case "accept":
                            $Estatus = 4;
                            operation($conn, $Estatus, $id_decoded);
                        break;
                        case "decline":
                            $Estatus = 5;
                            operation($conn, $Estatus, $id_decoded);
                        break;
                        case "docs":
                            $Estatus = 0;
                            operation($conn, $Estatus, $id_decoded);
                        break;
                    }
                }

                function operation($conn, $Estatus, $id_request){
                    $format = $conn->query("UPDATE cajaahorro SET Estatus = '" . $Estatus . "' WHERE IdAhorrador = '". $id_request . "'");
                    if ($format === TRUE) {
                        formatsuccess();
                    } else {
                        alerterror();
                    }
                }

                if(isset($_POST['search'])){
                    $input = $_POST['is'];
                    $query = "SELECT NumEmpleado1, Nombres, ApellidoPat, ApellidoMat, CorreoElec, Celular, Telefono, cantidadQuincenal, TipoAhorro, IdTipoAhorro1,Estatus FROM cajaahorro INNER JOIN empleado on cajaahorro.NumEmpleado1 = empleado.NumEmpleado INNER JOIN tipoahorro on cajaahorro.IdTipoAhorro1 = tipoahorro.IdTipoAhorro WHERE NumEmpleado1 LIKE '" . $input . "%' OR Nombres LIKE '%" . $input . "%' OR ApellidoPat LIKE '%" . $input . "%' OR ApellidoMat LIKE '%" . $input . "%'";
                    $result = mysqli_query($conn, $query);
                    $count_results = mysqli_num_rows($result);
    
                    if($count_results > 0){
                        ?>
                        <div class="table-responsive m-5">
                            <table class="table table-bordered table-m text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Número</th>
                                        <th scope="col">Empleado</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Celular</th>
                                        <th scope="col">Teléfono</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Tipo Ahorro</th>
                                        <th scope="col">Cantidad Total(Sin interes)</th>
                                        <th scope="col">Estatus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $vt = 0;
                                    while ($row = mysqli_fetch_array($result)) {
                                        $cta = $row['cantidadQuincenal'] * 24;
                                        $vt = $vt + $cta;
                                        $es = $row['Estatus'];
                                            switch ($es){
                                                case 0:
                                                    $ms = 'Registro datos fundamentales';
                                                break;
                                                case 2:
                                                    $ms = 'Aceptar que los datos estén correctos';
                                                break;
                                                case 3:
                                                    $ms = 'En espera de aprobación, sus documentos han sido subidos';
                                                break;
                                                case 4:
                                                    $ms = 'Agremiado aceptado';
                                                break;
                                                case 5:
                                                    $ms = 'Solicitud rechazada';
                                                break;
                                            }
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $row['NumEmpleado1'];?></td>
                                            <td><?= $row['ApellidoPat']. ' ' . $row['ApellidoMat']. ' ' . $row['Nombres'];?></td>
                                            <td><?= $row['CorreoElec']; ?></td>
                                            <td><?= $row['Celular']; ?></td>
                                            <td><?= $row['Telefono']; ?></td>
                                            <th scope="row">$ <?= $row['cantidadQuincenal'];?> M.N.</td>
                                            <td><?= $row['TipoAhorro'];?></td>
                                            <th scope="row">$ <?= $vt; ?> M.N.</td>
                                            <td><?= $ms?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <?php
                    }
                    else {
                        echo '<h2>No se encuentran resultados con los criterios de búsqueda.</h2>';
                    }
                }
            ?>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>