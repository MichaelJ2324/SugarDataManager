<?php
$viewdefs['dm_Duplicates']['base']['view']['config-merge'] = array(
	'label' => 'LBL_DUPLICATES_MERGE_CONFIG_TITLE',
	'panels' => array(
		array(
			'fields' => array(
				array(
					'name' => 'merge_modules',
					'type' => 'enum',
					'isMultiSelect' => true,
					'label' => 'LBL_DM_DATAMANAGER_ENABLED_MODULES',
					'view' => 'edit',
					'options' => 'dm_moduleList',
					'default' => false,
					'enabled' => true,
				),
			)
		),
	),
);