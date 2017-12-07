<?php

class UserManager extends AbstractConnectionManager{
    
    //exemple request // todo to modify
    function getUser($id)
    {
        $user = null;
		$req = $this->db->prepare('SELECT name FROM User WHERE id = :id');
		$req->bindValue(':id', $id, PDO::PARAM_INT);
		$req->execute();
		while ($data = $req->fetch(PDO::FETCH_OBJ)) {
			$user = new User($data);
		}
		$req->closeCursor();
		return $user;
	}
	
	function signIn($name, $password)
	{
		$password = hash('sha512', $password, false);

		$req = $this->db->prepare('SELECT idUser FROM User WHERE name = :name AND password = :password');
		$req->bindValue(':name', $name, PDO::PARAM_STR);
		$req->bindValue(':password', $password, PDO::PARAM_STR);
		$req->execute();

		if ($req)
		{
			$req->closeCursor();
			return true;
		}
		else
		{
			$req->closeCursor();
			return false;
		}
	}

	function signUp($name, $mail, $password, $adminLevel)
	{
		$password = hash('sha512', $password, false);

		$req = $this->db->prepare('INSERT INTO User(name, mail, password, adminLevel) VALUE (:name, :mail, :password, :adminLevel');
		$req->bindValue(':name', $name, PDO::PARAM_STR);
		$req->bindValue(':mail', $mail, PDO::PARAM_STR);
		$req->bindValue(':password', $password, PDO::PARAM_STR);
		$req->bindValue(':adminLevel', $adminLevel, PDO::PARAM_STR);
		$req->execute();

		if ($req)
		{
			$req->closeCursor();
			return true;
		}
		else
		{
			$req->closeCursor();
			return false;
		}
	}
}