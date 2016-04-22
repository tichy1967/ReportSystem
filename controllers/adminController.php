<?php
require ("model/fixtureModel.php");

class adminController {

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
                                <small>Account Type : $rolename </small>
                            </div>
                        </div>

                    </li>
                    
                    <div id='date'></div>  
                    
                    ";
                if (empty($_GET['date']))
                {
               $result = $result . "                 
                           <li>
                                <a class='active-menu' href='index.php'><i class='fa fa-dashboard '></i>Homepage</a>
                             </li>
                            <li>
                            <a href='reportcreate.php'><i class='fa fa-futbol-o'></i>Create Reports</a>
                            </li>
                            <li>
                                <a href='reportview.php'><i class='fa fa-futbol-o'></i>View Reports</a>
                            </li>
                            </li>
                                
								<li>
                                <a class='active-menu' href='admin.php'><i class='fa fa-dashboard '></i>Admin area</a>
                             </li>
							 
							 <li>
                                <a href='adduser.php'><i class='fa fa-futbol-o'></i>Add User</a>
                            </li>
							
							<li>
                                <a href='viewuser.php'><i class='fa fa-futbol-o'></i>View Users</a>
                            </li>
							
							<li>
                                <a href='addrole.php'><i class='fa fa-futbol-o'></i>Add Role(s)</a>
                            </li>
							
							<li>
                                <a href='viewrole.php'><i class='fa fa-futbol-o'></i>View Roles</a>
                            </li>
							
							
            ";
                } else {
                    $date = $_GET['date'];
                    
                    $result = $result . "  
                            <li>
                                <a class='active-menu' href='index.php'><i class='fa fa-dashboard '></i>Homepage</a>
                             </li>
                            <li>
                            <a href='reportcreate.php'><i class='fa fa-futbol-o'></i>Create Reports</a>
                            </li>
                            <li>
                                <a href='reportview.php'><i class='fa fa-futbol-o'></i>View Reports</a>
                            </li>
                            </li>
                                
								<li>
                                <a class='active-menu' href='admin.php'><i class='fa fa-dashboard '></i>Admin area</a>
                             </li>
							 
							 <li>
                                <a href='adduser.php'><i class='fa fa-futbol-o'></i>Add User</a>
                            </li>
							
							<li>
                                <a href='viewuser.php'><i class='fa fa-futbol-o'></i>View Users</a>
                            </li>
							
							<li>
                                <a href='addrole.php'><i class='fa fa-futbol-o'></i>Add Role(s)</a>
                            </li>
							
							<li>
                                <a href='viewrole.php'><i class='fa fa-futbol-o'></i>View Roles</a>
                            </li>
            ";
                }
               $result = $result . "
                       
                   
                </ul>

            </div>

        </nav> ";
    
    return $result;
}
    
    
      function CreateContent()
    {
          $fixtureModel = new FixtureModel();
        
        
            
          $result = "
                <!-- /. NAV SIDE  -->
				
        <div id='page-wrapper'>
            <div id='page-inner'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h1 class='page-head-line'></h1>
						<h1 class='page-subhead-line'>This page is for admin purposes.  Only admin can use this area </h1>
                        <h1 class='page-subhead-line'>Administration purposes. </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='alert alert-info'>
                          <br /> 
						  ///Page should display all options for admin/// Just for reference not implemented at this stage
						  <br />
						  <br />
						  Create User                                            
						  <br />
						  |||||||||||||||
						  <br />
						  View User(s)                                         
						  <br />
						  |||||||||||||||
						  <br />
						  Create Role                                          
						  <br />
						  |||||||||||||||
						  <br />
						  View Role(s)                                          
						  <br />
						  |||||||||||||||
						  <br />
						  
                        </div>
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