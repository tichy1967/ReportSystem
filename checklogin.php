<?php

ob_start();
require 'model/Credentials.php';
			
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
$sql="SELECT members.username, roles.roleName, roles.roleID, roles.roleCanCreateUsers, roles.roleCanCreateTemplates, roles.roleViewReport, roles.roleCreateReport, roles.roleCanCreateRole, roles.roleDeleteReport, roles.roleCloseReport, roles.roleReOpenReport, roles.roleSubmitReport, roles.roleChangeStatus FROM members RIGHT JOIN roles on members.roleID=roles.roleID WHERE members.username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

while($row = mysql_fetch_array($result))
       {
           
           $roleName = $row[1];
           $roleID = $row[2];
		   $createusers = $row[3];
           $createtemplates = $row[4];
		   $viewreport = $row[5];
		   $createreport = $row[6];
		   $createroles = $row[7];
		   $deletereports = $row[7];
		   $closereports = $row[8];
		   $reopenreports = $row[9];
		   $submitreports =$row[10];
		   $changestatus = $row[11];
       }

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

//if the login is passed it will register the myusername and mypassword in a session
if($count==1){
session_start();
$_SESSION["myusername"] = $myusername;
$_SESSION["rolename"] = $roleName;
$_SESSION["roleid"] = $roleID;
$_SESSION["createusers"] = $createusers;
$_SESSION["createtemplates"] = $createtemplates;
$_SESSION["viewreports"] = $viewreport;
$_SESSION["createreport"] = $createreport;
$_SESSION["createroles"] = $createroles;
$_SESSION["candeletereport"] = $deletereports;
$_SESSION["canclosereport"] = $closereports;
$_SESSION["canreopenreport"] = $reopenreports;
$_SESSION["cansubmitreport"] = $submitreports;
$_SESSION["changestatus"] = $changestatus;

header("location:login_success.php");
include 'Template.php';
}
else {
	
echo "Wrong Username or Password";
}
     ob_end_flush();   
?>