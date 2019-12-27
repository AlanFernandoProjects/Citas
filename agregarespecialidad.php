<?php
	include('header.php');
	if (isset($_POST['agregar'])) 
	{
		$conexion= mysqli_connect('localhost','root','');
		mysqli_select_db($conexion,'ncsm');
		$nombre = $_POST['txtespecialidad'];
		$sql = " insert into especialidades (nombre) values ('".$nombre."')";
		if ($nombre != "") 
		{
	
			if(mysqli_query($conexion,$sql))
			{
				header('location: especialidades.php');
			}
			else
			{
				echo '<div class="alert alert-danger col-md-4 offset-md-4 mt-4 text-center" role="alert">Error,no se pudo agregar la especialidad</div>';
			}
		}
		else
		{
			echo '<div class="alert alert-info col-md-4 offset-md-4 mt-4 text-center" role="alert">Debe de especificar el nombre de la especialidad</div>';

		}
	}


?>
<div class="container justify-content-center align-items-center">
	
	<div class="row" >
		<div class="col-12">
			<h4 class="display-4" style="text-align: center;">Agregar especialidad medica</h4>
		</div>
		<br>
		<form action="agregarespecialidad.php" method="POST" class="col-12">
			<div class="form-group mt-5 col-8">
				<label><b>Nonbre</b></label>
				<input type="text" name="txtespecialidad" placeholder="Nombre de la especialidad" class="form-control">
			</div>
			<div class="col-8 justify-content-center align-items-center">
				<button style="float: right;" class="btn btn-outline-primary ml-3" name="agregar" type="submit">Agregar</button>
				<a style="float: right;" href="index.php" class="btn btn-outline-danger">Cancelar</a>
				
			</div>
		</form>
	</div>

</div>




<?php
	include('footer.php');
?>