<?php

// Crear una conexión
require_once('_varios.php');
// Crea una variable PDO con la conexión y después se convierte a SQL
$conn = obtenerPdoConexionBD();


// Comprobar si el formulario se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $nombre = $_POST['nombre'];
    $alias = $_POST['alias'];
    $primerApellido = $_POST['primerApellido'];
    $segundoApellido = $_POST['segundoApellido'];
    $email = $_POST['email'];
    $emailRepetir = $_POST['emailRepetir'];
    $cuenta = $_POST['cuenta'];
    $contraseña = $_POST['contraseña'];
    $rol = "user";

    if($email != $emailRepetir){
        redireccionar("createUserAdmin.php");
    }

    //Sentencia sql para sacar el listado de emails
    $sql2 = "SELECT Email FROM usuarios";
    $sentencia = $conn->prepare($sql2);
    $sentencia->execute();
    $resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    
    //Evitar que se registren usuarios con emails repetidos
    foreach($resultados as $resultado){
        if($resultado['Email'] == $email){
            redireccionar('home.php');
        }
    }
    // Se realiza la consulta y se le añaden los parametros
    $sql = "INSERT INTO usuarios (Nombre, Alias, PrimerApellido, SegundoApellido, Email, Tarjeta, Contraseña, Rol) VALUES (?,?,?,?,?,?,?,?)";
    $sentencia = $conn->prepare($sql);
    $sentencia->execute([$nombre,$alias,$primerApellido,$segundoApellido,$email,$cuenta,$contraseña,$rol]); 

    redireccionar('usersAdmin.php');
}
?>