<?php
require ("model/sqlModel.php");

class viewroleController {

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
                                        <a  href='addrole.php'><i class='fa fa-plus-circle'></i>Create Roles</a>
                                    </li>
									<li>
                                        <a class='active-menu' href='viewrole.php'><i class='fa fa-eye'></i>View Roles</a>
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
        $roleArray = $sqlModel->GetRoleList();
            
          $result = "
                <!-- /. NAV SIDE  -->
				
        <div id='page-wrapper'>
            <div id='page-inner'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h1 class='page-head-line'>View Roles - *Key* - 1 = YES and 0 = NO</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class='row'>
                        
						<div class='col-md-12'>

                        <div class='table-responsive'>
                            <table class='table table-striped table-bordered table-hover'>
                                <thead>
                                    <tr>
                                        <th>Role Name</th>
                                        <th>Create Report</th>
                                        <th>Submit Report</th>
                                        <th>Delete Report</th>
										<th>Edit Report </th>
                                        <th>View Report</th>
                                        <th>Close Report</th>
                                        <th>Add Attachment</th>
                                        <th>Remove Attachment</th>
										<th>Change Status</th>
                                        <th>Re-open Report</th>
                                        <th>Add Users To Role</th>
                                        <th>Remove Users From Role</th>
                                        <th>Create Role</th>
										<th>Edit Role</th>
										<th>Delete Role </th>
                                        <th>Create Users</th>
                                        <th>Archive Users</th>
                                        <th>Edit Users</th>
                                        <th>Create Templates</th>
                                    </tr>
                                </thead>
                                <tbody>";
								
foreach ($roleArray as $userrole) 
            
{
	
										if ($userrole->roleCreateReport == "1")
										{
											$roleCreateReport = "Yes";
										}
										else
										{
											$roleCreateReport = "No";
										}
										
	
	
                      $result = $result . "
					  
									<tr data-href='role.php?role=$userrole->roleID'>
										<td>$userrole->roleName</td>
										<td>$userrole->roleCreateReport</td>
                                        <td>$userrole->roleSubmitReport</td>
                                        <td>$userrole->roleViewReport</td>
                                        <td>$userrole->roleDeleteReport</td>
                                        <td>$userrole->roleEditReport</td>
                                        <td>$userrole->roleCloseReport</td>
										<td>$userrole->roleAddAttachment</td>
										<td>$userrole->roleRemoveAttachment</td>
                                        <td>$userrole->roleChangeStatus</td>
                                        <td>$userrole->roleReOpenReport</td>
                                        <td>$userrole->roleAddUsersToRole</td>
                                        <td>$userrole->roleRemoveUsersFromRole</td>
                                        <td>$userrole->roleCanCreateRole</td>
										<td>$userrole->roleCanEditRole</td>
										<td>$userrole->roleCanDeleteRole</td>
                                        <td>$userrole->roleCanCreateUsers</td>
                                        <td>$userrole->roleCanEditUsers</td>
                                        <td>$userrole->roleCanArchiveUsers</td>
										<td>$userrole->roleCanCreateTemplates</td>

                                    </tr>";
}
                                    $result = $result.  "
									
                                </tbody>
                            </table>
							</form>
                        </div>




                    </div>
                    </div>
                </div>
				

            </div>
            <!-- /. PAGE INNER  -->
        </div>";
         
          
        return $result;
        
        
    }

}

?>