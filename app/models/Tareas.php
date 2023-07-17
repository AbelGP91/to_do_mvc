<?php 
class Tareas extends Model {
    private $tareas;
    private $json;
    private $ruta;
    public function __construct() {
        $this->ruta = '../persistencia/usuarios.json';
        $this->json = file_get_contents($this->ruta);
        $data = json_decode($this->json, true);
        $this->tareas = $data["tasques"];
    }

    public function getTareas() {
        return $this->tareas;
    }

    public function getRuta() {
        return $this->ruta;
    }


   public function putContents($rutaJson, $encodedDatos)
    {
        file_put_contents($rutaJson, $encodedDatos);
    }


    
}
?>