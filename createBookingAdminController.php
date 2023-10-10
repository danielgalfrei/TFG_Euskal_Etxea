<?php

// Crear una conexión
require_once('_varios.php');
// Crea una variable PDO con la conexión y después se convierte a SQL
$conn = obtenerPdoConexionBD();


// Comprobar si el formulario se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // Obtener los datos enviados por el formulario

    $fecha = $_POST['fecha'];
    $turno = $_POST['turno'];
    $horaEntrada = $_POST['horaEntrada'];
    $horaSalida = $_POST['horaSalida'];
    $numComensalesEntero = $_POST['numComensales'];
    $numComensales = (int) $numComensalesEntero;
    if (isset($_COOKIE['id_auth'])) {
        $id = $_COOKIE['id_auth'];
    }
    $codigoEntero = rand(10000, 99999);
    $codigo = strval($codigoEntero);
    $estado = "1";


    if (comprobarFechas($fecha, $turno, $horaEntrada, $horaSalida) == 3) {

        // Se realiza la consulta y se le añaden los parametros
        $sql = "INSERT INTO reservas (Id_Usuario, CodigoReserva, Fecha, Turno, HoraEntrada, HoraSalida, NumeroComensales, EstadoReserva) VALUES (?,?,?,?,?,?,?,?)";
        $sentencia = $conn->prepare($sql);
        $sentencia->execute([$id, $codigo, $fecha, $turno, $horaEntrada, $horaSalida, $numComensales, $estado]);

        redireccionar('bookingsAdmin.php');

    } else if (comprobarFechas($fecha, $turno, $horaEntrada, $horaSalida) == 2) {
        echo "<script>alert('Las hora de salida debe ser menor que la hora de entrada');</script>";
        redireccionar('createBookingAdmin.php');
    } else {
        echo "<script>alert('Fecha y turno introducidos ya tiene una reserva asociada.');</script>";
        redireccionar('createBookingAdmin.php');
    }

}

?>