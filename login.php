<?php

// Crear una conexión
require_once('_varios.php');
// Crea una variable PDO con la conexión y después se convierte a SQL
$conn = obtenerPdoConexionBD();



// Comprobar si el formulario se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // Obtener los datos enviados por el formulario
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];


    // SE USA EL MÉTODO QUE USA LA QUERY
    // SE MIRA SI $usuario EXISTE EN LA BBDD Y SI $password SE CORRESPONDE CON SU CONTRASEÑA
    // Consulta SQL para buscar el usuario
    // Consulta SQL para buscar el usuario
    $sql = "SELECT Email, Contraseña, Rol FROM usuarios WHERE Email = '$email' AND Contraseña = '$contraseña'";

    // Prepara la query para la ejecución
    $sentencia = $conn->prepare($sql);
    // Ejecuta la query
    $sentencia->execute();
    // Saca todos los datos de la query
    $resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);



    $sql2 = "SELECT Id_Usuario From usuarios WHERE Email =?";
    $sentencia = $conn->prepare($sql2);
    $sentencia->execute([$email]);
    $fila = $sentencia->fetch();

    $id = $fila["Id_Usuario"];

    // Prepara la query para la ejecución
    $sentencia = $conn->prepare($sql);

    // Ejecuta la query
    $sentencia->execute();

    // Saca todos los datos de la query
    $resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);


    // Comprobar si se encontraron resultados o no

    // Si no se encuentran resultados se sigue en el login
    if (empty($resultados)) {
        redireccionar('login.php');
        exit;
    } else {
        setcookie("mail_auth", $email, time() + (7 * 24 * 60 * 60), "/");
        setcookie("passwrd_auth", $contraseña, time() + (7 * 24 * 60 * 60), "/");
        setcookie("id_auth", $id, time() + (7 * 24 * 60 * 60), "/");

        $usuario = $resultados[0];
        $rol = $usuario['Rol'];

        if ($rol == 'admin') {

            // Redirigir a la página de inicio
            redireccionar('indexAdmin.php');
            
        }elseif ($rol == 'user') {
            
            // Redirigir a la página de inicio
            redireccionar('indexUser.php');

        }


        exit;
    }

}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body>
    <div class="header">
        <a href="home.php"><img src="resources/logo.png"></a>
    </div>

    <br>
    <br>

    <h1>Iniciar sesión</h1>
    <div class="formularios">
        <form class="divForm" method="POST" action="login.php">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required><br>
            <br>
            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" required><br>
            <br>
            <input class="botonForms" type="submit" value="Entrar">
        </form>
    </div>

</body>

</html>