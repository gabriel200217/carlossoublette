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


		
		$o = new pagos();
		if(!empty($_POST['accion'])){
			if (preg_match("/^[0-9]{1,5}$/",$_POST['id'] )) {
				$o->set_id($_POST['id']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/", $_POST['id_deudas'])) {
				$o->set_id_deudas($_POST['id_deudas']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['identificador'])) {
				$o->set_identificador($_POST['identificador']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['concepto'])) {
				$o->set_concepto($_POST['concepto']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['forma'])) {
				$o->set_forma($_POST['forma']);
			}

			if (preg_match("/^\d{4}-\d{2}-\d{2}$/",$_POST['fecha'])) {
				$fecha = DateTime::createFromFormat('Y-m-d', $_POST['fecha']);
				$r=$_POST['meses'];
				$fecha->modify("+$r months");
				$val= $fecha->format('Y-m-d');
				$o->set_fecha($val);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['meses'])) {
				$o->set_meses($_POST['meses']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['estado'])) {
				$o->set_estado($_POST['estado']);
			}



			
			
			
			
			$o->set_nivel($nivel);
			$mensaje = $o->registrar();
			echo $mensaje;
			exit;			
		  }
		
	
		  if(!empty($_POST['accionr'])){
		  
			if (preg_match("/^[0-9]{1,5}$/",$_POST['idr'] )) {
				$o->set_id($_POST['idr']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/", $_POST['id_deudasr'])) {
				$o->set_id_deudas($_POST['id_deudasr']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['identificadorr'])) {
				$o->set_identificador($_POST['identificadorr']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['conceptor'])) {
				$o->set_concepto($_POST['conceptor']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['formar'])) {
				$o->set_forma($_POST['formar']);
			}
			if (preg_match("/^\d{4}-\d{2}-\d{2}$/",$_POST['fechar'])) {
				$fecha = DateTime::createFromFormat('Y-m-d', $_POST['fechar']);
				$r=$_POST['mesesr'];
				$fecha->modify("+$r months");
				$val= $fecha->format('Y-m-d');
				$o->set_fecha($val);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['mesesr'])) {
				$o->set_meses($_POST['mesesr']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['estador'])) {
				$o->set_estado($_POST['estador']);
			}
		

  
			  $mensaje = $o->registrar();
			  echo $mensaje;
			  exit;			
			}





		  if(!empty($_POST['accion1'])){

		
			if (preg_match("/^[0-9]{1,5}$/",$_POST['idM'] )) {
				$o->set_id($_POST['idM']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/", $_POST['id_deudasM'])) {
				$o->set_id_deudas($_POST['id_deudasM']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['identificadorM'])) {
				$o->set_identificador($_POST['identificadorM']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['conceptoM'])) {
				$o->set_concepto($_POST['conceptoM']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['formaM'])) {
				$o->set_forma($_POST['formaM']);
			}
			if (preg_match("/^\d{4}-\d{2}-\d{2}$/",$_POST['fechaM'])) {
				$o->set_fecha($_POST['fechaM']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['mesesM'])) {
				$o->set_meses($_POST['mesesM']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['estadoM'])) {
				$o->set_estado($_POST['estadoM']);
			}

			$o->set_nivel($nivel);
			$mensaje = $o->modificar();
		
			echo $mensaje;
			exit;			
		  }
		  






		  if(!empty($_POST['accion3'])){
			if (preg_match("/^[0-9]{1,5}$/",$_POST['idE'] )) {
				$o->set_id($_POST['idE']);	
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
			

			$consulta=$o->consultar($nivel1);
			echo $consulta;
			exit;
		  }
	



		  $consuta=$o->consultar($nivel1);
		$consuta2=$o->consultar2();
		$consutar=$o->consultarr();

		require_once("vista/".$pagina.".php");


	}

?>