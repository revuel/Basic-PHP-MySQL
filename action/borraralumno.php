<?php
		
	require_once '../classes/DB_functions.php';
	
	// Variables que nos llegan del formulario
	$id = $_POST['op'];
	
	try
	{
		$db = new DB_Functions(); // Instanciando objeto...
		$result = $db->bajaalumno($id);
	}
	catch(PDOException $e)
	{
		// posible captura de mensaje
	}
    
	header("Location: http://localhost/dojocomplete/web/gestionalumno.php");
	die(); // CERRAR CONEXIÓN !!! 
?>