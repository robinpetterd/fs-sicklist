<?php

class  SickListLinkages extends Controller  {
	
    
    	static $allowed_actions = array(
		'index',
                'build'
		
	);
	
        
        
function build() {
             
    
             echo 'about to start build links';
             $currentMember = Member::currentUser();
               if( Permission::checkMember($currentMember, 'ADMIN')) {
                   
                   $sl =  $this->getSickList(); 
                   
                   foreach($sl as $entry) {
                       echo 'working on ' . $entry->SickListIdent . '<br>'; 
                       
                       $this->LinkDisposed($entry); 
                       
                        $this->LinkDiseases($entry); 
                       //$this->LinkSeasons($entry);
                       //$this->LinkGender($entry);
                       //$this->LinkRole($entry);
                      
                        //$this->LinkVogage($entry);
                       //$this->TidyVogages($entry);



                   }

		 } 
                 
                   echo '######### Done ############';
              }
  
 
function index() {
			
			
            //Debug::show('<a href="build">Build All</a>');
		$currentMember = Member::currentUser();
                if( Permission::checkMember($currentMember, 'ADMIN')) {
                       echo  '<a href="sl-linkages/build">Build All - Sick List</a>';
                } else {
                       echo "you don't have permission to do this";

                }
 	    }
/* 
 * Does any post processing that is needed 
 */

            
function  TidyVogages() {
    
       $Vogages = DataObject::get('ConvictVogage');  
       foreach($Vogages as $Vogage) {
          
           //echo 'working on ' . $Vogage->SickListIdent . '<br>';
           
           $Vogage->Name = $Vogage->Ship;
           $Vogage->write();
        }
}
 
 function  getSickList() {
        
        $sl = DataObject::get('SickList');
        //Debug::show($sl);
        return $sl;
        
 } 
 
 
 function LinkRole($entry) {
     
    //Organise the status code in the   string name to work with
    switch ($entry->StatusCode) {
        case 1:
            $searchRole = 'Convict';
            break;
        case 2:
            $searchRole = 'Crew';
            break;   
        case 3:
            $searchRole = 'Soldier';
            break;
        case 4:
            $searchRole = "Wife of Soldier";
            break;
         case 5:
            $searchRole = "Child of Soldier";
            break;   
        case 6:
            $searchRole = "Child of Convict";
            break;		
        case 7:
            $searchRole = 'Passenger';
            break;		
        case 8:
            $searchRole = "Child of Passenger";
            break;	
         case 10:
            $searchRole = "Status unknown";
            break;	
        case 11:
            $searchRole = 'No Data';
            break;
        
        case '':
            $searchRole = 'No Data';
            break;	
        

    }       
    
    if (!isset($searchRole)) return;
    
         // echo $searchRole;        
          if ($entry->Status) {
                //echo 'Status alreay found<br>';
            } else {
               // echo 'no Gender found<br>'; 
                
                //Debug::show($entry);
                //see if that season exist already 
                
                $Status = DataObject::get_one('Role', "Name = '" . $searchRole  ."'" );
                
                
                if($Status) {
                  $entry->StatusID = $Status->ID; 
                  $entry->write();
                 // echo 'wrote new Gender ' . $Gender->Name . ' <br>';
                  
                } else {
                    
                    //maket new object
                    $nStatus = new Role();
                    $nStatus->Name =  $searchRole;
                    
                    // sets property on object
                    $nStatus->write(); // writes row to database'
                    
                   // echo 'made new Gender ' . $searchGender . ' <br>';
                    
                    $newStatus = DataObject::get_one("Role", "Name = '" . $searchRole ."'" );
                    $entry->StatusID =  $newStatus->ID; 
                    $entry->write();
                    
                   // echo 'wrote new gender ' . $searchGender . ' <br>';

                    
                }

                                             
            }
          
  }
  
  function LinkDisposed($entry) {
      
          if($entry->DisposedCode == 0) return; // just get out this we don't need to this  
          
          if($entry->DisposedCode == 1) $SearchDisposedCode = 'Died';
          if($entry->DisposedCode == 2) $SearchDisposedCode = 'Evidence suggests relanded (did not arrive in Australia)';
          if($entry->DisposedCode == 3) $SearchDisposedCode = 'Sent to hospital on arrival in the Australian colonies';
          
          if ($entry->DisposedID  ) {
                ///echo 'Disposed Code already found alreay found<br>';
            } else {
               // echo 'no Gender found<br>'; 
                
                //Debug::show($entry);
                //see if that season exist already 
                
                $DisposedCode = DataObject::get_one("Disposed", "Name = '" . $SearchDisposedCode  ."'" );
                
                
                if($DisposedCode) {
                  $entry->DisposedID = $DisposedCode->ID; 
                  $entry->write();
                  echo 'wrote new Disposed ' . $DisposedCode->Name . ' <br>';
                  
                } else {
                    
                    //maket new object
                    $Disposed = new Disposed();
                    $Disposed->Name =  $SearchDisposedCode;
                    
                    // sets property on object
                    $Gender->write(); // writes row to database'
                    
                    echo 'made new Gender ' .  $SearchDisposedCode . ' <br>';
                    
                    $DisposedCode = DataObject::get_one("Disposed", "Name = '" . $SearchDisposedCode  ."'" );
                    $entry->write();
                     echo 'wrote new Disposed ' . $DisposedCode->Name . ' <br>';
                    
                   // echo 'wrote new gender ' . $searchGender . ' <br>';

                }

                                             
            }
          
  }  
  
  
 
  function LinkGender($entry) {
          if($entry->TransportGender == 1) $searchGender = 'Male';
          if($entry->TransportGender == 2) $searchGender = 'Female';
          
          if ($entry->Gender) {
                //echo 'Gender alreay found<br>';
            } else {
               // echo 'no Gender found<br>'; 
                
                //Debug::show($entry);
                //see if that season exist already 
                
                $Gender = DataObject::get_one("Gender", "Name = '" . $searchGender  ."'" );
                
                
                if($Gender) {
                  $entry->GenderID = $Gender->ID; 
                  $entry->write();
                  echo 'wrote new Gender ' . $Gender->Name . ' <br>';
                  
                } else {
                    
                    //maket new object
                    $Gender = new Gender();
                    $Gender->Name =  $searchGender;
                    
                    // sets property on object
                    $Gender->write(); // writes row to database'
                    
                    echo 'made new Gender ' . $searchGender . ' <br>';
                    
                    $newGender = DataObject::get_one("Gender", "Name = '" . $searchGender ."'" );
                    $entry->GenderID =  $newGender->ID; 
                    $entry->write();
                    
                   // echo 'wrote new gender ' . $searchGender . ' <br>';

                    
                }

                                             
            }
          
  }  
  
  
  
  function LinkVogage($entry) {
        
          
          if ($entry->VogageID != 0) {
                echo 'Vogage alreay found<br>';
            } else {
                
                //Debug::show($entry->VoyageIdent);
                //see if that season exist already 
                $BatonsonVogage = DataObject::get_one("ConvictVogage", "VoyageIdent = '" . $entry->VoyageIdent ."'" );
                //Debug::show($BatonsonVogage);
              
                if( $BatonsonVogage) {
                  
                  $entry->VogageID = $BatonsonVogage->ID; 
                  
                  $existingSick = $BatonsonVogage->Sick();
                  $existingSick->add($entry); 
                  
                  $BatonsonVogage->write();
                  
                  $entry->write();

                                
                                
                  
                  // Debug::show($entry->VogageID);
                  
                  echo 'wrote new Vogage ' . $entry->Ship . ' <br>';
                  
                } else {
                    
                    echo 'couldnot for that vogage <br>';
                    
                   
                }

                                             
            }
          
  }  
  
            
 function LinkSeasons($entry) {
			
            if ($entry->Season) {
                echo 'season alreay found<br>';
            } else {
                echo 'no season found<br>'; 
                
                //Debug::show($entry);
                //see if that season exist already 
                $Season = DataObject::get_one("Season", "Name = '" . $entry->SeasonSailed ."'" );
                
                if($Season) {
                  $entry->SeasonID = $Season->ID; 
                  $entry->write();
                  echo 'wrote new season ' . $Season->Name . ' <br>';
                  
                } else {
                    
                    //maket new object
                    $Season = new Season();
                    $Season->Name = $entry->SeasonSailed;
                    Debug::show($entry->SeasonSailed);
                    
                    // sets property on object
                    $Season->write(); // writes row to database'
                    
                    echo 'made new season ' . $Season->Name . ' <br>';
                    
                    $newSeason = DataObject::get_one("Season", "Name = '" . $entry->SeasonSailed ."'" );
                    $entry->SeasonID =  $newSeason->ID; 
                    $entry->write();
                    
                    echo 'wrote new season ' . $newSeason->Name . ' <br>';

                    
                }

                                             
            }
          
     
      			  
 	    
        
 }
 
 function LinkDiseases($entry) {
			
            //Debug::show($sl);
            
            //Debug::show('<a href="build">Build All</a>');
            echo  'about to link disease';
           
           $diseaseClassCodes = array ($entry->Disease1Code, $entry->Disease2Code);
           $diseaseClassArray = array ();

           $searchDisease = '';
            
           foreach($diseaseClassCodes as $code) {
                switch ($code) {
                    
                    case     1:
                         $searchDisease = 'Accident';
                        break;
                    case     2:
                         $searchDisease = 'Convulsions and teething';
                        break;
                    case     3:
                        $searchDisease = 'Debility and marasmus';
                        break;
                    case     4:
                        $searchDisease = 'Diarrhoea and dysentery';
                        break;
                    case     5:
                        $searchDisease = 'Diseases of the blood and blood forming organs';
                        break;
                    case     6:
                        $searchDisease = 'Diseases of the circulatory system';
                        break;
                    case     7:
                        $searchDisease = 'Diseases of the digestive system';
                        break;
                    case     8:
                        $searchDisease = 'Diseases of the eye and ear';
                        break;
                    case     9:
                        $searchDisease = 'Diseases of the geniourinary system';
                        break;
                    case     10:
                        $searchDisease = 'Diseases of the musculoskeletal system';
                        break;
                    case     11:
                        $searchDisease = 'Diseases of the nervous system';
                        break;
                    case     12:
                        $searchDisease = 'Diseases of the respiratory system';
                        break;
                    case     13:
                       $searchDisease = 'Diseases of the skin and subcutaneous tissue';
                        break;
                    case     14:
                        $searchDisease = 'Endocrine, deficiency and metabolic disorders';
                        break;
                    case     15:
                        $searchDisease = 'Influenza';
                        break;
                    case     16:
                        $searchDisease = 'Malingering';
                        break;
                    case     17:
                       $searchDisease = 'Measles';
                        break;
                    case     18:
                        $searchDisease = 'Mental and behavioural disorders';
                        break;
                    case     19:
                        $searchDisease = 'Nausea';
                        break;
                    case     20:
                        $searchDisease = 'Neoplasm';
                        break;
                    case     21:
                        $searchDisease = 'Old age and decay';
                        break;
                    case     22:
                       $searchDisease = 'Other fever';
                        break;
                    case      23:
                        $searchDisease = 'Other infectious diseases';
                        break;
                    case     24:
                        $searchDisease = 'Other tuberculosis';
                        break;
                    case     25:
                        $searchDisease = 'Paralysis';
                        break;
                    case     26:
                        $searchDisease = 'Parasitic disease';
                        break;
                    case     27:
                        $searchDisease = 'Preganancy, childbirth and the puerperium';
                        break;
                    case     28:
                        $searchDisease = 'Respiratory tuberculosis';
                        break;
                    case     29:
                        $searchDisease = 'Scarlet fever';
                        break;
                    case     30:
                        $searchDisease = 'Sexually transmitted diseases';
                        break;
                    case     31:
                        $searchDisease = 'Suicide';
                        break;
                    case     32:
                        $searchDisease = 'Unclassifiable';
                        break;
                    case      33:
                        $searchDisease = 'Unknown';
                        break;
                    case     34:
                        $searchDisease = 'Unspecified natural causes';
                        break;
                    case     35:
                        $searchDisease = 'Vaccinated';
                        break;
                    case     36:
                        $searchDisease = 'Whooping cough';
                        break;
                    
            

                }
                //now add the teh array 
                
                if($searchDisease != '') {
                     array_push( $diseaseClassArray, $searchDisease );
                }                      
           }
    
                 //$diseaseClassArray = array ($entry->DiseaseClassification1, $entry->DiseaseClassification2);
                 //Debug::show($diseaseClassArray);
                 
                  foreach($diseaseClassArray as $diseaseClass) {
                       
                      if($diseaseClass != '') {
                             $DiseaseObject = DataObject::get_one("Disease", "Name = '" . $diseaseClass ."'" );

                             //Debug::show($DiseaseObject); 

                             if($DiseaseObject) {
                                 //yes we have the Disease already so need to save that the data object
                                
                                $existingDiseases = $entry->Diseases();
                                //Debug::show($existingDiseases); 
                                
                                //$entry->Diseases->add($DiseaseObject);
                                $existingDiseases->add($DiseaseObject);

                                
                                //$entry->Diseases =   $DiseaseObject;
                                 $entry->write(); // writes row to database

                                 //Debug::show($entry);
                                 echo 'added ' . $DiseaseObject->Name . ' to ' . $entry->LineNumber . '<br>';



                             } else {
                                 //we don't have that Disease so need make the object and the save it 

                                $Disease = new Disease();
                                $Disease->Name = $diseaseClass; // sets property on object
                                $Disease->write(); // writes row to database'

                                //now get object from the DB maybe don't reallly need this 

                                $DiseaseObject = DataObject::get_one("Disease", "Name = '" . $diseaseClass ."'" );
                                $existingDiseases = $entry->Diseases();
                                $existingDiseases->add($DiseaseObject);                                //$existingDiseases->add($DiseaseObject);
                                 //$entry->Diseases =   $DiseaseObject;
                                $entry->write();
                                echo 'made new and added ' . $DiseaseObject->Name . '<br>';
 
                                //Debug::show($entry); 


                            }
                        
                        }
                
                }
           					  
 	    
        
 }
 }  

 
 
 
 ?>
