<?php

abstract class AbstractConnectionManager {
    protected $db;
    
    public function __construct($db){
		$this->setDb($db);
	}
	
	public function setDb(PDO $db){
		$this->db = $db;
	}
	
	public function getDb(){
		return $this->db;
	}
}