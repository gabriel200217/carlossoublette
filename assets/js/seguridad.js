$(document).ready(function() {

    $("#registrar").on("click", function() {
            $("#id2").val($("#id").val());
          
            enviaAjax($("#f"));
            $("#addEmployeeModal").modal('hide');

       
        

    });

    $("#registrar2").on("click", function() {
        if (validarenvio1()) {
            $("#rol1").removeAttr("disabled");
            enviaAjax($("#f2"));
            $("#editEmployeeModal").modal('hide');

            $("#rol1").attr("disabled", "disabled");

       }
   

    });


    $("#registrar5").on("click", function() {
        if (validarenvio()) {
          
            enviaAjax($("#f7"));
            $("#editEmployeeModal1").modal('hide');

       }
   

    });


    
/*validaciones para registrar*/


  
    $("#rol").on("keypress", function(e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#rol").on("keyup", function() {
        validarkeyup(/^[A-Za-z]{4,80}$/,
            $(this), $("#srol"), "El formato puede ser A-Z a-z 8-80");
    });

    $("#descripcion").on("keypress", function(e) {
        validarkeypress(/^[A-Za-z_ ]$/, e);

    });

    $("#descripcion").on("keyup", function() {
        validarkeyup(/^[A-Za-z_ ]{4,80}$/,
            $(this), $("#sdescripcion"), "El formato puede ser A-Z a-z 8-80");
    });

   





$("#rol1").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z]$/, e);

});

$("#rol1").on("keyup", function() {
    validarkeyup(/^[A-Za-z]{4,80}$/,
        $(this), $("#srol1"), "El formato puede ser A-Z a-z 8-80");
});

$("#descripcion1").on("keypress", function(e) {
    validarkeypress(/^[A-Za-z_ ]$/, e);

});

$("#descripcion1").on("keyup", function() {
    validarkeyup(/^[A-Za-z_ ]{4,80}$/,
        $(this), $("#sdescripcion1"), "El formato puede ser A-Z a-z 8-80");
});



    
    });


    function modificar(id){
        $("#tabla tr").each(function(){
        
            if(id == $(this).find("th:eq(0)").text()){
                $("#rol1").val($(this).find("th:eq(1)").text());
                $("#descripcion1").val($(this).find("th:eq(2)").text());
                
               
                

            }
        });
    
    }

    function check(permiso,id){
        $("#tabla2 tr").each(function(){
        
            if(permiso == $(this).find("th:eq(0)").text()){
                $(id).prop("checked",true);
                
               
                

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
                 $("#tabla2").html(respuesta);
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

     function permiso(valor){
        $("#id").val(valor);
        $val=$("#id").val();
        enviaAjax($("#f5"));
        setTimeout(function(){

            $("#tabla tr").each(function(){
        
                if( $val  == $(this).find("th:eq(0)").text()){
                    $("#nombreRol").html($(this).find("th:eq(1)").text());
                    
                   
                    
    
                }
            });

            $("input:checkbox").prop("checked",false);

            check("registrar usuario", "#1");
            check("modificar usuario", "#2");
            check("eliminar usuario", "#3");
            check("consultar usuario", "#4");

            check("registrar docente", "#5");
            check("modificar docente", "#6");
            check("eliminar docente", "#7");
            check("consultar docente", "#8");

            check("registrar representante", "#9");
            check("modificar representante", "#10");
            check("eliminar representante", "#11");
            check("consultar representante", "#12");
            
            check("registrar pagos", "#13");
            check("modificar pagos", "#14");
            check("eliminar pagos", "#15");
            check("consultar pagos", "#16");

            check("registrar materias", "#17");
            check("modificar materias", "#18");
            check("eliminar materias", "#19");
            check("consultar materias", "#20");

            check("registrar anos", "#21");
            check("modificar anos", "#22");
            check("eliminar anos", "#23");
            check("consultar anos", "#24");

            check("registrar secciones", "#25");
            check("modificar secciones", "#26");
            check("eliminar secciones", "#27");
            check("consultar secciones", "#28");

            check("registrar horario_docente", "#29");
            check("modificar horario_docente", "#30");
            check("eliminar horario_docente", "#31");
            check("consultar horario_docente", "#32");

            check("registrar horario_seccion", "#33");
            check("modificar horario_seccion", "#34");
            check("eliminar horario_seccion", "#35");
            check("consultar horario_seccion", "#36");

            check("registrar inscipcion", "#37");
            check("modificar inscipcion", "#38");
            check("eliminar inscipcion", "#39");
            check("consultar inscipcion", "#40");

            check("registrar ano_academico", "#41");
            check("modificar ano_academico", "#42");
            check("eliminar ano_academico", "#43");
            check("consultar ano_academico", "#44");

            check("registrar seguridad", "#45");
            check("modificar seguridad", "#46");
            check("eliminar seguridad", "#47");
            check("consultar seguridad", "#48");
            check("permisos seguridad", "#49");
            check("registrar pagos_tutor", "#50");
        }, 500);
        

     }

     function marcar(){
            $("input:checkbox").prop("checked",true);
       
        
     }

     function marcar2(){
      
            $("input:checkbox").prop("checked",false);
      
        
     }

    function validarenvio() {
        if (validarkeyup(/^[A-Za-z]{4,80}$/,
        $("#rol"), $("#srol"), "El formato puede ser A-Z a-z 8-80") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-80</p>");
            return false;
    
        } else if (validarkeyup(/^[A-Za-z_ ]{4,80}$/,
        $("#descripcion"), $("#sdescripcion"), "El formato puede ser A-Z a-z 8-80") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-80</p>");
            return false;
        }
        return true;
    }

    function validarenvio1() {
        if (validarkeyup(/^[A-Za-z]{4,80}$/,
        $("#rol1"), $("#srol1"), "El formato puede ser A-Z a-z 8-80") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-80</p>");
            return false;
    
        } else if (validarkeyup(/^[A-Za-z_ ]{4,80}$/,
        $("#descripcion1"), $("#sdescripcion1"), "El formato puede ser A-Z a-z 8-80") == 0) {
            mensaje("<p>El formato puede ser A-Z a-z 8-80</p>");
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