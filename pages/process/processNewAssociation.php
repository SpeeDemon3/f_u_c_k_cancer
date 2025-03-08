<?php
    session_start();

    // Incluir la conexión a la base de datos
    require_once(__DIR__ . '/../../bd/functionBd.php');

    // Obtener y validar los datos del formulario
    if(isset($_POST['nombre_asociacion']) && !empty($_POST['nombre_asociacion'])) {
        $name = $_POST['nombre_asociacion'];
    }

    if(isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
    }

    if(isset($_POST['pass']) && !empty($_POST['pass'])) {
        $pass = $_POST['pass'];
    }

    if(isset($_POST['descripcion']) && !empty($_POST['descripcion'])) {
        $descripcion = $_POST['descripcion'];
    }

    if(isset($_POST['telefono']) && !empty($_POST['telefono'])) {
        $phone = $_POST['telefono'];
    }

    if(isset($_POST['sitio_web']) && !empty($_POST['sitio_web'])) {
        $webSite = $_POST['sitio_web'];
    }


    // Verificar si se subió una imagen
    $imagePath = ""; // Por defecto, vacío
    if (!empty($_FILES['imagen']['name'])) {
        $uploadDir = __DIR__ . "/../../img/logo-asociacion/"; // Carpeta donde se guardará la imagen
        $fileName = time() . "_" . basename($_FILES["imagen"]["name"]); // Evita nombres repetidos
        $targetFilePath = $uploadDir . $fileName;

        // Extensiones permitidas
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        if (in_array($fileType, $allowedTypes)) {
            // Mueve la imagen a la carpeta
            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $targetFilePath)) {
                $imagePath = "img/logo-asociacion/" . $fileName; // Ruta para guardar en BD
            } else {
                die("Error al subir la imagen.");
            }
        } else {
            die("Formato de imagen no permitido.");
        }
    }


    // Insertar la nueva asociación en la base de datos
    $result = insertAssociation($name, $email, $pass, $descripcion, $imagePath, $phone, $webSite);

    header("Location: ../../index.php");

?>