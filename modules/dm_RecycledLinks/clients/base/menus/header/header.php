<?php

$moduleName = 'dm_RecycledLinks';
$viewdefs[$moduleName]['base']['menu']['header'] = array(
    array(
        'route' => "#$moduleName",
        'label' => 'LNK_LIST',
        'acl_action' => 'list',
        'acl_module' => $moduleName,
        'icon' => 'fa-bars',
    ),
);