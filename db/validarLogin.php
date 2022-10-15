<?php
include("const.php");
Include("conexion.php");
Include("funciones.php");

$link = conectar();


$usuario=$_POST['usuario'];
$contrasenia=$_POST['contrasenia'];

session_start();
$_SESSION['errors'] = array ();
$cont = 0;

$datosValidos = (strlen($usuario) >= 6) && (ctype_alnum($usuario)) && (strlen($contrasenia) >= 6);

if ($datosValidos) {
    $_SESSION['usuario']=$usuario;

    $consulta="SELECT * FROM usuarios where nombreusuario = '$usuario' ";
    $resultado=mysqli_query($link,$consulta);
    $row = mysqli_fetch_array ($resultado); 
    $filas = mysqli_num_rows($resultado);
    
    if ($filas) {
        
        if ($contrasenia == $row['clave']){
            $_SESSION['rol'] = $row['rol'];
            $_SESSION['nombre'] = $row['nombre'];
            verificarRol($row['rol']);
        }
    } else {
        $_SESSION['errors'][$cont] = "* El usuario o contraseña ingresado es incorrecto.";
        $cont++; 
    }
    
} else {
    // Validar usuario mayor 6 carácteres y guardo mensaje de error si es necesario
    if (strlen($usuario) < 6) {
        $_SESSION['errors'][$cont] = "* El usuario debe contener al menos 6 caracteres.";
        $cont++;
    };
    // Validar usuario solo letras y números y guardo mensaje de error si es necesario
    if (! ctype_alnum($usuario)) {
        $_SESSION['errors'][$cont] = "* El usuario solo puede contener carácteres alfanuméricos.";
        $cont++;
    };
    // Validar contraseña mayor 6 carácteres y guardo mensaje de error si es necesario
    if (strlen($contrasenia) < 6) {
        $_SESSION['errors'][$cont] = "* La contraseña debe contener al menos 6 caracteres.";
        $cont++;
    };

}

header('Location: '. direccionBase .'pages/login.php');

mysqli_free_result($resultado);


mysqli_close($link);


?>