<?php

class roleEntity 
{ 
	
			   public $roleID;
			   public $roleName;
			   public $roleCreateReport;
               public $roleSubmitReport;
               public $roleDeleteReport;
			   public $roleEditReport;
			   public $roleViewReport;
			   public $roleCloseReport;
               public $roleAddAttachment;
               public $roleRemoveAttachment;
			   public $roleChangeStatus;
			   public $roleReOpenReport;
			   public $roleAddUsersToRole;
               public $roleRemoveUsersFromRole;
               public $roleCanCreateRole;
			   public $roleCanEditRole;
			   public $roleCanDeleteRole;
			   public $roleCanCreateUsers;
			   public $roleCanArchiveUsers;
               public $roleCanEditUsers;
               public $roleCanCreateTemplates;
    
    function __construct($roleID,$roleName,$roleCreateReport,$roleSubmitReport,$roleDeleteReport,$roleEditReport,$roleViewReport,
			   $roleCloseReport,$roleAddAttachment,$roleRemoveAttachment,$roleChangeStatus,$roleReOpenReport,$roleAddUsersToRole,$roleRemoveUsersFromRole,$roleCanCreateRole,
			   $roleCanEditRole,$roleCanDeleteRole,$roleCanCreateUsers,$roleCanArchiveUsers,$roleCanEditUsers,$roleCanCreateTemplates) {
        $this->roleID = $roleID;
		$this->roleName = $roleName;
        $this->roleCreateReport = $roleCreateReport;
        $this->roleSubmitReport = $roleSubmitReport;
        $this->roleDeleteReport = $roleDeleteReport;
		$this->roleEditReport = $roleEditReport;
        $this->roleViewReport = $roleViewReport; 
		$this->roleCloseReport = $roleCloseReport;
		$this->roleAddAttachment = $roleAddAttachment;
        $this->roleRemoveAttachment = $roleRemoveAttachment;
        $this->roleChangeStatus = $roleChangeStatus;
        $this->roleReOpenReport = $roleReOpenReport;
        $this->roleAddUsersToRole = $roleAddUsersToRole; 
		$this->roleRemoveUsersFromRole = $roleRemoveUsersFromRole;
		$this->roleCanCreateRole = $roleCanCreateRole;
		$this->roleCanEditRole = $roleCanEditRole;
        $this->roleCanDeleteRole = $roleCanDeleteRole;
        $this->roleCanCreateUsers = $roleCanCreateUsers;
        $this->roleCanArchiveUsers = $roleCanArchiveUsers;
        $this->roleCanEditUsers = $roleCanEditUsers;
		$this->roleCanCreateTemplates = $roleCanCreateTemplates; 		
    }

}