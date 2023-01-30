<?php
include("session.php");
include("configbase.php");
$tabla = "";
$tabla_nombre = "";

if (isset($_POST['search'])) {
    $valueToSearh = $_POST['valueToSearh'];
    $query = "SELECT * FROM '$tabla' WHERE codigo_aula LIKE '%" . $valueToSearh . "%' OR codigo_aula LIKE '%" . $valueToSearh . "%'";
    $result = filterRecord($query);
} else {
    $query = "SELECT * FROM '$tabla'";
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
    <div class="container">
        <style>
            .regresa {
                float: left;
                margin-top: 5px;
                margin-right: 20px;
            }
        </style>
        <div class="regresa">
            <a href="../listado/menuListado.php" class="btn btn-success">Regresar</a>
        </div>

        <h2>Crear Horario</h2>

        <form method="POST">
            <input type="search" name="valueToSearh" placeholder="Búsqueda">
            <button type="submit" class="btn btn-secondary" name="search">Buscar</button>
        </form>

        <form method="POST" action="creacion.php">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Grupo</label>
                <div class="col-sm-6">
                    <select name="tabla_nombre" id="" value="<?php echo $tabla_nombre; ?>">
                        <option value="0">
                            Seleccione
                        </option <?php echo $tabla_nombre; ?>>
                        <?php
                        $query = $cnnbase->query("SELECT * FROM grupos");
                        while ($valor = mysqli_fetch_array($query)) {
                            echo '<option value= "' . $valor['clave_grupo'] . '">' . $valor['clave_grupo'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-3 col-form-input">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>