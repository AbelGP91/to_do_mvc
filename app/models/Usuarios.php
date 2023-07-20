<?php

class Usuarios extends Model
{
   
    protected $usuarios;

    public function __construct()
    {
        $json = file_get_contents('../persistencia/usuarios.json');
        $data = json_decode($json, true);
        $this->usuarios = $data["usuarios"];
    }

    public function findByEmailPassword($email, $password)
    {
        $usuariosEncontrados = [];
        foreach ($this->usuarios as $usuario) {
            if ($usuario["email_usuari"] == $email && $usuario["password_usuari"] == $password) {
                $usuariosEncontrados[] = $usuario;
            }
        }
        return $usuariosEncontrados;
    }

    
}


?>