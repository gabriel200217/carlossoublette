$(document).ready(function() {

    $("#registrar").on("click", function() {
        if (validarenvio()) {
            if($("#contraceña").val()==$("#contraceña1").val()){
                enviaAjax($("#f"));
            }else{
                //mensaje de retorno 
            }
          
        

       }
        

    });

    $("#registrar2").on("click", function() {
        if (validarenvio1()) {
          
            if($("#contraceña2").val()==$("#contraceña3").val()){
             
                enviaAjax($("#f2"));
            }else{
                //mensaje de retorno 
            }

       }
   

    });
    
/*validaciones para registrar*/


    $("#cedula").on("keypress", function(e) {
        validarkeypress(/^[0-9-\b]*$/, e);

    });

    $("#cedula").on("keyup", function() {
        validarkeyup(/^[0-9]{6,10}$/,
        $(this), $("#scedula"), "La Cedula debe ser en el siguiente formato 00000000");
    });

    $("#nombre").on("keypress", function(e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#nombre").on("keyup", function() {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#snombre"), "El formato puede ser A-Z a-z 8-26");
    });


    $("#correo").on("keypress", function(e) {
        validarkeypress(/^[0-9A-Za-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1\u0040]$/, e);

    });

    $("#correo").on("keyup", function() {
        validarkeyup(/^[0-9a-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]{4,26}[\u0040]{1}[a-z]{5,7}[\u002E]{1}[a-z]{3}$/,
            $(this), $("#scorreo"), "El formato puede ser A-Z a-z 0-9 ejemplo: nombreUsuari+@+servidor+.+dominio");
    });

    $("#contraceña").on("keypress", function(e) {
        validarkeypress(/^[0-9A-Za-z\u00f1\u002E\u0040\u00d1\u00E0-\u00FC\u0023\u002A]$/, e);
    });

    $("#contraceña").on("keyup", function() {
        validarkeyup(/^[0-9A-Za-z\b\s\u00f1\u002E\u0040\u00d1\u00E0-\u00FC\u0023\u002A]{8,16}$/,
            $(this), $("#scontraceña"), "la contraseña puede llevar: A-Z a-z (.),(#),(@)(*),  8-16 caracteres");
    });
    $("#contraceña1").on("keypress", function(e) {
        validarkeypress(/^[0-9A-Za-z\u00f1\u002E\u0040\u00d1\u00E0-\u00FC\u0023\u002A]$/, e);
    });

    $("#contraceña1").on("keyup", function() {
        validarkeyup(/^[0-9A-Za-z\b\s\u00f1\u002E\u0040\u00d1\u00E0-\u00FC\u0023\u002A]{8,16}$/,
            $(this), $("#scontraceña1"), "la contraseña puede llevar: A-Z a-z (.),(#),(@)(*),  8-16 caracteres");
    });
    
    

  

/*aqui termina registrar*/

$("#cedula1").on("keypress", function(e) {
    validarkeypress(/^[0-9-\b]*$/, e);

});

$("#cedula1").on("keyup", function() {
    validarkeyup(/^[0-9]{6,10}$/,
    $(this), $("#scedula1"), "La Cedula debe ser en el siguiente formato 00000000");
});

$("#nombre1").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z]$/, e);

});

$("#nombre1").on("keyup", function() {
    validarkeyup(/^[A-Za-z]{4,26}$/,
        $(this), $("#snombre1"), "El formato puede ser A-Z a-z 8-26");
});


$("#correo1").on("keypress", function(e) {
    validarkeypress(/^[0-9A-Za-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1\u0040]$/, e);

});

$("#correo1").on("keyup", function() {
    validarkeyup(/^[0-9a-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]{4,26}[\u0040]{1}[a-z]{5,7}[\u002E]{1}[a-z]{3}$/,
        $(this), $("#scorreo1"), "El formato puede ser A-Z a-z 0-9 ejemplo: nombreUsuari+@+servidor+.+dominio");
});
$("#contraceña2").on("keypress", function(e) {
    validarkeypress(/^[0-9A-Za-z\u00f1\u002E\u0040\u00d1\u00E0-\u00FC\u0023\u002A]$/, e);
});

$("#contraceña2").on("keyup", function() {
    validarkeyup(/^[0-9A-Za-z\b\s\u00f1\u002E\u0040\u00d1\u00E0-\u00FC\u0023\u002A]{8,16}$/,
        $(this), $("#scontraceña2"), "la contraseña puede llevar: A-Z a-z (.),(#),(@)(*),  8-16 caracteres");
});
$("#contraceña3").on("keypress", function(e) {
    validarkeypress(/^[0-9A-Za-z\u00f1\u002E\u0040\u00d1\u00E0-\u00FC\u0023\u002A]$/, e);
});

$("#contraceña3").on("keyup", function() {
    validarkeyup(/^[0-9A-Za-z\b\s\u00f1\u002E\u0040\u00d1\u00E0-\u00FC\u0023\u002A]{8,16}$/,
        $(this), $("#scontraceña3"), "la contraseña puede llevar: A-Z a-z (.),(#),(@)(*),  8-16 caracteres");
});





    
    });
    function modificar(id){
        $("#tabla tr").each(function(){
        
            if(id == $(this).find("th:eq(0)").text()){
                $("#id").val(id);
          
                $("#nombre1").val($(this).find("th:eq(2)").text());
               
                $("#correo1").val($(this).find("th:eq(3)").text());
     
           
                

            }
        });
    
    }

    function eliminar(id){
        $("#id1").val(id);
        $("#borrar").on("click", function(){
           
        enviaAjax($("#f3"));
        });

    }

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

    function enviaAjax2(datos){
    
        $.ajax({
                url: '', 
                type: 'POST',
                data: datos.serialize(),
                beforeSend: function(){
         
                },
                
                success: function(respuesta) {
                    $("#tabla").html("");
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
            }, 5000);
            
    
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


    function validarenvio() {
        if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#nombre"), $("#snombre"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-26</p>");
            return false;
    
        }else if (validarkeyup(/^[0-9a-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]{4,26}[\u0040]{1}[a-z]{5,7}[\u002E]{1}[a-z]{3}$/,
        $("#correo"), $("#scorreo"), "El formato puede ser A-Z a-z 0-9 ejemplo: nombreUsuari+@+servidor+.+dominio") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
        }else if (valRol($('#rol').val(),$("#srol")) == 0) {
            mensaje("<p>Debe de seleccionar un Rol</p>");
            return false;
        } else if (validarkeyup(/^[0-9A-Za-z\b\s\u00f1\u002E\u0040\u00d1\u00E0-\u00FC\u0023\u002A]{8,16}$/,
        $("#contraceña"), $("#scontraceña"), "Solo letras entre 8 y 16 caracteres, numeros, (.),(#),(@)(*)") == 0) {
    mensaje("<p>la contraseña debe tener entre 8 y 16 caracteres</p>");
    return false;

} else if (validarkeyup(/^[0-9A-Za-z\b\s\u00f1\u002E\u0040\u00d1\u00E0-\u00FC\u0023\u002A]{8,16}$/,
        $("#contraceña1"), $("#scontraceña1"), "Solo letras entre 8 y 16 caracteres, numeros, (.),(#),(@)(*)") == 0) {
    mensaje("<p>la contraseña debe tener entre 8 y 16 caracteres</p>");
    return false;
}
        return true;
    }

    function validarenvio1() {
         if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#nombre1"), $("#snombre1"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-26</p>");
            return false;
    
        } else if (validarkeyup(/^[0-9a-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]{4,26}[\u0040]{1}[a-z]{5,7}[\u002E]{1}[a-z]{3}$/,
        $("#correo1"), $("#scorreo1"), "El formato puede ser A-Z a-z 0-9 ejemplo: nombreUsuari+@+servidor+.+dominio") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
        }else if (valRol($('#rol1').val(),$("#srol1")) == 0) {
            mensaje("<p>Debe de seleccionar un Rol</p>");
            return false;
        }
        else if (validarkeyup(/^[0-9A-Za-z\b\s\u00f1\u002E\u0040\u00d1\u00E0-\u00FC\u0023\u002A]{8,16}$/,
        $("#contraceña2"), $("#scontraceña2"), "Solo letras entre 8 y 16 caracteres, numeros, (.),(#),(@)(*)") == 0) {
    mensaje("<p>la contraseña debe tener entre 8 y 16 caracteres</p>");
    return false;

} else if (validarkeyup(/^[0-9A-Za-z\b\s\u00f1\u002E\u0040\u00d1\u00E0-\u00FC\u0023\u002A]{8,16}$/,
        $("#contraceña3"), $("#scontraceña3"), "Solo letras entre 8 y 16 caracteres, numeros, (.),(#),(@)(*)") == 0) {
    mensaje("<p>la contraseña debe tener entre 8 y 16 caracteres</p>");
    return false;
}
        return true;
    }





    
function valRol(rol,srol) {
    

    if (rol != 'seleccionar') {
        
        return true;
    } else {
        srol.text("seleccione un rol")
        setTimeout(function() {
            srol.fadeOut();
        }, 3000);
        return false;
    }



}

