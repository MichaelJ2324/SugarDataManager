<?php
$admin_option_defs = array();
$admin_option_defs['Administration'] = array(
	'recycler_config' => array(
		'recycler_config',
		'Configure Recycler',
		'Configure the recycler module.',
		'#dm_DataManager/layout/configure/Recycler'
	),
	'duplicate_config' => array(
		'duplicate_config',
		'Configure Duplicates Module',
		'Configure the Duplicates Module',
		'#dm_DataManager/layout/configure/Duplicates'
	),
	'dedupe_rules' => array(
		'dedupe_rules',
		'Duplicate Rules',
		'Configure the Duplicates Rules for the Duplicates module',
		'#dm_DuplicatesRules'
	)
);
$admin_group_header[] = array(
	'Data Manager',
	'',
	false,
	$admin_option_defs,
	'Manages settings in regards to the Data Manager package'
);