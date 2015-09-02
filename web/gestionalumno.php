<?php 
	require_once '../classes/DB_functions.php';
	
	try
	{
		$db = new DB_Functions();
		$lista = $db->listaralumno(); // lista de alumnos
		
		//$tipo = $db->tipoUsuario($email); // Tipo de usuario por email
		//$id = $db->idUsuario($email); // Id de usuario por email
	}
	catch(PDOException $e)
	{
		// posible captura de mensaje
	}
?>

<!DOCTYPE html>
<html>
	<head>
	
		<!-- METADATOS -->
		<title> Gestión de Alumnos </title> <!-- Cambiar al nombre del usuario -->
		<meta charset="UTF-8">
		
		<!-- CSS -->
		
	</head>
	
	<body>
		<div> <!-- wrapper -->
			<header>
				<?php include '../includes/cabecera.php'; ?>
			</header>
			
			<main>
				<div>
					<h3>Lista de alumnos</h3>
					<table>
						<thead>
							<td>ID</td>
							<td>Nombre</td>
							<td>Apellidos</td>
							<td>Email</td>
							<td>DNI</td>
						</thead>
						<tbody>
							<?php foreach($lista as $i):?>
								<tr>
									<td><?=($i[0])?></td>
									<td><?=($i[1])?></td>
									<td><?=($i[2])?></td>
									<td><?=($i[3])?></td>
									<td><?=($i[4])?></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
					<hr>
				</div>
				
				<div>
					<h3>Dar de alta un alumno</h3>
					<form action = "../action/crearalumno.php" method = "post">
						<input type = "text" name = "nom" value = "nombre"></input>
						<input type = "text" name = "ape" value = "apellidos"></input>
						<input type = "email" name = "eml" value = "email"></input>
						<input type = "text" name = "dni" value = "dni"></input>
						<input type = "submit" value = "ok"></input>
					</form>
					<hr>
				</div>
				
				<div>
					<h3>Dar de baja un alumno</h3>
					<form action = "../action/borraralumno.php" method = "post">
						<select name = "op">
							<?php foreach($lista as $j):?>
								<option value ="<?=($j[0])?>">
									<?=($j[1])?> <?=($j[2])?>
								</option>
							<?php endforeach ?>
						</select>
						<input type = "submit" value = "ok"></input>
					</form>
					<hr>
				</div>
				
				<div>
					<h3>Actualizar datos de un alumno</h3>
					<form action = "../action/actualizaralumno.php" method = "post">
						<select name = "op">
							<?php foreach($lista as $k):?>
								<option value ="<?=($k[0])?>">
									<?=($k[0])?>
								</option>
							<?php endforeach ?>
						</select>
						<input type = "text" name = "nom" value = "editar nombre"></input>
						<input type = "text" name = "ape" value = "editar apellidos"></input>
						<input type = "email" name = "eml" value = "editar email"></input>
						<input type = "text" name = "dni" value = "editar dni"></input>
						<input type = "submit" value = "ok"></input>
					</form>
					<hr>
				</div>
				
				<a href = "../index.php">Página principal</a>
			</main>
			
			<footer>
				<?php include '../includes/pie.php'; ?>
			</footer>
		</div>
	</body>
</html>
