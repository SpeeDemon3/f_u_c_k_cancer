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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educación - Unidos Contra el Cáncer</title>
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
    <div class="container mt-4">
        <h1 class="text-center mb-4" style="color:rgb(122, 21, 253);">Educación sobre el Cáncer</h1>
        <p class="text-center lead" style="color:rgb(181, 162, 206)">Encuentra información confiable y recursos útiles para aprender más sobre prevención, síntomas y tratamientos.</p>
    </div>

    <!-- Navegación por categorías (pestañas) -->
    <div class="container mt-4">
        <ul class="nav nav-tabs justify-content-center" id="educacionTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="prevencion-tab" data-bs-toggle="tab" data-bs-target="#prevencion" type="button" role="tab" style="color: #6b00fb">Prevención</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="sintomas-tab" data-bs-toggle="tab" data-bs-target="#sintomas" type="button" role="tab" style="color: #6b00fb">Síntomas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tratamientos-tab" data-bs-toggle="tab" data-bs-target="#tratamientos" type="button" role="tab" style="color: #6b00fb">Tratamientos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="estilos-vida-tab" data-bs-toggle="tab" data-bs-target="#estilos-vida" type="button" role="tab" style="color: #6b00fb">Estilos de Vida</button>
            </li>
        </ul>

        <!-- Contenido de las pestañas -->
        <div class="tab-content mt-4" id="educacionTabsContent">
            <!-- Pestaña de Prevención -->
            <div class="tab-pane fade show active" id="prevencion" role="tabpanel">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="../img/educacion/educacion-prevenir.jpg" class="card-img-top" alt="Prevención 1">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Cómo prevenir el cáncer</h5>
                                <p class="card-text mb-3">Consejos prácticos para reducir el riesgo de cáncer.</p>
                                <a href="prevenir.php" class="btn btn-primary mt-auto btn-custom">Leer más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="../img/educacion/educacion-chequeos.jpg" class="card-img-top" alt="Prevención 2">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Importancia de los chequeos</h5>
                                <p class="card-text mb-3">Por qué son importantes los exámenes médicos regulares.</p>
                                <a href="chequeo.php" class="btn btn-primary mt-auto btn-custom">Leer más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column">
                                <div class="ratio ratio-16x9 py-4">
                                    <iframe src="https://www.youtube.com/embed/Y0BPGlqwI-E" title="3 CLAVES para ENTENDER el CÁNCER" allowfullscreen></iframe>
                                </div>
                                <h5 class="card-title pt-2">Video: 3 CLAVES para ENTENDER el CÁNCER</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pestaña de Síntomas -->
            <div class="tab-pane fade" id="sintomas" role="tabpanel">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="../img/educacion/educacion-sintomas.jpg" class="card-img-top" alt="Síntomas 1">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Síntomas comunes</h5>
                                <p class="card-text mb-3">Conoce los síntomas más frecuentes del cáncer.</p>
                                <a href="sintomas.php" class="btn btn-primary mt-auto btn-custom">Leer más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="../img/educacion/educacion-consulta.jpg" class="card-img-top" alt="Síntomas 2">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Cuándo consultar al médico</h5>
                                <p class="card-text mb-3">Signos de alerta que no debes ignorar.</p>
                                <a href="consultar-medico.php" class="btn btn-primary mt-auto btn-custom">Leer más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column">
                                <div class="ratio ratio-16x9 py-4">
                                    <iframe src="https://www.youtube.com/embed/5pk11p8vZEY" title="12 síntomas para detectar el cáncer de mama, el más común entre las mujeres" allowfullscreen></iframe>
                                </div>
                                <h5 class="card-title pt-2">Video: 12 síntomas para detectar el cáncer de mama</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pestaña de Tratamientos -->
            <div class="tab-pane fade" id="tratamientos" role="tabpanel">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="../img/educacion/educacion-tratamientos.jpg" class="card-img-top" alt="Tratamientos 1">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Tipos de tratamientos</h5>
                                <p class="card-text mb-3">Descubre los diferentes tratamientos disponibles para el cáncer.</p>
                                <a href="tratamientos.php" class="btn btn-primary mt-auto btn-custom">Leer más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="../img/educacion/educacion-quimio.jpg" class="card-img-top" alt="Tratamientos 2">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Quimioterapia</h5>
                                <p class="card-text mb-3">Información detallada sobre la quimioterapia y sus efectos.</p>
                                <a href="quimioterapia.php" class="btn btn-primary mt-auto btn-custom">Leer más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column">
                                <div class="ratio ratio-16x9 py-4">
                                    <iframe src="https://www.youtube.com/embed/aRxnGyiH7KM" title="Top 5 avances en la detección y tratamiento del cáncer - #EspecialMSP" allowfullscreen></iframe>
                                </div>
                                <h5 class="card-title pt-2">Video: Top 5 avances en la detección y tratamiento del cáncer</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pestaña de Estilos de Vida -->
            <div class="tab-pane fade" id="estilos-vida" role="tabpanel">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="../img/educacion/educacion-alimentacion.jpg" class="card-img-top" alt="Estilos de Vida 1">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Alimentación saludable</h5>
                                <p class="card-text mb-3">Consejos para una dieta que reduce el riesgo de cáncer.</p>
                                <a href="alimentacion.php" class="btn btn-primary mt-auto btn-custom">Leer más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="../img/educacion/educacion-ejercicio.jpg" class="card-img-top" alt="Estilos de Vida 2">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Ejercicio físico</h5>
                                <p class="card-text mb-3">Cómo el ejercicio puede ayudar a prevenir el cáncer.</p>
                                <a href="ejercicio.php" class="btn btn-primary mt-auto btn-custom">Leer más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column">
                                <div class="ratio ratio-16x9 py-4">
                                    <iframe src="https://www.youtube.com/embed/AtJ844kIczE" title="ESTILOS DE VIDA SALUDABLE, PREVENCIÓN DEL CÁNCER Y SUPERVIVENCIA TRAS SUFRIR UN CÁNCER" allowfullscreen></iframe>
                                </div>
                                <h5 class="card-title  pt-2">Video: ESTILOS DE VIDA SALUDABLE, PREVENCIÓN DEL CÁNCER Y SUPERVIVENCIA TRAS SUFRIR UN CÁNCER</h5>
                            </div>
                        </div>
                    </div>
                </div>
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