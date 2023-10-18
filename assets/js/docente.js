$(document).ready(function() {

    $("#registrar").on("click", function() {
        if (validarenvio()) {
          
            enviaAjax($("#f"));

       }
        

    });

    $("#registrar2").on("click", function() {
        if (validarenvio1()) {
          
            enviaAjax($("#f2"));

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

    $("#apellido").on("keypress", function(e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#apellido").on("keyup", function() {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#sapellido"), "El formato puede ser A-Z a-z 8-26");
    });

    $("#categoria").on("keypress", function(e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#categoria").on("keyup", function() {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#scategoria"), "El formato puede ser A-Z a-z 8-26");
    });

    $("#especializacion").on("keypress", function(e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#especializacion").on("keyup", function() {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#sespecializacion"), "El formato puede ser A-Z a-z 8-26");
    });

    $("#profecion").on("keypress", function(e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#profecion").on("keyup", function() {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#sprofecion"), "El formato puede ser A-Z a-z 8-26");
    });

    $("#edad").on("keypress", function(e) {
        validarkeypress(/^[0-9-\b]*$/, e);

    });

    $("#edad").on("keyup", function() {
        validarkeyup(/^[0-9]{1,2}$/,
        $(this), $("#sedad"), "La edad debe ser solamente numeros");
    });

    $("#años").on("keypress", function(e) {
        validarkeypress(/^[0-9-\b]*$/, e);

    });

    $("#años").on("keyup", function() {
        validarkeyup(/^[0-9]{1,2}$/,
        $(this), $("#saños"), "Los años debe ser solamente numeros");
    });

    $("#correo").on("keypress", function(e) {
        validarkeypress(/^[0-9A-Za-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1\u0040]$/, e);

    });

    $("#correo").on("keyup", function() {
        validarkeyup(/^[0-9a-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]{4,26}[\u0040]{1}[a-z]{5,7}[\u002E]{1}[a-z]{3}$/,
            $(this), $("#scorreo"), "El formato puede ser A-Z a-z 0-9 ejemplo: nombreUsuari+@+servidor+.+dominio");
    });

    $("#direccion").on("keypress", function(e) {
        validarkeypress(/^[0-9A-Za-z]$/, e);

    });

    $("#direccion").on("keyup", function() {
        validarkeyup(/^[0-9A-Za-z]{4,26}$/,
            $(this), $("#sdireccion"), "El formato puede ser A-Z a-z 8-26");
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

$("#apellido1").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z]$/, e);

});

$("#apellido1").on("keyup", function() {
    validarkeyup(/^[A-Za-z]{4,26}$/,
        $(this), $("#sapellido1"), "El formato puede ser A-Z a-z 8-26");
});

$("#categoria1").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z]$/, e);

});

$("#categoria1").on("keyup", function() {
    validarkeyup(/^[A-Za-z]{4,26}$/,
        $(this), $("#scategoria1"), "El formato puede ser A-Z a-z 8-26");
});

$("#especializacion1").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z]$/, e);

});

$("#especializacion1").on("keyup", function() {
    validarkeyup(/^[A-Za-z]{4,26}$/,
        $(this), $("#sespecializacion1"), "El formato puede ser A-Z a-z 8-26");
});

$("#profecion1").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z]$/, e);

});

$("#profecion1").on("keyup", function() {
    validarkeyup(/^[A-Za-z]{4,26}$/,
        $(this), $("#sprofecion1"), "El formato puede ser A-Z a-z 8-26");
});

$("#edad1").on("keypress", function(e) {
    validarkeypress(/^[0-9-\b]*$/, e);

});

$("#edad1").on("keyup", function() {
    validarkeyup(/^[0-9]{1,2}$/,
    $(this), $("#sedad1"), "La edad debe ser solamente numeros");
});

$("#años1").on("keypress", function(e) {
    validarkeypress(/^[0-9-\b]*$/, e);

});

$("#años1").on("keyup", function() {
    validarkeyup(/^[0-9]{1,2}$/,
    $(this), $("#saños1"), "los años debe ser solamente numeros");
});

$("#correo1").on("keypress", function(e) {
    validarkeypress(/^[0-9A-Za-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1\u0040]$/, e);

});

$("#correo1").on("keyup", function() {
    validarkeyup(/^[0-9a-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]{4,26}[\u0040]{1}[a-z]{5,7}[\u002E]{1}[a-z]{3}$/,
        $(this), $("#scorreo1"), "El formato puede ser A-Z a-z 0-9 ejemplo: nombreUsuari+@+servidor+.+dominio");
});

$("#direccion1").on("keypress", function(e) {
    validarkeypress(/^[0-9A-Za-z]$/, e);

});

$("#direccion1").on("keyup", function() {
    validarkeyup(/^[0-9A-Za-z]{4,26}$/,
        $(this), $("#sdireccion1"), "El formato puede ser A-Z a-z 4-26");
});

    
    });
    function modificar(id){
        $("#tabla tr").each(function(){
        
            if(id == $(this).find("th:eq(1)").text()){
                $("#cedula1").val($(this).find("th:eq(1)").text());
                $("#nombre1").val($(this).find("th:eq(2)").text());
                $("#apellido1").val($(this).find("th:eq(3)").text());
                $("#categoria1").val($(this).find("th:eq(4)").text());
                $("#fecha1").val($(this).find("th:eq(5)").text());
                $("#especializacion1").val($(this).find("th:eq(6)").text());
                $("#profecion1").val($(this).find("th:eq(7)").text());
                $("#edad1").val($(this).find("th:eq(8)").text());
                $("#años1").val($(this).find("th:eq(9)").text());
                $("#correo1").val($(this).find("th:eq(10)").text());
                $("#direccion1").val($(this).find("th:eq(11)").text());
               
                

            }
        });
    
    }

    function eliminar(id){
        $("#cedula2").val(id);
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


    function validarenvio() {
        if (validarkeyup(/^[0-9]{6,10}$/,
        $("#cedula"), $("#scedula"), "La Cedula debe ser en el siguiente formato 00000000") == 0) {
            mensaje("<p>La Cedula debe ser en el siguiente formato 00000000");
            return false;
        } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#nombre"), $("#snombre"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-26</p>");
            return false;
    
        } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#apellido"), $("#sapellido"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-26</p>");
            return false;
        }
         else if (validarkeyup(/^[A-Za-z]{4,26}$/,
         $("#categoria"), $("#scategoria"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 00000000</p>");
            return false;
    
        } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#especializacion"), $("#sespecializacion"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
        } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#profecion"), $("#sprofecion"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 00000000</p>");
            return false;
    
        } else if (validarkeyup(/^[0-9]{1,2}$/,
        $("#edad"), $("#sedad"), "La edad debe ser solamente numeros") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
        }else if (validarkeyup(/^[0-9]{1,2}$/,
        $("#años"), $("#saños"), "Los años debe ser solamente numeros") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
        }else if (validarkeyup(/^[0-9a-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]{4,26}[\u0040]{1}[a-z]{5,7}[\u002E]{1}[a-z]{3}$/,
        $("#correo"), $("#scorreo"), "El formato puede ser A-Z a-z 0-9 ejemplo: nombreUsuari+@+servidor+.+dominio") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
        }else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#direccion"), $("#sdireccion"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
        }else if (valfecha($("#fecha"),$("#sfecha")) == 0) {
            mensaje("La fecha no puede estar vacia");
            return false;
        }
        return true;
    }

    function validarenvio1() {
        if (validarkeyup(/^[0-9]{6,10}$/,
        $("#cedula1"), $("#scedula1"), "La Cedula debe ser en el siguiente formato 00000000") == 0) {
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
        }
         else if (validarkeyup(/^[A-Za-z]{4,26}$/,
         $("#categoria1"), $("#scategoria1"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 00000000</p>");
            return false;
    
        } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#especializacion1"), $("#sespecializacion1"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
        } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#profecion1"), $("#sprofecion1"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 00000000</p>");
            return false;
    
        } else if (validarkeyup(/^[0-9]{1,2}$/,
        $("#edad1"), $("#sedad1"), "La edad debe ser solamente numeros") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
        }else if (validarkeyup(/^[0-9]{1,2}$/,
        $("#años1"), $("#saños1"), "Los años debe ser solamente numeros") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
        }else if (validarkeyup(/^[0-9a-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]{4,26}[\u0040]{1}[a-z]{5,7}[\u002E]{1}[a-z]{3}$/,
        $("#correo1"), $("#scorreo1"), "El formato puede ser A-Z a-z 0-9 ejemplo: nombreUsuari+@+servidor+.+dominio") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
        }else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#direccion1"), $("#sdireccion1"), "El formato puede ser A-Z a-z 8-26") == 0) {
            mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
            return false;
        }else if (valfecha($("#fecha1"),$("#sfecha1")) == 0) {
            mensaje("La fecha no puede estar vacia");
            return false;
        }
        return true;
    }


    function valfecha(fecha,sfecha) {
        fechaq = fecha.val();
        if (fechaq == '') {
            sfecha.text("seleccione una fecha");
            setTimeout(function() {
                sfecha.text("");
            }, 3000);
            return false;
        } else {
            return true;
        }
    
    
    
    }