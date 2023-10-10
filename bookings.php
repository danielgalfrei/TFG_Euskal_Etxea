<?php

$rol = require_once('sessionCheck.php');
if ($rol != 'user') {


    redireccionar('indexAdmin.php');

}

$conn = obtenerPdoConexionBD();

if (isset($_COOKIE['id_auth'])) {
    $id = $_COOKIE['id_auth'];
}
// Los campos que incluyo en el SELECT son los que luego podré leer
// con $fila["campo"].
$sql = "SELECT * FROM reservas WHERE Id_Usuario=? ORDER BY Fecha";

$sentencia = $conn->prepare($sql);
$sentencia->execute([$id]);
$rs = $sentencia->fetchAll();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Mis Reservas</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <script src="script.js"></script>
</head>

<body>
    <div class="header">
        <a href="indexUser.php"><img src="resources/logo.png"></a>
        <a href="user.php"><img src="resources/perfil.png" class="imagenDerecha2"></a>
        <a href="home.php"><img src="resources/salir.png" class="imagenDerecha"></a>
    </div>
    <br>
    <br>
    <h1>Lista de Reservas</h1>
    
    <br>


    <br>

    <div class="divUser" style="width: 100%">

        <form method="POST" action="createBooking.php">
            <input class="botonForms" type="submit" value="Crear Reserva">
        </form>
        <br>


        <div style="width:70%">
            <table class="table">

                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Fecha</th>
                        <th>Turno</th>
                        <th class="TD_icoTabla">Ver</th>
                        <th class="TD_icoTabla">Editar</th>
                        <th class="TD_icoTabla">Cancelar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rs as $fila) { ?>
                        <tr>
                            <td>
                                <?= $fila["CodigoReserva"] ?>
                            </td>
                            <td>
                                <?= $fila["Fecha"] ?>
                            </td>
                            <td>
                                <?= $fila["Turno"] ?>
                            </td>
                            <td class="icoTabla"><a href="booking.php?id=<?= $fila["Id_Reserva"] ?>"><img class="icoTabla"
                                        src="resources/ver.png" alt="ver"></a></td>
                            <td class="icoTabla"><a href="editBooking.php?id=<?= $fila["Id_Reserva"] ?>"><img
                                        class="icoTabla" src="resources/editar.png" alt="editar"></a></td>
                            <td class="icoTabla"><a href="deleteBookingController.php?id=<?= $fila["Id_Reserva"] ?>"><img
                                        class="icoTabla" src="resources/borrar.png" alt="borrar"></a></td>

                        </tr>
                    <?php } ?>


                </tbody>
            </table>
        </div>

    </div>


</body>


</html>