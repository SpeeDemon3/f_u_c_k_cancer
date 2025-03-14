<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['id']) || !isset($_SESSION['rol'])) {
    session_destroy();
    header("Location: ../login.php");
    exit();
}

// Incluir la conexión a la base de datos
require_once(__DIR__ . '/../../bd/functionBd.php');

// Verificar si se ha proporcionado un ID de noticia
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Obtener el ID de la noticia
    $id = $_GET['id'];
}

// Validar que el ID sea un número entero
if (!is_numeric($id)) {
    die("Error: El ID de la noticia no es válido.");
}

$id = intval($id); // Convertir a entero

// Obtener los datos de la asociacion desde la base de datos
$result = getAssociationById($id);

if ($row = $result->fetch_assoc()) {
    // Mostrar el formulario de edición
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Noticia</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../../css/style.css">
        <script src="../js/validateFormEditAssociation.js" defer></script>
    </head>

    <body class="d-flex flex-column min-vh-100">
        <!-- Barra de navegación -->
        <nav id="nav-principal" class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <!-- Logo + Nombre -->
                <a class="navbar-brand d-flex align-items-center" href="../../index.php">
                    <img src="../../img/logo-web.jpg" alt="Logo" height="70" class="me-4" style="border-radius: 20px;">
                    Panel de Administración
                </a>
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav" id="list-ul-nav">
                        <li class="nav-item"><a class="nav-link" href="../../index.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../pages/asociaciones.php">Asociaciones</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../pages/noticias.php">Noticias</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../pages/educacion.php">Educación</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-danger text-white" href="../logout.php">Salir</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="flex-grow-1 mb-3">
            <div class="container mt-5">
                <h1 class="text-center">Editar Asociación</h1>
                <form id="form-association" action="../process/processAssociationEdit.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="mb-3">
                        <label for="nombre_asociacion" class="form-label">Nombre</label>
                        <span id="error-name"></span>
                        <input type="text" id="name" name="nombre_asociacion" class="form-control" value="<?php echo htmlspecialchars($row['nombre_asociacion']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <span id="error-email"></span>
                        <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($row['email']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">Contraseña</label>
                        <span id="error-pass"></span>
                        <input type="password" id="pass" name="pass" class="form-control" value="<?php echo htmlspecialchars($row['pass']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <span id="error-descripcion"></span>
                        <textarea id="descripcion" name="descripcion" class="form-control" rows="5" required><?php echo htmlspecialchars($row['descripcion']); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Logo</label>
                        <input type="file" id="image" name="imagen" class="form-control">
                        <small class="text-muted">Deja este campo vacío si no deseas cambiar la imagen.</small>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <span id="error-phone"></span>
                        <input type="text" id="phone" name="telefono" class="form-control" value="<?php echo htmlspecialchars($row['telefono']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="sitio_web" class="form-label">Sitio Web</label>
                        <span id="error-web"></span>
                        <input type="text" id="web" name="sitio_web" class="form-control" value="<?php echo htmlspecialchars($row['sitio_web']); ?>" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        <a href="../../index.php" class="btn btn-secondary">Cancelar</a>
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

<?php
} else {

    header("Location: ../../index.php");
    exit();
}
?>