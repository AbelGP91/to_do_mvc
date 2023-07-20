<?php

class IndexController extends ApplicationController
{
    public function indexAction(){}

    public function loginAction(){
        
        $users = new Usuarios();
        $usuariosEncontrados = $users->findByEmailPassword($_POST['email'], $_POST['password']);
        
        if (!empty($usuariosEncontrados)) {
            // Guardar información de los usuarios en la sesión
            $_SESSION["usuarios"] = $usuariosEncontrados;
            // Redireccionar al usuario a la página de menú
            header('Location: menu');
            
        } else {
            // no se encontraron usuarios
            echo '<script>alert("Los datos introducidos son erróneos");</script>';
            header('Location: errorLogin');
        }

    }

    public function errorLoginAction(){}

    public function menuAction(){}

}
?>