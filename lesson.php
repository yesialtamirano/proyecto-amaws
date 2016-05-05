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
					 <a class="navbar-brand" href="lesson.php">Lista de Usuarios</a>
				     <a class="navbar-brand" href="createusuarios.php">Nuevo Usuario</a>
					  <a class="navbar-brand" href="#">Tipo de Usuario</a>
		  </div>
		  </nav>
				
					
				<table class="table table-hover">
		              <thead>
		                <tr>
		                  <th><center>Id_Usuario</center></th>
		                  <th><center>Usuario</center></th>
		                  <th><center>Password</center></th>
						  <th><center>Nombre</center></th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM usuario ORDER BY idusuario ASC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['idusuario'] . '</td>';
							   	echo '<td>'. $row['usuario'] . '</td>';
							   	echo '<td>'. $row['password'] . '</td>';
								echo '<td>'. $row['nombre'] . '</td>';
								echo '<td>';
							   	echo '<a class="btn btn-info" href="deleteusuario.php?idusuario='.$row['idusuario'].'">Eliminar</a>';
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

