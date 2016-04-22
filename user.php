<?php

error_reporting(0);
ini_set('display_errors', 0);

require 'controllers/userIndvController.php';
$userIndvController = new userIndvController();
    
//Output page data
$title = 'User View';
$content = $userIndvController->CreateContent();
$sidebar = $userIndvController->SideBar();

        
include 'Template.php';
?>
