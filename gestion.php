<?php
$server = "localhost";
$user = "root";
$pass = "";
$bd = "baseaulas";

$materia = "";
$profesor = "";
$codigo_aula = "";
$clave_grupo = "";
$periodo = "";
$dia = "";
$hora_entrada = "";
$hora_salida = "";

$erroMessage = "";
$succesMessage = "";

$cnn = new mysqli($server, $user, $pass, $bd);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $materia = $_POST["materia"];
    $profesor = $_POST["profesor"];
    $codigo_aula = $_POST["codigo_aula"];
    $clave_grupo = $_POST["clave_grupo"];
    $periodo = $_POST["periodo"];
    $dia = $_POST["dia"];
    $hora_entrada = $_POST["hora_entrada"];
    $hora_salida = $_POST["hora_salida"];

    //variables de condicion para delimitar el registro de clases
    $capacidadAula = "SELECT capacidad FROM aulas Where codigo_aula = '$codigo_aula'";
    $capacidadAlumnos = "SELECT numero_alumno FROM grupo Where clave_grupo = '$clave_grupo'";

    $EntraDocente = "SELECT hora_entrada from docentes where hora_entrada  = '$hora_entrada'";
    $SaleDocente = "SELECT hora_salida FROM docentes WHERE hora_salida = '$hora_salida'";
    $periodoHabil = "SELECT periodo_grupo FROM grupos WHERE clave_grupo = '$clave_grupo'";

    $diahabil = "SELECT dia_semana FROM dias WHERE dia_semana = '$'";

    if ($capacidadAlumnos > $capacidadAula) {
        if ($EntraDocente > $hora_entrada && $SaleDocente > $hora_salida) {
            // if ($periodo == $periodoHabil) {
                do {
                    if (empty($materia) || empty($profesor) || empty($codigo_aula) || empty($clave_grupo) || empty($periodo) || empty($dia) || empty($hora_entrada) || empty($hora_salida)) {
                        $erroMessage = "Porfavor llene todos los campos";
                        break;
                    }
                    $sql = "INSERT INTO clases (materia,profesor,codigo_aula,clave_grupo,periodo,dia,hora_entrada,hora_salida)" . "VALUES ('$materia', '$profesor','$codigo_aula','$clave_grupo','$periodo','$dia','$hora_entrada','$hora_salida')";
                    $result = $cnn->query($sql);
                    if (!$result) {
                        $erroMessage = "Instancia invalida: " . $cnn->error;
                        break;
                    }

                    //añadir nuevos datos
                    $materia = "";
                    $profesor = "";
                    $codigo_aula = "";
                    $clave_grupo = "";
                    $periodo = "";
                    $dia = "";
                    $hora_entrada = "";
                    $hora_salida = "";

                    $succesMessage = "Se añadio correctamente";
                    header("Location: gestion.php");
                    exit;
                } while (false);
            // } else {
            //     $erroMessage = "El periodo no corresponde al que cursa el grupo seleccionado";
            // }
        } else {
            $erroMessage = "El docente no esta disponible en ese lapso de tiempo";
        }
    } else {
        $erroMessage = "El grupo execede la capacidad del aula, elija otra";
    }
}

include("session.php");

if (isset($_POST['search'])) {
    $valueToSearh = $_POST['valueToSearh'];
    $query1 = "SELECT * FROM clases WHERE materia LIKE '%" . $valueToSearh . "%' OR codigo_aula LIKE '%" . $valueToSearh . "%'";
    $result1 = filterRecord($query1);
} else {
    $query1 = "SELECT * FROM clases";
    $result1 = filterRecord($query1);
}

function filterRecord($query1)
{
    include("config.php");
    $filter_result1 = mysqli_query($mysqli1, $query1);
    return $filter_result1;
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
    <link href="../estilos/edificiosEstils.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
    <style>
        .regresa {
            float: left;
            margin-top: 5px;
            margin-right: 20px;
        }
    </style>
    <div class="regresa">
        <a href="listado/menuListado.php" class="btn btn-success">Regresar</a>
    </div>
        <div class="row">
            <div class="col-md-4">
                <h2>Agregar clases</h2>

                <?php
                if (!empty($erroMessage)) {
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
                        <label class="col-sm-3 col-form-label">Materia</label>
                        <div class="col-sm-6">
                            <select name="materia" id="" value="<?php echo $materia; ?>">
                                <option value="0">
                                    Seleccione
                                </option <?php echo $materia; ?>>
                                <?php
                                $query = $cnn->query("SELECT * FROM materias");
                                while ($valor = mysqli_fetch_array($query)) {
                                    echo '<option value= "' . $valor['clave_materia'] . '">' . $valor['clave_materia'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Docente</label>
                        <div class="col-sm-6">
                            <select name="profesor" id="" value="<?php echo $profesor; ?>">
                                <option value="0">
                                    Seleccione
                                </option <?php echo $profesor; ?>>
                                <?php
                                $query = $cnn->query("SELECT * FROM docentes");
                                while ($valor = mysqli_fetch_array($query)) {
                                    echo '<option value= "' . $valor['clave_docente'] . '">' . $valor['clave_docente'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Aula</label>
                        <div class="col-sm-6">
                            <select name="codigo_aula" id="" value="<?php echo $codigo_aula; ?>">
                                <option value="0">
                                    Seleccione
                                </option <?php echo $codigo_aula; ?>>
                                <?php
                                $query = $cnn->query("SELECT * FROM aulas");
                                while ($valor = mysqli_fetch_array($query)) {
                                    echo '<option value= "' . $valor['codigo_aula'] . '">' . $valor['codigo_aula'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Grupo</label>
                        <div class="col-sm-6">
                            <select name="clave_grupo" id="" value="<?php echo $clave_grupo; ?>">
                                <option value="0">
                                    Seleccione
                                </option <?php echo $clave_grupo; ?>>
                                <?php
                                $query = $cnn->query("SELECT * FROM grupos");
                                while ($valor = mysqli_fetch_array($query)) {
                                    echo '<option value= "' . $valor['clave_grupo'] . '">' . $valor['clave_grupo'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Periodo</label>
                        <div class="col-sm-6">
                            <select name="periodo" id="" value="<?php echo $periodo; ?>">
                                <option value="0">
                                    Seleccione
                                </option <?php echo $periodo; ?>>
                                <?php
                                $query = $cnn->query("SELECT * FROM periodo");
                                while ($valor = mysqli_fetch_array($query)) {
                                    echo '<option value= "' . $valor['nombre'] . '">' . $valor['nombre'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Dia</label>
                        <div class="col-sm-6">
                            <select name="dia" id="" value="<?php echo $dia; ?>">
                                <option value="0">
                                    Seleccione
                                </option <?php echo $dia; ?>>
                                <?php
                                $query = $cnn->query("SELECT * FROM dias");
                                while ($valor = mysqli_fetch_array($query)) {
                                    echo '<option value= "' . $valor['dia_semana'] . '">' . $valor['dia_semana'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Entrada</label>
                        <div class="col-sm-6">
                            <select name="hora_entrada" id="" value="<?php echo $hora_entrada; ?>">
                                <option value="0">
                                    Seleccione
                                </option <?php echo $hora_entrada; ?>>
                                <?php
                                $query = $cnn->query("SELECT * FROM horas");
                                while ($valor = mysqli_fetch_array($query)) {
                                    echo '<option value= "' . $valor['inicio'] . '">' . $valor['inicio'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Salida</label>
                        <div class="col-sm-6">
                            <select name="hora_salida" id="" value="<?php echo $hora_salida; ?>">
                                <option value="0">
                                    Seleccione
                                </option <?php echo $hora_salida; ?>>
                                <?php
                                $query = $cnn->query("SELECT * FROM horas");
                                while ($valor = mysqli_fetch_array($query)) {
                                    echo '<option value= "' . $valor['inicio'] . '">' . $valor['inicio'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <?php
                    if (!empty($succesMessage)) {
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
                            <button type="submit" class="btn btn-primary">Aceptar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <br/>
                <?php
                echo "<table class='table table-striped mx-auto' border='1'>
                <tr class = 'table-success'>
                <th>Materia</th>
                <th>Docente</th>
                <th>Aula</th>
                <th>Grupo</th>
                <th>Periodo</th>
                <th>Dia</th>
                <th>Entrada</th>
                <th>Salida</th>
                <th>Eliminar</th>
                </tr>";

                while ($row = mysqli_fetch_array($result1)) {
                echo "<tr>";
                echo "<td>" . $row['materia'] . "</td>";
                echo "<td>" . $row['profesor'] . "</td>";
                echo "<td>" . $row['codigo_aula'] . "</td>";
                echo "<td>" . $row['clave_grupo'] . "</td>";
                echo "<td>" . $row['periodo'] . "</td>";
                echo "<td>" . $row['dia'] . "</td>";
                echo "<td>" . $row['hora_entrada'] . "</td>";
                echo "<td>" . $row['hora_salida'] . "</td>";
                echo "<td><a href='delete.php?id=" . $row['id'] . "'> <i class='bx bx-trash'> </i> </a></td>";
                echo "</tr>";
                }
                echo "</table>";
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>