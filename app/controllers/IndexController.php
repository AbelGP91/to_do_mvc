<?php

class IndexController extends ApplicationController
{
    public function indexAction()
    {
        // $this->view->message = "hello ABEL from indexController->test";
    }

    public function loginAction(){
        
        $users = new Usuarios();

        $usuariosEncontrados = $users->findByEmailPassword($_POST['email'], $_POST['password']);
        
        if (!empty($usuariosEncontrados)) {
            // Guardar información de los usuarios en la sesión
            $_SESSION["usuarios"] = $usuariosEncontrados;
            echo "se encontraron usuarios";
            // Redireccionar al usuario a la página de menú
            header('Location: menu/');
            
        } else {
            // Mostrar mensaje de error si no se encontraron usuarios
            echo "No se encontraron usuarios";
        }

        }

    public function menuAction(){
        //Aqui llamaremos la funcion de MODELO para acceder a los datos de las tareas
    }
}
 

?>
