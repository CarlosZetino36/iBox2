<?php
require_once 'models/producto.php';
require_once 'models/factura.php';
require_once 'models/detallecarrito.php';
require_once 'models/carrito.php';

if (isset($_SESSION['Admin'])) {
    
} else {
    if (!$_SESSION['Admin']) {
        header('Location:' . BASE_URL);
    } 
}

class adminController {

    public function productos() {
        $producto = new producto();
        $prod = $producto->getAll();
        require_once 'views/prodadmin/index.php';
    }

    public function pedidos() {
        $factura = new factura();
        $fact = $factura->detallesIndex();
        require_once 'views/pedadmin/index.php';
    }
    public function create(){
        require_once 'views/prodadmin/create.php';
    }

    public function detallepedido() {

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $factura = new factura();
            $factura->setIdcarrito($id);
            $fact = $factura->detalles();

            $detallecarrito = new detallecarrito();
            $detallecarrito->setIdcarrito($id);
            $det = $detallecarrito->detalles();

            if( $fact && $det){
                require_once 'views/pedadmin/detalle.php';
            }
        }
        
    }

    public function cambiarestado() {
        require_once 'views/pedadmin/editEstado.php';
    }

}
?>