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

    public function dataAction(){
        
        $opcioTasques = null;

        $idTarea = $_POST['idTarea'];
        $idTarea = (int)$idTarea;

        $_SESSION['idTarea'] = $idTarea;

                if (isset($_POST['veure'])){

                $opcioTasques = $_POST['veure'];

            }

            if (isset($_POST['modificar']) && is_null($opcioTasques)){

                $opcioTasques = $_POST['modificar'];
        

            }

            if($opcioTasques === "Modificar"){

                header('location: /mvc/web/newData');

            }

            else {

                header('location: /mvc/web/deleteData');

            }

    }

    public function newDataAction(){
        
        
    }

    public function modifyDataAction(){

        $titulo = null;
        $descripcio = null;
        $estat = null;
        $dataInici = null;
        $dataFi = null;
        $idTarea = $_SESSION['idTarea'];

        if(isset($_POST['titulo']) && ($_POST['titulo']!="")) {
    
            $titulo=$_POST['titulo'];
        
        }
        
        if(isset($_POST['descripcio']) && ($_POST['descripcio']!="")) {
            
            $descripcio=$_POST['descripcio'];
        
        }
                
        if(isset($_POST['estat']) && ($_POST['estat']!="")) {
            
            $estat=$_POST['estat'];
        
        }
        
        if(isset($_POST['dataInici']) && ($_POST['dataInici']!="")) {
            
            $dataInici=$_POST['dataInici'];
        
        }
        
        if(isset($_POST['dataFi']) && ($_POST['dataFi']!="")) {
            
            $dataFi=$_POST['dataFi'];        
                    
        }

        $arrayNewData = array(

            "idTasques" => $idTarea,
            "titulo" => $titulo, 
            'descripcio' => $descripcio, 
            'dataInici' => $dataInici, 
            'dataFi' => $dataFi, 
            'estat' => $estat

        );

        $newData = new Tareas();

        $newData->newData($arrayNewData);

    }

    public function deleteDataAction(){
        
        $deleteData = new Tareas();

        $idTarea = $_SESSION['idTarea'];
        
        $deleteData->deleteData($idTarea);

    }

}

