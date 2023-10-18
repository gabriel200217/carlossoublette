<?php $nombre = "John";
if (preg_match("/^[a-zA-Z'-]+$/", $nombre)) {
    echo "El nombre es válido.";
} else {
    echo "El nombre contiene caracteres inválidos.";
}



$year = "2023";
if (preg_match("/^\d{4}$/", $year)) {
    echo "El año es válido.";
} else {
    echo "El año no es válido.";
}




$edad = "30";
if (preg_match("/^\d{1,3}$/", $edad)) {
    echo "La edad es válida.";
} else {
    echo "La edad no es válida.";
}


$edad = "30";
if (preg_match("/^[0-9]{1,3}$/", $edad)) {
    echo "La entrada es válida.";
} else {
    echo "La entrada contiene caracteres inválidos o no cumple con la restricción de longitud.";
}


$fecha = "31-12-2023";
if (preg_match("/^\d{2}-\d{2}-\d{4}$/", $fecha)) {
    echo "La fecha es válida.";
} else {
    echo "La fecha no es válida.";
}



$fecha = "2023-12-31";
if (preg_match("/^\d{4}-\d{2}-\d{2}$/", $fecha)) {
    echo "La fecha es válida.";
} else {
    echo "La fecha no es válida.";
}


$correo = "ejemplo@dominio.com";
if (preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $correo)) {
    echo "El correo electrónico es válido.";
} else {
    echo "El correo electrónico no es válido.";
}



$direccion = "Calle 123 # 45-67";
if (preg_match("/^[a-zA-Z0-9\s]+$/", $direccion)) {
    echo "La dirección es válida.";
} else {
    echo "La dirección no es válida.";
}



$contrasena = "Password123!";
if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $contrasena)) {
    echo "La contraseña es válida.";
} else {
    echo "La contraseña no cumple con los requisitos.";
}



$usuario = "usuario_123";
if (preg_match("/^[a-zA-Z0-9_]+$/", $usuario)) {
    echo "El usuario es válido.";
} else {
    echo "El usuario no cumple con los requisitos.";
}







?>



