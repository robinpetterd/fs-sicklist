<?php 

class SickListAdmikn extends ModelAdmin {
   
  public static $managed_models = array(
      'SickList','ConvictVogage'
   );
  
  static $model_importers = array(
 	  'SickList' => 'SickListImporter'
   );
    
  static $url_segment = 'sicklistadmin'; // will be linked as /admin/data
  static $menu_title = 'Sick List';
 
}


?>
