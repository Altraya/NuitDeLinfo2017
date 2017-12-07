<?php

class UserManager extends AbstractConnectionManager{
    
    //exemple request // todo to modify
    public getUser($id)
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
}