<?php require_once 'templates/header.php';?>
	<div class="content">
     	<div class="container">
     		<div class="col-md-8 col-sm-8 col-xs-12">
			
			
				 <span style="font-family: Verdana,sans-serif;"><CENTER><B><H2>Nuevos Eventos</span></B></CENTER></H2>
				
				<?php 
	
	require 'database.php';
	

	if ( !empty($_POST)) {
		// keep track validation errors
		$IdeventoError = null;
		$nombreError = null;
		$descripcionError = null;
		$idUbicacionError = null;
		$idTipoError = null;
		$place_idError = null;
		
		$Idevento = $_POST['Idevento'];
		$idUbicacion = $_POST['idUbicacion'];
		$idTipo = $_POST['idTipo'];
		$place_id = $_POST['place_id'];
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
	
		// validate input
		$valid = true;
		if (empty($Idevento)) {
			$IdeventoError = '* Dato Requerido';
			$valid = true;
		}
		if (empty($nombre)) {
			$nombreError = '* Dato Requerido';
			$valid = false;
		}
		if (empty($descripcion)) {
			$descripcionError = '* Dato Requerido';
			$valid = false;
		}
		
		if (empty($idUbicacion)) {
			$idUbicacionError = '* Dato Requerido';
			$valid = true;
				}
		
		if (empty($idTipo)) {
			$idTipoError = '* Dato Requerido';
			$valid = false;
		}
		if (empty($place_id)) {
			$place_idError = '* Dato Requerido';
			$valid = false;
		}
		
		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO evento (Idevento,idUbicacion,idTipo,place_id,nombre,descripcion) values(?, ?, ?,?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($Idevento,$idUbicacion,$idTipo,$place_id,$nombre,$descripcion));
			Database::disconnect();
			header("Location: eventos.php");
		}
	}
?>

		    		</div><br><br><br>
<br>    	  		
	    			<form class="form-horizontal" action="createevento.php" method="post">
					  <div class="control-group <?php echo !empty($IdeventoError)?'error':'';?>">
					    <label class="control-label">ID_Evento</label>
						
					    <div class="controls">
					      	<input name="Idevento" type="text"  placeholder="" value="<?php echo !empty($Idevento)?$Idevento:'';?>">
					      	<?php if (!empty($IdeventoError)): ?>
					      		<span class="help-inline"><?php echo $IdeventoError;?></span>
					      	<?php endif; ?>
					    </div>						
					  </div>
					  
					
					  
					  <div class="control-group <?php echo !empty($idUbicacionError)?'error':'';?>">
					    <label class="control-label">Ubicacion</label>
					    <div class="controls">
					      	<input name="idUbicacion" type="text"  placeholder="" value="<?php echo !empty($idUbicacion)?$idUbicacion:'';?>">
					      	<?php if (!empty($idUbicacionError)): ?>
					      		<span class="help-inline"><?php echo $idUbicacionError;?></span>
					      	<?php endif;?> 
					    </div>						
					  </div>
					  
					  <div class="control-group <?php echo !empty($idTipoError)?'error':'';?>">
					    <label class="control-label">Tipo de Riesgo</label>
					    <div class="controls">					      	
							<input name="idTipo" type="text"  placeholder="" value="<?php echo !empty($idTipo)?$idTipo:'';?>">
					      	<?php if (!empty($idTipoError)): ?>
					      		<span class="help-inline"><?php echo $idTipoError;?></span>
					      	<?php endif;?>				    
					    </div>						
					  </div>
					  
					  <div class="control-group <?php echo !empty($place_idError)?'error':'';?>">
					    <label class="control-label">Place_Id</label>
					    <div class="controls">
					      <input name="place_id" type="text"  placeholder="" value="<?php echo !empty($place_id)?$place_id:'';?>">
					      	<?php if (!empty($place_idError)): ?>
					      		<span class="help-inline"><?php echo $place_idError;?></span>
					      	<?php endif;?>
					    </div>						
					  </div>
					  
					    <div class="control-group <?php echo !empty($nombreError)?'error':'';?>">
					    <label class="control-label">Nombre</label>
					    <div class="controls">
					      	<input name="nombre" type="text"  placeholder="" value="<?php echo !empty($nombre)?$nombre:'';?>">
					      	<?php if (!empty($nombreError)): ?>
					      		<span class="help-inline"><?php echo $nombreError;?></span>
					      	<?php endif;?>
					    </div>						
					  </div>
					  
					  <div class="control-group <?php echo !empty($descripcionError)?'error':'';?>">
					    <label class="control-label">Descripcion</label>
					    <div class="controls">
					      	<input name="descripcion" type="text"  placeholder="" value="<?php echo !empty($descripcion)?$descripcion:'';?>">
					      	<?php if (!empty($descripcionError)): ?>
					      		<span class="help-inline"><?php echo $descripcionError;?></span>
					      	<?php endif;?>
					    </div>						
					  </div>
					 <br><br>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Crear Evento</button>						   
						  <a class="btn" href="eventos.php">Cancelar</a>
						</div>
					</form>
				</div>
				
		
     		
     		
     		<?php require_once 'templates/sidebar.php';?>
     		
     	</div>
    </div> <!-- /container </center>-->
<?php require_once 'templates/footer.php';?>