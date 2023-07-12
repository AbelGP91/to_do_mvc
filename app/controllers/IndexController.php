<?php

class IndexController extends ApplicationController
{
    public function indexAction()
    {
        // $this->view->message = "hello ABEL from indexController->test";
    }

    public function loginAction(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos enviados por el formulario
            $email = $_POST["email"];
            $password = $_POST["password"];
        
            // Leer el contenido del archivo JSON
            //$data = json_decode(file_get_contents('../../modelo/usuarios.json'), true);
            

            

        }

    public function menuAction(){
        //Aqui llamaremos la funcion de MODELO para acceder a los datos de las tareas
    }
}
 

?>
