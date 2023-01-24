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

    <title>Inversionistas</title>

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
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <div class="principal">
            <h1 class="display-3 m-4">INVERSIONISTAS</h1>
            <?php
                $sql = "SELECT SUM(Cantidad) FROM inversionista WHERE Estatus = 4";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                if(empty($row[0])){
                    $acum = 0;
                }else{
                    $acum = $row[0];
                }

                date_default_timezone_set("America/Mexico_City");
                $FechaActual = date('Y-m-d');

            ?>
            <div class="alert alert-danger mx-5" role="alert">
                Cantidad total acumulada: <b>$ <?php echo $acum ?></b> M.N. 
            </div>

            <div class="row g-0 h-50">
                <div class="d-grid gap-2 col-6 mx-auto d-md-block">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Buscar... " aria-label="Recipient's username" aria-describedby="button-addon2" name="is">
                        <input type="submit" class="btn btn-primary" value="Buscar" name="search"></input>
                    </div>
                </div>
                <div class="d-grid gap-2 col-11 mx-auto d-md-block">

                    <a href="inversionista.php" class="btn btn-success m-3 rounded-pill" data-bs-toggle="modal" data-bs-target="#new"><i class="fa-solid fa-file-circle-plus"></i> NUEVOS INVERSIONISTAS</a>
                    <a href="inversionista.php" class="btn btn-primary m-3 rounded-pill" data-bs-toggle="modal" data-bs-target="#deposit"><i class="fa-solid fa-money-bill"></i> DEPÓSITOS</a>
                    <a href="inversionista.php" class="btn btn-warning m-3 rounded-pill" data-bs-toggle="modal" data-bs-target="#repayment"><i class="fa-solid fa-money-check-dollar"></i> ASIGNAR DEVOLUCIONES</a>
                    <a href="inversionista.php" class="btn btn-info m-3 rounded-pill" data-bs-toggle="modal" data-bs-target="#done"><i class="fa-solid fa-list-check"></i> DEVOLUCIONES REALIZADAS</a>
                    <a href="inversionista.php" class="btn btn-danger m-3 rounded-pill" data-bs-toggle="modal" data-bs-target="#refused"><i class="fa-solid fa-x"></i> INVERSIONISTAS NO ACEPTADOS</a>

                </div>
            </div>


            <!-- Modal NUEVOS INVERSIONISTAS-->
            <div class="modal" id="new" tabindex="-1" aria-labelledby="newModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title display-6" id="newModalLabel">NUEVOS INVERSIONISTAS</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive mx-1">
                                <table class="table table-bordered table-m text-center table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Empleado</th>
                                            <th scope="col">Apellido Paterno</th>
                                            <th scope="col">Apellido Materno</th>
                                            <th scope="col">Nombre (s)</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT IdInversionista, NumEmpleado6, Nombres, ApellidoPat, ApellidoMat, Cantidad FROM inversionista INNER JOIN empleado on inversionista.NumEmpleado6 = empleado.NumEmpleado WHERE Estatus = 1";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id_request = $row[0];
                                            $id_encoded_request = base64_encode($id_request);
                                        ?>
                                            <tr>
                                                <td><?= $row['NumEmpleado6'];?></td>
                                                <td><?= $row['ApellidoPat'];?></td>
                                                <td><?php echo $row['ApellidoMat'];?></td>
                                                <td><?= $row['Nombres'];?></td>
                                                <th scope="row">$ <?= $row['Cantidad'];?> M.N.</td>
                                                <td>
                                                    <a href="inversionista.php?id=<?= $id_encoded_request;?>&option=accept" class="btn btn-success" name="accept" onclick="return request()"><i class="fa-solid fa-check"></i></a>
                                                    <a href="inversionista.php?id=<?= $id_encoded_request;?>&option=decline" class="btn btn-danger" name="cancel" onclick="return request()"><i class="fa-solid fa-x"></i></a>
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


            <!-- Modal INVERSIONISTAS NO ACEPTADOS-->
            <div class="modal" id="refused" tabindex="-1" aria-labelledby="refusedModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title display-6" id="newModalLabel">INVERSIONISTAS NO ACEPTADOS</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive mx-1">
                                <table class="table table-bordered table-m text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Empleado</th>
                                            <th scope="col">Apellido Paterno</th>
                                            <th scope="col">Apellido Materno</th>
                                            <th scope="col">Nombre (s)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT IdInversionista, NumEmpleado6, Nombres, ApellidoPat, ApellidoMat, Cantidad FROM inversionista INNER JOIN empleado on inversionista.NumEmpleado6 = empleado.NumEmpleado WHERE Estatus = 3";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id_request = $row[0];
                                            $id_encoded_request = base64_encode($id_request);
                                        ?>
                                            <tr>
                                                <td><?= $row['NumEmpleado6'];?></td>
                                                <td><?= $row['ApellidoPat'];?></td>
                                                <td><?php echo $row['ApellidoMat'];?></td>
                                                <td><?= $row['Nombres'];?></td>
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


            <!-- Modal DEPOSITOS REALIZADOS-->
            <div class="modal" id="deposit" tabindex="-1" aria-labelledby="depositModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title display-6" id="newModalLabel">DEPOSITOS REALIZADOS</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive mx-1">
                                <table class="table table-bordered table-m text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Id asignado</th>
                                            <th scope="col">Empleado</th>
                                            <th scope="col">Apellido Paterno</th>
                                            <th scope="col">Apellido Materno</th>
                                            <th scope="col">Nombre (s)</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT IdInversionista, NumEmpleado6, Nombres, ApellidoPat, ApellidoMat, Cantidad FROM inversionista INNER JOIN empleado on inversionista.NumEmpleado6 = empleado.NumEmpleado WHERE Estatus = 2";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id_request = $row[0];
                                            $id_encoded_request = base64_encode($id_request);
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $row['IdInversionista'];?></td>
                                                <td><?= $row['NumEmpleado6'];?></td>
                                                <td><?= $row['ApellidoPat'];?></td>
                                                <td><?= $row['ApellidoMat'];?></td>
                                                <td><?= $row['Nombres'];?></td>
                                                <th scope="row">$ <?= $row['Cantidad'];?> M.N.</td>
                                                <td>
                                                    <a href="inversionista.php?id=<?= $id_encoded_request;?>&option=pay" class="btn btn-success" name="pay" onclick="return request()"><i class="fa-solid fa-money-check-dollar"></i> Pago realizado</a>                                
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


            <!-- Modal DEVOLUCIONES-->
            <div class="modal" id="repayment" tabindex="-1" aria-labelledby="repaymentModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title display-6" id="newModalLabel">DEVOLUCIÓN A INVERSIONISTAS</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive mx-1">
                                <table class="table table-bordered table-m text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Id asignado</th>
                                            <th scope="col">Empleado</th>
                                            <th scope="col">Apellido Paterno</th>
                                            <th scope="col">Apellido Materno</th>
                                            <th scope="col">Nombre (s)</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT IdInversionista, NumEmpleado6, Nombres, ApellidoPat, ApellidoMat, Cantidad FROM inversionista INNER JOIN empleado on inversionista.NumEmpleado6 = empleado.NumEmpleado WHERE Estatus = 4";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id_pay = $row[0];
                                            $id_pay = base64_encode($id_pay);
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $row['IdInversionista'];?></td>
                                                <td><?= $row['NumEmpleado6']; ?></td>
                                                <td><?= $row['ApellidoPat']; ?></td>
                                                <td><?= $row['ApellidoMat']; ?></td>
                                                <td><?= $row['Nombres']; ?></td>
                                                <th scope="row">$ <?= $row['Cantidad'];?> M.N.</td>
                                                <td>
                                                    <a href="inversionista.php" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-id = "<?= $id_pay; ?>"><i class="fa-regular fa-calendar"></i> Registrar devolución</a>                                
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


            <!-- Modal DEVOLUCIONES REALIZADAS-->
            <div class="modal" id="done" tabindex="-1" aria-labelledby="doneModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title display-6" id="newModalLabel">DEVOLUCIONES REALIZADAS</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive mx-1">
                                <table class="table table-bordered table-m text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Empleado</th>
                                            <th scope="col">Apellido Paterno</th>
                                            <th scope="col">Apellido Materno</th>
                                            <th scope="col">Nombre (s)</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Registro Deposito</th>
                                            <th scope="col">Registro Devolución</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT IdInversionista, NumEmpleado6, Nombres, ApellidoPat, ApellidoMat, Cantidad, FechaDeposito, FechaDevolucion FROM inversionista INNER JOIN empleado on inversionista.NumEmpleado6 = empleado.NumEmpleado WHERE Estatus = 5";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id_request = $row[0];
                                            $id_encoded_request = base64_encode($id_request);
                                        ?>
                                            <tr>
                                                <td><?= $row['NumEmpleado6'];?></td>
                                                <td><?= $row['ApellidoPat'];?></td>
                                                <td><?php echo $row['ApellidoMat'];?></td>
                                                <td><?= $row['Nombres'];?></td>
                                                <th scope="row">$ <?= $row['Cantidad'];?> M.N.</td>
                                                <td><?= $row['FechaDeposito'];?></td>
                                                <td><?= $row['FechaDevolucion'];?></td>
                                                <td>
                                                    <a href="inversionista.php?id=<?= $id_encoded_request;?>&option=done" class="btn btn-success" name="accept" onclick="return request()"><i class="fa-solid fa-check"></i></a>
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


            <!-- Modal FECHA -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title display-6" id="newModalLabel">FECHA</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="id" name= "id">
                            <label for="date" class="form-label">Ingresa la fecha de devolución: <b>*</b></label>
                            <input type="date" class="form-control" name="input_date" id="input_date" min="<?= $FechaActual;?>"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" class="btn btn-success" name ="Update" value="Registrar"></input>

                            <?php
                                    if(isset($_POST['Update'])){
                                        $id_modal = base64_decode($_POST['id']);
                                        $repayment = $_POST['input_date'];
                                        if(empty($repayment)){
                                            dataerror();
                                        }else{
                                            $format = $conn->query("UPDATE inversionista SET Estatus = '5' , FechaDevolucion = '" . $repayment . "' WHERE IdInversionista = '" . $id_modal . "'");
                                            if ($format === TRUE) {
                                                formatsuccess();
                                            } else {
                                                alerterror();
                                            }
                                        }
                                    }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php
            function formatsuccess(){
                echo '<script> Swal.fire({icon: "success", title: "Operación realizada con éxito", text: "¡Se ha realizado la operación con éxito!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){
                                    window.location = "inversionista.php";
                                }
                            });
                            </script>';
            }

            function cancelsuccess(){
                echo '<script> Swal.fire({icon: "success", title: "Operación Rechazada", text: "¡Se ha rechazado la operación!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){ 
                                    window.location = "inversionista.php";
                                }
                            });
                            </script>';
            }

            function alerterror(){
                echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, intente más tarde!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){   
                                    window.location = "inversionista.php";
                                }
                            });
                            </script>';
            }

            function dataerror(){
                echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, ingrese los datos correctamente!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){   
                                }
                            });
                            </script>';
            }
            
            function operation($conn, $Estatus, $id_request){
                $format = $conn->query("UPDATE inversionista SET Estatus = '" . $Estatus . "' WHERE IdInversionista = '". $id_request . "'");
                if ($format === TRUE) {
                    formatsuccess();
                } else {
                    alerterror();
                }
            }

            if(isset($_GET['id']) && isset($_GET['option'])){
                $id_decoded = base64_decode($_GET['id']);
                $option = $_GET['option'];
                
                switch ($option){
                    case "accept":
                        $Estatus = 2;
                        operation($conn, $Estatus, $id_decoded);
                    break;
                    case "decline":
                        $Estatus = 3;
                        operation($conn, $Estatus, $id_decoded);
                    break;
                    case "pay":
                        $Estatus = 4;
                        $format = $conn->query("UPDATE inversionista SET Estatus = '" . $Estatus . "', FechaDeposito =  '" . $FechaActual . "' WHERE IdInversionista = '". $id_decoded . "'");
                        if ($format === TRUE) {
                            formatsuccess();
                        } else {
                            alerterror();
                        }
                    break;
                    case "done":
                        $Estatus = 6;
                        operation($conn, $Estatus, $id_decoded);
                    break;
                }
            }

            if(isset($_POST['search'])){
                $input = $_POST['is'];
                $query ="SELECT IdInversionista, NumEmpleado6, Nombres, ApellidoPat, ApellidoMat, Cantidad, Estatus, FechaDeposito, FechaDevolucion, CorreoElec, Celular, Telefono FROM inversionista INNER JOIN empleado on inversionista.NumEmpleado6 = empleado.NumEmpleado WHERE NumEmpleado6 LIKE '" . $input . "%' OR Nombres LIKE '%" . $input . "%' OR ApellidoPat LIKE '%" . $input . "%' OR ApellidoMat LIKE '%" . $input . "%'";
                $result = mysqli_query($conn, $query);
                $count_results = mysqli_num_rows($result);

                if($count_results > 0){
                    ?>
                        <div class="table-responsive m-5">
                            <table class="table table-bordered table-m text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Id asignado</th>
                                        <th scope="col">Número</th>
                                        <th scope="col">Empleado</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Celular</th>
                                        <th scope="col">Teléfono</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Estatus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                        $id_pay = $row[0];
                                        $id_pay = base64_encode($id_pay);
                                        $eb = $row['Estatus'];
                                        switch ($eb){
                                            case 1:
                                                $eb = 'Espera de aprobación';
                                            break;
                                            case 2:
                                                $eb = 'Aceptado - Falta deposito';
                                            break;
                                            case 3:
                                                $eb = 'No aceptado';
                                            break;
                                            case 4:
                                                $eb = 'Aceptado - Deposito Procedente';
                                            break;
                                            case 5:
                                                $eb = 'Devolución programada: '. $eb = $row['FechaDevolucion'];
                                            break;
                                            case 6:
                                                $eb = 'Devolución realizada';
                                            break;
                                        }
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $row['IdInversionista'];?></td>
                                            <td><?= $row['NumEmpleado6']; ?></td>
                                            <td><?= $row['ApellidoPat']. ' ' . $row['ApellidoMat']. ' ' . $row['Nombres'];?></td>
                                            <td><?= $row['CorreoElec']; ?></td>
                                            <td><?= $row['Celular']; ?></td>
                                            <td><?= $row['Telefono']; ?></td>
                                            <th scope="row">$ <?= $row['Cantidad'];?></td>
                                            <td><?= $eb?></td>
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