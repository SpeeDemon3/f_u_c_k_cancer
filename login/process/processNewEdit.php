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

    $control = true;

    // Obtener y validar los datos del formulario
    if(isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
    }

    if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {
        $titulo = $_POST['titulo'];
        if (strlen($titulo) < 8) {
            $control = false;
        }
    }

    if(isset($_POST['contenido']) && !empty($_POST['contenido'])) {
        $contenido = $_POST['contenido'];
        if (strlen($contenido) < 8) {
            $control = false;
        }
    }


    // Validar que el ID sea un número entero
    if (!is_numeric($id)) {
        die("Error: El ID de la noticia no es válido.");
    }

    $id = intval($id); // Convertir a entero

    // Procesar la imagen (si se subió una nueva)
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $carpetaImagenes = __DIR__ . '/../../img/noticias/';
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes, 0777, true);
        }

        $nombreArchivo = uniqid() . '_' . basename($_FILES['imagen']['name']);
        $rutaImagen = $carpetaImagenes . $nombreArchivo;

        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen)) {
            $imagenUrl = 'img/noticias/' . $nombreArchivo;
        } else {
            die("Error al subir la imagen.");
        }
    } else {
        // Si no se subió una nueva imagen, mantener la imagen actual
        $imagenUrl = null;
    }
    
    if($control == true) {

        $result = false;

        // Actualizar la noticia en la base de datos
        if ($imagenUrl) {
            $result = updateNewWithImage($id, $titulo, $contenido, $imagenUrl);
        } else {
            $result = updateNewImage($id, $titulo, $contenido);
        }
    
        if ($result) {
            if($_SESSION['rol'] == 1) {
                header("Location: ../pages/asociacion.php");
                exit();
            }
            
            if($_SESSION['rol'] == 3) {
                header("Location: ../pages/admin.php");
                exit();
            }
        } else {
            die("Error al actualizar la noticia.");
        }
        
    }

} else {
    die("Error: Método de solicitud no válido.");
}
?>