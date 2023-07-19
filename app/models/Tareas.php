<?php

class Tareas extends Model {

    

    public function __construct(){

        parent::__construct();
        $this->_setTable('tasques');
        
    }

    
    public function findTareasById($id){

        $mysql = new mysqli("localhost","root","","to_do");

        $sql = "SELECT * FROM to_do.tasques WHERE tasques.Usuario_idUsuario LIKE '$id'" 
            or die($mysql->error);

        $tasques = $mysql->query($sql);

        return $tasques;

        /*

        $sql = "select idTasques,nom_tasques,descrip_tasques,estat_tasques,inici_tasques,fi_tasques from " . $this->_table;
		$sql .= " where Usuario_idUsuario like '$id'";
		
		$statement = $this->_dbh->prepare($sql);
		$statement->execute();
        		
		return $statement->fetch(PDO::FETCH_OBJ);

        */
        
    }

    

}

