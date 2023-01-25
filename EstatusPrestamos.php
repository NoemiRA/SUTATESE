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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>SUTATESE - Información Préstamos</title>
    <?php include("navbar.php"); ?>

</head>

<body>
    <script>
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            icon: 'warning',
            title: 'Advertencia',
            text: 'En caso de tener cualquier duda con su préstamo, o cambiar el plazo de pago, por favor acudir al sindicato.',
            reverseButtons: true
        })
    </script>

    <?php

    if (isset($_SESSION['NumEmpleado5'])) {
        $NumEmpleado = $_SESSION['NumEmpleado5'];
    ?>
        <div class="text-center m-5">
            <h2 class="p-2 text-center"><strong>INFORMACIÓN PRÉSTAMOS</strong></h2>
            <div class="table-responsive mx-1 shadow-lg p-3 mb-5 bg-body rounded">
                <table class="table table-bordered table-m text-center">

                    <thead class="text-center table-head" style="background-color:#00102E; color: #ffffff;">
                        <tr>
                            <th>Cantidad solicitada</th>
                            <th>Fecha de solicitud</th>
                            <th>Tipo de préstamo</th>
                            <th>Fecha de Deposito</th>
                            <th>Estatus Préstamo</th>
                        </tr>
                    </thead>

                    <tbody id="tbody_1" class="text-center fs-5">
                        <?php
                        if (isset($_SESSION['NumEmpleado5'])) {
                            $query = "SELECT  NumEmpleado3, IdPrestamo, CantidadSolicitada,  FechaSolicitud, Estatus, FechaDeposito, IdTipoPrestamo1, TipoPrestamo FROM prestamo INNER JOIN tipoprestamo on prestamo.IdTipoPrestamo1 = tipoprestamo.IdTipoPrestamo WHERE NumEmpleado3 = '$NumEmpleado';";
                            $result_absence = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result_absence)) {
                                $es = $row['Estatus'];
                                $eb = $row['IdTipoPrestamo1'];
                            ?>
                                <tr>
                                <th scope="row">$ <?php echo $row['CantidadSolicitada']; ?> M.N.</td>
                                    <?php
                                    if($eb == "P2" || $eb == "P3"){
                                        switch ($es){
                                            case 1:
                                                $ms = 'Espera de aprobación';
                                            break;
                                            case 2:
                                                $ms = 'Préstamo Aceptado';
                                            break;
                                            case 3:
                                                $ms = 'No aceptado';
                                            break;
                                            case 4:
                                                $ms = 'Préstamo liquidado';
                                            break;
                                        }
                                    }else{
                                        switch ($es){
                                            case 1:
                                                $ms = 'En proceso de registro';
                                            break;
                                            case 2:
                                                $ms = 'En espera de respuesta';
                                            break;
                                            case 3:
                                                $ms = 'No aceptado';
                                            break;
                                            case 4:
                                                $ms = 'Préstamo Aceptado';
                                            break;
                                            case 5:
                                                $ms = 'Préstamo liquidado';
                                            break;
                                        }
                                    }
                                    ?>
                                        <td><?php echo $row['FechaSolicitud'] ?></td>
                                        <td><?php echo $row['TipoPrestamo'] ?></td>
                                        <td><?php echo $row['FechaDeposito'] ?></td>
                                        <td><?php echo $ms ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
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
                                                    <a href="agremiado.php?id=<?= $id_encoded_request;?>&option=docs" class="btn btn-warning mx-1" name="docs" onclick="return request()"><i class="fa-solid fa-circle-info"></i></a>
                                                    <a href="agremiado.php?id=<?= $id_encoded_request;?>&option=accept" class="btn btn-success mx-1" name="accept" onclick="return request()"><i class="fa-solid fa-check"></i></a>
                                                    <a href="agremiado.php?id=<?= $id_encoded_request;?>&option=decline" class="btn btn-danger mx-1" name="cancel" onclick="return request()"><i class="fa-solid fa-x"></i></a>
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


        </div>
    <?php
    }
    include("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/app.js"></script>
</body>
</html>