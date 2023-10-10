<?php
    $rol = require_once('sessionCheck.php');

    if ($rol != 'admin') {

        redireccionar('indexUser.php');

    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Nueva Reserva</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body>
    <div class="header">
        <a href="indexAdmin.php"><img src="resources/logo.png"></a>
        <a href="home.php"><img src="resources/salir.png" class="imagenDerecha"></a>
    </div>
    <br>
    <br>
    <h1>Nueva Reserva</h1>
    <br>
    <br>
    <div class="divUser"> 
        <img style="width: 15%;" src="resources/vasco.png" alt="usuario vasco">
    </div>
    <br><br>
    <div class="forms">
        <form method="POST" action="bookingUsersAdmin.php">
            <input class="button" type="submit" value="Usuario Existente">
        </form>
        <form method="POST" action="bookingNewUserAdmin.php">
            <input class="button" type="submit" value="Nuevo Usuario">
        </form>
    </div>
</body>

</html>