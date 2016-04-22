<?php

class formEntity 
{ 
			  public $FieldID;
              public $FieldPosition;
              public $FieldType;
              public $FieldLabel;
              public $FieldMandatory;
              public $TemplateID;
			 
    function __construct($FieldID, $FieldPosition, $FieldType, $FieldLabel, $FieldMandatory, $TemplateID) {
        $this->FieldID = $FieldID;
		$this->FieldPosition = $FieldPosition;	
		$this->FieldType = $FieldType;	
		$this->FieldLabel = $FieldLabel;	
		$this->FieldMandatory = $FieldMandatory;	
		$this->TemplateID = $TemplateID;	
    }

}