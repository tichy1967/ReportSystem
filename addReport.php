<?php

 require 'model/Credentials.php';
		// Connect to server and select database.
		$tbl_name="report"; // Table name 
		
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
		$sql="INSERT INTO $tbl_name(firstname, lastname, email, date, severity, description, reported)VALUES('$firstname', '$lastname', '$email', '$date', '$severity', '$description', '$reported')";
		$result=mysql_query($sql);


           // if successfully insert data into database, displays message "Successful". 
		if($result)
			{
			echo "Report successfully added";
			echo "<BR>";
			echo "<a href='reportcreate.php'>Click here to return</a>";
			}

			else {
				  die('Invalid query: ' . mysql_error());
				}
				
				mysql_close();
				//
	
	
?>


