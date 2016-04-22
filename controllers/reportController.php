<?php
require ("model/sqlModel.php");

class reportController {

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
                                        <a class='active-menu' href='reportcreate.php'><i class='fa fa-pencil'></i>Create Report</a>
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
	
    
    
      function CreateContent($template)
    {
         
		  $sqlModel = new sqlModel();
          //$userArray = $sqlModel->GetUserDetails();
		  $templateArray = $sqlModel->GetReportTemplates();
		  $formArray = $sqlModel->GetTemplateForm($template);
		  
		  session_start();
		  $myusername = $_SESSION["myusername"];
		  
		  $submitteddate = date('d/m/Y : H:i:s');
		   
          $result = "
		  
                <!-- /. NAV SIDE  -->
				
        <div id='page-wrapper'>
            <div id='page-inner'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h1 class='page-head-line'>Create a report</h1>
						<h1 class='page-subhead-line'>Fill in the forms to sumbit the report to your report manager</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class='row'>
                    <div class='col-md-12'> 
						  <text-align='centre'>
						  <form action = '' method = 'post'>
						   <label>Select Template</label>
                                <select id='Template' name='template' >
									  "; 
                    foreach ($templateArray as $template)
                    {
                    $result = $result . "
												<option value='$template->TemplateID'>$template->TemplateName</option>";
                    } 
					 $result = $result. " 
								</select>
						 <input type = 'submit' value = 'Select' />
						 </form>
						 
						 
						  ";
						  if (empty($templateArray))
                    {
                       $result = $result . "This template currently has no fields";
                    }
					else 
					{
						
						$result = $result . "
						
					* = Text is mandontory 	
					<form action='model/postreport.php' method='post'>
					Report Raiser: <input type='text' name='ReportRaiser' value='$myusername' readonly ><br>
					Submitted Date: <input type='text' name='SubmittedDate' value='$submitteddate' readonly><br>
					Report Name: <input type='text' name='ReportName' value='' required><br>
					Report Severity: <select name='ReportSeverity' >
									<option value='Low'>Low</option>
									<option value='Medium'>Medium</option>
									<option value='High'>High</option>
									</select><br>
					<input type='hidden' name='TemplateID' value='$template->TemplateID'>
					<input type='hidden' name='ReportStatus' value='Draft'>
					";
					$counter = 0;
					  foreach ($formArray as $item)  
                    {
						$counter++;
						
						$result = $result . "<input type='hidden' name='FieldID$counter' value='$item->FieldID'>";
						if($item->FieldMandatory == "Yes")
						{
							$result = $result . "* $item->FieldLabel: <input type='text' name='ItemID$counter' required><br>";
						}
						
						else if ($item->FieldMandatory == "No")
						{
							$result = $result . "$item->FieldLabel: <input type='text' name='ItemID$counter' value=''><br>";
						}
						
					}
					
					$result = $result . "
						<input type='submit'>
					
					</form> ";
					
					}
					
					
					$result = $result . "
                    </div>
                </div>
				

            </div>
            <!-- /. PAGE INNER  -->
        </div>";
         
          
        return $result;
        
        
    }

}

?>