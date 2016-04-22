<?php

class theuserEntity 
{ 
    public $userID;
	public $username;
    public $firstname;
    public $lastname;
    public $email;
	public $rolename;
    
    function __construct($userID, $username, $firstname, $lastname, $email, $rolename) {
        $this->userID = $userID;
		$this->username = $username;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;   
		$this->rolename = $rolename;
    }

}
