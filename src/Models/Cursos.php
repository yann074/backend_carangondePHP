<?php

class Cursos extends User{
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
        $conn = $this->conn->prepare($query);

        $conn->bind_param('sss', $this->name_c, $this->desc_c, $this->temp_c);

        if ($conn->execute()) {
            return true;
        }

        printf("Error: %s.\n", $conn->error);

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