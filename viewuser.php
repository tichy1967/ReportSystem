<?php

error_reporting(0);
ini_set('display_errors', 0);

require 'controllers/viewuserController.php';
$viewuserController = new viewuserController();

//Output page data
$title = 'View Users';
$content = $viewuserController->CreateContent();
$sidebar = $viewuserController->SideBar();
        
include 'Template.php';
?>