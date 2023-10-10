<?php
$rol = require_once('sessionCheck.php');

if ($rol != 'admin') {

    redireccionar('indexUser.php');

}
$conn = obtenerPdoConexionBD();

$sql = "SELECT * FROM usuarios ORDER BY Nombre";

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

    <br>

    <div class="divUser" style="width: 100%">
        <form method="POST" action="createUserAdmin.php">
            <input class="botonForms" type="submit" value="Crear Usuario">
        </form>
        <br>


    <div style="width:70%">
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Alias</th>
                    <th>Apellidos</th>
                    <th>Rol</th>
                    <th class="TD_icoTabla">Ver</th>
                    <th class="TD_icoTabla">Editar</th>
                    <th class="TD_icoTabla">Eliminar</th>
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
                        <td>
                            <?= $fila["Rol"] ?>
                        </td>
                        <td class="icoTabla"><a href="userAdmin.php?id=<?= $fila["Id_Usuario"] ?>"><img class="icoTabla"
                                        src="resources/ver.png" alt="ver"></a></td>
                        <td class="icoTabla"><a href="editUserAdmin.php?id=<?= $fila["Id_Usuario"] ?>"><img
                                        class="icoTabla" src="resources/editar.png" alt="editar"></a></td>
                        <td class="icoTabla"><a href="deleteUserController.php?id=<?= $fila["Id_Usuario"] ?>"><img
                                        class="icoTabla" src="resources/borrar.png" alt="borrar"></a></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
    </div>

</body>


</html>