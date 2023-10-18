<?php 


 //archivo de conecion para que funciuone 





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



		$o = new inscripciones();
		if(!empty($_POST['accion'])){

		
			$o->set_cedula_repre($_POST['mibuscador']);
			$o->set_estudiante($_POST['estudiante']);
			$o->set_cedula_estudiante($_POST['cedulae']);
			$o->set_nombre_estudiante($_POST['nombree']);
			$o->set_apellido_estudiante($_POST['apellidoe']);
			$o->set_edad_estudiante($_POST['edade']);
			$o->set_materia($_POST['materiae']);
			$o->set_observaciones($_POST['observacionese']);
			$o->set_sangre($_POST['sangre']);
			$o->set_vacunas($_POST['vacunas']);
			$o->set_operaciones($_POST['operaciones']);
			$o->set_enfermedades($_POST['enfermedades']);
			$o->set_medicamentos($_POST['medicamentos']);
			$o->set_alerias($_POST['alerias']);
			$o->set_tratamiento($_POST['tratamiento']);
			$o->set_condicion($_POST['condicion']);
			$o->set_ano($_POST['ano']);
			

			$o->set_nivel($nivel);
		
			
			$mensaje = $o->registrar();

			echo $mensaje;
			exit;
			
			
		  }
		  if(!empty($_POST['accion1'])){

		
			
			$o->set_cedula_estudiante($_POST['cedula1']);
			$o->set_nombre_estudiante($_POST['nombre1']);
			$o->set_apellido_estudiante($_POST['apellido3']);
			$o->set_edad_estudiante($_POST['edad1']);
			$o->set_materia($_POST['materia1']);
			$o->set_observaciones($_POST['observaciones3']);
			$o->set_sangre($_POST['sangre1']);
			$o->set_vacunas($_POST['vacunas1']);
			$o->set_operaciones($_POST['operaciones1']);
			$o->set_enfermedades($_POST['enfermedades1']);
			$o->set_medicamentos($_POST['medicamentos1']);
			$o->set_alerias($_POST['alerias1']);
			$o->set_tratamiento($_POST['tratamiento1']);
			$o->set_condicion($_POST['condicion1']);
			$o->set_ano($_POST['ano1']);


			$o->set_nivel($nivel);
			$mensaje = $o->modificar();
		
			echo $mensaje;
			exit;
			
			
		  }

		  if(!empty($_POST['accion3'])){

		
			$o->set_cedula_estudiante($_POST['cedula3']);
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
		  $consuta1=$o->consultar1();
		  $consuta2=$o->consultar2();
		  $consuta3=$o->consultar3();
		  $consuta4=$o->consultar4();
		require_once("vista/".$pagina.".php");
	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}

//probando la excel
if(isset($_POST['save_excel_data']))
{
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','csv','xlsx'];

    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach($data as $row)
        {
            if($count > 0)
            {
			$cedula_repre = $row['0'];
			$o->set_cedula_repre($cedula_repre);
			
			$estudiante = $row['1'];
			$o->set_estudiante($estudiante);
			
			$cedula_estudiante = $row['2'];
			$o->set_cedula_estudiante($cedula_estudiante);
			
			$nombre_estudiante = $row['3'];
			$o->set_nombre_estudiante($nombre_estudiante);
			
			$apellido_estudiante = $row['4'];
			$o->set_apellido_estudiante($apellido_estudiante);
			
			$edad_estudinate = $row['5'];
			$o->set_edad_estudiante($edad_estudinate);
		
			$materia = $row['6'];
			$o->set_materia($materia);
		
			$observaciones = $row['7'];
			$o->set_observaciones($observaciones);
		
			$sangre = $row['8'];
			$o->set_sangre($sangre);
				
			$vacunas = $row['9'];
			$o->set_vacunas($vacunas);

			$opearaciones = $row['10'];
			$o->set_operaciones($opearaciones);

			$enfermedades = $row['11'];
			$o->set_enfermedades($enfermedades);

			$medicamento = $row['12'];
			$o->set_medicamentos($medicamento);

			$alergias = $row['13'];
			$o->set_alerias($alergias);

			$tratamiento = $row['14'];
			$o->set_tratamiento($tratamiento);

			$condicion = $row['15'];
			$o->set_condicion($condicion);

			$ano = $row['16'];
			$o->set_ano($ano);





                $o->importar();

            }
            else
            {
                $count = "1";
            }
        }

	}
}




	
?>