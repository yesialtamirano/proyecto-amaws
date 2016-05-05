<?php require_once 'templates/header.php';?>
	<div class="content">
     	<div class="container">
     		<div class="col-md-8 col-sm-8 col-xs-12">
			
				 <nav class="navbar navbar-default navbar-static-top" role="navigation">
  					<div class="navbar-header">
  					  <button type="button" class="navbar-toggle" data-toggle="collapse"  data-target=".navbar-ex1-collapse">
      				  <span class="sr-only"><h6>Desplegar navegación</span></h6>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
   					 </button>
					 <a class="navbar-brand" href="eventos.php">Actuales</a>
				     <a class="navbar-brand" href="createevento.php">Nuevo Evento</a>
					 <a class="navbar-brand" href="createevento.php">Tipos de Eventos</a>
		  </div>
		  </nav>
				 
				 <br><br>
						
				
				<table class="table table-hover">
		              <thead>
		                <tr>
		                  <th><center>Evento</center></th>
		                  <th><center>Ubicacion</center></th>
		                  <th><center>Riesgo</center></th>
						  <th><center>Place</center></th>
		                  <th><center>Nombre</center></th>
		                  <th><center>Descripcion</center></th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM evento ORDER BY idevento ASC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['idevento'] . '</td>';
							   	echo '<td>'. $row['idUbicacion'] . '</td>';
							   	echo '<td>'. $row['idTipo'] . '</td>';
								echo '<td>'. $row['place_id'] . '</td>';
							   	echo '<td>'. $row['nombre'] . '</td>';
							   	echo '<td>'. $row['descripcion'] . '</td>';
								echo '<td>';
							   	echo '<a class="btn btn-info" href="deleteevento.php?idevento='.$row['idevento'].'">Eliminar</a>';
							   	echo '&nbsp;';
								
								  	echo '</tr>';
								
							   	
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
	     	
     		
     		
     		<?php require_once 'templates/sidebar.php';?>
     		
     	</div>
    </div> <!-- /container -->
<?php require_once 'templates/footer.php';?>
