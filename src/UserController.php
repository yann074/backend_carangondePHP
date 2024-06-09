<?php
require '../vendor/autoload.php';
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;
class UserController {
    private $conn;
    private $secretKey = '1200'; 

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register() {
        $data = json_decode(file_get_contents("php://input"));

        $user = new User($this->conn);
        $user->name = $data->name;
        $user->email = $data->email;
        $user->password = $data->password;
        $user->birthday = $data->birthday;
        $user->cpf = $data->cpf; // Adicionando o cpf

        if ($user->create()) {
            echo json_encode(['message' => 'User Created']);
        } else {
            echo json_encode(['message' => 'User Not Created']);
        }
    }

    public function login() {
        $data = json_decode(file_get_contents("php://input"));

        $user = new User($this->conn);
        $user->email = $data->email;
        $user->password = $data->password; // Senha em texto simples

        if ($user->loginEntrar()) {
            echo json_encode(['message' => 'Email e senha corretos']);
        } else {
            echo json_encode(['message' => 'Email ou senha incorretos']);
        }
    }  public function getCursos() {
        $headers = getallheaders();
        $token = str_replace('Bearer ', '', $headers['Authorization']);
        $decoded = JWT::decode($token, new Key($this->secretKey, 'HS256'));

        $username = $decoded->name;
        $sql = "SELECT * FROM cursos WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $username);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $cursos = $result->fetch_all(MYSQLI_ASSOC);
            echo json_encode($cursos);
        } else {
            echo json_encode(['message' => 'Erro ao buscar cursos']);
        }
    }
}

