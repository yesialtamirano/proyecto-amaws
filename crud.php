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
    			<h1><center>Empleados</center></h1>
    		</div>
			<div class="row"><br><br><br><br><br><br>
				
				
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th><center>Nombre</center></th>
		                  <th><center>Correo Electronico</center></th>
		                  <th><center>Teléfono</center></th>
		                  <th></th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM customers ORDER BY id ASC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['name'] . '</td>';
							   	echo '<td>'. $row['email'] . '</td>';
							   	echo '<td>'. $row['mobile'] . '</td>';
							   	echo '<td width=250>';
							   	echo '<a class="btn btn-success" href="read.php?id='.$row['id'].'">Consultar</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Actualizar</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Borrar</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
				<br><br><br><p>
					<a href="yesenia/create.php" class="btn btn-info">Insertar</a>
				</p>
    	</div>
    </div> <!-- /container -->
  </body>
</html>