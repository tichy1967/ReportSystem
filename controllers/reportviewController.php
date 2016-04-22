<?php
require ("model/sqlModel.php");

class reportviewController {

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
                                        <a class='active-menu' href='reportview.php'><i class='fa fa-bars'></i>View Reports</a>
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
	
    
    
      function CreateContent($templates)
    {
        $sqlModel = new sqlModel();
		$reportArray = $sqlModel->GetReports($templates);
        $templateArray = $sqlModel->GetReportTemplates();
            
          $result = "
                <!-- /. NAV SIDE  -->
				
        <div id='page-wrapper'>
            <div id='page-inner'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h1 class='page-head-line'>View Reports</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                 <div class='row'>
				
				 <div class='form-group'>
                                            <form action = '' method = 'post'>
                                            <label>Select Template</label>
                                            <select name = 'templates'>
                                                <option value = '%'>All Templates</option>
                                                "; 
                    foreach ($templateArray as $template)
                    {
                    $result = $result . "
                                                <option value = '$template->TemplateID'>$template->TemplateName</option>";
                    }
                    
                      $result = $result. "                      </select>
                                         <input type = 'submit' value = 'Search' />
                                         </form>
                                        </div>
                                        
                </div>
				
				";
				
				$result = $result . "
				
                        <div class='row'>
						<div class='col-md-12'>

                        <div class='table-responsive'>
                            <table id='sortable' class='table table-striped table-bordered table-hover'>
                                <thead>
                                    <tr>
										<th>Report Name</th>
                                        <th>Template Name</th>
                                        <th>Report Raiser</th>
                                        <th>Report Status</th>
										<th>Report Severity</th>
                                        <th>Submitted Date</th>
                                    </tr>
                                </thead>
                                <tbody>";
								
foreach ($reportArray as $report) 
            
{
                      $result = $result . "
					  
									<tr data-href='report.php?report=$report->reportID'>
										<td>$report->reportName</td>
										<td>$report->templateName</td>
                                        <td>$report->reportRaiser</td>
                                        <td>$report->reportStatus</td>
										 <td>$report->reportSeverity</td>
										<td>$report->submittedDate</td>
                                    </tr> ";
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