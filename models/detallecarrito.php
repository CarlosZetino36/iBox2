<?php

class detallecarrito {
    private $db;
    private $coleccion;
    private $idcarrito;
    private $idproducto;
    private $cantidad;
    private $imagen;
    private $descripcion;

    public function __construct() {
        $this->connect();
        $this->selectCollection();
    }

    public function getIdcarrito() {
        return $this->idcarrito;
    }

    public function getIdproducto() {
        return $this->idproducto;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setIdcarrito($idcarrito): void {
        $this->idcarrito = $idcarrito;
    }

    public function setIdproducto($idproducto): void {
        $this->idproducto = $idproducto;
    }

    public function setCantidad($cantidad): void {
        $this->cantidad = $cantidad;
    }

    public function setImagen($imagen): void {
        $this->imagen = $imagen;
    }

    public function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }


    //Conexion a mongodb
    public function connect(){
        $client = new MongoDB\Client("mongodb://localhost:27017");
        $this->db = $client->selectDatabase("ibox");
    }

    public function selectCollection() {
        $this->coleccion = $this->db->selectCollection("detalle_carrito");
    }


    public function getAll() {
        $usuarios = $this->conn->query("SELECT * FROM usuario ORDER BY usuario");
        return $usuarios;
    }

    public function insertardetalle($datos) {
        /*$sql = "INSERT INTO detalle_carrito VALUES(?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $idcarrito = $this->getIdcarrito();
        $idproducto = $this->getIdproducto();
        $cantidad = $this->getCantidad();
        $imagen = $this->getImagen();
        $descripcion = $this->getDescripcion();
        $stmt->bind_param('iiiss', $idcarrito, $idproducto, $cantidad, $imagen, $descripcion);
        $save = $stmt->execute();
        $stmt->close();
        $result = false;
        if ($save) {
            return true;
        }
        return $result;*/

        $this->coleccion->insertMany([$datos]);
    }

   public function detalles() {
        $sql = "SELECT producto.idproducto, producto.nombre, detalle_carrito.descripcion, detalle_carrito.cantidad, detalle_carrito.imagen, producto.precio 
        FROM producto 
        INNER JOIN detalle_carrito 
        ON producto.idproducto = detalle_carrito.idproducto 
        WHERE detalle_carrito.idcarrito=?;";
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