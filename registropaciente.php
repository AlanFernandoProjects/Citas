<?php
	include('header.php');
?>

<div class="container" style="margin: 5%;">
<div class="row justify-content-center align-items-center">
<div class="col-md-8">
	<h1 style="text-align: center;" class="display-4">Registro de nuevo paciente</h1>
	<br>
	<form class="form" action="registrousuarios.php" method="post" role="form">
		<div class="form-group">
			<label><b>Nombre</b></label><br>
			<input type="text" name="nombre" id="nombre" placeholder="Nombre del paciente" class="form-control"><br>
			<div class="row">
				<div class="col-6">
					<label><b>Apellido paterno</b></label><br>
					<input type="text" name="appat" id="appat" placeholder="Primer apellido" class="form-control"><br>
				</div>
				<div class="col-6">
					<label><b>Apellido materno</b></label><br>
					<input type="text" id="apmat" name="apmat" placeholder="Segundo apellido" class="form-control"><br>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<label><b>Telefono</b></label>
					<input class="form-control" type="tel" id="telefonoPaciente" placeholder="Tel. del paciente">
				</div>
				<div class="col-6">
					<label><b>Correo electronico</b></label>
					<input class="form-control" type="email" id="emailPaciente" placeholder="E-mail del paciente">
				</div>
			</div>
			<br>
			<label><b>Observaciones</b></label>
				<textarea class="form-control" id="observaciones" placeholder="Observaciones para el paciente"></textarea>
			
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