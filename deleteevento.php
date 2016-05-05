<?php require_once 'templates/header.php';?>
	<div class="content">
     	<center><div class="container">
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
		  </div>
		  </nav>
		  
				 <?php 
	require 'database.php';
	$id = 0;
	
	if ( !empty($_GET['idevento'])) {
		$id = $_REQUEST['idevento'];
	}
	
	if ( !empty($_POST)) {
		// keep track post values
		$id = $_POST['idevento'];
		
		// delete data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM evento  WHERE idevento = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		Database::disconnect();
		header("Location: eventos.php");
		
	} 
?>
 			
	    			<form class="form-horizontal" action="deleteevento.php" method="post">
	    			  <input type="hidden" name="id" value="<?php echo $id;?>"/>
					  <p class="alert alert-error">Estas seguro de eliminar el Evento?</p>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-danger">Si</button>
						  <a class="btn" href="eventos.php">No</a>
						</div>
					</form>
				</div>
     		
     		
     		<?php require_once 'templates/sidebar.php';?>
     		
     	</div>
    </div> <!-- /container --></center>
<?php require_once 'templates/footer.php';?>