<?php

class producto {

    private $idproducto;
    private $nombre;
    private $tela;
    private $talla;
    private $color;
    private $color2;
    private $tipotaza;
    private $tipopin;
    private $tipollavero;
    private $stock;
    private $precio;

    public function __construct() {
        $this->connect();
        $this->selectCollection();
    }

    public function getIdproducto() {
        return $this->idproducto;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getTela() {
        return $this->tela;
    }

    public function getTalla() {
        return $this->talla;
    }

    public function getColor() {
        return $this->color;
    }

    public function getColor2() {
        return $this->color2;
    }

    public function getTipopin() {
        return $this->tipopin;
    }

    public function getTipollavero() {
        return $this->tipollavero;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getPrecio() {
        return $this->precio;
    }
    public function getTipotaza() {
        return $this->tipotaza;
    }

    public function setTipotaza($tipotaza): void {
        $this->tipotaza = $tipotaza;
    }
    public function setIdproducto($idproducto): void {
        $this->idproducto = $idproducto;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setTela($tela): void {
        $this->tela = $tela;
    }

    public function setTalla($talla): void {
        $this->talla = $talla;
    }

    public function setColor($color): void {
        $this->color = $color;
    }

    public function setColor2($color2): void {
        $this->color2 = $color2;
    }

    public function setTipopin($tipopin): void {
        $this->tipopin = $tipopin;
    }

    public function setTipollavero($tipollavero): void {
        $this->tipollavero = $tipollavero;
    }

    public function setStock($stock): void {
        $this->stock = $stock;
    }

    public function setPrecio($precio): void {
        $this->precio = $precio;
    }

    public function connect(){
        $client = new MongoDB\Client("mongodb://localhost:27017");
        $this->db = $client->selectDatabase("ibox");
    }

    public function selectCollection() {
        $this->coleccion = $this->db->selectCollection("producto");
    }

    public function insert($datos){
        $this->coleccion->insertOne($datos);
    }


    public function buscarTaza() {
        $nombre = $this->getNombre();
        $tipo = $this->getTipotaza();
        $criterios = array('nombre' == $nombre, 'tipotaza' == $tipo);
        $resultado = $this->coleccion->find($criterios);
        if(!$resultado){
            return false;
        }
        return $resultado;
    }

    public function buscarPin() {
        $nombre = $this->getNombre();
        $tipo = $this->getTipopin();
        $criterios = array('nombre' == $nombre, 'tipopin' == $tipo);
        $resultado = $this->coleccion->find($criterios);
        if(!$resultado){
            return false;
        }
        return $resultado;
    }

    public function buscarLlavero() {
        $nombre = $this->getNombre();
        $tipo = $this->getTipollavero();
        $criterios = array('nombre' == $nombre, 'tipollavero' == $tipo);
        $resultado = $this->coleccion->find($criterios);
        if(!$resultado){
            return false;
        }
        return $resultado;
    }


    /*public function buscarTaza() {
        $sql = "SELECT * FROM producto WHERE nombre=? AND tipotaza=?";
        $stmt = $this->conn->prepare($sql);
        $nombre = $this->getNombre();
        $tipotaza = $this->getTipotaza();
        $stmt->bind_param('ss', $nombre, $tipotaza);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_object('Producto');
        $stmt->close();
        if(!$result){
            return false;
        }
        return $result;
    }*/
    /*
    public function getAll() {
        $productos = $this->conn->query("SELECT * FROM producto");
        return $productos;
    }


       public function insert() {
       $sql = "INSERT INTO producto VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
       $stmt = $this->conn->prepare($sql);
       $nombre = $this->getNombre();
       $tela = $this->getTela();
       $talla = $this->getTalla();
       $color = $this->getColor();
       $color2 = $this->getColor2();
       $tipotaza = $this->getTipotaza();
       $tipopin =$this->getTipopin();
       $tipollavero =$this->getTipollavero();
       $stock =$this->getStock();
       $precio =$this->getPrecio();
       $stmt->bind_param('ssssssssid', $nombre, $tela, $talla, $color, $color2, $tipotaza, $tipopin, $tipollavero, $stock, $precio);
       $save = $stmt->execute();
       $id = $stmt->insert_id;
       $stmt->close();
       $result = false;
       if ($save) {
           return true;
       }
       return $id;
   }

   public function getOne() {
    $sql = "SELECT * FROM producto WHERE idproducto=?";
    $stmt = $this->conn->prepare($sql);
    $id = $this->getIdproducto();
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_object('producto');
    $stmt->close();
    return $result;
}

public function delete() {
    $sql = "DELETE FROM producto WHERE idproducto=?";
    $stmt = $this->conn->prepare($sql);
    $id = $this->getIdproducto();
    $stmt->bind_param('i', $id);
    $delete = $stmt->execute();
    $stmt->close();
    $result = false;
    if ($delete) {
        return true;
    }
    return $result;
}


public function update() {
    $sql = "UPDATE producto SET nombre=?, tela=?, talla=?, color=?, color2=?, tipotaza=?, tipopin=?, tipollavero=?, stock=?, precio=? WHERE idproducto=?";
    $stmt = $this->conn->prepare($sql);
    $idprod = $this->getIdproducto();
    $nombre = $this->getNombre();
    $tela = $this->getTela();
    $talla = $this->getTalla();
    $color = $this->getColor();
    $color2 = $this->getColor2();
    $tipotaza = $this->getTipotaza();
    $tipopin =$this->getTipopin();
    $tipollavero =$this->getTipollavero();
    $stock =$this->getStock();
    $precio =$this->getPrecio();
    $stmt->bind_param('ssssssssidi', $nombre, $tela, $talla, $color, $color2, $tipotaza, $tipopin, $tipollavero, $stock, $precio, $idprod);
    $save = $stmt->execute();
    $stmt->close();
    $result = false;
    if ($save) {
        return true;
    }
    return $result;
}


    public function buscarCamisa() {
        $sql = "SELECT * FROM producto WHERE nombre=? AND tela=? AND talla=? AND color=?";
        $stmt = $this->conn->prepare($sql);
        $nombre = $this->getNombre();
        $tela = $this->getTela();
        $talla = $this->getTalla();
        $color = $this->getColor();
        $stmt->bind_param('ssss', $nombre, $tela, $talla, $color);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_object('Producto');
        $stmt->close();
        if(!$result){
            return false;
        }
        return $result;
    }

    public function buscarMascarilla() {
        $sql = "SELECT * FROM producto WHERE nombre=? AND color=? AND color2=?";
        $stmt = $this->conn->prepare($sql);
        $nombre = $this->getNombre();
        $color = $this->getColor();
        $color2 = $this->getColor2();
        $stmt->bind_param('sss', $nombre, $color, $color2);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_object('Producto');
        $stmt->close();
        if(!$result){
            return false;
        }
        return $result;
    }

    public function buscarTaza() {
        $sql = "SELECT * FROM producto WHERE nombre=? AND tipotaza=?";
        $stmt = $this->conn->prepare($sql);
        $nombre = $this->getNombre();
        $tipotaza = $this->getTipotaza();
        $stmt->bind_param('ss', $nombre, $tipotaza);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_object('Producto');
        $stmt->close();
        if(!$result){
            return false;
        }
        return $result;
    }

    public function buscarPin() {
        $sql = "SELECT * FROM producto WHERE nombre=? AND tipopin=?";
        $stmt = $this->conn->prepare($sql);
        $nombre = $this->getNombre();
        $tipo = $this->getTipopin();
        $stmt->bind_param('ss', $nombre, $tipo);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_object('Producto');
        $stmt->close();
        if(!$result){
            return false;
        }
        return $result;
    }

    public function buscarLlavero() {
        $sql = "SELECT * FROM producto WHERE nombre=? AND tipollavero=?";
        $stmt = $this->conn->prepare($sql);
        $nombre = $this->getNombre();
        $tipo = $this->getTipollavero();
        $stmt->bind_param('ss', $nombre, $tipo);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_object('Producto');
        $stmt->close();
        if(!$result){
            return false;
        }
        return $result;
    }

    public function buscarJarra() {
        $sql = "SELECT * FROM producto WHERE nombre=? AND color=?";
        $stmt = $this->conn->prepare($sql);
        $nombre = $this->getNombre();
        $color = $this->getColor();
        $stmt->bind_param('ss', $nombre, $color);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_object('Producto');
        $stmt->close();
        if(!$result){
            return false;
        }
        return $result;
    }

    public function buscarDelantal() {
        $sql = "SELECT * FROM producto WHERE nombre=? AND talla=? AND color=?";
        $stmt = $this->conn->prepare($sql);
        $nombre = $this->getNombre();
        $talla = $this->getTalla();
        $color = $this->getColor();
        $stmt->bind_param('sss', $nombre, $talla, $color);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_object('Producto');
        $stmt->close();
        if(!$result){
            return false;
        }
        return $result;
    }

    public function buscarPoster() {
        $sql = "SELECT * FROM producto WHERE nombre=?";
        $stmt = $this->conn->prepare($sql);
        $nombre = $this->getNombre();
        $stmt->bind_param('s', $nombre);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_object('Producto');
        $stmt->close();
        if(!$result){
            return false;
        }
        return $result;
    }

    public function buscarPachon() {
        $sql = "SELECT * FROM producto WHERE nombre=? AND color=?";
        $stmt = $this->conn->prepare($sql);
        $nombre = $this->getNombre();
        $color = $this->getColor();
        $stmt->bind_param('ss', $nombre, $color);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_object('Producto');
        $stmt->close();
        if(!$result){
            return false;
        }
        return $result;
    }
*/


  
//
}
