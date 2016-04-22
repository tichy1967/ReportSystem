<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="reportsystem"; // Database name 
$tbl_name="roles"; // Table name 

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Get values from form 
$roleName=$_POST['RoleName'];
$createreport=$_POST['CreateReportsRadio'];
$submitreport=$_POST['SubmitReportsRadio'];
$viewreport=$_POST['ViewReportsRadio'];
$deletereport=$_POST['DeleteReportsRadio'];
$editreport=$_POST['EditReportsRadio'];
$closereport=$_POST['CloseReportsRadio'];
$addattach=$_POST['AddAttachmentRadio'];
$removeattach=$_POST['RemoveAttachmentRadio'];
$changestatus=$_POST['ChangeStatusRadio'];
$reopen=$_POST['ReopenRadio'];
$adduserstorole=$_POST['AddToRoleRadio'];
$removeusersfromrole=$_POST['RemoveFromRoleRadio'];
$createrole=$_POST['CreateRoleRadio'];
$editrole=$_POST['EditRoleRadio'];
$deleterole=$_POST['DeleteRoleRadio'];
$createuser=$_POST['CreateUsersRadio'];
$edituser=$_POST['EditUsersRadio'];
$archiveuser=$_POST['ArchiveUsersRadio'];

// Insert data into mysql 
$sql="INSERT INTO $tbl_name(roleName, roleCreateReport, roleSubmitReport, roleDeleteReport, roleViewReport, roleEditReport, roleCloseReport, roleAddAttachment, roleRemoveAttachment, roleChangeStatus, roleReOpenReport, roleAddUsersToRole, roleRemoveUsersFromRole, roleCanCreateRole,  roleCanEditRole,  roleCanDeleteRole, roleCanCreateUsers, roleCanEditUsers, roleCanArchiveUsers)VALUES('$roleName' , '$createreport', '$submitreport', '$deletereport', '$viewreport', '$editreport' , '$closereport', '$addattach' , '$removeattach', '$changestatus' , '$reopen', '$adduserstorole', '$removeusersfromrole', '$createrole' , '$editrole', '$deleterole', '$createuser' , '$edituser', '$archiveuser')";
$result=mysql_query($sql);

// if successfully insert data into database, displays message "Successful". 
if($result){
header("Location: viewrole.php");
		die();	
}

else {


echo "ERROR, permissions could not be applied";
}
?> 

<?php 
// close connection 
mysql_close();
?>