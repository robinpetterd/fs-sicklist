<?php
  
class CustomSiteConfig extends DataObjectDecorator {
     
    function extraStatics() {
        return array(
            'db' => array(
                'HelpText' => 'HTMLText',
                'Footer' => 'HTMLText'

              
            ),
            
            'has_one' => array(
             
            )
        );
    }
  
    public function updateCMSFields(FieldSet &$fields) {
         
        $fields->addFieldToTab("Root.Main", new HTMLEditorField("Footer"));
        $fields->addFieldToTab("Root.Main", new HTMLEditorField("HelpText"));


    
    }
     
}