<?php

error_reporting(0);
ini_set('display_errors', 0);

require 'controllers/reportIndvController.php';
$reportIndvController = new reportIndvController();
    
//Output page data
$title = 'Report View';
$content = $reportIndvController->CreateContent();
$sidebar = $reportIndvController->SideBar();

        
include 'Template.php';
?>
