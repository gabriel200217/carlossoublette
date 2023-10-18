<?php 

if (!is_file("modelo/".$pagina.".php")){
	
	echo "Falta definir la clase ".$pagina;
	exit;
}
require_once("modelo/".$pagina.".php"); 


	if(is_file("vista/".$pagina.".php")){





		
		$o = new horario_secciones();
		if(!empty($_POST['accion'])){
			
			$o->set_clase($_POST['clase']);
			$o->set_cedula_profesor($_POST['cedula_profesor']);
			$o->set_ano($_POST['ano']);
			$o->set_seccion($_POST['seccion']);
			$o->set_dia($_POST['dia']);
			$o->set_clase_inicia($_POST['clase_inicia']);
			$o->set_clase_termina($_POST['clase_termina']);
			$o->set_inicio($_POST['inicio']);
			$o->set_fin($_POST['fin']);
			


			$mensaje = $o->registrar();
			echo $mensaje;
			exit;			
		  }






		  
		  if(!empty($_POST['accion1'])){
			$o->set_id($_POST['id']);
			$o->set_dia($_POST['dia1']);
			$o->set_clase_inicia($_POST['clase_inicia1']);
			$o->set_clase_termina($_POST['clase_termina1']);
			$o->set_inicio($_POST['inicio1']);
			$o->set_fin($_POST['fin1']);
			
			$mensaje = $o->modificar();		
			echo $mensaje;
			exit;		
		  }

		  


		  if(!empty($_POST['accion3'])){

		
			$o->set_id($_POST['id1']);
			
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
		$consuta2=$o->consultar2();
		$consuta3=$o->consultar3();
		$consuta4=$o->consultar4();
		$consuta5=$o->consultar5();

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