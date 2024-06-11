<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

require '../vendor/autoload.php';
include("../config/Database.php");
include("../src/Models/User.php");
include ("../src/Controllers/UserController.php");

$database = new Database();
$db = $database->connect();

$userController = new UserController($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userController->login();
} else {
    echo json_encode(['message' => 'Método não permitido']);
}