<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/xobi/vendor/autoload.php";
class Database {

    public static function Connect() {
        /*$server = "localhost";
        $user = "root";
        $pass = "";
        $database = "ibox";

        $conn = mysqli_connect($server, $user, $pass, $database);
        $conn->query("SET NAMES 'utf8'");
        return $conn;

        if (!$conn) {
            die("<script>alert('Connection Failed.')</script>");
        }*/
        
        /*try {
            $server = "localhost";
            $user = "admin";
            $pass = "1234";
            $database = "ibox";
            $port = "27017";

            $cadena = "mongodb://" . 
                                $user . ":" .
                                $pass . "@" .
                                $server . ":" .
                                $port . "/" . 
                                $database;
        
            $client = new MongoDB\Client($cadena);
            return $client->selectDatabase($database);
        } catch (\Throwable $th) {
            return th->getMessage();
        }*/
        
    }
                        

}

?>
