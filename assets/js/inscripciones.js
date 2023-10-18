$(document).ready(function () {

    $('#mibuscador').select2({
        dropdownParent: $('#addEmployeeModal')
    });


    $('#mibuscador2').select2({
        dropdownParent: $('#addEmployeeModal')
    });

    $('#mibuscador3').select2({
        dropdownParent: $('#addEmployeeModal')
    });

    $('#mibuscador4').select2({
        dropdownParent: $('#editEmployeeModal')
    });

    $("#registrar").on("click", function () {
        if ($("#cedula").text() != "") {

            if ($("#atras").text() == "") {
                $("#contenido").prepend(`<button type="button" class="btn btn-secondary ocultar"  onclick="atras()" id="atras">atras</button>`);

            }

            $("#cancelar").addClass("ocultar");
            $("#atras").removeClass("ocultar");
            $("#siguiente2").removeClass("ocultar");
            $("#registrar").addClass("ocultar");
            if ($("#siguiente2").text() == "") {
                $("#contenido").append(`<button type="button" class="btn btn-light " onclick="siguiente()" id="siguiente2">siguiente</button>`);

            }

            mostrar("#2", "#II");
        }



    });





    $("#registrar2").on("click", function () {
        

        $("#cedula1").removeAttr("disabled");
        enviaAjax($("#f2"));
        $("#f2S").trigger("reset");
        $("#editEmployeeModal").modal("hide");




    });

    $("#cancelar").on("click", function () {

        $("#contenido2 div div").text("");
        $("#registrar").removeClass("btn-success");
        $("#registrar").addClass("btn-light");
        $("#mibuscador").val("seleccionar");


    });




    /*validaciones para registrar*/


    $("#cedulae").on("keypress", function (e) {
        validarkeypress(/^[0-9-\b]*$/, e);

    });

    $("#cedulae").on("keyup", function () {
        validarkeyup(/^[0-9]{6,10}$/,
            $(this), $("#scedulae"), "La Cedula debe ser en el siguiente formato 00000000");
    });

    $("#nombree").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#nombree").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#snombree"), "El formato puede ser A-Z a-z 8-26");
    });

    $("#apellidoe").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#apellidoe").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#sapellidoe"), "El formato puede ser A-Z a-z 8-26");
    });

    $("#edade").on("keypress", function (e) {
        validarkeypress(/^[0-9]$/, e);

    });

    $("#edade").on("keyup", function () {
        validarkeyup(/^[0-9]{1,2}$/,
            $(this), $("#sedade"), "El formato debe ser solo numeros");
    });

    $("#observacionese").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#observacionese").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#sobservacionese"), "El formato puede ser A-Z a-z 4-26");
    });



    $("#sangre").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#sangre").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#ssangre"), "El formato puede ser A-Z a-z 4-26");
    });

    $("#vacunas").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#vacunas").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#svacunas"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#operaciones").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#operaciones").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#soperaciones"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#enfermedades").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#enfermedades").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#senfermedades"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#medicamentos").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#medicamentos").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#smedicamentos"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#alerias").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#alerias").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#salerias"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#tratamiento").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#tratamiento").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#stratamiento"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#condicion").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#condicion").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#scondicion"), "El formato puede ser A-Z a-z 8-26");
    });


  
    /*aqui termina registrar*/
    $("#cedula1").on("keypress", function (e) {
        validarkeypress(/^[0-9-\b]*$/, e);

    });

    $("#cedula1").on("keyup", function () {
        validarkeyup(/^[0-9]{6,10}$/,
            $(this), $("#scedula1"), "La Cedula debe ser en el siguiente formato 00000000");
    });

    $("#nombre1").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#nombre1").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#snombre1"), "El formato puede ser A-Z a-z 8-26");
    });

    $("#apellido3").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#apellido3").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#sapellido3"), "El formato puede ser A-Z a-z 8-26");
    });

    $("#edad1").on("keypress", function (e) {
        validarkeypress(/^[0-9]$/, e);

    });

    $("#edad1").on("keyup", function () {
        validarkeyup(/^[0-9]{1,2}$/,
            $(this), $("#sedad1"), "El formato debe ser solo numeros");
    });

    $("#observaciones3").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#observaciones3").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#sobservaciones3"), "El formato puede ser A-Z a-z 8-26");
    });



    $("#sangre1").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#sangre1").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#ssangre1"), "El formato puede ser A-Z a-z 8-26");
    });

    $("#vacunas1").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#vacunas1").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#svacunas1"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#operaciones1").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#operaciones1").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#soperaciones1"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#enfermedades1").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#enfermedades1").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#senfermedades1"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#medicamentos1").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#medicamentos1").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#smedicamentos1"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#alerias1").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#alerias1").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#salerias1"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#tratamiento1").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#tratamiento1").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#stratamiento1"), "El formato puede ser A-Z a-z 8-26");
    });
    $("#condicion1").on("keypress", function (e) {
        validarkeypress(/^[A-Za-z]$/, e);

    });

    $("#condicion1").on("keyup", function () {
        validarkeyup(/^[A-Za-z]{4,26}$/,
            $(this), $("#scondicion1"), "El formato puede ser A-Z a-z 8-26");
    });


});
function modificar(id, id2) {

    $("#consulta_estudiantes tr").each(function () {

        if (id == $(this).find("th:eq(0)").text()) {
            $("#cedula1").val($(this).find("th:eq(0)").text());
            $("#nombre1").val($(this).find("th:eq(1)").text());
            $("#apellido3").val($(this).find("th:eq(2)").text());
            $("#edad1").val($(this).find("th:eq(3)").text());
            $("#materia1").val(id2);
            $("#observaciones3").val($(this).find("th:eq(4)").text());

            $("#tratamiento1").val($(this).find("th:eq(6)").text());
            $("#alerias1").val($(this).find("th:eq(7)").text());
            $("#medicamentos1").val($(this).find("th:eq(8)").text());
            $("#enfermedades1").val($(this).find("th:eq(9)").text());
            $("#operaciones1").val($(this).find("th:eq(10)").text());
            $("#vacunas1").val($(this).find("th:eq(11)").text());

            $("#sangre1").val($(this).find("th:eq(12)").text());
            $("#condicion1").val($(this).find("th:eq(13)").text());





        }
    });

}

function eliminar(id) {
    $("#cedula3").val(id);
    $("#borrar").on("click", function () {

        enviaAjax($("#f3"));
    });

}

function añadir() {
    id = $("#mibuscador").val();
    $("#consulta_representantes tr").each(function () {

        if (id == $(this).find("th:eq(0)").text()) {
            $("#cedula").html($(this).find("th:eq(0)").text());
            $("#nombre").html($(this).find("th:eq(1)").text());
            $("#apellido1").html($(this).find("th:eq(3)").text());
            $("#apellido2").html($(this).find("th:eq(8)").text());
            $("#cupos").val($(this).find("th:eq(8)").text());
            $("#pago_inscrip").val($(this).find("th:eq(7)").text());
            $("#telefono").html($(this).find("th:eq(5)").text());
            $("#correo").html($(this).find("th:eq(6)").text());



        }
    });

    $("#registrar").removeClass("btn-light");
    $("#registrar").addClass("btn-success");
    
}


function añadir3(valor) {
    if ($("#mibuscador3").val()!="seleccionar") {


        $("#inscri").removeClass("ocultar");
    $("#inscri1").addClass("ocultar");
    $("#inscri").removeClass("btn-light");
    $("#inscri").addClass("btn-success");
    }




}


function añadir2() {
    id = $("#mibuscador2").val();
    $("#consulta_estudiantes tr").each(function () {

        if (id == $(this).find("th:eq(0)").text()) {
            $("#cedulae").val($(this).find("th:eq(0)").text());
            $("#nombree").val($(this).find("th:eq(1)").text());
            $("#apellidoe").val($(this).find("th:eq(2)").text());
            $("#edade").val($(this).find("th:eq(3)").text());
            $("#materiae").val($(this).find("th:eq(5)").text());
            $("#observacionese").val($(this).find("th:eq(4)").text());

            $("#tratamiento").val($(this).find("th:eq(6)").text());
            $("#alerias").val($(this).find("th:eq(7)").text());
            $("#medicamentos").val($(this).find("th:eq(8)").text());
            $("#enfermedades").val($(this).find("th:eq(9)").text());
            $("#operaciones").val($(this).find("th:eq(10)").text());
            $("#vacunas").val($(this).find("th:eq(11)").text());

            $("#sangre").val($(this).find("th:eq(12)").text());
            $("#condicion").val($(this).find("th:eq(13)").text());





        }
    });

    $("#registrar").removeClass("btn-light");
    $("#registrar").addClass("btn-success");

    $("#siguiente2").removeClass("btn-light");
    $("#siguiente2").addClass("btn-success");
    $("#siguiente2").attr("validado","true");
}


function siguiente() {
    if ($("#siguiente2").attr("validado")!= undefined) {
        

    if ($("#atras2").text() == "") {

        $("#contenido").prepend(`<button type="button" class="btn btn-secondary "  onclick="atras2()" id="atras2">atras</button>`);


    }
    $("#atras2").removeClass("ocultar");
    $("#atras").addClass("ocultar");
    mostrar("#3", "#III");

    $("#siguiente2").addClass("ocultar");

    $("#inscri1").removeClass("ocultar");
}
}

function atras2() {

    $("#inscri1").addClass("ocultar");
    $("#inscri").addClass("ocultar");
    $("#siguiente2").removeClass("ocultar");
    mostrar("#2", "#II")
    $("#atras2").addClass("ocultar");
    $("#atras").removeClass("ocultar");


}

function atras() {
    $("#siguiente2").addClass("ocultar");
    $("#registrar").removeClass("ocultar");
    mostrar("#1", "#I")



}

function enviar() {
    $("cedu").val($("#mibuscador").val());
    chect(1);

    enviaAjax($("#f"));

    chect2(1);

    $("#f").trigger("reset");
    $("#addEmployeeModal").modal("hide");
    mostrar("#1", "#I");
    $("#inscri").addClass("ocultar");
    $("#atras2").addClass("ocultar");
    $("#registrar").removeClass("ocultar");

    $("#contenido2 div div").text("");
        $("#registrar").removeClass("btn-success");
        $("#registrar").addClass("btn-light");
        $("#mibuscador").val("seleccionar");

        $("#siguiente2").addClass("btn-light");
        $("#siguiente2").removeClass("btn-success val");
        $("#siguiente2").removeAttr("validado");

        chect(0);



    


}

function enviaAjax(datos) {

    $.ajax({
        url: '',
        type: 'POST',
        data: datos.serialize(),
        beforeSend: function () {

        },

        success: function (respuesta) {
            alert(respuesta);
            $("#consulta").val("consulta");
            enviaAjax2($("#f4"));

        },
        error: function (request, status, err) {
            if (status == "timeout") {
                mensaje("Servidor ocupado, intente de nuevo");
            } else {
                mensaje("ERROR: <br/>" + request + status + err);
            }
        },
        complete: function () {

        }

    });

}
function mostrar(variable, tap) {
    $(variable).removeClass('ocultar');
    $(tap).addClass('active');


    if (variable == "#1") {
        if ($("#cedula").text() != "") {
            $("#registrar").removeClass("btn-light");
            $("#registrar").addClass("btn-success");
        }
        $("#atras").addClass("ocultar");
        $("#cancelar").removeClass("ocultar");
        $("#II").removeClass('active');
        $("#III").removeClass('active');
        $("#2").addClass('ocultar');
        $("#3").addClass('ocultar');
    }
    if (variable == "#2") {
        if ($("#cedula").html != "") {
            /*$("#registrar").removeClass("btn-light");
            $("#registrar").addClass("btn-success");*/
        }
        $("#I").removeClass('active');
        $("#III").removeClass('active');
        $("#1").addClass('ocultar');
        $("#3").addClass('ocultar');
    }
    if (variable == "#3") {
        /*
        if($("#cedula").html!=""){
            $("#registrar").removeClass("btn-light");
            $("#registrar").addClass("btn-success");
        }*/
        $("#II").removeClass('active');
        $("#I").removeClass('active');
        $("#2").addClass('ocultar');
        $("#1").addClass('ocultar');
    }
}

function enviaAjax2(datos) {

    $.ajax({
        url: '',
        type: 'POST',
        data: datos.serialize(),
        beforeSend: function () {

        },

        success: function (respuesta) {
            $("#tabla").html(respuesta);

        },
        error: function (request, status, err) {
            if (status == "timeout") {
                mensaje("Servidor ocupado, intente de nuevo");
            } else {
                mensaje("ERROR: <br/>" + request + status + err);
            }
        },
        complete: function () {

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
        setTimeout(function () {
            etiquetamensaje.text("");
        }, 2000);
        if (!vacio()) {
            $("#siguiente2").addClass("btn-light");
        $("#siguiente2").removeClass("btn-success val");
        $("#siguiente2").removeAttr("validado");
        }

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

    if (vacio()) {
        $("#siguiente2").removeClass("btn-light");
        $("#siguiente2").addClass("btn-success");
        $("#siguiente2").attr("validado","true");
    }

        



}

function vacio(){
    if ($("#cedulae").val()=="") {
        return false;
    }else if ($("#nombree").val()=="") {
        return false;
    }else if ($("#apellidoe").val()=="") {
        return false;
    }else if ($("#edade").val()=="") {
        return false;
    }else if ($("#observacionese").val()=="") {
        return false;
    }else if ($("#sangre").val()=="") {
        return false;
    }else if ($("#vacunas").val()=="") {
        return false;
    }else if ($("#operaciones").val()=="") {
        return false;
    }else if ($("#enfermedades").val()=="") {
        return false;
    }else if ($("#medicamentos").val()=="") {
        return false;
    }else if ($("#alerias").val()=="") {
        return false;
    }else if ($("#tratamiento").val()=="") {
        return false;
    }else if ($("#condicion").val()=="") {
        return false;
    }
    return true;
    
}


function chect(valo) {

    if (valo == 0) {

        $("#estudiante").val("1");
    }

    $("#mibuscador2").attr("disabled", "disabled");
    $("#cedulae").removeAttr("disabled");


}

function chect2(valo) {
    if (valo == 0) {

        $("#estudiante").val("0")
    }


    $("#mibuscador2").removeAttr("disabled");

    $("#cedulae").attr("disabled", "disabled");


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
    } else if (validarkeyup(/^[0-9]{1,2}$/,
        $("#años"), $("#saños"), "Los años debe ser solamente numeros") == 0) {
        mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
        return false;
    } else if (validarkeyup(/^[0-9a-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]{4,26}[\u0040]{1}[a-z]{5,7}[\u002E]{1}[a-z]{3}$/,
        $("#correo"), $("#scorreo"), "El formato puede ser A-Z a-z 0-9 ejemplo: nombreUsuari+@+servidor+.+dominio") == 0) {
        mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
        return false;
    } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#direccion"), $("#sdireccion"), "El formato puede ser A-Z a-z 8-26") == 0) {
        mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
        return false;
    } else if (valfecha($("#fecha"), $("#sfecha")) == 0) {
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
    } else if (validarkeyup(/^[0-9]{1,2}$/,
        $("#años1"), $("#saños1"), "Los años debe ser solamente numeros") == 0) {
        mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
        return false;
    } else if (validarkeyup(/^[0-9a-z\u002A\u002E\u00F1\u00D1\u00D1\u00F1]{4,26}[\u0040]{1}[a-z]{5,7}[\u002E]{1}[a-z]{3}$/,
        $("#correo1"), $("#scorreo1"), "El formato puede ser A-Z a-z 0-9 ejemplo: nombreUsuari+@+servidor+.+dominio") == 0) {
        mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
        return false;
    } else if (validarkeyup(/^[A-Za-z]{4,26}$/,
        $("#direccion1"), $("#sdireccion1"), "El formato puede ser A-Z a-z 8-26") == 0) {
        mensaje("<p>Solo numeros 0-9 en el formato 0000-0000000</p>");
        return false;
    } else if (valfecha($("#fecha1"), $("#sfecha1")) == 0) {
        mensaje("La fecha no puede estar vacia");
        return false;
    }
    return true;
}


function valfecha(fecha, sfecha) {
    fechaq = fecha.val();
    if (fechaq == '') {
        sfecha.text("seleccione una fecha");
        setTimeout(function () {
            sfecha.text("");
        }, 3000);
        return false;
    } else {
        return true;
    }



}