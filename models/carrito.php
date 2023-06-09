<?php

require 'vendor/autoload.php';

use MongoDB\Client as MongoClient;

class carrito {
    private $db;
    private $coleccion;
    private $idcarrito;
    private $idcliente;
    private $idpedido;
    private $estado;
    private $coleccionn;

    public function __construct() {
        $this->connect();
        $this->selectCollection();
    }

    public function getIdcarrito() {
        return $this->idcarrito;
    }

    public function getIdcliente() {
        return $this->idcliente;
    }

    public function getIdpedido() {
        return $this->idpedido;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setIdcarrito($idcarrito): void {
        $this->idcarrito = $idcarrito;
    }

    public function setIdcliente($idcliente): void {
        $this->idcliente = $idcliente;
    }

    public function setIdpedido($idpedido): void {
        $this->idpedido = $idpedido;
    }

    public function setEstado($estado): void {
        $this->estado = $estado;
    }

    // Conexión a MongoDB
    public function connect() {
        $client = new MongoClient("mongodb://localhost:27017");
        $this->db = $client->selectDatabase("ibox");
    }

    public function selectCollection() {
        $this->coleccion = $this->db->selectCollection("carrito");
    }

    public function getAll() {
        $result = $this->coleccion->find();
        $usuarios = iterator_to_array($result);
        return $usuarios;
    }

    public function getOne() {
        $id = $this->getIdcarrito();
        $filter = ['idcarrito' => $id];
        $result = $this->coleccion->findOne($filter);
        return $result;
    }

    public function insertarcarrito() {
        $detalle = [
            'idcarrito' => $this->getIdcarrito(),
            'idcliente' => $this->getIdcliente(),
            'idpedido' => $this->getIdpedido(),
            'estado' => $this->getEstado()
            // Agrega más campos de acuerdo a tus necesidades
        ];

        $this->coleccion->insertOne($detalle);
    }

    public function update() {
        $id = $this->getIdcarrito();
        $filter = ['idcarrito' => $id];
        $update = ['$set' => ['estado' => $this->getEstado()]];
        $this->coleccion->updateOne($filter, $update);
    }
}