<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../src/Controllers/CursosController.php';
include_once '../../src/Models/Cursos.php';

$database = new Database();
$db = $database->connect();

$cursoController = new CursosController($db);
if ($_SERVER['REQUEST_METHOD'] === 'GET' || $_SERVER['REQUEST_METHOD'] === 'POST') {
    $cursoController->aparecerModal(); 
} else {
    echo json_encode(['message' => 'Método não permitido']);
}

