<?php

$server = "localhost";
$usuario="root";
$bd="baseaulas";
$password="";

$cnn = mysqli_connect($server,$usuario,$password,$bd);

if(!$cnn){
    die("No se puede conectar: ".mysqli_connect_error());
}
$usuarioDocente = $_POST["txtNickDocente"];
$contraDocente = $_POST["txtPassDocente"];

$usuarioEstudiante = $_POST["txtNickEstudiante"];
$contraestudiante = $_POST["txtPassEstudiante"];


if (empty($_POST['txtNickEstudiante'])) {
    $query1 = mysqli_query($cnn, "SELECT * FROM usuarios_docentes WHERE nickname_docente = '" . $usuarioDocente . "' and password_docente ='" . $contraDocente . "'");
    $nr1 = mysqli_num_rows($query1);

    if ($nr1 == 1) {
        header("location: /Proyecto-respaldo/barra.php");
    } else if ($nr1 == 0) {
        header("location: /Proyecto-respaldo/index.php");
    }
}
else{
    $query2 = mysqli_query($cnn, "SELECT * FROM usuarios_estudiante WHERE nickname = '" . $usuarioEstudiante . "' and password ='" . $contraestudiante . "'");
    $nr2 = mysqli_num_rows($query2);

    if ($nr2 == 1) {
        header("location: /Proyecto-respaldo/barra-student.php");
    } else if ($nr2 == 0) {
        header("location: /Proyecto-respaldo/index.php");
    }
}