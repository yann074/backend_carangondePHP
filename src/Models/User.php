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
        $conn = $this->conn->prepare($query);
        $conn->bind_param('sssss', $this->name, $this->email, $this->password, $this->birthday, $this->cpf);
        if ($conn->execute()) {
            return true;
        }
        printf("Error: %s.\n", $conn->error);
        return false;
    } 
    
    public function loginEntrar() {
        $sql = "SELECT * FROM " . $this->table . " WHERE email = ?";
        $conn = $this->conn->prepare($sql);
        $conn->bind_param('s', $this->email);
        if ($conn->execute()) {
            $result = $conn->get_result();
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                if ($this->password == $row['password']) {
                    return true;
                }
            }
        }

        return false;
    }

    public function UsuariosCadastradosAdm(){
        $sql = "SELECT name, email, cpf FROM " . $this->table;
        $result = $this->conn->query($sql);
        
        if($result->num_rows > 0){
            $users = [];
            while($row = $result->fetch_assoc()){
                $users[] = $row;
            }
            return $users;
        }
        return false;
    }
}