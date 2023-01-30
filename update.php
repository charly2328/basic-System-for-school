<?php
//comprueba los campos
$server = "localhost";
$user = "root";
$pass = "";
$bd = "baseaulas";

$nombre ="";
$codigo_aula = "";
$ubicacion_edificio = "";
$capacidad = "";

$erroMessage = "";
$succesMessage = "";

$cnn = new mysqli($server,$user,$pass,$bd);

$id = $_GET['id'];
$vertxt = "SELECT * FROM aulas WHERE codigo_aula ='$id'";
$imprime = mysqli_query($cnn, $vertxt);
$cuenta = mysqli_fetch_assoc($imprime);

$nombre = $cuenta['nombre'];
$codigo_aula = $cuenta['codigo_aula'];
$ubicacion_edificio = $cuenta['codigo_edificio'];
$capacidad = $cuenta['capacidad'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre = $_POST["nombre"];
    $codigo_aula = $_POST["codigo_aula"];
    $ubicacion_edificio = $_POST["codigo_edificio"];
    $capacidad = $_POST["capacidad"];


    do{
        if(empty($nombre) || empty($codigo_aula) || empty($ubicacion_edificio) || empty($capacidad)){
            $erroMessage = "Porfavor llene todos los campos";
            break;
        }

        $sql = "UPDATE aulas SET codigo_aula = '$id', nombre = '$nombre', codigo_aula = '$codigo_aula', codigo_edificio = '$ubicacion_edificio', capacidad = '$capacidad' WHERE codigo_aula = '$id'";
        $result = $cnn->query($sql);
        if(!$result){
            $erroMessage = "Instancia invalida: ".$cnn->error;
            break;
        }

        //añadir nuevos datos
        $nombre = "";
        $codigo_aula = "";
        $ubicacion_edificio = "";
        $capacidad = "";
        
        $succesMessage = "Se añadio correctamente";

        header("Location: ../aulas/tablaAulas.php");
        exit;
    }
    while(false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h2>Actualizar datos</h2>

        <?php
        if(!empty($erroMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$erroMessage</strong>
                <button type='button' class='btn btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="POST">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Codigo</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="codigo_aula" value="<?php echo $codigo_aula; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Codigo Edificio</label>
                <div class="col-sm-6">
                    <select name="codigo_edificio" id="" value="<?php echo $ubicacion_edificio; ?>">
                        <option value="0">
                            Seleccione
                        </option <?php echo $ubicacion_edificio; ?>>
                        <?php
                            $query = $cnn->query("SELECT * FROM edificios");
                            while ($valor = mysqli_fetch_array($query)){
                                echo '<option value= "'.$valor['clave'].'">'.$valor['clave'].'</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Capacidad</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="capacidad" value="<?php echo $capacidad; ?>">
                </div>
            </div>

            <?php
                if(!empty($succesMessage)){
                    echo "
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-succes alert-dismisible fade-show' role='alert'>
                                <strong>$succesMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                            </div>
                        </div>
                    </div>
                    ";
                }
            ?>
            
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-danger" href=" tablaAulas.php" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>