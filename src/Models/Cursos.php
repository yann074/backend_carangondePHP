<?php

class Cursos {
    private $conn;
    private $table = 'coursers';

    public $id_c;
    public $name_c;
    public $desc_c;
    public $temp_c;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createCoursers() {
        $query = 'INSERT INTO ' . $this->table . ' (name_c, desc_c, temp_c) VALUES (?, ?, ?)';
        $stmt = $this->conn->prepare($query);

        $stmt->bind_param('sss', $this->name_c, $this->desc_c, $this->temp_c);

        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    public function aparecerCurso(){
        $sql = "SELECT name_c, desc_c, temp_c FROM " . $this->table;
        $result = $this->conn->query($sql);
        
        if($result->num_rows > 0){
            $coursers = [];
            while($row = $result->fetch_assoc()){
                $coursers[] = $row;
            }
            return $coursers;
        }
        return false;
    }
    
    
}
