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

    <title>Préstamos</title>

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
            <h1 class="display-3 m-4">PETICIONES DE PRÉSTAMOS</h1>
            <?php
                date_default_timezone_set("America/Mexico_City");
                $FechaActual = date('Y-m-d');
            ?>

            <div class="row g-0 h-50">
                <div class="d-grid gap-2 col-6 mx-auto d-md-block">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Buscar... " aria-label="Recipient's username" aria-describedby="button-addon2" name="is">
                        <input type="submit" class="btn btn-primary" value="Buscar" name="search"></input>
                    </div>
                </div>
                <div class="d-grid gap-2 col-10 mx-auto d-md-block">
                    <a href="controlPrestamo.php" class="btn btn-warning m-3 rounded-pill" data-bs-toggle="modal" data-bs-target="#deposits"><i class="fa-solid fa-money-bill"></i> DÉPOSITOS PARA HOY</a>
                    <a href="controlPrestamo.php" class="btn btn-success m-1 rounded-pill" data-bs-toggle="modal" data-bs-target="#accept"><i class="fa-solid fa-check"></i> PRÉSTAMOS ACEPTADOS</a>
                    <a href="controlPrestamo.php" class="btn btn-danger m-1 rounded-pill" data-bs-toggle="modal" data-bs-target="#refused"><i class="fa-solid fa-x"></i> PRÉSTAMOS RECHAZADOS</a>
                    <a href="pagos.php" class="btn btn-outline-success m-1 rounded-pill"><i class="fa-solid fa-file-invoice"></i> REGISTRO DE PAGOS</a>
                </div>
                <div class="d-grid gap-2 col-9 mx-auto d-md-block">
                    <div class="table-responsive mx-1">
                        <table class="table table-m text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">CAJA DE AHORRO</th>
                                    <th scope="col">NÓMINA</th>
                                    <th scope="col">AVAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                        acumulate($conn, 'P2');
                                        acumulate($conn, 'P3');
                                        acumulate($conn, 'P1');
                                    ?>                                    
                                </tr>
                                <tr>
                                    <td><a href="controlPrestamo.php" class="btn btn-primary m-1 rounded-pill" data-bs-toggle="modal" data-bs-target="#nca"><i class="fa-solid fa-file-circle-plus"></i> PETICIÓN NUEVOS</a></td>
                                    <td><a href="controlPrestamo.php" class="btn btn-primary m-1 rounded-pill" data-bs-toggle="modal" data-bs-target="#nn"><i class="fa-solid fa-file-circle-plus"></i> PETICIÓN NUEVOS</a></td>
                                    <td><a href="controlPrestamo.php" class="btn btn-primary m-1 rounded-pill" data-bs-toggle="modal" data-bs-target="#av"><i class="fa-solid fa-file-circle-plus"></i> PETICIÓN NUEVOS</a></td>
                                </tr>
                                <tr>
                                    <td><a href="controlPrestamo.php" class="btn btn-outline-primary m-1 rounded-pill" data-bs-toggle="modal" data-bs-target="#repayment"><i class="fa-solid fa-calendar-days"></i> REGISTRAR DÉPOSITO<a></td>
                                    <td><a href="controlPrestamo.php" class="btn btn-outline-primary m-1 rounded-pill" data-bs-toggle="modal" data-bs-target="#repaymentn"><i class="fa-solid fa-calendar-days"></i> REGISTRAR DÉPOSITO<a></td>
                                    <td><a href="controlPrestamo.php" class="btn btn-outline-primary m-1 rounded-pill" data-bs-toggle="modal" data-bs-target="#repaymenta"><i class="fa-solid fa-calendar-days"></i> REGISTRAR DÉPOSITO<a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <!-- Modal DEPÓSITOS DE HOY-->
            <div class="modal" id="deposits" tabindex="-1" aria-labelledby="depositsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title display-6" id="depositsModalLabel">DEPÓSITOS PARA HOY</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive mx-1">
                                <table class="table table-m text-center table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Fecha Solicitud</th>
                                            <th scope="col">Id Solicitud</th>
                                            <th scope="col">Titular</th>
                                            <th scope="col">Institución Bancaria</th>
                                            <th scope="col">No. CLABE</th>
                                            <th scope="col">Cantidad Solicitada</th>
                                            <th scope="col">Tipo Préstamo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT IdPrestamo, Nombres, ApellidoPat, ApellidoMat, FechaSolicitud, CantidadSolicitada, InstitucionBancaria, Clabe, TipoPrestamo FROM empleado INNER JOIN datosbancarios on empleado.NumEmpleado = datosbancarios.NumEmpleado2 INNER JOIN banco on datosbancarios.IdBanco1 = banco.IdBanco INNER JOIN prestamo on empleado.NumEmpleado = prestamo.NumEmpleado3 INNER JOIN tipoprestamo on prestamo.IdTipoPrestamo1 = tipoprestamo.IdTipoPrestamo WHERE (IdTipoPrestamo1 = 'P2' OR IdTipoPrestamo1 = 'P1' OR IdTipoPrestamo1 = 'P3') AND FechaDeposito = '$FechaActual'";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id_request = $row[0];
                                            $id_encoded_request = base64_encode($id_request);
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $row['FechaSolicitud'];?></td>
                                                <td><?= $row['IdPrestamo'];?></td>
                                                <td><?= $row['ApellidoPat']. ' ' . $row['ApellidoMat']. ' ' . $row['Nombres'];?></td>
                                                <td><?php echo $row['InstitucionBancaria'];?></td>
                                                <td><?= $row['Clabe'];?></td>
                                                <th scope="row">$ <?= $row['CantidadSolicitada'];?> M.N.</td>
                                                <td><?= $row['TipoPrestamo'];?></td>
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


            <!-- Modal PRÉSTAMOS RECHAZADOS-->
            <div class="modal" id="refused" tabindex="-1" aria-labelledby="refusedModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title display-6" id="refusedModalLabel">PRÉSTAMOS RECHAZADOS</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive mx-1">
                                <table class="table table-m text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Fecha Solicitud</th>
                                            <th scope="col">Número</th>
                                            <th scope="col">Empleado</th>
                                            <th scope="col">Cantidad Solicitada</th>
                                            <th scope="col">Intereses</th>
                                            <th scope="col">Tipo Préstamo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT IdPrestamo, NumEmpleado, Nombres, ApellidoPat, ApellidoMat, FechaSolicitud, CantidadSolicitada, Interes, TipoPrestamo FROM prestamo INNER JOIN empleado on prestamo.NumEmpleado3 = empleado.NumEmpleado INNER JOIN tipoprestamo on prestamo.IdTipoPrestamo1 = tipoprestamo.IdTipoPrestamo WHERE Estatus = 3";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id_request = $row[0];
                                            $id_encoded_request = base64_encode($id_request);
                                        ?>
                                            <tr>
                                                <td><?= $row['FechaSolicitud'];?></td>
                                                <td><?= $row['NumEmpleado'];?></td>
                                                <td><?= $row['ApellidoPat']. ' ' . $row['ApellidoMat']. ' ' . $row['Nombres'];?></td>
                                                <th scope="row">$ <?= $row['CantidadSolicitada'];?> M.N.</td>
                                                <th scope="row">$ <?= $row['Interes'];?> M.N.</td>
                                                <th scope="row"><?= $row['TipoPrestamo'];?></td>
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


            <!-- Modal ACEPTADOS-->
            <div class="modal" id="accept" tabindex="-1" aria-labelledby="acceptModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title display-6" id="acceptModalLabel">PRÉSTAMOS ACEPTADOS</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive mx-1">
                                <table class="table table-m text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Fecha Solicitud</th>
                                            <th scope="col">Número</th>
                                            <th scope="col">Empleado</th>
                                            <th scope="col">Cantidad Solicitada</th>
                                            <th scope="col">Intereses</th>
                                            <th scope="col">Fecha Depósito</th>
                                            <th scope="col">Tipo Préstamo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT IdPrestamo, NumEmpleado, Nombres, ApellidoPat, ApellidoMat, FechaSolicitud, CantidadSolicitada, Interes, TipoPrestamo, FechaDeposito FROM prestamo INNER JOIN empleado on prestamo.NumEmpleado3 = empleado.NumEmpleado INNER JOIN tipoprestamo on prestamo.IdTipoPrestamo1 = tipoprestamo.IdTipoPrestamo WHERE ((IdTipoPrestamo ='P2' OR IdTipoPRestamo ='P3') AND Estatus = 2) OR (IdTipoPrestamo ='P1' AND Estatus = 4)";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id_request = $row[0];
                                            $id_encoded_request = base64_encode($id_request);
                                        ?>
                                            <tr>
                                                <td><?= $row['FechaSolicitud'];?></td>
                                                <td><?= $row['NumEmpleado'];?></td>
                                                <td><?= $row['ApellidoPat']. ' ' . $row['ApellidoMat']. ' ' . $row['Nombres'];?></td>
                                                <th scope="row">$ <?= $row['CantidadSolicitada'];?> M.N.</td>
                                                <th scope="row">$ <?= $row['Interes'];?> M.N.</td>
                                                <td><?= $row['FechaDeposito'];?></td>
                                                <th scope="row"><?= $row['TipoPrestamo'];?></td>
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


            <!-- Modal PRÉSTAMO POR CAJA DE AHORRO-->
            <div class="modal" id="nca" tabindex="-1" aria-labelledby="ncaModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title display-6" id="ncaModalLabel">PRÉSTAMOS POR CAJA DE AHORRO</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive mx-1">
                                <table class="table table-m text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Fecha Solicitud</th>
                                            <th scope="col">Empleado</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Cantidad Solicitada</th>
                                            <th scope="col">Intereses</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT IdPrestamo, NumEmpleado3, Nombres, ApellidoPat, ApellidoMat, FechaSolicitud, CantidadSolicitada, Interes FROM prestamo INNER JOIN empleado on prestamo.NumEmpleado3 = empleado.NumEmpleado WHERE Estatus = 1 AND IdTipoPrestamo1 = 'P2'";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id_request = $row[0];
                                            $id_encoded_request = base64_encode($id_request);
                                        ?>
                                            <tr>
                                                <td><?= $row['FechaSolicitud'];?></td>
                                                <td><?= $row['NumEmpleado3'];?></td>
                                                <td><?= $row['ApellidoPat']. ' ' . $row['ApellidoMat']. ' ' . $row['Nombres'];?></td>
                                                <th scope="row">$ <?= $row['CantidadSolicitada'];?> M.N.</td>
                                                <th scope="row">$ <?= $row['Interes'];?> M.N.</td>
                                                <td class="d-flex justify-content-center">
                                                    <a href="controlPrestamo.php?id=<?= $id_encoded_request;?>&option=accept" class="btn btn-success mx-1" name="accept" onclick="return request()"><i class="fa-solid fa-check"></i></a>
                                                    <a href="controlPrestamo.php?id=<?= $id_encoded_request;?>&option=decline" class="btn btn-danger" name="cancel" onclick="return request()"><i class="fa-solid fa-x"></i></a>
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


            <!-- Modal DEVOLUCIONES CAJA DE AHORRO-->
            <div class="modal" id="repayment" tabindex="-1" aria-labelledby="repaymentModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title display-6" id="newModalLabel">DEPÓSITOS</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive mx-1">
                                <table class="table table-m text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Fecha Solicitud</th>
                                            <th scope="col">Empleado</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Cantidad Solicitada</th>
                                            <th scope="col">Intereses</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT IdPrestamo, NumEmpleado3, Nombres, ApellidoPat, ApellidoMat, FechaSolicitud, CantidadSolicitada, Interes FROM prestamo INNER JOIN empleado on prestamo.NumEmpleado3 = empleado.NumEmpleado WHERE Estatus = 2 AND IdTipoPrestamo1 = 'P2' AND FechaDeposito IS NULL";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id_request = $row[0];
                                            $id_encoded_request = base64_encode($id_request);
                                        ?>
                                            <tr>
                                                <td><?= $row['FechaSolicitud'];?></td>
                                                <td><?= $row['NumEmpleado3'];?></td>
                                                <td><?= $row['ApellidoPat']. ' ' . $row['ApellidoMat']. ' ' . $row['Nombres'];?></td>
                                                <th scope="row">$ <?= $row['CantidadSolicitada'];?> M.N.</td>
                                                <th scope="row">$ <?= $row['Interes'];?> M.N.</td>
                                                <td>
                                                    <a href="controlPrestamo.php" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-id = "<?= $id_encoded_request; ?>"><i class="fa-regular fa-calendar"></i> Registrar devolución</a>                                
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


            <!-- Modal PRESTAMO NÓMINA-->
            <div class="modal" id="nn" tabindex="-1" aria-labelledby="nnModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title display-6" id="nnModalLabel">PRESTAMO POR NÓMINA</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive mx-1">
                                <table class="table table-bordered table-m text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Fecha Solicitud</th>
                                            <th scope="col">Empleado</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Cantidad Solicitada</th>
                                            <th scope="col">Poder Créditicio Quincenal</th>
                                            <th scope="col">Nómina</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT IdPrestamo, NumEmpleado3, Nombres, ApellidoPat, ApellidoMat, FechaSolicitud, CantidadSolicitada, PoderCrediticio FROM prestamo INNER JOIN empleado on prestamo.NumEmpleado3 = empleado.NumEmpleado WHERE Estatus = 1 AND IdTipoPrestamo1 = 'P3'";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id_request = $row[0];
                                            $id_encoded_request = base64_encode($id_request);
                                        ?>
                                            <tr>
                                                <td><?= $row['FechaSolicitud'];?></td>
                                                <td><?= $row['NumEmpleado3'];?></td>
                                                <td><?= $row['ApellidoPat']. ' ' . $row['ApellidoMat']. ' ' . $row['Nombres'];?></td>
                                                <th scope="row">$ <?= $row['CantidadSolicitada'];?> M.N.</td>
                                                <th scope="row">$ <?= $row['PoderCrediticio'];?> M.N.</td>
                                                <td>
                                                    <a href="doc.php?id=<?= $id_encoded_request;?>&opt=pay" class="btn btn-info" target="_blank"><i class="fa-solid fa-file-pdf"></i></a>
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                    <a href="controlPrestamo.php?id=<?= $id_encoded_request;?>&option=accept" class="btn btn-success mx-1" name="accept" onclick="return request()"><i class="fa-solid fa-check"></i></a>
                                                    <a href="controlPrestamo.php?id=<?= $id_encoded_request;?>&option=decline" class="btn btn-danger" name="cancel" onclick="return request()"><i class="fa-solid fa-x"></i></a>
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

            
            <!-- Modal DEVOLUCIONES NOMINA-->
            <div class="modal" id="repaymentn" tabindex="-1" aria-labelledby="repaymentnModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title display-6" id="repaymentnModalLabel">DEPÓSITOS</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive mx-1">
                                <table class="table table-m text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Fecha Solicitud</th>
                                            <th scope="col">Empleado</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Cantidad Solicitada</th>
                                            <th scope="col">Intereses</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT IdPrestamo, NumEmpleado3, Nombres, ApellidoPat, ApellidoMat, FechaSolicitud, CantidadSolicitada, Interes FROM prestamo INNER JOIN empleado on prestamo.NumEmpleado3 = empleado.NumEmpleado WHERE Estatus = 2 AND IdTipoPrestamo1 = 'P3' AND FechaDeposito IS NULL";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id_request = $row[0];
                                            $id_encoded_request = base64_encode($id_request);
                                        ?>
                                            <tr>
                                                <td><?= $row['FechaSolicitud'];?></td>
                                                <td><?= $row['NumEmpleado3'];?></td>
                                                <td><?= $row['ApellidoPat']. ' ' . $row['ApellidoMat']. ' ' . $row['Nombres'];?></td>
                                                <th scope="row">$ <?= $row['CantidadSolicitada'];?> M.N.</td>
                                                <th scope="row">$ <?= $row['Interes'];?> M.N.</td>
                                                <td>
                                                    <a href="controlPrestamo.php" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-id = "<?= $id_encoded_request; ?>"><i class="fa-regular fa-calendar"></i> Registrar devolución</a>                                
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


            <!-- Modal PRESTAMO AVAL -->
            <div class="modal" id="av" tabindex="-1" aria-labelledby="avModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title display-6" id="avModalLabel">PRÉSTAMO POR AVAL</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive mx-1">
                                <table class="table table-bordered table-m text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Fecha Solicitud</th>
                                            <th scope="col">Empleado</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Aval</th>
                                            <th scope="col">Cantidad Aval</th>
                                            <th scope="col"></th>
                                            <th scope="col">Cantidad Solicitada</th>
                                            <th scope="col">Interes</th>
                                            <th scope="col">Pagare</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT IdPrestamo, NumEmpleado3, Nombres, ApellidoPat, ApellidoMat, FechaSolicitud, CantidadSolicitada, IdAhorrador1, Interes FROM prestamo INNER JOIN empleado on prestamo.NumEmpleado3 = empleado.NumEmpleado WHERE Estatus = 2 AND IdTipoPrestamo1 = 'P1'";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id_request = $row[0];
                                            $id_encoded_request = base64_encode($id_request);
                                            $aval = $row['IdAhorrador1'];
                                        ?>
                                            <tr>
                                                <td><?= $row['FechaSolicitud'];?></td>
                                                <td><?= $row['NumEmpleado3'];?></td>
                                                <td><?= $row['ApellidoPat']. ' ' . $row['ApellidoMat']. ' ' . $row['Nombres'];?></td>

                                                <?php
                                                $query_aval = "SELECT NumEmpleado, Nombres, ApellidoPat, ApellidoMat FROM cajaahorro INNER JOIN empleado on cajaahorro.NumEmpleado1 = empleado.NumEmpleado WHERE IdAhorrador = '" . $aval . "'";
                                                $result_aval = mysqli_query($conn, $query_aval);
                                                while ($row_aval = mysqli_fetch_array($result_aval)) {
                                                ?>
                                                    <td><?= $row_aval['NumEmpleado']. '-' . $row_aval['ApellidoPat']. ' ' . $row_aval['ApellidoMat']. ' ' . $row_aval['Nombres'];?></td>
                                                <?php                                                    

                                                $ejecucion_ca = $conn->query("CALL savingsAvailable(" .$row_aval['NumEmpleado']. ", @saldo)");
                                                if ($ejecucion_ca === TRUE) {
                                                    $sql_ca = "SELECT @saldo;";
                                                    $result_ca = mysqli_query($conn, $sql_ca);
                                                    $row_ca = mysqli_fetch_array($result_ca);
                                                    $amount_ca = $row_ca[0];
                                                    
                                                }
                                            }
                                                ?> 
                                                    <th scope="row">$ <?= $amount_ca;?> M.N.</td> 
                                                <?php

                                                $exist = "SELECT IdAhorrador1 FROM prestamo WHERE IdAhorrador1 = '" . $aval . "' AND Estatus = 4";
                                                $result_exist = mysqli_query($conn, $exist);
                                                $rowExist = mysqli_fetch_array($result_exist);
                                                $countExist = mysqli_num_rows($result_exist);
                                                if($countExist >=1) {
                                                echo'
                                                    <td><i class="fa-solid fa-x"></i> '.$countExist.'</td>';
                                                }else{
                                                echo'
                                                    <td><i class="fa-solid fa-check"></i></td>';
                                                }
                                            
                                            ?>
                                            <th scope="row">$ <?= $row['CantidadSolicitada'];?> M.N.</td>
                                            <th scope="row">$ <?= $row['Interes'];?> M.N.</td>
                                            <td>
                                                <a href="doc.php?id=<?= $id_encoded_request;?>&opt=promissory " class="btn btn-info" target="_blank"><i class="fa-solid fa-file-pdf"></i></a>
                                            </td>
                                                <td class="d-flex justify-content-center">
                                                    <a href="controlPrestamo.php?id=<?= $id_encoded_request;?>&option=acceptav" class="btn btn-success mx-1"
                                                    name="acceptv" onclick="return request()"><i class="fa-solid fa-check"></i></a>
                                                    <a href="controlPrestamo.php?id=<?= $id_encoded_request;?>&option=decline" class="btn btn-danger"
                                                    name="cancel" onclick="return request()"><i class="fa-solid fa-x"></i></a>
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


            <!-- Modal DEVOLUCIONES AVAL-->
            <div class="modal" id="repaymenta" tabindex="-1" aria-labelledby="repaymentaModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title display-6" id="repaymentaModalLabel">DEPÓSITOS</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive mx-1">
                                <table class="table table-m text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Fecha Solicitud</th>
                                            <th scope="col">Empleado</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Cantidad Solicitada</th>
                                            <th scope="col">Intereses</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT IdPrestamo, NumEmpleado3, Nombres, ApellidoPat, ApellidoMat, FechaSolicitud, CantidadSolicitada, Interes FROM prestamo INNER JOIN empleado on prestamo.NumEmpleado3 = empleado.NumEmpleado WHERE Estatus = 4 AND IdTipoPrestamo1 = 'P1' ";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id_request = $row[0];
                                            $id_encoded_request = base64_encode($id_request);
                                        ?>
                                            <tr>
                                                <td><?= $row['FechaSolicitud'];?></td>
                                                <td><?= $row['NumEmpleado3'];?></td>
                                                <td><?= $row['ApellidoPat']. ' ' . $row['ApellidoMat']. ' ' . $row['Nombres'];?></td>
                                                <th scope="row">$ <?= $row['CantidadSolicitada'];?> M.N.</td>
                                                <th scope="row">$ <?= $row['Interes'];?> M.N.</td>
                                                <td>
                                                    <a href="controlPrestamo.php" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-id = "<?= $id_encoded_request; ?>"><i class="fa-regular fa-calendar"></i> Registrar devolución</a>                                
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
                            <label for="date" class="form-label">Ingresa la fecha correspondeinte al déposito: <b>*</b></label>
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
                                            $format = $conn->query("UPDATE prestamo SET FechaDeposito = '" . $repayment . "' WHERE IdPrestamo = '" . $id_modal . "'");
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
                    echo '<script> Swal.fire({icon: "success", title: "Estatus Cambiado", text: "¡Petición aceptada!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                                then(function(result){
                                    if(result.value){
                                        window.location = "controlPrestamo.php";                       
                                    }
                                });
                                </script>';
                }

                function cancelsuccess(){
                    echo '<script> Swal.fire({icon: "success", title: "Estatus Cambiado", text: "¡Se ha rechazado la petición al préstamo!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                                then(function(result){
                                    if(result.value){ 
                                        window.location = "controlPrestamo.php";  
                                    }
                                });
                                </script>';
                }

                function alerterror(){
                    echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, intente más tarde!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                                then(function(result){
                                    if(result.value){   
                                        window.location = "controlPrestamo.php";                  
                                    }
                                });
                                </script>';
                }

                function alertdata(){
                    echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, ingrese correctamente los valores!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){       
                                    window.location = "controlPrestamo.php";              
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
                    $format = $conn->query("UPDATE prestamo SET Estatus = $Estatus WHERE IdPrestamo = '$id_request'");
                    if ($format === TRUE) {
                        formatsuccess();
                    } else {
                        alerterror();
                    }
                }

                function acumulate($conn, $Est){
                    if($Est == 'P1'){
                        $flag = 5;
                    }else{
                        $flag = 2;
                    }
                    $consulta = "SELECT SUM(CantidadSolicitada), SUM(Interes) FROM prestamo WHERE IdTipoPrestamo1 = '$Est' AND (Estatus = 4 OR Estatus = '$flag')";
                    $result_consulta = mysqli_query($conn, $consulta);
                    $row = mysqli_fetch_array($result_consulta); 

                    if(empty($row[0])){
                        $row[0] = 0;
                    }if(empty($row[1])){
                        $row[1] = 0;
                    }
                    echo'<td><p>Cantidad Solicitada: <b>$ '. $row[0] .' M.N.</b></p><p>Intereses Acumulados: <b>$ '.$row[1].' M.N.</b></p></td>';
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
                        case "acceptav":
                            $Estatus = 4;
                            operation($conn, $Estatus, $id_decoded);
                        break;
                    }
                }

                if(isset($_POST['search'])){
                    $input = $_POST['is'];
                    $query ="SELECT IdPrestamo, NumEmpleado3, Nombres, ApellidoPat, ApellidoMat, CantidadSolicitada, Interes, Estatus, FechaDeposito, FechaDeposito, IdTipoPrestamo1, TipoPrestamo FROM prestamo INNER JOIN empleado on prestamo.NumEmpleado3 = empleado.NumEmpleado INNER JOIN tipoprestamo on prestamo.IdTipoPrestamo1 = tipoprestamo.IdTipoPrestamo WHERE NumEmpleado3 LIKE '" . $input . "%' OR Nombres LIKE '%" . $input . "%' OR ApellidoPat LIKE '%" . $input . "%' OR ApellidoMat LIKE '%" . $input . "%'";
                    $result = mysqli_query($conn, $query);
                    $count_results = mysqli_num_rows($result);
    
                    if($count_results > 0){
                        ?>
                        <div class="table-responsive m-5">
                            <table class="table table-bordered table-m text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Id asignado</th>
                                        <th scope="col">Empleado</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Interes Generado</th>
                                        <th scope="col">Tipo Préstamo</th>
                                        <th scope="col">Estatus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                        $eb = $row['IdTipoPrestamo1'];
                                        $es = $row['Estatus'];
                                        if($eb == "P2" || $eb == "P3"){
                                            switch ($es){
                                                case 1:
                                                    $ms = 'Espera de aprobación';
                                                break;
                                                case 2:
                                                    $ms = 'Aceptado con deposito el dia: '.$row['FechaDeposito'];
                                                break;
                                                case 3:
                                                    $ms = 'No aceptado';
                                                break;
                                            }
                                        }else{
                                            switch ($es){
                                                case 1:
                                                    $ms = 'En proceso de registro';
                                                break;
                                                case 2:
                                                    $ms = 'En proceso de registro';
                                                break;
                                                case 3:
                                                    $ms = 'No aceptado';
                                                break;
                                                case 4:
                                                    $ms = 'Aceptado con deposito el dia: '.$row['FechaDeposito'];
                                                break;
                                                
                                            }
                                        }
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $row['IdPrestamo'];?></td>
                                            <td><?= $row['NumEmpleado3']; ?></td>
                                            <td><?= $row['ApellidoPat']. ' ' . $row['ApellidoMat']. ' ' . $row['Nombres'];?></td>
                                            <th scope="row">$ <?= $row['CantidadSolicitada'];?> M.N.</td>
                                            <th scope="row">$ <?= $row['Interes'];?> M.N.</td>
                                            <td><?= $row['TipoPrestamo']; ?></td>
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