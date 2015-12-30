<?php

    if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    class RecycledLinksLogicHookController
	{

		function recycle($bean, $event, $arguments)
		{
			global $sugar_config;

			$related_id = $arguments['related_id'];
			$relationship = $arguments['relationship'];
			$related_module = $arguments['related_module'];
			$RecycledRelationship = dm_RecycledLinks::retrieveRecycled($bean,$relationship,$related_id);
			$RecycledRelationship           	  = BeanFactory::getBean("dm_RecycledLinks");
			$RecycledRelationship->name           = $related_module." related to {$bean->module_name}: ".$bean->name;
			$RecycledRelationship->relationship   = $relationship;
			$RecycledRelationship->related_module = $related_module;
			$RecycledRelationship->related_id     = $related_id;
			$RecycledRelationship->bean_id 		  = $bean->id;
			$RecycledRelationship->bean_module	  = $bean->module_name;
			$RecycledRelationship->save();

			$RecycledRecord = dm_Recycler::retrieveRecycled($bean);
			if ($RecycledRecord!==false){
				$rel_name = 'dm_recycler_dm_recycledlinks';
				$RecycledRecord->load_relationship($rel_name);
				$RecycledRecord->$rel_name->add($RecycledRelationship->id);
			}
		}

		function purge($bean,$event,$arguments){
			global $sugar_config;
			if (in_array($bean->bean_module,$sugar_config['dm_config']['purge_modules'])){
				$bean->purge();
			}
		}
	}

?>