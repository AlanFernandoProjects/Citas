<?php
	include('header.php');
	$conexion = mysqli_connect('localhost','root','');
	mysqli_select_db($conexion,'ncsm');
	$sql = "SELECT id FROM especialidades ORDER by ID DESC LIMIT 1";
	$resultado = mysqli_query($conexion,$sql);
	$tuplas = mysqli_fetch_assoc($resultado);
?>
	
<div class="container mt-4 ">

	<div class="row">
		<div class="col">
			<a href="agregarespecialidad.php" class="btn btn-outline-dark">Nueva especialidad</a>
		</div>
	</div>

	<div class="row">
		<div class="col-3 text-center">
			<hr>
			<label><b>Especialidades registradas</b></label>
			<hr>
		</div>
	</div>
	
	<div class="row justify-content-center align-items-center" >
		<form action="especialidades.php" method="post" class="col-md-10 offset-md-3">
		<table class="table col-7 text-center" >
			<thead class="thead-light">
				<tr>
					<th>Especialidad</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i=1;
				while($i <= $tuplas['id'])
				{
					$cmd = 'select * from especialidades where id ='.$i.'';
					$resul = mysqli_query($conexion,$cmd);
					$datos=mysqli_fetch_assoc($resul);
					if ($datos['nombre'] != "") 
					{	
						?>				
						 
						<tr>
							<td class = "align-middle"><?php echo $datos['nombre'];?></td>
							<td class = "align-middle">
							<a class="btn btn-outline-info" href="menu.php?op=2&especialidadid=<?php echo $datos['id']; ?>">
							<i class="fas fa-sync-alt"></i>
							</a>
							<a class="btn btn-outline-danger m-2"  href="menu.php?op=7&espid=<?php echo $datos['id']; ?>">
							<i class="fas fa-user-minus"></i>
							</a></td>
						</tr>
						<?php 
					}
					$i++;
				}
				
				?>
			</tbody>
		</table>
		
		</form>
	</div>
</div>







<?php
	include('footer.php');
?>