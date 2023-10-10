<?php

    $rol = require_once('sessionCheck.php');

    if ($rol != 'user') {

        redireccionar('indexAdmin.php') ;
        
    }
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Inicio Usuario</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body>
    <div class="header">
        <a href="indexUser.php"><img src="resources/logo.png"></a>
        <a href="user.php"><img src="resources/perfil.png" class="imagenDerecha2"></a>

        <a href="closeSession.php"><img src="resources/salir.png" class="imagenDerecha"></a>
      
    </div>
    
    <br>
    <br>
    
    <div style="width: 100%; text-align: center">
        <img src="resources/ikurrina.jpeg" alt="ikurrina">
    </div>

    <br>
    <br>
    <div class="forms">
        <form method="POST" action="bookings.php">
            <input class="button" type="submit" value="Mis Reservas">
        </form>
        <br>
        <form method="POST" action="createBooking.php">
            <input class="button" type="submit" value="Haz Tu Reserva">
        </form>
    </div>
</body>

</html>