<?php

class MenuController extends ApplicationController{

    public function optionsAction(){

         if(isset($_POST['llistar'])){
            header('Location: llistarTasques');
         }elseif(isset($_POST['crear'])){
            header('Location: crearTasca');
        }elseif(isset($_POST['modificar'])){
            header('Location: modificarTasca');
        }
    }

    public function crearTascaAction(){}

        
    public function addTascaAction(){
        
        $createTask = new Tareas();
      $usuariosJsonFile = $createTask->getRuta();

      // Verificar si el usuario ha iniciado sesión
      if (isset($_SESSION['usuarios'])) {
          // Obtener el usuario actual de la sesión
          $usuario = $_SESSION['usuarios'][0];
          $idUsuario = $usuario['idUsuario'];
      
          // Verificar si se envió el campo "titulo" en el formulario
          if (isset($_POST['titulo'])) {
              // Obtener el valor del campo "titulo"
              $titulo = $_POST['titulo'];
              
              // Obtener los datos enviados por el formulario
              $idTasques = $_POST['idTasques'];
              $descripcio = $_POST['descripcio'];
              $dataInici = $_POST['dataInici'];
              $dataFi = $_POST['dataFi'];
              $estat = $_POST['estat'];
      
              // Crear un array con los datos de la tarea
              $tarea = [
                  'idTasques' => $idTasques,
                  'nom_tasques' => $titulo,
                  'descrip_tasques' => $descripcio,
                  'estat_tasques' => $estat,
                  'inici_tasques' => $dataInici,
                  'fi_tasques' => $dataFi,
                  'Usuario_idUsuario' => $idUsuario
              ];
      
              // Obtener el contenido actual del archivo JSON
              $usuariosJson = file_get_contents($usuariosJsonFile);
      
              // Convertir el contenido JSON a un array asociativo
              $data = json_decode($usuariosJson, true);
      
              // Agregar la nueva tarea al array de tareas del usuario actual
              $data['tasques'][] = $tarea;
      
              // Convertir el array a JSON
              $usuariosJson = json_encode($data, JSON_PRETTY_PRINT);
      
              // Guardar el JSON actualizado en el archivo
              file_put_contents($usuariosJsonFile, $usuariosJson);

            }
        }
    } 
    

        public function llistarTasquesAction(){
            $listTasks = new Tareas();
            //var_dump($listTasks);
            $data = array();
            $data['tasques'] = $listTasks->getTareas();
            
            // Guardar los datos en una $_sesión en la linea 11 de llistarTasques.phtml
            $_SESSION['data'] = $data;
            
        }

        public function modificarTascaAction(){
            $listTasks = new Tareas();
            //var_dump($listTasks);
            $data = array();
            $data['tasques'] = $listTasks->getTareas();
            
            // Guardar los datos en una $_sesión en la linea 11 de llistarTasques.phtml
            $_SESSION['data'] = $data;
        }

        public function modificarOpcionsAction(){
            if(isset($_POST['borrar'])){
                header('Location: borrarTasca');
             }elseif(isset($_POST['actualitzar'])){
                header('Location: actualitzarTasca');
            }
        }

        public function borrarTascaAction(){
               
        }

        public function deleteTascaAction(){ 
            $deleteTask = new Tareas();
            $jsonFile = $deleteTask->getRuta();

            $data = array();
            $data['tasques'] = $deleteTask->getTareas();
            $_SESSION['data'] = $data;
           
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Obtener la ID de tarea seleccionada desde el formulario
                $idTareaSeleccionada = $_POST['idTarea'];
            
                if (!empty($idTareaSeleccionada)) {
                    // Cargar el archivo JSON y eliminar la tarea correspondiente a la ID seleccionada
                    
                    $jsonContent = file_get_contents($jsonFile);
                    $data = json_decode($jsonContent, true);
            
                    $tareaEncontrada = false;
                    foreach ($data['tasques'] as $key => $tarea) {
                        if ($tarea['idTasques'] == $idTareaSeleccionada) {
                            unset($data['tasques'][$key]);
                            $tareaEncontrada = true;
                        }
                    }
            
                    if ($tareaEncontrada) {
                        // Guardar los cambios en el archivo JSON
                        $updatedJsonContent = json_encode($data, JSON_PRETTY_PRINT);
                        file_put_contents($jsonFile, $updatedJsonContent);
                        // header('Location: detele');
                    } else {
                        echo 'Tarea no encontrada';
                    }
                } else {
                    echo 'ID de tarea no válida';
                }
            }
        }

        public function actualitzarTascaAction(){

        }


}    

?>