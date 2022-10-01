<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Ingresa</title>
</head>
<body id="login">
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
                            <a class="nav-link" aria-current="page" href="../index.html">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cocina.html">Cocina</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="bar.html">Bar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="caja.html">Caja</a>
                        </li>
                    </ul>
                    <a class="btn btn-outline-primary active" role="button" href="login.html">Login</a>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section id="form" class="login container-fluid">
            <form class="col-md-4 col-md-offset-4 mx-auto my-5 p-4 login__form" method="POST">
                <div class="mb-3">
                    <label class="form-label">Usuario: </label>
                    <input type="text" class="form-control" placeholder="Usuario" id="user">
                    <div id="errorUsuario"></div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contraseña: </label>
                    <input type="password" class="form-control" placeholder="Contraseña" id="password">
                    <div id="errorContra"></div>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-outline-primary p-2" id="botonLogin" disabled>Ingresar</button>
                </div>
            </form>
        </section>
    </main>
    <script src="../js/login.js"></script>
</body>
</html>