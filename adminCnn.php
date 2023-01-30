<?php

$server = "localhost";
$usuario="root";
$bd="baseaulas";
$password="";

$cnn = mysqli_connect($server,$usuario,$password,$bd);

if(!$cnn){
    die("No se puede conectar: ".mysqli_connect_error());
}
$usuario = $_POST["txtNick"];
$contra = $_POST["txtPass"];

$query = mysqli_query($cnn, "SELECT * FROM administrador WHERE usuario = '" . $usuario . "' and contrasenia ='" . $contra . "'");
    $nr = mysqli_num_rows($query);

    if ($nr == 1)
    {
        header("location: /Proyecto-respaldo/administrador.php");
    }
    else if ($nr == 0)
    {
        header("location: /Proyecto-respaldo/cheqeoadmin.php");
    }