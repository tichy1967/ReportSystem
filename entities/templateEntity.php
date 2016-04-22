<?php

class TemplateEntity 
{ 
			   public $TemplateID;
			   public $TemplateName;
			 
    function __construct($TemplateID, $TemplateName) {
        $this->TemplateID = $TemplateID;
		$this->TemplateName = $TemplateName;	
    }

}