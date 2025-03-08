<?php
    session_start();

    require_once(__DIR__ . "/../../bd/functionBd.php");

    // Función para validar el email
    function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);

    }

    // Función para validar el password
    function validatePassword($password) {
        // Expresión regular para validar el password
        $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

        if(preg_match($regex, $password)) {
            return true;
        } else {
            return false;
        }
    }

    // Variables para guardar los valores recibidos del formulario
    $email = "";
    $pass = "";

    // Check de los valores del formulario
    if(isset($_POST['email']) && !empty($_POST['email'])) {
        // Si el email no es valido volvemos a la pagina de login
        if(!validateEmail($_POST['email']))  {
            session_start();
            session_destroy();
            header("Location: ../login.php");
            exit();
        } else {
            $email = trim($_POST['email']);
        }
    }

    if(isset($_POST['password']) && !empty($_POST['password'])) {
        // Si el password no es valido volvemos a la pagina de login
        if(!validatePassword($_POST['password'])) {
            session_start();
            session_destroy();
            header("Location: ../login.php");
            exit();
        } else {
            $pass = trim($_POST['password']);
        }
    }

    $checkUser = getUserByEmailAndPass($email, $pass);

    if($checkUser['email'] != $email || $checkUser['pass']) {
        header("Location: ../login.php");
    }
    
    if (isset($checkUser)) {
        // Almacenar el ID del usuario en la sesión (no la contraseña)
        $_SESSION['id'] = $checkUser['id'];
        $_SESSION['rol'] = $checkUser['rol'];

        // Dependiendo del rol mandamos al usuario a un lugar u otro
        if ($checkUser['rol'] == 1) {
            header("Location: ../pages/asociacion.php");
            exit();
        } elseif ($checkUser['rol'] == 3) {
            header("Location: ../pages/admin.php");
            exit();
        } else {
            session_start();
            session_destroy();
            header("Location: ../login.php");
            exit();
        }

    } else {
        var_dump($checkUser); // Depuración
        die("Error: Usuario no autenticado.");
    }

?>