<?php
    session_start();

    require_once("../functions/tools.php");

    if (isset($_SESSION['rol'])) {
        if ($_SESSION['rol'] == 1) {
            echo mostrarLinkAsociacionDesdeNoticia();
        }

        if ($_SESSION['rol'] == 3) {
            echo mostrarLinkAdminDesdeNoticia();
        }

    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Asociación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/validateFormAssociation.js" defer></script>
</head>
<body>
    
    <!-- Barra de navegación -->
    <nav id="nav-principal" class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="../img/logo-web.jpg" alt="Logo" class="me-2"> 
                <span>Unidos Contra el Cáncer</span>
            </a>

            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav" id="list-ul-nav">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="asociaciones.php">Asociaciones</a></li>
                    <li class="nav-item"><a class="nav-link" href="noticias.php">Noticias</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Educación</a></li>
                    <li class="nav-item"><a class="nav-link" href="../login/login.php" id="login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <main class="flex-grow-1 mb-3">

        <!-- Imagen destacada -->
        <div class="text-center mt-4">
            <img src="../img/asociacones/asociacion-2.jpg" alt="Imagen de bienvenida" class="img-fluid rounded shadow" style="max-width: 100%; height: auto;">
        </div>

        <!-- Mensaje principal -->
        <div class="mt-4">
            <h3 class="text-center fw-bold text-primary">¡Únete a nuestra plataforma y haz que tu voz sea escuchada!</h3>
            <h5 class="text-center mt-3 text-muted">En un mundo donde la información es poder, queremos ofrecerte la oportunidad de destacar y conectar con tu comunidad.</h5>
        </div>

        <!-- Lista de beneficios -->
        <div class="container mt-4">
            <div class="row justify-content-center">
                <!-- Columna que se adapta a distintos tamaños de pantalla -->
                <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                    <h5 class="text-center fw-bold">Al registrarte en nuestra plataforma, podrás:</h5>
                    <ul class="list-unstyled text-center mt-3">
                        <li class="mb-3 d-flex justify-content-center align-items-center">
                            <span class="badge bg-success p-2 me-2 d-inline-block">✅</span>
                            Publicar tus noticias y eventos para que más personas conozcan tu labor y proyectos.
                        </li>
                        <li class="mb-3 d-flex justify-content-center align-items-center">
                            <span class="badge bg-success p-2 me-2 d-inline-block">✅</span>
                            Ampliar tu visibilidad y llegar a un público más amplio interesado en tu causa.
                        </li>
                        <li class="mb-3 d-flex justify-content-center align-items-center">
                            <span class="badge bg-success p-2 me-2 d-inline-block">✅</span>
                            Crear conexiones valiosas con otras asociaciones, colaboradores y personas comprometidas.
                        </li>
                        <li class="mb-3 d-flex justify-content-center align-items-center">
                            <span class="badge bg-success p-2 me-2 d-inline-block">✅</span>
                            Compartir tus logros y mostrar el impacto positivo que generas en la sociedad.
                        </li>
                    </ul>
                </div>
            </div>
        </div>



        <!-- Llamado a la acción -->
        <div class="text-center mt-4">
            <p class="lead">No importa si eres una asociación grande o pequeña, aquí tienes un espacio para darte a conocer y crecer.</p>
            <p class="fw-bold text-primary">¡Regístrate hoy mismo y comienza a difundir tu mensaje!</p>
            <p class="fw-bold">¡Tu causa merece ser conocida!</p>
        </div>
                <div class="container mt-5 bg-light p-4 rounded shadow">
                    <h1 class="text-center mb-4">Registrar Asociación</h1>
                    <form id="form-association" action="process/processNewAssociation.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nombre_asociacion" class="form-label fw-bold">Nombre</label>
                            <span id="error-name"></span>
                            <input type="text" id="name" name="nombre_asociacion" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <span id="error-email"></span>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="pass" class="form-label fw-bold">Contraseña</label>
                            <span id="error-pass"></span>
                            <input type="password" id="pass" name="pass" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label fw-bold">Descripción</label>
                            <span id="error-descripcion"></span>
                            <textarea id="descripcion" name="descripcion" class="form-control" rows="5" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="imagen" class="form-label fw-bold">Logo</label>
                            <span id="error-image"></span>
                            <input type="file" id="image" name="imagen" class="form-control">
                            <small class="text-muted">La imagen de tu asociación es muy importante para nosotros.</small>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label fw-bold">Teléfono</label>
                            <span id="error-phone"></span>
                            <input type="text" id="phone" name="telefono" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="sitio_web" class="form-label fw-bold">Sitio Web</label>
                            <span id="error-web"></span>
                            <input type="text" id="web" name="sitio_web" class="form-control" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            <a href="../index.php" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
            </div>
    </main>


    <!-- Pie de Página -->
    <footer id="footer-principal" class="text-white text-center py-4">
        <p class="mb-0">&copy; 2025 Unidos Contra el Cáncer. Todos los derechos reservados</p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>