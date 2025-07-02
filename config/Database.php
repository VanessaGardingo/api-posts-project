<?php

class Database{
    private $host = 'localhost';
    private $db_name = 'db_posts_api';
    private $username = 'root';
    private $password = 'Vava@2025';
    private $conn;

    public function connect(){
            $this->conn = null;
            
            try{
                 $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
                 $this->conn = new PDO($dsn, $this->username, $this->password);
                 $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPT);
            }
            catch(PDOException $e){
                echo 'Erro de conexão: ' . $e->getMessage();
            }
            return $this->conn;
    }
}
?>