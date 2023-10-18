<?php 

if (!is_file("modelo/".$pagina.".php")){
	
	echo "Falta definir la clase ".$pagina;
	exit;
}
require_once("modelo/".$pagina.".php"); 


	if(is_file("vista/".$pagina.".php")){





		
		$o = new ano_academico();
		if(!empty($_POST['accion'])){
		
			$o->set_id($_POST['id']);
			$o->set_fecha_ini($_POST['fecha_ini']);
			$o->set_fecha_cierr($_POST['fecha_cierr']);
			$o->set_lapso($_POST['lapso']);
			$o->set_ano_academico($_POST['ano_academico']);

			$mensaje = $o->registrar();
			echo $mensaje;
			exit;			
		  }






		  
		  if(!empty($_POST['accion1'])){
		
			$o->set_id($_POST['id1']);
			$o->set_fecha_ini($_POST['fecha_ini1']);
			$o->set_fecha_cierr($_POST['fecha_cierr1']);
			$o->set_lapso($_POST['lapso1']);
			$o->set_ano_academico($_POST['ano_academico1']);

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


		if(!empty($_POST['eventos'])){
	
			$evento=$o->eventos();
			echo ($evento);
			exit;
		  }

		  
		  $evento=$o->eventos();

		require_once("vista/".$pagina.".php");



	}else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>