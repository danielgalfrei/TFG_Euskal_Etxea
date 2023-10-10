<?php

    $rol = require_once('sessionCheck.php');

    if ($rol != 'user') {

        redireccionar('indexAdmin.php');

    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Crear Reserva</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <script src="script.js"></script>
</head>

<body>
    <div class="header">
        <a href="indexUser.php"><img src="resources/logo.png"></a>
        <a href="user.php"><img src="resources/perfil.png" class="imagenDerecha2"></a>
        <a href="home.php"><img src="resources/salir.png" class="imagenDerecha"></a>
    </div>
    <h1>¡Haz Tu Reserva!</h1>
    

    <div class="divUser">
    <div class="divUser"> 
        <img style="width: 10%;" src="resources/plato.png" alt="plato">
    </div>
    <br>

    <div class="formularios">
    <form method="POST" action="createBookingController.php">
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha"required>

        <br><br>

        <label for="turno">Turno:</label>
        <select id="turno" name="turno">
            <option id="manana">Mañana</option>
            <option id="tarde">Tarde</option>
        </select>
      
        <br><br>

        <label for="horaEntrada">Hora de entrada:</label>
        <input type="time" id="horaEntrada" name="horaEntrada"required>
        <br><br>        
        <label for="horaSalida">Hora de salida:</label>
        <input type="time" id="horaSalida" name="horaSalida" required>
        <br><br>
        <label for="numComensales">Número de comensales:</label>
        <input type="number" id="numComensales" name="numComensales" max="10" min="0" required>
        <br><br>
        <div style="width: 100% ; text-align: center">
            <input class="botonForms" type="submit"  onclick="horarios()" value="Confirmar Reserva">
        </div>

        </form>
    </div>
    </div>
</body>


</html>