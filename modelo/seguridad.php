<?php

require_once('modelo/conexion.php');
class seguridad extends datos{


 
    private $id;
	private $permiso;
	private $rol;
	private $descripcion;
    private $nivel;




    public function set_id($valor){
		$this->id = $valor; 
	}
	public function set_permiso($valor){
		$this->permiso = $valor; 
	}
	public function set_rol($valor){
		$this->rol = $valor; 
	}
	public function set_descripcion($valor){
		$this->descripcion = $valor; 
	}
    public function set_nivel($valor){
		$this->nivel = $valor; 
	}

	
  
    
public function bitacora1($accion, $modulo,$id){
    $this->bitacora($accion, $modulo,$id);
}




//<!---------------------------------funcion registrar------------------------------------------------------------------>
    public function registrar(){

        $co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            try{
                $r= $co->prepare("Insert into rol_permiso(
						
                    id_rol,
                    id_permiso
                            )
            
                    Values( :id_rol,
                            :id_permiso
                    )"
                );

                $r->bindParam(':id_rol',$this->id);	
                $r->bindParam(':id_permiso',$this->permiso);		
               
            
             
                $r->execute();

                
                    return "Registro Incluido";	
                
            }catch(Exception $e){
                return $e->getMessage();
            }
       
  }



  public function registrar1(){


    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(!$this->existe($this->rol)){
        try{
            $estado=1;
            $r= $co->prepare("Insert into rol(
                    
                nombre,
                descripcion,
                estado
                )
        

                Values(
                    :nombre,
                    :descripcion,
                    :estado
                )");
            $r->bindParam(':nombre',$this->rol);	
            $r->bindParam(':descripcion',$this->descripcion);	
            $r->bindParam(':estado',$estado);	
           
         
            $r->execute();

            $this->bitacora("se registro un rol", "seguridad",$this->nivel);
                return "Registro incluido";	
            
        }catch(Exception $e){
            return $e->getMessage();
        }
            
        }
        else{
            return "rol registrado";
        }









    }


  

 //<!---------------------------------fin de funcion registrar------------------------------------------------------------------>  
        








 






//<!---------------------------------funcion modificar------------------------------------------------------------------>
        public function modificar(){


            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if($this->existe($this->rol)){
                try{
                    $r= $co->prepare("Update rol set 
                            
                       
                        nombre=:nombre,
                        descripcion=:descripcion
                        where
						nombre =:nombre
                        
                
                         
                            
                            
                        ");
   	
                    $r->bindParam(':nombre',$this->rol);	
                    $r->bindParam(':descripcion',$this->descripcion);	
                    
                 
                    $r->execute();
    
                    $this->bitacora("se modifico un rol", "seguridad",$this->nivel);
                        return "Registro modificado";	
                    
                }catch(Exception $e){
                    return $e->getMessage();
                }
                    
                }
                else{
                    return "cedula no registrada";
                }
        

            }
  //<!---------------------------------fin de funcion modificar------------------------------------------------------------------>  




















  //<!---------------------------------funcion consultar------------------------------------------------------------------>          
public function consultar($nivel1){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
			
			
			$resultado = $co->prepare("SELECT * from rol");
			$resultado->execute();
           $respuesta="";

            foreach($resultado as $r){
                $respuesta= $respuesta.'<tr>';
                $respuesta=$respuesta."<th class='ocultar'>".$r['id']."</th>";
                $respuesta=$respuesta."<th>".$r['nombre']."</th>";
                $respuesta=$respuesta."<th>".$r['descripcion']."</th>";  
             
                $respuesta=$respuesta.'<th>';
                if (in_array("modificar seguridad",$nivel1)) {
                $respuesta=$respuesta.'<a href="#editEmployeeModal" class="edit" data-toggle="modal" onclick="modificar(`'.$r['id'].'`)">
               <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
            </a>';
                }
                if (in_array("eliminar seguridad",$nivel1) and $r['id']!= "1" and $r['id']!= "3" and $r['id']!= "19") {
            $respuesta=$respuesta.'<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"  onclick="eliminar(`'.$r['id'].'`)">
               <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
            </a>';
                }
                if (in_array("permisos seguridad",$nivel1)) {
            $respuesta=$respuesta.'<a href="#addEmployeeModal" class="edit" data-toggle="modal"  onclick="permiso(`'.$r['id'].'`)">
               <i class="material-icons" data-toggle="tooltip" title="edit">&#xE872;</i>
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








public function consultar1(){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
			
			
			$resultado = $co->prepare("SELECT p.nombre as permiso FROM rol r 
            INNER JOIN rol_permiso rp ON r.id=rp.id_rol INNER JOIN permisos p ON rp.id_permiso=p.id 
            WHERE r.id = :var
            ORDER BY rp.id_permiso");
            $resultado->bindParam(':var',$this->id);
			$resultado->execute();
        
            $respuesta="";

            foreach($resultado as $r){

                $respuesta= $respuesta.'<tr>';
                
                $respuesta=$respuesta."<th>".$r['permiso']."</th>";
                
             $respuesta= $respuesta.'</tr>';

            }

           
            return $respuesta;
         
							
							


			
			
		}catch(Exception $e){
			
			return false;
		}
}


//<!---------------------------------fin funcion consultar------------------------------------------------------------------>



















//<!---------------------------------funcion existe------------------------------------------------------------------>
    private function existe($cedula){
		
		$co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		try{
			
			
			$resultado = $co->prepare("Select * from rol where nombre=:cedula");
			
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


    private function existe1($cedula){
		
		$co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		try{
			
			
			$resultado = $co->prepare("Select * from rol where id=:cedula");
			
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
//<!---------------------------------fin de funcion existe------------------------------------------------------------------>















public function eliminar1(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    

        try {
                $r=$co->prepare("Delete from rol_permiso 
                    where
                    id_rol = :id_rol
                    ");
                $r->bindParam(':id_rol',$this->id);
                $r->execute();
                return "Registro Eliminado";
                
        } catch(Exception $e) {
            return $e->getMessage();
        }
        
    

   
}






//<!---------------------------------funcion eliminar------------------------------------------------------------------>
public function eliminar(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($this->existe1($this->id)){
    

        try {
                $r=$co->prepare("Delete from rol 
                    where
                    id= :id
                    ");
                $r->bindParam(':id',$this->id);
                $r->execute();
                $this->bitacora("se elimino un rol", "seguridad",$this->nivel);
                return "Registro Eliminado";
                
        } catch(Exception $e) {
            return $e->getMessage();
        }
        
    

    }
    else{
        return "rol no registrado";
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