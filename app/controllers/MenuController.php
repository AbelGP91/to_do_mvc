<?php
class MenuController extends ApplicationController
{
    public function optionsAction(){
        if (isset($_POST['llistar'])) {
            header('Location: llistarTasques');
            exit;
        } elseif (isset($_POST['crear'])) {
            header('Location: crearTasca');
            exit;
        } elseif (isset($_POST['modificar'])) {
            header('Location: modificarTasca');
            exit;
        }
    }

    public function crearTascaAction(){// Acción para mostrar el formulario de creación de tareas
    }

    public function addTascaAction(){
        // Acción del formulario para crear una nueva tarea
        $autor = $_POST['autor'];
        $titulo = $_POST['titulo'];
        $descripcio = $_POST['descripcio'];
        $estat = $_POST['estat'];

        

        // Crear un array con los datos de la tarea
        $tarea = [
            'autor' => $autor,
            'nom_tasques' => $titulo,
            'descrip_tasques' => $descripcio,
            'estat_tasques' => $estat,
            'inici_tasques' => date('Y-m-d'),
            'fi_tasques' => null
        ];

        if ($estat === 'Finalitzat') {
            $tarea['fi_tasques'] = date('Y-m-d');
        }

        Tareas::guardarTarea($tarea);
     }

    public function llistarTasquesAction()
    {
        $tareas = Tareas::obtenerTareas();  

        $this->view->tareas = $tareas;
    }

    public function veureTascaAction()
    {
        if(isset($_GET['tareaId'])){
            $tareaId = $_GET['tareaId'];
            $tarea = Tareas::obtenerTareaPorId($tareaId);

            if ($tarea !== null) {
                $this->view->tarea = $tarea;
                $this->view->tareaId = $tareaId;
            }
        }

    }

    public function actualitzarTascaAction(){
        if(isset($_GET['tareaId'])){
            $tareaId = $_GET['tareaId'];
            $tarea = Tareas::obtenerTareaPorId($tareaId);

            if ($tarea !== null) {
                $this->view->tarea = $tarea;
                $this->view->tareaId = $tareaId;
            }
        }
    }

    public function modifiedTascaAction(){
       
    }

    public function borrarTascaAction(){  // Acción para mostrar el formulario de eliminación de tarea
    }

    public function deleteTascaAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $deleteTask = new Tareas();
            $idTareaSeleccionada = $_POST['idTarea'];

            if (!empty($idTareaSeleccionada)) {
                // Llamar al método del modelo para eliminar la tarea
                $deleteTask->deleteTarea($idTareaSeleccionada);
            }
        }
    }
}
