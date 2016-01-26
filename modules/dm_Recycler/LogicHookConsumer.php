<?php

    if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    class RecyclerLogicHookController
	{

		function recycle($bean, $event, $arguments)
		{
			if (strpos($bean->module_name,"dm_")===0){
				return;
			}
			$config = dm_Recycler::config();
			if (in_array($bean->module_name,$config['recycler_modules'])){
				$RecycledRecord = dm_Recycler::retrieveRecycled($bean);
				if ($RecycledRecord == FALSE) {
					dm_Recycler::recycleBean($bean);
				}
			}
		}

		function purge($bean,$event,$arguments){
			$config = dm_Recycler::config();
			if (in_array($bean->bean_module,$config['purge_modules'])){
				$bean->purge();
			}
		}

	}

?>