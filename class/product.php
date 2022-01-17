<?php
    class Product{

         // Connection
         private $conn;

           // Table
        private $db_table = "products";

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        public function getProducts(){
            $sqlQuery = "SELECT * FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

    }