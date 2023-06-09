<?php

class factura{
    private $db;
    private $coleccion;
    private $idfactura;
    private $fecha;
    private $idcliente;
    private $idcarrito;
    private $total;
    
    public function __construct() {
        $this->connect();
        $this->selectCollection();
    }
    public function getIdfactura() {
        return $this->idfactura;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getIdcliente() {
        return $this->idcliente;
    }

    public function getIdcarrito() {
        return $this->idcarrito;
    }

    public function getTotal() {
        return $this->total;
    }

    public function setIdfactura($idfactura): void {
        $this->idfactura = $idfactura;
    }

    public function setFecha($fecha): void {
        $this->fecha = $fecha;
    }

    public function setIdcliente($idcliente): void {
        $this->idcliente = $idcliente;
    }

    public function setIdcarrito($idcarrito): void {
        $this->idcarrito = $idcarrito;
    }

    public function setTotal($total): void {
        $this->total = $total;
    }

    //Conexion a mongodb
    public function connect(){
        $client = new MongoDB\Client("mongodb://localhost:27017");
        $this->db = $client->selectDatabase("ibox");
    }

    public function selectCollection() {
        $this->coleccion = $this->db->selectCollection("factura");
    }

       
    public function getAll() {
        $factura = $this->conn->query("SELECT * FROM factura");
        return $factura;
    }

    public function insertarfactura($datos) {
        /*$sql = "INSERT INTO factura VALUES(NULL, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $fecha = $this->getFecha();
        $idcliente = $this->getIdcliente();
        $idcarrito = $this->getIdcarrito();
        $total = $this->getTotal();
        $stmt->bind_param('siid', $fecha, $idcliente, $idcarrito, $total);
        $save = $stmt->execute();
        $stmt->close();
        $result = false;
        if ($save) {
            return true;
        }
        return $result;*/

        $this->coleccion->insertMany($datos);
    }

    public function update() {
        $sql = "UPDATE carrito SET estado=? WHERE idcarrito=?";
        $stmt = $this->db->prepare($sql);
        $id = $this->getIdcarrito();
        $stmt->bind_param('i', $id);
        $save = $stmt->execute();
        $stmt->close();
        $result = false;
        if ($save) {
            return true;
        }
        return $result;
    }


    public function detallesIndex() {
        $index =$this->conn->query("SELECT factura.idfactura, factura.fecha, factura.total, cliente.usuario, carrito.estado, carrito.idcarrito
        FROM factura
        INNER JOIN cliente ON factura.idcliente = cliente.idcliente
        INNER JOIN carrito ON factura.idcarrito = carrito.idcarrito;");
        return $index;
    }

   public function detalles() {
       $sql = "SELECT factura.idfactura, factura.fecha, factura.total, cliente.idcliente, cliente.usuario, cliente.correo
       FROM factura
       INNER JOIN cliente ON factura.idcliente = cliente.idcliente
       WHERE factura.idcarrito=?;";
       $stmt = $this->conn->prepare($sql);
       $cod = $this->getIdcarrito();
       $stmt->bind_param('i', $cod);
       $stmt->execute();
       $result = $stmt->get_result();
       $stmt->close();
       return $result;
   }
//
//    public function insert() {
//        $sql = "INSERT INTO cliente VALUES(NULL, ?, ?, ?)";
//        $stmt = $this->conn->prepare($sql);
//        $usuario = $this->getUsuario();
//        $correo = $this->getCorreo();
//        $contrase�a = $this->getContrase�a();
//        $stmt->bind_param('sss', $usuario, $correo, $contrase�a);
//        $save = $stmt->execute();
//        $id = $stmt->insert_id;
//        $stmt->close();
//        $result = false;
//        if ($save) {
//            return true;
//        }
//        return $id;
//    }
//
//    public function update() {
//        $sql = "UPDATE usuario SET clave=?, rol=? WHERE usuario=?";
//        $stmt = $this->db->prepare($sql);
//        $usuario = $this->getUsuario();
//        $clave = $this->getClave();
//        $rol = $this->getRol();
//        $stmt->bind_param('sss', $clave, $rol, $usuario);
//        $save = $stmt->execute();
//        $stmt->close();
//        $result = false;
//        if ($save) {
//            return true;
//        }
//        return $result;
//    }
//
//    public function delete() {
//        $sql = "DELETE FROM usuario WHERE usuario=?";
//        $stmt = $this->db->prepare($sql);
//        $usuario = $this->getUsuario();
//        $stmt->bind_param('s', $usuario);
//        $delete = $stmt->execute();
//        $stmt->close();
//        $result = false;
//        if ($delete) {
//            return true;
//        }
//        return $result;
//    }
//
}

?>