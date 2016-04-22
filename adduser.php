<?php

error_reporting(0);
ini_set('display_errors', 0);

require 'controllers/adduserController.php';
require 'controllers/privateController.php';
$adduserController = new adduserController();
$privateController = new privateController();	

//Output page data
$title = 'Create A Report';


session_start();
		$createusers = $_SESSION["createusers"];
		
		if ($createusers == "1")
		{
			$content = $adduserController->CreateContent();
			$sidebar = $adduserController->SideBar();
		}
		else
		{
			$content = $privateController->CreateContent();
			$sidebar = $privateController->SideBar();
		}
       
include 'Template.php';
?>