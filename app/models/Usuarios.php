<?php

class Usuarios extends Model {

    public function __construct(){

        parent::__construct();
        $this->_setTable('usuarios');
        
    }

    public function findByEmailPassword($email, $password){

        $sql = "select * from " . $this->_table;
		$sql .= " where email_usuari = '$email' and password_usuari = '$password'";
		
		$statement = $this->_dbh->prepare($sql);
		$statement->execute();
		
		return $statement->fetch(PDO::FETCH_OBJ);
        
    }

}

