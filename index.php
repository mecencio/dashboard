<?php 
session_start();

if ($_SESSION['rol'] !== 'MOZO') {
    switch ($_SESSION['rol']) {
        case 'COCINERO':
            header('Location: /dashboard/pages/cocina.php');
            break;
        case 'BARTENDER':
            header('Location: /dashboard/pages/bar.php');
            break;
        case 'CAJERO':
            header('Location: /dashboard/pages/caja.php');
            break;
        default:
            header('Location: /dashboard/pages/login.php');
            break;
    }
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
                        <li class="nav-item dropdown justify-content-end">
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
        <section class="inicio">
            <article class="inicio__opacidad">
                <div class="inicio__contenido">
                    <h1>Bienvenido/a a <span class="">DOS Restó</span></h1>
                    <a class="btn btn-outline-primary p-3" role="button" href="#form">INGRESA UN PEDIDO</a>
                </div>
            </article>
        </section>
        <section id="form" class="formulario container-fluid">
            <form class="col-md-4 col-md-offset-4 mx-auto my-5 p-4 formulario__caja" method="POST">
                <h2 class="text-center mt-2 mb-4">Ingrese el pedido </h2>
                <div class="mb-3">
                    <label class="form-label">Ingrese el nombre del plato o bebida: </label>
                    <select class="form-select" placeholder="Nombre del plato">
                        <optgroup label="Comidas">
                            <option value="hamburguesa-bacon">Hamburguesa Bacon</option>
                            <option value="hamburguesa-not-burguer">Hamburguesa Mega cheddar NotBurguer</option>
                            <option value="hamburguesa-triple-tower">Hamburguesa Triple Tower</option>
                            <option value="papas-grandes-cheddar-bacon">Papas grandes con Cheddar y Bacon</option>
                            <option value="hamburguesa-pampeano-doble">Hamburguesa Pampeano Doble</option>
                        </optgroup>
                        <optgroup label="Bebidas">
                            <option value="gin-tonic">Gin tonic</option>
                            <option value="cepita-500ml">Cepita 500ml</option>
                            <option value="cerveza-stella-473ml">Cerveza Stella Artois 473ml</option>
                            <option value="fernet-branca-cola">Fernet branca con Cola</option>
                        </optgroup>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Comentarios: </label>
                    <textarea class="form-control"
                        placeholder="Aqui puede ingresar detalles o cambios en el plato o bebida elegida"></textarea>
                </div>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Nombre mozo</label>
                    <input type="text" class="form-control" value="<?php echo $_SESSION['usuario'];  ?>" id="disabledTextInput" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ingrese el número de mesa: </label>
                    <input type="text" class="form-control" placeholder="01">
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-outline-primary p-2">Enviar</button>
                </div>
            </form>
        </section>
    </main>
    <footer>
    </footer>
    <!-- Bootstrap // JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>