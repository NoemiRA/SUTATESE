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
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>SUTATESE - Caja Ahorro</title>
    <?php include("navbar.php");
    ?>
</head>

<body>
    <?php
    if (isset($_SESSION['NumEmpleado5'])) {
        $NumEmpleado = $_SESSION['NumEmpleado5'];

        $sql = "SELECT IdAhorrador, NumEmpleado1, CantidadQuincenal, FormatoCuota, SolicitudAportacion, IdTipoAhorro, TipoAhorro, Estatus FROM cajaahorro inner join tipoahorro on cajaahorro.IdTipoAhorro1 = tipoahorro.IdTipoAhorro WHERE NumEmpleado1 = '$NumEmpleado' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        if($row["Estatus"] == 3){
            ?>
            <div class="text-center m-5">
                    <h1 class="p-3">CAJA DE AHORRO</h1>
                    <div class="card text-center m-3">
                        <div class="card-header display-6">
                            Error...
                        </div>
                        <div class="card-body">
                            <h1 class="card-text display-6">Su solicitud está pendiente de aprobación, por favor intente más tarde.</h1>
                            <a href="registroCA.php" class="btn btn-danger">REGRESAR</a>
                        </div>
                    </div>
            </div>

            <?php
        }
        if($row["Estatus"] == 4){
    ?>
        <div class="text-center m-5 p-3 rounded">
            <div class="row bg-light">
                <h1 class="p-3">CAJA DE AHORRO</h1>
                <div class="col-lg-3">
                    <h3 class="display-6"><strong>Agremiado a la caja de ahorro</strong></h3>
                </div>

                <div class="col-lg-9">
                    <div class="col-xs-9">
                        <div class="row m-3">
                            <label for="description" class="col col-form-label fw-bold text-end">Tipo de fondo:</label>
                            <div class="col">
                                <input type="text" class="form-control " name="tipoFondo" id="tipoFondo" value="<?php echo $row[6] ?>" disabled>
                            </div>
                        </div>
                        <?php
                        $i = 0;
                        $saldo = 0;
                        $total = $row[2] * 24;
                        ?>
                        <div class="row m-3">
                            <label for="description" class="col col-form-label fw-bold text-end">Descuento quincenal:</label>
                            <div class="col">
                                <input type="text" class="form-control" value="$<?php echo $row[2] ?> MXN" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row m-3">
                        <label for="description" class="col col-form-label fw-bold text-end">Total a ahorrar:</label>
                        <div class="col">
                            <input type="text" class="form-control" value="$<?php echo $total ?> MXN" disabled>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row-lg-7 my-4 text-center mx-0">
                <div class="table-responsive my-4 shadow-lg p-3 mb-5 bg-body rounded">
                    <table id="table-2" class="table table-bordered " style="width: 100%; text-align: right; border: 1px gray solid;
                                border-collapse: collapse">
                        <thead class="text-center" style="background-color:#00102E; color: #ffffff;">
                            <tr>
                            <tr>
                                <th>Quincenas</th>
                                <th>Mes</th>
                                <th>Abono</th>
                                <th>Saldos</th>

                            </tr>
                        </thead>
                        <tbody class="text-center">

                            <?php
                            $i = 1;
                            while ($i <= 24) {

                                $saldo = $saldo + $row[2];
                            ?>
                                <tr>
                                    <th><?php echo $i ?></th>
                                    <?php
                                    if ($i == 1 || $i == 2) {
                                        echo '<td>Diciembre</td>';
                                    } elseif ($i == 3 || $i == 4) {
                                        echo '<td>Enero</td>';
                                    } elseif ($i == 5 || $i == 6) {
                                        echo '<td>Febrero</td>';
                                    } elseif ($i == 7 || $i == 8) {
                                        echo '<td>Marzo</td>';
                                    } elseif ($i == 9 || $i == 10) {
                                        echo '<td>Abril</td>';
                                    } elseif ($i == 11 || $i == 12) {
                                        echo '<td>Mayo</td>';
                                    } elseif ($i == 13 || $i == 14) {
                                        echo '<td>Junio</td>';
                                    } elseif ($i == 15 || $i == 16) {
                                        echo '<td>Julio</td>';
                                    } elseif ($i == 17 || $i == 18) {
                                        echo '<td>Agosto</td>';
                                    } elseif ($i == 19 || $i == 20) {
                                        echo '<td>Septiembre</td>';
                                    } elseif ($i == 21 || $i == 22) {
                                        echo '<td>Octubre</td>';
                                    } elseif ($i == 23 || $i == 24) {
                                        echo '<td>Noviembre</td>';
                                    }

                                    ?>
                                    <td>$<?php echo $row[2] ?></td>
                                    <td><strong>$<?php echo $saldo ?></strong></td>

                                </tr>
                            <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php
        }
    }
    include("footer.php");
    ?>
</body>

</html>