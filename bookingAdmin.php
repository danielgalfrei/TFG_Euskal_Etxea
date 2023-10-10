<?php
    $rol = require_once('sessionCheck.php');

    if ($rol != 'admin') {

        redireccionar('indexUser.php') ;

    }
    $conn = obtenerPdoConexionBD();

    
    $id = (int)$_REQUEST["id"];
    $sql = "SELECT * FROM reservas WHERE Id_Reserva=?";

    $sentencia = $conn->prepare($sql);
    $sentencia->execute([$id]);
    $fila = $sentencia->fetch();

    // Obtener los datos enviados por el formulario
    
    $codigoReserva = $fila['CodigoReserva'];
    $fecha = $fila['Fecha'];
    $turno = $fila['Turno'];
    $horaEntrada = $fila['HoraEntrada'];
    $horaSalida = $fila['HoraSalida'];
    $numComensalesEntero = $fila['NumeroComensales'];
    $numComensales = (int)$numComensalesEntero;
    $usuario = $fila['Id_Usuario'];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Reserva</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <script src="script.js"></script>
</head>

<body>
    <div class="header">
        <a href="indexAdmin.php"><img src="resources/logo.png"></a>
        <a href="home.php"><img src="resources/salir.png" class="imagenDerecha"></a>
    </div>

    <br>
    <div class="divUser">
        <div class="userBox">
            <h3 style="width: 100% ; text-align: center; font-size: 150%;">
            <?=$codigoReserva?>
                <hr style="width: 100%">
            </h3>
        <p>Fecha: <span style="font-weight: lighter"><?=$fecha?></span></p>
        <br>
        <p>Hora de Entrada: <span style="font-weight: lighter"><?=$horaEntrada?></span></p>
        <br>
        <p>Hora de Salida: <span style="font-weight: lighter"><?=$horaSalida?></span></p>
        <br>
        <p>Nº de Comensales: <span style="font-weight: lighter"><?=$numComensales?></span></p>
        <br>
        <a class="botonForms" href="editBookingAdmin.php?id=<?=$fila["Id_Reserva"]?>">Editar</a>
        </div>
    </div>

</body>


</html>