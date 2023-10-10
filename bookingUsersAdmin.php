<?php
$rol = require_once('sessionCheck.php');

if ($rol != 'admin') {

    redireccionar('indexUser.php');


}
$conn = obtenerPdoConexionBD();

$sql = "SELECT * FROM usuarios WHERE rol = 'user' ORDER BY Nombre";

$sentencia = $conn->prepare($sql);
$sentencia->execute([]); // Array vacío porque la consulta preparada no requiere parámetros.
$rs = $sentencia->fetchAll();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
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
    <h1>Lista de Usuarios</h1>


    <div class="divUser" style="width: 100%">

        <div style="width:70%">
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th class="TD_icoTabla">Seleccionar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rs as $fila) { ?>
                        <tr>
                            <td>
                                <?= $fila["Nombre"] ?>
                            </td>
                            <td>
                                <?= $fila["Alias"] ?>
                            </td>
                            <td>
                                <?= $fila["PrimerApellido"] ?>
                                <?= $fila["SegundoApellido"] ?>
                            </td>
                            <td><a class="icoTabla" href="createBookingAdmin.php?id=<?= $fila["Id_Usuario"] ?>"><img
                                        class="icoTabla" src="resources/eleccion.png" alt="borrar"></a></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <br>
        </div>
    </div>


</body>


</html>