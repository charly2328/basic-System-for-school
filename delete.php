<?php
include("config.php");
include("session.php");

$id = $_GET['id'];


$sql = "DELETE FROM aulas WHERE codigo_aula='$id'";

$resultado = mysqli_query($mysqli,$sql);

if($resultado){
	echo "<script lenguaje='JavaScript'>
	alert('Se elimino el registro');
	location.assign('tablaAulas.php');
	</script>;
	";
}
else{
	echo "<script lenguaje='JavaScript'>
	alert('No se pudo eliminar el registro');
	location.assign('tablaAulas.php');
	</script>;
	";
}
?>