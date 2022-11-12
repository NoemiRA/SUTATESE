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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>SUTATESE - Datos Bancarios</title>
    <?php include("navbar.php");
    ?>

</head>

<body>
    <div class="row g-0 p-5 w-75 bg-light mx-auto text-center my-5">
        <div class="text-center">
            <img src="resources/tj.png" class="rounded mx-auto d-blockmx-auto d-block w-25" alt="...">
        </div>

        <h1 class="my-3">DATOS BANCARIOS</h1>

        <?php
        if (isset($_SESSION['NumEmpleado5'])) {
            $NumEmpleado = $_SESSION['NumEmpleado5'];
            $NombreEmp = $_SESSION['Nombres'];
            $ApellidoPatEmp = $_SESSION['ApellidoPat'];
            $ApellidoMatEmp = $_SESSION['ApellidoMat'];
            $sql = "SELECT Nombres, ApellidoMat, ApellidoPat, NumEmpleado, IdBanco1, InstitucionBancaria, Clabe  FROM datosbancarios inner join empleado on datosbancarios.NumEmpleado2 = empleado.NumEmpleado inner join banco on banco.IdBanco = datosbancarios.IdBanco1 WHERE NumEmpleado2 = '$NumEmpleado' ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            $count = mysqli_num_rows($result);

            // Si hay un registro en la base de datos 
            if ($count == 1) {
                $banco = $row[4];
                $InstB = $row[5];
                $clabeB = $row[6];
                
                ?>
                    <form class="row g-3 mt-3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="col p-3">
                            <label for="titular" class="form-label">Nombre TITULAR</label>
                            <input type="text" class="form-control text-center" id="titular" value="<?php echo $NombreEmp . " " . $ApellidoPatEmp . " " . $ApellidoMatEmp ?>" disabled>
                        </div>
                        <div class="col p-3">
                            <div class="form-group">
                                <label for="Banco" class="form-label">Institución Bancaria</label>
                                <select class="form-control" id="IB" name="IB" disabled>
                                    <option selected value="<?php echo $banco ?>"><?php echo $InstB?></option>
                                    <?php
                                        $ejecucion = $conn->query("Select * from banco where IdBanco <> '$banco'");
                                        
                                        foreach ($ejecucion as $opc) :
                                    ?>
                                            <option value="<?php echo $opc['IdBanco'] ?>"><?php echo $opc['InstitucionBancaria'] ?></option>
                                        <?php
                                        endforeach
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="p-3">
                            <label for="clabe" class="form-label">No. CLABE</label>
                            <div class="input-group">
                                <input type="text" class="form-control text-center" name="clabe" id="clabe" value="<?php echo $clabeB ?>" minlength="10" maxlength="18" disabled />
                                <span class="input-group-text" id="basic-addon2">
                                    <abbr title="El número de cuenta son 18 dígitos, en caso de que el banco sea Banorte el número de cuenta son 10 dígitos "><i class="fa-solid fa-circle-info"></i></abbr>
                                </span>
                            </div>
                        </div>
                        <div>
                            <input type="button" class="btn boton-ingresar" value="Regresar" onclick="window.history.go(-1);"></input>
                            </input>
                        </div>
                    </form>
                <?php
            }else{

            // Si no hay un registro de datos bancarios para el empleado
                ?>
                    <form class="row g-3 mt-3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="col p-3">
                            <label for="titular" class="form-label">Nombre TITULAR</label>
                            <input type="text" class="form-control text-center" id="titular" value="<?php echo $NombreEmp . " " . $ApellidoPatEmp . " " . $ApellidoMatEmp ?>" disabled>
                        </div>
                        <div class="col p-3">
                            <div class="form-group">
                                <label for="Banco" class="form-label">Institución Bancaria</label>
                                <select class="form-control" id="IB" name="IB">
                                <option selected disabled>Elige una institución Bancaria...</option>
                                    <?php
                                        $ejecucion = $conn->query("Select * from banco");
                                        
                                        foreach ($ejecucion as $opc) :
                                    ?>
                                            <option value="<?php echo $opc['IdBanco'] ?>"><?php echo $opc['InstitucionBancaria'] ?></option>
                                        <?php
                                        endforeach
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="p-3">
                            <label for="clabe" class="form-label">No. CLABE</label>
                            <div class="input-group">
                                <input type="text" class="form-control text-center" name="clabe" id="clabe" minlength="10" maxlength="18" placeholder="Ingrese el No. Clabe"/>
                                <span class="input-group-text" id="basic-addon2">
                                    <abbr title="El número de cuenta son 18 dígitos, en caso de que el banco sea Banorte el número de cuenta son 10 dígitos "><i class="fa-solid fa-circle-info"></i></abbr>
                                </span>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn boton-ingresar" onclick="window.history.go(-2);">Cancelar</button>
                            <input type="submit" class="btn" value="Aceptar" name="Insert"></input>
                        </div>
                    </form>
                <?php
            }
        
        
        // Update
        // if (isset($_POST['Update'])) {
        //     $clabebancaria = $_POST['clabe'];
        //     $InstBanc = filter_input(INPUT_POST, "IB");
        //     if ($clabebancaria == "") {
        //         echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, ingrese correctamente los valores!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
        //                 then(function(result){
        //                     if(result.value){                   
        //                     window.location = "datosBancarios.php";
        //                     }
        //                 });
        //                 </script>';
        //     } else {
        //         $ejecucion = $conn->query("UPDATE datosbancarios set Clabe = '$clabebancaria', IdBanco1 = '$InstBanc' WHERE NumEmpleado2 = '$NumEmpleado'");
        //         if ($ejecucion === TRUE) {
        //             echo '<script> Swal.fire({icon: "success", title: "Datos Actualizados", text: "¡Los DATOS BANCARIOS han sido actualizados!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
        //                 then(function(result){
        //                     if(result.value){                   
        //                     window.location = "datosBancarios.php";
        //                     }
        //                 });
        //                 </script>';
        //         } else {
        //             echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, intente más tarde!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
        //                 then(function(result){
        //                     if(result.value){                   
        //                     window.location = "datosBancarios.php";
        //                     }
        //                 });
        //                 </script>';
        //         }
        //     }
        // }
        // Insert
        if (isset($_POST['Insert'])) {
            $clabebancaria = $_POST['clabe'];
            $InstBanc = filter_input(INPUT_POST, "IB");
            if ($clabebancaria == "" || $InstBanc == "") {
                echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, ingrese correctamente los valores!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                        then(function(result){
                            if(result.value){                   
                            window.location = "datosBancarios.php";
                            }
                        });
                        </script>';
            } else {
                $ejecucion = $conn->query("INSERT INTO datosbancarios VALUES ('$NumEmpleado', '$InstBanc', '$clabebancaria')");
                if ($ejecucion === TRUE) {
                    echo '<script> Swal.fire({icon: "success", title: "Datos Ingresados", text: "¡Los DATOS BANCARIOS han sido registrados!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                        then(function(result){
                            if(result.value){                   
                            window.location = "datosBancarios.php";
                            }
                        });
                        </script>';
                } else {
                    echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, intente más tarde!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                        then(function(result){
                            if(result.value){                   
                            window.location = "datosBancarios.php";
                            }
                        });
                        </script>';
                }
            }
        }
    }
        ?>
    </div>
    <?php 
        include("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>