<?php

require_once('include/utils.php');

class SugarFieldDM_ModuleFieldsHelpers
{
	protected static $_ignored_names = array(
		'date_modified',
		'date_entered',
		'id',
		'assigned_user_id',
		'user_id',
		'modified_user_id',
		'created_by',
		'deleted'
	);
	protected static $_ignored_types = array(
		'id',
		'link'
	);
	/**
	 * Should create the List of fields to be displayed for that Module
	 * @param string $module
	 * @param array $fields
	 */
	public static function listFields($module){
		global $current_language;

		if (empty($current_language)) $current_language = 'en_us';

		$Module = BeanFactory::getBean($module);
		$fieldList = array();
		$mod_strings = return_module_language($current_language, $module);
		foreach($Module->fields_defs as $field => $properties){
			if (in_array($properties['name'],static::$_ignored_names)){
				continue;
			}
			if (in_array($properties['type'],static::$_ignored_types)){
				continue;
			}
			$fieldsList[$field] = $mod_strings[$field];
		}
		return $fieldList;
	}



}
