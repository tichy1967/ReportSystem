<?php

error_reporting(0);
ini_set('display_errors', 0);

require 'controllers/adminController.php';
$adminController = new adminController();

//Output page data
$title = 'Create A Report';
$content = $adminController->CreateContent();
$sidebar = $adminController->SideBar();
        
include 'Template.php';
?>