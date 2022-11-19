<?php 

Include("core/const.php");
Include("core/conexion.php");
Include("core/objetos.php");


$link = conectar();

session_start();

if (isset($_SESSION['usuario'])){
    if ($_SESSION['usuario']->getRol() != "MOZO") {
        $_SESSION['usuario']->verificarRol();
    };
} else {
    header('Location: '. direccionBase .'pages/login.php');
}

include("core/consultasIndex/menu.php");
include("core/consultasIndex/creacionPedido.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Inicio</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light header">
            <div class="container">
                <p class="navbar-brand header__marca p-2">DOS Restó</p>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle usuario" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hola, <?php echo $_SESSION['usuario']->getNombre();  ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/dashboard/core/logout.php">Salir</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section class="inicio">
            <article class="inicio__opacidad">
                <div class="inicio__contenido">
                    <h1>Bienvenido/a a <span class="">DOS Restó</span></h1>
                    <a class="btn btn-outline-primary p-3" role="button" href="#form">INGRESA UN PEDIDO</a>
                </div>
            </article>
        </section>
        <section id="form" class="formulario container-fluid d-flex justify-content-center">
            <form class="col-md-4 col-md-offset-4 mx-3 my-5 p-4 formulario__caja" method="POST" action="index.php">
                <h2 class="text-center mt-2 mb-4">Ingrese el pedido </h2>
                <div class="d-grid gap-2 col-6 mx-auto my-3">
                    <?php
                        if (isset($success)){
                    ?>
                            <div class="btn btn-success disabled"><?php echo $success ?></div>
                    <?php
                            unset($success);
                        }
                        if (isset($errores)){
                            foreach($errores as $a) {
                    ?>
                                    <div class="btn btn-danger disabled"><?php echo $a ?></div>
                    <?php
                            }
                        }
                        unset($errores);
                    ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ingrese el nombre del plato o bebida: </label>
                    <select class="form-select" placeholder="Nombre del plato" name="pedido" id="item-menu">
                        <optgroup label="Comidas">
                            <?php
                                foreach($menu as $a) {
                                    if ($a['tipo'] == 'COMIDA') {
                            ?>
                                        <option value="<?php echo $a['id'] ?>"><?php echo $a['nombre'] ?></option>;
                            <?php
                                    }
                                }
                            ?>
                        </optgroup>
                        <optgroup label="Bebidas">
                            <?php
                                foreach($menu as $a) {
                                    if ($a['tipo'] == 'BEBIDA') {
                            ?>
                                        <option value="<?php echo $a['id'] ?>"><?php echo $a['nombre'] ?></option>;
                            <?php
                                    }
                                }
                            ?>
                        </optgroup>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Comentarios: </label>
                    <textarea class="form-control" placeholder="Aqui puede ingresar detalles o cambios en el plato o bebida elegida" name="comentarios"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Usuario del mozo: </label>
                    <input type="text" class="form-control form__mozo" value="<?php echo ($_SESSION['usuario']->getUsuario());  ?>" name="mozo" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ingrese el número de mesa: </label>
                    <select class="form-select" name="mesa">
                        <option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                        <option value="5">05</option>
                        <option value="6">06</option>
                        <option value="7">07</option>
                        <option value="8">08</option>
                        <option value="9">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-outline-primary p-2">Enviar</button>
                </div>
            </form>
            <div class="col-md-4 col-md-offset-4 mx-3 my-5 formulario__caja imagen__item" id="imagen-item">
                <img src="core/mostrarImagen.php?id=<?php echo $menu['0']['id'] ?>" class="p-4 ">
            </div>
        </section>
    </main>
    <footer>
    </footer>
    <script src="js/index.js"></script>
    <!-- Bootstrap // JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>