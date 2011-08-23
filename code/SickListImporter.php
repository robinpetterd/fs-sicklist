<?php 

class SickListImporter  extends CsvBulkLoader {
   
 //Basic Mapping of the raw CVS from Hamish 

   public $columnMap = array(
 	
	'Line Number'=> 'LineNumber',
	'Ship' => 'Ship',
        'Voyage Number' => 'VoyageNumber',
        'Voyage ID'     => 'VoyageIdent',  
        'Transport Gender'  => 'TransportGender',
        'Day of Departure' => 'DayOfDeparture', 
        'Month of Departure'=> 'MonthOfDeparture', 
        'Year of Departure' => 'YearOfDeparture',  
        'Period of Departure' => 'PeriodOfDeparture',  
        'Date Sailed (Bateson)' => 'DateSailedBateson',  
        'Bateson Arrival Day' => 'BatesonArrivalDay',  
        'Bateson Arrival Month' => 'BatesonArrivalMonth',  
        'Bateson Arrival Year' => 'BatesonArrivalYear',  
        'Bateson Arrival Date'=> 'BatesonArrivalDate',  
        'Length Voyage' => 'LengthVoyage',  
        'Season sailed'=> 'SeasonSailed', 
        'Season Code' => 'SeasonCode', 
        'Order' => 'Order',  
        'On Day' => 'OnDay', 
        'On Month' => 'OnMonth',  
        'On Year'=> 'OnYear', 
        'Date Entered on Sick List'=> 'DateEnteredOnSickList', 
        'Days lapse since sailing' => 'DaysLapseSinceSailing',  
        'Percentage voyage lapsed' => 'PercentageVoyageLapsed',  
        'Forenames' => 'Forenames' ,
        'Name' => 'Name',
        'Age'=> 'Age',  
        'No. on the list' => 'NoOnTheList',
        'Case Notes' => 'CaseNotes',  
        'Quality' => 'Quality',
        'Status Code' => 'StatusCode', 
        'Trade' => 'Trade', 
        'Disease or Wound' => 'DiseaseOrWound', 
        'Diagnostic Interpretation'=> 'DiagnosticInterpretation',
        'Disease Classification 1'=> 'DiseaseClassification1',
        'Disease 1 Code' => 'Disease1Code', 
        'Disease Classification 2' => 'DiseaseClassification2', 
        'Disease 2 Code' => 'Disease2Code', 
        'off Day' => 'offDay', 
        'off Month'=> 'offMonth', 
        'off Year' => 'offYear', 
        'Date Discharged' => 'DateDischarged',
        'Days on sick List' => 'DaysOnSickList', 
        'Est Days on Sick List' => 'EstDaysOnSickList',  
        'Days at sea till Death'=> 'DaysAtSeaTillDeath',  
        'Days at sea till Death percentage voyage' => 'DaysAtSeaTillDeathOercentageVoyage', 
        'How disposed of' => 'HowDisposedOf', 
        'Disposed code'=> 'DisposedCode',  
        'Transcribers remarks' => 'TranscribersRemarks',  
        'Journal remarks' => 'JournalRemarks',  
        'Reference' => 'Reference',  
        'JPEG No'=> 'JPEGNo', 
	'Bateson notes' => 'BatesonNotes' 
      
  
   );
   
 
   public $relationCallbacks = array(
      /*'KnownAs.Name' => array(
         'relationname' => 'KnownAs',
         'callback' => 'getKnowByName'
      ),
	   'WhereTheyWhereBorn.Name' => array(
         'relationname' => 'WhereTheyWhereBorn',
         'callback' => 'getLoc'
      ),
	  
	  'SourceFile.Filename' => array(
         'relationname' => 'SourceFile',
         'callback' => 'getSource'
      )*/
	  
	  
	  
   );
   
   
   //Old blackloyalist code to be used as a reference.
   
    /*static function getSource($obj, $val, $record) {
	//Debug::show($val);
      $SQL_val = Convert::raw2sql($val);
      return DataObject::get_one(
         'File', "Filename = '{$SQL_val}'"
     );
	}
	
	
    static function getKnowByName($obj, $val, $record) {
		//Debug::show($val);
      $SQL_val = Convert::raw2sql($val);
      return DataObject::get_one(
         'Person', "Name = '{$SQL_val}'"
     );
	}
	
	static function getLoc($obj, $val, $record) {
		
	//Debug::show($val);
	
      $SQL_val = Convert::raw2sql($val);
	 
	  $loc =  DataObject::get(
         'Loc', "Name = '{$SQL_val}'"
     );
	 
	 //Debug::show($loc);
     return $loc;
	 
	}
	*/
	
}

?>
