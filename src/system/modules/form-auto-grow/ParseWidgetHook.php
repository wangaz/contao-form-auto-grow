<?php 

/**
 * @copyright  Wangaz. GbR 2009 - 2014
 * @author     Wangaz. GbR <hallo@wangaz.com>
 * @package    form-auto-grow
 */
 
namespace FormAutoGrow;
 
class ParseWidgetHook extends Backend {
	public function parseWidget($strBuffer, Widget $objWidget) {
		if($objWidget->fag_enabled) {
			//
			$GLOBALS['TL_JAVASCRIPT']['FAG'] = 'system/assets/mootools/autogrow/Form.AutoGrow.js';
			
			// 
			$objTemplate -> new FrontendTemplate('js_fag');
			$objTemplate->id = $objWidget->id;
			$strBuffer .= $objTemplate->parse();
		}
		
		return $strBuffer;
	}
}