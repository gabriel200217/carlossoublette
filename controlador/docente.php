<?php 

if (!is_file("modelo/".$pagina.".php")){
	
	echo "Falta definir la clase ".$pagina;
	exit;
}
require_once("modelo/".$pagina.".php"); 


	if(is_file("vista/".$pagina.".php")){
		if(empty($_SESSION)){
			session_start();
			}
  
			  if(isset($_SESSION['usuario'])){
			   $nivel = $_SESSION['usuario'];
			}
			else{
				$nivel = "";
			}
			
	  
				  if(isset($_SESSION['permisos'])){
				   $nivel1 = $_SESSION['permisos'];
			  
				}
				else{
					$nivel1 = "";
				}

		$o = new docente();
		if(!empty($_POST['accion'])){
			if (preg_match("/^[0-9]{7,8}$/",$_POST['cedula'] )) {
				$o->set_cedula($_POST['cedula']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/", $_POST['nombre'])) {
				$o->set_nombre($_POST['nombre']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['apellido'])) {
				$o->set_apellido($_POST['apellido']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['categoria'] )) {
				$o->set_categoria($_POST['categoria']);
			}
			if (preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST['fecha'])) {
				$o->set_fecha($_POST['fecha']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['especializacion'])) {
				$o->set_especializacion($_POST['especializacion']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['profecion'] )) {
				$o->set_profecion($_POST['profecion']);
			}
			if (preg_match("/^[0-9]{2}$/", $_POST['edad'])) {
				$o->set_edad($_POST['edad']);
			}
			if (preg_match("/^[0-9]{2}$/",$_POST['años'])) {
				$o->set_años($_POST['años']);
			}
			if (preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/",$_POST['correo'] )) {
				$o->set_correo($_POST['correo']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/", $_POST['direccion'])) {
				$o->set_direccion($_POST['direccion']);
			}
	

		
			
			
			
			
			
			
			
			
			
			
			
			
			$o->set_nivel($nivel);
			$mensaje = $o->registrar();

			echo $mensaje;
			exit;
			
			
		  }
		  if(!empty($_POST['accion1'])){

		
			if (preg_match("/^[0-9]{7,8}$/",$_POST['cedula1'] )) {
				$o->set_cedula($_POST['cedula1']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/", $_POST['nombre1'])) {
				$o->set_nombre($_POST['nombre1']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['apellido1'])) {
				$o->set_apellido($_POST['apellido1']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['categoria1'] )) {
				$o->set_categoria($_POST['categoria1']);
			}
			if (preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST['fecha1'])) {
				$o->set_fecha($_POST['fecha1']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['especializacion1'])) {
				$o->set_especializacion($_POST['especializacion1']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['profecion1'] )) {
				$o->set_profecion($_POST['profecion1']);
			}
			if (preg_match("/^[0-9]{2}$/", $_POST['edad1'])) {
				$o->set_edad($_POST['edad1']);
			}
			if (preg_match("/^[0-9]{2}$/",$_POST['años1'])) {
				$o->set_años($_POST['años1']);
			}
			if (preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/",$_POST['correo1'] )) {
				$o->set_correo($_POST['correo1']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/", $_POST['direccion1'])) {
				$o->set_direccion($_POST['direccion1']);
			}
			$o->set_nivel($nivel);
			$mensaje = $o->modificar();
		
			echo $mensaje;
			exit;
			
			
		  }

		  if(!empty($_POST['accion3'])){

			if (preg_match("/^[0-9]{7,8}$/", $_POST['cedula2'])) {
				$o->set_cedula($_POST['cedula2']);
			}
			
			$o->set_nivel($nivel);
			$mensaje = $o->eliminar();
			
			echo $mensaje;
			exit;
			
			
		  }
		  if(!empty($_POST['consulta'])){

		
			
			
			if(isset($_SESSION['permisos'])){
				$nivel1 = $_SESSION['permisos'];
		   
			 }
			 else{
				 $nivel1 = "";
			 }
			
			
			$consuta=$o->consultar($nivel1);
			
			echo $consuta;
			exit;
			
		  }

		  $consuta=$o->consultar($nivel1);
		require_once("vista/".$pagina.".php");
	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>