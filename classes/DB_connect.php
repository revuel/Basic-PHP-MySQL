<?php  // db_connnect.php
class DB_Connect {
    
	// ATRIBUTOS
	private $con; // Variable de almacenamiento de la conexión
	
	// MÉTODOS
    // constructor
    function __construct() {
        // connecting to database
            $this->con = $this->connect();
    }
 
	// Conectar con base de datos (SET)
    private function connect() 
	{	
		// Importar variables de conexión
        require_once '../config/config.php'; // Para importar las variables de configuración
		try 
		{
			$conn = new PDO('mysql:host='.DB_SERVER .';dbname='.DB_DATABASE, DB_USER, DB_PASSWORD);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} 
		catch(PDOException $e) 
		{
            echo 'ERROR: ' . $e->getMessage(); // Informar sobre errores
        }
        return $conn; // Si todo ha ido bien establecer conexión
    }
    
	// Devolver conexión con base de datos (GET)
    public function getDbConnection(){
        return $this->con;
    }
}
?>