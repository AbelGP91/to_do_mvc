<?php

class IndexController extends ApplicationController
{
    public function indexAction()
    {
        $this->view->message = "hello ABEL from indexController->test";
        
    }
    
    public function loginAction()
    {
        // print_r($_POST);
        
        // $this->view->message = "He hecho Login";    
        
        $usuarios = new Usuarios();

        $user = $usuarios->findByEmailPassword($_POST['email'], $_POST['password']);

        // var_dump($user);

        if($user)
        {   
            echo "Logueado";
            // $_SESSION['user'] = $user;
            // header('Location: /menu');
        }
        else{
            echo "No logueado";
            // header('Location: /index');
        }

    }
    /*
    
    public function checkAction()
    {
        $this->view->asdf = "hello ABEL from test::check";
    }

    */
}

?>