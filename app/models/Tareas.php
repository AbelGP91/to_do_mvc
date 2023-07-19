<?php 
class Tareas extends Model{
private $usuariosJsonFile;

    public function __construct()
    {
        $this->usuariosJsonFile = '../persistencia/usuarios.json';;
    }

    public function getRuta()
    {
        return $this->usuariosJsonFile;
    }

    public function getTareas()
        {
            $usuariosJsonFile = $this->usuariosJsonFile;

            // Obtener el contenido actual del archivo JSON
            $usuariosJson = file_get_contents($usuariosJsonFile);

            // Convertir el contenido JSON a un array asociativo
            $data = json_decode($usuariosJson, true);

            /* Retornar las tareas ?? []; operador de fusión de null (??)
             para retornar el valor de $data['tasques'] si está definido y no es null.
              En caso contrario, si $data['tasques'] es null o no está definido,
            se retorna un array vacío ([]).*/            
             return $data['tasques'] ?? [];
        }

    public function createTarea($tarea)
    {
        $usuariosJsonFile = $this->usuariosJsonFile;

        // Obtener el contenido actual del archivo JSON
        $usuariosJson = file_get_contents($usuariosJsonFile);

        // Convertir el contenido JSON a un array asociativo
        $data = json_decode($usuariosJson, true);

        // Agregar la nueva tarea al array de tareas
        $data['tasques'][] = $tarea;

        // Convertir el array a JSON
        $usuariosJson = json_encode($data, JSON_PRETTY_PRINT);

        // Guardar el JSON actualizado en el archivo
        file_put_contents($usuariosJsonFile, $usuariosJson);
    }

    public function deleteTarea($idTarea)
    {
        $usuariosJsonFile = $this->usuariosJsonFile;

        // Obtener el contenido actual del archivo JSON
        $usuariosJson = file_get_contents($usuariosJsonFile);

        // Convertir el contenido JSON a un array asociativo
        $data = json_decode($usuariosJson, true);

        // Buscar la tarea correspondiente al ID
        $tareaEncontrada = false;
        foreach ($data['tasques'] as $key => $tarea) {
            if ($tarea['idTasques'] == $idTarea) {
                unset($data['tasques'][$key]);
                $tareaEncontrada = true;
                break;
            }
        }

        if ($tareaEncontrada) {
            // Reindexar los índices del array
            $data['tasques'] = array_values($data['tasques']);

            // Convertir el array a JSON
            $usuariosJson = json_encode($data, JSON_PRETTY_PRINT);

            // Guardar el JSON actualizado en el archivo
            file_put_contents($usuariosJsonFile, $usuariosJson);
        }
    }

    public function updateTarea($idTarea, $titulo, $descripcio, $dataInici, $dataFi, $estat)
    {
        $usuariosJsonFile = $this->usuariosJsonFile;

        // Obtener el contenido actual del archivo JSON
        $usuariosJson = file_get_contents($usuariosJsonFile);

        // Convertir el contenido JSON a un array asociativo
        $data = json_decode($usuariosJson, true);

        // Buscar la tarea correspondiente al ID
        foreach ($data['tasques'] as &$tarea) {
            if ($tarea['idTasques'] == $idTarea) {
                if (!empty($titulo)) {
                    $tarea['nom_tasques'] = $titulo;
                }
                if (!empty($descripcio)) {
                    $tarea['descrip_tasques'] = $descripcio;
                }
                if (!empty($dataInici)) {
                    $tarea['inici_tasques'] = $dataInici;
                }
                if (!empty($dataFi)) {
                    $tarea['fi_tasques'] = $dataFi;
                }
                if (!empty($estat)) {
                    $tarea['estat_tasques'] = $estat;
                }
                break;
            }
        }

        // Convertir el array a JSON
        $usuariosJson = json_encode($data, JSON_PRETTY_PRINT);

        // Guardar el JSON actualizado en el archivo
        file_put_contents($usuariosJsonFile, $usuariosJson);
    }
}