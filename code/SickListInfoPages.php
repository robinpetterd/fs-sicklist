<?Php
	
	class SickListInfoPages extends Information
	{
		static $db = array();
		
		static $has_many = array (
		 //'Boxes' => 'Box'
	);
 
	public function getCMSFields()
		{
			$f = parent::getCMSFields();
                        /*$manager = new HasManyDataObjectManager(
				$this,
				'Boxes',
				'Box',
				array('Width' => 'Width','Text' => 'Text'),
				'getCMSFields_forPopup'
			);
			
			$f->addFieldToTab( 'Root.Content.Boxes', $manager );*/
			
			return $f;
		}
		
	

	}
	
	
	class  SickListInfoPages_Controller extends Information_Controller
	{
		public function init()
		{
			parent::init();
			Requirements::set_write_js_to_body(false);


			Requirements::css('sicklist/css/DynamicLayoutPage.css');
                        Requirements::javascript('sicklist/thirdparty/jquery-1.6.4.min.js');

			Requirements::javascript('sicklist/thirdparty/jquery.masonry.min.js');
			
		}
	}
	
?>