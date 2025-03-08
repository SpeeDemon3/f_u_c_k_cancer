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
    <title>Noticias - Unidos Contra el Cáncer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg-light">

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
                    <li class="nav-item"><a class="nav-link" href="#">Noticias</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Educación</a></li>
                    <li class="nav-item"><a class="nav-link" href="../login/login.php" id="login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Encabezado -->
    <div class="container mt-4">
        <h2 class="text-center mb-4">Últimas Noticias</h2>
        
        <!-- Sección de Noticias -->
        <div class="row">
            <?php
                // Configuración de la base de datos
                $host = "localhost";
                $dbname = "mi_base_de_datos";
                $username = "root";
                $password = "";

                try {
                    // Conexión a la base de datos usando PDO
                    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Consulta SQL para obtener noticias
                    $stmt = $pdo->query("SELECT * FROM noticias ORDER BY fecha_publicacion DESC LIMIT 6");

                    // Mostrar las noticias
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="col-md-4 mb-4">
                                <div class="card shadow-sm">
                                    <img src="' . htmlspecialchars($row["imagen"]) . '" class="card-img-top" alt="Noticia">
                                    <div class="card-body">
                                        <h5 class="card-title">' . htmlspecialchars($row["titulo"]) . '</h5>
                                        <p class="card-text">' . htmlspecialchars($row["descripcion"]) . '</p>
                                        <a href="' . htmlspecialchars($row["enlace"]) . '" class="btn btn-primary" target="_blank">Leer más</a>
                                    </div>
                                </div>
                            </div>';
                    }
                } catch (PDOException $e) {
                    echo "<p class='text-danger text-center'>Error al conectar con la base de datos: " . $e->getMessage() . "</p>";
                }
            ?>
        </div>
    </div>


    <footer id="footer-principal" class="text-white text-center py-4">
        <p class="mb-0">&copy; 2025 Unidos Contra el Cáncer. Todos los derechos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
