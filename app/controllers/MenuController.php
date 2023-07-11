<?php

class MenuController extends ApplicationController {

    
    public function optionsAction(){

        if (isset($_POST['crear'])){

            header('Location: /mvc/web/crearTasca');

        }

        else{

            header('Location: /mvc/web/llistarTasques');
    

        }                
    
    }

    public function crearTascaAction(){
        
    }

    public function llistarTasquesAction(){


    }

}