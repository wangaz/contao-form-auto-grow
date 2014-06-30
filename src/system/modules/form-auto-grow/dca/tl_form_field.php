<?php 

/**
 * @copyright  Wangaz. GbR 2009 - 2014
 * @author     Wangaz. GbR <hallo@wangaz.com>
 * @package    form-auto-grow
 */
 
 
/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_form_field']['config']['onload_callback'][] = array('tl_form_field_fag', 'showJsLibraryHint');


/*
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['textarea'] = str_replace('class', 'fag_enabled,class', $GLOBALS['TL_DCA']['tl_form_field']['palettes']['textarea']);


/*
 * Fields
 */ 
$GLOBALS['TL_DCA']['tl_form_field']['fields']['fag_enabled'] = array(
	'label'         => &$GLOBALS['TL_LANG']['tl_form_field']['fag_enabled'],
	'inputType'     => 'checkbox',
	'exclude'       => true,
	'eval'			=> array('submitOnChange' => true, 'tl_class' => 'm12'),
	'sql'			=> "varchar(1) NOT NULL default ''"
);


/**
 * Class tl_form_field_fag
 */
class tl_form_field_fag extends Backend {
	
	/**
	 * Import the back end user object
	 */
	public function __construct() {
		parent::__construct();
		$this->import('BackendUser', 'User');
		System::loadLanguageFile('tl_content');
	}
	
	
	/**
	 * Show a hint if a JavaScript library needs to be included in the page layout
	 */
	public function showJsLibraryHint($dc) {
		if ($_POST || Input::get('act') != 'edit')
			return;

		$objFfm = FormFieldModel::findByPk($dc->id);

		if ($objFfm === null)
			return;

		if ($objFfm->type == 'textarea' && $objCte->fag_enabled)
			Message::addInfo(sprintf($GLOBALS['TL_LANG']['tl_content']['includeTemplate'], 'moo_autogrow'));
			//Message::addInfo(sprintf($GLOBALS['TL_LANG']['tl_content']['includeTemplates'], 'moo_autogrow', 'j_autogrow'));
	}
}