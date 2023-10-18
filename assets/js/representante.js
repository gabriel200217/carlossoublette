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


    $("#cedula").on("keypress", function(e) {
        validarkeypress(/^[0-9-\b]*$/, e);

    });

    $("#cedula").on("keyup", function() {
        validarkeyup(/^[0-9]{6,10}$/,
        $(this), $("#scedula"), "La Cedula debe ser en el siguiente formato 00000000");
    });

    $("#nombre1").on("keypress", function(e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#nombre1").on("keyup", function() {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#snombre1"), "El formato puede ser A-Z a-z 8-26");
    });

    $("#apellido1").on("keypress", function(e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#apellido1").on("keyup", function() {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#sapellido1"), "El formato puede ser A-Z a-z 8-26");
    });
    
    $("#nombre2").on("keypress", function(e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#nombre2").on("keyup", function() {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#snombre2"), "El formato puede ser A-Z a-z 8-26");
    });


    $("#apellido2").on("keypress", function(e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#apellido2").on("keyup", function() {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#sapellido2"), "El formato puede ser A-Z a-z 8-26");
    });

    $("#telefono").on("keypress", function(e) {
        validarkeypress(/^[0-9-\b]*$/, e);

    });

    $("#telefono").on("keyup", function() {
        validarkeyup(/^[0-9]{11}$/,
        $(this), $("#stelefono"), "El Telefono debe ser en el siguiente formato 00000000000");
    });

    $("#correo").on("keypress", function(e) {
        validarkeypress(/^[0-9A-Za-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1\u0040]$/, e);

    });

    $("#correo").on("keyup", function() {
        validarkeyup(/^[0-9a-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]{4,26}[\u0040]{1}[a-z]{5,7}[\u002E]{1}[a-z]{3}$/,
            $(this), $("#scorreo"), "El formato puede ser A-Z a-z 0-9 ejemplo: nombreUsuari@servidor.dominio");
    });

    $("#contacto_emer").on("keypress", function(e) {
        validarkeypress(/^[0-9-\b]*$/, e);

    });

    $("#contacto_emer").on("keyup", function() {
        validarkeyup(/^[0-9]{11}$/,
        $(this), $("#scontacto_emer"), "El Telefono debe ser en el siguiente formato 00000000000");
    });

/*aqui termina registrar*/










//<!---------------------------------------------------------------------------------------------------------------------------->








/*validaciones para editar*/
$("#cedula1").on("keypress", function(e) {
    validarkeypress(/^[0-9-\b]*$/, e);

});

$("#cedula1").on("keyup", function() {
    validarkeyup(/^[0-9]{6,10}$/,
    $(this), $("#scedula1"), "La Cedula debe ser en el siguiente formato 00000000");
});

$("#nombre11").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z]$/, e);

});

$("#nombre11").on("keyup", function() {
    validarkeyup(/^[A-Za-z]{4,26}$/,
        $(this), $("#snombre11"), "El formato puede ser A-Z a-z 8-26");
});

$("#nombre21").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z]$/, e);

});

$("#nombre21").on("keyup", function() {
    validarkeyup(/^[A-Za-z]{4,26}$/,
        $(this), $("#snombre21"), "El formato puede ser A-Z a-z 8-26");
});

$("#apellido11").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z]$/, e);

});

$("#apellido11").on("keyup", function() {
    validarkeyup(/^[A-Za-z]{4,26}$/,
        $(this), $("#sapellido11"), "El formato puede ser A-Z a-z 8-26");
});

$("#apellido21").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z]$/, e);

});

$("#apellido21").on("keyup", function() {
    validarkeyup(/^[A-Za-z]{4,26}$/,
        $(this), $("#sapellido21"), "El formato puede ser A-Z a-z 8-26");
});

$("#telefono1").on("keypress", function(e) {
    validarkeypress(/^[0-9-\b]*$/, e);

});

$("#telefono1").on("keyup", function() {
    validarkeyup(/^[0-9]{11}$/,
    $(this), $("#stelefono1"), "El Telefono debe ser en el siguiente formato 00000000000");
});

$("#correo1").on("keypress", function(e) {
    validarkeypress(/^[0-9A-Za-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1\u0040]$/, e);

});

$("#correo1").on("keyup", function() {
    validarkeyup(/^[0-9a-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]{4,26}[\u0040]{1}[a-z]{5,7}[\u002E]{1}[a-z]{3}$/,
        $(this), $("#scorreo1"), "El formato puede ser A-Z a-z 0-9 ejemplo: nombreUsuari@servidor.dominio");
});

$("#contacto_emer1").on("keypress", function(e) {
    validarkeypress(/^[0-9-\b]*$/, e);

});

$("#contacto_emer1").on("keyup", function() {
    validarkeyup(/^[0-9]{11}$/,
    $(this), $("#scontacto_emer1"), "El Telefono debe ser en el siguiente formato 00000000000");
});
/*aqui termina editar*/    
});





//<!---------------------------------------------------------------------------------------------------------------------------->





function modificar(id){
    $("#tabla tr").each(function(){
    
        if(id == $(this).find("th:eq(0)").text()){
            $("#cedula1").val($(this).find("th:eq(0)").text());
            $("#nombre11").val($(this).find("th:eq(1)").text());
            $("#nombre21").val($(this).find("th:eq(2)").text());
            $("#apellido11").val($(this).find("th:eq(3)").text());
            $("#apellido21").val($(this).find("th:eq(4)").text());
            $("#telefono1").val($(this).find("th:eq(5)").text());
            $("#correo1").val($(this).find("th:eq(6)").text());
            $("#contacto_emer1").val($(this).find("th:eq(7)").text());
           
            

        };
    });

}

//<!---------------------------------------------------------------------------------------------------------------------------->



    function eliminar(id){
        $("#cedula2").val(id);
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
                 //$("#cedula").val(respuesta);
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
        if (validarkeyup(/^[0-9]{6,10}$/,
        $("#cedula"), $("#scedula"), "La Cedula debe ser en el siguiente formato 00000000") == 0) {
            mensaje("<p>La Cedula debe ser en el siguiente formato 00000000");
            return false;
        } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#nombre1"), $("#snombre1"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-26</p>");
            return false;
    
        } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#apellido1"), $("#sapellido1"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-26</p>");
            return false;
        } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#nombre2"), $("#snombre2"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-26</p>");
            return false;
    
        } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#apellido2"), $("#sapellido2"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-26</p>");
            return false;
        } else if (validarkeyup(/^[0-9]{11}$/,
         $("#telefono"), $("#stelefono"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 00000000</p>");
            return false;
    
        } else if (validarkeyup(/^[0-9a-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]{4,26}[\u0040]{1}[a-z]{5,7}[\u002E]{1}[a-z]{3}$/,
        $("#correo"), $("#scorreo"), "El formato puede ser A-Z a-z 0-9 ejemplo: nombreUsuari+@+servidor+.+dominio") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
        }else if (validarkeyup(/^[0-9]{11}$/,
        $("#contacto_emer"), $("#scontacto_emer"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
        }
        return true;
    }





//<!---------------------------------------------------------------------------------------------------------------------------->




    function validarenvio1() {
        if (validarkeyup(/^[0-9]{6,10}$/,
        $("#cedula1"), $("#scedula1"), "La Cedula debe ser en el siguiente formato 00000000") == 0) {
            mensaje("<p>La Cedula debe ser en el siguiente formato 00000000");
            return false;
        } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#nombre11"), $("#snombre11"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-26</p>");
            return false;
    
        } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#apellido11"), $("#sapellido11"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-26</p>");
            return false;
        } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#nombre21"), $("#snombre21"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-26</p>");
            return false;
    
        } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#apellido21"), $("#sapellido21"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-26</p>");
            return false;
        } else if (validarkeyup(/^[0-9]{11}$/,
         $("#telefono1"), $("#stelefono1"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 00000000</p>");
            return false;
    
        } else if (validarkeyup(/^[0-9a-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]{4,26}[\u0040]{1}[a-z]{5,7}[\u002E]{1}[a-z]{3}$/,
        $("#correo1"), $("#scorreo1"), "El formato puede ser A-Z a-z 0-9 ejemplo: nombreUsuari+@+servidor+.+dominio") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
        }else if (validarkeyup(/^[0-9]{11}$/,
        $("#contacto_emer1"), $("#scontacto_emer1"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
        }
        return true;
    }
//<!---------------------------------------------------------------------------------------------------------------------------->


    
    
    