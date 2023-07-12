<?php

class LoginController extends ApplicationController{

    public function loginAction(){

    }

    public function processForm() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $username = $_POST["username"];
            $password = $_POST["password"];

            // Validar los datos y hacer cualquier otro procesamiento necesario

            // Guardar los datos en la sesión
            $_SESSION["username"] = $username;
        }


    public function buscarUsuario($email, $password) {
        foreach ($this->usuarios as $usuario) {
            if ($usuario['email'] === $email && $usuario['password'] === $password) {
                return $usuario;
            }
        }

        return null;
    }

}

}
?>
