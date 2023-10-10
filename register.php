<?php
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registrarse</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body>
<body>
    <div class="header">
        <a href="home.php"><img src="resources/logo.png"></a>
    </div>

    <br>
    <br>
    
    <h1>Registrarse</h1>
    <div class="formularios">
    <img src="resources/registro.png" class="imagenRegistro">
        <form method="POST" action="registerUser.php">
            <strong><label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" required>
            <br>
            <br>
            <label for="alias">Alias</label>
            <input type="text" id="alias" name="alias" required>
            <br>
            <br>
            <label for="primerApellido">Primer Apellido</label>
            <input type="text" id="primerApellido" name="primerApellido" required>
            <br>
            <br>
            <label for="segundoApellido">Segundo Apellido</label>
            <input type="text" id="segundoApellido" name="segundoApellido" required>
            <br>
            <br>
            <label for="email">Email</label>
            <input type="text" id="email" name="email" required>
            <br>
            <br>
            <label for="emailRepetido">Email Repetir</label>
            <input type="text" id="emailRepetido" name="emailRepetido" required>
            <br>
            <br>
            <label for="cuenta">Tarjeta</label>
            <input type="text" id="cuenta" name="cuenta" required>
            <br>
            <br>
            <label for="contraseña">Contraseña</label>
            <input type="text" id="contraseña" name="contraseña" required>
            <br>
            <br>
            <div class="center">

            <input type="submit" value="Registrarse" class="botonForms"></strong>

            </div>
        </form>
    </div>
</body>
</body>

</html>