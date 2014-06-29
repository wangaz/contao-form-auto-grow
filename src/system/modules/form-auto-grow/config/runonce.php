<?php

/**
 * @copyright  Wangaz. GbR 2009 - 2014
 * @author     Wangaz. GbR <hallo@wangaz.com>
 * @package    form-auto-grow
 */
 
class FagRunonce {
	
	public static function run() {
		// get database object
		$objDatabase = \Database::getInstance();
	
		// alter name of column if it exists
		if ($objDatabase->fieldExists('aGTEnabled', 'tl_form_field')) 
			$objDatabase->execute("ALTER TABLE tl_form_field CHANGE aGTEnabled fag_enabled varchar(1) NOT NULL default ''");
	}
}

// run 
FagRunonce::run();