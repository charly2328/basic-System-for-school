<?php
$usuario  = "root";
$password = "";
$servidor = "localhost";
$basededatos = "baseaulas";
$con = mysqli_connect($servidor, $usuario, $password) or die("Error, sin conexion");
$db = mysqli_select_db($con, $basededatos) or die("No se pudo conectar a la Base de Datos");
?>

