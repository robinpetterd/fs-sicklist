<?php

global $project;
$project = 'sicklist';

global $database;
$database = 'fs_sicklist';

require_once('conf/ConfigureFromEnv.php');

MySQLDatabase::set_connection_charset('utf8');

// This line set's the current theme. More themes can be
// downloaded from http://www.silverstripe.org/themes/
SSViewer::set_theme('blackcandy');

// Set the site locale
i18n::set_locale('en_US');

// enable nested URLs for this site (e.g. page/sub-page/)
//SiteTree::enable_nested_urls();

Director::addRules(50, array('explore/$Action/$ID/$Name' => 'SickListBrowser'));

Director::addRules(50, array('sl-linkages/$Action/$ID/$Name' => 'SickListLinkages'));


//Validator::set_javascript_validation_handler('none');
    


//error_reporting(E_ALL);

