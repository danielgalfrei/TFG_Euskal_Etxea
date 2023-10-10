<?php
$rol = require_once('sessionCheck.php');

if ($rol != 'admin') {

    redireccionar('indexUser.php');

}

$conn = obtenerPdoConexionBD();

if (isset($_COOKIE['codigoUsuario'])) {
    $id = $_COOKIE['codigoUsuario'];
} else {
    $id = $_REQUEST["id"];
}
// Los campos que incluyo en el SELECT son los que luego podré leer
// con $fila["campo"].
$sql = "SELECT * FROM usuarios WHERE Id_Usuario=?";

$sentencia = $conn->prepare($sql);
$sentencia->execute([$id]);
$fila = $sentencia->fetch();
$codigoUsuario = $fila['Id_Usuario'];
$nombreUsuario = $fila['Nombre'];
$primerApellido = $fila['PrimerApellido'];
$segundoApellido = $fila['SegundoApellido'];

setcookie("codigoUsuario", "", time() - 7000);

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
        <a href="indexAdmin.php"><img src="resources/logo.png"></a>
        <a href="home.php"><img src="resources/salir.png" class="imagenDerecha"></a>
    </div>
    <br>
    <br>
    <h1>Hacer Reserva</h1>

    <div class="formularios">
        <form method="POST" action="createBookingAdminController.php">
            <label for="nombre">Código Usuario:</label>
            <input type="text" id="nombre" name="nombre" value="<?= $codigoUsuario ?>" readonly required>
            <br><br>
            <label for="nombre">Nombre Usuario:</label>
            <input type="text" id="nombre" name="nombre" value="<?= $nombreUsuario ?>" readonly required>
            <br><br>
            <label for="nombre">Apellidos:</label>
            <input type="text" id="nombre" name="nombre" value="<?= $primerApellido ?> <?= $segundoApellido ?>" readonly
                required>
            <br><br>
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required>
            <br><br>

            <label for="turno">Turno:</label>
            <select id="turno" name="turno">
                <option id="manana">Mañana</option>
                <option id="tarde">Tarde</option>
            </select>
            <br><br>
            <label for="horaEntrada">Hora de entrada:</label>
            <input type="time" id="horaEntrada" name="horaEntrada" required>
            <br><br>
            <label for="horaSalida">Hora de salida:</label>
            <input type="time" id="horaSalida" name="horaSalida" required>
            <br><br>
            <label for="numComensales">Número de comensales:</label>

            <input type="number" id="numComensales" name="numComensales" max="10" min="0" required>
            <br><br>
            <div style="text-align:center">
                <input class="botonForms" type="submit" onclick="horarios()" value="Confirmar Reserva">
            </div>

        </form>
    </div>
</body>


</html>