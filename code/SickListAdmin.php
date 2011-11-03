<?php 

class SickListAdmikn extends ModelAdmin {
   
  public static $managed_models = array(
      'SickList','ConvictVogage','Disease','Season','Disposed'
   );
  
  static $model_importers = array(
 	  'SickList' => 'SickListImporter',
          'ConvictVogage' => 'ConvictVogageImporter' 
  );
    
  static $url_segment = 'sicklistadmin'; // will be linked as /admin/data
  static $menu_title = 'Sick List';
 
}


?>
