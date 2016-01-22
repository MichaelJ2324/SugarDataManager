<?php
$viewdefs['dm_Duplicates']['base']['view']['config-system'] = array(
	'label' => 'LBL_DUPLICATES_SYSTEM_CONFIG_TITLE',
	'panels' => array(
		array(
			'fields' => array(
				array(
					'name' => 'default_owner_type',
					'type' => 'enum',
					'label' => 'LBL_DM_DATAMANAGER_DEFAULT_OWNER_TYPE',
					'view' => 'edit',
					'options' => 'dm_conf_owner',
					'enabled' => true,
				),
				array(
					'name' => 'owner_user',
					'type' => 'relate',
					'label' => 'LBL_ASSIGNED_TO_NAME',
					'enabled' => true,
			 	    'rname' => 'name',
					'id_name' => 'default_user_id',
					'module' => 'Users',
				   	'link' => true,
				),
				array(
					'name' => 'default_team_type',
					'type' => 'enum',
					'label' => 'LBL_DM_DATAMANAGER_DEFAULT_TEAM_TYPE',
					'options' => 'dm_conf_team',
					'enabled' => true,
				),
				array(
					'name' => 'team_set',
					'type' => 'teamset',
					'label' => 'LBL_TEAMS',
					'rname' => 'name',
					'id_name' => 'id',
					'module' => 'Teams',
					'link' => true,
					'enabled' => true,
				),
			)
		),
	),
);