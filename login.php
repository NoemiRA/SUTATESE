<?php
$CorreoElec = $_POST['CorreoElec'];
$contraseña = $_POST['contraseña'];
session_start();
$_SESSION['CorreoElec'] = $CorreoElec;

 include("conexion.php");
// $servidor = "localhost:33065";
// $base = "sutatese";
// $username = "root";
// $password = "";

// $conn = mysqli_connect($servidor, $username, $password, $base);

$consulta = "SELECT * FROM logeo where CorreoElec = '$CorreoElec' and contraseña = '$contraseña'";
$resultado = mysqli_query($conn,$consulta);

$filas = mysqli_num_rows($resultado);

if($filas){
    header("location:inicio.php");

}else{
    ?>
    <?php
    include("index.php");
    ?>
    <h1>ERROR EN LA AUTENTICACION</h1>
    
    <?php
}

mysqli_free_result($resultado);
mysqli_close($conexion);

