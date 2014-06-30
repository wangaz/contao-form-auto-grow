<?php

/**
 * @copyright  Wangaz. GbR 2009 - 2014
 * @author     Wangaz. GbR <hallo@wangaz.com>
 * @package    form-auto-grow
 */
 
 
/**
 * Register the class
 */
ClassLoader::addClasses(array(
    'FormAutoGrow\LoadFormFieldHook' => 'system/modules/form-auto-grow/LoadFormFieldHook.php'
));


/**
 * Register the template
 */
TemplateLoader::addFiles(array(
	'moo_autogrow'	=> 'system/modules/form-auto-grow/templates',
));