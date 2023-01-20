<?php
    session_start();
    include('conexion.php');

    if(empty($_SESSION['NumEmpleado5'])){
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>SUTATESE-Caja ahorro</title>
    <?php include("navbar.php");
    ?>
</head>

<script>
    function confirmacion(){
        var respuesta = confirm("¿Está seguro de haber registrado correctamente los datos y pasar a la siguiente etapa?");
        if(respuesta == true){
            return true;
        }else{
            return false;
        }
    }
</script>

<body>
    <form class="row g-3 mt-3 mx-0" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="col-lg-7 d-flex">
            <div class="content mx-auto p-5 parrafo-aval">
                <h1><b>REGISTRO A LA CAJA DE AHORRO</b></h1>
                <h2>Procedimiento:</h2>
                <hr>
                <ol>
                    <li>
                        Deberá ingresar al apartado <b>"CANTIDAD A AHORRAR"</b> y llenar debidamente los campos que se solicitan.
                    </li>
                    <li>
                        Una vez que ha terminado, deberá llenar el apartado <b>"BENEFICIARIO"</b> en donde se solicita llene completa y correctamente el formulario.
                    </li>
                    <li>
                        Posteriormente, aparecerá un botón con la leyenda <b>"¡He llenado completamente mi registro DESEO PASAR A LA SIGUIENTE ETAPA!</b> si usted está seguro de haber llenado 
                        sus datos correctamente puede presionarlo para pasar a la siguiente etapa, usted puede modificar aún <b>"CANTIDAD A AHORRAR"</b> y <b>"BENEFICIARIOS"</b>, una vez presionado 
                        el botón YA NO PODRÁ MODIFICAR DICHOS APARTADOS (Si dicho botón no lo puede visualizar, por favor verifique que toda la información recopilada este correcta y cada uno de los tipos de beneficairios cumpla el 100%).
                    </li>
                    <li>
                        Cuando se haya terminado el proceso, las opciones de <b>"FORMATO DE CUOTA" </b> y <b>"SOLICITUD DE APORTACIÓN" </b> serán habilitadas, es cuando usted podrá visualizarlas, 
                            corroborar que sus datos estén escritos correctamente y descargar dichos documentos.</b>
                    </li>
                    <li>
                        Una vez descargados, deberá imprimirlos y dirigirse al <i>Sindicato Único de Trabajadores Académicos
                            del Tecnológico de Estudios Superiores de Ecatepec</i> para solicitar la firma correspondiente del <i>prof. Nicolás Cortés Martínez</i>, Secretario general.
                    </li>
                    <li>
                        Ya firmado deberá escanear por separado tanto el <b>"FORMATO CUOTA"</b> y <b>"SOLICITUD APORTACIÓN"</b> para subirlos en el apartado <b>"SUBIR ARCHIVOS"</b>.
                    </li>
                    <li>
                        Finalmente, cuando suba sus archivos, se habilitará el apartado <b>"INGRESAR"</b>.
                    </li>
                </ol>
                <hr>
                <h3><i>Nota:</i></h3>
                <medium>Es ampliamente recomendado que usted ya cuente con los siguientes datos para el correcto llenado de su solicitud a la caja de ahorro.</medium>
                <ul>
                    <li>
                        Numero de empleado <i>(para corroborar datos)</i>.
                    </li>
                    <li>
                        Datos generales de beneficiarios <i>(nombre completo, teléfono, correo electrónico)</i>.
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-5 d-flex p-0 m-0 bg-light">
            <div class="my-auto">
                <?php
            
                if (isset($_SESSION['NumEmpleado5'])) {
                    $NumEmpleado = $_SESSION['NumEmpleado5'];

                    $dot = "SELECT IdAhorrador  FROM cajaahorro WHERE NumEmpleado1 = '$NumEmpleado' ";
                    $result_dot = mysqli_query($conn, $dot);
                    $count_dot = mysqli_num_rows($result_dot);

                    if($count_dot > 0){

                        $ahorrador = "SELECT IdAhorrador, NumEmpleado1 from cajaahorro where NumEmpleado1 = '$NumEmpleado'";
                        $resultahorrador = mysqli_query($conn, $ahorrador);
                        $row = mysqli_fetch_array($resultahorrador);
                        $IdAhorrador = $row['IdAhorrador'];
                        $countahorrador = mysqli_num_rows($resultahorrador);

                        $sql_absence = "SELECT SUM(Porcentaje) AS percentage_absence from beneficiario inner join cajaahorro on cajaahorro.IdAhorrador = beneficiario.IdAhorrador1 WHERE NumEmpleado1 = $NumEmpleado and IdTipoBeneficiario1 = 'TB1'";
                        $result_absence = mysqli_query($conn, $sql_absence);
                        $row_absence = mysqli_fetch_array($result_absence);
                        $absence = $row_absence['percentage_absence'];

                        $sql_death = "SELECT SUM(Porcentaje) AS percentage_death from beneficiario inner join cajaahorro on cajaahorro.IdAhorrador = beneficiario.IdAhorrador1 WHERE NumEmpleado1 = $NumEmpleado and IdTipoBeneficiario1 = 'TB2'";
                        $result_death = mysqli_query($conn, $sql_death);
                        $row_death = mysqli_fetch_array($result_death);
                        $death = $row_death['percentage_death'];

                        $flag = $absence + $death;


                        $sql = "SELECT IdAhorrador, Estatus, FormatoCuota, SolicitudAportacion FROM cajaahorro WHERE IdAhorrador = '$IdAhorrador'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);
                        $Estatus = $row['Estatus'];

                    }else{
                        $Estatus = 0;
                        $countahorrador = 0;
                        $absence = 0;
                    }

                    function Etapas($point, $opc1, $opc2, $opc3){
                        ?>
                            <div class="d-flex">
                                <button type="button" class="btn btn-link passed icono" <?php echo $opc1;?> onclick=location.href="cantidad-ahorro.php" id="saving" style="text-align: center; font-size: 40px;"> 
                                    <span><i class="fa-solid fa-money-bills"></i></span><span class="display-6 m-lg-2 tamanoLetra">Cantidad a ahorrar</span>
                                </button>
                            </div>

                            <div class="d-flex">
                                <button type="button" class="btn btn-link passed icono" <?php echo $opc1;?> onclick=location.href="registrobeneficiarios.php" style="text-align: center; font-size: 40px;"> 
                                    <span><i class="fa-solid fa-users-rectangle"></i></span><span class="display-6 m-lg-2 tamanoLetra">Beneficiario</span>
                                </button>
                            </div>
                            <?php
                                if($point == 1){
                                    echo'<input type="submit"'. $opc1 .' class="btn btn-success" value="¡He llenado completamente mi registro DESEO PASAR A LA SIGUIENTE ETAPA!" name="Accept" onclick="return confirmacion()"></input>';
                                }
                            ?>
                            <div class="d-flex">
                                <button type="button" class="btn btn-link passed icono" <?php echo $opc2;?> onclick=location.href="FormatoCuota.php" style="text-align: center; font-size: 40px;"> 
                                    <span><i class="fa-solid fa-file-pdf"></i></span><span class="display-6 m-lg-2 tamanoLetra">Formato cuota</span>
                                </button>
                            </div>

                            <div class="d-flex">
                                <button type="button" class="btn btn-link passed icono" <?php echo $opc2;?> onclick=location.href="solicitudAportacion.php" style="text-align: center; font-size: 40px;"> 
                                    <span><i class="fa-solid fa-file-pdf"></i></span><span class="display-6 m-lg-2 tamanoLetra">Solicitud aportación</span>
                                </button>
                                
                            </div>

                            <div class="d-flex">
                                <button type="button" class="btn btn-link passed icono" <?php echo $opc2;?> onclick=location.href="documentos-generales.php" style="text-align: center; font-size: 40px;"> 
                                    <span><i class="fa-solid fa-file-circle-plus"></i></span><span class="display-6 m-lg-2 tamanoLetra">Subir archivos</span>
                                </button>
                            </div>

                            <div class="d-flex">
                                <button type="button" class="btn btn-link passed icono" <?php echo $opc3;?> onclick=location.href="cajaAhorro.php" style="text-align: center; font-size: 40px;"> 
                                    <span><i class="fa-solid fa-right-to-bracket"></i></span><span class="display-6 m-lg-2 tamanoLetra">Ingresar</span>
                                </button>
                            </div>
                        <?php
                    }

                    function alertsuccess()
                    {
                        echo '<script> Swal.fire({icon: "success", title: "Datos Ingresados", text: "¡Los datos han sido ingresados correctamente!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){                   
                                    window.location = "registroCA.php";
                                }
                            });
                            </script>';
                    }
                    function alerterror()
                    {
                        echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, intente más tarde!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                            then(function(result){
                                if(result.value){                   
                                window.location = "registroCA.php";
                                }
                            });
                            </script>';
                    }
                
                    if($Estatus == 0){
                        if($countahorrador == 1 && $flag == 200){
                            $point = 1;
                        }
                        else{
                            $point = 0;
                        }
                        $opc1 = '';
                        $opc2 = 'disabled';
                        $opc3 = 'disabled';
                        Etapas($point, $opc1, $opc2, $opc3);
                    }
                    if($Estatus == 1){
                        $point = 1;
                        $opc1 = '';
                        $opc2 = 'disabled';
                        $opc3 = 'disabled';
                        Etapas($point, $opc1, $opc2, $opc3);
                        $point = 2;
                    }
                    if($Estatus == 2){
                        $point = 2;
                        $opc1 = 'disabled';
                        $opc2 = '';
                        $opc3 = 'disabled';
                        Etapas($point, $opc1, $opc2, $opc3);
                        $point = 3;
                    }
                    if($Estatus >= 3){
                        $point = 3;
                        $opc1 = 'disabled';
                        $opc2 = 'disabled';
                        $opc3 = '';
                        Etapas($point, $opc1, $opc2, $opc3);
                    }

                    if (isset($_POST['Accept'])) {
                        $point=2;
                        $ejecucion = $conn->query("UPDATE cajaahorro SET Estatus = '$point' WHERE IdAhorrador = '$IdAhorrador'");
                        if ($ejecucion === TRUE) {
                            alertsuccess();
                        }else{
                            alerterror();
                        }
                    }                  
                }
                ?>
            </div>
        </div>
        
    </form>

    
        <?php 
            include("footer.php");
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>

</html>