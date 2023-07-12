<?php


class Usuarios extends Model{

        private $usuarios;
    
        public function __construct() {
            // Leer el contenido del archivo JSON
            $data = json_decode(file_get_contents('../persistencia/usuarios.json'), true);
    
            $this->usuarios = $data['usuarios'];
        }
    
        
    }
    

?>