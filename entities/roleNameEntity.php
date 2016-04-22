<?php

class roleNameEntity 
{ 
			   public $roleID;
			   public $roleName;
			 
    function __construct($roleID,$roleName) {
        $this->roleID = $roleID;
		$this->roleName = $roleName;	
    }

}