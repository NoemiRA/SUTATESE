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
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>SUTATESE - Cantidad a Ahorrar</title>

    <?php include("navbar.php");
    ?>

</head>

<body>
    <?php
    if (isset($_SESSION['NumEmpleado5'])) {
        $NumEmpleado = $_SESSION['NumEmpleado5'];
        $NombreEmp = $_SESSION['Nombres'].' '. $_SESSION['ApellidoPat'].' '. $_SESSION['ApellidoMat'];


        $sql = "SELECT IdAhorrador, NumEmpleado1, CantidadQuincenal, FormatoCuota, SolicitudAportacion, IdTipoAhorro, TipoAhorro  FROM cajaahorro inner join tipoahorro on cajaahorro.IdTipoAhorro1 = tipoahorro.IdTipoAhorro WHERE NumEmpleado1 = '$NumEmpleado' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);
        
    ?>
        <div class="container-xl text-center login">
            <form class="row g-3 mt-3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="col-lg-6 d-flex">
                    <div class="content px-4 my-auto parrafo-aval"">
                        <h2>Aportaciones a la caja de ahorro </h2>
                        <br>
                        <p>1. Las aportaciones a la Caja de Ahorro tendrá 3 orígenes: </p>
                        <p>a) Fondo SUTATESE. Es la aportación del Ahorrador. Se brinda de forma quincenal vía nómina del TESE con un mínimo de $100.00
                            (cien pesos 00/100 M.N.) y múltiplos de $50.00 (Cincuenta pesos 00/100 M.N). La cantidad recabada a lo largo de las 24 quincenas más el interés
                            generado, será devuelto los primeros diez días del mes de Diciembre después del cierre del ejercicio.</p>
                        <p>b) Fondo Fijo Voluntario SUTATESE. Es una aportación voluntaria y sin plazo de término del AHORRADOR que consiste en un mínimo
                            de 1% del sueldo base quincenal. Solo podrá ser retirado por previa solicitud de baja de la Caja de Ahorro, Separación del TESE o Fallecimiento.</p>
                        <p>c) Fondo Variable INVERSIONISTA. Es una opción de ahorro adicional a través de aportaciones extraordinarias que constituyen
                            el Fondo Variable INVERSIONISTA siendo el límite la cantidad necesaria para tener liquidez y poder otorgar préstamos pendientes a los Asociados
                            en los primeros meses de operación de la Caja de Ahorro. Su rendimiento será del 1% mensual y serán reintegrados a los (las) INVERSIONISTAS de
                            acuerdo con el mismo orden de folio y en cuanto dejen de ser necesarios por alcanzar solvencia de la Caja de Ahorro. La cantidad mínima de
                            inversión es de $20,000.00 (Veinte mil pesos 00/100 M.N.) y máxima de $30,000.00 (Treinta mil pesos 00/100 M.N.).</p>
                        <p>El límite de ahorro quincenal (inciso a) será del 30% del sueldo, considerando la suma de los Fondos. </p>
                        <p>Solo se permiten las aportaciones indicadas en este capítulo. </p>
                        <p class="nota-aval">NOTA: Leer el el Titulo Quinto "Aportaciones" del reglamento de la Caja de Ahorro.</p>
                    </div>
                </div>
                <div class="col-lg-6 d-flex">
                    <div class="content mx-auto px-4 my-auto">
                        <div class="inicio">
                            <h2>Cantidad a ahorrar</h2>
                        </div>
                        <div class="col-md-auto">
                            <label for="numEmpleado" class="form-label">Número empleado</label>
                            <input type="number" class="form-control" id="numEmpleado" value="<?php echo $NumEmpleado ?>" disabled>
                        </div>

                        <div class="col-md-auto my-4">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" placeholder="<?php echo $NombreEmp ?>" disabled>
                        </div>

                        <?php
                        if ($count >= 1) {
                        ?>
                            $id = $row[5];
                            <div class="col mt-4">
                                <div class="col-md-auto">
                                    <label for="tipo" class="form-label">Seleccione un tipo de fondo</label>
                                    <select class="form-control" id="tipoF" name="tipoF">
                                        <option selected disabled value="<?php echo $id ?>"><?php echo $row[6] ?></option>
                                        <?php
                                        $ejecucion = $conn->query("Select * from tipoahorro where IdTipoAhorro <> '$id' and IdTipoAhorro <> 'TA3'");

                                        foreach ($ejecucion as $opc) :
                                        ?>
                                            <option value="<?php echo $opc['IdTipoAhorro'] ?>"><?php echo $opc['TipoAhorro'] ?></option>
                                        <?php
                                        endforeach
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-auto my-4">
                                <label for="numEmpleado" class="form-label">Ingrese la cantidad a ahorrar QUINCENALMENTE</label>
                                <input type="number" class="form-control" name="ahorroQuincenal" min="0" value="<?php echo $row[2] ?>" placeholder="Ejemplo: 1500">
                            </div>

                            <div class="text-center my-3">
                                <button type="button" class="btn btn-secondary boton-ingresar" onclick=location.href="registroCA.php">Cancelar</button>
                                <input type="submit" class="btn" value="Actualizar" name="Update"></input>
                            </div>

                        <?php
                        } else {
                        ?>
                            <div class="col mt-4">
                                <div class="col-md-auto">
                                    <label for="tipo" class="form-label">Seleccione un tipo de fondo</label>
                                    <select class="form-control" id="tipoF" name="tipoF">
                                        <option selected disabled>Seleccione una opcion...</option>
                                        <?php
                                        $ejecucion = $conn->query("Select * from tipoahorro where IdTipoAhorro <> 'TA3'");

                                        foreach ($ejecucion as $opc) :
                                        ?>
                                            <option value="<?php echo $opc['IdTipoAhorro'] ?>"><?php echo $opc['TipoAhorro'] ?></option>
                                        <?php
                                        endforeach
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-auto my-4">
                                <label for="numEmpleado" class="form-label">Ingrese la cantidad a ahorrar QUINCENALMENTE</label>
                                <input type="number" class="form-control" name="ahorroQuincenal" min="0" placeholder="Ejemplo: 1500">
                            </div>

                            <div class="text-center my-3">
                                <button type="button" class="btn btn-secondary boton-ingresar" onclick=location.href="registroCA.php">Cancelar</button>
                                <input type="submit" class="btn" value="Registrar" name="Insert"></input>
                            </div>

                        <?php
                        }
                        //Update

                        function alertsuccess(){
                            echo '<script> Swal.fire({icon: "success", title: "Datos Actualizados", text: "¡Los datos han sido actualizados!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                                    then(function(result){
                                        if(result.value){                   
                                            window.location = "registroCA.php";
                                        }
                                    });
                                    </script>';
                        }

                        function alerterror(){
                            echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, intente más tarde!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                                    then(function(result){
                                        if(result.value){                   
                                        window.location = "registroCa.php";
                                        }
                                    });
                                    </script>';
                        }

                        function alertdata(){
                            echo '<script> Swal.fire({icon: "error", title: "Error...", text: "¡Por favor, ingrese correctamente los valores!", showConfirmButton: true, confirmButtonText: "Cerrar"}).
                                then(function(result){
                                    if(result.value){                   
                                        window.location = "registroCA.php";
                                    }
                                });
                                </script>';
                        }
                        
                        if (isset($_POST['Update'])) {
                            $tf = filter_input(INPUT_POST, "tipoF");
                            if (empty($tf)) {
                                $tf = $id;
                            }
                            $cantidad = $_POST['ahorroQuincenal'];
                            if ($cantidad == "") {
                                alertdata();
                            } else {
                                $ejecucion = $conn->query("UPDATE cajaahorro set CantidadQuincenal = $cantidad, IdTipoAhorro1 = '$tf' WHERE NumEmpleado1 = '$NumEmpleado'");
                                if ($ejecucion === TRUE) {
                                    alertsuccess();
                                } else {
                                    alerterror();
                                }
                            }
                        }

                        //Insert
                        if (isset($_POST['Insert'])) {
                            $tf = filter_input(INPUT_POST, "tipoF");
                            $cantidad = $_POST['ahorroQuincenal'];
                            if ($cantidad == "") {
                                alertdata();
                            } else {
                                $ejecucion = $conn->query("CALL insert_ahorrador('$NumEmpleado',$cantidad,'','','$tf')");
                                if ($ejecucion === TRUE) {
                                    alertsuccess();
                                } else {
                                    alerterror();
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </form>
        </div>
    <?php
    }
    include("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>