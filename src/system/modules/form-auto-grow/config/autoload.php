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
    'FormAutoGrow\ParseWidgetHook' => 'system/modules/form-auto-grow/ParseWidgetHook.php'
));


/**
 * Register the template
 */
TemplateLoader::addFiles(array(
	'js_fag'	=> 'system/modules/form-auto-grow/templates',
));