<?php

// Crear una conexión
require_once('_varios.php');
// Crea una variable PDO con la conexión y después se convierte a SQL
$conn = obtenerPdoConexionBD() ;


// Comprobar si existen las cookies necesarias
if (isset($_COOKIE['mail_auth']) && isset($_COOKIE['passwrd_auth'])) {


    // Nombre de usuario que deseas buscar
    $email = $_COOKIE['mail_auth']; // Reemplaza "usuario" con el nombre de usuario que estás buscando
    $contraseña = $_COOKIE['passwrd_auth'];

    // Consulta SQL para buscar el usuario
    $sql = "SELECT Email, Contraseña, Rol FROM usuarios WHERE Email = '$email' AND Contraseña = '$contraseña'";

    // Prepara la query para la ejecución
    $sentencia = $conn->prepare($sql);

    // Ejecuta la query
    $sentencia->execute();

    // Saca todos los datos de la query
    $resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);


    if (empty($resultados)) {
        header('Location: login.php');
        exit;
    }else{
        $usuario = $resultados[0];
        $rol = $usuario['Rol'];
        return $rol ;
    }

} else {
    header('Location: home.php');
    exit;
}



// Resto del código de la página restringida
?>