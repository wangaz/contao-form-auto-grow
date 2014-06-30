<?php

/**
 * @copyright  Wangaz. GbR 2009 - 2014
 * @author     Wangaz. GbR <hallo@wangaz.com>
 * @package    form-auto-grow
 */


/*
 * Hooks
 */
$GLOBALS['TL_HOOKS']['loadFormField'][] = array('FormAutoGrow\LoadFormFieldHook', 'loadFormField');