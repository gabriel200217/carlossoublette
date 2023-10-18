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
					<h1 >bitacora </h1>
				</div>
			</div>




			<!--TABLA -->	  
		   <!------main-content-start-----------> 
		     
           <div class="main-content">
			     <div class="row">
				    <div class="col-md-12">
					   <div class="table-wrapper">
			
					   
					   <table id="tablas" style="width:100%" class="table table-striped ">
					      <thead>
						     <tr>		
							 <th>id </th>
							 <th>fecha</th>				
							 <th>accion</th>
							 <th>modulo</th>
							 <th>id del usuario</th>
							 
							 </tr>
						  </thead>
						  <?PHP if (in_array("consultar docente", $nivel1)) {?>
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
        <h5 class="modal-title">Agregar docente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
		
		    <label>Cedula</label>
			<br>
			<span id="scedula"></span>
			<input type="text" class="form-control" style="display: none;"  name="accion" value="accion" required>
			<input type="text" class="form-control" name="cedula" id="cedula" required>
		</div>
		<div class="form-group">
		    <label>Nombre</label>
			<br>
			<span id="snombre"></span>
			<input type="text" class="form-control" name="nombre" id="nombre" required>
		</div>
		<div class="form-group">
		    <label>Apellido</label>
			<br>
			<span id="sapellido"></span>
			<input type="text" class="form-control" name="apellido" id="apellido" required>
		</div>
		<div class="form-group">
		    <label>Categoria de trabajo</label>
			<br>
			<span id="scategoria"></span>
			<input type="text" class="form-control" name="categoria" id="categoria" required>
		</div>
		<div class="form-group">
		    <label>Fecha de nacimiento</label>
			<br>
			<span id="sfecha"></span>
			<input type="date" class="form-control" name="fecha" id="fecha" required>
		</div>
		<div class="form-group">
		    <label>Especializacion</label>
			<br>
			<span id="sespecializacion"></span>
			<input type="text" class="form-control" name="especializacion" id="especializacion" required>
		</div>
		<div class="form-group">
		    <label>Profecion</label>
			<br>
			<span id="sprofecion"></span>
			<input type="text" class="form-control" name="profecion" id="profecion" required>
		</div>
		<div class="form-group">
		    <label>Edad</label>
			<br>
			<span id="sedad"></span>
			<input type="text" class="form-control" name="edad" id="edad" required>
		</div>
		<div class="form-group">
		    <label>Años de trabajo</label>
			<br>
			<span id="saños"></span>
			<input type="text" class="form-control" name="años" id="años" required>
		</div>
		<div class="form-group">
		    <label>Correo</label>
			<br>
			<span id="scorreo"></span>
			<input type="text" class="form-control" name="correo" id="correo" required>
		</div>
		<div class="form-group">
		    <label>Direccion</label>
			<br>
			<span id="sdireccion"></span>
			<input type="text" class="form-control" name="direccion" id="direccion" required>
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
        <h5 class="modal-title">Agregar docente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group"style="display: none;">
		    <label>Cedula</label>
			<br>
			<span id="scedula1"></span>
			<input type="text" class="form-control" style="display: none;"  name="accion1" value="accion1" required>
			<input type="text" class="form-control"  name="cedula1" id="cedula1" required>
		</div>
		<div class="form-group">
		    <label>Nombre</label>
			<br>
			<span id="snombre1"></span>
			<input type="text" class="form-control" name="nombre1" id="nombre1" required>
		</div>
		<div class="form-group">
		    <label>Apellido</label>
			<br>
			<span id="sapellido1"></span>
			<input type="text" class="form-control" name="apellido1" id="apellido1" required>
		</div>
		<div class="form-group">
		    <label>Categoria de trabajo</label>
			<br>
			<span id="scategoria1"></span>
			<input type="text" class="form-control" name="categoria1" id="categoria1" required>
		</div>
		<div class="form-group">
		    <label>Fecha de nacimiento</label>
			<br>
			<span id="sfecha1"></span>
			<input type="date" class="form-control" name="fecha1" id="fecha1" required>
		</div>
		<div class="form-group">
		    <label>Especializacion</label>
			<br>
			<span id="sespecializacion1"></span>
			<input type="text" class="form-control" name="especializacion1" id="especializacion1" required>
		</div>
		<div class="form-group">
		    <label>Profecion</label>
			<br>
			<span id="sprofecion1"></span>
			<input type="text" class="form-control" name="profecion1" id="profecion1" required>
		</div>
		<div class="form-group">
		    <label>Edad</label>
			<br>
			<span id="sedad1"></span>
			<input type="text" class="form-control" name="edad1" id="edad1" required>
		</div>
		<div class="form-group">
		    <label>Años de trabajo</label>
			<br>
			<span id="saños1"></span>
			<input type="text" class="form-control" name="años1" id="años1" required>
		</div>
		<div class="form-group">
		    <label>Correo</label>
			<br>
			<span id="scorreo1"></span>
			<input type="text" class="form-control" name="correo1" id="correo1" required>
		</div>
		<div class="form-group">
		    <label>Direccion</label>
			<br>
			<span id="sdireccion1"></span>
			<input type="text" class="form-control" name="direccion1" id="direccion1" required>
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

	  <input style="display: none;" type="text" name="cedula2" id="cedula2">
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
    <script  src="assets/js/script.js"></script>
	<script src="assets/js/docente.js"></script>
</body>
</html>