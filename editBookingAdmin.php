<?php
    $rol = require_once('sessionCheck.php');

    if ($rol != 'admin') {

        redireccionar('indexUser.php') ;

    }
    $conn = obtenerPdoConexionBD();

    
    if(isset($_COOKIE['idEdit'])){
        $id = $_COOKIE['idEdit'];
    }else{
        $id = (int)$_REQUEST["id"];
    }
    
    $sql = "SELECT * FROM reservas WHERE Id_Reserva=?";

    $sentencia = $conn->prepare($sql);
    $sentencia->execute([$id]);
    $fila = $sentencia->fetch();

    setcookie("idEdit", "", time() - 7000);

    // Obtener los datos enviados por el formulario
    
    $codigoReserva = $fila['CodigoReserva'];
    $fecha = $fila['Fecha'];
    $turno = $fila['Turno'];
    $horaEntrada = $fila['HoraEntrada'];
    $horaSalida = $fila['HoraSalida'];
    $numComensalesEntero = $fila['NumeroComensales'];
    $numComensales = (int)$numComensalesEntero;
    $idUsuario = $fila['Id_Usuario']; 
    setcookie("idUsuario", $idUsuario, time() + (7 * 24 * 60 * 60), "/");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Editar Reserva</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <script src="script.js"></script>
</head>

<body>
    <div class="header">
        <a href="indexAdmin.php"><img src="resources/logo.png"></a>
        <a href="home.php"><img src="resources/salir.png" class="imagenDerecha"></a>
    </div>
  
    <h1>Editar Reserva <?$codigoReserva?></h1>
    
    <div class="formularios">
        <form method="POST" action="editBookingAdminController.php">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" value="<?=$fecha?>" required>

          <br><br>            

            <label for="turno">Turno:</label>
            <?php if($turno == "Mañana"){ ?>
                <select id="turno" name="turno">
                    <option id="manana" selected>Mañana</option>
                    <option id="tarde">Tarde</option>
                </select>
            
            <?php }elseif($turno == "Tarde"){ ?>


                <select id="turno" name="turno">
                    <option id="manana">Mañana</option>
                    <option id="tarde" selected>Tarde</option>
                </select>     


            <?php } ?>
            <br><br>
            <label for="horaEntrada">Hora de entrada:</label>
            <input type="time" id="horaEntrada" name="horaEntrada" value="<?=$horaEntrada?>" required>
            <br><br>
            <label for="horaSalida">Hora de salida:</label>
            <input type="time" id="horaSalida" name="horaSalida" value="<?=$horaSalida?>" required>

            <br><br>
            <label for="numComensales">Número de comensales:</label>
            <input type="number" id="numComensales" name="numComensales" max="10" min="0" value="<?=$numComensales?>" required>

            <input type="hidden" id="idReserva" name="idReserva" value="<?=$id?>" required>
            <input type="hidden" id="codigoReserva" name="codigoReserva" value="<?=$codigoReserva?>" required>
            <br><br>
            <div style="text-align:center">
                <input class="botonForms" type="submit" onclick="horarios()" value="Confirmar Cambios">
            </div>    

        </form>
    </div>
</body>


</html>