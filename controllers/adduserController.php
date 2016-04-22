<?php
require ("model/sqlModel.php");

class adduserController {

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
                                        <a class='active-menu' href='adduser.php'><i class='fa fa-plus-square'></i>Create a user</a>
                                    </li>
									<li>
                                        <a href='viewuser.php'><i class='fa fa-bars'></i>View user list</a>
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
			
			$rolesArray = $sqlModel->GetRoleNames();
        
            
          $result = "
                <!-- /. NAV SIDE  -->
				
        <div id='page-wrapper'>
            <div id='page-inner'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h1 class='page-head-line'>Create a user</h1>
						<h1 class='page-subhead-line'>This page is for adding a user.  You can add an individual by filling in all required fields </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class='row'>
                    <div class='col-md-12'>
                       <form name='form1' method='post' action='insertdb.php'>
					  <label>First Name *</label>
					  <br>
					  <input type='text' class='input-block-level' placeholder='Enter Your First Name' id='forename' name='forename' required>
					  <br>
					  <label>Last Name *</label>
					  <br>
					  <input type='text' class='input-block-level' placeholder='Enter Your Last Name' id='lastname' name='lastname' required>
					  <br>
					  <label>Email *</label>
					  <br>
					  <input type='text' class='input-block-level' placeholder='Enter Your Email' id='myemail' name='myemail' required>
					  <br>
					  <label>Username *</label>
					  <br>
                      <input type='text' class='input-block-level' placeholder='Enter Your Username' id='myusername' name='myusername' required>
					  <br>
					   <label>Password *</label>
					 <br>
					  <input type='password' class='input-block-level' placeholder='Enter Your Password' id='mypassword' name='mypassword'>
					  <br>
					  
					  <label>Select Role(s)</label>
                                <select id='role' name='role' >
									  "; 
                    foreach ($rolesArray as $role)
                    {
                    $result = $result . "
												<option value='$role->roleID'>$role->roleName</option>";
                    } 
					 $result = $result. " 
								</select>
					<br>
					  
                      <input type='submit' name='Register' value='Register'>
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