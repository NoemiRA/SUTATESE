<?php
session_start();
if (!empty($_POST["btnIngresar"])) {
    if (!empty($_POST["CorreoElec"]) and !empty($_POST["Contraseña"])) {
        $user = $_POST["CorreoElec"];
        $pass = $_POST["Contraseña"];
        $sql = $conn->query(" SELECT NumEmpleado5, Contraseña, Nombres, ApellidoPat, ApellidoMat, User FROM logeo INNER JOIN empleado on empleado.NumEmpleado = logeo.NumEmpleado5 WHERE  CorreoElec = '$user' and BINARY Contraseña = '$pass' ");
        if ($datos = $sql->fetch_object()) {
            if($_SESSION["User"] = $datos->User == 0){
            $_SESSION["NumEmpleado5"] = $datos->NumEmpleado5;
            $_SESSION["Contraseña"] = $datos->Contraseña;
            $_SESSION["Nombres"] = $datos->Nombres;
            $_SESSION["ApellidoPat"] = $datos->ApellidoPat;
            $_SESSION["ApellidoMat"] = $datos->ApellidoMat;
            $_SESSION["User"] = $datos->User;
            header("location: inicio.php");
            }elseif ($_SESSION["User"] = $datos->User == 1){
                echo '<div class="alert alert-danger" role="alert">
                    <b>¡Acceso Bloqueado!</b> Por favor, asista al sindicato.
                </div>';
            }else{
                $_SESSION["User"] = $datos->User;
                header("location: admin.php");
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">
                    <b>¡Correo o Contraseña Incorrectos!</b> Por favor, intente más tarde.
                </div>';
        }
        
    } else {
        echo '<div class="alert alert-primary" role="alert">
                    Por favor, <b>ingrese Correo y Contraseña!</b>
                </div>';
    }
}
