<?php

if(isset($_GET['op'])){
		switch ($_GET['op']){
			case 1:
				include_once('modificarcita.php');
				break;	
			case 2:
				include_once('modificarespecialidad.php');
				break;
			case 3:
				include_once('modificarcita.php');
				break;
			case 4:
				include_once('modificardoctor.php');
				break;
			case 5:
				include_once('eliminarcita.php');
				break;
			case 6:
				include_once('eliminardoctor.php');
				break;
			case 7:
				include_once('eliminarespecialidad.php');
				break;
			default:
				echo "<h1>Página no encontrada</h1>";
				break;
		}
  }else{
  }
  

  ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" 	data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="	 false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  		</button>
  		<a class="navbar-brand mr-4" href="index.php">Citas</a>
  		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    		<ul class="navbar-nav mr-auto mt-2 mt-md-0">
            <li  class="nav-item mr-4">
              <a class="nav-link" href="doctores.php">Doctores</a>
            </li>
            <li class="nav-item mr-4">
              <a href="especialidades.php" class="nav-link" >Especialidades</a>
            </li>
            <li class="nav-item mr-4">
              <a href="historialdecitas.php" class="nav-link">Historial de citas</a>
            </li> 
    		</ul>
  		</div>
	</nav>