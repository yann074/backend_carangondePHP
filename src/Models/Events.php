<?php
class Events {

    private $conn;

    public $table = 'events';

    public $id;

    public $name_e;
    public $desc_e;
    public $date_e;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function createEvents() {
        $query = 'INSERT INTO ' . $this->table . ' (name_e, desc_e, date_e) VALUES (?, ?, ?)';
        $conn = $this->conn->prepare($query);

        $conn->bind_param('sss', $this->name_e, $this->desc_e, $this->date_e);

        if ($conn->execute()) {
            return true;
        }

        printf("Error: %s.\n", $conn->error);

        return false;
    }
    
    public function aparecerEvento(){
        $sql = "SELECT name_e, desc_e, date_e FROM " . $this->table;
        $result = $this->conn->query($sql);
        
        if($result->num_rows > 0){
            $events = [];
            while($row = $result->fetch_assoc()){
                $events[] = $row;
            }
            return $events;
        }
        return false;
    }
    
    
}