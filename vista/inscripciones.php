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
					<h1 >Inscripciones </h1>
				</div>
			</div>




			<!--TABLA -->	  
		   <!------main-content-start-----------> 
		     
           <div class="main-content">
			     <div class="row">
				    <div class="col-md-12">
					   <div class="table-wrapper">
					     
					   <div class="table-title mb-3">
					     <div class="row">
						     <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
							    <h2 class="ml-lg-2">Tabla de registros</h2>
							 </div>
							 <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
							   <?PHP if (in_array("registrar inscipcion", $nivel1)) {?>
							   <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
							   <i class="material-icons">&#xE147;</i>
							   <span>Inscribir</span>
							   </a>
							   <?php } ?>

							   <?PHP if (in_array("registrar inscipcion", $nivel1)) {?>
							   <a href="#importar" class="btn btn-success" data-toggle="modal">
							   <i class="material-icons">&#xE147;</i>
							   <span>Inscribir en lotes</span>
							   </a>
							   <?php } ?>

							
							 </div>
					     </div>
					   </div>
					   <?PHP if (in_array("consultar inscipcion", $nivel1)) {?>
					   <table id="tablas" class="table table-striped table-hover">
					      <thead>
						     <tr>
	
					
							 <th>Cedula </th>
							 <th>Nombre</th>
							
				
							 <th>Apellido</th>
							 <th>edad</th>
							 <th>observaciones</th>
							 <th>materias pendientes</th>
							 <th>año</th>
							 <th>seccion</th>
							 <th>accion</th>
							 <th></th>
						

							 </tr>
						  </thead>
						  
						  <tbody id="tabla">
						      
						  <?php
    				if(!empty($consuta)){
        				echo $consuta;
   					}
	       		 ?>
							 
							 
						  </tbody>
						  
					      
					   </table>

					   <?php } ?>
					   

					   
					   
					   
					   
	
					   
					   
					   
					   
					   </div>
					</div>
			<!--FINAL DE LA TABLA -->
					

<form id="f4" style="display: none;">

<input type="text" name="consulta" id="consulta">
</form>


<!---modal importar excel---->

<div class="modal fade" id="importar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Importar estudiantes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form  method="POST" enctype="multipart/form-data">

<input type="file" name="import_file"  id="file" class="form-control" />




	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button  name="save_excel_data" class="btn btn-success">importar</button>
      </div>
	  </form>
    </div>
  </div>
</div>



<!--fin importar-->





			<!----MODAL REGISTRO--------->
                                       <div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
  <div class="modal-dialog " role="document">
    <div class="modal-content vw-100">
      <div class="modal-header">
		<form id="f">
        <h5 class="modal-title">Inscribir estudiante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#"  id="I">Pagos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="#"  id="II">Datos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#"  id="III">Secciones</a>
  </li>
  
</ul>


      <div class="modal-body">
		<div  id="1" >

		
		<div class="form-row">
			<div class="form-group col-md-4">
				<label>Inscripciones pagadas</label>
			
				<select name="mibuscador" id="mibuscador" onchange="añadir()">
				<?php
    				if(!empty($consuta1[1])){
        				echo $consuta1[1];
   					}
	       		 ?>
				</select>

				


			</div>
	
		</div>
		<hr>
		<h6 class="modal-title">Datos del representante</h6>
		<hr>

			<div class="form-row" id="contenido2">
		
		

		

        <div class="form-group col-md-4">
		
		    <label>Cedula</label>
			<br>
			<span id="scedula"></span>
			<input type="text" class="form-control" style="display: none;"  name="accion" value="accion" required>
			<input type="text" class="form-control" style="display: none;"  name="cedu" id="cedu" required>
			<div type="text" class="form-control" name="cedula" id="cedula" required></div>
		</div>
		<div class="form-group col-md-4">
		    <label>Nombre</label>
			<br>
			<span id="snombre"></span>
			<div type="text" class="form-control" name="nombre" id="nombre" required></div>
		</div>
		<div class="form-group col-md-4">
		    <label>Apellido</label>
			<br>
			<span id="sapellido"></span>
			<div type="text" class="form-control" name="apellido1" id="apellido1" required></div>
		</div>
		
		<div class="form-group col-md-4">
		    <label>Telefono</label>
			<br>
			<span id="scategoria"></span>
			<div type="text" class="form-control" name="telefono" id="telefono" required></div>
		</div>
		<div class="form-group col-md-4">
		    <label>Correo</label>
			<br>
			<span id="scategoria"></span>
			<div type="text" class="form-control" name="correo" id="correo" required></div>
		</div>

		</div>

		</div>

		<div class="ocultar" id="2">
		<hr>
		<div class="form-row">
		<div class="form-group col-md-4">
		<div class="form-check" onclick="chect(0)">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" onclick="chect(0)"  checked>
  <label class="form-check-label" for="exampleRadios1" onclick="chect(0)">
    Nuevo ingreso
  </label>
</div>
<div class="form-check"onclick="chect2(0)">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" onclick="chect2(0)">
  <label class="form-check-label" for="exampleRadios2"  onclick="chect2(0)">
    Regular
  </label>
</div>

</div>
<div class="form-group col-md-4">
<label>Estudiantes inscritos:</label>
<input type="text" class="form-control ocultar" name="estudiante" id="estudiante" value="1"  required >
<select name="" id="mibuscador2" onchange="añadir2()" disabled >
				<?php
    				if(!empty($consuta2[1])){
        				echo $consuta2[1];
   					}
	       		 ?>
				</select>
</div>
		</div>
		<hr>
		<h6 class="modal-title">Datos del Estudiante: </h6>
		<hr>
			<div class="form-row">
			
		<div class="form-group col-md-4">
		
		    <label>Cedula</label>
			<br>
			<span id="scedulae"></span>
			<input type="text" class="form-control" name="cedulae" id="cedulae" required>
		</div>
		<div class="form-group col-md-4">
		    <label>Nombre</label>
			<br>
			<span id="snombree"></span>
			<input type="text" class="form-control" name="nombree" id="nombree" required>
		</div>
		<div class="form-group col-md-4">
		    <label>Apellido</label>
			<br>
			<span id="sapellidoe"></span>
			<input type="text" class="form-control" name="apellidoe" id="apellidoe" required>
		</div>
		<div class="form-group col-md-4">
		    <label>Edad</label>
			<br>
			<span id="sedade"></span>
			<input type="text" class="form-control" name="edade" id="edade" required>
		</div>
		<div class="form-group col-md-4">
		    <label>Solvencia</label>
			<br>
			<span id="smateriae"></span>
			<select name="materiae" id="materiae" class="form-control" >
				<option value="aprobado">aprobado</option>
				<option value="reprovado">reprovado</option>
			</select>
		</div>
		<div class="form-group col-md-4">
		    <label>Observaciones</label>
			<br>
			<span id="sobservacionese"></span>
			<input class="form-control" name="observacionese" id="observacionese" required>
		</div>
		</div>

		<hr>
		<h6 class="modal-title">Ficha medica de: </h6>
		<hr>

		<div class="form-row">
			
		<div class="form-group col-md-4">
		
		    <label>Tipo de sangre</label>
			<br>
			<span id="ssangre"></span>
			<input type="text" class="form-control" name="sangre" id="sangre" required>
		</div>
		<div class="form-group col-md-4">
		    <label>Vacunas</label>
			<br>
			<span id="svacunas"></span>
			<input type="text" class="form-control" name="vacunas" id="vacunas" required>
		</div>
		<div class="form-group col-md-4">
		    <label>Operaciones</label>
			<br>
			<span id="soperaciones"></span>
			<input type="text" class="form-control" name="operaciones" id="operaciones" required>
		</div>
		<div class="form-group col-md-4">
		    <label>Enfermedades</label>
			<br>
			<span id="senfermedades"></span>
			<input type="text" class="form-control" name="enfermedades" id="enfermedades" required>
		</div>
		<div class="form-group col-md-4">
		    <label>Medicamentos</label>
			<br>
			<span id="smedicamentos"></span>
			<input type="text" class="form-control" name="medicamentos" id="medicamentos" required>
		</div>
		<div class="form-group col-md-4">
		    <label>Alergias</label>
			<br>
			<span id="salerias"></span>
			<input type="text" class="form-control" name="alerias" id="alerias" required>
		</div>
		<div class="form-group col-md-4">
		    <label>Tratamientos</label>
			<br>
			<span id="stratamiento"></span>
			<input type="text" class="form-control" name="tratamiento" id="tratamiento" required>
		</div>
		<div class="form-group col-md-4">
		    <label>Condicion medica</label>
			<br>
			<span id="scondicion"></span>
			<input type="text" class="form-control" name="condicion" id="condicion" required>
		</div>
		</div>



		</div>


		<div class="ocultar" id="3">



		<h6 class="modal-title">Asignar seccion al estudiante</h6>
		<hr>

		<div class="form-row">
		
		<div class="form-group col-md-4">
		<label>selecciona un año y seccion:</label>
<select name="ano" id="mibuscador3" onchange="añadir3('#mibuscador3')" >
				<?php
    				if(!empty($consuta3)){
        				echo $consuta3;
   					}
	       		 ?>
				</select>
</div>






		</div>
		

		</div>
      </div>
      <div class="modal-footer" id="contenido">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelar">Cancelar</button>
		<button type="button" class="btn btn-light ocultar" id="inscri1" >Inscribir</button>
		<button type="button" class="btn btn-light ocultar" id="inscri" onclick="enviar()">Inscribir</button>
        <button type="button" class="btn btn-light" id="registrar">Siguiente</button>
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
        <h5 class="modal-title">modificar estudiante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <hr>
		<h6 class="modal-title">Datos del estudiante</h6>
		<hr>
	  <div class="form-row">

					

        <div class="form-group col-md-4">
		    <label>Cedula</label>
			<br>
			<span id="scedula1"></span>
			<input type="text" class="form-control" style="display: none;"  name="accion1" value="accion1" required>
			<input type="text" class="form-control"  name="cedula1" id="cedula1" required disabled>
		</div>
		<div class="form-group col-md-4">
		    <label>Nombre</label>
			<br>
			<span id="snombre1"></span>
			<input type="text" class="form-control" name="nombre1" id="nombre1" required>
		</div>
		<div class="form-group col-md-4">
		    <label>Apellido</label>
			<br>
			<span id="sapellido3"></span>
			<input type="text" class="form-control" name="apellido3" id="apellido3" required>
		</div>
		<div class="form-group col-md-4">
		    <label>Edad</label>
			<br>
			<span id="sedad1"></span>
			<input type="text" class="form-control" name="edad1" id="edad1" required>
		</div>
		<div class="form-group col-md-4">
		    <label>Solvencia</label>
			<br>
			<span id="smateriae"></span>
			<select name="materia1" id="materia1ss" class="form-control" >
				<option value="aprobado">aprobado</option>
				<option value="reprovado">reprovado</option>
			</select>
		</div>
		<div class="form-group col-md-4">
		    <label>observaciones</label>
			<br>
			<span id="sobservaciones3"></span>
			<input type="text" class="form-control" name="observaciones3" id="observaciones3" required>
		</div>
		
		</div>
		<hr>
		<h6 class="modal-title">Ficha medica de: </h6>
		<hr>

		<div class="form-row">
			
		<div class="form-group col-md-4">
		
		    <label>Tipo de sangre</label>
			<br>
			<span id="ssangre1"></span>
			<input type="text" class="form-control" name="sangre1" id="sangre1" required>
		</div>
		<div class="form-group col-md-4">
		    <label>Vacunas</label>
			<br>
			<span id="svacunas1"></span>
			<input type="text" class="form-control" name="vacunas1" id="vacunas1" required>
		</div>
		<div class="form-group col-md-4">
		    <label>Operaciones</label>
			<br>
			<span id="soperaciones1"></span>
			<input type="text" class="form-control" name="operaciones1" id="operaciones1" required>
		</div>
		<div class="form-group col-md-4">
		    <label>Enfermedades</label>
			<br>
			<span id="senfermedades1"></span>
			<input type="text" class="form-control" name="enfermedades1" id="enfermedades1" required>
		</div>
		<div class="form-group col-md-4">
		    <label>Medicamentos</label>
			<br>
			<span id="smedicamentos1"></span>
			<input type="text" class="form-control" name="medicamentos1" id="medicamentos1" required>
		</div>
		<div class="form-group col-md-4">
		    <label>Alergias</label>
			<br>
			<span id="salerias1"></span>
			<input type="text" class="form-control" name="alerias1" id="alerias1" required>
		</div>
		<div class="form-group col-md-4">
		    <label>Tratamientos</label>
			<br>
			<span id="stratamiento1"></span>
			<input type="text" class="form-control" name="tratamiento1" id="tratamiento1" required>
		</div>
		<div class="form-group col-md-4">
		    <label>Condicion medica</label>
			<br>
			<span id="scondicion1"></span>
			<input type="text" class="form-control" name="condicion1" id="condicion1" required>
		</div>
		</div>




		<hr>
		<h6 class="modal-title">Seccion y año asignado</h6>
		<hr>

		<div class="form-row">

		<div class="form-group col-md-4">
		<label>selecciona un año:</label>
<select name="ano1" id="mibuscador4" onchange="añadir3('#mibuscador3')" >
				<?php
    				if(!empty($consuta3)){
        				echo $consuta3;
   					}
	       		 ?>
				</select>
</div>



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

	  <input style="display: none;" type="text" name="cedula3" id="cedula3">
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



<table class="table table-striped table-hover ocultar">
					      <thead>
						 
						  </thead>
						  
						  <tbody id="consulta_representantes">
						      
						  <?php
    				if(!empty($consuta1[0])){
        				echo $consuta1[0];
   					}
	       		 ?>
							 
							 
						  </tbody>
						  
					      
					   </table>


					   <table class="table table-striped table-hover ocultar">
					      <thead>
						 
						  </thead>
						  
						  <tbody id="consulta_estudiantes">
						      
						  <?php
    				if(!empty($consuta2[0])){
        				echo $consuta2[0];
   					}
	       		 ?>
							 
							 
						  </tbody>
						  
					      
					   </table>


					   

					   <!----FIN MODAL BORRAR--------->   
					   
					
					
				 
			     </div>
			  </div>

	</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<?php require_once('comunes/footer.php') ?> 
    <script src="assets/js/script.js"></script>
	<script src="assets/js/inscripciones.js"></script>
</body>
</html>