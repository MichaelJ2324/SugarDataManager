<?php
$viewdefs['dm_Recycler']['base']['view']['config-system'] = array(
	'label' => 'LBL_RECYCLER_SYSTEM_CONFIG_TITLE',
	'panels' => array(
		array(
			'fields' => array(
				array(
					'name' => 'recycler_modules',
					'type' => 'enum',
					'isMultiSelect' => true,
					'label' => 'LBL_DM_DATAMANAGER_ENABLED_MODULES',
					'options' => 'dm_moduleList',
					'enabled' => true
				),
				array(
					'name' => 'default_owner_type',
					'type' => 'enum',
					'label' => 'LBL_DM_DATAMANAGER_DEFAULT_OWNER_TYPE',
					'options' => 'dm_conf_owner',
					'enabled' => true
				),
				array(
					'name' => 'owner_user',
					'type' => 'relate',
					'label' => 'LBL_ASSIGNED_TO_NAME',
					'enabled' => true,
					'rname' => 'name',
					'id_name' => 'default_user_id',
					'module' => 'Users',
					'link' => true
				),
				array(
					'name' => 'default_team_type',
					'type' => 'enum',
					'label' => 'LBL_DM_DATAMANAGER_DEFAULT_TEAM_TYPE',
					'options' => 'dm_conf_team',
					'enabled' => true
				),
				array(
					'name' => 'team_set',
					'type' => 'teamset',
					'label' => 'LBL_TEAMS',
					'rname' => 'name',
					'id_name' => 'team_id',
					'module' => 'Teams',
					'link' => true,
					'enabled' => true,
				),
			)
		),
	),
);