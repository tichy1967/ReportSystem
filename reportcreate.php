<?php

error_reporting(0);
ini_set('display_errors', 0);

require 'controllers/reportController.php';
$reportController = new reportController();

require 'controllers/privateController.php';
$privateController = new privateController();	

//Output page data
$title = 'Create A Report';


session_start();
		$createreport= $_SESSION["createreport"];
		
		if ($createreport == "0")
		{
			$content = $privateController->CreateContent();
			$sidebar = $privateController->SideBar();
		}
		else
		{
if(isset($_POST['template']))
{
    //Fill page with coffees of the selected type
    $content = $reportController->CreateContent($_POST['template']);
}
else 
{
    //Page is loaded for the first time, no type selected -> Fetch all types
    
	$content = $reportController->CreateContent('%');
}
		}


$sidebar = $reportController->SideBar();
        
include 'Template.php';
?>