<?php
	include('header.php');

	$conexion = mysqli_connect('localhost','root','');
	if (!$conexion) 
	{
		die("Error al conectar");
	}
	mysqli_select_db($conexion,'NCSM');
	$sql = "SELECT id FROM especialidades ORDER by ID DESC LIMIT 1";
	$resultado = mysqli_query($conexion,$sql);
	$tuplas = mysqli_fetch_assoc($resultado);
	if (isset($_POST['agregar'])) 
	{
		$nombre = $_POST['nombre'];
		$appat = $_POST['appat'];
		$apmat = $_POST['apmat'];
		$especialidad = $_POST['especialidad'];
		$lunini = $_POST['lunini']; $lunfin = $_POST['lunfin'];
		$marini = $_POST['marini']; $marfin = $_POST['marfin'];
		$mieini = $_POST['mieini']; $miefin = $_POST['miefin'];
		$jueini = $_POST['jueini']; $juefin = $_POST['juefin'];
		$vieini = $_POST['vieini']; $viefin = $_POST['viefin'];
		$sabini = $_POST['sabini']; $sabfin = $_POST['sabfin'];
		$sql = "  INSERT INTO doctores VALUES (null, '".$nombre."','".$appat."','".$apmat."','".$especialidad."','".$lunini."','".$lunfin."','".$marini."','".$marfin."','".$mieini."','".$miefin."','".$jueini."','".$juefin."','".$vieini."','".$viefin."','".$sabini."','".$sabfin."')  ";
		if ($nombre != "" && $appat != "" && $apmat != "") 
		{
			if (mysqli_query($conexion,$sql)) 
			{
				header('location: doctores.php');
			}
			else
			{
				echo '<div class="alert alert-danger col-md-4 offset-md-4 mt-4 text-center" role="alert">Error en la conexion</div>';
			}	
		}
		else
		{
			echo '<div class="alert alert-info col-md-4 offset-md-4 mt-4 text-center" role="alert">Debe de llenar todos los campos requeridos</div>';
		}
	}

?>

<div class="container" style="margin: 5%;">
	<div class="row justify-content-center align-items-center">
		<div class="col-md-9">
			<h1 style="text-align: center;" class="display-4">Registro de Medico</h1>
			<form class="form" action="agregardoctor.php" method="post" role="form">
				<div class="form-group">
					<div class="row mt-5">
						<div class="col-4">
							<label><b>Nombre*</b></label><br>
							<input type="text" name="nombre" id="nombre" placeholder="Nombre del medico" class="form-control">
						</div>
						<div class="col-4">
							<label><b>Apellido paterno*</b></label><br>
							<input type="text" name="appat" id="appat" placeholder="Primer apellido" class="form-control">
						</div>
						<div class="col-4">
							<label><b>Apellido materno*</b></label><br>
							<input type="text" id="apmat" name="apmat" placeholder="Segundo apellido" class="form-control">
						</div>
					</div>
					<br>
					<label><b>Especialidad</b></label>
					<select class="form-control" id="especialidad" name="especialidad">
						<option disabled hidden selected>Selecciona una especialidad</option>
						<?php
							$i=1;
							while($i <= $tuplas['id'])
							{
								$cmd = 'select nombre from especialidades where id ='.$i.'';
								$resul = mysqli_query($conexion,$cmd);
								$datos=mysqli_fetch_assoc($resul);
								if ($datos['nombre'] != "") 
								{					
									echo '<option class="form-control">'.$datos['nombre'].'</option>';
								}
								$i++;
							}
						?>	
					</select>
				</div>
				<br>
				<hr>
				<div class="row">
					<div class="col-6">
						<div class="col">
							<label><b>Lunes</b></label>
							<div class="row">
								<div class="col">
									<label>Inicio</label>
									<input type="time" id="iniciolunes" name="lunini" class="form-control">
								</div>
								<div class="col">
									<label>Fin</label>
									<input type="time" id="finlunes" name="lunfin" class="form-control">
								</div>
							</div>
						</div>
						<hr>
						<div class="col">
						<label><b>Martes</b></label>
						<div class="row">
							<div class="col">
								<label>Inicio</label>
								<input type="time" id="iniciomartes" name="marini" class="form-control">
							</div>
							<div class="col">
								<label>Fin</label>
								<input type="time" id="finmartes" name="marfin" class="form-control">
							</div>
						</div>
						</div>
						<hr>
						<div class="col">
							<label><b>Miercoles</b></label>
							<div class="row">
								<div class="col">
									<label>Inicio</label>
									<input type="time" id="iniciomiercoles" name="mieini" class="form-control">
								</div>
								<div class="col">
									<label>Fin</label>
									<input type="time" id="finmierocles" name="miefin" class="form-control">
								</div>
							</div>
						</div>
					</div>
					<div class="col-6">
						<div class="col">
							<label><b>Jueves</b></label>
							<div class="row">
								<div class="col"><label>Inicio</label>
									<input type="time" id="iniciojueves" name="jueini" class="form-control">
								</div>
								<div class="col"><label>Fin</label>
									<input type="time" id="finjueves" name="juefin" class="form-control">
								</div>
							</div>
						</div>
						<hr>
						<div class="col">
							<label><b>Viernes</b></label>
							<div class="row">
								<div class="col"><label>Inicio</label>
									<input type="time" id="inicioviernes" name="vieini" class="form-control">
								</div>
								<div class="col"><label>Fin</label>
									<input type="time" id="finviernes" name="viefin" class="form-control">
								</div>
							</div>
						</div>
						<hr>
						<div class="col">
						<label><b>Sabado</b></label>
							<div class="row">
								<div class="col"><label>Inicio</label>
									<input type="time" id="iniciosabado" name="sabini" class="form-control">
								</div>
								<div class="col"><label>Fin</label>
									<input type="time" id="finsabado" name="sabfin" class="form-control">
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div style="float: right;">
					<a style="margin-bottom: 20%;" type="submit" class="btn btn-outline-danger" href="index.php">Cancelar</a>
					<button style="margin-bottom: 20%;" type="submit" name="agregar" class="btn btn-outline-primary">Agregar</button>	
				</div>
			</form>
		</div>
	</div>
</div>

<?php
	include('footer.php');
?>