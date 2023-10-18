<?php

require_once('modelo/conexion.php');
class pagos extends datos{

    
    private $id;
	private $id_deudas;
	private $identificador;
    private $concepto;
    private $forma;
	private $fecha;
	private $estado;
    private $meses;
    private $nivel;

	


    public function set_id($valor){
		$this->id = $valor; 
	}
	public function set_id_deudas($valor){
		$this->id_deudas = $valor; 
	}
	public function set_identificador($valor){
		$this->identificador = $valor; 
	}
    public function set_concepto($valor){
		$this->concepto = $valor; 
	}
    public function set_forma($valor){
		$this->forma = $valor; 
	}  
	public function set_fecha($valor){
		$this->fecha = $valor; 
	}
	public function set_estado($valor){
		$this->estado = $valor; 
	} 
    public function set_meses($valor){
		$this->meses = $valor; 
	}
    public function set_nivel($valor){
		$this->nivel = $valor; 
	}





    public function registrar(){
       $VAL= $this->registrar1();
       echo $VAL;
    }

    public function registrarr(){
        $VAL=  $this->registrarr1();
        echo $VAL;
    }

    public function modificar(){
        $VAL=  $this->modificar1();
        echo $VAL;
    }

    public function eliminar(){
        $VAL= $this->eliminar1();
        echo $VAL;
    }









	
  //<!---------------------------------fin funcion registrar------------------------------------------------------------------> 
    private function registrar1(){


        $co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(!$this->existe($this->id)){
            try{

                
                $r= $co->prepare("INSERT INTO pagos( id, id_deudas, identificador, concepto, forma, fecha,meses, estado, estado_pagos,estatus )
                                             VALUES(:id,:id_deudas,:identificador,:concepto, :forma, :fecha, :meses, :estado ,:estado_pagos,:estatus)");
                $estado_pagos=1;
                $estatus=1;
                $r->bindParam(':id',$this->id);	
                $r->bindParam(':id_deudas',$this->id_deudas);	
                $r->bindParam(':identificador',$this->identificador);	
                $r->bindParam(':concepto',$this->concepto);	
                $r->bindParam(':forma',$this->forma);	
                $r->bindParam(':fecha',$this->fecha);	
                $r->bindParam(':meses',$this->meses);	
                $r->bindParam(':estado',$this->estado);
                $r->bindParam(':estado_pagos',$estado_pagos);	
                $r->bindParam(':estatus',$estatus);	
                $r->execute();
                
                
                $r= $co->prepare("UPDATE deudas d SET d.fecha = :fecha WHERE d.id = :id_deudas");
                $r->bindParam(':fecha',$this->fecha);	
                $r->bindParam(':id_deudas',$this->id_deudas);
                $r->execute();

                $r= $co->prepare("UPDATE deudas d SET d.estado_deudas = 0 WHERE d.id = :id_deudas AND d.concepto = 'inscripcion'");  
                $r->bindParam(':id_deudas',$this->id_deudas);	                
                $r->execute();

                $r= $co->prepare("UPDATE deudas d SET d.estado_deudas = 0 WHERE d.id = :id_deudas AND d.fecha >= CURRENT_DATE()");  
                
                $r->bindParam(':id_deudas',$this->id_deudas);	                
                $r->execute();
              




                $this->bitacora("se registro un pago", "docentes",$this->nivel);

                    return "Registro incluido";	
                
            }catch(Exception $e){
                return $e->getMessage();
            }
                
            }
            else{
                return "cedula registrada";
            }
    


        }
  //<!---------------------------------fin funcion registrar------------------------------------------------------------------> 
            


  //<!---------------------------------fin funcion registrar------------------------------------------------------------------>  
        private function registrarr1(){


            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if(!$this->existe($this->id)){
                try{

                    $r= $co->prepare("INSERT INTO pagos( id, id_deudas, identificador,concepto, forma, fecha, meses,estado, estado_pagos, estatus)
                                                 VALUES(:idr,:id_deudasr,:identificadorr,:conceptor, :formar, :fechar, :mesesr, :estador,:estado_pagosr,:estatusr )");
    
                    $estado_pagos=1;
                    $estatus=1;
                    $r->bindParam(':idr',$this->id);	
                    $r->bindParam(':id_deudasr',$this->id_deudas);	
                    $r->bindParam(':identificadorr',$this->identificador);	
                    $r->bindParam(':conceptor',$this->concepto);
                    $r->bindParam(':formar',$this->forma);	
                    $r->bindParam(':fechar',$this->fecha);
                    $r->bindParam(':mesesr',$this->meses);		
                    $r->bindParam(':estador',$this->estado);	
                    $r->bindParam(':estado_pagosr',$estado_pagos);	
                    $r->bindParam(':estatusr',$estatus);	
                    $r->execute();
                   
          
                    $r= $co->prepare("UPDATE deudas d SET d.fecha = :fecha WHERE d.id = :id_deudasr");
                    $r->bindParam(':fechar',$this->fecha);	
                    $r->bindParam(':id_deudasr',$this->id_deudas);
                    $r->execute();
    
                    $r= $co->prepare("UPDATE deudas d SET d.estado_deudas = 0 WHERE d.id = :id_deudas AND d.concepto = 'inscripcion'");  
                    $r->bindParam(':id_deudasr',$this->id_deudas);	                
                    $r->execute();
    
                    $r= $co->prepare("UPDATE deudas d SET d.estado_deudas = 0 WHERE d.id = :id_deudasr AND d.fecha >= CURRENT_DATE()");  
                    
                    $r->bindParam(':id_deudasr',$this->id_deudas);	                
                    $r->execute();
    
                    $this->bitacora("se registro un pago", "docentes",$this->nivel);
                        return "Registro incluido";	
                    
                }catch(Exception $e){
                    return $e->getMessage();
                }
                    
                }
                else{
                    return "cedula registrada";
                }

            }
//<!---------------------------------fin funcion consultar------------------------------------------------------------------>




   





//<!---------------------------------funcion modificar------------------------------------------------------------------>
private function modificar1(){


    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($this->existe($this->id)){
        try{
            $r= $co->prepare("UPDATE pagos SET 
                    

                id_deudas=:id_deudas,
                identificador=:identificador,
                concepto=:concepto,
                forma=:forma,
                fecha=:fecha,
                meses=:meses,
                estado=:estado,     
                estado_pagos=:estado_pagos            
                WHERE
                id=:id
                  
                    
                ");
                $r->bindParam(':id',$this->id);	
                $r->bindParam(':id_deudas',$this->id_deudas);	
                $r->bindParam(':identificador',$this->identificador);	
                $r->bindParam(':concepto',$this->concepto);	
                $r->bindParam(':forma',$this->forma);	
                $r->bindParam(':fecha',$this->fecha);	
                $r->bindParam(':meses',$this->meses);	
                $r->bindParam(':estado',$this->estado);	
                $r->bindParam(':estado_pagos',$this->estado_pagos  );



            $r->execute();
   

            $this->bitacora("se modifico un pago", "docentes",$this->nivel);
         
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
			$resultado = $co->prepare("SELECT p.*, e.nombre, e.cedula FROM pagos p, deudas d,estudiantes e WHERE p.id_deudas = d.id  AND d.id_estudiante = e.cedula  AND p.estatus=1");
			$resultado->execute();
        

     
           $respuesta="";
            foreach($resultado as $r){
                $respuesta= $respuesta.'<tr>';
                $respuesta=$respuesta."<th>".$r['id']."</th>";
                $respuesta=$respuesta."<th>".$r['id_deudas']."</th>";             
                $respuesta=$respuesta."<th>".$r['identificador']."</th>";               
                $respuesta=$respuesta."<th>".$r['concepto']."</th>"; 
                $respuesta=$respuesta."<th>".$r['forma']."</th>";
                $respuesta=$respuesta."<th>".$r['fecha']."</th>";             
                $respuesta=$respuesta."<th>".$r['meses']."</th>";
                $respuesta=$respuesta."<th>".$r['cedula']."</th>";  
                $respuesta=$respuesta."<th>".$r['nombre']."</th>";                      
                $respuesta=$respuesta."<th>".$r['estado']."</th>";        
                
                $respuesta=$respuesta.'<th> ';
                if (in_array("modificar pagos",$nivel1)) {
                $respuesta=$respuesta.'<a href="#editpago" class="edit" data-toggle="modal" onclick="modificar(`'.$r['id'].'`)">
               <i class="material-icons"  title="MODIFICAR"><img src="assets/icon/pencill.png"/></i>
            </a>';
                  }  if (in_array("eliminar pagos",$nivel1)) {
            $respuesta=$respuesta.'<a href="#deletepago" class="delete" data-toggle="modal"  onclick="eliminar(`'.$r['id'].'`)">
               <i class="material-icons"  title="BORRAR"><img src="assets/icon/trashh.png"/></i>               
            </a>  ';
                  }
            $respuesta=$respuesta.' </th>';
             $respuesta= $respuesta.'</tr>';
            }          
            return $respuesta;			
		}catch(Exception $e){
			return false;
		}
}
//<!---------------------------------fin funcion consultar------------------------------------------------------------------>










//<!---------------------------------fin funcion consultar------------------------------------------------------------------>
public function consultar2(){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
			
			
            $resultado = $co->prepare("SELECT * from deudas WHERE estado_deudas = 1");
			$resultado->execute();
           $respuesta="";
           $respuesta2="";
           $respuesta2 =$respuesta2.'<option value="seleccionar" selected hidden>-Seleccionar-</option>';

            foreach($resultado as $r){
                $respuesta2 =$respuesta2.'<option value="'.$r['id'].'"  >'.$r['id_estudiante'].' / - Bs - '.$r['monto'].'</option>';   
                $respuesta= $respuesta.'<tr>';
                $respuesta=$respuesta."<th>".$r['id']."</th>";
                $respuesta=$respuesta."<th>".$r['id_estudiante']."</th>";
                $respuesta=$respuesta."<th>".$r['monto']."</th>";
                $respuesta=$respuesta."<th>".$r['concepto']."</th>";
                $respuesta=$respuesta."<th>".$r['fecha']."</th>";
                $respuesta=$respuesta."<th>".$r['estado']."</th>";
                $respuesta=$respuesta."<th>".$r['estado_deudas']."</th>";
               

               
             $respuesta= $respuesta.'</tr>';

            }

            $fila= array($respuesta,$respuesta2);

           
            return $fila;
			
		}catch(Exception $e){
			
			return false;
		}
}
//<!---------------------------------fin funcion consultar------------------------------------------------------------------>











//<!---------------------------------fin funcion consultar- representantes----------------------------------------------------------------->
public function consultarr(){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
			
			
            $resultado = $co->prepare("SELECT * from deudas WHERE estado_deudas = 1");
			$resultado->execute();
           $respuesta="";
           $respuesta2="";
           $respuesta2 =$respuesta2.'<option value="seleccionar" selected hidden>-Seleccionar-</option>';

            foreach($resultado as $r){
                $respuesta2 =$respuesta2.'<option value="'.$r['id'].'"  >'.$r['id_estudiante'].' / - Bs - '.$r['monto'].'</option>';   
                $respuesta= $respuesta.'<tr>';
                $respuesta=$respuesta."<th>".$r['id']."</th>";
                $respuesta=$respuesta."<th>".$r['id_estudiante']."</th>";
                $respuesta=$respuesta."<th>".$r['monto']."</th>";
                $respuesta=$respuesta."<th>".$r['concepto']."</th>";
                $respuesta=$respuesta."<th>".$r['fecha']."</th>";
                $respuesta=$respuesta."<th>".$r['estado']."</th>";
                $respuesta=$respuesta."<th>".$r['estado_deudas']."</th>";
               
             $respuesta= $respuesta.'</tr>';

            }

            $fila= array($respuesta,$respuesta2);

           
            return $fila;
			
		}catch(Exception $e){
			
			return false;
		}
}

//<!---------------------------------fin funcion consultar------------------------------------------------------------------>







//<!----------------------------------------------existe------------------------------------------------------------------>
    private function existe($id){		
		$co = $this->conecta();		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		try{
			$resultado = $co->prepare("Select * from pagos where id=:id");			
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
//<!----------------------------------------------existe------------------------------------------------------------------>







//<!---------------------------------funcion eliminar------------------------------------------------------------------>
private function eliminar1(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($this->existe($this->id)){
    

        try {
                $r=$co->prepare("UPDATE pagos SET estatus = 0 WHERE id=:id");
                $r->bindParam(':id',$this->id);
                $r->execute();$r->execute();
                $this->bitacora("se elimino un pago", "docentes",$this->nivel);
                return "Registro Eliminado";
                
        } catch(Exception $e) {
            return $e->getMessage();
        }
        
    

    }
    else{
        return "ID no registrada";
    }
}
//<!---------------------------------Fin de funcion eliminar------------------------------------------------------------------>











//<!----------------------------------------------bitacora------------------------------------------------------------------>
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
//<!----------------------------------------------bitacora------------------------------------------------------------------>
    }
?>