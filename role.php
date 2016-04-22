<?php

error_reporting(0);
ini_set('display_errors', 0);

require 'controllers/roleIndvController.php';
$roleIndvController = new roleIndvController();
    
//Output page data
$title = 'Role View';
$content = $roleIndvController->CreateContent();
$sidebar = $roleIndvController->SideBar();

        
include 'Template.php';
?>
