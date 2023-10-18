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

		
		$o = new horario_docente();
		if(!empty($_POST['accion'])){
			
			if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/",$_POST['clase'] )) {
				$o->set_clase($_POST['clase']);
			}
			if (preg_match("/^[0-9]{3,8}$/", $_POST['cedula_profesor'])) {
				$o->set_cedula_profesor($_POST['cedula_profesor']);
			}
			if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/",$_POST['fin'])) {
				$o->set_fin($_POST['fin']);
			}
			if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/",$_POST['ano'] )) {
				$o->set_ano($_POST['ano']);
			}
			
			if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/",$_POST['dia'])) {
				$o->set_dia($_POST['dia']);
			}
			if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/",$_POST['clase_inicia'] )) {
				$o->set_clase_inicia($_POST['clase_inicia']);
			}
			if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $_POST['clase_termina'])) {
				$o->set_clase_termina($_POST['clase_termina']);
			}
			if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/",$_POST['inicio'])) {
				$o->set_inicio($_POST['inicio']);
			}

			
			
			
			
			
			
			
			
			
			$o->set_nivel($nivel);


			$mensaje = $o->registrar();
			echo $mensaje;
			exit;			
		  }






		  
		  if(!empty($_POST['accion1'])){
			
			if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/",$_POST['id'] )) {
				$o->set_id($_POST['id']);
			}
			if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $_POST['fin1'])) {
				$o->set_fin($_POST['fin1']);
			}
			if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/",$_POST['dia1'])) {
				$o->set_dia($_POST['dia1']);
			}
			if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/",$_POST['clase_inicia1'] )) {
				$o->set_clase_inicia($_POST['clase_inicia1']);
			}
			if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $_POST['clase_termina1'])) {
				$o->set_clase_termina($_POST['clase_termina1']);
			}
			if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/",$_POST['inicio1'])) {
				$o->set_inicio($_POST['inicio1']);
			}
			$o->set_nivel($nivel);
			$mensaje = $o->modificar();		
			echo $mensaje;
			exit;		
		  }

		  


		  if(!empty($_POST['accion3'])){

			if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/",$_POST['id1'] )) {
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

		  $consuta=$o->consultar($nivel1);

		$consuta2=$o->consultar2();
		$consuta3=$o->consultar3();
		$consuta4=$o->consultar4();
		

		if(!empty($_POST['eventos'])){
	
			$evento=$o->eventos();
			echo ($evento);
			exit;
		  }
		  $evento=$o->eventos();
		  $selector=$o->eventos_selector();
		  
		require_once("vista/".$pagina.".php");



	}else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>