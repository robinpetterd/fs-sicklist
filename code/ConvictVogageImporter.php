<?php 

class ConvictVogageImporter  extends CsvBulkLoader {
   
 //Basic Mapping of the raw CVS from Hamish 

   public $columnMap = array(
 	
	'Order'=> 'Order' , // SRC name Order
        'Voyage ID'=> 'VoyageIdent' , // SRC name    Voyage ID
        'Year Arrived'=> 'YearArrived' , // SRC name  Year Arrived 
        'Day Arrived'=> 'DayArrived'  , // SRC name  Day Arrived
        'Month Arrived'=> 'MonthArrived' , // SRC name   Month Arrived
        'Date arrived'=> 'DateArrived' , // SRC name   Date arrived
        'Colony bound for'=> 'ColonyBoundFor' , // SRC name  Colony bound for
        'Ship'=> 'Ship', // SRC name  Ship 
       //'Ship'=> 'Name', // SRC name  Ship 
        'Rig'=> 'Rig', // SRC name  Rig 
        'Ton'=> 'Ton', // SRC name   Ton
	'Built'=> 'Built', // SRC name Built 
 	'Year Built'=> 'YearBuilt' , // SRC name Year Built
	'Age'=> 'Age' , // SRC name Age 
	'Class'=> 'Class' , // SRC name Class
	'Division'=> 'Division' , // SRC name  Division
	'Master'=> 'Master' , // SRC name Master 
	'Surgeon'=> 'Surgeon' , // SRC name Surgeon 
	'Surgeon Previous'=> 'SurgeonPrevious', // SRC name Surgeon Previous
	'Day Sailed'=> 'DaySailed', // SRC name  Day Sailed'
	'Month Sailed'=> 'MonthSailed', // SRC name Month Sailed
	'Year Sailed'=> 'YearSailed', // SRC name Year Sailed
	'Departed'=> 'Departed', // SRC name Departed 
	'Route'=> 'Route', // SRC name Route
	'Days'=> 'Days', // SRC name Days
	'Notes'=> 'Notes' // SRC name Notes
      
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
