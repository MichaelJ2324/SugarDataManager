<?php
$manifest = array (
	'key' => 'DMV1JAN2015',
	'name' => 'Sugar Data Manager',
	'description' => 'Adds Recycle Bin, Data Pruning, and advanced Duplicate monitoring to SugarCRM',
	'author' => 'Michael Russell',
	'version' => '0.5',
	'is_uninstallable' => true,
	'published_date' => '2015-01-10 00:00:00',
	'type' => 'module',
	'acceptable_sugar_versions' => array (
		'regex_matches' => array(
			'7\.5\.*.*',
			'7\.6\.*.*',
			'7\.7\.*.*',
		),
	),
	'acceptable_sugar_flavors' => array(
		'PRO',
		'CORP',
		'ENT',
		'ULT'
	),
	'readme' => '',
  	'icon' => '',
	'remove_tables' => '',
);



$installdefs = array(
	'copy' => array(
		0 => array(
			'from' => '<basepath>/modules/dm_DataManager',
			'to' => 'modules/dm_DataManager',
		),
		1 => array(
			'from' => '<basepath>/modules/dm_DuplicateRules',
			'to' => 'modules/dm_DuplicateRules',
		),
		2 => array(
			'from' => '<basepath>/modules/dm_Duplicates',
			'to' => 'modules/dm_Duplicates',
		),
		3 => array(
			'from' => '<basepath>/modules/dm_RecycledLinks',
			'to' => 'modules/dm_RecycledLinks',
		),
		4 => array(
			'from' => '<basepath>/modules/dm_Recycler',
			'to' => 'modules/dm_Recycler',
		),
		5 => array(
			'from' => '<basepath>/custom/Extension/application/Ext/Include/DataManager.php',
			'to' => 'custom/Extension/application/Ext/Include/DataManager.php',
		),
		6 => array(
			'from' => '<basepath>/custom/Extension/application/Ext/Language/en_us.DataManager.php',
			'to' => 'custom/Extension/application/Ext/Language/en_us.DataManager.php',
		),
		7 => array(
			'from' => '<basepath>/custom/Extension/application/Ext/LogicHooks/DataManager.php',
			'to' => 'custom/Extension/application/Ext/LogicHooks/DataManager.php',
		),
		8 => array(
			'from' => '<basepath>/custom/Extension/application/Ext/TableDictionary/DataManager.php',
			'to' => 'custom/Extension/application/Ext/TableDictionary/DataManager.php',
		),
		9 => array(
			'from' => '<basepath>/custom/Extension/modules/Administration/Ext/Administration/DataManager.php',
			'to' => 'custom/Extension/modules/Administration/Ext/Administration/DataManager.php',
		),
		10 => array(
			'from' => '<basepath>/custom/Extension/modules/Schedulers/Ext/ScheduledTasks/DataManager.php',
			'to' => 'custom/Extension/modules/Schedulers/Ext/ScheduledTasks/DataManager.php',
		),
		11  => array(
			'from' => '<basepath>/custom/Extension/modules/Schedulers/Ext/Language/en_us.DataManager.php',
			'to' => 'custom/Extension/modules/Schedulers/Ext/Language/en_us.DataManager.php',
		),
	),
);