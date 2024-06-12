<?php

class EventsController{
    private $conn;

    public function __construct($bd) {
        $this->conn = $bd;   
    }

    public function registerModalEvents() {
        $data = json_decode(file_get_contents("php://input"));

        $events = new Events($this->conn);
        $events->name_e = $data->name_e;
        $events->desc_e = $data->desc_e;
        $events->date_e = $data->date_e;

        if ($events->createEvents()) {
            echo json_encode(['message' => 'Evento Criado']);
        } else {
            echo json_encode(['message' => 'Evento Não Criado']);
        }
    }

    public function aparecerModalEvents(){
        $evento = new Events($this->conn);
        $eventos = $evento->aparecerEvento();
    
        if ($eventos) {
            echo json_encode(['message' => 'dados recebidos com sucesso', 'data' => $eventos]);
        } else {
            echo json_encode(['message' => 'Nenhum evento encontrado']);
        }
    }
}