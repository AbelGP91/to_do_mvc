<?php

class IndexController extends ApplicationController
{

    
    public function indexAction()
    {

        // $this->view->message = "hello ABEL from indexController->test";
        
    }
    
    public function loginAction()
    {
        // print_r($_POST);
        
        // $this->view->message = "He hecho Login";    
        
        $usuarios = new Usuarios();

        $user = $usuarios->findByEmailPassword($_POST['email'], $_POST['password']);
       
        $array = json_decode(json_encode($user), true);
        
        // echo "<br>";
        // echo $array['idUsuario'];

        if($user)
        {   
            echo "Logueado";

            $_SESSION['usuario'] = $array['id'];
            header('Location: /mvc/web/menu');
        }
        else{
                
            echo '<script language="javascript">alert("El usuario y/o la contraseña son incorrectos");window.location.href="/mvc/web/"</script>'; 
            // header('Location: /mvc/web/');
                        
        }

    }

    public function menuAction(){

        
        //Aqui llamaremos la funcion de MODELO para acceder a los datos de las tareas

    }

    /*
    
    public function checkAction()
    {
        $this->view->asdf = "hello ABEL from test::check";
    }

    */
}

?>

 