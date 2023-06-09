<?php
require_once "./config/database.php";


class usuario{
    private $db;
    private $coleccion;
    private $usuario;
    private $correo;
    private $contrasena;

    public function __construct() {
        $this->connect();
        $this->selectCollection();
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function setUsuario($usuario): void {
        $this->usuario = $usuario;
    }

    public function setCorreo($correo): void {
        $this->correo = $correo;
    }

    public function setContrasena($contrasena): void {
        $this->contrasena = $contrasena;
    }

    //Conexion a mongodb
    public function connect(){
        $client = new MongoDB\Client("mongodb://localhost:27017");
        $this->db = $client->selectDatabase("ibox");
    }

    public function selectCollection() {
        $this->coleccion = $this->db->selectCollection("cliente");
    }

    public function insert($datos){
        $this->coleccion->insertOne($datos);
    }

    public function getLog() {
        /*$sql = "SELECT * FROM cliente WHERE correo= ? AND contrasena= ?";
        $stmt = $this->conn->prepare($sql);
        $correo = $this->getCorreo();
        $contrasena = $this->getContrasena();
        $stmt->bind_param('ss', $correo, $contrasena);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_object('usuarios');
        $stmt->close();
        if(!$result){
            return false;
        }
        return $result;*/

        $correo = $this->getCorreo();
        $contrasena = $this->getContrasena();
        $criterios = ['correo' => $correo, 'contraseña' => $contrasena];
        $resultado = $this->coleccion->findOne($criterios);
        if(!$resultado){
            echo"<script type= text/javascript> alert('error')</script>";
            return false;
        }
        return $resultado;
    }
}
/*class usuarios{
    private $idcliente;
    private $usuario;
    private $correo;
    private $contrasena;
    
    public function __construct() {
        $this->conn = database::Connect();
    }

    public function getIdcliente() {
        return $this->idcliente;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function setIdcliente($idcliente): void {
        $this->idcliente = $idcliente;
    }

    public function setUsuario($usuario): void {
        $this->usuario = $usuario;
    }

    public function setCorreo($correo): void {
        $this->correo = $correo;
    }

    public function setContrasena($contrasena): void {
        $this->contrasena = $contrasena;
    }

    
  
    public function getAll() {
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
    }
    
    public function insert($data){
        $sql = "INSERT INTO cliente VALUES(NULL, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $usuario = $this->getUsuario();
        $correo = $this->getCorreo();
        $contrasena = $this->getContrasena();
        $stmt->bind_param('sss', $usuario, $correo, $contrasena);
        $save = $stmt->execute();
        $id = $stmt->insert_id;
        $stmt->close();
        $result = false;
        if($save){
            return true;
        }
        return $id;

    }
    
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
        $sql = "SELECT * FROM cliente WHERE correo= ? AND contrasena= ?";
        $stmt = $this->conn->prepare($sql);
        $correo = $this->getCorreo();
        $contrasena = $this->getContrasena();
        $stmt->bind_param('ss', $correo, $contrasena);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_object('usuarios');
        $stmt->close();
        if(!$result){
            return false;
        }
        return $result;
    }
}*/
?>