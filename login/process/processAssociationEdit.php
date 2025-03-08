<?php
session_start();

// Si la sesion no existe volvemos a la pagina de login
if(!isset($_SESSION['id'])  || !isset($_SESSION['rol'])) {
    session_start();
    session_destroy();
    header("Location: ../login.php");
    exit();
}

// Incluir la conexión a la base de datos
require_once(__DIR__ . '/../../bd/functionBd.php');

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $control = false;

    // Obtener y validar los datos del formulario
    if(isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
    }

    if(isset($_POST['nombre_asociacion']) && !empty($_POST['nombre_asociacion'])) {
        $name = trim($_POST['nombre_asociacion']);
        if (strlen($name) < 3 || strlen($name) > 100) {
            $control = true;
        }
    }

    if(isset($_POST['email']) && !empty($_POST['email'])) {
        $email = trim($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $control = true;
        }    
    }

    if(isset($_POST['pass']) && !empty($_POST['pass'])) {
        $pass = trim($_POST['pass']);
        if (strlen($pass) < 8) {
            $errors[] = "La contraseña debe tener al menos 8 caracteres.";
        }
    }

    if(isset($_POST['descripcion']) && !empty($_POST['descripcion'])) {
        $descripcion = trim($_POST['descripcion']);
        if (strlen($descripcion) < 10 || strlen($descripcion) > 500) {
            $control = true;
        }
    }

    if(isset($_POST['telefono']) && !empty($_POST['telefono'])) {
        $phone = trim($_POST['telefono']);
        if (!preg_match('/^\+?(\d[\s-]?){7,15}$/', $phone)) {
            $control = true;
        }    
    }

    if(isset($_POST['sitio_web']) && !empty($_POST['sitio_web'])) {
        $webSite = trim($_POST['sitio_web']);
        if (!filter_var($webSite, FILTER_VALIDATE_URL)) {
            $control = true;
        }    
    }

    // Validar que el ID sea un número entero
    if (!is_numeric($id)) {
        die("Error: El ID de la noticia no es válido.");
    }

    $id = intval($id); // Convertir a entero

    // Procesar la imagen (si se subió una nueva)
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $carpetaImagenes = __DIR__ . '/../../img/logo-asociacion/';
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes, 0777, true);
        }

        $nombreArchivo = uniqid() . '_' . basename($_FILES['imagen']['name']);
        $rutaImagen = $carpetaImagenes . $nombreArchivo;

        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen)) {
            $imagenUrl = 'img/logo-asociacion/' . $nombreArchivo;
        } else {
            die("Error al subir la imagen.");
        }
    } else {
        // Si no se subió una nueva imagen, mantener la imagen actual
        $imagenUrl = null;
    }
    
    if ($control == false) {
        $result = false;

        // Actualizar la noticia en la base de datos
        if ($imagenUrl) {
            $result = updateUserWithImage($id, $name, $email, $pass, $descripcion, $imagenUrl, $phone, $webSite);
        } else {
            $result = updateUser($id, $name, $email, $pass, $descripcion, $phone, $webSite);
        }
    
        if ($result) {
            header("Location: ../pages/admin.php");
            exit();
        } else {
            die("Error al actualizar la asociación.");
        }
    }

} else {
    die("Error: Método de solicitud no válido.");
}
?>