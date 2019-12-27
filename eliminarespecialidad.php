<?php 
    
	if(isset($_GET['espid'])) {
		$id = $_GET['espid'];
		//Estableciendo la conexión con la BD
		$conexion = mysqli_connect('localhost','root','');
		if(!$conexion){
			die("Error conectando con el servidor.");
		}
		//Seleccionar la base de datos para hacer las consultas
		mysqli_select_db($conexion,'ncsm')
			or die("Error seleccionando la base de datos;");
		//Preparando la consulta SQL
		$sql="DELETE FROM especialidades WHERE id=".$id.";";
		//Ejecutamos la sentencia sql en el servidor de BD
		$result = mysqli_query($conexion, $sql);
		header('Location: especialidades.php');
	}
?>