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
        //
    }

    public function addDataAction(){
        //
    }

    
}

?>