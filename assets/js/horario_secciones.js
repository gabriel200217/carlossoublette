$(document).ready(function() { 






    $("#registrar").on("click", function() {
        if (validarenvio()) {
          
            enviaAjax($("#f"));
            $('#addEmployeeModal').modal('hide');
            $('#f').trigger('reset');
       }
        

    });

    $("#registrar2").on("click", function() {
        if (validarenvio1()) {
          
            enviaAjax($("#f2"));
            $('#editEmployeeModal').modal('hide');
       }
   

    });
    


//<!---------------------------------------------------------------------------------------------------------------------------->



/*validaciones para registrar*/


    $("#clase").on("keypress", function(e) {
        validarkeypress(/^[A-Za-z0-9-\b]*$/, e);

    });

    $("#clase").on("keyup", function() {
        validarkeyup(/^[A-Za-z0-9]{2,50}$/,
        $(this), $("#sclase"), "La clase debe contener almenos 2 caracters");
    });

    $("#cedula_profesor").on("keypress", function(e) {
        validarkeypress(/^[0-9]$/, e);

    });

    $("#cedula_profesor").on("keyup", function() {
        validarkeyup(/^[0-9]{8,9}$/,
            $(this), $("#scedula_profesor"), "El formato puede ser 00000000");
    });

    $("#seccion").on("keypress", function(e) {
        validarkeypress(/^[A-Za-z0-9]$/, e);

    });

    $("#seccion").on("keyup", function() {
        validarkeyup(/^[A-Za-z0-9]{2,50}$/,
            $(this), $("#sseccion"), "El formato debe tener al menos 2 caracteres");
    });
   

   

/*aqui termina registrar*/










//<!---------------------------------------------------------------------------------------------------------------------------->










/*validaciones para editar*/
$("#clase1").on("keypress", function(e) {
    validarkeypress(/^[0-9A-Za-z\b]*$/, e);

});

$("#clase1").on("keyup", function() {
    validarkeyup(/^[A-Za-z0-9]{6,10}$/,
    $(this), $("#sclase1"), "La clase debe ser en el siguiente formato 00000000");
});

$("#cedula_profesor1").on("keypress", function(e) {
    validarkeypress(/^[0-9]$/, e);

});

$("#cedula_profesor1").on("keyup", function() {
    validarkeyup(/^[0-9]{4,26}$/,
        $(this), $("#scedula_profesor1"), "El formato puede ser A-Z a-z 8-26");
});



$("#seccion1").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z0-9]$/, e);

});

$("#seccion1").on("keyup", function() {
    validarkeyup(/^[A-Za-z0-9]{4,26}$/,
        $(this), $("#sseccion1"), "El formato puede ser A-Z a-z 8-26");
});




/*aqui termina editar*/    
});





//<!---------------------------------------------------------------------------------------------------------------------------->





    function modificar(id){
        $("#tabla tr").each(function(){
        
            if(id == $(this).find("th:eq(0)").text()){
                $("#id").val($(this).find("th:eq(0)").text());
                
                $("#clase1").val($(this).find("th:eq(1)").text());
                $("#cedula_profesor1").val($(this).find("th:eq(2)").text());
                $("#seccion1").val($(this).find("th:eq(3)").text());
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




//<!---------------------------------------------------------------------------------------------------------------------------->


    function enviaAjax(datos){
    
        $.ajax({
                url: '', 
                type: 'POST',
                data: datos.serialize(),
                beforeSend: function(){
         
                },
                
                success: function(respuesta) {
                 //$("#clase").val(respuesta);
                 $("#consulta").val("consulta");
                 enviaAjax2($("#f4"));
                   
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





    function validarenvio() {
        if (validarkeyup(/^[A-Za-z0-9]{2,50}$/,
        $("#clase"), $("#sclase"), "La clase debe tener al menos 2 caracteres") == 0) {
            mensaje("<p>La clase debe tener al menos 2 caracters");
            return false;
        } else if (validarkeyup(/^[0-9]{8,9}$/,
        $("#cedula_profesor"), $("#scedula_profesor"), "El formato debe ser 00000000") == 0) {
            mensaje("<p>El formato debe ser 00000000</p>");
            return false;
    
        } else if (validarkeyup(/^[A-Za-z0-9]{2,50}$/,
        $("#seccion"), $("#sseccion"), "El formato puede ser A-Z a-z 2-50") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 2-50</p>");
            return false;
        }
        
        return true;
    }





//<!---------------------------------------------------------------------------------------------------------------------------->




    function validarenvio1() {
        if (validarkeyup(/^[A-Za-z0-90-9]{2,50}$/,
        $("#clase1"), $("#sclase1"), "La clase debe ser en el siguiente formato 00000000") == 0) {
            mensaje("<p>La clase debe ser en el siguiente formato 00000000");
            return false;
        } else if (validarkeyup(/^[0-9]{8,9}$/,
        $("#cedula_profesor1"), $("#scedula_profesor1"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-26</p>");
            return false;
    
        } else if (validarkeyup(/^[A-Za-z0-9A-Za-z]{2,50}$/,
        $("#seccion1"), $("#sseccion1"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-26</p>");
            return false;
        } 
        return true;
    }
//<!---------------------------------------------------------------------------------------------------------------------------->


    
    
    