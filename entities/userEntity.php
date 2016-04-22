<?php

class userEntity 
{ 
    public $userID;
	public $username;
    public $password;
    public $firstName;
    public $lastName;
    public $email;
    
    function __construct($userID, $username, $password, $firstName, $lastName, $email) {
        $this->userID = $userID;
		$this->username = $username;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;   
    }

}
