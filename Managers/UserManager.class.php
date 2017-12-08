<?php

include_once 'AbstractConnectionManager.class.php';

class UserManager extends AbstractConnectionManager{
    
    protected $db;

    public function __construct($parent)
    {
        $this->db = $parent;
    }
	
	function signIn($name, $password)
	{
		$password = hash('sha512', $password, false);

		$req = $this->db->prepare('SELECT idUser FROM User WHERE name = :name AND password = :password');
		$req->bindValue(':name', $name, PDO::PARAM_STR);
		$req->bindValue(':password', $password, PDO::PARAM_STR);
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

	function signUp($name, $mail, $password, $adminLevel)
	{
		$password = hash('sha512', $password, false);
        
		$req = $this->db->prepare('INSERT INTO User(name, mail, password, adminLevel) VALUE (:name, :mail, :password, :adminLevel)');
		$req->bindValue(':name', $name, PDO::PARAM_STR);
		$req->bindValue(':mail', $mail, PDO::PARAM_STR);
		$req->bindValue(':password', $password, PDO::PARAM_STR);
		$req->bindValue(':adminLevel', $adminLevel, PDO::PARAM_STR);
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

	function createOrganisation($nameUser, $nameEvent, $isCreator)
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

        $req = $this->db->prepare('INSERT INTO Warning(idUser, idEvent, isCreator) VALUE (:idUser, :idEvent, :isCreator)');
        $req->bindValue(':idUser', $idUser, PDO::PARAM_STR);
        $req->bindValue(':idEvent', $idEvent, PDO::PARAM_STR);
        $req->bindValue(':isCreator', $isCreator, PDO::PARAM_BOOL);
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

	function deleteUser($name)
    {
        $req = $this->db->prepare('DELETE FROM User WHERE name = :name');
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