<?php

require 'controllers/fixtureController.php';
$fixtrueController = new FixtureController();

//Output page data
$title = 'Edit A Report';
$content = $fixtrueController->CreateContent();
$sidebar = $fixtrueController->SideBar();
        
include 'Template.php';
?>