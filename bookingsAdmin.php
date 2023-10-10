<?php
    $rol = require_once('sessionCheck.php');

    if ($rol != 'admin') {

        redireccionar('indexUser.php');

    }
    $conn = obtenerPdoConexionBD();

	$sql = "SELECT * FROM reservas ORDER BY Fecha";

    $sentencia = $conn->prepare($sql);
    $sentencia->execute([]); 
    $rs = $sentencia->fetchAll();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Reservas</title>
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
    <h1>Lista de Reservas</h1>
    
    <div class="divUser" style="width: 100%">
        <form method="POST" action="newBookingAdmin.php">
            <input class="botonForms" type="submit" value="Crear Reserva">
        </form>
        <br>
        <div style="width:70%">
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Fecha</th>
                    <th>Turno</th>
                    <th>Usuario</th>
                    <th class="TD_icoTabla">Ver</th>
                    <th class="TD_icoTabla">Editar</th>
                    <th class="TD_icoTabla">Cancelar</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($rs as $fila) { ?>
                <tr>
                    <td><?=$fila["CodigoReserva"]?></td>
                    <td><?=$fila["Fecha"]?></td>
                    <td><?=$fila["Turno"]?></td>
                    <td><?=$fila["Id_Usuario"]?></td>
                    <td class="icoTabla"><a href="bookingAdmin.php?id=<?=$fila["Id_Reserva"]?>"><img class="icoTabla"
                                        src="resources/ver.png" alt="ver"></a></td>
                    <td class="icoTabla"><a href="editBookingAdmin.php?id=<?=$fila["Id_Reserva"]?>"><img
                                        class="icoTabla" src="resources/editar.png" alt="editar"></a></td>
                    <td class="icoTabla"><a href="deleteBookingAdminController.php?id=<?=$fila["Id_Reserva"]?>"><img
                                        class="icoTabla" src="resources/borrar.png" alt="borrar"></a></td>


                </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>
        <br>
    </div>

</body>


</html>