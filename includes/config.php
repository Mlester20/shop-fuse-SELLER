<?php

    class Database{
        private $host = "localhost";
        private $user = "root";
        private $password = "";
        private $dbname = "shopfuse";
        private $conn;
        
        public function __construct(){
            $this->connect();
        }

        public function connect(){
            $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);
            if($this->conn->connect_error){
                die("Connection failed: " . $this->conn->connect_error);
            }
            $this->conn->set_charset("utf8mb4");
        }

        public function getConnection(){
            return $this->conn;
        }

        public function closeConnection(){
            if($this->conn){
                $this->conn->close();
            }
        }
        
    }

    //sample usage
    // $db = new Database();
    // $con = $db->getConnection();

?>