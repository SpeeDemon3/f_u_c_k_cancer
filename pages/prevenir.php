<?php
session_start();
require_once("../functions/tools.php");

if (isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] == 1) {
        echo mostrarLinkAsociacionDesdeNoticias();
    }
    if ($_SESSION['rol'] == 3) {
        echo mostrarLinkAdminDesdeNoticias();
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prevención del Cáncer - Información Completa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg-light d-flex flex-column min-vh-100">

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
                    <li class="nav-item"><a class="nav-link active" href="educacion.php">Educación</a></li>
                    <li class="nav-item"><a class="nav-link" href="../login/login.php" id="login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Encabezado -->
    <header class="text-black text-center py-4 mt-5">
        <div class="container">
            <h1 class="fw-bold">Prevención del Cáncer</h1>
            <p class="lead">Estrategias para reducir el riesgo de cáncer y mejorar tu calidad de vida.</p>
        </div>
    </header>

    <!-- Sección Principal -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="../img/educacion/reducir-riesgo.jpg" class="img-fluid rounded shadow-lg mb-4" alt="Prevención del cáncer">
            </div>
            <div class="col-md-6">
                <h2 class="text-primary">¿Cómo reducir el riesgo de cáncer?</h2>
                <p>El cáncer puede prevenirse en gran medida adoptando hábitos de vida saludables. Aquí tienes algunas estrategias clave:</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>1. Alimentación saludable:</strong> Rica en frutas, verduras y fibra.</li>
                    <li class="list-group-item"><strong>2. Actividad física:</strong> Al menos 30 minutos de ejercicio al día.</li>
                    <li class="list-group-item"><strong>3. Evitar el tabaco y alcohol:</strong> Factores de alto riesgo.</li>
                    <li class="list-group-item"><strong>4. Protección solar:</strong> Reduce el riesgo de cáncer de piel.</li>
                    <li class="list-group-item"><strong>5. Detección temprana:</strong> Chequeos médicos regulares.</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Acordeón con información detallada -->
    <div class="container mt-5">
        <h2 class="text-center text-primary mb-4">Factores de prevención en detalle</h2>
        <div class="accordion" id="accordionPrevention">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                        🍎 Alimentación Saludable
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionPrevention">
                    <div class="accordion-body">
                        Consumir frutas, verduras y granos enteros puede reducir el riesgo de cáncer. Limita carnes procesadas y grasas saturadas.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                        🏃 Ejercicio Físico
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionPrevention">
                    <div class="accordion-body">
                        Hacer ejercicio regularmente ayuda a mantener un peso saludable y reduce el riesgo de varios tipos de cáncer.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                        🏥 Detección Temprana
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionPrevention">
                    <div class="accordion-body">
                        Exámenes como mamografías, colonoscopias y pruebas de Papanicolaou pueden detectar el cáncer en etapas tempranas.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Educativo -->
    <div class="container mt-5 mb-5">
        <h2 class="text-center text-primary m-5">Video: ¿Cómo prevenir el cáncer?</h2>
        <div class="ratio ratio-16x9">
            <iframe src="https://www.youtube.com/embed/VIDEO_ID" allowfullscreen></iframe>
        </div>
    </div>


    <!-- Pie de página -->
    <footer id="footer-principal" class="text-white text-center py-4 mt-auto">
        <p class="mb-0">&copy; 2025 Unidos Contra el Cáncer. Todos los derechos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>