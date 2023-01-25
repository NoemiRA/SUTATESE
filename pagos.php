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

    <title>Pagos</title>

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
            <h1 class="display-3 m-4">REGISTRO DE PAGOS</h1>
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
                    <a href="calculadora.php" class="btn btn-outline-dark rounded-pill" target="_blank"><i class="fa-solid fa-calculator"></i> CALCULADORA DE TABLA DE AMORTIZACIÓN</a>

                </div>
                
            </div>
            
            <!-- Modal  -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title display-6" id="newModalLabel">Pago para aval </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="id" name= "id">
                            <label for="date" class="form-label">Ingrese la fecha del pago:<b>*</b></label>
                            <input type="date" class="form-control" name="input_date" id="input_date" min="0"/>
                            <label for="number" class="form-label mt-2">Ingrese la cantidad depositada/transferida<b>*</b></label>
                            <input type="number" class="form-control" name="input_amount" id="input_amount" min="0"/>

                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" name ="Insert" value="Registrar"></input>

                            <?php
                                if(isset($_POST['Insert'])){
                                    $id_modal = base64_decode($_POST['id']);
                                    $input_date = $_POST['input_date'];
                                    $input_amount = $_POST['input_amount'];

                                    if(empty($input_date) || empty($input_amount)){
                                        dataerror();
                                    }else{
                                        $format = $conn->query("INSERT INTO PAGO (IdPrestamo1, CantidadPago, FechaAbono) VALUES ('$id_modal' , $input_amount, '$input_date');");
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
                                        window.location = "pagos.php";                       
                                    }
                                });
                                </script>';
                }

                function cancelsuccess(){
                    echo '<script> Swal.fire({icon: "success", title: "Estatus Cambiado", text: "¡Se ha rechazado la petición al préstamo!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                                then(function(result){
                                    if(result.value){ 
                                        window.location = "pagos.php";  
                                    }
                                });
                                </script>';
                }

                function alerterror(){
                    echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, intente más tarde!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                                then(function(result){
                                    if(result.value){   
                                        window.location = "pagos.php";                  
                                    }
                                });
                                </script>';
                }

                function alertdata(){
                    echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, ingrese correctamente los valores!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){                   
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

                if(isset($_POST['search'])){
                    $input = $_POST['is'];
                    $query ="SELECT IdPrestamo, NumEmpleado3, Nombres, ApellidoPat, ApellidoMat, CantidadSolicitada, Interes, Estatus, FechaDeposito, FechaDeposito, IdTipoPrestamo1, TipoPrestamo, Plazo FROM prestamo INNER JOIN empleado on prestamo.NumEmpleado3 = empleado.NumEmpleado INNER JOIN tipoprestamo on prestamo.IdTipoPrestamo1 = tipoprestamo.IdTipoPrestamo WHERE (NumEmpleado3 LIKE '" . $input . "%' OR Nombres LIKE '%" . $input . "%' OR ApellidoPat LIKE '%" . $input . "%' OR ApellidoMat LIKE '%" . $input . "%') AND (((IdTipoPrestamo1 = 'P2' OR IdTipoPrestamo1 = 'P3') AND Estatus = 2) OR (IdTipoPrestamo1 = 'P1' AND Estatus = 4))";
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
                                        <th scope="col">Plazo</th>
                                        <th scope="col">Interes Generado</th>
                                        <th scope="col">Tipo Préstamo</th>
                                        <th scope="col">Pagos</th>
                                        <th scope="col">Cantidad acumulada</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                        $eb = $row['IdTipoPrestamo1'];
                                        $es = $row['Estatus'];
                                        $ip = $row['IdPrestamo'];
                                        $id_encoded = base64_encode($ip);
                                        
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $ip;?></td>
                                            <td><?= $row['NumEmpleado3']; ?></td>
                                            <td><?= $row['ApellidoPat']. ' ' . $row['ApellidoMat']. ' ' . $row['Nombres'];?></td>
                                            <th scope="row">$ <?= $row['CantidadSolicitada'];?> M.N.</td>
                                            <td><?= $row['Plazo']; ?></td>
                                            <th scope="row">$ <?= $row['Interes'];?> M.N.</td>
                                            <td><?= $row['TipoPrestamo']; ?></td>
                                            <?php
                                                $sql = "Select COUNT(IdPrestamo1) AS pay, SUM(CantidadPago) as amount from pago where IdPrestamo1 = '$ip'";
                                                $result_loan = mysqli_query($conn, $sql);
                                                $row_loan = mysqli_fetch_array($result_loan);
                                                $resp_pay = $row_loan[0];
                                                $resp_amount = $row_loan[1];
                                                if(empty($resp_pay)){
                                                    $resp_pay= '---';
                                                }if(empty($resp_amount)){
                                                    $resp_amount = '---';
                                                }
                                                ?>
                                                <td><?=$resp_pay?></td>
                                                <th scope="row">$ <?=$resp_amount?> M.N.</td>
                                            <td>
                                                <?php 
                                                    if(($eb == "P2" || $eb == "P3")){
                                                        ?> <a href="pagos.php?id=<?= $id_encoded;?>&option=loan" class="btn btn-warning mx-1" name="accept" onclick="return request()"><i class="fa-solid fa-money-bills"></i></a> <?php
                                                    }if($eb == "P1"){
                                                        ?><a href="pagos.php" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-id = "<?= $id_encoded; ?>"><i class="fa-regular fa-calendar"></i> Registrar devolución</a> <?php
                                                    };
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    };
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

                if(isset($_GET['id']) && isset($_GET['option'])){
                    $id_decoded = base64_decode($_GET['id']);
                    $option = $_GET['option'];
                    
                    switch ($option){
                        case "loan":
                            $Estatus = 4;
                            operation($conn, $Estatus, $id_decoded);
                        break;
                        case "pay":
                            
                        break;
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