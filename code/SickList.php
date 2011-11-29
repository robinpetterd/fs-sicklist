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
         'Vogage' => 'ConvictVogage',
         'Disposed' => 'Disposed'


   );
   
   static $has_many = array(
   );	  
   	
	
    static $many_many = array(	
           'Diseases' => 'Disease'
	);
	

		

  static $searchable_fields = array(
       'LineNumber','Name','YearOfDeparture','Season.Name','Diseases.Name','Disposed.Name','Gender.Name','DiseaseOrWound','PercentageVoyageLapsed','DaysLapseSinceSailing','JPEGNo'
  );
 
   
									
  static $summary_fields = array(
     'ID','Forenames','LastName','Ship','Season.Name','DateSailedBateson','BatesonArrivalDate','DiseaseOrWound','PercentageVoyageLapsed'
  );
	
	
 
function getImages() {
   	 
     $result = new DataObjectSet();
     //echo 'here<p>';
    
    //see if the image contains any ,    
    $ListStatus = false; 
     
    $pos = strpos($this->JPEGNo,',');
    //echo $pos;

    if($pos != false) {
  
       $ListStatus = true; 
      // echo " it's got ,";  

    } 
    
    $pos = strpos($this->JPEGNo,' ');
    //echo $pos;
    if($pos != false) {
      // echo " it's got spaces in the file name";  
       $ListStatus = true; 
       $TOpos = strpos($this->JPEGNo,'to');
       ///echo $TOpos;
       if($TOpos != false) {$ListStatus = true;}; 
    } 
    
    
    if($ListStatus == false) {
     // it's just a simple image  
     
      $JPGpos = strpos($this->JPEGNo,'JPG');
      
      if($pos === true) {
           $imageURL =  $this->JPEGNo . '.JPG';

      } else {
           $imageURL =  $this->JPEGNo;

      }
      
      //echo $imageURL;
      
     
      $result->push(new ArrayData(array(
              'image' => $imageURL
            ))); 
      
      return  $result;
     }
        
    else {
        // string needle found in haystack
        // echo 'got , or space in the string';
         $pos = strpos($this->JPEGNo,',');
         //echo $pos;
         if($pos == false){
            //need to see if this has to   
             $pos = strpos($this->JPEGNo,'to');
             
             if($pos != false) {
               //echo 'this on has to in as well';
                 $images = array($this->JPEGNo);
             } else {
                $images = explode(" ", $this->JPEGNo);
             }
             
         } else {
            $images = explode(",", $this->JPEGNo);
         }
         

//echo $images;
        
        foreach ($images as $image) {
             
            //make see if we have to which means we dealing with a series
            
            $TOpos = strpos($image,'to');
            
            if($TOpos == true) {
                   $imageURL =  $image . '.JPG';
                   //echo 'yes got a TO';
                   //echo $image; 
                   //seperate that out into the range 
                   $range = explode(" to ", $image);
                   
                   //should only be two
                   //echo count($range);
                   
                   if (count($range) > 2) {
                       echo 'something has gone wrong';
                   } else {
                       //remove the PA from them
                       $startWithPA = $range[0];
                      // echo  $startWithPA;
                       
                       if(strpos($startWithPA, 'PA')) {
                        $StartBegin = 'PA';   
                        $startNO = str_replace ( 'PA' , '' ,$startWithPA );
                       //$startNO = str_replace ( 'PB' , '' ,$startWithPA );
                        $startString = 'PA';
                        
                       } else {
                           
                         $StartBegin = 'PB';   
                         $startNO = str_replace ( 'PB' , '' ,$startWithPA); 
                         $startString = 'PB';

                       }
                       
                       //echo '<p> Start Number is  ' . $startNO;
                       //echo $begin;
                       
                       $endWithPA =  $range[1];

                       if(strpos($endWithPA, 'PA')) {
                        $EndBegin = 'PA';   
                        $endNO = str_replace ( 'PA' , '' ,$endWithPA);
                       //$startNO = str_replace ( 'PB' , '' ,$startWithPA );

                       } else {
                           
                         $EndBegin = 'PB';   
                         $endNO = str_replace ( 'PB' , '' ,$endWithPA); 
                       }
                                              
                                             
                       
                       //echo ' <p>End Start Number is ' . $endNO . '<br>';

                       //echo $startString . (int)$startNO . '.JPG<br><br>';
                       
                       $numberLength =  strlen ($startNO);
                       
                       for ($i = $startNO; $i <= $endNO; $i++) {
                            
                            if((strlen ($i)) != $numberLength ) {
                                //echo 'differetn length<br>';
                                ///$diff =  $numberLength - strlen ($i); 
                                
                                $i = str_pad($i, $numberLength-1, "00", STR_PAD_LEFT);
                                        
                                
                            }; 
                            
                            $image = 'PB'. $i . '.JPG';
                            $image = str_replace ( ' ' , '' ,$image); 
                            //echo $image;
                            
                            $result->push(new ArrayData(array(
                              'image' => $image
                            )));

                            //echo '<br>';
                        }

                       
                       //echo $end;
                   }

                           
                   
                   
                   
              } else {
             
                 //got a single image so we work with that
                 $JPGpos = strpos($image,'JPG');

                  if($JPGpos === false) {
                       $imageURL =  $image . '.JPG';
                  } else {
                       $imageURL =  $image;
                  }

                $result->push(new ArrayData(array(
                  'image' => $imageURL
                ))); 

           }      
        }

        
       return  $result;

    }


        
}


 	
	
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