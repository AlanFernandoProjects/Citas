<?php
	include('header.php');
	$conexion = mysqli_connect('localhost','root','');
    mysqli_select_db($conexion,'ncsm');
    $sql = "SELECT id FROM doctores ORDER by ID DESC LIMIT 1";
    $resultado = mysqli_query($conexion,$sql);
    $tuplas = mysqli_fetch_assoc($resultado);
    if (isset($_POST['agregar'])) 
    {
    	$nombre = $_POST['nombre'];
    	$appt = $_POST['appt'];
    	$apmt = $_POST['apmt'];
    	$hora = $_POST['hora'];
    	$fecha = $_POST['fecha'];
    	$doctor = $_POST['doctor'];
    	$comentario = nl2br($_POST['comentario']);
    	$sql2 = " INSERT INTO citas values (NULL,'".$hora."','".$fecha."','".$nombre."','".$doctor."','".$comentario."',null,1,'".$appt."','".$apmt."')";
    	if ($nombre != "" && $appt != "" && $apmt != "" && $hora!="" && $fecha!="" && $doctor!="") 
    	{
    		if (mysqli_query($conexion,$sql2)) 
    		{
    			header('location: index.php');
    		}
    		else
    		{
    			echo '<div class="alert alert-danger col-md-4 offset-md-4 mt-4 text-center" role="alert">Error en la conexion</div>';
    		}
    	}
    	else
    	{
    		echo '<div class="alert alert-info col-md-4 offset-md-4 mt-4 text-center" role="alert">Debe llenar todos los campos</div>';
    	}

    }
?>

<div class="container justify-content-center align-items-center" style="margin: 5%;">
<div class="row justify-content-center align-items-center">
<div class="col-md-8">
	<h1 style="text-align: center;" class="display-4">Generar Cita Medica</h1>
	<form class="form" action="generarcita.php" method="POST">
		<div class="form-group">
			<label><b>Nombre*</b></label><br>
			<input type="text" id="nombre" name="nombre" placeholder="Nombre del paciente" class="form-control"><br>
			<div class="row">
				<div class="col-md-6">
					<label><b>Apellido paterno*</b></label><br>
				<input type="text" name="appt" id="appt" placeholder="Primer apellido" class="form-control"> <br>
				</div>
				<div class="col-md-6">
					<label><b>Apellido materno*</b></label><br>
				<input type="text" name="apmt" id="apmt" placeholder="Segundo apellido" class="form-control"><br>
				</div>
			</div>
			<div class="row">
				<div class="col-md" style="float: left;">
					<label><b>Fecha*</b></label><br>
					<input type="date" name="fecha" id="fecha" class="form-control" value="timestamp">
				</div>
				<div class="col-md" style="float: right;">
					<label><b>Doctor*</b></label>
					<select id="doctor" class="form-control" name="doctor">
						<option disabled selected hidden>Selecciona un doctor</option>
						<?php
							$i=1;
							while($i <= $tuplas['id'])
							{
								$cmd = 'select * from doctores where id ='.$i.'';
								$resul = mysqli_query($conexion,$cmd);
								$datos=mysqli_fetch_assoc($resul);
								if ($datos['nombre'] != "") 
								{					
									echo '<option class="form-control">'.$datos['nombre'].' '.$datos['appat'].' '.$datos['apmat'].'</option>';
								}
								$i++;
							}
						?>
					</select>
				</div>
			</div>
			<br>
			<label><b>Horas disponibles*</b></label><br>
			<select class="form-control" id="horaselect" name="hora">
				<option>7:00</option>
				<option>14:00</option>
			</select>
			<br>
			<label><b>Comentarios</b></label>
			<textarea class="form-control" placeholder="Comentarios para el paciente" name="comentario"></textarea>
			
		</div>
		<div style="float: right;">
			<a style="margin-bottom: 5%;" type="submit" class="btn btn-outline-danger" href="index.php">Cancelar</a>
			<button style="margin-bottom: 5%;" type="submit" name="agregar" class="btn btn-outline-primary">Agregar</button>	
	</div>
	</form>
</div>
</div>
</div>

<?php
	include('footer.php');
?>