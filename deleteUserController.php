<?php
	require_once "sessionCheck.php";

	$conn = obtenerPdoConexionBD();

	// Se recoge el parámetro "id" de la request.
	$id = $_REQUEST["id"];

	$sql = "DELETE FROM usuarios WHERE Id_Usuario=?";
    $sentencia = $conn->prepare($sql);
    $sentencia->execute([$id]); 
    redireccionar('usersAdmin.php');
?>