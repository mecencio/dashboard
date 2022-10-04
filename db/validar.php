<?php

Include("conexion.php");

$link = conectar();


$usuario=$_POST['usuario'];
$contrasenia=$_POST['contrasenia'];
session_start();
$_SESSION['usuario']=$usuario;


$consulta="SELECT * FROM usuarios where nombreusuario = '$usuario' ";
$resultado=mysqli_query($link,$consulta);
$row = mysqli_fetch_array ($resultado); 
$filas = mysqli_num_rows($resultado);

if ($filas) {
    
    if ($contrasenia == $row['clave']){
        $_SESSION['rol'] = $row['rol'];
        $_SESSION['nombre'] = $row['nombre'];
        switch ($row['rol']) {
            case 'MOZO':
                header('Location: /');
                break;
            case 'COCINERO':
                header('Location: /dashboard/pages/cocina.php');
                break;
            case 'BARTENDER':
                header('Location: /dashboard/pages/bar.php');
                break;
            case 'CAJERO':
                header('Location: /dashboard/pages/caja.php');
                break;
        }
    }
} else {
    $_SESSION['errors'] = array("* El usuario o contraseña ingresado es incorrecto.");
    header('Location: /dashboard/pages/login.php'); 
}

mysqli_free_result($resultado);


mysqli_close($link);


?>