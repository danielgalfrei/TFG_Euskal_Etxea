<?php
setcookie("mail_auth", "", time() - 7000);
setcookie("passwrd_auth", "", time() - 7000);
setcookie("id_auth", "", time() - 7000);
setcookie("idUsuario", "", time() - 7000);
setcookie("id", "", time() - 7000);
setcookie("codigoUsuario", "", time() - 7000);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body>
    <div class="header">
        <a href="home.php"><img src="resources/logo.png"></a>
    </div>

    <br>
    <br>

    <div id="carrusel-contenido">
        <div id="carrusel-caja">
            <div class="carrusel-elemento">
                <img class="imagenes" src="resources/sliderUno.png">
            </div>
            <div class="carrusel-elemento">
                <img class="imagenes" src="resources/sliderDos.png">
            </div>
            <div class="carrusel-elemento">
                <img class="imagenes" src="resources/sliderTres.png">
            </div>
        </div>
    </div>

    <div class="forms">
        <form method="GET" action="register.php">
            <input class="button" type="submit" value="Registrarse">
        </form>
        <form method="GET" action="login.php">
            <input class="button" type="submit" value="Iniciar Sesion">
        </form>
    </div>
</body>

</html>