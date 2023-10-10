<?php

    
    $rol = require_once('sessionCheck.php');

    if ($rol != 'admin') {

        redireccionar('indexUser.php') ;

    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <title>Inicio Admin</title>
</head>

<body>
    <div class="header">
        <a href="indexAdmin.php"><img src="resources/logo.png"></a>
        <a href="home.php"><img src="resources/salir.png" class="imagenDerecha"></a>
    </div>

    
    <br>
    <br>
    <h1>Admin</h1>
    <br>
    <div style="width: 100%; text-align: center">
        <img style="width: 30%;" src="resources/ikurrina.jpeg" alt="ikurrina">
    </div>
    <br>
    <br>
    <div class="forms">
        <form method="POST" action="bookingsAdmin.php">
            <input class="button" type="submit" value="Gestion de Reservas">
        </form>
        <form method="POST" action="usersAdmin.php">
            <input class="button" type="submit" value="Gestion de Usuarios">
        </form>
    </div>
</body>

</html>