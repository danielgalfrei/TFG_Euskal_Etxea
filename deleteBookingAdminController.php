<?php
	require_once "_varios.php";

	$conn = obtenerPdoConexionBD();

	// Se recoge el parámetro "id" de la request.
	$id = (int)$_REQUEST["id"];

	$sql = "DELETE FROM reservas WHERE Id_Reserva=?";
    $sentencia = $conn->prepare($sql);
    $sentencia->execute([$id]); 
    redireccionar('bookingsAdmin.php');
?>