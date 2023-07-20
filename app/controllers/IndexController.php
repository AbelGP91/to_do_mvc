<?php

class IndexController extends ApplicationController
{
    public function indexAction()
    {
        //
    }

    public function loginAction(){
        
        $users = new Usuarios();

        $usuariosEncontrados = $users->findByEmailPassword($_POST['email'], $_POST['password']);
        
        if (!empty($usuariosEncontrados)) {
            // Guardar información de los usuarios en la sesión
            $_SESSION["usuarios"] = $usuariosEncontrados;
            echo "se encontraron usuarios";
            // Redireccionar al usuario a la página de menú
            header('Location: menu');
            
        } else {
            // Mostrar mensaje de error si no se encontraron usuarios
            echo "No se encontraron usuarios";
        }

        }

    public function menuAction(){
        //
    }


}
 

?>
