<?php
    include('header.php');
    $conexion = mysqli_connect('localhost','root','');
    mysqli_select_db($conexion,'ncsm');
    $sql = "SELECT id FROM citas ORDER by ID DESC LIMIT 1";
    $resultado = mysqli_query($conexion,$sql);
    $tuplas = mysqli_fetch_assoc($resultado);
    $fecha_actual = date("Y-m-d");
?>
    <div class="container">
    	<br>
    	<div class="row">
    		<div class="col-4">
    			<a style="width: 90%;" href="generarcita.php" class="btn btn-outline-dark"><i class="far fa-calendar-plus"></i>  Generar nueva cita</a>
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
            <label><b>Citas de hoy</b></label>
            <hr>
        </div>
    </div>

      <div class="row table-responsive-sm">
        <table id="citasdehoy" class="table col-12 text-center">
            <thead class="thead-light">
                <tr>
                    <th>Horario</th>
                    <th>Apellido Paterno Paciente</th>
                    <th>Apellidos Materno Paciente</th>
                    <th>Nombre Paciente</th>
                    <th>Doctor</th>
                    <th>Comentario</th>
                    <th>Cobro</th>
                    <th style="width: 20%">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i=1;
                    while($i <= $tuplas['id'])
                    {
                        $cmd = 'select * from citas where id ='.$i.'';
                        $resul = mysqli_query($conexion,$cmd);
                        $datos=mysqli_fetch_assoc($resul);
                        if ($datos['fecha'] == $fecha_actual) 
                        { 
                            ?>                 
                             
                            <tr>
                                <td class = "align-middle"><?php echo $datos['hora']; ?></td>
                                <td class = "align-middle"><?php echo $datos['appt'] ?></td>
                                <td class = "align-middle"><?php echo $datos['apmt'] ?></td>
                                <td class = "align-middle"><?php echo $datos['nombre'] ?></td>
                                <td class = "align-middle"><?php echo $datos['doctor'] ?></td>
                                <td class = "align-middle"><?php echo $datos['comentario'] ?></td>
                                <td class = "align-middle"><?php echo $datos['cobro'] ?></td>
                                <td class = "align-middle">
                                <a class="btn btn-outline-success" href="cobrarCita.php?&citaid=<?php echo $datos['id']; ?>">
                                <i class="far fa-check-circle"></i>
                                </a>
                                <a class=" ml-2 btn btn-outline-info" href="menu.php?op=3&citaid=<?php echo $datos['id']; ?>">
                                <i class="fas fa-sync-alt"></i>
                                </a>
                                <a class="btn btn-outline-danger m-2" href="eliminarCita.php?&citaid=<?php echo $datos['id']; ?>">
                                <i class="fas fa-user-minus"></i></a>
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