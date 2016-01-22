<?php
$viewdefs['dm_Recycler']['base']['view']['config-purge'] = array(
	'label' => 'LBL_RECYCLER_PURGE_CONFIG_TITLE',
	'panels' => array(
		array(
			'fields' => array(
				array(
					'name' => 'purge_enabled',
					'type' => 'enum',
					'isMultiSelect' => true,
					'label' => 'LBL_DM_DATAMANAGER_ENABLED_MODULES',
					'options' => 'dm_moduleList',
					'default' => false,
					'enabled' => true,
				),
				array(
					'name' => 'purge_after_days',
					'label' => 'LBL_DM_DATAMANAGER_PURGE_AFTER_DAYS',
					'type' => 'int',
					'minRange' => 0,
					'maxRange' => 120,
					'enabled' => true
				)
			)
		),
	),
);