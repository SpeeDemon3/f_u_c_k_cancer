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
    <title>Chequeos - Unidos Contra el Cáncer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Barra de navegación -->
    <nav id="nav-principal" class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
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
                    <li class="nav-item"><a class="nav-link" href="asociaciones.php">Asociaciones</a></li>
                    <li class="nav-item"><a class="nav-link" href="noticias.php">Noticias</a></li>
                    <li class="nav-item"><a class="nav-link active" href="educacion.php">Educación</a></li>
                    <li class="nav-item"><a class="nav-link" href="../login/login.php" id="login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Encabezado -->
    <header class="text-black text-center py-5">
        <div class="container">
            <h1 class="fw-bold">Importancia de los Chequeos Médicos</h1>
            <p class="lead">Los exámenes médicos pueden salvar vidas al detectar el cáncer a tiempo.</p>
        </div>
    </header>

    <!-- Sección Principal -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="../img/educacion/chequeo.jpg" class="img-fluid rounded shadow-lg" alt="Chequeos médicos">
            </div>
            <div class="col-md-6">
                <h2 class="text-primary">¿Por qué son importantes los chequeos?</h2>
                <p>Detectar el cáncer a tiempo aumenta significativamente las probabilidades de curación. Los chequeos regulares pueden identificar anomalías antes de que causen síntomas.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>✔ Detección temprana:</strong> Diagnóstico antes de que se propague.</li>
                    <li class="list-group-item"><strong>✔ Tratamientos más efectivos:</strong> Mejor respuesta al tratamiento.</li>
                    <li class="list-group-item"><strong>✔ Reducción de costos:</strong> Evita tratamientos más agresivos y costosos.</li>
                    <li class="list-group-item"><strong>✔ Mayor calidad de vida:</strong> Prevención de complicaciones graves.</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Acordeón con exámenes médicos recomendados -->
    <div class="container mt-5">
        <h2 class="text-center text-primary mb-4">Chequeos Médicos Según Edad y Género</h2>
        <div class="accordion" id="accordionCheckups">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#chequeoHombres">
                        👨‍⚕️ Chequeos para Hombres
                    </button>
                </h2>
                <div id="chequeoHombres" class="accordion-collapse collapse show" data-bs-parent="#accordionCheckups">
                    <div class="accordion-body">
                        <ul>
                            <li><strong>A partir de los 20 años:</strong> Revisión de presión arterial y colesterol.</li>
                            <li><strong>A partir de los 40 años:</strong> Examen de próstata y colonoscopia.</li>
                            <li><strong>A partir de los 50 años:</strong> Pruebas más frecuentes de colon y próstata.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#chequeoMujeres">
                        👩‍⚕️ Chequeos para Mujeres
                    </button>
                </h2>
                <div id="chequeoMujeres" class="accordion-collapse collapse" data-bs-parent="#accordionCheckups">
                    <div class="accordion-body">
                        <ul>
                            <li><strong>A partir de los 20 años:</strong> Examen de mamas y citología vaginal.</li>
                            <li><strong>A partir de los 40 años:</strong> Mamografía anual.</li>
                            <li><strong>A partir de los 50 años:</strong> Colonoscopia y chequeos hormonales.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#chequeoGenerales">
                        🏥 Chequeos Generales
                    </button>
                </h2>
                <div id="chequeoGenerales" class="accordion-collapse collapse" data-bs-parent="#accordionCheckups">
                    <div class="accordion-body">
                        <ul>
                            <li><strong>Chequeo dental:</strong> Cada 6 meses para prevenir infecciones.</li>
                            <li><strong>Exámenes de sangre:</strong> Para controlar niveles de glucosa, colesterol y más.</li>
                            <li><strong>Control de la piel:</strong> Revisión de lunares sospechosos.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Educativo -->
    <div class="container mt-5 mb-5 text-center">
        <h2 class="text-center text-primary mb-4">Video: La importancia del chequeo como prevención</h2>
        <div class="d-flex justify-content-center mt-5">
            <div class="ratio ratio-16x9" style="max-width: 900px;">
                <iframe src="https://www.youtube.com/embed/90Hm7cnrEkk" title="LA IMPORTANCIA DEL CHEQUEO DE RUTINA COMO PREVENCIÓN CONTRA EL CÁNCER" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <!-- Pie de página -->
    <footer id="footer-principal" class="text-white text-center py-4 mt-auto">
        <p class="mb-0">&copy; 2025 Unidos Contra el Cáncer. Todos los derechos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>