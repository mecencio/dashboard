<?php

if (isset($_POST["usuario"]) && isset($_POST["contrasenia"])) {
    include("const.php");
    Include("conexion.php");

    $link = conectar();


    $usuario=$_POST['usuario']; // Copio el dato del nombre de usuario ingresado en una variable
    $contrasenia=$_POST['contrasenia']; // Copio el dato de la contraseña ingresada en una variable

    $errores = array (); // Creo un array para almacenar los errores

    // Corroboro que los datos ingresados cumplan las especificaciones:
        // - Usuario caracteres alfanuméricos únicamente y 6 o más carácteres.
        // - Contraseña 6 o más carácteres
    $datosValidos = (strlen($usuario) >= 6) && (ctype_alnum($usuario)) && (strlen($contrasenia) >= 6);
    
    // Si se cumplen las especificaciones
    if ($datosValidos) {
        $consulta="SELECT * FROM usuarios where nombreusuario = '$usuario' "; 
        $resultado=mysqli_query($link,$consulta); // Realizo consulta para buscar si el usuario existe en la tabla
        $row = mysqli_fetch_array ($resultado);  // Guardo en resultados en array
        $filas = mysqli_num_rows($resultado); // Guardo la cantidad de filas que dieron como resultado

        // Como el usuario no se puede repetir la cantidad de resultados debería ser 1 o 0
        // Si hay filas y la contaseña ingresada coincide con la que arrojó la consulta
        if ($filas && $contrasenia == $row['clave']) {
            $_SESSION['usuarioLogueado'] = $row; // Guardo el array en la session para que lo usen todas las pag
            verificarRol($row['rol']); // Utilizo la función verificar para que lo dirija a la página que corresponda.
        } else {
            // Sino arroja resultados o la contraseña no coincide devuelve el error.
            array_push($errores, "* El usuario o la contraseña ingresado es incorrecto.");
        }

        mysqli_free_result($resultado);

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