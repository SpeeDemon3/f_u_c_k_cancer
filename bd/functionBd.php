<?php

require_once(__DIR__ . "/dataBd.php");
require_once(__DIR__ . "/../functions/tools.php");

$con = mysqli_connect($host, $username, $password, $dbname) or die("Error al conectar con la base de datos.");

/**
 * Metodo para insertar usuarios en la base de datos
 */
function insertUser($name, $pass, $email, $rol)
{

    // Rol asociacion 1
    // Rol admin 3

    // Si el rol del usuario no es administrador por defecto se le asigna el rol de usuario normal
    if ($rol != 3) {
        $rol = 1;
    }

    $query = "INSERT INTO users (nombre, email, pass, rol) VALUES ('$name', '$pass', '$email', $rol);";
    mysqli_query($GLOBALS('con'), $query) or die("Error al insertar usuario");
}

/**
 * Metodo para obtebner todos los usuarios.
 */
function getUsers()
{

    $query = "SELECT * FROM users;";
    $result = mysqli_query($GLOBALS['con'], $query) or die("Error en la consulta a la base de datos");

    if (mysqli_num_rows($result)) {
        $usersArray = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $usersArray += $row;
        }

        return $usersArray;
    }

    return null;
}

/**
 * Metodo para listar los usuarios de la base de datos
 * en el HTML.
 */
function getUsersList()
{

    $query = "SELECT * FROM users;";
    $result = mysqli_query($GLOBALS['con'], $query) or die("Error en la consulta a la base de datos");

    if (mysqli_num_rows($result)) {

        echo "
                <table>
                    <tr>
                        <td>Nombre</td>
                        <td>Email</td>
                        <td>Password</td>
                        <td>Rol</td>
                    </tr>
            ";

        while ($row = mysqli_fetch_array($result)) {
            extract($row);
            echo "<tr>";
            echo "
                    <td>$nombre</td>
                    <td>$email</td>
                    <td>$pass</td>
                ";

            if ($rol === 1) {
                echo "<td>Usuario</td>";
            }


            if ($rol === 3) {
                echo "<td>Administrador</td>";
            }

            echo "</tr>";
        }


        echo "
                </table>
            ";
    }

    return "<p>No hay usuarios disponibles en este momento.</p>";
}

/**
 * Metodo para obtener un usuario por su id.
 */
function getAssociationById($id)
{
    $query = "SELECT * FROM associations WHERE id = $id;";
    $result = mysqli_query($GLOBALS['con'], $query) or die("Error en la consulta a la base de datos");

    return $result;
}

/**
 * Metodo para mostrar todas las asociaciones disponibles
 */
function getAllAssociation()
{
    $query = "SELECT * FROM associations";
    $result = mysqli_query($GLOBALS['con'], $query) or die("Error en la consulta");

    if (mysqli_num_rows($result) > 0) {
        echo "            
            <table class='table table-striped mt-3'>
                <thead class='table-dark'>
                    <tr>
                        <th class='text-center align-middle'>Nombre Asociación</th>
                        <th class='text-center align-middle'>Correo</th>
                        <th class='text-center align-middle d-none d-sm-table-cell'>Descripción</th>
                        <th class='text-center align-middle'>Logo</th>
                        <th class='text-center align-middle d-none d-sm-table-cell'>Teléfono</th>
                        <th class='text-center align-middle d-none d-sm-table-cell'>Sitio Web</th>
                        <th class='text-center align-middle'>Página</th>
                    </tr>
                </thead>
                <tbody>
        ";

        while ($row = mysqli_fetch_array($result)) {
            extract($row);
            echo "
                <tr>
                    <td class='text-center align-middle'>$nombre_asociacion</td>
                    <td class='text-center align-middle'>$email</td>
                    <td class='text-center align-middle d-none d-sm-table-cell'>$descripcion</td>
                    <td class='text-center align-middle'>
                        <img src='../$logo' alt='Logo' width='50' height='50' style='object-fit: cover; border-radius: 5px;'>
                    </td>
                    <td class='text-center align-middle d-none d-sm-table-cell'>$telefono</td>
                    <td class='text-center align-middle d-none d-sm-table-cell'>
                        <a style='color:#9e5af9; text-decoration: none;' href='$sitio_web' target='_blank'>$sitio_web</a>
                    </td>
                    <td class='text-center align-middle'>
                        <a href='../$pagina' class='btn btn-primary btn-sm'>Ver Página</a>
                    </td>
                </tr>
            ";
        }

        echo "
                </tbody>
            </table>
        ";
    }
}


function getAllAssociation1()
{
    $query = "SELECT * FROM associations";
    $result = mysqli_query($GLOBALS['con'], $query) or die("Error en la consulta");

    // Si la consulta devuelve registros
    if (mysqli_num_rows($result) > 0) {
        // Genero una tabla
        echo "            
                <table class='table table-striped mt-3'>
                    <thead class='table-dark'>
                        <tr>
                            <th class='text-center align-middle'>Nombre Asociacion</th>
                            <th class='text-center align-middle'>Correo</th>
                            <th class='text-center align-middle d-none d-sm-table-cell'>Descripción</th>
                            <th class='text-center align-middle'>Logo</th>
                            <th class='text-center align-middle d-none d-sm-table-cell'>Teléfono</th>
                            <th class='text-center align-middle d-none d-sm-table-cell'>Sitio Web</th>
                        </tr>
                    </thead>
                    <tbody>
            ";
        // Obtengo los registros y los muestro en la tabla
        while ($row = mysqli_fetch_array($result)) {
            extract($row);
            echo "
                    <tr>
                        <td class='text-center align-middle'>$nombre_asociacion</td>
                        <td class='text-center align-middle'>$email</td>
                        <td class='text-center align-middle d-none d-sm-table-cell'>$descripcion</td>
                        <td class='text-center align-middle'>
                            <img src='../$logo' alt='Logo' width='50' height='50' style='object-fit: cover; border-radius: 5px;'>
                        </td>
                        <td class='text-center align-middle d-none d-sm-table-cell'>$telefono</td>
                        <td class='text-center align-middle d-none d-sm-table-cell'><a style='color:#9e5af9; text-decoration: none;' href='$sitio_web'>$sitio_web</a></td>
                    </tr>
                ";
        }

        echo "
                    </tbody>
                </table>
            ";
    }
}

/**
 * Metodo para obtener un usuario por su email y password.
 */
function getUserByEmailAndPass($email, $pass)
{
    $query = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass';";
    $result = mysqli_query($GLOBALS['con'], $query) or die("Error en la consulta a la base de datos");

    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}

function deleteUser($id)
{
    $query = "DELETE FROM associations WHERE id = $id;";
    $result = mysqli_query($GLOBALS['con'], $query) or die("Error al eliminar registro.");

    if ($result) {
        return true;
    } else {
        return false;
    }
}

/**
 * Metodo para actualizar un usuario sin foto
 */
/*
    function updateUser($id, $name, $email, $pass, $descripcion, $phone, $webSite) {
    
        // Actualizar la consulta para usar la contraseña encriptada
        $query = "UPDATE associations 
                  SET nombre_asociacion = '$name', 
                      email = '$email', 
                      pass = '$pass', 
                      descripcion = '$descripcion', 
                      telefono = '$phone', 
                      sitio_web = '$webSite' 
                  WHERE id = $id";
    
        $result = mysqli_query($GLOBALS['con'], $query) or die("Error al actualizar el registro.");
        return $result;
    }
    */

/**
 * Metodo para actualizar un usuario sin foto
 */
function updateUser($id, $name, $email, $pass, $descripcion, $phone, $webSite)
{
    // Obtener el user_id de la asociación
    $query = "SELECT user_id FROM associations WHERE id = $id";
    $result = mysqli_query($GLOBALS['con'], $query);
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['user_id'];

    // Actualizar la tabla associations
    $queryAssociations = "UPDATE associations 
                              SET nombre_asociacion = '$name', 
                                  email = '$email', 
                                  pass = '$pass', 
                                  descripcion = '$descripcion', 
                                  telefono = '$phone', 
                                  sitio_web = '$webSite' 
                              WHERE id = $id";

    $resultAssociations = mysqli_query($GLOBALS['con'], $queryAssociations) or die("Error al actualizar la asociación.");

    // Actualizar la tabla users
    $queryUsers = "UPDATE users 
                       SET nombre = '$name', 
                           email = '$email', 
                           pass = '$pass' 
                       WHERE id = $user_id";

    $resultUsers = mysqli_query($GLOBALS['con'], $queryUsers) or die("Error al actualizar el usuario.");

    return $resultAssociations && $resultUsers;
}

/**
 * Metodo para actualizar un usuario con foto
 */
/*
    function updateUserWithImage($id, $name, $email, $pass, $descripcion, $image, $phone, $webSite) {
    
        // Actualizar la consulta para usar la contraseña encriptada
        $query = "UPDATE associations 
                  SET nombre_asociacion = '$name', 
                      email = '$email', 
                      pass = '$pass', 
                      descripcion = '$descripcion', 
                      logo = '$image', 
                      telefono = '$phone', 
                      sitio_web = '$webSite' 
                  WHERE id = $id";
    
        $result = mysqli_query($GLOBALS['con'], $query) or die("Error al actualizar el registro.");
        return $result;
    }
*/

/**
 * Metodo para actualizar un usuario con foto
 */
function updateUserWithImage($id, $name, $email, $pass, $descripcion, $image, $phone, $webSite)
{
    // Obtener el user_id de la asociación
    $query = "SELECT user_id FROM associations WHERE id = $id";
    $result = mysqli_query($GLOBALS['con'], $query);
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['user_id'];

    // Actualizar la tabla associations
    $queryAssociations = "UPDATE associations 
                              SET nombre_asociacion = '$name', 
                                  email = '$email', 
                                  pass = '$pass', 
                                  descripcion = '$descripcion', 
                                  logo = '$image', 
                                  telefono = '$phone', 
                                  sitio_web = '$webSite' 
                              WHERE id = $id";

    $resultAssociations = mysqli_query($GLOBALS['con'], $queryAssociations) or die("Error al actualizar la asociación.");

    // Actualizar la tabla users
    $queryUsers = "UPDATE users 
                       SET nombre = '$name', 
                           email = '$email', 
                           pass = '$pass' 
                       WHERE id = $user_id";

    $resultUsers = mysqli_query($GLOBALS['con'], $queryUsers) or die("Error al actualizar el usuario.");

    return $resultAssociations && $resultUsers;
}

/**
 * Metodo para obtener una noticia por su id
 */
function getNewById($id)
{
    $query = "SELECT * FROM news WHERE id = $id";
    $result = mysqli_query($GLOBALS['con'], $query) or die("Error en la consulta.");
    return $result;
}

/**
 * Metodo para obtener todas las noticias de un usuario por su id
 */
function getNewsByUser($id)
{
    $query = "SELECT * FROM news WHERE autor_id = $id ORDER BY fecha_publicacion DESC";
    $result = mysqli_query($GLOBALS['con'], $query) or die("Error en la consulta.");

    echo '<h4 class="mt-4 text-center">Noticias Publicadas</h4>';
    echo '<div class="row">';

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            // Ruta absoluta desde la raíz del proyecto
            $ruta_imagen = '../../' . $row["imagen_url"];

            // Limitar el contenido a 100 caracteres
            $contenido = htmlspecialchars($row["contenido"]);
            $contenido_limitado = strlen($contenido) > 100 ? substr($contenido, 0, 100) . '...' : $contenido;

            echo '<div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="d-flex justify-content-center">
                            <img src="' . htmlspecialchars($ruta_imagen) . '" class="card-img-top img-fluid" alt="Noticia" style="max-width: 100%; height: auto;">
                        </div>
                        <div class="card-body">
                            <h5 class="text-center">' . htmlspecialchars($row["titulo"]) . '</h5>
                            <p class="text-center">' . $contenido_limitado . '</p>
                            <p class="text-center">' . htmlspecialchars($row["fecha_publicacion"]) . '</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="../../' . htmlspecialchars($row["ruta_pagina"]) . '" class="btn btn-primary">Leer más</a>
                                <a href="editar_noticia.php?id=' . $row["id"] . '" class="btn btn-warning">Editar</a>
                                <a href="eliminar_noticia.php?id=' . $row["id"] . '" class="btn btn-danger">Eliminar</a>
                            </div>
                        </div>
                    </div>
                </div>';
        }
    } else {
        echo "<h5 style='text-align: center;'>No tienes noticias disponibles.</h5>";
    }

    echo "</div>";
}

/**
 * Metodo para obtener todas las Asociaciones de la base de datos
 */
function getAssociationManagement()
{
    $query = "SELECT * FROM associations";
    $result = mysqli_query($GLOBALS['con'], $query) or die("Error en la consulta");

    // Si la consulta devuelve registros
    if (mysqli_num_rows($result) > 0) {
        // Genero una tabla
        echo "            
                <table class='table table-striped mt-4'>
                    <thead class='table-dark'>
                        <tr>
                            <th class='text-center align-middle'>ID</th>
                            <th class='text-center align-middle'>Nombre Asociacion</th>
                            <th class='text-center align-middle'>Correo</th>
                            <th class='text-center align-middle'>Descripción</th>
                            <th class='text-center align-middle'>Logo</th>
                            <th class='text-center align-middle'>Teléfono</th>
                            <th class='text-center align-middle'>Sitio Web</th>
                            <th class='text-center align-middle'>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
            ";
        // Obtengo los registros y los muestro en la tabla
        while ($row = mysqli_fetch_array($result)) {
            extract($row);
            echo "
                    <tr>
                        <td class='text-center align-middle'>$id</td>
                        <td class='text-center align-middle'>$nombre_asociacion</td>
                        <td class='text-center align-middle'>$email</td>
                        <td class='text-center align-middle'>$descripcion</td>
                        <td class='text-center align-middle'>
                                <img src='../../$logo' alt='Logo' width='50' height='50' style='object-fit: cover; border-radius: 5px;'>
                        </td>
                        <td class='text-center align-middle'>$telefono</td>
                        <td class='text-center align-middle'>$sitio_web</td>
                        <td class='text-center align-middle'>
                        <div class='d-grid gap-2 d-md-flex'>
                            <a href='editar_asociacion.php?id=$id' class='btn btn-warning flex-fill'>Editar</a>
                            <a href='eliminar_asociacion.php?id=$id' class='btn btn-danger flex-fill'>Eliminar</a>
                        </div>
                        </td>
                    </tr>
                ";
        }

        echo "
                    </tbody>
                </table>
            ";
    }
}

function updateNewWithImage($newId, $title, $content, $newUrlImage)
{
    $currentDate = date('Y-m-d H:i:s'); // Fecha y hora actual
    $query = "UPDATE news SET titulo = '$title', contenido = '$content', imagen_url = '$newUrlImage', fecha_publicacion = '$currentDate' WHERE id = $newId";
    $result = mysqli_query($GLOBALS['con'], $query) or die("Error al actualizar el registro.");
    return $result;
}

function updateNewImage($newId, $title, $content)
{
    $currentDate = date('Y-m-d H:i:s'); // Fecha y hora actual
    $query = "UPDATE news SET titulo = '$title', contenido = '$content', fecha_publicacion = '$currentDate' WHERE id = $newId";
    $result = mysqli_query($GLOBALS['con'], $query) or die("Error al actualizar el registro.");
    return $result;
}

function insertNew($title, $content, $imageUrl, $userId)
{

    $publicationDate = date('Y-m-d H:i:s'); // Fecha y hora actual

    // Generar una URL única para la noticia
    $url = generarUrlUnica($title);

    // Insertar la noticia
    $query = "INSERT INTO news (titulo, contenido, imagen_url, fecha_publicacion, autor_id) 
                VALUES ('$title', '$content', '$imageUrl', '$publicationDate', $userId)";

    $result = mysqli_query($GLOBALS['con'], $query) or die("Error al insertar la noticia: " . mysqli_error($GLOBALS['con']));
}


function obtenerNombreAutor($userId)
{
    // Consultar la base de datos para obtener el nombre del autor
    $query = "SELECT nombre FROM users WHERE id = $userId";
    $result = mysqli_query($GLOBALS['con'], $query) or die("Error al obtener el nombre del autor: " . mysqli_error($GLOBALS['con']));

    if ($row = mysqli_fetch_assoc($result)) {
        return $row['nombre'];
    } else {
        return "Desconocido";
    }
}

function deleteNew($newId)
{
    $query = "DELETE FROM news WHERE id = $newId";
    $result = mysqli_query($GLOBALS['con'], $query) or die("Error al eliminar el registro");
}

/**
 * Metodo para insertar asociaciones
 */
function insertAssociation($name, $email, $pass, $descripcion, $urlImage, $phone, $webSite)
{
    $conn = $GLOBALS['con'];

    // Insertar en la tabla users
    $queryUser = "INSERT INTO users (nombre, email, pass) VALUES (?, ?, ?)";
    $stmtUser = $conn->prepare($queryUser);

    if (!$stmtUser) {
        die("Error en la consulta de usuarios: " . $conn->error);
    }

    $stmtUser->bind_param("sss", $name, $email, $pass);
    if (!$stmtUser->execute()) {
        die("Error al insertar usuario: " . $stmtUser->error);
    }

    $userId = $stmtUser->insert_id;
    $stmtUser->close();

    // Generar la página de la asociación
    $pagina = generarPaginaAsociacion($name, $descripcion, $urlImage, $phone, $webSite);
    if (!$pagina) {
        die("Error al crear la página de la asociación.");
    }

    // Insertar en la tabla associations
    $queryAssociation = "INSERT INTO associations (nombre_asociacion, email, pass, descripcion, logo, telefono, sitio_web, pagina, user_id) 
                         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmtAssociation = $conn->prepare($queryAssociation);

    if (!$stmtAssociation) {
        die("Error en la consulta de asociaciones: " . $conn->error);
    }

    $stmtAssociation->bind_param("ssssssssi", $name, $email, $pass, $descripcion, $urlImage, $phone, $webSite, $pagina, $userId);
    if (!$stmtAssociation->execute()) {
        die("Error al insertar asociación: " . $stmtAssociation->error);
    }

    $stmtAssociation->close();

    echo "Asociación registrada con éxito y página creada.";
}




function insertAssociation1($name, $email, $pass, $descripcion, $urlImage, $phone, $webSite)
{

    $conn = $GLOBALS['con'];

    // Insertar en la tabla users
    $queryUser = "INSERT INTO users (nombre, email, pass) VALUES (?, ?, ?)";
    $stmtUser = $conn->prepare($queryUser);

    if (!$stmtUser) {
        die("Error en la preparación de la consulta de usuarios: " . $conn->error);
    }

    $stmtUser->bind_param("sss", $name, $email, $pass);
    if (!$stmtUser->execute()) {
        die("Error al insertar usuario: " . $stmtUser->error);
    }

    // Obtener el ID del usuario insertado
    $userId = $stmtUser->insert_id;
    $stmtUser->close();

    // Insertar en la tabla associations
    $queryAssociation = "INSERT INTO associations (nombre_asociacion, email, pass, descripcion, logo, telefono, sitio_web, user_id) 
                             VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmtAssociation = $conn->prepare($queryAssociation);

    if (!$stmtAssociation) {
        die("Error en la preparación de la consulta de asociaciones: " . $conn->error);
    }

    $stmtAssociation->bind_param("sssssssi", $name, $email, $pass, $descripcion, $urlImage, $phone, $webSite, $userId);
    if (!$stmtAssociation->execute()) {
        die("Error al insertar asociación: " . $stmtAssociation->error);
    }

    $stmtAssociation->close();

    echo "Asociación registrada con éxito.";
}

function updateNoticiaPath($noticia_id, $ruta_pagina)
{
    global $con;
    $query = "UPDATE news SET ruta_pagina = ? WHERE id = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "si", $ruta_pagina, $noticia_id);
    mysqli_stmt_execute($stmt);
}

// Función para insertar la noticia y devolver su ID
function insertNewPrep($titulo, $descripcion, $ruta_imagen, $usuario_id)
{
    $publicationDate = date('Y-m-d H:i:s'); // Fecha y hora actual

    global $con;
    $query = "INSERT INTO news (titulo, contenido, imagen_url, fecha_publicacion, autor_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ssssi", $titulo, $descripcion, $ruta_imagen, $publicationDate, $usuario_id);
    mysqli_stmt_execute($stmt);
    return mysqli_insert_id($con); // Devuelve el ID de la noticia creada
}

/**
 * Metodo para obtener y mostrar en la pagina 
 * index las 2 ultimas noticias disponibles.
 */
function getLastTwoNews() {

    $query = "SELECT * FROM news ORDER BY fecha_publicacion DESC LIMIT 2";
    $result = mysqli_query($GLOBALS['con'], $query) or die("Error en la consulta.");

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $ruta_imagen = $row["imagen_url"];
            $contenido = htmlspecialchars($row["contenido"]);
            $contenido_limitado = strlen($contenido) > 100 ? substr($contenido, 0, 100) . '...' : $contenido;

            echo '<div class="col-md-5 col-sm-12 mb-3 d-flex justify-content-center">
                    <div class="card" style="width: 100%;">
                        <img src="' . htmlspecialchars($ruta_imagen) . '" class="card-img-top img-fluid" alt="Noticia" style="height: 500px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title text-center">' . htmlspecialchars($row["titulo"]) . '</h5>
                            <p class="card-text text-center">' . $contenido_limitado . '</p>
                            <p class="text-center">' . htmlspecialchars($row["fecha_publicacion"]) . '</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="' . htmlspecialchars($row["ruta_pagina"]) . '" class="btn btn-primary btn-custom">Leer más</a>
                            </div>
                        </div>
                    </div>
                </div>';
        }
    } else {
        echo "<h5 class='text-center'>No tienes noticias disponibles.</h5>";
    }

}

/**
 * Metodo para mostrar las ultimas 3 asociaciones registradas
 */
function mostrarUltimasAsociaciones()
{
    // Consulta para obtener las 3 últimas asociaciones
    $query = "SELECT * FROM associations ORDER BY nombre_asociacion DESC LIMIT 3";
    $result = mysqli_query($GLOBALS['con'], $query) or die("Error en la consulta");

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            extract($row);

            // Limitar el contenido a 100 caracteres
            $contenido = htmlspecialchars($descripcion);
            $contenido_limitado = strlen($contenido) > 100 ? substr($contenido, 0, 100) . '...' : $contenido;

            echo '<div class="col-md-4 col-sm-12 mb-3">
                    <div class="card h-100 d-flex flex-column">
                        <img src="' . htmlspecialchars($logo) . '" class="card-img-top" alt="Asociación ' . htmlspecialchars($nombre_asociacion) . '">
                        <div class="card-body flex-grow-1 d-flex flex-column">
                            <h5 class="card-title">' . htmlspecialchars($nombre_asociacion) . '</h5>
                            <p class="card-text flex-grow-1">' . htmlspecialchars($contenido_limitado) . '</p>
                            <div class="text-start">
                                <a href="pages/asociaciones.php" class="btn btn-primary btn-sm py-2 mt-auto btn-custom">Ver más</a>
                            </div>
                        </div>
                    </div>
                </div>';
        }
    } else {
        echo "<p style='text-align: center;'>No hay asociaciones disponibles en este momento.</p>";
    }
}


function mostrarUltimasAsociaciones2()
{
    // Consulta para obtener las 3 últimas asociaciones
    $query = "SELECT * FROM associations ORDER BY nombre_asociacion DESC LIMIT 3";
    $result = mysqli_query($GLOBALS['con'], $query) or die("Error en la consulta");

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            extract($row);

            // Limitar el contenido a 100 caracteres
            $contenido = htmlspecialchars($descripcion);
            $contenido_limitado = strlen($contenido) > 100 ? substr($contenido, 0, 100) . '...' : $contenido;

            echo '<div class="col-md-4 col-sm-12 mb-3">
                    <div class="card h-100 d-flex flex-column">
                        <img src="' . htmlspecialchars($logo) . '" class="card-img-top" alt="Asociación ' . htmlspecialchars($nombre_asociacion) . '">
                        <div class="card-body flex-grow-1 d-flex flex-column">
                            <h5 class="card-title">' . htmlspecialchars($nombre_asociacion) . '</h5>
                            <p class="card-text flex-grow-1">' . htmlspecialchars($contenido_limitado) . '</p>
                            <a href="pages/asociaciones.php" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>';
        }
    } else {
        echo "<p style='text-align: center;'>No hay asociaciones disponibles en este momento.</p>";
    }
}


function mostrarUltimasAsociaciones1()
{

    // Consulta para obtener las 3 últimas asociaciones
    $query = "SELECT * FROM associations ORDER BY nombre_asociacion DESC LIMIT 3";
    $result = mysqli_query($GLOBALS['con'], $query) or die("Error en la consulta");

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {
            extract($row);

            // Limitar el contenido a 100 caracteres
            $contenido = htmlspecialchars($descripcion);
            $contenido_limitado = strlen($contenido) > 100 ? substr($contenido, 0, 100) . '...' : $contenido;

            echo '<div class="col-md-4 col-sm-12 mb-3">
                        <div class="card">
                            <img src=" ' . htmlspecialchars($logo) . ' " class="card-img-top" alt="Asociación 1">
                            <div class="card-body">
                                <h5 class="card-title">' . htmlspecialchars($nombre_asociacion) . '</h5>
                                <p class="card-text">' . htmlspecialchars($contenido_limitado) . '</p>
                                <a href="pages/asociaciones.php" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>
                    </div>
                ';
        }
    } else {
        echo "<p style='text-align: center;'>No hay asociaciones disponibles en este momento.</p>";
    }
}
