<?php 

class SickListImporter  extends CsvBulkLoader {
   
 //Basic Mapping of the raw CBC 

   public $columnMap = array(
 	
	'Line Number' => 'LineNumber',
	'Ship' => 'Ship'
  	
	
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
