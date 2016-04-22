<?php

error_reporting(0);
ini_set('display_errors', 0);

require 'controllers/reportviewController.php';
$reportviewController = new reportviewController();


		$title = 'View A Report';
		
		
		session_start();
		$viewreport= $_SESSION["viewreports"];
		
		if ($viewreport == "0")
		{
			$content = $privateController->CreateContent();
			$sidebar = $privateController->SideBar();
		}
		else
		{
		if(isset($_POST['templates']))
{
    //Fill page with coffees of the selected type
    $content = $reportviewController->CreateContent($_POST['templates']);
}
else 
{
    //Page is loaded for the first time, no type selected -> Fetch all types
    
    $content = $reportviewController->CreateContent('%');
}

		}

		$sidebar = $reportviewController->SideBar();
        
include 'Template.php';
?>