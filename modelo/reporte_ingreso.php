<?php
require_once('dompdf/vendor/autoload.php'); 

use Dompdf\Dompdf; 

require_once('modelo/conexion.php');
class reporte_ingreso extends datos{
    

    public function generarPDF(){
		
		//El primer paso es generar una consulta SQl tal cual como lo hemos hecho en las 
		//clases anteriores, en este caso la consulta sera sobre la tabla usuarios
		//y tendra como parametros para filtro la cedula y el usuario
		
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{

            $resultado = $co->prepare("SELECT max(ano_academico.id) id FROM ano_academico");
			$resultado->execute();
           $ano="";

            foreach($resultado as $r){
                $ano=$r['id'];
            }
			
			$fecha = date('Y-m-d');
			$resultado = $co->query("SELECT COUNT(estudiantes.cedula) cantidad, estudiantes.cedula,estudiantes.nombre,secciones.secciones,años.anos, tutor_legal.cedula,tutor_legal.nombre1 FROM estudiantes INNER JOIN ano_estudiantes on ano_estudiantes.id_ano =$ano INNER JOIN secciones_años ON estudiantes.id_anos_secciones=secciones_años.id INNER JOIN años on años.id=secciones_años.id_anos INNER JOIN secciones ON secciones.id=secciones_años.id_secciones INNER JOIN estudiantes_tutor on estudiantes_tutor.id_estudiantes=estudiantes.cedula INNER JOIN tutor_legal on tutor_legal.cedula=estudiantes_tutor.id_tutor WHERE estudiantes.cedula=ano_estudiantes.id_estudiantes and estudiantes.estado=1");
		
			
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			
			
			$html = "<html><head></head><body>";
			$html = $html."Reporte: alumnos inscritos"." "."<br>"."fecha del reprote: ".$fecha;
			$html = $html."<div style='display:table;width:100%;border:solid'>";
			$html = $html."<div style='display:table-row;width:100%;border:solid'>";
			$html = $html."<div style='display:table-cell;width:100%;border:solid'>";

			$html = $html."<table style='width:100%'>";
			$html = $html."<thead>";
			$html = $html."<tr>";
			$html = $html."<th>Cedula del Estudiante</th>";
			$html = $html."<th>Nombre del Estudiante</th>";
            $html = $html."<th>Seccion</th>";
			$html = $html."<th>Año</th>";
			$html = $html."<th>Cedula del Representante</th>";
			$html = $html."<th>Nombre del Representante</th>";
			
			$html = $html."</tr>";
			$html = $html."</thead>";
			$html = $html."<tbody>";
			if($fila){
				
				foreach($fila as $f){
					$html = $html."<tr>";
					$html = $html."<td style='text-align:center'>".$f['cedula']."</td>";
					$html = $html."<td style='text-align:center'>".$f['nombre']."</td>";
					$html = $html."<td style='text-align:center'>".$f['secciones']."</td>";
					$html = $html."<td style='text-align:center'>".$f['anos']."</td>";
					$html = $html."<td style='text-align:center'>".$f['cedula']."</td>";
					$html = $html."<td style='text-align:center'>".$f['nombre1']."</td>";

					$html = $html."</tr>";
				}

				//return json_encode($fila);
				
			}
			else{
				
				//return '';
			}
			$html = $html."</tbody>";
			$html = $html."</table>";
		    $html = $html."</div></div></div>";
			$html = $html."</body></html>";
			
			
		}catch(Exception $e){
			//return $e->getMessage();
		}
		
		
		



 
		// Instanciamos un objeto de la clase DOMPDF.
		$pdf = new DOMPDF();
		 
		// Definimos el tamaño y orientación del papel que queremos.
		$pdf->set_paper("A4", "portrait");
		 
		// Cargamos el contenido HTML.
		$pdf->load_html(utf8_decode($html));
		 
		// Renderizamos el documento PDF.
		$pdf->render();
		 
		// Enviamos el fichero PDF al navegador.
		$pdf->stream('reportest.pdf', array("Attachment" => false));
		
		
	}



public function consultar1(){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{


			$resultado = $co->prepare("SELECT max(ano_academico.id) id FROM ano_academico");
			$resultado->execute();
           $ano="";

            foreach($resultado as $r){
                $ano=$r['id'];
            }
			
			$resultado = $co->prepare("SELECT COUNT(estudiantes.cedula) cantidad FROM estudiantes INNER JOIN ano_estudiantes on ano_estudiantes.id_ano =$ano INNER JOIN secciones_años ON estudiantes.id_anos_secciones=secciones_años.id WHERE estudiantes.cedula=ano_estudiantes.id_estudiantes and estudiantes.estado=1 and secciones_años.id_anos=1");
			$resultado->execute();
           $ano="";

            foreach($resultado as $r){
               $ano=$r['cantidad'];

            }

           
            return $ano;
         
							
							


			
			
		}catch(Exception $e){
			
			return false;
		}
}


public function consultar2(){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{


			$resultado = $co->prepare("SELECT max(ano_academico.id) id FROM ano_academico");
			$resultado->execute();
           $ano="";

            foreach($resultado as $r){
                $ano=$r['id'];
            }
			
			$resultado = $co->prepare("SELECT COUNT(estudiantes.cedula) cantidad FROM estudiantes INNER JOIN ano_estudiantes on ano_estudiantes.id_ano =$ano INNER JOIN secciones_años ON estudiantes.id_anos_secciones=secciones_años.id WHERE estudiantes.cedula=ano_estudiantes.id_estudiantes and estudiantes.estado=1 and secciones_años.id_anos=2");
			$resultado->execute();
           $ano="";

            foreach($resultado as $r){
               $ano=$r['cantidad'];

            }

           
            return $ano;
         
							
							


			
			
		}catch(Exception $e){
			
			return false;
		}
}


public function consultar3(){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{


			$resultado = $co->prepare("SELECT max(ano_academico.id) id FROM ano_academico");
			$resultado->execute();
           $ano="";

            foreach($resultado as $r){
                $ano=$r['id'];
            }
			
			$resultado = $co->prepare("SELECT COUNT(estudiantes.cedula) cantidad FROM estudiantes INNER JOIN ano_estudiantes on ano_estudiantes.id_ano =$ano INNER JOIN secciones_años ON estudiantes.id_anos_secciones=secciones_años.id WHERE estudiantes.cedula=ano_estudiantes.id_estudiantes and estudiantes.estado=1 and secciones_años.id_anos=4");
			$resultado->execute();
           $ano="";

            foreach($resultado as $r){
               $ano=$r['cantidad'];

            }

           
            return $ano;
         
							
							


			
			
		}catch(Exception $e){
			
			return false;
		}
}


public function consultar4(){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{


			$resultado = $co->prepare("SELECT max(ano_academico.id) id FROM ano_academico");
			$resultado->execute();
           $ano="";

            foreach($resultado as $r){
                $ano=$r['id'];
            }
			
			$resultado = $co->prepare("SELECT COUNT(estudiantes.cedula) cantidad FROM estudiantes INNER JOIN ano_estudiantes on ano_estudiantes.id_ano =$ano INNER JOIN secciones_años ON estudiantes.id_anos_secciones=secciones_años.id WHERE estudiantes.cedula=ano_estudiantes.id_estudiantes and estudiantes.estado=1 and secciones_años.id_anos=5");
			$resultado->execute();
           $ano="";

            foreach($resultado as $r){
               $ano=$r['cantidad'];

            }

           
            return $ano;
         
							
							


			
			
		}catch(Exception $e){
			
			return false;
		}
}


public function consultar5(){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{


			$resultado = $co->prepare("SELECT max(ano_academico.id) id FROM ano_academico");
			$resultado->execute();
           $ano="";

            foreach($resultado as $r){
                $ano=$r['id'];
            }
			
			$resultado = $co->prepare("SELECT COUNT(estudiantes.cedula) cantidad FROM estudiantes INNER JOIN ano_estudiantes on ano_estudiantes.id_ano =$ano INNER JOIN secciones_años ON estudiantes.id_anos_secciones=secciones_años.id WHERE estudiantes.cedula=ano_estudiantes.id_estudiantes and estudiantes.estado=1 and secciones_años.id_anos=3");
			$resultado->execute();
           $ano="";

            foreach($resultado as $r){
               $ano=$r['cantidad'];

            }

           
            return $ano;
         
							
							


			
			
		}catch(Exception $e){
			
			return false;
		}
}

    private function existe($cedula){
		
		$co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		try{
			
			
			$resultado = $co->prepare("Select * from docentes where cedula=:cedula");
			
			$resultado->bindParam(':cedula',$cedula);
			$resultado->execute();
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if($fila){ 

				return true; 
			    
			}
			else{
				
				return false; 
			}
			
		}catch(Exception $e){
			
			return false;
		}
	}


  

    private function bitacora($accion, $modulo,$id){
        try {
            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        parent::registrar_bitacora($accion, $modulo,$id);
    
                    
                    
                    ;
            } catch(Exception $e) {
                return $e->getMessage();
            }
        
    }

}

?>