<?php
session_start();
include('conexion.php');

if (empty($_SESSION['User'])) {
    header("location: index.php");
}
?>
<link rel="shortcut icon" href="resources/SUTATESE.png" />
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

    <title>Documento</title>

</head>

<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

    <?php
        if(isset($_GET['id'])&& isset($_GET['opt'])){
            $id = base64_decode($_GET['id']);
            $option = $_GET['opt'];

            switch($option){
                case "pay":
                    $sql = "Select Nomina from prestamo where IdPrestamo  = '" . $id . "'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    $document = $row['Nomina'];
                break;
                case "payroll":
                    $sql = "Select Nomina from empleado where NumEmpleado  = '" . $id . "'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    $document = $row['Nomina'];
                break;
                case "credential":
                    $sql = "Select Credencial from empleado where NumEmpleado  = '" . $id . "'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    $document = $row['Credencial'];
                break;
                case "share":
                    $sql = "Select FormatoCuota from cajaahorro where IdAhorrador  = '" . $id . "'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    $document = $row['FormatoCuota'];
                break;
                case "input":
                    $sql = "Select SolicitudAportacion from cajaahorro where IdAhorrador  = '" . $id . "'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    $document = $row['SolicitudAportacion'];
                break;
                case "promissory":
                    $sql = "Select Pagare from prestamo where IdPrestamo  = '" . $id . "'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    $document = $row['Pagare'];
                break;
            }
            
        }
    ?>
        <div class="embed-container">
            <iframe src="data:application/pdf; base64, <?php echo base64_encode($document) ?>" seamless="seamless" style="display:block; width:100%; height:100vh;" frameborder="0"></iframe>
        </div>
        
            <?php
                function formatsuccess(){
                    echo '<script> Swal.fire({icon: "success", title: "Cambiado de Estatus", text: "¡El inversionista aparecerá en la siguiente etapa!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                                then(function(result){
                                    if(result.value){
                                        window.location = "inversionista.php";                       
                                    }
                                });
                                </script>';
                }

                function cancelsuccess(){
                    echo '<script> Swal.fire({icon: "success", title: "Cambiado de Estatus", text: "¡Se ha rechazado el inversionista!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
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

                function alertdata(){
                    echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, ingrese correctamente los valores!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){       
                                    window.location = "inversionista.php";              
                                }
                            });
                            </script>';
                }
            
            ?>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>

