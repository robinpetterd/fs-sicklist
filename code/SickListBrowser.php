<?php    
 class SickListBrowser extends SapeListingController {
        
 	protected $itemController = 'SickListViewer';
        
        public $ItemsPerPage = 100;
        
        public function getItemClass() {
            return 'SickList';
        }
        
        public function getDefaultItemsPerPage() {
		return $this->ItemsPerPage;
	}
        
        public function getAllowedItemsPerPage() {
		return array(100,200,500,100);
	}
        
        
        /*
         * Builds the search form 
         * 
         * 'Data' => 'Label'
         * 
         */
        
        public function getFacetableFields() {
            return array(
                'YearOfDeparture' => 'Year Of Departure', 
                'PeriodOfDeparture' => 'PeriodOfDeparture',
                'Vogage.Name' => 'Vogage',
                'Diseases.Name' => 'Diseases',
                'Disposed.Name' => 'Disposed.',
                'Season.Name' => 'Season',
                'Status.Name' => 'Status',
                'Gender.Name'=> 'Gender'
               
                
                
            );
         }
         
      /* public function getListingFields() {
         return array(
                      'Forenames',
                      'LastName',
                      'Ship',
                      'Season.Name',
                      'DateSailedBateson',
                      'BatesonArrivalDate',
                      'Diseases.Name',
                      'Gender.Name',
                      'DiseaseOrWound',
                      'PercentageVoyageLapsed'

          );
     
     }*/

        
        
         
        public function getFulltextFields() {
            return array('DiseaseOrWound','Forenames','LastName');
        }
    
        
        /** Set up which classes that will be used on the plotted against X  
         *  This class needs to have a has_many relationship the class defined in getItemClass 
         * @return type 
         */
        
        public function getPlotClasses() {
            return array(
                'Diseases' => 'Diseases',
            );
         }
         
         /** setup x axis for the chart
         *
         * @return type 
         */
        
        public function getPlotX() {
                return 'PercentageVoyageLapsed';           
         }
     
     
     
     
    
        
        
      
        
        
}