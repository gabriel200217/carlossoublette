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



		
		$o = new años();
		if(!empty($_POST['accion'])){
	
			if (preg_match("/^[0-9]{1.{1,5}$/",$_POST['id'] )) {
				$o->set_id($_POST['id']);
			}
			if (preg_match("/^[0-9]{1}$/", $_POST['anos'])) {
				$o->set_anos($_POST['anos']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['turnos'])) {
				$o->set_turnos($_POST['turnos']);
			}

			
			
			
			$o->set_nivel($nivel);
			$mensaje = $o->registrar();

			
			echo $mensaje;
			exit;			
		  }






		  
		  if(!empty($_POST['accion1'])){
		
			if (preg_match("/^[0-9]{1,5}$/",$_POST['id1'] )) {
				$o->set_id($_POST['id1']);
			}
			if (preg_match("/^[0-9]{1}$/", $_POST['anos1'])) {
				$o->set_anos($_POST['anos1']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['turnos1'])) {
				$o->set_turnos($_POST['turnos1']);
			}


			$o->set_nivel($nivel);
			$mensaje = $o->modificar();		

	
			
			echo $mensaje;
			exit;		
		  }

		  


		  if(!empty($_POST['accion3'])){
			$o->set_nivel($nivel);
			if (preg_match("/^[0-9]{1,5}$/",$_POST['id2'] )) {
				$o->set_id($_POST['id2']);
			}
						
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