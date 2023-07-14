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
        
        $resultado = mysqli_fetch_all($tasquesId, MYSQLI_ASSOC);

        $_SESSION['arrayTasques'] = $resultado;
            
            
        }

        
        /*
        
        $_SESSION['arrayTasques'] = $arrayTasques;

        $_SESSION['tasques'] = $tasquesId;

        */
                      
    

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

