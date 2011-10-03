<?php    
 class SickListBrowser extends SapeListingController {
        
        public function getItemClass() {
            return 'SickList';
        }
        
        public function getDefaultItemsPerPage() {
		return 1000;
	}
        
        public function getAllowedItemsPerPage() {
		return array(1000);
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
                'PercentageVoyageLapsed' => 'PercentageVoyageLapsed', 
                'Diseases.Name' => 'Diseases',
                'Season.Name' => 'Season',
                'Status.Name' => 'Status',
                'Gender.Name'=> 'Gender'
               
                
                
            );
         }
         
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