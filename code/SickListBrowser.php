<?php    
 class SickListBrowser extends SapeListingController {
        
        public function getItemClass() {
            return 'SickList';
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
                'Diseases.Name' => 'Diseases',
                'Season.Name' => 'Season',
                'Status.Name' => 'Status',
                'Gender.Name'=> 'Gender'
               
                
                
            );
         }
         
        public function getFulltextFields() {
            return array('DiseaseOrWound','Forenames','LastName');
        }
    
    
        
        
      
        
        
}