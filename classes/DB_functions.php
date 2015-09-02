<?php    // db_functions.php
class DB_Functions 
{
	// ATRIBUTOS
    private $con;
	
	// MÉTODOS
    // constructor
    function __construct() 
	{
        require_once __DIR__.'/DB_connect.php'; // Importando clase de conexión
        
		// conectando...
        $db = new DB_Connect();
        $this->con = $db->getDbConnection(); // Conectando con base de datos
    }
	
	// gestión de los alumnos
	public function listaralumno() // Consulta de todos los registros
	{
		try 
		{
            $consulta = $this->con->prepare('SELECT * FROM alumno');
            $consulta->execute(); // Ejecuta la consulta sin más
            $resultado = $consulta->fetchAll(); // Guarda todos los valores de retorno
			return $resultado; // Devolver array
			
        } 
		catch(PDOException $e) 
		{
            echo 'ERROR: ' . $e->getMessage(); // Posible error
        }
	}
	
	public function altaalumno($nom, $ape, $cor, $dni) // Insertar nuevo registro
	{
		try 
		{
            $consulta = $this->con->prepare('INSERT INTO alumno (nombre, apellidos, email, dni) 
			VALUES (:nombre, :apellidos, :email, :dni)');
            $params = array(':nombre' => $nom, ':apellidos' => $ape, 
			':email' => $cor, ':dni' => $dni, );
			$consulta->execute($params); // Ejecución
			
        } 
		catch(PDOException $e) 
		{
            echo 'ERROR: ' . $e->getMessage(); // Posible error
        }
	}
	
	public function bajaalumno($id) // Eliminación de registro
	{
		try
		{
			$sql = 'DELETE FROM alumno WHERE id_alumno = :id'; // Consulta
			$consulta = $this->con->prepare($sql); // Preparación
            $params = array(':id' => $id); // Array de parámetros de la consulta
            $consulta->execute($params); // Ejecución
		}
		catch(PDOException $e)
		{
			// Podríamos lanzar mensaje de excepción.
		}
	}
	
	public function actualizaalumno($id, $nom, $ape, $cor, $dni) // Actualizar registro
	{
		
		try 
		{
            $consulta = $this->con->prepare('UPDATE alumno SET nombre = :nom, apellidos = :ape,
			email = :cor, dni = :dni WHERE id_alumno = :id'); 
            $params = array(':nom' => $nom, ':ape' => $ape, ':cor' => $cor, ':dni' => $dni, ':id' => $id, );
			$consulta->execute($params); // Ejecución
        } 
		catch(PDOException $e) 
		{
            echo 'ERROR: ' . $e->getMessage(); // Posible error
        }
	}
}