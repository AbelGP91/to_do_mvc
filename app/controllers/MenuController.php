<?php

class MenuController extends ApplicationController{

    public function optionsAction(){
         echo "soy Jesucristo";

         if(isset($_POST['llistar'])){
            header('Location: llistarTasques');
         }
    }
        
    public function crearTascaAction(){
        //
    }

    public function llistarTasquesAction(){
        //
    }

    public function addDataAction(){
        //
    }

    
}

?>