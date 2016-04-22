<?php

error_reporting(0);
ini_set('display_errors', 0);

require 'controllers/addroleController.php';
$addroleController = new addroleController();

//Output page data
$title = 'Create A Report';
$content = $addroleController->CreateContent();
$sidebar = $addroleController->SideBar();
        
include 'Template.php';
?>