<?php
		
	require_once '../classes/DB_functions.php';
	
	// Variables que nos llegan del formulario
	$nombre = $_POST['nom'];
	$apellidos = $_POST['ape'];
	$email = $_POST['eml'];
	$dni = $_POST['dni'];
	
	try
	{
		$db = new DB_Functions(); // Instanciando objeto...
		$result = $db->altaalumno($nombre, $apellidos, $email, $dni);
	}
	catch(PDOException $e)
	{
		// posible captura de mensaje
	}
    
	header("Location: http://localhost/dojocomplete/web/gestionalumno.php");
	die(); // CERRAR CONEXIÓN !!! 
?>