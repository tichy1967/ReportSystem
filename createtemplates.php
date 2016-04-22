<?php

error_reporting(0);
ini_set('display_errors', 0);

require 'controllers/templateController.php';
require 'controllers/privateController.php';
$privateController = new privateController();	
$templateController = new templateController();



//Output page data
$title = 'Create A Template';

		
		session_start();
		$createtemplates = $_SESSION["createtemplates"];
		
		if ($createtemplates == "1")
		{
			$content = $templateController->CreateContent();
			$sidebar = $templateController->SideBar();
		}
		else
		{
			$content = $privateController->CreateContent();
			$sidebar = $privateController->SideBar();
		}
        
include 'Template.php';
?>