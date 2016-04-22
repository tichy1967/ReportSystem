<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="reportsystem"; // Database name 
$tbl_name="members"; // Table name 

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Get values from form 
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];
$myemail=$_POST['myemail'];
$forename=$_POST['forename'];
$lastname=$_POST['lastname'];
$role=$_POST['role'];


//Checks if the username all ready exists
   $sql = "SELECT username FROM members WHERE username = '". $myusername."'";
   $Ures = mysql_query($sql);
   
//Checks if the email all ready exists
	 $sql = "SELECT email FROM members WHERE email = '". $myemail."'";
   $Eres = mysql_query($sql);
   
   if($Ures && mysql_num_rows($Ures) > 0){
            $username_exists = "1";
			echo "Username is already taken";
			echo "<BR>";
			echo "<a href='adduser.php'>Click here to try an other username</a>";
			echo "<BR>";
          }else{
			  $username_exists = "0";
            $myusername = $_POST['myusername'];
          }
		  
	if($Eres && mysql_num_rows($Eres) > 0){
			$email_exists = "1";
            echo "Email is already taken";
			echo "<BR>";
			echo "<a href='adduser.php'>Click here to try an other Email</a>";
			echo "<BR>";
          }else{
			  $email_exists = "0";
            $myemail = $_POST['myemail'];
          }	  
		  
		  if(($username_exists == "0") && ($email_exists == "0"))
		  {
// Insert data into mysql 
$sql="INSERT INTO $tbl_name(username, password, email, firstName, lastName, roleID)VALUES('$myusername', '$mypassword', '$myemail', '$forename', '$lastname', '$role')";
$result=mysql_query($sql);

// if successfully insert data into database, displays message "Successful". 
if($result){

header("Location: viewuser.php");
die();
}

else {
echo "ERROR";
}

}
?> 
		  
<?php 
// close connection 
mysql_close();
?>