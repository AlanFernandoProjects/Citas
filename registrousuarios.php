<?php
	include('header.php');

	if (isset($_POST['agregar'])) 
	{
		echo "Entro al if agregar";
		$nombre=$_POST['nombre'];
		$appat=$_POST['appat'];
		$apmat=$_POST['apmat'];
		$password=$_POST['password'];
		$tipo=$_POST['tipodat'];

		$conexion = mysqli_connect("localhost","root","");
		mysqli_select_db($conexion,'NCSM');

		$sql = "INSERT INTO usuarios VALUES (null,'".$nombre."','".$appat."','".$apmat."','".$password."','".$tipo."')";

		if (mysqli_query($conexion,$sql)) 
		{
			header('Location: index.php');
		}
		else
		{
			echo '<div class="col-md-4 col-md-offset-4"><p class="bg-danger" style="padding: 10px; text-align:center; color: red;">Los datos que ingreso no son correctos o ya existe un usuario con dichos datos.</p></div>';
		}


	}
?>



<div class="container" style="margin: 5%;">
<div class="row justify-content-center align-items-center">
<div class="col-md-8">
	<h1 style="text-align: center;" class="display-4">Registro de usuarios</h1>
	<form class="form" action="registrousuarios.php" method="post" role="form">
		<div class="form-group">
			<label><b>Nombre</b></label><br>
			<input type="text" name="nombre" id="nombre" placeholder="Nombre del usuario" class="form-control"><br>
			<label><b>Apellido paterno</b></label><br>
			<input type="text" name="appat" id="appat" placeholder="Primer apellido" class="form-control"><br>
			<label><b>Apellido materno</b></label><br>
			<input type="text" id="apmat" name="apmat" placeholder="Segundo apellido" class="form-control"><br>
			<label><b>Contraseña</b></label><br>
			<input type="password" id="passwor" name="password" placeholder="Contraseña" class="form-control"><br>
			<label><b>Tipo de usuario</b></label>
			<select class="form-control" id="tipodat" name="tipodat">
				<option>Operador</option>
				<option>Administrador</option>
			</select>
		</div>
	</form>
	<br>
	<br>
	<div style="float: right;">
		<a style="margin-bottom: 20%;" type="submit" class="btn btn-outline-danger" href="index.php">Cancelar</a>
		<button style="margin-bottom: 20%;" type="submit" name="agregar" class="btn btn-outline-primary">Agregar</button>	
	</div>
</div>
</div>
</div>

<?php
	include('footer.php');
?>
