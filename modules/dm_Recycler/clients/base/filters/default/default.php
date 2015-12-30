<?php

$module_name = 'dm_Recycler';
$viewdefs[$module_name]['base']['filter']['default'] = array (
    'default_filter' => 'all_records',
    'fields' =>
        array (
            'name' =>
                array (
                ),
            'bean_module' =>
                array (
                ),
            'date_entered' =>
                array (
                ),
            'created_by_name' =>
                array (
                ),
            'date_restored' =>
                array (
                ),
            '$owner' =>
                array (
                    'predefined_filter' => true,
                    'vname' => 'LBL_CURRENT_USER_FILTER',
                ),
            '$favorite' =>
                array (
                    'predefined_filter' => true,
                    'vname' => 'LBL_FAVORITES_FILTER',
                ),
        ),
);
