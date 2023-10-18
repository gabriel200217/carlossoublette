<?php 

//Carga de Modelo
if (is_file("modelo/".$pagina.".php")){
	
    require_once("modelo/".$pagina.".php");
	
}
else{ echo "Falta definir la clase ".$pagina;  exit; }


 

//Carga de Vista
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


		$o = new materias();
        
        //Registro (f)
		if(!empty($_POST['accion'])){
			if (preg_match("/^[0-9]{1,3}$/",$_POST['id'] )) {
				$o->set_id($_POST['id']);
			}
			if (preg_match("/^[a-zA-Z0-9_]+$/", $_POST['nombre'])) {
				$o->set_nombre($_POST['nombre']);
			}
			
			
			
			$o->set_nivel($nivel);
			$mensaje = $o->registrar();
			echo $mensaje;
			exit;			
		  }


		  //Editar (f2)
		  if(!empty($_POST['id_edit'])){
		
			if (preg_match("/^[0-9]$/",$_POST['id1'] )) {
				$o->set_id($_POST['id1']);
			}
			if (preg_match("/^[a-zA-Z0-9_]+$/", $_POST['nombre1'])) {
				$o->set_nombre($_POST['nombre1']);
			}
			
			$o->set_nivel($nivel);
			$mensaje = $o->modificar();		
			echo $mensaje;
			exit;		
		  }


          //Eliminar (f3)
		//   if(!empty($_POST['delete'])){
	
		// 	$o->set_id($_POST['id2']);			
		// 	$mensaje = $o->eliminar();			
		// 	echo $mensaje;
		// 	exit;			
		//   }

		if(!empty($_POST['accion3'])){
	
			if (preg_match("/^[a-zA-Z0-9_]+$/",$_POST['id2'] )) {
				$o->set_id($_POST['id2']);
			}	
			$o->set_nivel($nivel);		
			$mensaje = $o->eliminar();			
			echo $mensaje;
			exit;			
		  }

          //Consulta (f4)
		  if(!empty($_POST['consulta'])){
			if(isset($_SESSION['permisos'])){
				$nivel1 = $_SESSION['permisos'];
		   
			 }
			 else{
				 $nivel1 = "";
			 }
			

			$consulta=$o->consultar($nivel1);
			echo $consulta;
			exit;
		  }


		$consulta=$o->consultar($nivel1);
		require_once("vista/".$pagina.".php");

	}
    else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>