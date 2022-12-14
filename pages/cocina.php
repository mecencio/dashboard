<?php 
Include("../core/const.php");
Include("../core/conexion.php");
Include("../core/objetos.php");

$link = conectar();
session_start();

if (isset($_SESSION['usuario'])){
    if ($_SESSION['usuario']->getRol() != "COCINERO") {
        $_SESSION['usuario']->verificarRol();
    };
} else {
    header('Location: '. direccionBase .'pages/login.php');
}

include("../core/consultasCocinaBar/marcarEntregado.php");
$lugar = "cocina";
include("../core/consultasCocinaBar/consultaPedidos.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Cocina</title>
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
                            <a class="nav-link active" href="cocina.php">Cocina</a>
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
        <section class="cocina__inicio">
            <article class="cocina__opacidad">
                <div class="cocina__contenido">
                    <h1 class="cocina__titulo">C O C I N A</h1>
                </div>
            </article>
        </section>
        <section class="cocina__pedidos container">
            <div class="row">
                <?php
                    if (isset($resultadoUpdate)){
                ?>
                        <div class="mt-3 btn btn-success w-50 mx-auto disabled"><?php echo $resultadoUpdate ?></div>
                <?php
                        unset($resultadoUpdate);
                    }
                    if (isset($errorUpdate)){
                ?>
                    <div class="mt-3 btn btn-danger w-50 mx-auto disabled"><?php echo $errorUpdate ?></div>
                <?php
                    }
                    unset($errores);

                    while ($pedido = mysqli_fetch_assoc ($resultado)) {
                ?>
            </div>
            <div class="card my-3 text-center w-50 mx-auto row">
                <div class="d-flex flex-row align-items-center">
                <img src="../core/mostrarImagen.php?id=<?php echo $pedido["idItem"] ?>" class="p-4 " style="width: 300px; height: 171px;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $pedido["item"] ?></h5>
                    <p class="card-text">Comentarios: <?php echo $pedido["comentario"] ?> </p>
                    <p class="card-text">Mozo: <?php echo $pedido["nombre"] ?> <?php echo $pedido["apellido"] ?></p>
                    <p class="card-text">Mesa: <?php echo $pedido["mesa"] ?></p>
                    <a href="cocina.php?id=<?php echo $pedido["id"] ?>" class="btn btn-outline-primary">Entregado</a>
                </div>
                </div>
                <div class="card-footer text-muted">
                    <p class="my-1">Fecha y hora: <?php echo $pedido["fecha"] ?></p>
                </div>
            </div>
            <?php
                }
            ?>
        </section>
    </main>
    <footer class="mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <!-- Boton previous -->
                <!-- PHP de adentro : En caso de que estemos viendo la primera página desactiva el boton (porque no hay página previa) -->
                <li class="page-item <?php echo (isset($_GET["inicio"]) && ($_GET["inicio"] != "0"))? '':'disabled'; ?>">
                <!-- PHP de adentro: setea la página previa restándole 5 al dato pasado por GET (Si existiera). Son 5 por la cantidad de registros por pag -->
                    <a class="page-link" href="cocina.php?inicio=<?php echo isset($_GET["inicio"])?$_GET["inicio"]-5:0; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                    // Por cada página
                    for ($i = 1; $i <= $paginas; $i++) {
                ?>
                    <!-- Crea un boton con el número de página y con dirección a la busqueda de registros saltando de a 5 -->
                    <li class="page-item paginas">
                        <a class="page-link <?php echo (isset($_GET["inicio"]) && $_GET["inicio"] == (5*($i-1)))? 'pagina-activa':''; ?><?php echo (!isset($_GET["inicio"]) && $i == 1)? 'pagina-activa':''; ?>" href="cocina.php?inicio=<?php echo (5*($i-1)) ?>">
                            <?php echo $i ?>
                        </a>
                    </li>
                <?php
                    }
                ?>
                <!-- Boton next -->
                <!-- PHP de adentro : En caso de que estemos viendo la última página desactiva el boton (porque no hay página siguiente) -->
                <li class="page-item <?php echo ((isset($_GET["inicio"]) && ($_GET["inicio"] == (5*($paginas-1)))) || ($paginas <= 1))? 'disabled':''; ?>">
                    <!-- PHP de adentro: setea la página siguiente sumandole 5 al dato pasado por GET (Si existiera, sino lo define en 6)-->
                    <a class="page-link" href="cocina.php?inicio=<?php echo isset($_GET["inicio"])?$_GET["inicio"]+5:5; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </footer>
    <!-- Bootstrap // JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>