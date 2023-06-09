<?php

require_once 'models/usuarios.php';

if (!isset($_SESSION['Usuario'])) {
    
} else {
    if ($_SESSION['Usuario']) {
        header('Location:' . BASE_URL);
    }
}

class usuariosController {

    public function index() {
        require_once 'views/usuarios/index.php';
    }

    public function create() {
        require_once 'views/login/register.php';
    }

    public function edit() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $usuario = new usuario();
            $usuario->setUsuario($id);
            $usuarios = $usuario->getOne();
            require_once 'views/usuarios/create.php';
        } else {
            header('Location:' . BASE_URL . 'usuarios/index');
        }
    }

    public function save() {
        $username = isset($_POST['username']) ? $_POST['username'] : false;
        $email = isset($_POST['email']) ? $_POST['email'] : false;
        $password = isset($_POST['password']) ? $_POST['password'] : false;
        $cpassword = isset($_POST['cpassword']) ? $_POST['cpassword'] : false;

        if ($password == $cpassword) {
            $usuario = new usuario();
            $datos = array(
                "usuario" => $username,
                "correo" => $email,
                "contraseña" => $password
            );
            
            $save = $usuario->insert($datos);
            header('Location:' . BASE_URL . 'login/index');
        } else {     
            $_SESSION['Register'] = "error";
            header('Location:' . BASE_URL . 'usuarios/create');
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $usuario = new usuarios();
            $usuario->setUsuario($id);
            $delete = $usuario->delete();

            if ($delete) {
                $_SESSION['deleteusuarios'] = 'ok';
            } else {
                $_SESSION['deleteusuarios'] = 'error';
            }
        } else {
            $_SESSION['deleteusuarios'] = 'error';
        }
        header('Location:' . BASE_URL . 'usuarios/index');
    }

}

?>