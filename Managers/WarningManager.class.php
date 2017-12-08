<?php

class WarningManager extends AbstractConnectionManager{
    
    function getWarning()
    {

    }

    function createWarning($name, $level, $info, $nameUser, $nameEvent)
    {
        $req = $this->db->prepare('SELECT idUser FROM User WHERE name = :name');
        $req->bindValue(':name', $nameUser, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetch_assoc();
        $idUser = $data['idUser'];
        $req->closeCursor();

        $req = $this->db->prepare('SELECT idEvent FROM Event WHERE name = :name');
        $req->bindValue(':name', $nameEvent, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetch_assoc();
        $idEvent = $data['idEvent'];
        $req->closeCursor();

        $req = $this->db->prepare('INSERT INTO Warning(idUser, idEvent, name, level, info) VALUE (:idUser, :idEvent, :name, :level, :info)');
        $req->bindValue(':idUser', $idUser, PDO::PARAM_STR);
        $req->bindValue(':idEvent', $idEvent, PDO::PARAM_STR);
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