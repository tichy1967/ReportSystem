<?php
require ("model/sqlModel.php");

class viewuserController {

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
                                        <a class='active-menu' href='viewuser.php'><i class='fa fa-bars'></i>View user list</a>
                                    </li>
									<li>
                                        <a href='addrole.php'><i class='fa fa-plus-circle'></i>Create Roles</a>
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
		  $theuserArray = $sqlModel->GetUserList();
        
            
          $result = "
                <!-- /. NAV SIDE  -->
				
        <div id='page-wrapper'>
            <div id='page-inner'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h1 class='page-head-line'>View Users</h1>
						<h1 class='page-subhead-line'>This page is for viewing reports.  You can choose an individual report by selecting a report from the list </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class='row'>
                        
						<div class='col-md-12'>

                        <div class='table-responsive'>
                            <table class='table table-striped table-bordered table-hover'>
                                <thead>
                                    <tr>
										<th>Username</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
										<th>User Role</th>
                                    </tr>
                                </thead>
                                <tbody>";
								
 foreach ($theuserArray as $user) 
            
{
                      $result = $result . "<tr data-href='user.php?user=$user->userID'>
                                        <td>$user->username</td>
										<td>$user->firstname</td>
                                        <td>$user->lastname</td>
                                        <td>$user->email</td>
										<td>$user->rolename</td>
                                    </tr> ";
}
                                    $result = $result.  "
									
                                </tbody>
                            </table>
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