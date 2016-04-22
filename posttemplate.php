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
$templateName = $_POST["templatename"]; 
$templateCreator = $_POST["templatecreator"];
$submittedDate= $_POST["submitteddate"];
$templateDescription = $_POST["templatedescription"];

// insertion to template table
$sql = "INSERT INTO template(TemplateName, TemplateOwner, TemplateSubmittedDate, TemplateDetails) VALUES ('$templateName', '$templateCreator', '$submittedDate', '$templateDescription')";
// retrieve last id
$template_id = mysql_insert_id();

if ($conn->query($sql) === TRUE) {
    $template_id = $conn->insert_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



//mysql_free_result( $result );

$counter = 0;
for ($x = 1; $x <= 99; $x++) {

	if (empty($_POST["fieldtype$x"])) {
    //End loop if no fieldtype 
	break;
	
	}
	$fieldtype = $_POST["fieldtype$x"]; 
	$label = $_POST["Label$x"]; 
	$mandatory = $_POST["Mandatory$x"]; 
	
	$sql = "INSERT INTO field (FieldPosition, FieldType, FieldLabel, FiledMandatory, TemplateID) VALUES ($x, '$fieldtype', '$label', '$mandatory', '$template_id')";
	
	if ($conn->query($sql) === TRUE) {
		
		$counter++;

	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}
} 

if ($counter > 0)
{
	echo "Report Template Successfully added";
	echo "<BR>";
	echo "<a href='reportcreate.php'>Click here to return</a>";
}



?>

<?php 
// close connection 
mysql_close();
?>