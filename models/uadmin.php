<?php

class uadmin{
    private $db;
    private $coleccion;
    private $idadmin;
    private $usuario;
    private $contrasena;
    
    public function __construct() {
        $this->connect();
        $this->selectCollection();
    }
    
    public function getIdadmin() {
        return $this->idadmin;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function setIdadmin($idadmin): void {
        $this->idadmin = $idadmin;
    }

    public function setUsuario($usuario): void {
        $this->usuario = $usuario;
    }

    public function setContrasena($contrasena): void {
        $this->contrasena = $contrasena;
    }
    

    public function connect(){
        $client = new MongoDB\Client("mongodb://localhost:27017");
        $this->db = $client->selectDatabase("ibox");
    }

    public function selectCollection() {
        $this->coleccion = $this->db->selectCollection("uadmin");
    }

    public function insert($datos){
        $this->coleccion->insertOne($datos);
    }
  
    /*public function getAll() {
        $usuarios = $this->db->query("SELECT * FROM usuario ORDER BY usuario");
        return $usuarios;
    }
    
    public function getOne(){
        $sql = "SELECT * FROM usuario WHERE usuario=?";
        $stmt = $this->conn->prepare($sql);
        $usuario = $this->getUsuario();
        $stmt->bind_param('s', $usuario);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_object('usuarios');
        $stmt->close();
        return $result;
    }*/
    
    // public function insert(){
    //     $sql = "INSERT INTO cliente VALUES(NULL, ?, ?, ?)";
    //     $stmt = $this->conn->prepare($sql);
    //     $usuario = $this->getUsuario();
    //     $correo = $this->getCorreo();
    //     $contrasena = $this->getContrasena();
    //     $stmt->bind_param('sss', $usuario, $correo, $contrasena);
    //     $save = $stmt->execute();
    //     $id = $stmt->insert_id;
    //     $stmt->close();
    //     $result = false;
    //     if($save){
    //         return true;
    //     }
    //     return $id;
    // }
    
    // public function update(){
    //     $sql = "UPDATE usuario SET clave=?, rol=? WHERE usuario=?";
    //     $stmt = $this->db->prepare($sql);
    //     $usuario = $this->getUsuario();
    //     $clave = $this->getClave();
    //     $rol = $this->getRol();
    //     $stmt->bind_param('sss', $clave, $rol, $usuario);
    //     $save = $stmt->execute();
    //     $stmt->close();
    //     $result = false;
    //     if($save){
    //         return true;
    //     }
    //     return $result;
    // }
    
    public function delete(){
        $sql = "DELETE FROM usuario WHERE usuario=?";
        $stmt = $this->db->prepare($sql);
        $usuario = $this->getUsuario();
        $stmt->bind_param('s', $usuario);
        $delete = $stmt->execute();
        $stmt->close();
        $result = false;
        if($delete){
            return true;
        }
        return $result;
    }
    
    public function getLog() {
        /*$sql = "SELECT * FROM uadmin WHERE usuario= ? AND contrasena= ?";
        $stmt = $this->conn->prepare($sql);
        $usuario = $this->getUsuario();
        $contrasena = $this->getContrasena();
        $stmt->bind_param('ss', $usuario, $contrasena);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_object('uadmin');
        $stmt->close();
        if(!$result){
            return false;
        }
        return $result;*/

        $usuario = $this->getUsuario();
        $contrasena = $this->getContrasena();
        $criterios = array('usuario' == $usuario, 'contrasena' == $contrasena);
        $resultado = $this->coleccion->find($criterios);
        $documento = current($resultado);
        $usuario = $documento->usuario;
        if(!$resultado){
            return false;
        }
        return $resultado;
    }
}
?>