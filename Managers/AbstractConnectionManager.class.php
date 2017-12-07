<?php

class abstract AbstractConnectionManager {
    protected $db;
    
    public function __construct($db){
		$this->setDb($db);
	}
	
	protected function setDb(PDO $db){
		$this->_db = $db;
	}
}