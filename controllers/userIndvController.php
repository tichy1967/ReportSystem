<?php
require ("model/sqlModel.php");

class userIndvController {

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
            
			if (($_GET['edited']) == "yes")
			{
				 echo '<script language="javascript">';
				echo 'alert("Role successfully Edited")';
				 echo '</script>';
			}
			if (empty($_GET['role']))
                    {     
                       $result = "<div id='page-wrapper'>
            <div id='page-inner'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h1 class='page-head-line'>No Role Selected</h1>
                        <h1 class='page-subhead-line'>No role has been selected</h1>

                    </div>
                </div>

                </div>

            </div>
            <!-- /. PAGE INNER  -->";
                    }
					
					else
					{
					
					 $sqlModel = new sqlModel();
                        
                         $role = $_GET['role'];
						
						$ReportIndividiualArray = $sqlModel->GetRoleDetails($role);
						
						
          $result = "
                <!-- /. NAV SIDE  -->
				
        <div id='page-wrapper'>
            <div id='page-inner'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h1 class='page-head-line'>View Report</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class='row'>
                        
						<div class='col-md-12'>
						
						
						";

						$first = true;
								foreach ($ReportIndividiualArray as $value )
						{
								if ( $first )
							{
									// do something
									$result = $result . "
									
									<form action='updateReport.php' method='post'>
									<input type='hidden' name='ReportID' value='$value->reportID' size='50'>
									Report Name: <br><input type='text' name='ReportName' value='$value->reportName' size='50'><br>
									Submitted Date: <br><input type='text' name='SubmittedDate' value='$value->submittedDate' size='50' readonly><br>
									Report Owner: <br><input type='text' name='ReportOwner' value='$value->reportOwner' size='50'><br>
									Report Raiser: <br><input type='text' name='ReportRaiser' value='$value->reportRaiser' size='50' readonly><br>
									Report Severity: <br><select name='ReportSeverity' >
									<option value='$value->reportSeverity'>$value->reportSeverity</option>
									<option value='Low'>Low</option>
									<option value='Medium'>Medium</option>
									<option value='High'>High</option>
									</select><br>
									Report Status: <br><select name='ReportStatus' >
									<option value='$value->reportStatus'>$value->reportStatus</option>
									<option value='Draft'>Draft</option>
									<option value='Investigation'>Investigation</option>
									</select><br>
									";
									$first = false;
							}
								else
							{
									// do something
							}

									// do something
						}

						
						 foreach ($ReportIndividiualArray as $report) 
            {

							$result = $result . "
							<input type='hidden' name='$report->ItemID' value='$report->ItemID'>
							$report->FieldLabel: <br><input type='text' name='$report->FieldPosition' value='$report->ItemValue' size='50'><br>";
						
			}
			
			$result = $result . "

                       <input type='submit' value='Submit'>
					   </form>";
					   
					   session_start();
					   $candeletereport = $_SESSION["candeletereport"];
					   $canclosereport = $_SESSION["canclosereport"];
					   $reopen = $_SESSION["canreopenreport"];
					   
					    if ($canreopenreport == "1")
					   {
						   
						   $firstitem = true;
								foreach ($ReportIndividiualArray as $value )
						{
								if ( $firstitem )
							{
									// do something
									$result = $result . "
									
									<form action='model/reopenReport.php' method='post'>
									<input type='hidden' name='ReportID' value='$value->reportID' size='50'>
									";
									$firstitem = false;
							}
									// do something
						}
					 }	
			$result = $result . "

                       <input TYPE=SUBMIT NAME='reopenReport' VALUE='Reopen Report' onclick='return window.confirm('Are you sure you want to reopen this?');'>
						   </form>";
						   
						
					   }
					   
					    if ($canclosereport == "1")
					   {
						   
						   $firstitem = true;
								foreach ($ReportIndividiualArray as $value )
						{
								if ( $firstitem )
							{
									// do something
									$result = $result . "
									
									<form action='model/closeReport.php' method='post'>
									<input type='hidden' name='ReportID' value='$value->reportID' size='50'>
									";
									$firstitem = false;
							}
									// do something
						}

			$result = $result . "

                       <input TYPE=SUBMIT NAME='closeReport' VALUE='Close Report' onclick='return window.confirm('Are you sure you want to close this?');'>
						   </form>";
						   
						
					   }
					   
					   if ($candeletereport == "1")
					    {
						   
						   $firstitem = true;
								foreach ($ReportIndividiualArray as $value )
						{
								if ( $firstitem )
							{
									// do something
									$result = $result . "
									
									<form action='model/deleteReport.php' method='post'>
									<input type='hidden' name='ReportID' value='$value->reportID' size='50'>
									";
									$firstitem = false;
							}
									// do something
						}
						
						$result = $result . "

                       <input TYPE=SUBMIT NAME='deleteReport' VALUE='Delete Report' onclick='return window.confirm('Are you sure you want to delete this?');'>
						   </form>";
						
						}
					   $result = $result . "
`					


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