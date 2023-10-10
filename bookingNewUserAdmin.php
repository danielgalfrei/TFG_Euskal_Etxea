<?php
$rol = require_once('sessionCheck.php');

if ($rol != 'admin') {

    redireccionar('indexUser.php');

}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <title>Registrar Usuario</title>
</head>
  
<body>
    <div class="header">
        <a href="indexAdmin.php"><img src="resources/logo.png"></a>
        <a href="home.php"><img src="resources/salir.png" class="imagenDerecha"></a>
    </div>
    <h1>Registrar Usuario</h1>
    <div class="formularios">
        <form method="POST" action="bookingNewUserAdminController.php">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <br><br>
            <label for="alias">Alias:</label>
            <input type="text" id="alias" name="alias" required>
            <br><br>
            <label for="primerApellido">Primer Apellido:</label>
            <input type="text" id="primerApellido" name="primerApellido" required>
            <br><br>
            <label for="segundoApellido">Segundo Apellido:</label>
            <input type="text" id="segundoApellido" name="segundoApellido" required>
            <br><br>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            <br><br>
            <label for="email">Email Repetir:</label>
            <input type="text" id="email" name="email" required>
            <br><br>
            <label for="cuenta">Cuenta:</label>
            <input type="text" id="cuenta" name="cuenta" required>
            <br><br>
            <label for="cuenta">Contraseña:</label>
            <input type="text" id="contraseña" name="contraseña" required>
            <br><br>
            <div style="text-align:center">
                <input class="botonForms" type="submit" value="Crear">
            </div>

        </form>
    </div>
</body>


</html>