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
					<h1 >seguridad </h1>
				</div>
			</div>




			<!--TABLA -->	  
		   <!------main-content-start-----------> 
		     
           <div class="main-content">
			     <div class="row">
				    <div class="col-md-12">
					   <div class="table-wrapper">
					     
					   <div class="table-title">
					     <div class="row">
						     <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
							    <h2 class="ml-lg-2">Tabla de registros</h2>
							 </div>
							 <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
               <?PHP if (in_array("registrar seguridad", $nivel1)) {?>
							   <a href="#editEmployeeModal1" class="btn btn-success" data-toggle="modal">
							   <i class="material-icons">&#xE147;</i>
							   <span>Registrar</span>
							   </a>
                 <?php } ?>
							 </div>
					     </div>
					   </div>
					   
					   <table class="table table-striped table-hover">
					      <thead>
						     <tr>

							 <th>rol </th>
							 <th>descripcion</th>
				
							 <th>accion</th>
							 

							 </tr>
						  </thead>
						  <?PHP if (in_array("consultar seguridad", $nivel1)) {?>
						  <tbody id="tabla">
						      
						  <?php
    				if(!empty($consuta)){
        				echo $consuta;
   					}
	       		 ?>
							 
							 
						  </tbody>
						  <?php } ?>
					      
					   </table>


             <table class="table table-striped table- ocultar">
					      <thead>
						     <tr>

							 <th>descripcion</th>
				

							 

							 </tr>
						  </thead>
						  
						  <tbody id="tabla2">
						      
						  
							 
							 
						  </tbody>
						  
					      
					   </table>




					   
				
					   
					   
					   </div>
					</div>
			<!--FINAL DE LA TABLA -->
					

<form id="f4" style="display: none;">

<input type="text" name="consulta" id="consulta">
</form>


<form id="f5" class="ocultar" >
<input type="text" name="accion5" id="accion5" value="5">
<input type="text" name="id" id="id">
</form>



			<!----MODAL REGISTRO--------->
                                       <div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
		<form id="f">
        <h5 class="modal-title">Gestionar permisos de: <span id="nombreRol"></span></h5>
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="row">
                            <div class="col">
                            <label class="btn btn-success"><input class="btn-check ocultar" type="checkbox" id="MarcarTodos" onclick="marcar()" autocomplete="off" />Marcar Todos</label>
                            <label class="btn btn-success"><input class="btn-check ocultar" type="checkbox" id="MarcarTodos1" onclick="marcar2()" autocomplete="off" />Desmarcar Todos</label>
                            </div>
                        </div>


      <div class="modal-body">
	  <div class="form-row">
		<div class="form-group col-md-4">
		<h5 class="modal-title">usuario</h5>
	    <hr>
		<div class="form-check">
    <input class="ocultar" type="text" name="id2" id="id2">
  <input class="form-check-input" type="checkbox" value="62" name="exampleRadios[]" id="1" >
  <input class="form-check-input ocultar" type="text" value="62" name="accion"  >
  <label class="form-check-label" for="1">
	 registrar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="63" name="exampleRadios[]" id="2" >
  <label class="form-check-label" for="2"  >
    modificar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="64" name="exampleRadios[]" id="3" >
  <label class="form-check-label" for="3"  >
    eliminar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="65" name="exampleRadios[]" id="4" >
  <label class="form-check-label" for="4"  >
    consultar
  </label>
</div>


</div>
<div class="form-group col-md-4">
<h5 class="modal-title">docente</h5>
	    <hr>
		<div class="form-check">
  <input class="form-check-input" type="checkbox" value="66" name="exampleRadios[]" id="5"  >
  <label class="form-check-label" for="5">
	 registrar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="67" name="exampleRadios[]" id="6" >
  <label class="form-check-label" for="6"  >
    modificar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="68" name="exampleRadios[]" id="7" >
  <label class="form-check-label" for="7"  >
    eliminar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="69" name="exampleRadios[]" id="8" >
  <label class="form-check-label" for="8"  >
    consultar
  </label>
</div>


</div>
<div class="form-group col-md-4">
<h5 class="modal-title">representante</h5>
	    <hr>
		<div class="form-check">
  <input class="form-check-input" type="checkbox" value="70" name="exampleRadios[]" id="9"  >
  <label class="form-check-label" for="9">
	 registrar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="71" name="exampleRadios[]" id="10" >
  <label class="form-check-label" for="10"  >
    modificar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="72" name="exampleRadios[]" id="11" >
  <label class="form-check-label" for="11"  >
    eliminar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="73" name="exampleRadios[]" id="12" >
  <label class="form-check-label" for="12"  >
    consultar
  </label>
</div>


</div>
<div class="form-group col-md-4">
<h5 class="modal-title">pagos</h5>
	    <hr>
		<div class="form-check">
  <input class="form-check-input" type="checkbox" value="74" name="exampleRadios[]" id="13"  >
  <label class="form-check-label" for="13">
	 registrar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="111" name="exampleRadios[]" id="50" >
  <label class="form-check-label" for="50"  >
    enviar pago
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="75" name="exampleRadios[]" id="14" >
  <label class="form-check-label" for="14"  >
    modificar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="76" name="exampleRadios[]" id="15" >
  <label class="form-check-label" for="15"  >
    eliminar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="77" name="exampleRadios[]" id="16" >
  <label class="form-check-label" for="16"  >
    consultar
  </label>
</div>


</div>
<div class="form-group col-md-4">
<h5 class="modal-title">materias</h5>
	    <hr>
		<div class="form-check">
  <input class="form-check-input" type="checkbox" value="78" name="exampleRadios[]" id="17"  >
  <label class="form-check-label" for="17">
	 registrar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="79" name="exampleRadios[]" id="18" >
  <label class="form-check-label" for="18"  >
    modificar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="80" name="exampleRadios[]" id="19" >
  <label class="form-check-label" for="19"  >
    eliminar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="81" name="exampleRadios[]" id="20" >
  <label class="form-check-label" for="20"  >
    consultar
  </label>
</div>


</div>
<div class="form-group col-md-4">
<h5 class="modal-title">años</h5>
	    <hr>
		<div class="form-check">
  <input class="form-check-input" type="checkbox" value="82" name="exampleRadios[]" id="21"  >
  <label class="form-check-label" for="21">
	 registrar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="83" name="exampleRadios[]" id="22" >
  <label class="form-check-label" for="22"  >
    modificar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="84" name="exampleRadios[]" id="23" >
  <label class="form-check-label" for="23"  >
    eliminar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="85" name="exampleRadios[]" id="24" >
  <label class="form-check-label" for="24"  >
    consultar
  </label>
</div>


</div> 
<div class="form-group col-md-4">
<h5 class="modal-title">secciones</h5>
	    <hr>
		<div class="form-check">
  <input class="form-check-input" type="checkbox" value="86" name="exampleRadios[]" id="25"  >
  <label class="form-check-label" for="25">
	 registrar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="87" name="exampleRadios[]" id="26" >
  <label class="form-check-label" for="26"  >
    modificar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="88" name="exampleRadios[]" id="27" >
  <label class="form-check-label" for="27"  >
    eliminar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="89" name="exampleRadios[]" id="28" >
  <label class="form-check-label" for="28"  >
    consultar
  </label>
</div>


</div> 
<div class="form-group col-md-4">
<h5 class="modal-title">horario docente</h5>
	    <hr>
		<div class="form-check">
  <input class="form-check-input" type="checkbox" value="90" name="exampleRadios[]" id="29"  >
  <label class="form-check-label" for="29">
	 registrar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="91" name="exampleRadios[]" id="30" >
  <label class="form-check-label" for="30"  >
    modificar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="92" name="exampleRadios[]" id="31" >
  <label class="form-check-label" for="31"  >
    eliminar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="93" name="exampleRadios[]" id="32" >
  <label class="form-check-label" for="32"  >
    consultar
  </label>
</div>


</div> 
<div class="form-group col-md-4">
<h5 class="modal-title">horario seccion</h5>
	    <hr>
		<div class="form-check">
  <input class="form-check-input" type="checkbox" value="94" name="exampleRadios[]" id="33"  >
  <label class="form-check-label" for="33">
	 registrar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="95" name="exampleRadios[]" id="34" >
  <label class="form-check-label" for="34"  >
    modificar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="96" name="exampleRadios[]" id="35" >
  <label class="form-check-label" for="35"  >
    eliminar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="97" name="exampleRadios[]" id="36" >
  <label class="form-check-label" for="36"  >
    consultar
  </label>
</div>


</div> 
<div class="form-group col-md-4">
<h5 class="modal-title">inscripcion</h5>
	    <hr>
		<div class="form-check">
  <input class="form-check-input" type="checkbox" value="98" name="exampleRadios[]" id="37"  >
  <label class="form-check-label" for="37">
	 registrar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="99" name="exampleRadios[]" id="38" >
  <label class="form-check-label" for="38"  >
    modificar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="100" name="exampleRadios[]" id="39" >
  <label class="form-check-label" for="39"  >
    eliminar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="101" name="exampleRadios[]" id="40" >
  <label class="form-check-label" for="40"  >
    consultar
  </label>
</div>


</div> 
<div class="form-group col-md-4">
<h5 class="modal-title">año academico</h5>
	    <hr>
		<div class="form-check">
  <input class="form-check-input" type="checkbox" value="102" name="exampleRadios[]" id="41"  >
  <label class="form-check-label" for="41">
	 registrar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="103" name="exampleRadios[]" id="42" >
  <label class="form-check-label" for="42"  >
    modificar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="104" name="exampleRadios[]" id="43" >
  <label class="form-check-label" for="43"  >
    eliminar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="105" name="exampleRadios[]" id="44" >
  <label class="form-check-label" for="44"  >
    consultar
  </label>
</div>


</div> 


<div class="form-group col-md-4">
<h5 class="modal-title">seguridad</h5>
	    <hr>
		<div class="form-check">
  <input class="form-check-input" type="checkbox" value="106" name="exampleRadios[]" id="45"  >
  <label class="form-check-label" for="45">
	 registrar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="107" name="exampleRadios[]" id="46" >
  <label class="form-check-label" for="46"  >
    modificar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="108" name="exampleRadios[]" id="47" >
  <label class="form-check-label" for="47"  >
    eliminar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="109" name="exampleRadios[]" id="48" >
  <label class="form-check-label" for="48"  >
    consultar
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="110" name="exampleRadios[]" id="49" >
  <label class="form-check-label" for="49"  >
    permisos
  </label>
</div>

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

					   <!----FIN MODAL REGISTRO--------->
					   
					   
					   
					   
					   
				   <!----MODAL EDITAR--------->
		<div class="modal fade" tabindex="-1" id="editEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <form id="f2">
        <h5 class="modal-title">modificar rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
		    <label>nombre del rol</label>
			<br>
			<span id="srol1"></span>
			<input type="text" class="form-control" style="display: none;"  name="accion2" value="accion2" required>
			<input type="text" class="form-control"  name="rol1" id="rol1" required disabled>
		</div>
		<div class="form-group">
		    <label>descripcion</label>
			<br>
			<span id="sdescripcion1"></span>
			<input type="text" class="form-control" name="descripcion1" id="descripcion1" required>
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






                
				   <!----MODAL agregar--------->
		<div class="modal fade" tabindex="-1" id="editEmployeeModal1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <form id="f7">
        <h5 class="modal-title">Agregar rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
		    <label>nombre del rol</label>
			<br>
			<span id="srol"></span>
			<input type="text" class="form-control" style="display: none;"  name="accion8" value="accion8" required>
			<input type="text" class="form-control"  name="rol" id="rol" required>
		</div>
		<div class="form-group">
		    <label>descripcion</label>
			<br>
			<span id="sdescripcion"></span>
			<input type="text" class="form-control" name="descripcion" id="descripcion" required>
		</div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" id="registrar5">agregar</button>
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
    <script src="assets/js/tabla.js"></script>
	<script src="assets/js/seguridad.js"></script>
</body>
</html>