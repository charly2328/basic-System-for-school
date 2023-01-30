<?php
	include("session.php");
	

	if(isset($_POST['search']))
	{
		$valueToSearh = $_POST['valueToSearh']; 
		$query = "SELECT * FROM periodo WHERE nombre LIKE '%".$valueToSearh."%' OR periodo_inicio LIKE '%".$valueToSearh."%'";
		$result = filterRecord($query);
	}
	else
	{
		$query = "SELECT *FROM periodo";
		$result = filterRecord($query);
	}
	
	function filterRecord($query)
	{
		include("config.php");
		$filter_result = mysqli_query($mysqli, $query);
		return $filter_result;
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="../estilos/edificiosEstilos.css" rel="stylesheet">
</head>

<body>
<style>
        .regresa{
            float: left;
            margin-top: 5px;
            margin-left: 5px;
        }
    </style>
    <div class="regresa">
        <a href="../administrador.php" class="btn btn-success">Regresar</a>
    </div>
    <div class="container">
    <h2>Periodos</h2>
        <form action="" method="POST">
            <input type="search" name="valueToSearh" placeholder="Búsqueda">
            <button type="submit" class="btn btn-secondary" name="search">Buscar</button>
            <a href="../periodo/add.php" class="btn btn-primary" role="button">Agregar <i class='bx bx-plus-medical'></i></a>
        </form>
        <br/>

        <?php
        echo "<table border='1'>
        <tr>
        <th>Periodo</th>
        <th>Inicio</th>
        <th>Fin</th>
        <th>Actualizar</th>
        <th>Eliminar</th>
        </tr>";

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['periodo_inicio'] . "</td>";
            echo "<td>" . $row['periodo_fin'] . "</td>";
            echo "<td><a href='update.php?id=" . $row['id'] ."'> <i class='bx bx-edit'> </i></a></td>";
            echo "<td><a href='delete.php?id=" . $row['id']."'> <i class='bx bx-trash'> </i> </a></td>";
            echo "</tr>";
        }
        echo "</table>";

        ?>
</body>

</html>