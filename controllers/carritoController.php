<?php

require_once 'models/producto.php';
require_once 'models/carrito.php';
require_once 'models/detallecarrito.php';
require_once 'models/factura.php';

// if (isset($_SESSION['Usuario']) && isset($_SESSION['Admin'])) {
    
// } else {
//     if (!$_SESSION['Usuario'] || !$_SESSION['Admin']) {
//         header('Location:' . BASE_URL);
//     } 
// }

class carritoController {

    public function index() {
        require_once 'views/carrito/index.php';
    }

    public function remove() {
                foreach ($_SESSION['cart'] as $key => $value) {
                    if ($value['id'] == $_GET['id']) {
                        unset($_SESSION['cart'][$key]);
                    }
        }
        header('Location:'.BASE_URL.'carrito/index');
       
    }

    public function clearall(){
        if (isset($_GET['action'])) {
            if ($_GET['action'] == "clearall") {
                unset($_SESSION['cart']);
            }
        }
        header('Location:'.BASE_URL.'carrito/index');
    }

    public function confirm() {
        require_once 'views/confirm.php';
    }

    public function edit() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $edit = new carrito();
            $edit->setIdcarrito($id);
            $edit2 = $edit->getOne();
            if (isset($edit2) && is_object($edit2)){
                require_once 'views/pedadmin/editEstado.php';
            }
        }
    }

    public function save() {
        if (isset($_POST)) {
            $carrito = new carrito();
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $carrito->setIdcarrito($id);
                $carrito->setEstado($_POST['estado']);
                $save = $carrito->update();
            }
            if ($save) {
                $_SESSION['editestado'] = "ok";
            } else {
                $_SESSION['editestado'] = "error";
            }
        } else {
            $_SESSION['editestado'] = "error";
        }
        header("Location:" . BASE_URL . "admin/pedidos");
    }
    

    public function pedido(){
        if(isset($_SESSION['cart'])){
            $car = new carrito();

            $car->setIdcliente($_SESSION['UsuarioID']);
            $car->setEstado("Pendiente");
            $carrito = $car->insertarcarrito();
            $_SESSION['idcar'] = $carrito;
            foreach ($_SESSION['cart'] as $key => $value) {
                $det = new detallecarrito();
                $datos1 = array(
                    $det->setIdcarrito($carrito),
                    $det->setIdproducto($value['id']),
                    $det->setCantidad($value['cantidad']),
                    $det->setImagen($value['imagen']),
                    $det->setDescripcion($value['descripcion']),
                );
                
                $detalle = $det->insertardetalle($datos1);
            }
            $fact = new factura();
            $facturaI = array(
                $fact->setFecha(date("y/m/d")),
                $fact->setIdcliente($_SESSION['UsuarioID']),
                $fact->setIdcarrito($carrito),
                $fact->setTotal($_SESSION['total'])
            );
            $factura = $fact->insertarfactura($facturaI);
            Utils::deleteSession('cart');
            Utils::deleteSession('total');
            if($carrito && $detalle && $factura){     
                require_once 'views/exito.php';
        }else{
            echo"<script type= text/javascript> alert('error')</script>";
        }
    }
    }

  

}
