<?php
session_start();

require_once("functions/tools.php");
require_once("bd/functionBd.php");

if (isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] == 1) {
        echo mostrarLinkAsociacionDesdeIndex();
    }

    if ($_SESSION['rol'] == 3) {
        echo mostrarLinkAdmindesdeIndex();
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unidos Contra el Cáncer</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>

    </style>
</head>

<body>

    <!-- Barra de navegación -->
    <nav id="nav-principal" class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="img/logo-web.jpg" alt="Logo" class="me-2">
                <span>Unidos Contra el Cáncer</span>
            </a>

            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav" id="list-ul-nav">
                    <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/asociaciones.php">Asociaciones</a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/noticias.php">Noticias</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Educación</a></li>
                    <li class="nav-item"><a class="nav-link" href="login/login.php" id="login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sección principal -->
    <header class="bg-light text-center py-5">
        <div class="container">
            <h1 class="display-4">Información, Educación y Esperanza</h1>
            <p class="lead">Encuentra información fiable y conoce asociaciones que trabajan para combatir el cáncer.</p>
            <a href="pages/registrar_asociacion.php" id="btn-registrar" class="btn btn-primary btn-lg">Registra tu asociación</a>
        </div>
    </header>

    <main class="flex-grow-1">
        <!-- Sección de Asociaciones -->
        <section class="container my-5">
            <h2 class="text-center mb-4">Asociaciones Destacadas</h2>
            <div class="row">
                <?php mostrarUltimasAsociaciones() ?>
            </div>
        </section>


        <!-- Sección de Noticias -->
        <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4 py-5">Últimas Noticias</h2>
            <div class="row justify-content-center">
                <?php getLastTwoNews(); ?>
            </div>
        </div>
    </section>
    </main>

    <footer id="footer-principal" class="text-white text-center py-4">
        <p class="mb-0">&copy; 2025 Unidos Contra el Cáncer. Todos los derechos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>