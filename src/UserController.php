<?php

class UserController {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register() {
        $data = json_decode(file_get_contents("php://input"));

        $user = new User($this->conn);
        $user->name = $data->name;
        $user->email = $data->email;
        $user->password = password_hash($data->password, PASSWORD_DEFAULT);
        $user->birthday = $data->birthday;
        $user->cpf = $data->cpf; // Adicionando o cpf

        if ($user->create()) {
            echo json_encode(['message' => 'User Created']);
        } else {
            echo json_encode(['message' => 'User Not Created']);
        }
    }
}
