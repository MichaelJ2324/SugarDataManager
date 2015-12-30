<?php

    if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    class RecycledLinksLogicHookController
	{

		function recycle($bean, $event, $arguments)
		{
			global $sugar_config;

			$RecycledRelationship           	  = BeanFactory::getBean("dm_RecycledLinks");
			$RecycledRelationship->name           = $arguments['related_module']." related to {$bean->bean_module}: ".$bean->name;
			$RecycledRelationship->relationship   = $arguments['relationship'];
			$RecycledRelationship->related_module = $arguments['related_module'];
			$RecycledRelationship->related_id     = $arguments['related_id'];
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