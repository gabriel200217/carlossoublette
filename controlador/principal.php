<?php 
if (!is_file("modelo/".$pagina.".php")){
	
	echo "Falta definir la clase ".$pagina;
	exit;
}
require_once("modelo/".$pagina.".php"); 


	if(is_file("vista/".$pagina.".php")){
		$o = new principal();
		if(empty($_SESSION)){
			session_start();
			}
  
			  if(isset($_SESSION['usuario'])){
			   $nivel = $_SESSION['usuario'];
			}
			else{
				$nivel = "";
			}
			$o->set_nivel($nivel);
		$var=$o->morocidad();
		$var=$o->notificaciones();
		
		

		require_once("vista/".$pagina.".php");

		
	
		

	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>