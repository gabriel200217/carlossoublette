$(document).ready(function() { 
    
    
    console.log(location.href);
    

  $('#ano').select2({
    dropdownParent: $('#addEmployeeModal')
  });
  $('#clase').select2({
    dropdownParent: $('#addEmployeeModal')
  });
  $('#cedula_profesor').select2({
    dropdownParent: $('#addEmployeeModal')
  });
  
  







    $("#registrar").on("click", function() {
        
          
            enviaAjax($("#f"));
            $('#addEmployeeModal').modal('hide');
         
            $('#f').trigger('reset');
       
        

    });

    $("#registrar2").on("click", function() {
        
          
            enviaAjax($("#f2"));
       
            $('#editEmployeeModal').modal('hide');
            
       
   

    });
    
    


//<!---------------------------------------------------------------------------------------------------------------------------->













//<!---------------------------------------------------------------------------------------------------------------------------->











});





//<!---------------------------------------------------------------------------------------------------------------------------->





    function modificar(id){
        $("#tabla tr").each(function(){
        
            if(id == $(this).find("th:eq(0)").text()){
                $("#id").val($(this).find("th:eq(0)").text());
                $("#dia1").val($(this).find("th:eq(4)").text());
                $("#clase_inicia1").val($(this).find("th:eq(5)").text());
                $("#clase_termina1").val($(this).find("th:eq(6)").text());
                $("#inicio1").val($(this).find("th:eq(7)").text());
                $("#fin1").val($(this).find("th:eq(8)").text());
               
                

            }
        });
    
    }

//<!---------------------------------------------------------------------------------------------------------------------------->



    function eliminar(id){
        $("#id1").val(id);
        $("#borrar").on("click", function(){
           
        enviaAjax($("#f3"));
        });

    }

    function añadir(valor){
        if (valor=='#clase') {
            $('#clase').prepend($(valor).val());
        }else{
            $('#clase').append($(valor).val()); 
        }
        
       


    }


    function añadir2(valor){
        if (valor=='#ano') {
            $('#ano').prepend($(valor).val());
        }else{
            $('#ano').append($(valor).val()); 
        }
        
       


    }

    function añadir3(valor){
        if (valor=='#cedula_profesor') {
            $('#cedula_profesor').prepend($(valor).val());
        }else{
            $('#cedula_profesor').append($(valor).val()); 
        }
        
       


    }
    

//<!---------------------------------------------------------------------------------------------------------------------------->


    function enviaAjax(datos){
    
        $.ajax({
                url: '', 
                type: 'POST',
                data: datos.serialize(),
                beforeSend: function(){
         
                },
                
                success: function(respuesta) {
                 alert(respuesta);
                 $("#consulta").val("consulta");
                 enviaAjax2($("#f4"));
                window.location.reload();
                },
                error: function(request, status, err){
                    if (status == "timeout") {
                        mensaje("Servidor ocupado, intente de nuevo");
                    } else {
                        mensaje("ERROR: <br/>" + request + status + err);
                    }
                },
                complete: function(){
                    
                }
                
        });
        
    }


//<!---------------------------------------------------------------------------------------------------------------------------->




    function enviaAjax2(datos){
    
        $.ajax({
                url: '', 
                type: 'POST',
                data: datos.serialize(),
                beforeSend: function(){
         
                },
                
                success: function(respuesta) {
                 $("#tabla").html(respuesta);
                   
                },
                error: function(request, status, err){
                    if (status == "timeout") {
                        mensaje("Servidor ocupado, intente de nuevo");
                    } else {
                        mensaje("ERROR: <br/>" + request + status + err);
                    }
                },
                complete: function(){
                    
                }
                
        });
        
    }



//<!---------------------------------------------------------------------------------------------------------------------------->






    function validarkeyup(er, etiqueta, etiquetamensaje,
        mensaje) {
        a = er.test(etiqueta.val());
        if (a) {
            etiquetamensaje.text("");
            return 1;
        } else {
            etiquetamensaje.text(mensaje);
            setTimeout(function() {
                etiquetamensaje.text("");
            }, 2000);
            
    
            return 0;
        }
    }
    
    function validarkeypress(er, e) {
    
        key = e.keyCode;
    
    
        tecla = String.fromCharCode(key);
    
    
        a = er.test(tecla);
    
        if (!a) {
    
            e.preventDefault();
        }
    
    
    }






//<!---------------------------------------------------------------------------------------------------------------------------->





   





//<!---------------------------------------------------------------------------------------------------------------------------->




   
//<!---------------------------------------------------------------------------------------------------------------------------->


    
    
    