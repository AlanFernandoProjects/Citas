<?php
	include('header.php');

	
	if(isset($_GET['docid'])){
        $id = $_GET['docid'];
        //Estableciendo la conexión con la BD
        $conexion = mysqli_connect('localhost','root','');
        if(!$conexion){
            die("Error conectando con el servidor.");
        }
        //Seleccionar la base de datos para hacer las consultas
        mysqli_select_db($conexion,'ncsm')
            or die("Error seleccionando la base de datos;");
        //Preparando la consulta SQL
        $sql="SELECT * FROM doctores WHERE id=".$id.";";
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
		$appat = $_POST['appat'];
		$apmat = $_POST['apmat'];
		$especialidad = $_POST['especialidad'];
		$lunini = $_POST['lunini']; $lunfin = $_POST['lunfin'];
		$marini = $_POST['marini']; $marfin = $_POST['marfin'];
		$mieini = $_POST['mieini']; $miefin = $_POST['miefin'];
		$jueini = $_POST['jueini']; $juefin = $_POST['juefin'];
		$vieini = $_POST['vieini']; $viefin = $_POST['viefin'];
		$sabini = $_POST['sabini']; $sabfin = $_POST['sabfin'];
		$sql = "  UPDATE doctores SET nombre='".$nombre."',appat='".$appat."',apmat='".$apmat."',especialidad='".$especialidad."',lunini='".$lunini."',lunfin='".$lunfin."',marini='".$marini."',marfin='".$marfin."',mieini='".$mieini."',miefin='".$miefin."',jueini='".$jueini."',juefin='".$juefin."',vieini='".$vieini."',viefin='".$viefin."',sabini='".$sabini."',sabfin='".$sabfin."' WHERE id='".$id."';";
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
			<form class="form" action="modificardoctor.php" method="post" role="form">
				<div class="form-group">
					<div class="row mt-5">
						<div class="col-4">
							<label><b>Nombre*</b></label><br>
							<input type="text" name="nombre" id="nombre" placeholder="Nombre del medico" class="form-control" value="<?php echo $datos['nombre']?>">
						</div>
						<div class="col-4">
							<label><b>Apellido paterno*</b></label><br>
							<input type="text" name="appat" id="appat" placeholder="Primer apellido" class="form-control" value="<?php echo $datos['appat']?>">
						</div>
						<div class="col-4">
							<label><b>Apellido materno*</b></label><br>
							<input type="text" id="apmat" name="apmat" placeholder="Segundo apellido" class="form-control" value="<?php echo $datos['apmat']?>">
						</div>
					</div>
					<br>
					<label><b>Especialidad</b></label>
					<select class="form-control" id="especialidad" name="especialidad">
						<option><?php echo $datos['especialidad']; ?></option>
						<?php
							$i=1;
							
								$cmd = 'select * from especialidades';
								$resul = mysqli_query($conexion,$cmd);
								$datos2= mysqli_fetch_assoc($resul);
								$numreg= mysqli_num_rows($resul);

								while($i <= $numreg)
							{
												
									echo '<option class="form-control">'.$datos2['nombre'].'</option>';
								
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
									<input type="time" id="iniciolunes" name="lunini" class="form-control" value="<?php echo $datos['lunini']?>">
								</div>
								<div class="col">
									<label>Fin</label>
									<input type="time" id="finlunes" name="lunfin" class="form-control" value="<?php echo $datos['lunfin']?>">
								</div>
							</div>
						</div>
						<hr>
						<div class="col">
						<label><b>Martes</b></label>
						<div class="row">
							<div class="col">
								<label>Inicio</label>
								<input type="time" id="iniciomartes" name="marini" class="form-control" value="<?php echo $datos['marini']?>">
							</div>
							<div class="col">
								<label>Fin</label>
								<input type="time" id="finmartes" name="marfin" class="form-control" value="<?php echo $datos['marfin']?>">
							</div>
						</div>
						</div>
						<hr>
						<div class="col">
							<label><b>Miercoles</b></label>
							<div class="row">
								<div class="col">
									<label>Inicio</label>
									<input type="time" id="iniciomiercoles" name="mieini" class="form-control" value="<?php echo $datos['mieini']?>">
								</div>
								<div class="col">
									<label>Fin</label>
									<input type="time" id="finmierocles" name="miefin" class="form-control" value="<?php echo $datos['miefin']?>">
								</div>
							</div>
						</div>
					</div>
					<div class="col-6">
						<div class="col">
							<label><b>Jueves</b></label>
							<div class="row">
								<div class="col"><label>Inicio</label>
									<input type="time" id="iniciojueves" name="jueini" class="form-control" value="<?php echo $datos['jueini']?>">
								</div>
								<div class="col"><label>Fin</label>
									<input type="time" id="finjueves" name="juefin" class="form-control" value="<?php echo $datos['juefin']?>">
								</div>
							</div>
						</div>
						<hr>
						<div class="col">
							<label><b>Viernes</b></label>
							<div class="row">
								<div class="col"><label>Inicio</label>
									<input type="time" id="inicioviernes" name="vieini" class="form-control" value="<?php echo $datos['vieini']?>">
								</div>
								<div class="col"><label>Fin</label>
									<input type="time" id="finviernes" name="viefin" class="form-control" value="<?php echo $datos['viefin']?>">
								</div>
							</div>
						</div>
						<hr>
						<div class="col">
						<label><b>Sabado</b></label>
							<div class="row">
								<div class="col"><label>Inicio</label>
									<input type="time" id="iniciosabado" name="sabini" class="form-control" value="<?php echo $datos['sabini']?>">
								</div>
								<div class="col"><label>Fin</label>
									<input type="time" id="finsabado" name="sabfin" class="form-control" value="<?php echo $datos['sabfin']?>">
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
				<input type="hidden" name="id" value="<?php echo $id; ?>">
			</form>
		</div>
	</div>
</div>

<?php
	include('footer.php');
?>