<?php 

/**
 * @copyright  Wangaz. GbR 2009 - 2014
 * @author     Wangaz. GbR <hallo@wangaz.com>
 * @package    form-auto-grow
 */
 
namespace FormAutoGrow;

 
class LoadFormFieldHook extends \Backend {
	public function loadFormField(\Widget $objWidget) {
		// add class 'auto-grow' to textarea when auto growing is enabled
		if($objWidget->type = 'textarea' && $objWidget->fag_enabled)
			$objWidget->class .= ' auto-grow';
		
		return $objWidget;
	}
}