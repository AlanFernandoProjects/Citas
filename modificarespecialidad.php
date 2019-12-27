<?php
    include('header.php');
    if (isset($_POST['actualizar'])) 
	{
		$conexion= mysqli_connect('localhost','root','');
		mysqli_select_db($conexion,'ncsm');
        $nombre = $_POST['nombre'];
        $id = $_POST['id'];
		$sql = "UPDATE especialidades SET nombre='".$nombre."' WHERE id='".$id."';";
		
			if(mysqli_query($conexion,$sql))
			{
				header('location: especialidades.php');
			}
			else
			{
				echo '<div class="alert alert-danger col-md-4 offset-md-4 mt-4 text-center" role="alert">Error,no se pudo modificar la especialidad</div>';
			}
	}
	
	
	if(isset($_GET['especialidadid'])){
        $id = $_GET['especialidadid'];
        //Estableciendo la conexión con la BD
        $conexion = mysqli_connect('localhost','root','');
        if(!$conexion){
            die("Error conectando con el servidor.");
        }
        //Seleccionar la base de datos para hacer las consultas
        mysqli_select_db($conexion,'ncsm')
            or die("Error seleccionando la base de datos;");
        //Preparando la consulta SQL
        $sql="SELECT * FROM especialidades WHERE id=".$id.";";
        $resultado = mysqli_query($conexion,$sql);
        $datos = mysqli_fetch_assoc($resultado);
    }

?>
<div class="container justify-content-center align-items-center">
	
	<div class="row" >
		<div class="col-12">
			<h4 class="display-4" style="text-align: center;">Modificar especialidad medica</h4>
		</div>
		<br>
		<form action="modificarespecialidad.php" method="POST" class="col-12">
			<div class="form-group mt-5 col-8">
				<label><b>Nonbre</b></label>
				<input type="text" name="nombre" placeholder="Nombre de la especialidad" class="form-control" value="<?php echo $datos['nombre'];?>">
			</div>
			<div class="col-8 justify-content-center align-items-center">
				<button style="float: right;" class="btn btn-outline-primary ml-3" name="actualizar" type="submit">Agregar</button>
				<a style="float: right;" href="index.php" class="btn btn-outline-danger">Cancelar</a>
				
			</div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
		</form>
	</div>

</div>




<?php
	include('footer.php');
?>