<?php

require_once('modelo/conexion.php');

class materias extends datos{

    private $id;
	private $nombre;
    private $nivel;
    

    public function set_id($valor){
		$this->id = $valor; 
	}
    public function set_nombre($valor){
		$this->nombre = $valor; 
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
        $val=$this->eliminar1();
        echo $val;
    }
    public function set_nivel($valor){
		$val=$this->nivel = $valor; 
        echo $val;
	}


//<!---------------------------------funcion registrar------------------------------------------------------------------>
    private function registrar1(){

        $co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    //Existe el id
        if(!$this->existe($this->nombre)){
            try{
                $r= $co->prepare("INSERT into materias(
						
                            
                            nombre,
                            estado
                        
                            )
            
                    Values( 
                            :nombre,
                            1
                   
                            
                    )"
                );

           
                $r->bindParam(':nombre',$this->nombre);	
   
                			
   
                $r->execute();

                $this->bitacora("se registro una materia", "materias",$this->nivel);
                    return "Registro Incluido";	
                
            }
            catch(Exception $e){  return $e->getMessage(); }
        }
        else{ return "MATERIA Registrada";}

  }

 //<!---------------------------------fin de funcion registrar------------------------------------------------------------------>  
        


//<!---------------------------------funcion modificar------------------------------------------------------------------>
        private function modificar1(){

            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if($this->existe($this->id)){
                try{
                    $r= $co->prepare("UPDATE materias set 
                        
                        nombre=:nombre  
                       
                        where
						id =:id
      
                        ");
                    $r->bindParam(':id',$this->id);
                    $r->bindParam(':nombre',$this->nombre);		
                
                 
                    $r->execute();
    
                    $this->bitacora("se modificao una materia", "materias",$this->nivel);
                        return "Registro modificado";	
                    
                }catch(Exception $e){
                    return $e->getMessage();
                }
                    
                }
                else{
                    return "MATERIA no registrado";
                }
        

            }
  //<!---------------------------------fin de funcion modificar------------------------------------------------------------------>  




  //<!---------------------------------funcion consultar------------------------------------------------------------------>          
public function consultar($nivel1){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
			
			
			$resultado = $co->prepare("SELECT * from materias where estado=1");
			$resultado->execute();
           $respuesta="";

            foreach($resultado as $r){
                $respuesta= $respuesta.'<tr> <th><span class="custom-checkbox">
                <input type="checkbox" id="checkbox1" name="option[]" value="1">
                <label for="checkbox1"></label></th>';
                $respuesta=$respuesta."<th>".$r['id']."</th>";
                $respuesta=$respuesta."<th>".$r['nombre']."</th>";
                $respuesta=$respuesta.'<th>';
                if (in_array("modificar materias",$nivel1)) {
                    # code...
                
                
                $respuesta=$respuesta.'<a href="#editEmployeeModal" class="edit" data-toggle="modal" onclick="modificar(`'.$r['id'].'`)">
               <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
               </a>';
            }
            if(in_array("eliminar materias",$nivel1)){
               $respuesta=$respuesta.'<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"  onclick="eliminar(`'.$r['id'].'`)">
               <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
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
			
			$resultado = $co->prepare("SELECT * from materias where id=:id");
			
			$resultado->bindParam(':id',$id);
			$resultado->execute();
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if($fila){ 

				return true; 
			    
			}
            //necesario?
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
              
                $estado=0;
                $r= $co->prepare("Update materias set 
                                            
                                    
                estado=:estado

                where
                id =:id

                    
                ");

                 



                 $r->bindParam(':id',$this->id);
                 $r->bindParam(':estado',$estado);
                 $r->execute();
                 $this->bitacora("se elimino una materia", "materias",$this->nivel);
                 return "Registro Eliminado";
                
         } catch(Exception $e) {
             return $e->getMessage();
         }
        

     }
     else{
         return "materia no registrada";
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