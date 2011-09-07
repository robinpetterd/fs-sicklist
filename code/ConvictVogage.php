<?php 

class ConvictVogage extends DataObject {
 
   //static $api_access = true;
  //function canView() { return true; }
    static $default_sort = "\"Sort\"";
    
    static $indexes = array("fulltext (Ship)");
    static $db = array(
         
            "Sort" => "Int",
            'Order'=>'Int', // SRC name Order
            'VoyageIdent'=>'Text', // SRC name    Voyage ID
            'YearArrived'=>'Int', // SRC name  Year Arrived 
            'DayArrived'=>'Int', // SRC name  Day Arrived
            'MonthArrived'=>'Int', // SRC name   Month Arrived
            'DateArrived'=>'Int', // SRC name   Date arrived
            'ColonyBoundFor'=>'Text', // SRC name  Colony bound for
            'Ship'=>'Text', // SRC name  Ship 
            'Rig'=>'Text', // SRC name  Rig 
            'Ton'=>'Int', // SRC name   Ton
            'Built'=>'Text', // SRC name Built 
            'YearBuilt'=>'Text', // SRC name Year Built
            'Age'=>'Int', // SRC name Age 
            'Class'=>'Text', // SRC name Class
            'Division'=>'Int', // SRC name  Division
            'Master'=>'Text', // SRC name Master 
            'Surgeon'=>'Text', // SRC name Surgeon 
            'SurgeonPrevious'=>'Int', // SRC name Surgeon Previous
            'DaySailed'=>'Int', // SRC name  Day Sailed'
            'MonthSailed'=>'Int', // SRC name Month Sailed
            'YearSailed'=>'Int', // SRC name Year Sailed
            'Departed'=>'Text', // SRC name Departed 
            'Route'=>'Text', // SRC name Route
            'Days'=>'Int', // SRC name Days
            'Notes'=>'Text',  // SRC name Notes
            
             'Name' => "Text",
   );


   static $has_one = array(
       
	
   );
   
   static $has_many = array(
       
       
   );	  
   	
	
    static $many_many = array(	
        
          'Sick' => 'SickList'


	);
	
		

  static $searchable_fields = array(
       'Ship','VoyageIdent'
  );
 
   
									
  static $summary_fields = array(
      'Ship','VoyageIdent'
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