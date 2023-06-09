<?php

require_once 'models/usuarios.php';

if (!isset($_SESSION['Usuario'])) {
    
} else {
    if ($_SESSION['Usuario']) {
        header('Location:' . BASE_URL);
    } 
}
class loginController {

    public function index() {
        require_once 'views/login/index.php';
    }

    
    public function login() {
        if (isset($_POST)) {
            $usuario = new usuario();
            $usuario->setCorreo($_POST['email']);
            $usuario->setContrasena($_POST['password']);
            $user = $usuario->getLog();

            if ($user && is_object($user)) {
                $_SESSION["Usuario"] = "Cliente";
                header('Location:' . BASE_URL);
            } else {
                $_SESSION['Login'] = "error";
                header('Location:' . BASE_URL . 'login/index');
            }
        }
    }

    public function logout() {
        
        if (isset($_SESSION["Usuario"])) {
            unset($_SESSION["Usuario"]);
        }
        if (isset($_SESSION["cart"])) {
            unset($_SESSION["cart"]);
        }
        header('Location:' . BASE_URL .'login/index');
    }

}

?>