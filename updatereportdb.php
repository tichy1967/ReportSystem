<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="reportsystem"; // Database name 
$tbl_name="report"; // Table name 

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Get values from form 
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$date=$_POST['date'];
$severity=$_POST['severity'];
$description=$_POST['description'];
$reported=$_POST['reported'];

// Update data into mysql 
$sql="UPDATE $tbl_name(firstname, lastname, email, date, severity, description, reported)VALUES('$fname', '$lname', '$email', '$date', '$severity', '$description', 'reported')";
$result=mysql_query($sql);

// if successfully insert data into database, displays message "Successful". 
if($result){
echo "Report succesfully updated";
echo "<BR>";
echo "<a href='dashboard.php'>Click here to return to the homepage</a>";
}

else {
echo "ERROR";
}
?> 

<?php 
// close connection 
mysql_close();
?>