<?php

require 'controllers/dashboardController.php';
$dashboardController = new dashboardController();

require 'model/Credentials.php';


//Output page data
$title = 'Dashboard';


$content = $dashboardController->CreateContent();
$sidebar = $dashboardController->SideBar();

        
		include 'Template.php';
?>