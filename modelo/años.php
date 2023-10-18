<?php

require_once('modelo/conexion.php');
class años extends datos{


    private $id;
	private $anos;
    private $turnos;
    private $nivel;


    public function set_id($valor){
		$this->id = $valor; 
	}
	public function set_anos($valor){
		$this->anos = $valor; 
	}
    public function set_turnos($valor){
		$this->turnos = $valor; 
	}
    public function set_nivel($valor){
		$this->nivel = $valor; 
	
	
    }
        public function registrar(){
           $val= $this->registrar1();
           echo $val;
        }
    
        public function modificar(){
            $val= $this->modificar1();
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
        if(!$this->existe($this->id)){
            try{
                $r= $co->prepare("Insert into años(
						
                            id,
                            anos,
                            turnos
                            )
            
                    Values( :id,
                            :anos,
                            :turnos
                    )"
                );

                $r->bindParam(':id',$this->id);	
                $r->bindParam(':anos',$this->anos);			
                $r->bindParam(':turnos',$this->turnos);
            
             
                $r->execute();
                $this->bitacora("se registro un año", "años",$this->nivel);
             
                    return "Registro Incluido";	
                
            }catch(Exception $e){
                return $e->getMessage();
            }
        }
            else{
                return "Año Registrado";
            }
  }

 //<!---------------------------------fin de funcion registrar------------------------------------------------------------------>  
        








 






//<!---------------------------------funcion modificar------------------------------------------------------------------>
private function modificar1(){


            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if($this->existe($this->id)){
                try{
                    $r= $co->prepare("Update años set 
                            
                       
                        anos=:anos,
                        turnos=:turnos
                        where
						id =:id
                        
                
                         
                            
                            
                        ");
                    $r->bindParam(':id',$this->id);	
                    $r->bindParam(':anos',$this->anos);	
                    $r->bindParam(':turnos',$this->turnos);		
                
                 
                    $r->execute();
                    $this->bitacora("se modifico un año", "años",$this->nivel);
                 
                        return "Registro modificado";	
                    
                }catch(Exception $e){
                    return $e->getMessage();
                }
                    
                }
                else{
                    return "año no registrado";
                }
        

            }
  //<!---------------------------------fin de funcion modificar------------------------------------------------------------------>  




















  //<!---------------------------------funcion consultar------------------------------------------------------------------>          
public function consultar($nivel1){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
			
			
			$resultado = $co->prepare("Select * from años");
			$resultado->execute();
           $respuesta="";

            foreach($resultado as $r){
               $respuesta= $respuesta.'<tr>';
                $respuesta=$respuesta."<th>".$r['id']."</th>";
                $respuesta=$respuesta."<th>".$r['anos']."</th>";
                $respuesta=$respuesta."<th>".$r['turnos']."</th>";
                $respuesta=$respuesta.'<th>';
                if (in_array("modificar anos",$nivel1)) {
                    # code...
                
                
                $respuesta=$respuesta.'<a href="#editEmployeeModal" class="edit" data-toggle="modal" onclick="modificar(`'.$r['id'].'`)">
                <i class="material-icons"  title="MODIFICAR"><img src="assets/icon/pencill.png"/></i>
               </a>';
            }
            if(in_array("eliminar anos",$nivel1)){
               $respuesta=$respuesta.'<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"  onclick="eliminar(`'.$r['id'].'`)">
               <i class="material-icons"  title="BORRAR"><img src="assets/icon/trashh.png"/></i>    
               </a>';
               
            }
            $respuesta=$respuesta.'</th>';
             $respuesta= $respuesta.'</tr>';

            }

           
            return $respuesta;
         
							
							


			
			
		}catch(Exception $e){
			
			return false;
		}
}
//<!---------------------------------fin funcion consultar------------------------------------------------------------------>




















//<!---------------------------------funcion existe------------------------------------------------------------------>
    private function existe($id){
		
		$co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		try{
			
			
			$resultado = $co->prepare("Select * from años where id=:id");
			
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
                $r=$co->prepare("Delete from años 
                    where
                    id= :id
                    ");
                $r->bindParam(':id',$this->id);
                $r->execute();
                $this->bitacora("se elimino un año", "años",$this->nivel);
                return "Registro Eliminado";
                
        } catch(Exception $e) {
            return $e->getMessage();
        }
        
    

    }
    else{
        return "Año no registrado";
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