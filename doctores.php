<?php
	include('header.php');
    $conexion = mysqli_connect('localhost','root','');
    mysqli_select_db($conexion,'ncsm');
    $sql = "SELECT id FROM doctores ORDER by ID DESC LIMIT 1";
    $resultado = mysqli_query($conexion,$sql);
    $tuplas = mysqli_fetch_assoc($resultado);
?>

<div class="container">
	<br>

	<div class="row">
		<div class="col-4">
			<a style="width: 90%;" href="agregardoctor.php" class="btn btn-outline-dark"><i class="fas fa-user-plus"></i>  Nuevo doctor</a>
		</div>
        <div class="col-8">
            <nav class="navbar navbar-light bg-light" style="float: right;">
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="text" placeholder="Buscar">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </nav>
        </div>
	</div>
    <div class="row">
        <div class="col-3 text-center">
            <hr>
            <label><b>Doctores registrados</b></label>
            <hr>
        </div>
    </div>

	<div class="row table-responsive-sm">
            <table id="citasregistradas" class="table col-12 text-center table-bordered table-striped ">
                <thead class="thead-light">
                    <tr>
                        <th>Nombre del Doctor</th>
                        <th>Especialidad</th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miercoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                        <th>Sabado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=1;
                        while($i <= $tuplas['id'])
                        {
                            $cmd = 'select * from doctores where id ='.$i.'';
                            $resul = mysqli_query($conexion,$cmd);
                            $datos=mysqli_fetch_assoc($resul);
                            if ($datos['nombre'] != "") 
                            {  
                                ?>                 
                                    <tr>
                                        <td class = "align-middle"><?php echo $datos['nombre'].' '.$datos['appat'].' '.$datos['apmat'];?></td>
                                        <td class ="align-middle"><?php echo $datos['especialidad'];?></td>
                                <?php
                                if($datos['lunini'] == '00:00:00' && $datos['lunfin'] == '00:00:00')
                                {
                                    ?>
                                    <td class = 'align-middle'>Sin horario</td>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <td class = "align-middle"><?php echo $datos['lunini'].'  '.$datos['lunfin'];?></td>
                                    <?php
                                }
                                if($datos['marini'] == '00:00:00' && $datos['marfin'] == '00:00:00')
                                {
                                    ?>
                                    <td class = 'align-middle'>Sin horario</td>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <td class = "align-middle"><?php echo $datos['marini'].'  '.$datos['marfin']; ?></td>
                                    <?php
                                }
                                if($datos['mieini'] == '00:00:00' && $datos['miefin'] == '00:00:00')
                                {
                                    ?>
                                    <td class = 'align-middle'>Sin horario</td>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <td class = "align-middle"><?php echo $datos['mieini'].'  '.$datos['miefin'];?> </td>
                                    <?php
                                }
                                if($datos['jueini'] == '00:00:00' && $datos['juefin'] == '00:00:00')
                                {
                                    ?>
                                    <td class = 'align-middle'>Sin horario</td>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <td class = "align-middle"><?php echo $datos['jueini'].'  '.$datos['juefin'];?> </td>
                                    <?php
                                }
                                if($datos['vieini'] == '00:00:00' && $datos['viefin'] == '00:00:00')
                                {
                                    ?>
                                    <td class = 'align-middle'>Sin horario</td>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <td class = "align-middle"><?php echo $datos['vieini'].'  '.$datos['viefin'];?> </td> 
                                    <?php
                                }
                                if($datos['sabini'] == '00:00:00' && $datos['sabfin'] == '00:00:00')
                                {
                                    ?>
                                    <td class = 'align-middle'>Sin horario</td>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <td class = "align-middle"><?php echo $datos['sabini'].'  '.$datos['sabfin'];?> </td>
                                    <?php
                                }
                                ?>
                                <td style="width: 20%" class = "align-middle">
                                <a class="btn btn-outline-info" href="menu.php?op=4&docid=<?php echo $datos['id']; ?>">
                                <i class="fas fa-sync-alt">
                                </i>
                                </a>
                                <a class="btn btn-outline-danger m-2" href="menu.php?op=6&docid=<?php echo $datos['id']; ?>">
                                <i class="fas fa-user-minus"></i>
                                </a>
                                    </td>
                                    </tr>
                                <?php
                            }
                            $i++;
                        }
                        ?>
                                     
                </tbody>
            </table>
        </div>


</div>












<?php
	include('footer.php');
?>