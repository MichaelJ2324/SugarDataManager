<?php
$hook_array['before_delete'][] = Array(
	1,
	'Logichook to register deleted record in the Recycler module',
	'modules/dm_Recycler/LogicHookConsumer.php',
	'RecyclerLogicHookController',
	'recycle'
);
$hook_array['before_relationship_delete'][] = Array(
	1,
	'Logichook to register deleted relationship in the Recycler module',
	'modules/dm_RecycledLinks/LogicHookConsumer.php',
	'RecycledLinksLogicHookController',
	'recycle'
);