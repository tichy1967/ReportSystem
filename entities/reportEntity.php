<?php

class reportEntity 
{ 

	public $submittedDate;
    public $reportName;
	public $reportRaiser;
	public $reportStatus;
	public $reportSeverity;
	public $templateName;
	public $reportID;
	
    function __construct($submittedDate, $reportName, $reportRaiser, $reportStatus, $reportSeverity, $templateName, $reportID) {
        $this->submittedDate = $submittedDate;
		$this->reportName = $reportName;
        $this->reportRaiser = $reportRaiser;
        $this->reportStatus = $reportStatus;   
		$this->reportSeverity = $reportSeverity;
		$this->templateName = $templateName;
		$this->reportID = $reportID;
    }

}
