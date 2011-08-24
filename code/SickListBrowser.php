<?php    
 class SickListBrowser extends FacetedListingController {
        
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
                'Forenames' => 'Fore Names', 
                'DiseaseOrWound' => 'Disease or Wound',
                'DiagnosticInterpretation' => 'Diagnostic Interpretation'
            );
         }
         
        public function getFulltextFields() {
            return array('DiseaseOrWound','Forenames','LastName');
        }
    
    
        
        
      
        
        
}