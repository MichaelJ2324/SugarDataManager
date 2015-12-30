<?php

    if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    class RecyclerLogicHookController
	{

		function recycle($bean, $event, $arguments)
		{
			$RecycledRecord = dm_Recycler::retrieveRecycled($bean);
			if ($RecycledRecord==false) {
				dm_Recycler::recycleBean($bean);
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