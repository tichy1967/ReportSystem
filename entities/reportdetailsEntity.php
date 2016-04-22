<?php

class reportdetailsEntity 
{ 
	public $reportID;
	public $submittedDate;
    public $reportName;
	public $reportRaiser;
	public $reportStatus;
	public $FieldType;
    public $FieldLabel;
	public $ItemValue;
	public $ItemID;
	public $reportOwner;
	public $FieldPosition;
	public $reportSeverity;
    
    function __construct($reportID, $submittedDate, $reportName, $reportRaiser, $reportStatus, $FieldType, $FieldLabel, $ItemValue, $ItemID, $reportOwner, $FieldPosition, $reportSeverity) {
        $this->reportID = $reportID;
		$this->submittedDate = $submittedDate;
		$this->reportName = $reportName;
        $this->reportRaiser = $reportRaiser;
		$this->reportStatus = $reportStatus;
        $this->FieldType = $FieldType;   
		$this->FieldLabel = $FieldLabel;
		$this->ItemValue = $ItemValue;
		$this->ItemID = $ItemID;
		$this->reportOwner = $reportOwner;
		$this->FieldPosition = $FieldPosition;
		$this->reportSeverity = $reportSeverity;
    }

}
