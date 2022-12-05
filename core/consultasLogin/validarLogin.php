<?php

if (isset($_POST["usuario"]) && isset($_POST["contrasenia"])) {

    $link = conectar();


    $usuario=$_POST['usuario']; // Copio el dato del nombre de usuario ingresado en una variable
    $contrasenia=$_POST['contrasenia']; // Copio el dato de la contraseña ingresada en una variable

    $errores = array (); // Creo un array para almacenar los errores
    
    $_SESSION["usuario"] = new Usuario();

    // Si se cumplen las especificaciones
    if ($_SESSION["usuario"]->validarDatos($usuario, $contrasenia)) {

        if ($_SESSION["usuario"]->autenticar($usuario, $contrasenia, $link)) {
            $_SESSION["usuario"]->verificarRol(); // Utilizo la función verificar para que lo dirija a la página que corresponda.
        } else {
            // Sino arroja resultados o la contraseña no coincide devuelve el error.
            array_push($errores, "* El usuario o la contraseña ingresado es incorrecto.");
        }

    } else {
        // Validar usuario mayor 6 carácteres y guardo mensaje de error si es necesario
        if (strlen($usuario) < 6) {
            array_push($errores,"* El usuario debe contener al menos 6 caracteres.");
        };
        // Validar usuario solo letras y números y guardo mensaje de error si es necesario
        if (! ctype_alnum($usuario)) {
            array_push($errores,"* El usuario solo puede contener carácteres alfanuméricos.");
        };
        // Validar contraseña mayor 6 carácteres y guardo mensaje de error si es necesario
        if (strlen($contrasenia) < 6) {
            array_push($errores,"* La contraseña debe contener al menos 6 caracteres.");
        };
    }

    mysqli_close($link);

}

?>