<?php
// Crear una conexión
    require_once('_varios.php');
    // Crea una variable PDO con la conexión y después se convierte a SQL
    $conn = obtenerPdoConexionBD();



    // Comprobar si el formulario se ha enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {


        // Obtener los datos enviados por el formulario
        $nombre = $_POST['nombre'];
        $alias = $_POST['alias'];
        $primerApellido = $_POST['primerApellido'];
        $segundoApellido = $_POST['segundoApellido'];
        $email = $_POST['email'];
        $tarjeta = $_POST['tarjeta'];
        $contraseña = $_POST['contrasena'];
        if (isset($_COOKIE['id'])) {
            $id = $_COOKIE['id'];
        }

        //Sentencia sql para sacar el listado de emails
        $sql = "UPDATE usuarios SET Nombre=?, Alias=?, PrimerApellido=?, SegundoApellido=?, Email=?, Tarjeta=?, Contraseña=? WHERE Id_Usuario=?";
        $sentencia = $conn->prepare($sql);
        $sentencia->execute([$nombre,$alias,$primerApellido,$segundoApellido,$email,$tarjeta,$contraseña,$id]); // Se añaden los parámetros a la consulta preparada.

        redireccionar('usersAdmin.php');
    }
    ?>