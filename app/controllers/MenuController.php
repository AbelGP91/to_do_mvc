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
        // print_r($tareas);

        // include '../app/views/scripts/menu/llistarTasques.phtml';
        
    }

    public function addDataAction(){
        //
    }

    
}

?>