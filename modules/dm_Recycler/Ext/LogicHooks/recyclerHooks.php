<?php
$hook_array['after_delete'][] = Array(
	1,
	'Logichook to permanent delete record in Bean Module and Recycler',
	'modules/dm_Recycler/LogicHookConsumer.php',
	'RecyclerLogicHookController',
	'purge'
);