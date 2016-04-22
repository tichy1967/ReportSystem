<?php


require("Credentials.php");

$conn = new mysqli($host, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	$reportID = $_POST['ReportID'];
	 $sql = "Delete from Report
			WHERE Report.ReportID = $reportID";
	
	if ($conn->query($sql) === TRUE) {
		header('Location: /reportsystem/reportview.php');
		exit;
		
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	
	


?> 	  