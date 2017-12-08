<?php

include_once 'AbstractConnectionManager.class.php';

class TypeManager extends AbstractConnectionManager{
    
    function getTypeById($id)
    {
        $type = array();

        $req = $this->db->prepare('SELECT * FROM Type where idType = '.$id);
        $req->execute();

        while ($data = $req->fetch(PDO::FETCH_OBJ))
        {
            array_push($type,$data);
        }

        return $type;
    }

    function createType($name, $icon)
    {
		if($name == "" || $icon == "")
		{
	        return false;
        }
        
        $req = $this->db->prepare('INSERT INTO Type(name, icon) VALUE (:name, :icon)');
        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->bindValue(':icon', $icon, PDO::PARAM_STR);
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

    function deleteType($name)
    {
		if($name == "")
		{
	        return false;
        }
        
        $req = $this->db->prepare('DELETE FROM Type WHERE name = :name');
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