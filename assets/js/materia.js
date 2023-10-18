$(document).ready(function() {


    $("#registrar").on("click", function() {
        if (validarenvio()) {   enviaAjax($("#f")); }
    });

    //editar
    $("#editar").on("click", function() {
        if (validarenvio1()) {   enviaAjax($("#f2"));  }
    });
    


//<!---------------------------------------------------------------------------------------------------------------------------->

/*validaciones para registrar*/

    // $("#id").on("keypress", function(e) {
    //     validarkeypress(/^[0-9-\b]*$/, e);

    // });
    // $("#id").on("keyup", function() {
    //     validarkeyup(/^[0-9]{6,10}$/,
    //     $(this), $("#id_v"), "La Cedula debe ser en el siguiente formato 00000000");
    // });
  

    


    $("#nombre").on("keypress", function(e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });
    $("#nombre").on("keyup", function() {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#nombre_v"), "El formato puede ser A-Z a-z");
    });

   
    
/*aqui termina registrar*/

//<!---------------------------------------------------------------------------------------------------------------------------->




/*validaciones para editar*/
$("#nombre1").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z]$/, e);

});
$("#nombre1").on("keyup", function() {
    validarkeyup(/^[A-Za-z]{4,26}$/,  $(this), $("#nombre1_v"), "El formato puede ser A-Z a-z");
});


/*aqui termina editar*/    


});



//<!---------------------------------------------------------------------------------------------------------------------------->





    function modificar(id){
        $("#tabla tr").each(function(){
        
            if(id == $(this).find("th:eq(1)").text()){
                $("#id1").val($(this).find("th:eq(1)").text());
                $("#nombre1").val($(this).find("th:eq(2)").text());
               

            }
        });
    
    }

//<!---------------------------------------------------------------------------------------------------------------------------->

function eliminar(id){
    $("#id2").val(id);
    $("#borrar").on("click", () => {
            
         enviaAjax($("#f3"));
        });
}
    // $("#borrar").on("click", function eliminar(id) {
    //     $("#id2").val(id);
    //         enviaAjax($("#f3"));
    // });
    


//<!---------------------------------------------------------------------------------------------------------------------------->
    

    function enviaAjax(datos){
    
        $.ajax({
                url: '', 
                type: 'POST',
                data: datos.serialize(),
                beforeSend: function(){
         
                },
                
                success: (respuesta) => {
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
          
        if (validarkeyup(/^[A-Za-z]{4,20}$/,
        $("#nombre"), $("#nombre_v"), "El formato puede ser A-Z a-z") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z</p>");
            return false;
        }
        
        return true;
    }





//<!---------------------------------------------------------------------------------------------------------------------------->


    function validarenvio1() {
        
         if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#nombre1"), $("#nombre1_v"), "El formato puede ser A-Z a-z") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z</p>");
            return false;
        }
        
        return true;
    }
//<!---------------------------------------------------------------------------------------------------------------------------->

