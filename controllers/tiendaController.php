<?php
require_once 'models/producto.php';

class tiendaController {

    public function index() {
        require_once 'views/tienda/index.php';
    }

    public function camisa() {
        // $camisa = new producto();
        // $camisas = $camisa->getAll();
        require_once 'views/tienda/personalizarCamisa.php';
    }

    public function mask() {
        require_once 'views/tienda/personalizarMask.php';
    }

    public function taza() {
        require_once 'views/tienda/personalizarTaza.php';
    }

    public function pines() {
        require_once 'views/tienda/personalizarPines.php';
    }

    public function llaveros() {
        require_once 'views/tienda/personalizarLlaveros.php';
    }

    public function jarras() {
        require_once 'views/tienda/personalizarJarras.php';
    }

    public function delantal() {
        require_once 'views/tienda/personalizarDelantal.php';
    }

    public function poster() {
        require_once 'views/tienda/personalizarPoster.php';
    }

    public function pachon() {
        require_once 'views/tienda/personalizarPachon.php';
    }

}

?>