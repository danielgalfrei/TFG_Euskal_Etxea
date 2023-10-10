<?php

$rol = require_once('sessionCheck.php');

if ($rol != 'user') {

    redireccionar('indexAdmin.php');

}
  
// Crea una variable PDO con la conexión y después se convierte a SQL
if (isset($_COOKIE['id_auth'])) {
    $id = $_COOKIE['id_auth'];
}
    $conn = obtenerPdoConexionBD();

   

    $sql = "SELECT * FROM usuarios WHERE Id_Usuario=?";

    $sentencia = $conn->prepare($sql);
    $sentencia->execute([$id]);
    $fila = $sentencia->fetch();

     // Con esto, accedemos a los datos de la fila que haya venido
    $nombre = $fila["Nombre"];
    $alias = $fila["Alias"];
    $primerApellido = $fila["PrimerApellido"];
    $segundoApellido = $fila["SegundoApellido"];
    $email = $fila["Email"];
    $contrasena = $fila["Contraseña"];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $contra =$_POST['contra'];
        if($contra == $contrasena){
            redireccionar("editUser.php");
        }
    }
    
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
        <a href="indexUser.php"><img src="resources/logo.png"></a>
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
        <form method="POST" action="user.php">
            <label for="contra">Contraseña:</label>
            <input type="password" id="contra" name="contra">
            <br><br><br>
            <div style="width: 100% ; text-align: center">
                <input class="botonForms" type="submit" value="Editar">
            </div>
        </form>
    </div>
</div>


</body>


</html>