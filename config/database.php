<?php
require_once __DIR__ . '/../vendor/autoload.php';

class Database{
    private $clientemongodb;
    private $db;

    public function __construct() {
        try {
            $this->clientemongodb = new MongoDB\Client("mongodb+srv://dsi4:abdiel123@cluster0.jc01z.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0");
            //$this->clientemongodb = new MongoDB\Client("mongodb://localhost:27017");
            $this->db = $this->clientemongodb->restaurante;
        } catch (Exception $e){
            die("Error en la conexión a MongoDB".$e->getMessage());
        }
    }

    public function getDatabase(){
        return $this->db;
    }
}