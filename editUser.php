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
    $tarjeta = $fila["Tarjeta"];
    $contrasena = $fila["Contraseña"];
    $confContrasena = $fila["Contraseña"];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Editar Perfil</title>
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
    <div class="formularios">
        <form method="POST" action="editUserController.php">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?= $nombre ?>" required>
            <br>
            <br>
            <label for="alias">Alias:</label>
            <input type="text" id="alias" name="alias" value="<?= $alias ?>" required>
            <br>   
            <br> 
            <label for="primerApellido">Primer Apellido:</label>
            <input type="text" id="primerApellido" name="primerApellido" value="<?= $primerApellido ?>" required>
            <br>
            <br>
            <label for="segundoApellido">Segundo Apellido:</label>
            <input type="text" id="segundoApellido" name="segundoApellido" value="<?= $segundoApellido ?>" required>

            <br>
            <br>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?=$email?>" required>
            <br>
            <br>

            <label for="tarjeta">Tarjeta:</label>
            <input type="text" id="tarjeta" name="tarjeta" value="<?= $tarjeta ?>" required>
            <br>
            <br>
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" value="<?= $contrasena ?>" required>
            <br>
            <br>
            <label for="confirmarContrasena">Confirmar Contraseña:</label>
            <input type="password" id="confirmarContrasena" name="confirmarContrasena" required>

            <br>
            <br>
            <div style="width: 100% ; text-align: center">
                <input class="botonForms" type="submit" value="Guardar">
            </div>

        </form>
    </div>

</body>


</html>