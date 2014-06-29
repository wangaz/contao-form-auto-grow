<?php 

/**
 * @copyright  Wangaz. GbR 2009 - 2014
 * @author     Wangaz. GbR <hallo@wangaz.com>
 * @package    form-auto-grow
 */
 
namespace FormAutoGrow;

 
class ParseWidgetHook extends \Backend {
	public function parseWidget($strBuffer, \Widget $objWidget) {
		if($objWidget->fag_enabled) {
			// include javascript files
			$GLOBALS['TL_JAVASCRIPT']['FAG_1'] = 'assets/mootools/powertools/Class.Binds.js';
			$GLOBALS['TL_JAVASCRIPT']['FAG_2'] = 'assets/mootools/powertools/Class.Singleton.js';
			$GLOBALS['TL_JAVASCRIPT']['FAG_3'] = 'assets/mootools/autogrow/Form.AutoGrow.js';
			
			// call constructor of JavaScript class
			$objTemplate = new \FrontendTemplate('faq_textfield');
			$objTemplate->id = $objWidget->id;
			$objTemplate->minHeight = $objWidget->rows;
			$strBuffer .= $objTemplate->parse();
		}
		
		return $strBuffer;
	}
}