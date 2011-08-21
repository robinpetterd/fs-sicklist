<?php 

class SickList extends Event {
 
   //static $api_access = true;
    
	function canView() { return true; }
   
    static $db = array(
	 'LineNumber' => 'Int', 
	 'SickListId' => 'Int',
	 'Ship' => 'Text',
        Voyage Number
        Voyage ID
        Transport Gender
        Day of Departure
        Month of Departure
        Year of Departure
        Period of Departure
        Date Sailed (Bateson)
        Sick List ID
        Bateson Arrival Day
        Bateson Arrival Month
        Bateson Arrival Year
        Bateson Arrival Date

         'Length Voyage' => 'Int',  \\ SRC name Length Voyage
         'Season sailed' => 'Text', \\ SRC name Season sailed
         'Season Code' => 'Text', \\ SRC name Season Code
         'Order' => 'Text', \\ SRC name Order
         'On Day' => 'Text', \\ SRC name On Day
         'On Month' => 'Text',\\ SRC name On Month
         'On Year' => 'Text', \\ SRC name  On Year
         'Date Entered on Sick List' => 'Text', \\ SRC name  Date Entered on Sick List
         'Days lapse since sailing' => 'Text', \\ SRC name Days lapse since sailing
         'Percentage voyage lapsed' => 'Text', \\ SRC name  Percentage voyage lapsed
         'Forenames' => 'Text', \\ SRC name Forenames
         'Name' => 'Text', \\ SRC name Name
         'Age' => 'Text', \\ SRC name Age
         'No. on the list' => 'Text', \\ SRC name No. on the list
         'Case Notes' => 'Text', \\ SRC name Case Notes
         'Quality' => 'Text', \\ SRC name Qualitt
         'Status Code' => 'Text', \\ SRC name Status Code
         'Trade' => 'Text', \\ SRC name Trade
         'Disease or Wound' => 'Text', \\ SRC name Disease or Wound
         'Diagnostic Interpretation' => 'Text', \\ SRC name Diagnostic Interpretation
         'Disease Classification 1' => 'Text', \\ SRC name Disease Classification 1
         'Disease 1 Code' => 'Text', \\ SRC name Disease 1 Code
         'Disease Classification 2' => 'Text', \\ SRC name Disease Classification 2
         'Disease 2 Code' => 'Text', \\ SRC name Disease 2 Code
         'off Day' => 'Text', \\ SRC name off Day
         'off Month' => 'Text', \\ SRC name off Month
         'off Year' => 'Text', \\ SRC name off Year
         'Date Discharged' => 'Text', \\ SRC name Date Discharged
         'Days on sick List' => 'Text', \\ SRC name Days on sick List
         'Est Days on Sick List' => 'Text', \\ SRC name Est Days on Sick List
         'Days at sea till Death' => 'Text', \\ SRC name  Days at sea till Death
         'Days at sea till Death percentage voyage' => 'Text', \\ SRC name ays at sea till Death percentage voyage
         'How disposed of' => 'Text', \\ SRC name How disposed of
         'Disposed code' => 'Text', \\ SRC name Disposed code
         'Transcribers remarks' => 'Text', \\ SRC name Transcribers remarks
         'Journal remarks' => 'Text', \\ SRC name Journal remarks
         'Reference' => 'Text', \\ SRC name Reference
         'JPEG no.' => 'Text', \\ SRC name JPEG No
	 

   );


   static $has_one = array(
   	
          'Vogage' => 'Vogage', // TODO - build this data type
	
   );
   
   static $has_many = array(
   );	  
   	
	
    static $many_many = array(	

	);
	

		

  static $searchable_fields = array(
       'KnownAs.Name',
   );
 
   

									
    static $summary_fields = array(
     'KnownAs.Name','KnownAs.ID','ID'
   );
	
	
	function setKnownAsName($NameID){
		 Debug::show("hefre");
		 $this->KnownAs = $NameID;	
	}
 	
	


function onBeforeWrite() {
   		
	  
    	parent::onBeforeWrite();
}
  




	
 function getCMSFields() {
		   
			
			 $fields = parent::getCMSFields();
		 	
			  
			  return $fields;
   }
   
   
function removeFields( $fields) {
		  
			 
			 //$fields = parent::getCMSFields();
		 
	 		//$fields->removeByName('Event'); //We remove this event at this stage because in actual data it's harded wired. 
			//$fields->removeByName('Relationships');
			//$fields->removeByName('Groups');
		    //$fields->removeByName('SourceFile');

				
			  return $fields;
   }
		
			
	


 
};

?>
