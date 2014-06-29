<?php 

/**
 * @copyright  Wangaz. GbR 2009 - 2014
 * @author     Wangaz. GbR <hallo@wangaz.com>
 * @package    form-auto-grow
 */
 

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
	'eval'			=> array('tl_class' => 'm12'),
	'sql'			=> "varchar(1) NOT NULL default ''"
);