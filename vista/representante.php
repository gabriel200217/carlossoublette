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
			<div class="head-title pt-3  mx-auto" style="width: 200px;  ">
				<div class="left">
					<h1 >REPRESENTANTES</h1>
				</div>
			</div>




							<!--TABLA -->	
<!--------------------------------------------------main-content-start------------------------------------------------------------> 
		     

           <div class="main-content">
			     <div class="row">
				    <div class="col-md-12">
					   <div class="table">
					     
							<div class="table-title  mb-3">
								<div class="row ">
									<div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
										<h2 class="ml-lg-2">Registro de Representante</h2>
									</div>
									<div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
									<?PHP if (in_array("registrar representante", $nivel1)) {?>
										<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
											<i class="material-icons">&#xE147;</i>
											<span>Registrar</span>
										</a>
										<?php } ?>
							

									</div>
								</div>
							</div>
					 
					   <table id="tablas" style="width:100%"  class="table table-striped display nowrap ">
					      <thead>
						     <tr>
				   			 			
							 <th>Cedula</th>
							 <th>Nombre</th>
							 <th></th>
							 <th>Apellido</th>
							 <th></th>
							 <th>Telefono</th>						 
							 <th>Correo</th>							
							 <th>Contacto</th>
							 <th>Acciones</th>
							 </tr>
						  </thead>
						  <?PHP if (in_array("consultar representante", $nivel1)) {?>
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



<!------------------------------------------FINAL DE LA TABLA -------------------------------------------------->
					





<form id="f4" style="display: none;">

<input type="text" name="consulta" id="consulta">
</form>
















<!------------------------------------------------MODAL REGISTRO------------------------------------------------->
<div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  <form id="f">
        <h5 class="modal-title">Registrar Representante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


	  <h5 class="modal-title">Representante</h5>
	    <hr>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label>Cedula</label>
				<span id="scedula"></span>
				<input type="text" class="form-control" style="display: none;"  name="accion" value="accion" required>
				<input type="text" class="form-control sm" name="cedula" id="cedula" required placeholder="0000000">
			</div>
			<div class="form-group col-md-4">
				<label>Primer Nombre</label>
				<span id="snombre1"></span>
				<input type="text" class="form-control" name="nombre1" id="nombre1" required placeholder="Jose">
			</div>
			<div class="form-group col-md-4">
				<label>Segundo Nombre</label>
				<span id="snombre2"></span>
				<input type="text" class="form-control" name="nombre2" id="nombre2" required placeholder="Alejandro">
			</div>
		</div>
		
		<div class="form-row">
			<div class="form-group col-md-4">
				<label>Primer Apellido</label>
				<span id="sapellido1"></span>
				<input type="text" class="form-control" name="apellido1" id="apellido1" required placeholder="Rodriguez">
			</div>
			<div class="form-group col-md-4">
				<label>Segundo Apellido</label>
				<span id="sapellido2"></span>
				<input type="text" class="form-control" name="apellido2" id="apellido2" required placeholder="Sarmiento">
			</div>
			<div class="form-group col-md-4">
				<label>Telefono</label>
				<span id="stelefono"></span>
				<input type="text" class="form-control" name="telefono" id="telefono" required placeholder="0000-0000000">
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-4">
				<label>Correo</label>
				<span id="scorreo"></span>
				<input type="text" class="form-control" name="correo" id="correo" required placeholder="personal@gmail.com">
			</div>
		</div>
		<hr>
		<h5 class="modal-title">Contacto de Emergencia</h5>
		<hr>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label>Contacto de Emergencia</label>
				<span id="scontacto_emer"></span>
				<input type="text" class="form-control" name="contacto_emer" id="contacto_emer" required placeholder="0000-0000000">
			</div>
		</div>

		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success"  id="registrar" >Registrar</button>
      </div>
	  </form>
    </div>
  </div>
</div>

<!--------------------------------------FIN MODAL REGISTRO-------------------------------------------------->
					   
					   
					   

















					   
					   
<!---------------------------------MODAL EDITAR------------------------------------------------------------------>
<div class="modal fade" tabindex="-1" id="editEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  <form id="f2">
        <h5 class="modal-title">Editar Representante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

	  <h5 class="modal-title">Representante</h5>
	    <hr>

		<div class="form-row">
			<div class="form-group col-md-4">
				<label>Cedula</label>
				<span id="scedula1"></span>
				<input type="text" class="form-control" style="display: none;"  name="accion1" value="accion1" required>
				<input type="text" class="form-control " name="cedula1" id="cedula1" required >
			</div>
			<div class="form-group col-md-4">
				<label>Primer Nombre</label>
				<br>
				<span id="snombre11"></span>			
				<input type="text" class="form-control" name="nombre11" id="nombre11" required >
			</div>
			<div class="form-group col-md-4">
				<label>Segundo Nombre</label>
				<span id="snombre21"></span>			
				<input type="text" class="form-control" name="nombre21" id="nombre21" required >
			</div>
		</div>
		
		<div class="form-row">
			<div class="form-group col-md-4">
				<label>Primer Apellido</label>
				<span id="sapellido11"></span>			
				<input type="text" class="form-control" name="apellido11" id="apellido11" required >
			</div>
			<div class="form-group col-md-4">
				<label>Segundo Apellido</label>
				<span id="sapellido21"></span>		
				<input type="text" class="form-control" name="apellido21" id="apellido21" required >
			</div>
			<div class="form-group col-md-4">
				<label>Telefono</label>
				<span id="stelefono1"></span>			
				<input type="text" class="form-control" name="telefono1" id="telefono1" required >
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-4">
				<label>Correo</label>
				<span id="scorreo1"></span>		
				<input type="text" class="form-control" name="correo1" id="correo1" required >
			</div>
		</div>
		<hr>
		<h5 class="modal-title">Contacto de Emergencia</h5>
		<hr>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label>Contacto de Emergencia</label>
				<span id="scontacto_emer1"></span>				
				<input type="text" class="form-control" name="contacto_emer1" id="contacto_emer1" required >
			</div>
		</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" id="registrar2">Actualizar</button>
      </div>
	  </form>
    </div>
  </div>
</div>

<!---------------------------------------------FIN MODAL EDITAR------------------------------------------------->	   
					   


















					   
<!-----------------------------------------------MODAL BORRAR------------------------------------------------------>
<div class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Borrar Representante Registrado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form id="f3">

		<input style="display: none;" type="text" name="cedula2" id="cedula2">
		<input style="display: none;" type="text" name="accion3" id="accion3" value="accion">

	</form>
      <div class="modal-body">
        <p>Estas seguro de querer eliminar este registro ?</p>
		<p class="text-warning"><small>Esta Accion no es reversible</small></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" id="borrar" >Si, Borrar</button>
      </div>
    </div>
  </div>
</div>

<!-----------------------------------------------FIN MODAL BORRAR------------------------------------------------------>   
					   
					
					
				 
			    </div>
			</div>
		</main>
<!-- MAIN -->
	</section>
<!-- CONTENT -->


	<?php require_once('comunes/footer.php') ?> 
    <script src="assets/js/representante.js"></script>
	<script  src="assets/js/script.js"></script>
</body>
</html>