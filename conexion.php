<?php
$servidor = "localhost:33065";
$base = "sutatese";
$username = "root";
$password = "";

$conn = mysqli_connect($servidor, $username, $password, $base);

if (!$conn) {
  die("La conexion ha fallado: " . mysqli_connect_error());
}
 
?>
