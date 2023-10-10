<?php
// Crear una conexión
require_once('_varios.php');
// Crea una variable PDO con la conexión y después se convierte a SQL
$conn = obtenerPdoConexionBD();



// Comprobar si el formulario se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Obtener los datos enviados por el formulario
    if (isset($_COOKIE['id_auth'])) {
        $idUsuario = $_COOKIE['id_auth'];
    }
    $id = $_POST['idReserva'];
    $codigoReserva = $_POST['codigoReserva'];
    $fecha = $_POST['fecha'];
    $turno = $_POST['turno'];
    $horaEntrada = $_POST['horaEntrada'];
    $horaSalida = $_POST['horaSalida'];
    $numComensalesEntero = $_POST['numComensales'];
    $numComensales = (int) $numComensalesEntero;
    $estado = "1";


    // Control de fechas y turno
    $tiempoEntrada = strtotime($horaEntrada);
    $tiempoSalida = strtotime($horaSalida);

    if($tiempoEntrada>$tiempoSalida){
        setcookie("idEdit", $id, time() + (7 * 24 * 60 * 60), "/");
        echo "<script>alert('La hora de salida debe ser menor que la hora de entrada');</script>";
        redireccionar('editBooking.php');
    }else{
        //Sentencia sql para sacar el listado de emails
        $sql = "UPDATE reservas SET Id_Usuario=?, CodigoReserva=?, Fecha=?, Turno=?, HoraEntrada=?, HoraSalida=?, NumeroComensales=?, EstadoReserva=? WHERE Id_Reserva=?";
        $sentencia = $conn->prepare($sql);
        $sentencia->execute([$idUsuario, $codigoReserva, $fecha, $turno, $horaEntrada, $horaSalida, $numComensales, $estado, $id]); // Se añaden los parámetros a la consulta preparada.

        redireccionar('bookings.php');
    }



}
?>