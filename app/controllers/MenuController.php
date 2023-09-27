<?php
class MenuController extends ApplicationController
{
    public function optionsAction()
    {
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
        $listTasks = new Tareas();
        $data = array();
        $data['tasques'] = $listTasks->getTareas();

        // Guardar los datos en una $_sesión en la línea 11 de llistarTasques.phtml
        $_SESSION['data'] = $data;
    }

    public function modificarTascaAction()
    {
        $modificarTasks = new Tareas();
        $data = array();
        $data['tasques'] = $modificarTasks->getTareas();

        // Guardar los datos en una $_sesión en la línea 11 de llistarTasques.phtml
        $_SESSION['data'] = $data;
    }

    public function modificarOpcionsAction()
    {
        if (isset($_POST['borrar'])) {
            header('Location: borrarTasca');
            exit;
        } elseif (isset($_POST['actualitzar'])) {
            header('Location: actualitzarTasca');
            exit;
        }
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

    public function actualitzarTascaAction(){ // Acción para mostrar el formulario de actualización de tarea
    }

    public function updateTascaAction()
    {
        $idTarea = $_POST['idTarea'];
        $_SESSION['idTarea'] = $idTarea; // Almacenar el valor en la sesión
    }

    public function modifiedTascaAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['idTarea'])) {
            $modifyTask = new Tareas();
            $idTarea = $_SESSION['idTarea'];

            // Obtener los datos enviados por el formulario
            $titulo = $_POST['titulo'] ?? '';
            $descripcio = $_POST['descripcio'] ?? '';
            $dataInici = $_POST['dataInici'] ?? '';
            $dataFi = $_POST['dataFi'] ?? '';
            $estat = $_POST['estat'] ?? '';

            // Llamar al método del modelo para actualizar la tarea
            $modifyTask->updateTarea($idTarea, $titulo, $descripcio, $dataInici, $dataFi, $estat);

            // Redireccionar a la página de listado de tareas
            header('Location: modifiedTasca');
            exit;
        }
    }
}
