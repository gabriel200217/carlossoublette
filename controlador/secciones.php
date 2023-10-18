<?php 

if (!is_file("modelo/".$pagina.".php")){
	
	echo "Falta definir la clase ".$pagina;
	exit;
}
require_once("modelo/".$pagina.".php"); 


	if(is_file("vista/".$pagina.".php")){





		
		$o = new secciones();
		if(!empty($_POST['accion'])){
		
			$o->set_id($_POST['id']);
			$o->set_secciones($_POST['secciones']);
			$o->set_ano($_POST['ano']);
			$o->set_cedula_profesor($_POST['cedula_profesor']);
			$o->set_ano_academico($_POST['ano_academico']);
			$o->set_cantidad($_POST['cantidad']);


			$mensaje = $o->registrar();
			echo $mensaje;
			exit;			
		  }






		  
		  if(!empty($_POST['accion1'])){
		
			$o->set_id($_POST['id1']);
			$o->set_cantidad($_POST['cantidad1']);
			
			$mensaje = $o->modificar();		
			echo $mensaje;
			exit;		
		  }

		  


		  if(!empty($_POST['accion3'])){
	
			$o->set_id($_POST['id2']);			
			$mensaje = $o->eliminar();			
			echo $mensaje;
			exit;			
		  }





		  if(!empty($_POST['consulta'])){
	
			$consuta=$o->consultar();
			echo $consuta;
			exit;
		  }

		  $consuta=$o->consultar();
		  $consuta1=$o->consultar1();
		  $consuta2=$o->consultar2();
		  $consuta3=$o->consultar3();
		  $consuta4=$o->consultar4();


		$consuta=$o->consultar();
		require_once("vista/".$pagina.".php");



	}else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>