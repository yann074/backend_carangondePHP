<?php

class User {
    private $conn;
    private $table = 'users';

    public $id;
    public $name;
    public $email;
    public $password;
    public $birthday;
    public $cpf; // Adicionando a propriedade CPF

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' (name, email, password, birthday, cpf) VALUES (?, ?, ?, ?, ?)';

        $stmt = $this->conn->prepare($query);

        // Adicionando o cpf no bind_param
        $stmt->bind_param('sssss', $this->name, $this->email, $this->password, $this->birthday, $this->cpf);

        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;


    } 
    
        
    public function loginEntrar() {
        $sql = "SELECT * FROM " . $this->table . " WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $this->email);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                if ($this->password == $row['password']) {
                    return true;
                }
            }
        }

        return false;
    }
    
}

