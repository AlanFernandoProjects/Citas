<?php
 include('header.php');

 
 if(isset($_GET['citaid'])){
    $id = $_GET['citaid'];
    //Estableciendo la conexión con la BD
    $conexion = mysqli_connect('localhost','root','');
    if(!$conexion){
        die("Error conectando con el servidor.");
    }
    //Seleccionar la base de datos para hacer las consultas
    mysqli_select_db($conexion,'ncsm')
        or die("Error seleccionando la base de datos;");
    //Preparando la consulta SQL
    $sql="SELECT * FROM citas WHERE id=".$id.";";
	$resultado = mysqli_query($conexion,$sql);
	$datos = mysqli_fetch_assoc($resultado);

	
}
if (isset($_POST['agregar'])) 
    {
		$conexion = mysqli_connect('localhost','root','');
		if(!$conexion){
			die("Error conectando con el servidor.");
		}
		//Seleccionar la base de datos para hacer las consultas
		mysqli_select_db($conexion,'ncsm')
			or die("Error seleccionando la base de datos;");

		$id = $_POST['id'];
    	$nombre = $_POST['nombre'];
    	$appt = $_POST['appat'];
    	$apmt = $_POST['apmat'];
    	$hora = $_POST['hora'];
    	$fecha = $_POST['fecha'];
    	$doctor = $_POST['doctor'];
    	$comentario = nl2br($_POST['comentario']);
    	$sql2 = " UPDATE citas SET hora='".$hora."',fecha='".$fecha."',nombre='".$nombre."',doctor='".$doctor."',comentario='".$comentario."',cobro=null,activa=1,appt='".$appt."',apmt='".$apmt."' WHERE id='".$id."';";
    	if ($nombre != "" && $appt != "" && $apmt != "" && $hora!="" && $fecha!="" && $doctor!="") 
    	{
    		if (mysqli_query($conexion,$sql2)) 
    		{
    			header('location: historialdecitas.php');
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
	<h1 style="text-align: center;" class="display-4">Modificar Cita Medica</h1>
	<form class="form" action="modificarcita.php" method="POST">
		<div class="form-group">
			<label><b>Nombre*</b></label><br>
			<input type="text" id="nombre" name="nombre" placeholder="Nombre del paciente" class="form-control" value="<?php echo $datos['nombre']; ?>"><br>
			<div class="row">
				<div class="col-md-6">
					<label><b>Apellido paterno*</b></label><br>
				<input type="text" name="appat" id="appat" placeholder="Primer apellido" class="form-control"  value="<?php echo $datos['appt'];?>"><br>
				</div>
				<div class="col-md-6">
					<label><b>Apellido materno*</b></label><br>
				<input type="text" name="apmat" id="apmat" placeholder="Segundo apellido" class="form-control"  value="<?php echo $datos['apmt'];?>"><br>
				</div>
			</div>
			<div class="row">
				<div class="col-md" style="float: left;">
					<label><b>Fecha*</b></label><br>
					<input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo $datos['fecha']?>">
				</div>
				<div class="col-md" style="float: right;">
					<label><b>Doctor*</b></label>
					<select id="doctor" class="form-control" name="doctor">
						<option><?php echo $datos['doctor'];?></option>
						<?php
							$i=1;
							
						
								$cmd = 'SELECT * FROM doctores';
								$resul = mysqli_query($conexion,$cmd);
								$datos2=mysqli_fetch_assoc($resul);
								$numeroreg=mysqli_num_rows($resul);
								while($i <= $numeroreg)
							{
								if ($datos2['nombre'] != "") 
								{
									?>

									<option class="form-control"><?php echo $datos2['nombre'].' '.$datos2['appat'].' '.$datos2['apmat'] ?></option>;
									
									<?php
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
			<textarea class="form-control" placeholder="Comentarios para el paciente" name="comentario"><?php echo htmlspecialchars_decode($datos['comentario']);?></textarea>
			
		</div>
		<div style="float: right;">
			<a style="margin-bottom: 5%;" type="submit" class="btn btn-outline-danger" href="index.php">Cancelar</a>
			<button style="margin-bottom: 5%;" type="submit" name="agregar" class="btn btn-outline-primary">Agregar</button>	
	</div>
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	</form>
</div>
</div>
</div>

<?php
	include('footer.php');
?>