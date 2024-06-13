<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

include_once '../config/Database.php';
include_once '../src/Controllers/UserController.php'; 
include_once '../src/Models/User.php';


$database = new Database();
$db = $database->connect();

$userController = new UserController($db);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $userController->AparecerUsuario();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents("php://input"));
    if (isset($data->action)) {
        if ($data->action === 'register') {
            $userController->register();
        } elseif ($data->action === 'login') {
            $userController->login();
        } else {
            echo json_encode(['message' => 'Ação inválida']);
        }
    } else {
        echo json_encode(['message' => 'Ação não especificada']);
    }
} else {
    echo json_encode(['message' => 'Método não permitido']);
}
