<?php
include("listado.php");
include("config.php");

if ($mysqli->connect_error) {
    die("La conexion fallo: " . $mysqli->connect_error);
}

$proTable = "CREATE TABLE '$tabla_nombre' (
    lunes text(100) not null,
    martes text(100) not null,
    miercoles text(100) not null,
    jueves text(100) not null,
    viernes text(100) not null,
    sabado text(100) not null
)";
if ($mysqli->query($proTable) == true) {
    echo "Se ha ha creado el horario '$tabla_nombre'";
    header("Location: ../listado/listado.php");
} else {
    echo "Hubo un error al crear el horario '$tabla_nombre': " . $mysqli->error;
    header("Location: ../listado/listado.php");
}

?>