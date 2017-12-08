<?php

class EventManager extends AbstractConnectionManager{
    
    function getEvents()
    {
        $event = array();

        $req = $this->db->prepare('SELECT idEvent FROM Event');
        $req->execute();

        while ($data = $req->fetch(PDO::FETCH_OBJ))
        {
            $event[] = new Event($data);
        }
        
        return $event;
    }

    function createEvent($lat, $lon, $zoom, $name)
    {
        $req = $this->db->prepare('INSERT INTO Event(lat, lon, zoom, name) VALUE (:lat, :lon, :zoom, :name');
		$req->bindValue(':lat', $lat, PDO::PARAM_STR);
		$req->bindValue(':lon', $lon, PDO::PARAM_STR);
		$req->bindValue(':zoom', $zoom, PDO::PARAM_STR);
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