<?php require_once 'templates/header.php';?>
	<div class="content">
     	<div class="container">
     		<div class="col-md-8 col-sm-8 col-xs-12">
			
				<span style="font-family: Verdana,sans-serif;"><CENTER><B><H2>USUARIOS</span></B></CENTER></H2>
				 
				 				<?php 
	
	require 'database.php';
	

	if ( !empty($_POST)) {
		// keep track validation errors
		$idusuarioError = null;
		$usuarioError = null;
		$passwordError = null;
		$nombreError = null;
		
		$idusuario = $_POST['idusuario'];
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];
		$nombre = $_POST['nombre'];
	
		// validate input
		$valid = true;
		if (empty($idusuario)) {
			$idusuarioError = '* Dato Requerido';
			$valid = true;
		}
		if (empty($usuario)) {
			$usuarioError = '* Dato Requerido';
			$valid = false;
		}
		if (empty($password)) {
			$passwordError = '* Dato Requerido';
			$valid = false;
		}
		
		if (empty($nombre)) {
			$nombreError = '* Dato Requerido';
			$valid = true;
				}
	
		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO usuario (idusuario,usuario,password,nombre) values(?, ?, ?,?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($idusuario,$usuario,$password,$nombre));
			Database::disconnect();
			header("Location: lesson.php");
		}
	}
?>

		    		</div><br><br><br>
<br>    	  		
	    			<form class="form-horizontal" action="createusuarios.php" method="post">
					  <div class="control-group <?php echo !empty($idusuarioError)?'error':'';?>">
					    <label class="control-label">Id_Usuario</label>
						
					    <div class="controls">
					      	<input name="Idevento" type="text"  placeholder="" value="<?php echo !empty($idusuario)?$idusuario:'';?>">
					      	<?php if (!empty($idusuarioError)): ?>
					      		<span class="help-inline"><?php echo $idusuarioError;?></span>
					      	<?php endif; ?>
					    </div>						
					  </div>
					  
					 <div class="control-group <?php echo !empty($usuarioError)?'error':'';?>">
					    <label class="control-label">Usuario</label>
					    <div class="controls">
					      	<input name="idUbicacion" type="text"  placeholder="" value="<?php echo !empty($usuario)?$usuario:'';?>">
					      	<?php if (!empty($usuarioError)): ?>
					      		<span class="help-inline"><?php echo $usuarioError;?></span>
					      	<?php endif;?> 
					    </div>						
					  </div>
					
					
					  
					  <div class="control-group <?php echo !empty($passwordError)?'error':'';?>">
					    <label class="control-label">Password</label>
					    <div class="controls">
					      	<input name="idUbicacion" type="text"  placeholder="" value="<?php echo !empty($password)?$password:'';?>">
					      	<?php if (!empty($passwordError)): ?>
					      		<span class="help-inline"><?php echo $passwordError;?></span>
					      	<?php endif;?> 
					    </div>						
					  </div>
					  
					  <div class="control-group <?php echo !empty($nombreError)?'error':'';?>">
					    <label class="control-label">Nombre</label>
					    <div class="controls">					      	
							<input name="idTipo" type="text"  placeholder="" value="<?php echo !empty($nombre)?$nombre:'';?>">
					      	<?php if (!empty($nombreError)): ?>
					      		<span class="help-inline"><?php echo $nombreError;?></span>
					      	<?php endif;?>				    
					    </div>						
					  </div>
					  
					 
					 <br><br>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Crear Evento</button>						   
						  <a class="btn" href="lesson.php">Cancelar</a>
						</div>
					</form>
				</div>
				
		
     		
     		
     		<?php require_once 'templates/sidebar.php';?>
			
     	</div>
    </div> <!-- /container -->
<?php require_once 'templates/footer.php';?>