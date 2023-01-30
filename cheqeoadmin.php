<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="estilos/chequeo.css">
</head>
<body>
    <div class="contenedor">
        <form action="scripts/adminCnn.php" method="POST">
            <div class="fondo">
                <div class="titulo">
                    Administrador
                </div>
                <div class="entradas">
                    <div class="">
                        <br>
                        <i class='bx bx-user bx-burst-hover'></i>
                        <input type="text" id="txtNick" name="txtNick" placeholder="contraseña" class="inte">
                    </div>
                    <div class="elementos">
                        <br>
                        <i class='bx bxs-lock-alt bx-burst-hover'></i>
                        <input type="password" id="txtPass" name="txtPass" placeholder="Clave" class="inte">
                    </div>
                    <div class="">
                        <input type="submit" value="ACCEDER" class="boton">
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>