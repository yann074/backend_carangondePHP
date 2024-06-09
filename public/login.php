<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

require '../vendor/autoload.php';
include("../config/Database.php");
include("../src/User.php");
include ("../src/UserController.php");

// Conexão com o banco de dados
$database = new Database();
$db = $database->connect();

// Instância do controlador de usuário
$userController = new UserController($db);

// Lidar com a requisição POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userController->login();
} else {
    echo json_encode(['message' => 'Método não permitido']);
}