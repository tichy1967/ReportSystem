<?php
require ("model/sqlModel.php");

class addroleController {

	function SideBar() {
           
		    session_start();
			$myusername = $_SESSION["myusername"];
           $rolename = $_SESSION["rolename"];
			
			
    $result = "<nav class='navbar-default navbar-side' role='navigation'>
            <div class='sidebar-collapse'>
                <ul class='nav' id='main-menu'>
                    <li>
                        <div class='user-img-div'>
                            <img src='img/sco.png' class='img-thumbnail' />

                            <div class='inner-text'>
                                Welcome $myusername
                            <br />
                                <small>Account Type : $rolename</small>
                            </div>
                        </div>

                    </li>
                    
                           
                           <li>
                                <a  href='dashboard.php'><i class='fa fa-dashboard '></i>Homepage</a>
                             </li>
                            <li>
							
							<li>
							<a href='#'><i class='fa fa-briefcase'></i>Report Manager<span class='fa arrow'></span></a>
                                
                            <ul class='nav nav-third-level collapse'>
								<li>
									<li>
                                        <a href='createtemplates.php'><i class='fa fa-plus-square'></i>Create Report Templates</a>
                                    </li>
                                    <li>
                                        <a href='reportview.php'><i class='fa fa-bars'></i>View Reports</a>
                                    </li>
							</ul>           
								</li>
							</li>
							
							<li>
							<a href='#'><i class='fa fa-pencil'></i>Reporter Area<span class='fa arrow'></span></a>
                                
                            <ul class='nav nav-third-level collapse'>
								<li>
									<li>
                                        <a href='reportcreate.php'><i class='fa fa-pencil'></i>Create Report</a>
                                    </li>
							</ul>           
								</li>
							</li>
							
							<li>
							<a href='#'><i class='fa fa-lock'></i>Admin Area<span class='fa arrow'></span></a>
                                
                            <ul class='nav nav-third-level collapse'>
								<li>
									<li>
                                        <a  href='adduser.php'><i class='fa fa-plus-square'></i>Create a user</a>
                                    </li>
									<li>
                                        <a href='viewuser.php'><i class='fa fa-bars'></i>View user list</a>
                                    </li>
									<li>
                                        <a class='active-menu' href='addrole.php'><i class='fa fa-plus-circle'></i>Create Roles</a>
                                    </li>
									<li>
                                        <a href='viewrole.php'><i class='fa fa-eye'></i>View Roles</a>
                                    </li>
							</ul>           
								</li>
							</li>
                </ul>
            </div>
        </nav> ";
    
    return $result;
}
    
    
      function CreateContent()
    {
          $sqlModel = new sqlModel();
        
        
            
          $result = "
                <!-- /. NAV SIDE  -->
				
        <div id='page-wrapper'>
            <div id='page-inner'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h1 class='page-head-line'>Create Roles</h1>
						<h1 class='page-subhead-line'>This page is used to create roles.</h1>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class='row'>
                   
				   <div class='col-md-6 col-sm-6 col-xs-12'>
               <div class='panel panel-primary'>
                        <div class='panel-heading'>
                           Permissions
                        </div>
                        <div class='panel-body'>
						<form name='form1' method='post' action='insertpermissions.php'>
						
														<label>Role Name:<br>
								<input type='text' name='RoleName' value='$user->roleName' size='50'><br> </label> <br>
								
                    <label>Create Reports</label>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='CreateReportsRadio' id='createreportsYes' value='1'>Yes
                                                </label>
                                            </div>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='CreateReportsRadio' id='createreportsNo' value='0'>No
                                                </label>
                                            </div>
					  <label>Submit Reports</label>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='SubmitReportsRadio' id='submitreportsYes' value='1'>Yes
                                                </label>
                                            </div>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='SubmitReportsRadio' id='submitreportsNo' value='0'>No
                                                </label>
                                            </div>	
					    <label>View Reports</label>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='ViewReportsRadio' id='ViewreportsYes' value='1'>Yes
                                                </label>
                                            </div>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='ViewReportsRadio' id='ViewreportsNo' value='0'>No
                                                </label>
                                            </div>		
					  <label>Delete Reports</label>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='DeleteReportsRadio' id='DeletereportsYes' value='1'>Yes
                                                </label>
                                            </div>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='DeleteReportsRadio' id='DeletereportsNo' value='0'>No
                                                </label>
                                            </div>					
					     <label>Edit Reports</label>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='EditReportsRadio' id='EditreportsYes' value='1'>Yes
                                                </label>
                                            </div>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='EditReportsRadio' id='EditreportsNo' value='0'>No
                                                </label>
                                            </div>	
						  <label>Close Reports</label>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='CloseReportsRadio' id='ClosereportsYes' value='1'>Yes
                                                </label>
                                            </div>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='CloseReportsRadio' id='ClosereportsNo' value='0'>No
                                                </label>
                                            </div>		
						 	 <label>Add Attachment</label>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='AddAttachmentRadio' id='AddAttachmentYes' value='1'>Yes
                                                </label>
                                            </div>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='AddAttachmentRadio' id='AddAttachmentNo' value='0'>No
                                                </label>
                                            </div>		
							 <label>Remove Attachment</label>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='RemoveAttachmentRadio' id='RemoveAttachmentYes' value='1'>Yes
                                                </label>
                                            </div>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='RemoveAttachmentRadio' id='RemoveAttachmentNo' value='0'>No
                                                </label>
                                            </div>				
							 <label>Change Report Status</label>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='ChangeStatusRadio' id='ChangeStatusYes' value='1'>Yes
                                                </label>
                                            </div>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='ChangeStatusRadio' id='ChangeStatusNo' value='0'>No
                                                </label>
                                            </div>			
							 <label>Reopen Report</label>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='ReopenRadio' id='ReopenYes' value='1'>Yes
                                                </label>
                                            </div>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='ReopenRadio' id='ReopenNo' value='0'>No
                                                </label>
                                            </div>		
							<label>Add users to role</label>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='AddToRoleRadio' id='addroleYes' value='1'>Yes
                                                </label>
                                            </div>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='AddToRoleRadio' id='addroleNo' value='0'>No
                                                </label>
                                            </div>	
							<label>Remove users to role</label>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='RemoveFromRoleRadio' id='removeroleYes' value='1'>Yes
                                                </label>
                                            </div>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='RemoveFromRoleRadio' id='removeroleNo' value='0'>No
                                                </label>
                                            </div>									
							 <label>Create New Roles</label>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='CreateRoleRadio' id='CreateRoleYes' value='1'>Yes
                                                </label>
                                            </div>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='CreateRoleRadio' id='CreateRoleNo' value='0'>No
                                                </label>
                                            </div>								
							 <label>Edit Role</label>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='EditRoleRadio' id='EditRoleYes' value='1'>Yes
                                                </label>
                                            </div>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='EditRoleRadio' id='EditRoleNo' value='0'>No
                                                </label>
                                            </div>		
							 <label>Delete Role</label>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='DeleteRoleRadio' id='DeleteRoleYes' value='1'>Yes
                                                </label>
                                            </div>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='DeleteRoleRadio' id='DeleteRoleNo' value='0'>No
                                                </label>
                                            </div>									
							 <label>Create Users</label>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='CreateUsersRadio' id='CreateUsersYes' value='1'>Yes
                                                </label>
                                            </div>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='CreateUsersRadio' id='CreateUsersNo' value='0'>No
                                                </label>
                                            </div>		
							 <label>Edit Users</label>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='EditUsersRadio' id='EditUsersYes' value='1'>Yes
                                                </label>
                                            </div>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='EditUsersRadio' id='EditUsersNo' value='0'>No
                                                </label>
                                            </div>		
							 <label>Archieve Users</label>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='ArchiveUsersRadio' id='ArchiveUsersYes' value='1'>Yes
                                                </label>
                                            </div>
                                            <div class='radio'>
                                                <label>
                                                    <input type='radio' name='ArchiveUsersRadio' id='ArchiveUsersNo' value='0'>No
                                                </label>
                                            </div>		

						<input type='submit' name='Submit' value='Add Role'>
                          <span class='ladda-spinner'></span>
                          <div class='ladda-progress' style='width: 0px;'></div>
                      </button>
							</div>
						</form>											
											
											
				
                           
                            </div>
                        </div>
                            </div>
							
            <!-- /. PAGE INNER  -->
        </div>";
          
          $result = $result. "";
          
        return $result;
		
        
        
    }

}

?>