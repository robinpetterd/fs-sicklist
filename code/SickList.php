<?php 

class SickList extends DataObject {
 
   //static $api_access = true;
  //function canView() { return true; }
    static $default_sort = "\"Sort\"";
    
    static $indexes = array("fulltext (DiseaseOrWound,Forenames,LastName)");


            
    static $db = array(
          "Sort" => "Int",
        
          "Name" => "Text",

	 'LineNumber' => 'Int', 
	 'SickListIdent' => 'Text',
	 'Ship' => 'Text',
         'VoyageNumber' => 'Int', // SRC name  Voyage Number
         'VoyageIdent' => 'Text', // SRC name Voyage ID
         'TransportGender' => 'Int', // SRC name  Transport Gender  
         'DayOfDeparture' => 'Int', // SRC name Day of Departure
         'MonthOfDeparture' => 'Int', // SRC name Month of Departure
         'YearOfDeparture' => 'Int', // SRC name Year of Departure
         'PeriodOfDeparture' => 'Text', // SRC name Period of Departure
         'DateSailedBateson' => 'Text', // SRC name Date Sailed (Bateson)
         'BatesonArrivalDay' => 'Int', // SRC name  Bateson Arrival Day
         'BatesonArrivalMonth' => 'Int', // SRC name Bateson Arrival Mont
         'BatesonArrivalYear' => 'Int', // SRC name Bateson Arrival Year 
         'BatesonArrivalDate' => 'Text', // SRC name  Bateson Arrival Date
         'LengthVoyage' => 'Int',  // SRC name Length Voyage
         'SeasonSailed' => 'Text', // SRC name Season sailed TODO - might need to NORMALISE
         'SeasonCode' => 'Text', // SRC name Season Code 
         'Order' => 'Int', // SRC name Order
         'OnDay' => 'Int', // SRC name On Day   
         'OnMonth' => 'Int',// SRC name On Month
         'OnYear' => 'Int', // SRC name  On Year
         'DateEnteredOnSickList' => 'Text', // SRC name  Date Entered on Sick List
         'DaysLapseSinceSailing' => 'Int', // SRC name Days lapse since sailing
         'PercentageVoyageLapsed' => 'Float', // SRC name  Percentage voyage lapsed
         'Forenames' => 'Text', // SRC name Forenames
         'LastName' => 'Text', // SRC name Name
         'Age' => 'Text', // SRC name Age TODO - might need to add a field that deals with this as float
         'NoOnTheList' => 'Int', // SRC name No. on the list
         'CaseNotes' => 'Text', // SRC name Case Notes
         'Quality' => 'Text', // SRC name Quality TODO - need to NORMALISE/LINK   
         'StatusCode' => 'Text', // SRC name Status Code
         'Trade' => 'Text', // SRC name Trade
         'DiseaseOrWound' => 'Text', // SRC name Disease or Wound
         'DiagnosticInterpretation' => 'Text', // SRC name Diagnostic Interpretation
         'DiseaseClassification1' => 'Text', // SRC name Disease Classification 1 LINKAGE - gets mapped to Disease

         'Disease1Code' => 'Text', // SRC name Disease 1 Code
         'DiseaseClassification2' => 'Text', // SRC name Disease Classification 2 LINKAGE - gets mapped to Disease
         'Disease2Code' => 'Text', // SRC name Disease 2 Code
         'offDay' => 'Int', // SRC name off Day
         'offMonth' => 'Int', // SRC name off Month
         'offYear' => 'Int', // SRC name off Year
         'DateDischarged' => 'Text', // SRC name Date Discharged
         'DaysOnSickList' => 'Text', // SRC name Days on sick List
         'EstDaysOnSickList' => 'Float', // SRC name Est Days on Sick List
         'DaysAtSeaTillDeath' => 'Int', // SRC name  Days at sea till Death
         'DaysAtSeaTillDeathOercentageVoyage' => 'Int', // SRC name ays at sea till Death percentage voyage
         'HowDisposedOf' => 'Text', // SRC name How disposed of
         'DisposedCode' => 'Int', // SRC name Disposed code
         'TranscribersRemarks' => 'Text', // SRC name Transcribers remarks
         'JournalRemarks' => 'Text', // SRC name Journal remarks
         'Reference' => 'Text', // SRC name Reference
         'JPEGNo' => 'Text', // SRC name JPEG No
	 'BatesonNotes' => 'Text' // SRC name Bateson notes
         
   );


     static $has_one = array(
   	 'Season' => 'Season',
         'Gender' => 'Gender',
         'Status' => 'Role',
         'Vogage' => 'ConvictVogage'

   );
   
   static $has_many = array(
   );	  
   	
	
    static $many_many = array(	
           'Diseases' => 'Disease'
	);
	

		

  static $searchable_fields = array(
       'LineNumber','Name','Season.Name','Diseases.Name','Gender.Name','DiseaseOrWound','DaysLapseSinceSailing'
  );
 
   
									
  static $summary_fields = array(
     'LineNumber', 'Ship','Season.Name','DateSailedBateson','BatesonArrivalDate','Diseases.Name','Gender.Name','DiseaseOrWound','DaysLapseSinceSailing'
  );
	
	
 
 	
	


function onBeforeWrite() {
   		
	  
    	parent::onBeforeWrite();
}
  




	
 function getCMSFields() {
		   
			
			 $fields = parent::getCMSFields();
		 	
			  
			  return $fields;
   }
   
   
function removeFields( $fields) {
		  
			 
			 $fields = parent::getCMSFields();
		 
	 		//$fields->removeByName('Event'); //We remove this event at this stage because in actual data it's harded wired. 
			//$fields->removeByName('Relationships');
			//$fields->removeByName('Groups');
		        //$fields->removeByName('SourceFile');
				
			  return $fields;
   }
		

 
};

?>