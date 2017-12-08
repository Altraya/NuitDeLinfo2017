<?php

class User
{
    private $_id;

    private $_login;

    private $_email;

    private $_pwd;
    
    /*Constructor*/
	public function __construct($data){
		$this->hydrate($data);
		
	}
	
	/***************************
		Getters / Setters
	****************************/
	
	public function getId(){
		return $this->_id;
	}
	public function getLogin(){
		return $this->_login;
	}
	public function getPwd(){
		return $this->_pwd;
	}
    public function getEmail(){
        return $this->_email;
    }
	/************************/
	
	public function setId($id){
		$this->_id = $id;
	}
	public function setLogin($login){
		
		$this->_login = htmlspecialchars($login);	
	}
	public function setPwd($pwd){
		try{
			$hashedPwd = password_hash(htmlspecialchars($pwd), PASSWORD_DEFAULT); //generate random salt
        	$this->_pwd = $hashedPwd;
		}catch(\Exception $ex)
		{
			echo($ex->getMessage());
		}
        
	}
	public function setFirstName($firstName){
		$this->_firstName = htmlspecialchars($firstName);	
	}
	public function setLastName($lastName){
		$this->_lastName = htmlspecialchars($lastName);	
	}
	public function setEmail($email){
	    $this->_email = htmlspecialchars($email);
	}
	public function setBirthdate($birthdate)
	{
		$birthdate = htmlspecialchars($birthdate);
		
		$birthdate = DateTime::createFromFormat('j F, Y', $birthdate);
		$this->_birthdate = $birthdate->format('Y-m-d');
	}
	
	/************************/
	
	public function hydrate($data)
	{
		foreach($data as $key => $value)
		{
			// Get back the setter name wich correspond to the attribute 
			$method = 'set'.ucfirst($key);
			// if the good setter exist.
			if(method_exists($this, $method))
			{
				// call setter but if the value is equal to "" we need to set null
				$this->$method($value);
			}
		}
	}

}