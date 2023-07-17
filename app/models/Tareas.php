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

    public function newData($newData){       

        $mysql = new mysqli("localhost","root","","to_do");

        if ($newData['titulo'] !=null){

            $sql = "UPDATE to_do.tasques SET nom_tasques = '$newData[titulo]' WHERE idTasques = '$newData[idTasques]'";
            $mysql->query($sql);

        }

        if ($newData['descripcio'] !=null){

            $sql = "UPDATE to_do.tasques SET descrip_tasques = '$newData[descripcio]' WHERE idTasques = '$newData[idTasques]'";
            $mysql->query($sql);

        }

        if ($newData['dataInici'] !=null){

            $sql = "UPDATE to_do.tasques SET inici_tasques = '$newData[dataInici]' WHERE idTasques = '$newData[idTasques]'";
            $mysql->query($sql);        
    
        }

        if ($newData['dataFi'] !=null){

            $sql = "UPDATE to_do.tasques SET fi_tasques = '$newData[dataFi]' WHERE idTasques = '$newData[idTasques]'";
            $mysql->query($sql);

        }

        if ($newData['estat'] !=null){

            $sql = "UPDATE to_do.tasques SET estat_tasques = '$newData[estat]' WHERE idTasques = '$newData[idTasques]'";
            $mysql->query($sql);

        }

        $mysql->close();

    }

    public function deleteData($idTasca){

        $mysql = new mysqli("localhost","root","","to_do");

        $sql = "DELETE FROM to_do.tasques WHERE idTasques = '$idTasca'";
        $mysql->query($sql);

        $mysql->close();

    }

}

