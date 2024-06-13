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
        $user->password = $data->password;
        $user->birthday = $data->birthday;
        $user->cpf = $data->cpf; 

        if ($user->create()) {
            echo json_encode(['message' => 'User Created']);
        } else {
            echo json_encode(['message' => 'User Not Created']);
        }
    }
   
    public function login() {
        $data = json_decode(file_get_contents("php://input"));

        $adm = [
            'email' => 'adm@teste.com',
            'password' => '1234'
        ];

        $user = new User($this->conn);
        $user->email = $data->email;
        $user->password = $data->password;

        if ($user->loginEntrar() ) {
            echo json_encode(['message' => 'Email e senha corretos']);
        } if(!$user->loginEntrar()){
            if($adm){
                echo json_encode(['message' => 'Email e senha corretos adm']);
            }
            else {
                echo json_encode(['message' => 'Email ou senha incorretos']);
            }
        } 
    }
    
    public function AparecerUsuario(){
        $user = new User($this->conn);
        $users = $user->UsuariosCadastradosAdm();
    
        if ($users) {
            echo json_encode(['message' => 'dados recebidos com sucesso', 'data' => $users]);
        } else {
            echo json_encode(['message' => 'Nenhum user encontrado']);
        }
    }
}