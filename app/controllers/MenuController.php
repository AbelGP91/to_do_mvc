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
      // echo  '<pre>'; var_dump($_SESSION["usuarios"]); echo    '</pre>';
    
      $createTasks = new Tareas();
      //var_dump($listTasks);
      $data = array();
      $data['tasques'] = $createTasks->getTareas(); 
        
      // echo  '<pre>'; var_dump($createTasks); echo    '</pre>';

      
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