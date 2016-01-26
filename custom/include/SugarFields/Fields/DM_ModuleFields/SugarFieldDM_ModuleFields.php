<?php
require_once('include/SugarFields/Fields/Text/SugarFieldMultienum.php');
require_once('custom/include/SugarFields/Fields/Worklog/SugarFieldDM_ModuleFieldsHelpers.php');
class SugarFieldDM_ModuleFields extends SugarFieldMultienum
{
	public function apiFormatField(
		array &$data,
		SugarBean $bean,
		array $args,
		$fieldName,
		$properties,
		array $fieldList = null,
		ServiceBase $service = null
	) {
		$this->ensureApiFormatFieldArguments($fieldList, $service);

		$this->normalizedFieldValues($data, $bean, $fieldName,$properties);
	}


	/**
	 * Extends apiSave to add handleWorklogSave
	 * @param SugarBean $bean
	 * @param array $params
	 * @param string $field
	 * @param array $properties
	 */
	public function apiSave(SugarBean $bean, array $params, $field, $properties)
	{
		$this->save($bean,$params,$field,$properties);
	}
	/**
	 * Extends save to verify Fields defined are in the Module defined
	 * @param $bean
	 * @param $params
	 * @param string $field
	 * @param array $properties
	 * @param string $prefix
	 */
	public function save($bean, $params, $field, $properties, $prefix = '')
	{
		if (isset($properties['moduleField'])){
			$moduleField = $properties['moduleField'];
			$module = $bean->$moduleField;
		}else{
			$moduleField = $field."_module";
			$module = $bean->$moduleField;
			unset($bean->$moduleField);
		}
		if (!is_array($bean->$field)){
			$bean->$field = explode(",",$bean->$field);
		}
		$fields = SugarFieldDM_ModuleFieldsHelpers::listFields($module);
		foreach($bean->$field as $key => $f){
			if (!in_array($f,$fields)){
				unset($key);
			}
		}
		if (!isset($properties['moduleField'])){
			$value = array(
				'module' => $module,
				'fields' => $bean->$field
			);
			$bean->$field = $value;
		}
		$bean->$field = json_encode($bean->$field);
	}

	/**
	 * Normalizes values for the dm_moduleFields field as a cleaned up list of values
	 *
	 * @param SugarBean $bean The bean to get the values from
	 * @param string $fieldName The name of the field to get normalized values from
	 * @return array
	 */
	protected function normalizedFieldValues($data, $bean, $fieldName, $properties) {
		if (!empty($bean->$fieldName)){
			$value = json_decode($bean->$fieldName);
			if (empty($properties['moduleField'])){
				$data[$fieldName."_module"] = $value['module'];
				$data[$fieldName] = $value['fields'];
			}else{
				$data[$fieldName] = $value;
			}
		}
	}
}
?>