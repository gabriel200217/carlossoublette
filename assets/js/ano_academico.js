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
            $('#f2').trigger('reset');

       }
   

    });
    


//<!---------------------------------------------------------------------------------------------------------------------------->



/*validaciones para registrar*/


    $("#id").on("keypress", function(e) {
        validarkeypress(/^[0-9-\b]*$/, e);

    });

    $("#id").on("keyup", function() {
        validarkeyup(/^[0-9]{6,10}$/,
        $(this), $("#sid"), "El Id debe ser en el siguiente formato 00000000");
    });

    $("#lapso").on("keypress", function(e) {
        validarkeypress(/^[0-9A-Za-z\u002D\u002A\u002E\u00F1\u00D1\u00D1\u00F1\u0040]$/, e);

    });

    $("#lapso").on("keyup", function() {
        validarkeyup(/^[0-9A-Za-z\u002D\u002A\u002E\u00F1\u00D1\u00D1\u00F1\u0040]{4,26}$/,
            $(this), $("#slapso"), "Los años debe ser solamente numeros");
    });

    $("#ano_academico").on("keypress", function(e) {
        validarkeypress(/^[0-9\u002D\u002A\u002E\u00F1\u00D1\u00D1\u00F1\u0040]$/, e);

    });

    $("#ano_academico").on("keyup", function() {
        validarkeyup(/^[0-9]{4}[\u002D]{1}[0-9]{4}$/,
            $(this), $("#sano_academico"), "Los años debe ser solamente numeros");
    });
    
/*aqui termina registrar*/










//<!---------------------------------------------------------------------------------------------------------------------------->




/*validaciones para editar*/
$("#id1").on("keypress", function(e) {
    validarkeypress(/^[0-9-\b]*$/, e);

});

$("#id1").on("keyup", function() {
    validarkeyup(/^[0-9]{6,10}$/,
    $(this), $("#sid1"), "La Cedula debe ser en el siguiente formato 00000000");
});

$("#lapso1").on("keypress", function(e) {
        validarkeypress(/^[0-9A-Za-z\u002D\u002A\u002E\u00F1\u00D1\u00D1\u00F1\u0040]$/, e);

});

$("#lapso1").on("keyup", function() {
        validarkeyup(/^[0-9A-Za-z\u002D\u002A\u002E\u00F1\u00D1\u00D1\u00F1\u0040]{4,26}$/,
            $(this), $("#slapso1"), "Los años debe ser solamente numeros");
});

$("#ano_academico1").on("keypress", function(e) {
    validarkeypress(/^[0-9\u002D\u002A\u002E\u00F1\u00D1\u00D1\u00F1\u0040]$/, e);
});

$("#ano academico1").on("keyup", function() {
     validarkeyup(/^[0-9]{4}[\u002D]{1}[0-9]{4}$/,
        $(this), $("#sano_academico1"), "Los años debe ser solamente numeros");
});

/*aqui termina editar*/    
});





//<!---------------------------------------------------------------------------------------------------------------------------->





    function modificar(id){
        $("#tabla tr").each(function(){
        
            if(id == $(this).find("th:eq(0)").text()){
                $("#id1").val($(this).find("th:eq(0)").text());
                $("#fecha_ini1").val($(this).find("th:eq(1)").text());
                $("#fecha_cierr1").val($(this).find("th:eq(2)").text());
                $("#lapso1").val($(this).find("th:eq(3)").text());
                $("#ano_academico1").val($(this).find("th:eq(4)").text());
               
                

            }
        });
    
    }

//<!---------------------------------------------------------------------------------------------------------------------------->



    function eliminar(id){
        $("#id2").val(id);
        $("#borrar").on("click", function(){
           
        enviaAjax($("#f3"));
        $('#deleteEmployeeModal').modal('hide');
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
                 //$("#id").val(respuesta);
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
        if (validarkeyup(/^[0-9]{4}[\u002D]{1}[0-9]{4}$/,
        $("#ano_academico"), $("#sano_academico"), "Los años debe ser solamente numeros") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000</p>");
            return false;
    
        } else if (validarkeyup(/^[0-9A-Za-z\u002D\u002A\u002E\u00F1\u00D1\u00D1\u00F1\u0040]{4,10}$/,
        $("#lapso"), $("#slapso"), "Los años debe ser solamente numeros") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
    
        }

        return true; 
    }





//<!---------------------------------------------------------------------------------------------------------------------------->




    function validarenvio1() {
        if (validarkeyup(/^[0-9]{4}[\u002D]{1}[0-9]{4}$/,
        $("#ano_academico1"), $("#sano_academico1"), "Los años debe ser solamente numeros") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000</p>");
            return false;
    
        } else if (validarkeyup(/^[0-9A-Za-z\u002D\u002A\u002E\u00F1\u00D1\u00D1\u00F1\u0040]{4,10}$/,
        $("#lapso1"), $("#slapso1"), "Los años debe ser solamente numeros") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
    
        }
        
        return true;
    }
//<!---------------------------------------------------------------------------------------------------------------------------->


    
    
    