$(document).ready(function() {

    console.log(location.href);

    $('#ano').select2({
    dropdownParent: $('#addEmployeeModal')
  });
    $('#secciones').select2({
    dropdownParent: $('#addEmployeeModal')
  });
    $('#cedula_profesor').select2({
    dropdownParent: $('#addEmployeeModal')
  });
    $('#ano_academico').select2({
    dropdownParent: $('#addEmployeeModal')
  });




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


    $("#cantidad").on("keypress", function(e) {
        validarkeypress(/^[0-9]$/, e);

    });

    $("#cantidad").on("keyup", function() {
        validarkeyup(/^[0-9]{2,5}$/,
            $(this), $("#scantidad"), "El formato puede ser 0-9");
    });
    
/*aqui termina registrar*/










//<!---------------------------------------------------------------------------------------------------------------------------->




/*validaciones para editar*/
$("#id1").on("keypress", function(e) {
    validarkeypress(/^[0-9-\b]*$/, e);

});

$("#id1").on("keyup", function() {
    validarkeyup(/^[0-9]{6,10}$/,
    $(this), $("#sid1"), "El Id debe ser en el siguiente formato 00000000");
});


$("#cantidad1").on("keypress", function(e) {
    validarkeypress(/^[0-9]$/, e);

});

$("#cantidad1").on("keyup", function() {
    validarkeyup(/^[0-9]{2,5}$/,
        $(this), $("#scantidad1"), "El formato puede ser 0-9");
});

/*aqui termina editar*/    
});





//<!---------------------------------------------------------------------------------------------------------------------------->





    function modificar(id){
        $("#tabla tr").each(function(){
        
            if(id == $(this).find("th:eq(0)").text()){
                $("#id1").val($(this).find("th:eq(0)").text());
                $("#cantidad1").val($(this).find("th:eq(3)").text());
               
                

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


    function añadir1(valor){
        if (valor=='#secciones') {
            $('#secciones').prepend($(valor).val());
        }else{
            $('#secciones').append($(valor).val()); 
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

     function añadir4(valor){
        if (valor=='#ano_academico') {
            $('#ano_academico').prepend($(valor).val());
        }else{
            $('#ano-academico').append($(valor).val()); 
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

        if (validarkeyup(/^[0-9]{2,5}$/,
        $("#cantidad"), $("#scantidad"), "El formato puede ser 0-9") == 0) {
            mensaje("<p>El formato puede ser 0-9</p>");
            return false;
        }
        return true;
    }





//<!---------------------------------------------------------------------------------------------------------------------------->




    function validarenvio1() {

        if (validarkeyup(/^[0-9]{2,5}$/,
        $("#cantidad1"), $("#scantidad1"), "El formato puede ser 0-9") == 0) {
            mensaje("<p>El formato puede ser 0-9</p>");
            return false;
        }
        return true;
    }
//<!---------------------------------------------------------------------------------------------------------------------------->


    
    
    