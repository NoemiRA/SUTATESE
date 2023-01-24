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

    <title>Inicio</title>

    <?php include("navbar.php"); ?>

</head>

<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
    <div class="principal">
        <h1 class="display-3 m-4">ADMINISTRADOR</h1>
        <div class="row g-0 h-50 m-3">
            <div class="d-grid gap-2 col-10 mx-auto d-md-block ">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Información general de un empleado registrado... " aria-label="Recipient's username" aria-describedby="button-addon2" name="is">
                    <input type="submit" class="btn btn-primary" value="Buscar" name="search"></input>
                </div>
                
                <div class="row row-cols-1 row-cols-md-4 g-4 d-flex">
                    <div class="col d-flex justify-content-center">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title text-center">NUEVOS SOCIOS</h5>
                                <a href="empleado.php" class=""><img src="resources/empleado.jpg" class="card-img-top" alt="..."></a>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-center">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title text-center">INVERSIONISTAS</h5>
                                <a href="inversionista.php" class=""><img src="resources/INVERSIONES.jpg" class="card-img-top" alt="..."></a>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-center">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title text-center">CAJA DE AHORRO</h5>
                                <a href="agremiado.php" class=""><img src="resources/CAJAHORRO.jpg" class="card-img-top" alt="..."></a>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-center">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title text-center">PETICIÓN DE PRÉSTAMOS</h5>
                                <a href="controlPrestamo.php" class=""><img src="resources/PRESTAMO.jpg" class="card-img-top" alt="..."></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <?php
                if(isset($_POST['search'])){
                    $input = $_POST['is'];
                    $query = "SELECT NumEmpleado, Nombres, ApellidoPat, ApellidoMat, FechaNac, Curp, Rfc, FechaIng, CorreoElec, Celular, Telefono, Calle, Numero, DelMun, Colonia, Cp, ExpProfesional, ExpDocAdmin, Licenciatura, CedLic, InstLic, Maestria, CedMae, InstMae, Doctorado, CedDoc, InstDoc, Nomina, Credencial, Foto, Division, Estado FROM empleado INNER JOIN division ON Division.IdDivision = empleado.IdDivision1 INNER JOIN estado ON empleado.IdEstado1 = estado.IdEstado LEFT JOIN logeo on empleado.NumEmpleado = logeo.NumEmpleado5 WHERE (NumEmpleado LIKE '" . $input . "%' OR Nombres LIKE '%" . $input . "%' OR ApellidoPat LIKE '%" . $input . "%' OR ApellidoMat LIKE '%" . $input . "%') AND NumEmpleado5 IS NOT NULL";
                    $result = mysqli_query($conn, $query);
                    $count_results = mysqli_num_rows($result);
    
                    if($count_results > 0){
                        ?>
                        <div class="table-responsive m-5">
                            <table class="table table-bordered table-m text-center">
                                <thead class="table-dark">
                                    <tr>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Empleado</th>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                        $id_request = $row[0];
                                        $id_encoded_request = base64_encode($id_request);
                                    ?>
                                        <tr>
                                            <td>
                                                <img src="data:image/png; base64,<?php echo base64_encode($row['Foto']) ?>" width="80" height="80">
                                            </td>
                                            <td><?= $row['NumEmpleado']. ' - ' . $row['ApellidoPat']. ' ' . $row['ApellidoMat']. ' ' . $row['Nombres'];?></td>
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