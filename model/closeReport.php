<?php


require("Credentials.php");

$conn = new mysqli($host, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	$date = date('d/m/y');
	$reportID = $_POST['ReportID'];
	 $sql = "UPDATE Report
			SET Report.ReportStatus='Closed', Report.CloseDate='$date'
			WHERE Report.ReportID = $reportID";
	
	if ($conn->query($sql) === TRUE) {
		header('Location: /reportsystem/report.php?report=' . $reportID . '');
		exit;
		
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	
	


?> 	  