<?php 
include("../db/funciones.php");

session_start();

if (isset($_SESSION['usuarioLogueado']['rol'])){
    if ($_SESSION['usuarioLogueado']['rol'] != "COCINERO") {
        verificarRol($_SESSION['usuarioLogueado']['rol']);
    };
} else {
    verificarRol("");
}

$lugar = "cocina";
include("../db/consultaPedidos.php")

// Usar ceil para redondear Q de páginas
// Corregir para que no consulte constantemente la base
// Usar disabled en vez de que los botones desaparezcan
// Pasar el resultado de la consulta a JS para evitar consultar la bbdd constantemente
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
                                Hola, <?php echo $_SESSION['usuarioLogueado']['nombre'];  ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/dashboard/db/logout.php">Salir</a></li>
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
            <?php
                if (isset($resultadoUpdate)){
            ?>
                    <div class="btn btn-success disabled"><?php echo $resultadoUpdate ?></div>
            <?php
                    unset($resultadoUpdate);
                }
                if (isset($errorUpdate)){
            ?>
                <div class="btn btn-danger disabled"><?php echo $errorUpdate ?></div>
            <?php
                }
                unset($errores);

            if(isset($pedidosDelLugar)) {
                foreach($pedidosDelLugar as $pedido) {
            ?>

            <div class="card my-3 text-center w-50 mx-auto row">
                <div class="d-flex flex-row align-items-center">
                <img src="../db/mostrarImagen.php?id=<?php echo $pedido["id"] ?>" class="p-4 " style="width: 300px; height: 171px;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $pedido["item"] ?></h5>
                    <p class="card-text">Comentarios: <?php echo $pedido["comentario"] ?> </p>
                    <p class="card-text">Mozo: <?php echo $pedido["nombre"] ?> <?php echo $pedido["apellido"] ?></p>
                    <p class="card-text">Mesa: <?php echo $pedido["mesa"] ?></p>
                    <a href="../db/marcarEntregado.php?id=<?php echo $pedido["id"] ?>" class="btn btn-outline-primary">Entregado</a>
                </div>
                </div>
                <div class="card-footer text-muted">
                    <p>Fecha y hora: <?php echo $pedido["fecha"] ?></p>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </section>
    </main>
    <footer class="mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <?php
                        if (isset($_GET["inicio"]) && isset($_GET["limite"]) && ($_GET["inicio"] != "1") && ($_GET["limite"] != 5)) {
                    ?>
                    <a class="page-link" href="cocina.php?inicio=<?php echo intval($_GET["inicio"])-5 ?>&limite=<?php echo intval($_GET["limite"])-5 ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                    <?php
                        }
                    ?>
                </li>
                <?php
                    for ($i = 1; $i <= $paginas; $i++) {
                ?>
                    <li class="page-item"><a class="page-link" href="cocina.php?inicio=<?php echo (5*($i-1))+1 ?>&limite=<?php echo (5*$i) ?>"><?php echo $i ?></a></li>
                <?php
                    }
                ?>
                <li class="page-item">
                    <?php
                        if (isset($_GET["inicio"]) && isset($_GET["limite"])) {
                            if (($_GET["inicio"] != (5*($paginas-1))+1) && ($_GET["limite"] != (5*$paginas))) {
                    ?>
                                <a class="page-link" href="cocina.php?inicio=<?php echo (5*($_GET["inicio"]-1))+1 ?>&limite=<?php echo (5*$$_GET["limite"]) ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                    <?php
                            }
                        } else if (isset($pedidosDelLugar)) {
                    ?>
                    <a class="page-link" href="cocina.php?inicio=6&limite=10" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                    <?php
                        }  
                    ?>
                </li>
            </ul>
        </nav>
    </footer>
    <!-- Bootstrap // JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>