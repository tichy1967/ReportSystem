<?php

require ("entities/theuserEntity.php");
require ("entities/userEntity.php");
require ("entities/reportEntity.php");
require ("entities/roleEntity.php");
require ("entities/roleNameEntity.php");
require ("entities/templateEntity.php");
require ("entities/formEntity.php");
require ("entities/reportdetailsEntity.php");

class sqlModel {
    
	
	
	public function GetRoleDetails($role){
       require 'Credentials.php';
        
		// Connect to server and select databse.
		mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
		mysql_select_db("$database")or die("cannot select DB");
		
		$query = "SELECT roleID, roleName, roleCreateReport, roleSubmitReport, roleDeleteReport, roleEditReport, roleViewReport, roleCloseReport, roleAddAttachment, roleRemoveAttachment, roleChangeStatus, 
		roleReOpenReport, roleAddUsersToRole, roleRemoveUsersFromRole, roleCanCreateRole, roleCanEditRole, roleCanDeleteRole, roleCanCreateUsers, roleCanArchiveUsers, roleCanEditUsers, roleCanCreateTemplates from roles  
		where roleID = $role
		ORDER BY roleID ASC;";
          
          $result = mysql_query($query) or die(mysql_error());
          $roleArray= array();
           while($row = mysql_fetch_array($result))
            {
               $roleID = $row[0];
			   $roleName = $row[1];
			   $roleCreateReport = $row[2];
               $roleSubmitReport = $row[3];
               $roleDeleteReport = $row[4];
			   $roleEditReport = $row[5];
			   $roleViewReport = $row[6];
			   $roleCloseReport = $row[7];
               $roleAddAttachment = $row[8];
               $roleRemoveAttachment = $row[9];
			   $roleChangeStatus = $row[10];
			   $roleReOpenReport = $row[11];
			   $roleAddUsersToRole = $row[12];
               $roleRemoveUsersFromRole = $row[13];
               $roleCanCreateRole = $row[14];
			   $roleCanEditRole = $row[15];
			   $roleCanDeleteRole = $row[16];
			   $roleCanCreateUsers = $row[17];
			   $roleCanArchiveUsers = $row[18];
               $roleCanEditUsers = $row[19];
               $roleCanCreateTemplates= $row[20];
            

               $arole = new roleEntity($roleID,$roleName,$roleCreateReport,$roleSubmitReport,$roleDeleteReport,$roleEditReport,$roleViewReport,
			   $roleCloseReport,$roleAddAttachment,$roleRemoveAttachment,$roleChangeStatus,$roleReOpenReport,$roleAddUsersToRole,$roleRemoveUsersFromRole,$roleCanCreateRole,
			   $roleCanEditRole,$roleCanDeleteRole,$roleCanCreateUsers,$roleCanArchiveUsers,$roleCanEditUsers,$roleCanCreateTemplates);
               array_push($roleArray, $arole);
               
               //close connection and return
            }
               mysql_close();
               return $roleArray;
			   
    }
	
	public function GetReportDetails($report){
       require 'Credentials.php';
       
        // Connect to server and select databse.
				mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
				mysql_select_db("$database")or die("cannot select DB");
       

        
       $result = mysql_query("Select report.ReportID, report.ReportSubmittedDate, report.ReportName, report.ReportRaiser, report.ReportStatus, field.FieldType, field.FieldLabel, item.ItemValue, item.ItemID, template.TemplateOwner, field.FieldPosition, report.ReportSeverity from report 
   JOIN field
       ON field.TemplateID = report.TemplateID
   JOIN item
    	ON item.FieldID = field.FieldID
   JOIN template
		on template.TemplateID = report.TemplateID
   WHERE item.ReportID = $report
   GROUP BY field.FieldPosition;
   ") or die(mysql_error());
        
       $reportdetailsArray = array();
           while($row = mysql_fetch_array($result))
            {
			   $ReportID = $row[0];
               $SubmittedDate = $row[1];
               $ReportName = $row[2];
               $ReportRaiser = $row[3];
               $ReportStatus = $row[4];
               $FieldType = $row[5];
               $FieldLabel = $row[6];
			   $ItemValue = $row[7];
			   $ItemID = $row[8];
			   $ReportOwner = $row[9];
			   $FieldPosition = $row[10];
			   $ReportSeverity = $row[11];
               
               
               $reportdetails = new reportdetailsEntity($ReportID, $SubmittedDate,$ReportName, $ReportRaiser, $ReportStatus, $FieldType, $FieldLabel, $ItemValue, $ItemID, $ReportOwner, $FieldPosition, $ReportSeverity);
               array_push($reportdetailsArray, $reportdetails);
               
               //close connection and return
            }
               mysql_close();
               return $reportdetailsArray;
       //
    }
    
	
	
	 function GetTemplateForm($template)
       {
          require 'Credentials.php';
          // Connect to server and select databse.
				mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
				mysql_select_db("$database")or die("cannot select DB");
                    

				
        
          $query = "SELECT FieldID, FieldPosition, FieldType, FieldLabel, FiledMandatory, TemplateID from field  
where TemplateID = '$template'
ORDER BY FieldPosition ASC;";
          
          $result = mysql_query($query) or die(mysql_error());
          $formArray = array();
           while($row = mysql_fetch_array($result))
            {
               $FieldID = $row[0];
               $FieldPosition = $row[1];
               $FieldType = $row[2];
               $FieldLabel= $row[3];
               $FieldMandatory = $row[4];
               $TemplateID = $row[5];
              
               $formtemplate = new formEntity($FieldID, $FieldPosition, $FieldType, $FieldLabel, $FieldMandatory, $TemplateID);
               array_push($formArray, $formtemplate);
               
               //close connection and return
            }
               mysql_close();
               return $formArray;
               
                       
            }
			
	public function GetReportTemplates() {
	  require 'Credentials.php';
              
		// Connect to server and select databse.
		mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
		mysql_select_db("$database")or die("cannot select DB");
		
       $result = mysql_query("SELECT  DISTINCT TemplateID, TemplateName FROM template") or die(mysql_error());
	   
	   $templateArray = array();
	   
	   //Get data from database.
       while($row = mysql_fetch_array($result))
       {
           

           $TemplateID = $row[0];
           $TemplateName = $row[1];
           
           
           $template= new TemplateEntity($TemplateID,$TemplateName);
           array_push($templateArray,$template);
           
       }
       
       //Close connection and return result
       mysql_close();
       return $templateArray;
	   
	}
	
    public function GetRoleNames() {
	  require 'Credentials.php';
              
		// Connect to server and select databse.
		mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
		mysql_select_db("$database")or die("cannot select DB");
		
       $result = mysql_query("SELECT  DISTINCT roleID, roleName FROM roles") or die(mysql_error());
	   
	   $rolesArray = array();
	   
	   //Get data from database.
       while($row = mysql_fetch_array($result))
       {
           

           $roleID = $row[0];
           $roleName = $row[1];
           
           
           $role= new roleNameEntity($roleID,$roleName);
           array_push($rolesArray,$role);
           
       }
       
       //Close connection and return result
       mysql_close();
       return $rolesArray;
	   
	}
	public function CheckLogin() {
		 require 'Credentials.php';
		 
		 // Connect to server and select databse.
		mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
		mysql_select_db("$database")or die("cannot select DB");

		// username and password sent from form 
		$myusername=$_POST['myusername']; 
		$mypassword=$_POST['mypassword']; 

		// To protect MySQL injection (more detail about MySQL injection)
		$myusername = stripslashes($myusername);
		$mypassword = stripslashes($mypassword);
		$myusername = mysql_real_escape_string($myusername);
		$mypassword = mysql_real_escape_string($mypassword);
		$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
		$result=mysql_query($sql);

		// Mysql_num_row is counting table row
		$count=mysql_num_rows($result);

		// If result matched $myusername and $mypassword, table row must be 1 row
		if($count==1){
		header("location:index.php; ");
		}
		else {
		echo "Wrong Username or Password";
		}

	}
    function GetIndividualReport()
	{
		require 'Credentials.php';
        
		// Connect to server and select databse.
		mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
		mysql_select_db("$database")or die("cannot select DB");
		

          $query = "SELECT reportID, firstname, lastname, email, date, severity, description, reported from report
				ORDER BY date DESC;";
          
          $result = mysql_query($query) or die(mysql_error());
          $reportArray = array();
           while($row = mysql_fetch_array($result))
            {
			   $reportID = $row[0];
               $firstname = $row[1];
               $lastname = $row[2];
               $email = $row[3];
               $date = $row[4];
               $severity = $row[5];
               $description = $row[6];
               $reported = $row[7];

               $report = new reportEntity($reportID,$firstname,$lastname,$email,$date,$severity,$description,$reported);
               array_push($reportArray, $report);
               
               //close connection and return
            }
               mysql_close();
               return $reportArray;
               
                       
            }
     function GetReports($template)
       {
           require 'Credentials.php';
        
		// Connect to server and select databse.
		mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
		mysql_select_db("$database")or die("cannot select DB");
		

          $query = "SELECT report.ReportSubmittedDate, report.ReportName, report.reportRaiser, report.ReportStatus, report.ReportSeverity, template.TemplateName, report.ReportID from report  INNER JOIN template ON template.TemplateID=report.TemplateID
WHERE template.TemplateID like '$template'
ORDER BY ReportID DESC;";
          
          $result = mysql_query($query) or die(mysql_error());
          $reportArray = array();
           while($row = mysql_fetch_array($result))
            {
			   $submittedDate = $row[0];
			   $reportName = $row[1];
			   $reportRaiser = $row[2];
			   $reportStatus = $row[3];
			   $reportSeverity = $row[4];
			   $templateName = $row[5];
			   $reportID = $row[6];

               $report = new reportEntity($submittedDate,$reportName,$reportRaiser,$reportStatus, $reportSeverity, $templateName, $reportID);
               array_push($reportArray, $report);
               
               //close connection and return
            }
               mysql_close();
               return $reportArray;
               
                       
            }
			
			
			
			
			 function GetUserList()
       {
           require 'Credentials.php';
        
		// Connect to server and select databse.
		mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
		mysql_select_db("$database")or die("cannot select DB");
		
		$query = "SELECT members.userID, members.username, members.firstName, members.lastName, members.email, roles.roleName from members  
		INNER JOIN roles ON members.roleID = roles.roleID
ORDER BY userID DESC;";
          
          $result = mysql_query($query) or die(mysql_error());
          $theuserArray = array();
           while($row = mysql_fetch_array($result))
            {
               $userID = $row[0];
			   $username = $row[1];
			   $firstname = $row[2];
               $lastname = $row[3];
               $email = $row[4];
			   $rolename = $row[5];

               $auser = new theuserEntity($userID,$username,$firstname,$lastname,$email, $rolename);
               array_push($theuserArray, $auser);
               
               //close connection and return
            }
               mysql_close();
               return $theuserArray;
               
                       
            }
			
			
			function GetPermissions($roleid)
			{
				
				 require 'Credentials.php';
        
		// Connect to server and select databse.
		mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
		mysql_select_db("$database")or die("cannot select DB");
		
		$query = "SELECT roles.roleID, roles.roleName, roles.roleCreateReport, roles.roleSubmitReport, roles.roleDeleteReport, roles.roleEditReport, roles.roleViewReport, roles.roleCloseReport, roles.roleAddAttachment, roles.roleRemoveAttachment, roles.roleChangeStatus, 
		roles.roleReOpenReport, roles.roleAddUsersToRole, roles.roleRemoveUsersFromRole, roles.roleCanCreateRole, roles.roleCanEditRole, roles.roleCanDeleteRole, roles.roleCanCreateUsers, roles.roleCanArchiveUsers, roles.roleCanEditUsers, roles.roleCanCreateTemplates  from roles
        INNER JOIN Members
        ON Members.roleID=roles.roleID
        Where members.roleID = '$roleid'
        ;";
          
          $result = mysql_query($query) or die(mysql_error());
          $permissionArray= array();
           while($row = mysql_fetch_array($result))
            {
               $roleID = $row[0];
			   $roleName = $row[1];
			   $roleCreateReport = $row[2];
               $roleSubmitReport = $row[3];
               $roleDeleteReport = $row[4];
			   $roleEditReport = $row[5];
			   $roleViewReport = $row[6];
			   $roleCloseReport = $row[7];
               $roleAddAttachment = $row[8];
               $roleRemoveAttachment = $row[9];
			   $roleChangeStatus = $row[10];
			   $roleReOpenReport = $row[11];
			   $roleAddUsersToRole = $row[12];
               $roleRemoveUsersFromRole = $row[13];
               $roleCanCreateRole = $row[14];
			   $roleCanEditRole = $row[15];
			   $roleCanDeleteRole = $row[16];
			   $roleCanCreateUsers = $row[17];
			   $roleCanArchiveUsers = $row[18];
               $roleCanEditUsers = $row[19];
               $roleCanCreateTemplates= $row[20];

               $permission = new roleEntity($roleID,$roleName,$roleCreateReport,$roleSubmitReport,$roleDeleteReport,$roleEditReport,$roleViewReport,
			   $roleCloseReport,$roleAddAttachment,$roleRemoveAttachment,$roleChangeStatus,$roleReOpenReport,$roleAddUsersToRole,$roleRemoveUsersFromRole,$roleCanCreateRole,
			   $roleCanEditRole,$roleCanDeleteRole,$roleCanCreateUsers,$roleCanArchiveUsers,$roleCanEditUsers,$roleCanCreateTemplates);
               array_push($permissionArray, $permission);
               
               //close connection and return
            }
               mysql_close();
               return $permissionArray;
			   
			   
			}
			
			function GetRoleList()
       {
           require 'Credentials.php';
        
		// Connect to server and select databse.
		mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
		mysql_select_db("$database")or die("cannot select DB");
		
		$query = "SELECT roleID, roleName, roleCreateReport, roleSubmitReport, roleDeleteReport, roleEditReport, roleViewReport, roleCloseReport, roleAddAttachment, roleRemoveAttachment, roleChangeStatus, 
		roleReOpenReport, roleAddUsersToRole, roleRemoveUsersFromRole, roleCanCreateRole, roleCanEditRole, roleCanDeleteRole, roleCanCreateUsers, roleCanArchiveUsers, roleCanEditUsers, roleCanCreateTemplates from roles  
		ORDER BY roleID ASC;";
          
          $result = mysql_query($query) or die(mysql_error());
          $roleArray= array();
           while($row = mysql_fetch_array($result))
            {
               $roleID = $row[0];
			   $roleName = $row[1];
			   $roleCreateReport = $row[2];
               $roleSubmitReport = $row[3];
               $roleDeleteReport = $row[4];
			   $roleEditReport = $row[5];
			   $roleViewReport = $row[6];
			   $roleCloseReport = $row[7];
               $roleAddAttachment = $row[8];
               $roleRemoveAttachment = $row[9];
			   $roleChangeStatus = $row[10];
			   $roleReOpenReport = $row[11];
			   $roleAddUsersToRole = $row[12];
               $roleRemoveUsersFromRole = $row[13];
               $roleCanCreateRole = $row[14];
			   $roleCanEditRole = $row[15];
			   $roleCanDeleteRole = $row[16];
			   $roleCanCreateUsers = $row[17];
			   $roleCanArchiveUsers = $row[18];
               $roleCanEditUsers = $row[19];
               $roleCanCreateTemplates= $row[20];
            

               $arole = new roleEntity($roleID,$roleName,$roleCreateReport,$roleSubmitReport,$roleDeleteReport,$roleEditReport,$roleViewReport,
			   $roleCloseReport,$roleAddAttachment,$roleRemoveAttachment,$roleChangeStatus,$roleReOpenReport,$roleAddUsersToRole,$roleRemoveUsersFromRole,$roleCanCreateRole,
			   $roleCanEditRole,$roleCanDeleteRole,$roleCanCreateUsers,$roleCanArchiveUsers,$roleCanEditUsers,$roleCanCreateTemplates);
               array_push($roleArray, $arole);
               
               //close connection and return
            }
               mysql_close();
               return $roleArray;
               
                       
            }
			
    public function GetUserDetails(){
       require 'Credentials.php';
		// Connect to server and select databse.
		mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
		mysql_select_db("$database")or die("cannot select DB");
		
       session_start();
	   $myusername = $_SESSION["myusername"];
       $result = mysql_query("Select username, password, firstName, lastName, email FROM members where username = '$myusername'") or die(mysql_error());
       $userArray = array();
           while($row = mysql_fetch_array($result))
            {
               $username = $row[0];
               $password = $row[1];
               $firstName = $row[2];
               $lastName = $row[3];
               $email = $row[4];
               
               
               $userdetails = new userEntity($username,$password, $firstName, $lastName, $email);
               array_push($userArray, $userdetails);
               
               //close connection and return
            }
               mysql_close();
               return $userArray;
       //
    }
	
	
    public function AddReport(){
       require 'Credentials.php';
		// Connect to server and select database.
		mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
		mysql_select_db("$database")or die("cannot select DB");
		
      
		// Get values from form 
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$email=$_POST['email'];
		$date=$_POST['date'];
		$severity=$_POST['severity'];
		$description=$_POST['description'];
		$reported=$_POST['reported'];

		// Insert data into mysql 
		$sql="INSERT INTO report(firstname, lastname, email, date, severity, description, reported)VALUES('$firstname', '$lastname', '$email', '$date', '$severity', '$description', '$reported')";
		$result=mysql_query($sql);


           // if successfully insert data into database, displays message "Successful". 
		if($result)
			{
			echo "Report succesfully added";
			echo "<BR>";
			echo "<a href='index.html'>Click here to log in</a>";
			}

			else {
				echo "ERROR";
				}
				
				mysql_close();
				//
	} 
}

