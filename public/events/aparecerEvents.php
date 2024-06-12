<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


include_once '../../config/Database.php';
include_once '../../src/Controllers/EventsController.php';
include_once '../../src/Models/Events.php';

$database = new Database();
$db = $database->connect();

$eventosController = new EventsController($db);
if ($_SERVER['REQUEST_METHOD'] === 'GET' || $_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventosController->aparecerModalEvents(); 
} else {
    echo json_encode(['message' => 'Método não permitido']);
}