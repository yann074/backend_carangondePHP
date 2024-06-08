<?php

class Database { 
    private $conn;

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new mysqli('127.0.0.1', 'root', '', 'carangonde_dados');

            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }
}
