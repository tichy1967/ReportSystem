<?php

error_reporting(0);
ini_set('display_errors', 0);

require 'controllers/viewroleController.php';
$viewroleController = new viewroleController();

//Output page data
$title = 'Create A Report';
$content = $viewroleController->CreateContent();
$sidebar = $viewroleController->SideBar();
        
include 'Template.php';
?>