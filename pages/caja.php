<?php 
include("../db/funciones.php");

session_start();

if (isset($_SESSION['rol'])){
    if ($_SESSION['rol'] != "CAJERO") {
        verificarRol($_SESSION['rol']);
    };
} else {
    verificarRol("");
}


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
    <title>Bar</title>
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
                            <a class="nav-link active" href="caja.php">Caja</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle usuario" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hola, <?php echo $_SESSION['nombre'];  ?>
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
        <section class="caja__inicio">
            <article class="caja__opacidad">
                <div class="caja__contenido">
                    <h1 class="caja__titulo">C A J A</h1>
                </div>
            </article>
        </section>
        <section class="bar__pedidos container my-5">
            <h2 class="caja__subtitulo text-center">MESAS</h2>
            <div class="row py-3">
                <a href="detalle-mesa.php" class="col-3">
                    <div class="card card-body">
                        <h3 class="card-title mx-auto my-auto">01</h3>
                    </div>
                </a>
                <a href="detalle-mesa.php" class="col-3">
                    <div class="card card-body">
                        <h3 class="card-title mx-auto my-auto">02</h3>
                    </div>
                </a>
                <a href="detalle-mesa.php" class="col-3">
                    <div class="card card-body">
                        <h3 class="card-title mx-auto my-auto">03</h3>
                    </div>
                </a>
                <a href="detalle-mesa.php" class="col-3">
                    <div class="card card-body">
                        <h3 class="card-title mx-auto my-auto">04</h3>
                    </div>
                </a>
            </div>
            <div class="row py-3">
                <a href="detalle-mesa.php" class="col-3">
                    <div class="card card-body">
                        <h3 class="card-title mx-auto my-auto">05</h3>
                    </div>
                </a>
                <a href="detalle-mesa.php" class="col-3">
                    <div class="card card-body">
                        <h3 class="card-title mx-auto my-auto">06</h3>
                    </div>
                </a>
                <a href="detalle-mesa.php" class="col-3">
                    <div class="card card-body">
                        <h3 class="card-title mx-auto my-auto">07</h3>
                    </div>
                </a>
                <a href="detalle-mesa.php" class="col-3">
                    <div class="card card-body">
                        <h3 class="card-title mx-auto my-auto">08</h3>
                    </div>
                </a>
            </div>
            <div class="row py-3">
                <a href="detalle-mesa.php" class="col-3">
                    <div class="card card-body">
                        <h3 class="card-title mx-auto my-auto">09</h3>
                    </div>
                </a>
                <a href="detalle-mesa.php" class="col-3">
                    <div class="card card-body">
                        <h3 class="card-title mx-auto my-auto">10</h3>
                    </div>
                </a>
                <a href="detalle-mesa.php" class="col-3">
                    <div class="card card-body">
                        <h3 class="card-title mx-auto my-auto">11</h3>
                    </div>
                </a>
                <a href="detalle-mesa.php" class="col-3">
                    <div class="card card-body">
                        <h3 class="card-title mx-auto my-auto">12</h3>
                    </div>
                </a>
            </div>
        </section>
    </main>
    <!-- Bootstrap // JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>