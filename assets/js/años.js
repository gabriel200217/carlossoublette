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
        $(this), $("#sid"), "La Cedula debe ser en el siguiente formato 00000000");
    });

    $("#anos").on("keypress", function(e) {
        validarkeypress(/^[0-9-\b]*$/, e);

    });

    $("#anos").on("keyup", function() {
        validarkeyup(/^[0-9]{1,2}$/,
            $(this), $("#sanos"), "Los años debe ser solamente numeros");
    });

    $("#turnos").on("keypress", function(e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#turnos").on("keyup", function() {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#sturnos"), "El formato puede ser A-Z a-z");
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

$("#anos1").on("keypress", function(e) {
    validarkeypress(/^[0-9-\b]*$/, e);

});

$("#anos1").on("keyup", function() {
    validarkeyup(/^[0-9]{1,2}$/,
        $(this), $("#sanos1"), "Los años debe ser solamente numeros");
});


$("#turnos1").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z]$/, e);

});

$("#turnos1").on("keyup", function() {
    validarkeyup(/^[A-Za-z]{4,26}$/,
        $(this), $("#sturnos1"), "El formato puede ser A-Z a-z");
});

/*aqui termina editar*/    
});





//<!---------------------------------------------------------------------------------------------------------------------------->





    function modificar(id){
        $("#tabla tr").each(function(){
        
            if(id == $(this).find("th:eq(0)").text()){
                $("#id1").val($(this).find("th:eq(0)").text());
                $("#anos1").val($(this).find("th:eq(1)").text());
                $("#turnos1").val($(this).find("th:eq(2)").text());
               
                

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
                 alert(respuesta);
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
        if (validarkeyup(/^[0-9]{1,2}$/,
        $("#anos"), $("#sanos"), "Los años debe ser solamente numeros") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
    
        } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#turnos"), $("#sturnos"), "El formato puede ser A-Z a-z") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z</p>");
            return false;
        }
        return true;
    }





//<!---------------------------------------------------------------------------------------------------------------------------->




    function validarenvio1() {
        if (validarkeyup(/^[0-9]{1,2}$/,
        $("#anos1"), $("#sanos1"), "Los años debe ser solamente numeros") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
    
        } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#turnos1"), $("#sturnos1"), "El formato puede ser A-Z a-z") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z</p>");
            return false;
        }
        return true;
    }
//<!---------------------------------------------------------------------------------------------------------------------------->


    
    
    