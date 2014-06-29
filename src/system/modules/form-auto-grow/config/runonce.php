<?php

/**
 * @copyright  Wangaz. GbR 2009 - 2014
 * @author     Wangaz. GbR <hallo@wangaz.com>
 * @package    form-auto-grow
 */
 
class FagRunonce {
	
	public function run() {
		// get database object
		$objDatabase = \Database::getInstance();
	
		// alter name of column if it exists
		if ($objDatabase->fieldExists('tl_form_field', 'aGTEnabled')) 
			$objDatabase->execute("ALTER TABLE tl_form_field CHANGE fag_enabled aGTEnabled varchar(1) NOT NULL default ''");
	}
}

// run 
$objFagRunonce = new FagRunonce();
$objB$objFagRunonceannerRunonceJob->run();