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


		
		$o = new tutor_legal();
		if(!empty($_POST['accion'])){
		
			$o->set_cedula($_POST['cedula']);
			$o->set_nombre1($_POST['nombre1']);
			$o->set_nombre2($_POST['nombre2']);
			$o->set_apellido1($_POST['apellido1']);
			$o->set_apellido2($_POST['apellido2']);
			$o->set_telefono($_POST['telefono']);
			$o->set_correo($_POST['correo']);
			$o->set_contacto_emer($_POST['contacto_emer']);
			$o->set_nivel($nivel);
			$mensaje = $o->registrar();
			echo $mensaje;
			exit;			
		  }






		  
		  if(!empty($_POST['accion1'])){
		
			$o->set_cedula($_POST['cedula1']);
			$o->set_nombre1($_POST['nombre11']);
			$o->set_nombre2($_POST['nombre21']);
			$o->set_apellido1($_POST['apellido11']);
			$o->set_apellido2($_POST['apellido21']);
			$o->set_telefono($_POST['telefono1']);
			$o->set_correo($_POST['correo1']);
			$o->set_contacto_emer($_POST['contacto_emer1']);
			$o->set_nivel($nivel);
			$mensaje = $o->modificar();		
			echo $mensaje;
			exit;		
		  }

		  


		  if(!empty($_POST['accion3'])){
			$o->set_nivel($nivel);
			$o->set_cedula($_POST['cedula2']);			
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



	}else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>