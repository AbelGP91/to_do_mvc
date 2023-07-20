<?php

class Tareas extends Model {

    

    public function __construct(){

        parent::__construct();
        $this->_setTable('tasques');
        
    }

    
    public function findTareasById($id){

        $mysql = new mysqli("localhost","root","","to_do");

        $sql = "SELECT idTasques, nom_tasques, descrip_tasques, estat_tasques, inici_tasques, fi_tasques FROM to_do.tasques WHERE tasques.Usuario_idUsuario LIKE '$id'" 
            or die($mysql->error);

        $tasques = $mysql->query($sql);

        $mysql->close();

        return $tasques;

        /*

        $sql = "select idTasques,nom_tasques,descrip_tasques,estat_tasques,inici_tasques,fi_tasques from " . $this->_table;
		$sql .= " where Usuario_idUsuario like '$id'";
		
		$statement = $this->_dbh->prepare($sql);
		$statement->execute();
        		
		return $statement->fetch(PDO::FETCH_OBJ);

        */
        
    }

    public function addData($data){

        $mysql = new mysqli("localhost","root","","to_do");

        $sql = "INSERT INTO to_do.tasques(nom_tasques,descrip_tasques,estat_tasques,inici_tasques,fi_tasques,Usuario_idUsuario) 
        VALUES ('$data[0]','$data[1]','$data[4]','$data[2]','$data[3]','$data[5]')";
        
        $mysql->query($sql);
        
        $mysql->close();
               

    }
    
}

