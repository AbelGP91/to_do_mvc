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

    public function crearTascaAction()
    {
        // Acción para mostrar el formulario de creación de tareas
    }

    public function addTascaAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $createTask = new Tareas();
           //echo $usuariosJsonFile = $createTask->getRuta();

            // Verificar si el usuario ha iniciado sesión
            if (isset($_SESSION['usuarios'])) {
                // Obtener el usuario actual de la sesión
                $usuario = $_SESSION['usuarios'][0];
                $idUsuario = $usuario['idUsuario'];

                // Obtener los datos enviados por el formulario
                $idTasques = $_POST['idTasques'];
                $titulo = $_POST['titulo'];
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

                // Llamar al método del modelo para crear la tarea
                $createTask->createTarea($tarea);

                // Redireccionar a la página de listado de tareas
                header('Location: addTasca');
                exit;
            }
        }
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

    public function borrarTascaAction()
    {
        // Acción para mostrar el formulario de eliminación de tarea
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

    public function actualitzarTascaAction()
    {
        // Acción para mostrar el formulario de actualización de tarea
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
