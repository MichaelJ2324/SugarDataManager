<?php
$manifest = array (
	'key' => 'DMV1JAN2016',
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
	'remove_tables' => 'prompt',
);



$installdefs = array(
	'id' => 'DataManager',
	'administration' => array(
		array(
			'from' => '<basepath>/custom/Extension/modules/Administration/Ext/Administration/DataManager.php'
		)
	),
	'beans' => array(
		array(
			'module' => 'dm_Recycler',
			'class' => 'dm_Recycler',
			'path' => 'modules/dm_Recycler/dm_Recycler.php',
			'tab' => true,
		),
		array(
			'module' => 'dm_RecycledLinks',
			'class' => 'dm_RecycledLinks',
			'path' => 'modules/dm_RecycledLinks/dm_RecycledLinks.php',
			'tab' => false,
		),
		array(
			'module' => 'dm_Duplicates',
			'class' => 'dm_Duplicates',
			'path' => 'modules/dm_Duplicates/dm_Duplicates.php',
			'tab' => true,
		),
		array(
			'module' => 'dm_DuplicateRules',
			'class' => 'dm_DuplicateRules',
			'path' => 'modules/dm_DuplicateRules/dm_DuplicateRules.php',
			'tab' => true,
		),
		array(
			'module' => 'dm_DedupeHashes',
			'class' => 'dm_DedupeHashes',
			'path' => 'modules/dm_DedupeHashes/dm_DedupeHashes.php',
			'tab' => false,
		)
	),
	'copy' => array(
		array(
				'from' => '<basepath>/modules/dm_DedupeHashes',
				'to' => 'modules/dm_DedupeHashes',
		),
		array(
			'from' => '<basepath>/modules/dm_DuplicateRules',
			'to' => 'modules/dm_DuplicateRules',
		),
		array(
			'from' => '<basepath>/modules/dm_Duplicates',
			'to' => 'modules/dm_Duplicates',
		),
		array(
			'from' => '<basepath>/modules/dm_RecycledLinks',
			'to' => 'modules/dm_RecycledLinks',
		),
		array(
			'from' => '<basepath>/modules/dm_Recycler',
			'to' => 'modules/dm_Recycler',
		),
	),
	'hookdefs' => array(
		array(
			'from' => '<basepath>/custom/Extension/application/Ext/LogicHooks/DataManager.php',
			'to_module' => 'application'
		)
	),
	'language' => array(
		array(
			'from' => '<basepath>/custom/Extension/modules/Schedulers/Ext/Language/en_us.DataManager.php',
			'to_module' => 'Schedulers',
			'language' => 'en_us'
		),
		array(
			'from' => '<basepath>/custom/Extension/application/Ext/Language/en_us.DataManager.php',
			'to_module' => 'application',
			'language' => 'en_us'
		)
	),
	'relationships' => array (
		array(
			'meta_data' => '<basepath>/custom/metadata/dm_duplicaterules_dm_duplicates.php'
		),
		array(
			'meta_data' => '<basepath>/custom/metadata/dm_recycler_dm_recycledlinks.php'
		)
	),
	'scheduledefs' => array(
		array(
			'from' => '<basepath>/custom/Extension/modules/Schedulers/Ext/ScheduledTasks/DataManager.php'
		)
	)
);