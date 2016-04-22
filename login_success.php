// Check if session is not registered, redirect back to main page. 
// Put this code in first line of web page. 
<?php
session_start();

if(!isset($_SESSION['myusername'])){
   // go to login page code here.
    // in login page, store data into session, use following:
    $_SESSION['myusername']="myusername";
	$_SESSION['rolename']="rolename";
	header("location:index.html");
}
else{

	header("location:dashboard.php");
   }
?>

<html>
<body>
Login Successful
</body>
</html>