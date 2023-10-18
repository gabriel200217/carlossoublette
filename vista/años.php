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
					<h1 >AÑOS</h1>
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
							    <h2 class="ml-lg-2">Registro de Años</h2>
							 </div>
							 <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
							 <?PHP if (in_array("registrar anos", $nivel1)) {?>
							    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
									<i class="material-icons">&#xE147;</i>
									<span>Registrar</span>
							    </a>

								<?php } ?>

							 </div>
					     </div>
					   </div>
					 
					   <table id="tablas" style="width:100%" class="table table-striped">
					      <thead>
						     <tr>	
							 <th>Id</th>
							 <th>Años</th>
							 <th>Turno</th>
	
							 <th>Acciones</th>
							 </tr>
						  </thead>
						  <?PHP if (in_array("consultar anos", $nivel1)) {?>
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
        <h5 class="modal-title">Registrar Años</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


	  <h5 class="modal-title">Años</h5>
	    <hr>
		<div class="form-row">
			<div class="form-group col-md-4" style="display:none;">
				<label>Id</label>
				<span id="sid"></span>
				<input type="text" class="form-control" style="display: none;"  name="accion" value="accion" required>
				<input type="text" class="form-control sm" name="id" id="id" required placeholder="0000000">
			</div>
			<div class="form-group col-md-4">
				<label>Año</label>
				<span id="sanos"></span>
				<input type="text" class="form-control" name="anos" id="anos" required placeholder="3">
			</div>
			<div class="form-group col-md-4">
				<label>Turno</label>
				<span id="sturnos"></span>
				<input type="text" class="form-control" name="turnos" id="turnos" required placeholder="Tarde">
			</div>
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

<!--------------------------------------FIN MODAL REGISTRO-------------------------------------------------->
					   
					   
					   

















					   
					   
<!---------------------------------MODAL EDITAR------------------------------------------------------------------>
<div class="modal fade" tabindex="-1" id="editEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  <form id="f2">
        <h5 class="modal-title">Editar Años</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

	  <h5 class="modal-title">Años</h5>
	    <hr>

		<div class="form-row">
			<div class="form-group col-md-4" style="display:none;">
				<label>Id</label>
				<span id="sid1"></span>
				<input type="text" class="form-control" style="display: none;"  name="accion1" value="accion1" required>
				<input type="text" class="form-control " name="id1" id="id1" required >
			</div>
			<div class="form-group col-md-4">
				<label>Años</label>
				<br>
				<span id="sanos1"></span>			
				<input type="text" class="form-control" name="anos1" id="anos1" required >
			</div>
			<div class="form-group col-md-4">
				<label>Turno</label>
				<span id="sturnos1"></span>			
				<input type="text" class="form-control" name="turnos1" id="turnos1" required >
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
        <h5 class="modal-title">Borrar Año Registrado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form id="f3">

		<input style="display: none;" type="text" name="id2" id="id2">
		<input style="display: none;" type="text" name="accion3" id="accion3" value="accion">

	</form>
      <div class="modal-body">
        <p>Estas seguro de querer eliminar este registro ?</p>
		<p class="text-warning"><small>Esta Accion no es reversible</small></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" id="borrar">Si, Borrar</button>
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
    <script src="assets/js/años.js"></script>
		<script  src="assets/js/script.js"></script>
</body>
</html>