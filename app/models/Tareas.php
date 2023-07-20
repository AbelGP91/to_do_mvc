<?php

    class Tareas extends Model{
        private $tareas;
        
        public function __construct() {
            $json = file_get_contents('../persistencia/usuarios.json');
            $data = json_decode($json, true);
            $this->tareas = $data["tasques"];
        }
    
        public function getTareas() {
            return $this->tareas;
        }

    }

    

?>