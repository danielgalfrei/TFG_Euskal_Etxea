<?php
    $rol = require_once('sessionCheck.php');

    if ($rol != 'admin') {

        redireccionar('indexUser.php') ;

    }

    $conn = obtenerPdoConexionBD();

    
    $id = (int)$_REQUEST["id"];
    $sql = "SELECT * FROM usuarios WHERE Id_Usuario=?";

    $sentencia = $conn->prepare($sql);
    $sentencia->execute([$id]);
    $fila = $sentencia->fetch();

    // Obtener los datos enviados por el formulario
    
    $nombre = $fila['Nombre'];
    $alias = $fila['Alias'];
    $primerApellido = $fila['PrimerApellido'];
    $segundoApellido = $fila['SegundoApellido'];
    $email = $fila['Email'];
    $tarjeta = $fila['Tarjeta'];
    $contrasena = $fila['Contraseña'];


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
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
    <h1>Perfil de Usuario</h1>
    
    <div class="divUser">
    <div class="userBox">
        <h3 style="width: 100% ; text-align: center; font-size: 150%;">
            <?= $nombre ?>
            <hr style="width: 100%">
        </h3>
    
        <p>Alias:
            <span style="font-weight: lighter"><?= $alias ?></span> 
        </p>
        <p>Primer Apellido:
            <span style="font-weight: lighter"><?= $primerApellido ?></span> 
        </p>
        <p>Segundo Apellido:
            <span style="font-weight: lighter"><?= $segundoApellido ?></span> 
        </p>
        <p>Email:
            <span style="font-weight: lighter"><?= $email ?></span> 
        </p><br>
        <p>Tarjeta: <span style="font-weight: lighter"><?=$tarjeta?></span></p>
        <br>
        <p>Contraseña: <span style="font-weight: lighter"><?=$contrasena?></span></p>
        <br>

        <a class="botonForms" href="editUserAdmin.php?id=<?=$fila["Id_Usuario"]?>">Editar</a></td>

     
</body>


</html>