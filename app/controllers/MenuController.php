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

    public function modificarOpcionsAction()
    {
        if(isset($_GET['tareaId'])){
            $tareaId = $_GET['tareaId'];
            $tarea = Tareas::obtenerTareaPorId($tareaId);

            if ($tarea !== null) {
                $this->view->tarea = $tarea;
                $this->view->tareaId = $tareaId;
            }
        }
        
       if (isset($_POST['actualitzar'])) {
            header('Location: actualitzarTasca');
            exit;
        }

    }

    public function actualitzarTascaAction(){
        if(isset($_GET['tareaId'])){
            $tareaId = $_GET['tareaId'];
            $tarea = Tareas::obtenerTareaPorId($tareaId);

            if ($tarea !== null) {
                $this->view->tarea = $tarea;
                $this->view->tareaId = $tareaId;

                if (isset($_POST['update'])) {
                    $autor = $_POST['autor'];
                    $nomTasques = $_POST['titulo'];
                    $descripcio = $_POST['descripcio'];
                    $estat = $_POST['estat'];

                    $fechaInicio = isset($tarea['inici_tasques']) ? $tarea['inici_tasques'] : null;

                     if($tarea && $tarea['estat_tasques'] !== $estat) {

                        if ($estat === 'Finalitzat') {
                            $fechaFin = date('Y-m-d');
                        } else {
                            $fechaFin = null;
                        }

                    } else {
                        $fechaFin = isset($tarea['fi_tasques']) ? $tarea['fi_tasques'] : null;
                    }

                    // Crear un array con los datos de la tarea actualizada

                    $tareaModificada = [
                        'autor' => $autor,
                        'nom_tasques' => $nomTasques,
                        'descrip_tasques' => $descripcio,
                        'estat_tasques' => $estat,
                        'inici_tasques' => $fechaInicio,
                        'fi_tasques' => $fechaFin
                    ];

                     Tareas::actualizarTarea($tareaId, $tareaModificada);

                    echo "alert('Tasca actualitzada')";

                    header('Location: llistarTasques');
                    exit;
        
                }     
             }
        }
    }



    public function modifiedTascaAction(){
        
    }


    public function deleteTascaAction()
    {
       if(isset($_GET['tareaId'])){
            $tareaId = $_GET['tareaId'];
            $tarea = Tareas::obtenerTareaPorId($tareaId);

            if ($tarea !== null) {
                $tarea = Tareas::borrarTarea($tareaId);
            } else {
                header('Location: llistarTasques');
                echo "alert('Tasca no existent')";
                exit;
            }

        header('Location: deleteTasca');  
        
        exit;
        }
    }
}