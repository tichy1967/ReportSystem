<?php

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

require ("model/sqlModel.php");
require("model/Credentials.php");


$conn = new mysqli($host, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Get values from form 
$reportID=$_POST['ReportID'];
$reportName=$_POST['ReportName'];
$reportOwner=$_POST['ReportOwner'];
$reportStatus=$_POST['ReportStatus'];

$sqlModel = new sqlModel();
$ReportIndividiualArray = $sqlModel->GetReportDetails($reportID);

foreach ($ReportIndividiualArray as $report) 
            {

$ItemID=$_POST[$report->ItemID];	
$ItemValue=$_POST[$report->FieldPosition];		



 $sql = "UPDATE Item
SET Item.ItemValue='$ItemValue'
WHERE Item.ItemID = $ItemID;
   ";

   if ($conn->query($sql) === TRUE) {

	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
						
			}
			

									
//Updates the Report Owner also known as the template creator
   $sql = "UPDATE Template
INNER JOIN report 
on template.TemplateID = report.TemplateID
SET Template.TemplateOwner='$reportOwner', Report.ReportStatus='$reportStatus'
WHERE report.ReportID = $reportID;
   ";

   if ($conn->query($sql) === TRUE) {


   echo '<script language="javascript">';
echo 'alert("message successfully sent")';
echo '</script>';

		header("Location: report.php?report=$reportID&edited=yes");
		
		
		exit;
		die();	
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	
	


?> 	  