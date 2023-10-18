<?php

require_once('modelo/conexion.php');
class secciones extends datos{


    private $id;
	private $secciones;
    private $ano;
    private $cedula_profesor;
    private $ano_academico;
    private $cantidad;
    


    public function set_id($valor){
		$this->id = $valor; 
	}
	public function set_secciones($valor){
		$this->secciones = $valor; 
	}
    public function set_ano($valor){
        $this->ano = $valor; 
    }
    public function set_cantidad($valor){
        $this->cantidad = $valor; 
    }
     public function set_cedula_profesor($valor){
        $this->cedula_profesor = $valor; 
    }
    public function set_ano_academico($valor){
        $this->ano_academico = $valor; 
    }



    public function registrar(){
        $val=$this->registrar1();
        echo $val;
    }

    public function modificar(){
        $val=$this->modificar1();
        echo $val;
    }

    public function eliminar(){
        $val= $this->eliminar1();
        echo $val;
    }


	
   






//<!---------------------------------funcion registrar------------------------------------------------------------------>
  private function registrar1(){


    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
        $estado=1;
        try{


                $r= $co->prepare("Insert into secciones_años(
                    
                    id,
                    cantidad,
                    id_secciones,
                    id_anos,
                    estado
                   
                    
                    )
            

                    Values(
                    :id,
                    :cantidad,
                    :id_secciones,
                    :id_anos,
                    :estado
                    

                    
                    )");
                $r->bindParam(':id',$this->id); 
                $r->bindParam(':cantidad',$this->cantidad);
                $r->bindParam(':id_secciones',$this->secciones);
                $r->bindParam(':id_anos',$this->ano);   
                $r->bindParam(':estado',$estado);   

                $r->execute();



                $lid = $co->lastInsertId();

                $r= $co->prepare("Insert into docente_guia(
                    
                    id_docente,
                    id_ano_seccion
                    )
            

                    Values(

                    :id_docente,
                    :id_ano_seccion
                    
                    
                    )");
 
                $r->bindParam(':id_docente',$this->cedula_profesor);    
                $r->bindParam(':id_ano_seccion',$lid);  
                $r->execute();

                $r= $co->prepare("Insert into ano_secciones(
                    
                    id_anos,
                    id_secciones
                    )
            

                    Values(

                    :id_anos,
                    :id_secciones
                    
                    
                    )");
 
                $r->bindParam(':id_anos',$this->ano_academico);    
                $r->bindParam(':id_secciones',$lid);  
                $r->execute();



         
                return "Registro incluido"; 
            
        }catch(Exception $e){
            return $e->getMessage();
        }
            
        


    

}

 //<!---------------------------------fin de funcion registrar------------------------------------------------------------------>  
        








 






//<!---------------------------------funcion modificar------------------------------------------------------------------>
private function modificar1(){


    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($this->existe($this->id)){
        try{
            



            $r= $co->prepare("UPDATE secciones_años SET
             
             cantidad=:cantidad
            
             WHERE 
             id=:id


                
            ");
        $r->bindParam(':id',$this->id);
        $r->bindParam(':cantidad',$this->cantidad);   
        
        
  

        $r->execute();

        
         
                return "Registro modificado";   
            
            }catch(Exception $e){
                return $e->getMessage();
            }
        }else{
            return "Seccion no modificada";
        }
        }
  //<!---------------------------------fin de funcion modificar------------------------------------------------------------------>  




















  //<!---------------------------------funcion consultar------------------------------------------------------------------>          
public function consultar(){
    $co = $this->conecta();
        
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            
            
           $resultado = $co->prepare("SELECT sa.id,se.secciones,sa.cantidad,a.anos,a.turnos, concat(de.nombre,'-',de.cedula) as docente_guia, am.ano_academico

           FROM secciones_años sa 

            INNER JOIN secciones se
            ON sa.id_secciones = se.id

            INNER JOIN años a 
            ON sa.id_anos = a.anos
		
        	INNER JOIN docente_guia d
            ON sa.id = d.id_ano_seccion
            INNER JOIN docentes de
            ON d.id_docente = de.cedula
            
            
            INNER JOIN ano_secciones ac
			ON sa.id = ac.id_secciones
            INNER JOIN ano_academico am
            ON ac.id_anos = am.id
            WHERE sa.estado = 1
            
            ORDER BY sa.id;
           "); 

            $resultado->execute();
           $respuesta="";

            foreach($resultado as $r){
                $respuesta= $respuesta.'<tr>';
                $respuesta=$respuesta."<th>".$r['id']."</th>";
                $respuesta=$respuesta."<th>".$r['secciones']."</th>";
                $respuesta=$respuesta."<th>".$r['anos']."</th>";
                $respuesta=$respuesta."<th>".$r['cantidad']."</th>";
                $respuesta=$respuesta."<th>".$r['turnos']."</th>";
                $respuesta=$respuesta."<th>".$r['docente_guia']."</th>";
                $respuesta=$respuesta."<th>".$r['ano_academico']."</th>";
                $respuesta=$respuesta.'<th>';
            

                $respuesta=$respuesta.'<a href="#editEmployeeModal" class="edit" data-toggle="modal" onclick="modificar(`'.$r['id'].'`)">
                <i class="material-icons"  title="MODIFICAR"><img src="assets/icon/pencill.png"/></i>
               </a>';
            
            
               $respuesta=$respuesta.'<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"  onclick="eliminar(`'.$r['id'].'`)">
               <i class="material-icons"  title="BORRAR"><img src="assets/icon/trashh.png"/></i>    
               </a>';
               
            
            $respuesta=$respuesta.'</th>';
             $respuesta= $respuesta.'</tr>';
                
            }

           
            return $respuesta;
         
                            
            
        }catch(Exception $e){
            
            return false;
        }
}
//<!---------------------------------fin funcion consultar------------------------------------------------------------------>

public function consultar1(){
    $co = $this->conecta();
        
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            
            
            $resultado = $co->prepare("SELECT * from secciones");
            $resultado->execute();
           $respuesta="";
           $respuesta2="";
           $respuesta2 =$respuesta2.'<option value="seleccionar" selected hidden>-Seleccionar-</option>';

            foreach($resultado as $r){
                $respuesta2 =$respuesta2.'<option value="'.$r['id'].'"  >'.$r['secciones'].'</option>';
               
             
               
             $respuesta= $respuesta.'</tr>';

            }  

           
            return $respuesta2;
                             
            
            
        }catch(Exception $e){
            
            return false;
        }
}



public function consultar2(){
    $co = $this->conecta();
        
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            
            
            $resultado = $co->prepare("SELECT * from años");
            $resultado->execute();
           $respuesta="";
           $respuesta2="";
           $respuesta2 =$respuesta2.'<option value="seleccionar" selected hidden>-Seleccionar-</option>';

            foreach($resultado as $r){
                $respuesta2 =$respuesta2.'<option value="'.$r['id'].'"  >'.$r['anos'].'</option>';
               
             
               
             $respuesta= $respuesta.'</tr>';

            }  

           
            return $respuesta2;
                             
            
            
        }catch(Exception $e){
            
            return false;
        }
}

public function consultar3(){
    $co = $this->conecta();
        
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            
            
            $resultado = $co->prepare("SELECT * from docentes");
            $resultado->execute();
           $respuesta="";
           $respuesta2="";
           $respuesta2 =$respuesta2.'<option value="seleccionar" selected hidden>-Seleccionar-</option>';

            foreach($resultado as $r){
                $respuesta2 =$respuesta2.'<option value="'.$r['cedula'].'"  >'.$r['nombre'].'</option>';
               
             
               
             $respuesta= $respuesta.'</tr>';

            }

           
            return $respuesta2;
            
            
        }catch(Exception $e){
            
            return false;
        }
}


public function consultar4(){
    $co = $this->conecta();
        
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            
            
            $resultado = $co->prepare("SELECT * from ano_academico");
            $resultado->execute();
           $respuesta="";
           $respuesta2="";
           $respuesta2 =$respuesta2.'<option value="seleccionar" selected hidden>-Seleccionar-</option>';

            foreach($resultado as $r){
                $respuesta2 =$respuesta2.'<option value="'.$r['id'].'"  >'.$r['ano_academico'].'</option>';
               
             
               
             $respuesta= $respuesta.'</tr>';

            }

           
            return $respuesta2;
            
            
        }catch(Exception $e){
            
            return false;
        }
}



















//<!---------------------------------funcion existe------------------------------------------------------------------>
    private function existe($id){
		
		$co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		try{
			
			
			$resultado = $co->prepare("Select * from secciones_años where id=:id");
			
			$resultado->bindParam(':id',$id);
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
//<!---------------------------------fin de funcion existe------------------------------------------------------------------>






















//<!---------------------------------funcion eliminar------------------------------------------------------------------>
private function eliminar1(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($this->existe($this->id)){
    

        try {
            $r=$co->prepare("UPDATE `secciones_años` SET `estado`= 0 WHERE id=:id");
            $r->bindParam(':id',$this->id);
            $r->execute();
           
            return "Registro Eliminado";
                
        } catch(Exception $e) {
            return $e->getMessage();
        }
        
    

    }
    else{
        return "Sección no registrada";
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





//<!---------------------------------Fin de funcion eliminar------------------------------------------------------------------>
?>
