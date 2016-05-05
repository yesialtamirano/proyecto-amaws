
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>

  
  
    <div class="container">
    		<div class="row">
    			<h1><center>Eventos</center></h1>
    		</div>
			
			<nav class="navbar navbar-default navbar-static-top" role="navigation">
  			<div class="navbar-header">
  					  <button type="button" class="navbar-toggle" data-toggle="collapse"  data-target=".navbar-ex1-collapse">
      				  <span class="sr-only">Desplegar navegación</span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
   					 </button>
					<a class="navbar-brand" href="create.php">Eventos Actuales</a>
					<a class="navbar-brand" href="create.php">Nuevo Evento</a>
					<a class="navbar-brand" href="create.php">Eliminar Eventos</a>
		  </div>
		  </nav>
		
	
				
				<br><br>
						
				
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th><center>Id_Evento</center></th>
		                  <th><center>Id_Ubicacion</center></th>
		                  <th><center>Id_Tipo</center></th>
						  <th><center>Place_ID</center></th>
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
							   	echo '<td>'. $row['Idevento'] . '</td>';
							   	echo '<td>'. $row['idUbicacion'] . '</td>';
							   	echo '<td>'. $row['idTipo'] . '</td>';
								echo '<td>'. $row['place_id'] . '</td>';
							   	echo '<td>'. $row['nombre'] . '</td>';
							   	echo '<td>'. $row['descripcion'] . '</td>';
							   	
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
				
    	</div>
    </div> <!-- /container -->
  </body>
</html>