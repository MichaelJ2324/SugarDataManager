<?php
$viewdefs['dm_Recycler']['base']['layout']['config-drawer-content'] = array(
	'type' => 'config-drawer-content',
	'name' => 'config-drawer-content',
	'components' => array(
		array(
			'view' => 'config-system',
		),
		array(
			'view' => 'config-purge',
		)
	),
);