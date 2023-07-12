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

        $tasques = new Tareas();

        $tasquesId = $tasques->findTareasById($_SESSION['usuario']);
               
        $_SESSION['tasques'] = $tasquesId;

        /*

        var_dump($_SESSION['tareas']);
        die();

        */

                
    }

    public function addDataAction(){

        $tasques = new Tareas();

        $titulo=$_POST['titulo'];
        $descripcio=$_POST['descripcio'];
        $dataInici=$_POST['dataInici'];
        $dataFi=$_POST['dataFi'];
        $estat=$_POST['estat'];

        $arrayData = [$titulo, $descripcio, $dataInici, $dataFi, $estat, $_SESSION['usuario']];

        $tasques->addData($arrayData);


    }

}

