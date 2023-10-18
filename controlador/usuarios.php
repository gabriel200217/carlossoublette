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
		$o = new usuarios();
		if(!empty($_POST['accion'])){

			if (preg_match("/^[a-zA-Z'-]+$/",$_POST['nombre'] )) {
				$o->set_nombre($_POST['nombre']);
			}
			if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $_POST['rol'])) {
				$o->set_rol($_POST['rol']);
			}
			if (preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/",$_POST['correo'])) {
				$o->set_correo($_POST['correo']);
			}
			if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/",$_POST['contraceña'])) {
				$o->set_contraceña($_POST['contraceña']);
			}
			
			
			
			
			
			$o->set_nivel($nivel);
			$mensaje = $o->registrar();

			echo $mensaje;
			exit;
			
			
		  }
		  if(!empty($_POST['accion1'])){

		
			if (preg_match("/^[a-zA-Z'-]+$/",$_POST['nombre1'] )) {
				$o->set_nombre($_POST['nombre1']);
			}
			if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $_POST['rol1'])) {
				$o->set_rol($_POST['rol1']);
			}
			if (preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/",$_POST['correo1'])) {
				$o->set_correo($_POST['correo1']);
			}
			if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/",$_POST['contraceña2'])) {
				$o->set_contraceña($_POST['contraceña2']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['id'] )) {
				$o->set_id($_POST['id']);
			}
			
			$o->set_nivel($nivel);
			$mensaje = $o->modificar();
		
			echo $mensaje;
			exit;
			
			
		  }

		  if(!empty($_POST['accion3'])){

		
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['id1'] )) {
				$o->set_id($_POST['id1']);
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
		  $rol=$o->roles();

		  $consuta=$o->consultar($nivel1);
		require_once("vista/".$pagina.".php");
	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>