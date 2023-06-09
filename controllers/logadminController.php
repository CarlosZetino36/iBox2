<?php

require_once 'models/uadmin.php';

if (!isset($_SESSION['Admin'])) {
    
} else {
    if ($_SESSION['Admin']) {
        header('Location:' . BASE_URL.'admin/productos');
    } 
}
class logadminController {

    public function index() {
        require_once 'views/logadmin/index.php';
    }

    
    public function login() {
        if (isset($_POST)) {
            $admin = new uadmin();
            $admin->setUsuario($_POST['usuario']);
            $admin->setContrasena($_POST['password']);
            $user = $admin->getLog();

            if ($user && is_object($user)) {
                $_SESSION["Admin"] = "Administrador";
                header('Location:' . BASE_URL . 'admin/productos');
            } else {
                echo"<script type= text/javascript> alert('error')</script>";
                $_SESSION['Login'] = "error";
                
                 header('Location:' . BASE_URL . 'logadmin/index');
            }
            // header('Location:' . BASE_URL);
        }
    }

    public function logout() {
        
        if (isset($_SESSION["Admin"])) {
            unset($_SESSION["Admin"]);
        }
        header('Location:' . BASE_URL .'logadmin/index');
    }

 }

?>