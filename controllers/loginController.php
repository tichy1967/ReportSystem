<?php
error_reporting(0);
require ("model/sqlModel.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of fixtureController
 *
 * @author Michael
 */
    
class dashboardController {
	
	function SideBar() {
           
		   session_start();
			$myusername = $_SESSION["myusername"];
			
			
    $result = "<nav class='navbar-default navbar-side' role='navigation'>
            <div class='sidebar-collapse'>
                <ul class='nav' id='main-menu'>
                    <li>
                        <div class='user-img-div'>
                            <img src='img/sco.png' class='img-thumbnail' />

                            <div class='inner-text'>
                                Welcome $myusername
                            <br />
                                <small>Account Type : User</small>
                            </div>
                        </div>

                    </li>
                    
                           
                           <li>
                                <a class='active-menu' href='dashboard.php'><i class='fa fa-dashboard '></i>Homepage</a>
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
                                        <a href='adduser.php'><i class='fa fa-plus-square'></i>Create a user</a>
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
          $sqlModel= new sqlModel();

     
        $myusername=$_POST['myusername']; 
       
          $result = "
                <!-- /. NAV SIDE  -->
        <div id='page-wrapper'>
            <div id='page-inner'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h1 class='page-head-line'>Welcome $myusername</h1>
                        <h1 class='page-subhead-line'>Welcome to the Idea Gen report system.  Here, forms can be created, viewed, edited and deleted </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='alert alert-info'>
                            **Content Area** 
                          <br />
                            This will be the area where content will go 
                        </div>
                    </div>
                </div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>";

          
        return $result;
        
    }

	 function LoginFailed()
    {
        
        
            
          $result = "
                <!-- /. NAV SIDE  -->
        <div id='page-wrapper'>
            <div id='page-inner'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h1 class='page-head-line'>Login Failed</h1>
                        <h1 class='page-subhead-line'>Sorry but your username or password you entered was incorrect</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='alert alert-danger'>
                            **Content Area**
                          <br />
                            Please login with correct information
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