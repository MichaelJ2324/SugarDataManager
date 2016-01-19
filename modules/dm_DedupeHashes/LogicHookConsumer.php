<?php

    if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    class DedupeHashesLogicHookController
	{

		function delete($bean, $event, $arguments)
		{
			global $sugar_config;

			if (strpos($bean->module_name,"dm_")===0){
				return;
			}
			if (in_array($bean->module_name,$sugar_config['dm_DuplicateRules']['enabled'])) {
				$Hashes = dm_DedupeHashes::get($bean);
				dm_DedupeHashes::deleteMany($Hashes);
			}
		}

	}

?>