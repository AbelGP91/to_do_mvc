<?php

class MenuController extends ApplicationController{

    public function optionsAction(){

         if(isset($_POST['llistar'])){
            header('Location: llistarTasques');
         }elseif(isset($_POST['crear'])){
            header('Location: crearTasca');
        }
    }
        
    public function crearTascaAction(){
        //
    }

    public function llistarTasquesAction(){
        $listTasks = new Tareas();
        //var_dump($listTasks);
        $data = array();
        $data['tasques'] = $listTasks->getTareas();
        
        // Guardar los datos en una $_sesión en la linea 11 de llistarTasques.phtml
        if (!isset($_SESSION['data'])) {
            $_SESSION['data'] = $data;
        }
    }

    public function addDataAction(){
        //
    }

    
}

?>