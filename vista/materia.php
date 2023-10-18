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
					<h1>MATERIA</h1>
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
							    <h2 class="ml-lg-2">Registro de Materia</h2>
							 </div>
							 <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
							 <?PHP if (in_array("registrar materias", $nivel1)) {?>
							    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
									<i class="material-icons">&#xE147;</i>
									<span>Registrar</span>
							    </a>

								<?php } ?>

							 </div>
					     </div>
					   </div>
					 
					   <table id="example" style="width:100%" class="table table-striped table-hover">
					      <thead>
						     <tr>
				 <th><span class="custom-checkbox">
							 <input type="checkbox" id="selectAll">
							 <label for="selectAll"></label></th>			
							 <th>Id</th>
							 <th>Nombre</th>
							 
	
							 <th>Acciones</th>
							 </tr>
						  </thead>
						  
						  <tbody id="tabla">
						  <?PHP if (in_array("consultar materias", $nivel1)) {?>
								
								<?php
									if(!empty($consulta)){
										echo $consulta;
									}
								?>   

<?php } ?>
							 
						  </tbody>
						  
					      
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
        <h5 class="modal-title">Registrar Materia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


	  <h5 class="modal-title">Materia</h5>
	    <hr>
		<div class="form-row">
			<div class="form-group col-md-4" style="display:none;">
				<label>Id</label>
				<span id="id_v"></span>
				<input type="text" class="form-control" style="display: none;"  name="accion" value="accion" >
				<input type="text" class="form-control sm" name="id" id="id" placeholder="0000000">
			</div>
			<div class="form-group col-md-4">
				<label>Nombre</label>
				<span id="nombre_v"></span>
				<input type="text" class="form-control" name="nombre" id="nombre"  placeholder="materia..">
			</div>
			
		</div>
		
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" data-dismiss="modal" id="registrar">Registrar</button>
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
        <h5 class="modal-title">Editar Materia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

	  <h5 class="modal-title">Materia</h5>
	    <hr>

		<div class="form-row">
			<div class="form-group col-md-4" style="display:none;">
				<label>Id</label>
				<span id="id1_v"></span>
				<input type="text" class="form-control" style="display: none;"  name="id_edit" value="id_edit" required>
				<input type="text" class="form-control" name="id1" id="id1" required >
			</div>
			<div class="form-group col-md-4">
				<label>Nombre</label>
				<br>
				<span id="nombre1_v"></span>			
				<input type="text" class="form-control" name="nombre1" id="nombre1" required >
			</div>
			
		</div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success"  data-dismiss="modal" id="editar">Actualizar</button>
      </div>
	  </form>
    </div>
  </div>
</div>

<!---------------------------------------------FIN MODAL EDITAR------------------------------------------------->	   
					   

					   
<!-----------------------------------------------MODAL BORRAR------------------------------------------------------>
<!-- <div class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Borrar Materia Registrado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form id="f3">

		<input style="display: none;" type="text" name="id2" id="id2">
		<input style="display: none;" type="text" name="delete" id="delete" value="accion">

	</form>
      <div class="modal-body">
        <p>Estas seguro de querer eliminar este registro ?</p>
		<p class="text-warning"><small>Esta Accion no es reversible</small></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" data-dismiss="modal" id="borrar">Si, Borrar</button>
      </div>
    </div>
  </div>
</div> -->

<div class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Borrar Materia Registrado</h5>
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
        <button type="button" class="btn btn-success" data-dismiss="modal" id="borrar">Si, Borrar</button>
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
    <script src="assets/js/materia.js"></script>
    <!-- <script src="assets/js/tabla.js"></script> -->
	<!--<script  src="assets/js/script.js"></script>-->
</body>
</html>