<?php

include_once 'AbstractConnectionManager.class.php';
include_once '../../Models/Warning.class.php';

class WarningManager extends AbstractConnectionManager{
    
    function getWarning()
    {
        $warning = array();
        
        $req = $this->db->prepare('SELECT * FROM Warning');
        $req->execute();

        while ($data = $req->fetch(PDO::FETCH_OBJ))
        {
            array_push($warning, $data);
     
        }
    
        return $warning;
    }
    
    function getWarnings()
    {
        $warnings = array();
        $req = $this->db->prepare('SELECT * FROM Warning');
		$req->execute();
		while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
			$warnings[] = new Warning($data);
		}
		$req->closeCursor();
		return $warnings;
    }

    function createWarning($name, $level, $info, $nameType, $nameEvent, $lat, $lon)
    {
		if($name == "" || $level == "" || $info == "" || $nameType == "" || $nameEvent == "" || $lat == "" || $lon == "")
		{
	        return false;
        }
        
        $req = $this->db->prepare('SELECT idUser FROM User WHERE name = :name');
        $req->bindValue(':name', $nameType, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetch_assoc();
        $idType = $data['idUser'];
        $req->closeCursor();

        $req = $this->db->prepare('SELECT idEvent FROM Event WHERE name = :name');
        $req->bindValue(':name', $nameEvent, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetch_assoc();
        $idEvent = $data['idEvent'];
        $req->closeCursor();

        $req = $this->db->prepare('INSERT INTO Warning(idUser, idEvent, lat, lon, name, level, info) VALUE (:idUser, :idEvent, :lat, :lon, :name, :level, :info)');
        $req->bindValue(':idUser', $idType, PDO::PARAM_STR);
        $req->bindValue(':idEvent', $idEvent, PDO::PARAM_STR);
        $req->bindValue(':lat', $lat, PDO::PARAM_STR);
        $req->bindValue(':lon', $lon, PDO::PARAM_STR);
        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->bindValue(':level', $level, PDO::PARAM_STR);
        $req->bindValue(':info', $info, PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();

        if ($req)
		{
			return true;
		}
		else
		{
			return false;
        }
    }

    function deleteWarning($name)
    {
		if($name == "")
		{
	        return false;
        }
        
        $req = $this->db->prepare('DELETE FROM Warning WHERE name = :name');
        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->execute();
		$req->closeCursor();

        if ($req)
		{
			return true;
		}
		else
		{
			return false;
		}
    }
}