<?php
    session_start();

    require_once("../functions/tools.php");

    if (isset($_SESSION['rol'])) {
        if ($_SESSION['rol'] == 1) {
            echo mostrarLinkAsociacion();
        }

        if ($_SESSION['rol'] == 3) {
            echo mostrarLinkAdmin();
        }

    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Unidos Contra el Cáncer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/login.js" defer></script>
</head>
<body class="bg-light">

    <!-- Barra de navegación -->
    <nav id="nav-principal" class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <!-- Logo + Nombre -->
            <a class="navbar-brand d-flex align-items-center" href="../index.php">
                <img src="../img/logo-web.jpg" alt="Logo" class="me-2"> 
                <span>Unidos Contra el Cáncer</span>
            </a>

            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav" id="list-ul-nav">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="../pages/asociaciones.php">Asociaciones</a></li>
                    <li class="nav-item"><a class="nav-link" href="../pages/noticias.php">Noticias</a></li>
                    <li class="nav-item"><a class="nav-link" href="../pages/educacion.php">Educación</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <main class="flex-grow-1">
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="card p-4 shadow-lg" style="max-width: 400px; width: 100%;">
                <div class="text-center">
                    <h4 class="mb-3">Unidos Contra el Cáncer</h4>
                </div>
                <form action="process/processLogin.php" method="post" name="form-login" id="form-login">
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label><br>
                        <span id="error-email"></span>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control" name="email" id="email" placeholder="ejemplo@correo.com" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label><br>
                        <span id="error-pass"></span>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control" name="password" id="password" placeholder="••••••••" minlength="8" required>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" id="submit-login" class="btn btn-primary">Iniciar Sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </main>


    <!-- Pie de Página -->
    <footer id="footer-principal" class="text-white text-center py-4">
        <p class="mb-0">&copy; 2025 Unidos Contra el Cáncer. Todos los derechos reservados</p>
    </footer>


    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</body>
</html>
