<?php

require_once('clients/base/api/ConfigModuleApi.php');

class DuplicatesConfigApi extends ConfigModuleApi
{
	/**
	 * {@inheritdoc}
	 *
	 * @return array
	 */
	public function registerApiRest()
	{
		return
			array(
				'duplicatesConfigGet' => array(
					'reqType' => 'GET',
					'path' => array('dm_Duplicates', 'config'),
					'pathVars' => array('module', ''),
					'method' => 'config',
					'shortHelp' => 'Retrieves the config settings for a given module',
					'longHelp' => 'modules/dm_Duplicates/clients/base/api/help/config_get_help.html',
				),
				'duplicatesConfigCreate' => array(
					'reqType' => 'POST',
					'path' => array('dm_Duplicates', 'config'),
					'pathVars' => array('module', ''),
					'method' => 'configSave',
					'shortHelp' => 'Creates the config entries for the dm_Duplicates module.',
					'longHelp' => 'modules/dm_Duplicates/clients/base/api/help/ConfigPost.html',
				),
				'duplicatesConfigUpdate' => array(
					'reqType' => 'PUT',
					'path' => array('dm_Duplicates', 'config'),
					'pathVars' => array('module', ''),
					'method' => 'configSave',
					'shortHelp' => 'Updates the config entries for the dm_Duplicates module',
					'longHelp' => 'modules/dm_Duplicates/clients/base/api/help/ConfigPut.html',
				),
			);
	}

	public function config(ServiceBase $api, $args) {
		$module = 'dm_Duplicates';
		$platform = 'base';
		$seed = BeanFactory::newBean($module);
		$adminBean = BeanFactory::getBean("Administration");

		//acl check
		if (!$seed->ACLAccess('access')) {
			// No create access so we construct an error message and throw the exception
			$failed_module_strings = return_module_language($GLOBALS['current_language'], $module);
			$moduleName = $failed_module_strings['LBL_MODULE_NAME'];

			$args = null;
			if (!empty($moduleName)) {
				$args = array('moduleName' => $moduleName);
			}

			throw new SugarApiExceptionNotAuthorized(
				$GLOBALS['app_strings']['EXCEPTION_CHANGE_MODULE_CONFIG_NOT_AUTHORIZED'],
				$args
			);
		}

		return $adminBean->getConfigForModule($module,$platform);

	}
	public function configSave(ServiceBase $api, $args){
		$module = 'dm_Duplicates';

		unset($args['__sugar_url']);

		//acl check, only allow if they are module admin
		if (!$api->user->isAdmin() && !$api->user->isDeveloperForModule($module)) {
			// No create access so we construct an error message and throw the exception
			$failed_module_strings = return_module_language($GLOBALS['current_language'], $module);
			$moduleName = $failed_module_strings['LBL_MODULE_NAME'];

			$args = null;
			if (!empty($moduleName)) {
				$args = array('moduleName' => $moduleName);
			}

			throw new SugarApiExceptionNotAuthorized(
				$GLOBALS['app_strings']['EXCEPTION_CHANGE_MODULE_CONFIG_NOT_AUTHORIZED'],
				$args
			);
		}

		$admin = BeanFactory::getBean('Administration');
		$platform = 'base';

		foreach ($args as $name => $value) {
			if (is_array($value)) {
				$admin->saveSetting($module, $name, json_encode($value),$platform);
			} else {
				$admin->saveSetting($module, $name, $value,$platform);
			}
		}

		if ($this->skipMetadataRefresh === false) {
			MetaDataManager::refreshModulesCache(array($module));
		}

		return $admin->getConfigForModule($module, $platform, true);
	}
}
