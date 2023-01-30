<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="icon" href="recursos/tecnm.ico">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="estilos/nav-student.css">
</head>
<body>
    <div class="contenedor">
        <nav>
            <ul>
                <li>
                    <a href="barra-student.php" class="logo">
                        <img src="recursos/trecnm.png" alt="logo">
                        <span class="nav-item">Sistema de <br> Gestion</span>
                    </a>
                </li>
                <li>
                    <a href="agenda_student/index.php" target="marco">
                        <i class='bx bx-calendar'></i>
                        <span class="nav-item">Calendario</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bx-time'></i>
                        <span class="nav-item">Horarios</span>
                    </a>
                </li>
                <style>
                    .Salir{
                        bottom: -450px;
                    }
                </style>
                <li>
                    <a href="scripts/cerrar.php" class="Salir">
                        <i class='bx bx-log-out'></i>
                        <span class="nav-item">Salir</span>
                    </a>
                </li>
            </ul>
        </nav>

        <section class="main">
            <div class="main-content">
                <iframe name="marco" class="marco" src="inicio.html">

                </iframe>
            </div>
        </section>
    </div>
</body>
</html>