<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="reportsystem"; // Database name 

$conn = new mysqli($host, $username, $password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


		
		
//Values to insert+
$submittedDate = $_POST["SubmittedDate"];
$ReportName = $_POST["ReportName"]; 
$ReportRaiser = $_POST["ReportRaiser"]; 
$ReportStatus = $_POST["ReportStatus"];
$TemplateID = $_POST["TemplateID"];
$ReportSeverity = $_POST["ReportSeverity"];

// insertion to template table
$sql = "INSERT INTO report(ReportSubmittedDate, ReportName, ReportRaiser, ReportStatus, TemplateID, ReportSeverity) VALUES ('$submittedDate', '$ReportName', '$ReportRaiser', '$ReportStatus', '$TemplateID', '$ReportSeverity')";
// retrieve last id
$report_id = mysql_insert_id();

if ($conn->query($sql) === TRUE) {
    $report_id  = $conn->insert_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$counter = 0;
	for ($x = 1; $x <= 99; $x++) 
	{
		
	if (empty($_POST["ItemID$x"])) {
    //End loop if no itemid
	break;
	
	}
	$ItemID = $_POST["ItemID$x"];
	$FieldID = $_POST["FieldID$x"];
	
	$sql = "INSERT INTO item (ItemValue, FieldID, ReportID) VALUES ('$ItemID', '$FieldID', '$report_id')";
	
	if ($conn->query($sql) === TRUE) {
		
		$counter++;
		
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}
	
	if ($counter > 0)
{
	echo "Report Successfully added";
	echo "<BR>";
	echo "<a href='report.php?report=$report_id'>Click here to view the draft report</a>";
	echo "<BR>";
	
	session_start();
		$submitreports = $_SESSION["cansubmitreport"];
		
		if ($submitreports == "1")
		{
		echo "<a href='model/submitReport.php?report=$report_id' >Click Here to Submit The Report</a>";
		}
}




?>

<?php 
// close connection 
mysql_close();
?>