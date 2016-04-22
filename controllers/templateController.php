<?php

class templateController {

	function Script() {
		
		$result = "
		
		


				";

	return $result;
	}
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
                                        <a class='active-menu' href='createtemplates.php'><i class='fa fa-plus-square'></i>Create Report Templates</a>
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
        session_start();
		$myusername = $_SESSION["myusername"];
        $date = date("d/m/Y");
            
          $result = "
                <!-- /. NAV SIDE  -->
				
        <div id='page-wrapper'>
            <div id='page-inner'>
                <div class='row'>
				
				<div class='col-md-12'>
                        <h1 class='page-head-line'>Template Creator</h1>

                   
					
                    <input type='button' value='Add TextBox' id='addTextBox'>
<input type='button' value='Add Date Field' id='addDatefield'>
<input type='button' value='First Name' id='addFirstName'>
<input type='button' value='Last Name' id='addLastName'>
<input type='button' value='DOB' id='addDOB'>
<input type='button' value='Remove Button' id='removeButton'>

<form action='posttemplate.php' method='post'>

<div id='TextBoxesGroup'>
<br>
Template Name: <input type='text' name='templatename' required><br>
Template Description: <input type='text' name='templatedescription' value='' required></br>
Template Creator: <input type='text' name='templatecreator' value='$myusername' readonly><br> 
Submitted Date: <input type='text' name='submitteddate' value='$date' readonly></br>

	<div id='TextBoxDiv'>
	</div>
</div>
<input type='submit'>
</form>         

       </div>
              
			   </div>
            <!-- /. PAGE INNER  -->
		</div>";
          
          $result = $result. "";
          
        return $result;
        
        
    }

}

?>