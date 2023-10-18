<?php


		  if(empty($_SESSION)){
		  session_start();
		  }

	  	  if(isset($_SESSION['permisos'])){
			 $nivel1 = $_SESSION['permisos'];
		
		  }
		  else{
			  $nivel1 = "";
		  }
	    ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<?php  require_once('comunes/header.php');?>
    <?php require_once('comunes/menu.php'); ?>
</head>
<body>
 
	

	<!-- MAIN -->
	<main>
			<div class="head-title pt-3 mx-auto" style="width: 200px;">
				<div class="left">
					<h1 >Usuarios </h1>
				</div>
			</div>




			<!--TABLA -->	  
		   <!------main-content-start-----------> 
		     
           <div class="main-content">
			     <div class="row">
				    <div class="col-md-12">
					   <div class="table-wrapper">
					     
					   <div class="table-title  mb-3">
					     <div class="row">
						     <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
							    <h2 class="ml-lg-2">Tabla de registros</h2>
							 </div>
							 <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
							 <?PHP if (in_array("registrar usuario", $nivel1)) {?>  
							 <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
							   <i class="material-icons">&#xE147;</i>
							   <span>Registrar</span>
							   </a>
							   <?php } ?>
							  
							 </div>
					     </div>
					   </div>
					   
					   <table id="tablas" style="width:100%" class="table table-striped ">
					      <thead>
						     <tr>
							
							 <th>Id </th>
							 <th>Rol</th>
							 <th>Usuario</th>							 	
							 <th>correo</th>
							 <th>Accion</th>

							 </tr>
						  </thead>
						  <?PHP if (in_array("consultar usuario", $nivel1)) {?>  
						  <tbody id="tabla">
						      
						  <?php
    				if(!empty($consuta)){
        				echo $consuta;
   					}
	       		 ?>
							 
							 
						  </tbody>
						  <?php } ?>
						  
					      
					   </table>
					   
			
					   
					   
					   
	
					   
					   
					   
					   
					   </div>
					</div>
			<!--FINAL DE LA TABLA -->
					

<form id="f4" style="display: none;">

<input type="text" name="consulta" id="consulta">
</form>



			<!----MODAL REGISTRO--------->
                                       <div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
		<form id="f">
        <h5 class="modal-title">Agregar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
		
		    <label>Nombre de usuario</label>
			<br>
			<span id="snombre"></span>
			<input type="text" class="form-control" style="display: none;"  name="accion" value="accion" required>
			<input type="text" class="form-control" name="nombre" id="nombre" required>
		</div>
		<div class="form-group">
		    <label>Correo</label>
			<br>
			<span id="scorreo"></span>
			<input type="text" class="form-control" name="correo" id="correo" required>
		</div>
		<div class="form-group">
		    <label>Rol</label>
			<br>
			<span id="srol"></span>
			<select name="rol" id="rol" class="form-control" >

			<?php
    if(!empty($rol) ){

        echo $rol;
    }
?>
			</select>
		</div>
		<div class="form-group">
		    <label>Contraceña</label>
			<br>
			<span id="scontraceña"></span>
			<input type="password" class="form-control" name="contraceña" id="contraceña" required>
		</div>
		<div class="form-group">
		    <label>Confirmar contraceña</label>
			<br>
			<span id="scontraceña1"></span>
			<input type="password" class="form-control" name="contraceña1" id="contraceña1" required>
		</div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" id="registrar">Registrar</button>
      </div>
	  </form>
    </div>
  </div>
</div>

					   <!----FIN MODAL REGISTRO--------->
					   
					   
					   
					   
					   
				   <!----MODAL EDITAR--------->
		<div class="modal fade" tabindex="-1" id="editEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <form id="f2">
        <h5 class="modal-title">Modificar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <div class="form-group">
		
		    <label>Nombre de usuario</label>
			<br>
			<span id="snombre1"></span>
			<input type="text" class="form-control" style="display: none;"  name="accion1" value="accion" required>
			<input type="text" class="form-control" style="display: none;"  name="id" id="id" required>
			<input type="text" class="form-control" name="nombre1" id="nombre1" required>
		</div>
		<div class="form-group">
		    <label>Correo</label>
			<br>
			<span id="scorreo1"></span>
			<input type="text" class="form-control" name="correo1" id="correo1" required>
		</div>
		<div class="form-group">
		    <label>Rol</label>
			<br>
			<span id="srol1"></span>
			<select name="rol1" id="rol1" class="form-control" >

			<?php
    if(!empty($rol) ){

        echo $rol;
    }
?>
			</select>
		</div>
		<div class="form-group">
		    <label>Contraceña</label>
			<br>
			<span id="scontraceña2"></span>
			<input type="password" class="form-control" name="contraceña2" id="contraceña2" required>
		</div>
		<div class="form-group">
		    <label>Confirmar contraceña</label>
			<br>
			<span id="scontraceña3"></span>
			<input type="password" class="form-control" name="contraceña3" id="contraceña3" required>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" id="registrar2">Modificar</button>
      </div>
	  </form>
    </div>
  </div>
</div>

					   <!----FIN MODAL EDITAR--------->	   
					   
					   
					 <!---MODAL BORRAR--------->
		<div class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Employees</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form id="f3">

	  <input type="text" class="form-control" style="display: none;"  name="id1" id="id1" required>
	  <input style="display: none;" type="text" name="accion3" id="accion3" value="accion">
	  </form>
      <div class="modal-body">
        <p>Are you sure you want to delete this Records</p>
		<p class="text-warning"><small>this action Cannot be Undone,</small></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" id="borrar">borrar</button>
      </div>
    </div>
  </div>
</div>

					   <!----FIN MODAL BORRAR--------->   
					   
					
					
				 
			     </div>
			  </div>

	</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<?php require_once('comunes/footer.php') ?> 
	<script src="assets/js/script.js"></script>
	<script src="assets/js/usuarios.js"></script>
</body>
</html>