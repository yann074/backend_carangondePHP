<?php

class CursosController {
    private $conn;

    public function __construct($bd) {
        $this->conn = $bd;   
    }

    public function registerModal() {
        $data = json_decode(file_get_contents("php://input"));

        $curso = new Cursos($this->conn);
        $curso->name_c = $data->name_c;
        $curso->desc_c = $data->desc_c;
        $curso->temp_c = $data->temp_c;

        if ($curso->createCoursers()) {
            echo json_encode(['message' => 'Curso Criado']);
        } else {
            echo json_encode(['message' => 'Curso Não Criado']);
        }
    }

    public function aparecerModal(){
        $curso = new Cursos($this->conn);
        $cursos = $curso->aparecerCurso();
    
        if ($cursos) {
            echo json_encode(['message' => 'dados recebidos com sucesso', 'data' => $cursos]);
        } else {
            echo json_encode(['message' => 'Nenhum curso encontrado']);
        }
    }
}
