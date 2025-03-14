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
    <title>Alimentación Saludable - Prevención del Cáncer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg-light d-flex flex-column min-vh-100">

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

    <header class="text-black text-center py-5">
        <div class="container">
            <h1 class="fw-bold">Alimentación Saludable y Prevención del Cáncer</h1>
            <p class="lead">Una dieta equilibrada puede reducir el riesgo de desarrollar cáncer.</p>
        </div>
    </header>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="../img/educacion/alimentacion-sal.jpg" class="img-fluid rounded shadow-lg" alt="Alimentación Saludable">
            </div>
            <div class="col-md-6">
                <h2 class="text-primary">¿Cómo influye la alimentación en la prevención?</h2>
                <p>Una dieta rica en frutas, verduras y fibra puede reducir el riesgo de varios tipos de cáncer. Evitar el consumo excesivo de azúcares y grasas procesadas también es clave.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>✔ Antioxidantes:</strong> Reducen el daño celular.</li>
                    <li class="list-group-item"><strong>✔ Fibra:</strong> Favorece la salud digestiva.</li>
                    <li class="list-group-item"><strong>✔ Grasas saludables:</strong> Benefician el organismo.</li>
                    <li class="list-group-item"><strong>✔ Menos ultraprocesados:</strong> Reduce toxinas y conservantes dañinos.</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h2 class="text-center text-primary mb-4">Alimentos Claves en la Prevención del Cáncer</h2>
        <div class="accordion" id="accordionFood">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#frutasVerduras">
                        🥦 Frutas y Verduras
                    </button>
                </h2>
                <div id="frutasVerduras" class="accordion-collapse collapse show" data-bs-parent="#accordionFood">
                    <div class="accordion-body">
                        <p>Las frutas y verduras contienen vitaminas y antioxidantes que protegen las células del daño.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#granosIntegrales">
                        🌾 Granos Integrales
                    </button>
                </h2>
                <div id="granosIntegrales" class="accordion-collapse collapse" data-bs-parent="#accordionFood">
                    <div class="accordion-body">
                        <p>Los cereales integrales aportan fibra y ayudan a la digestión, reduciendo el riesgo de cáncer colorrectal.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#proteinasSaludables">
                        🥩 Proteínas Saludables
                    </button>
                </h2>
                <div id="proteinasSaludables" class="accordion-collapse collapse" data-bs-parent="#accordionFood">
                    <div class="accordion-body">
                        <p>El pescado, las legumbres y los frutos secos son excelentes fuentes de proteínas saludables.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5 text-center">
        <h2 class="text-center text-primary mb-4">Video: Alimentación Saludable Durante La Quimioterapia</h2>
        <div class="d-flex justify-content-center mt-5">
            <div class="ratio ratio-16x9" style="max-width: 900px;">
                <iframe src="https://www.youtube.com/embed/hCugiUboAYo" title="CONVIVIENDO CON EL CÁNCER | Alimentación durante la Quimioterapia" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <footer id="footer-principal" class="text-white text-center py-4 mt-auto">
        <p class="mb-0">&copy; 2025 Unidos Contra el Cáncer. Todos los derechos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>