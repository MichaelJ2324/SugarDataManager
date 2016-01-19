<?php
$admin_option_defs = array();
$admin_option_defs['Administration'] = array(
	'recycler_config' => array(
		'recycler_config',
		'Configure Recycler',
		'Configure the recycler module.',
		'javascript:parent.SUGAR.App.router.navigate("dm_Recycler/config", {trigger: true});'
	),
	'duplicate_config' => array(
		'duplicate_config',
		'Configure Duplicates Module',
		'Configure the Duplicates Module',
		'javascript:parent.SUGAR.App.router.navigate("dm_Duplicates/config", {trigger: true});'
	),
	'duplicate_rules' => array(
		'duplicate_rules',
		'Duplicate Rules',
		'Configure the Duplicates Rules for the Duplicates module',
		'javascript:parent.SUGAR.App.router.navigate("dm_DuplicateRules", {trigger: true});'
	)
);
$admin_group_header[] = array(
	'Data Manager',
	'',
	false,
	$admin_option_defs,
	'Manages settings in regards to the Data Manager package'
);