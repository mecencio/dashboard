<?php 
Include("../core/const.php");
Include("../core/conexion.php");
Include("../core/objetos.php");

$link = conectar();
session_start();

if (isset($_SESSION['usuario'])){
    if ($_SESSION['usuario']->getRol() != "CAJERO") {
        $_SESSION['usuario']->verificarRol();
    };
} else {
    header('Location: '. direccionBase .'pages/login.php');
}

include("../core/estadisticas/mesasCerradas.php");

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
    <title>Caja</title>
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
        <section class="caja__inicio" id="inicio">
            <article class="caja__opacidad">
                <div class="caja__contenido">
                    <h1 class="caja__titulo">C A J A</h1>
                </div>
            </article>
        </section>
        <section class="cocina__pedidos container container my-3">
            <div class="d-flex justify-content-end w-75 mb-5">
                <a href="caja.php" class="btn btn-outline-secondary mx-2 shadow-none">Volver</a>
            </div>
            <h2 class="caja__subtitulo text-center">PLATOS MÁS CONSUMIDOS</h2>
            <?php
                while ($mesaCerrada = mysqli_fetch_assoc ($resultado)) {
            ?>
                <div class="card my-3 text-center w-50 mx-auto row">
                    <div class="d-flex flex-row align-items-center">
                        <div class="card-body">
                            <h5 class="card-title">Mesa: <?php echo $mesaCerrada["nroMesa"] ?></h5>
                            <p class="card-text"><span class="text-decoration-underline">Monto pagado</span>: $ <?php echo $mesaCerrada["monto"] ?></p>
                            <p class="card-text"><span class="text-decoration-underline">Cajero</span>: <?php echo $mesaCerrada["cajeroNombre"] . " " . $mesaCerrada["cajeroApellido"] ?></p>
                            <p class="card-text"><span class="text-decoration-underline">Detalle</span>: <?php echo $mesaCerrada["detalle"] ?></p>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <p class="my-1">Fecha y hora de cierre: <?php echo $mesaCerrada["fecha"] ?></p>
                    </div>
                </div>
            <?php
                }
            ?>
            <div class="d-flex justify-content-end">
                <a href="#inicio">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="gray" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                    </svg>
                </a>
            </div>
        </section>
        <footer class="mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <!-- Boton previous -->
                    <!-- PHP de adentro : En caso de que estemos viendo la primera página desactiva el boton (porque no hay página previa) -->
                    <li class="page-item <?php echo (isset($_GET["inicio"]) && ($_GET["inicio"] != "0"))? '':'disabled'; ?>">
                    <!-- PHP de adentro: setea la página previa restándole 10 al dato pasado por GET (Si existiera). Son 10 por la cantidad de registros por pag -->
                        <a class="page-link" href="historicoMesasCerradas.php?inicio=<?php echo isset($_GET["inicio"])?$_GET["inicio"]-10:0; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php
                        // Por cada página
                        for ($i = 1; $i <= $paginas; $i++) {
                    ?>
                        <!-- Crea un boton con el número de página y con dirección a la busqueda de registros saltando de a 10 -->
                        <li class="page-item paginas">
                            <a class="page-link <?php echo (isset($_GET["inicio"]) && $_GET["inicio"] == (10*($i-1)))? 'pagina-activa':''; ?><?php echo (!isset($_GET["inicio"]) && $i == 1)? 'pagina-activa':''; ?>" href="historicoMesasCerradas.php?inicio=<?php echo (10*($i-1)) ?>">
                                <?php echo $i ?>
                            </a>
                        </li>
                    <?php
                        }
                    ?>
                    <!-- Boton next -->
                    <!-- PHP de adentro : En caso de que estemos viendo la última página desactiva el boton (porque no hay página siguiente) -->
                    <li class="page-item <?php echo ((isset($_GET["inicio"]) && ($_GET["inicio"] == (10*($paginas-1)))) || ($paginas <= 1))? 'disabled':''; ?>">
                        <!-- PHP de adentro: setea la página siguiente sumandole 10 al dato pasado por GET (Si existiera, sino lo define en 10)-->
                        <a class="page-link" href="historicoMesasCerradas.php?inicio=<?php echo isset($_GET["inicio"])?$_GET["inicio"]+10:10; ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </footer>
    </main>
    <script src="../js/detalle-mesa.js"></script>
    <!-- Bootstrap // JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>