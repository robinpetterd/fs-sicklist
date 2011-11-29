<?php

class SickListViewer extends Page {

}
 class SickListViewer_Controller extends Page_Controller {
        
       function index () {
       }
       
       function show () {
            if($SickEntry = $this->getSickEntry())
                    
                    {
                    //got it
                     
                    return $this->customise(array('SickEntry' => $SickEntry))->renderWith(array('SickListViewer','Page'));                    
                    }
                     else
                    {
                            //Staff member not found
                            return $this->httpError(404, 'Sorry that entry could not be found');
                    }
            }
	
	//Get the current  from the URL, if any
	public function getSickEntry()
	{
		$Params = $this->getURLParams();
		
		if(is_numeric($Params['ID']) && $SickEntry = DataObject::get_by_id('SickList', $Params['ID']))
		{		
			return  $SickEntry;
		}
	}
        
      
        public function Display($SickEntry )
	{
                //Debug::Show($SickEntry);
                
                
	}

   
        
}