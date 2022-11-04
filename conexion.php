<?php
$servidor = "localhost";
$base = "sutatese";
$username = "root";
$password = "";

    $conn = mysqli_connect($servidor, $username, $password, $base);
    $conn->set_charset("utf8");

    if (!$conn) {
        die("La conexion ha fallado: " . mysqli_connect_error());
    }
    
?>
