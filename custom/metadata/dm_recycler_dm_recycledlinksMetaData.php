<?php
// created: 2015-12-28 20:24:22
$dictionary["dm_recycler_dm_recycledlinks"] = array (
    'true_relationship_type' => 'one-to-many',
    'from_studio' => true,
    'relationships' =>
        array (
            'dm_recycler_dm_recycledlinks' =>
                array (
                    'lhs_module' => 'dm_Recycler',
                    'lhs_table' => 'dm_recycler',
                    'lhs_key' => 'id',
                    'rhs_module' => 'dm_RecycledLinks',
                    'rhs_table' => 'dm_recycledlinks',
                    'rhs_key' => 'id',
                    'relationship_type' => 'many-to-many',
                    'join_table' => 'dm_recycler_dm_recycledlinks',
                    'join_key_lhs' => 'dm_recycler_id',
                    'join_key_rhs' => 'dm_recycledlinks_id',
                ),
        ),
    'table' => 'dm_recycler_dm_recycledlinks',
    'fields' =>
        array (
            0 =>
                array (
                    'name' => 'id',
                    'type' => 'varchar',
                    'len' => 36,
                ),
            1 =>
                array (
                    'name' => 'date_modified',
                    'type' => 'datetime',
                ),
            2 =>
                array (
                    'name' => 'deleted',
                    'type' => 'bool',
                    'len' => '1',
                    'default' => '0',
                    'required' => true,
                ),
            3 =>
                array (
                    'name' => 'dm_recycler_id',
                    'type' => 'varchar',
                    'len' => 36,
                ),
            4 =>
                array (
                    'name' => 'dm_recycledlinks_id',
                    'type' => 'varchar',
                    'len' => 36,
                ),
        ),
    'indices' =>
        array (
            0 =>
                array (
                    'name' => 'dm_recycler_dm_recycledlinks_pk',
                    'type' => 'primary',
                    'fields' =>
                        array (
                            0 => 'id',
                        ),
                ),
            1 =>
                array (
                    'name' => 'dm_recycler_dm_recycledlinks_id',
                    'type' => 'index',
                    'fields' =>
                        array (
                            0 => 'dm_recycler_id',
                        ),
                ),
            2 =>
                array (
                    'name' => 'dm_recycler_dm_recycledlinks_alt',
                    'type' => 'alternate_key',
                    'fields' =>
                        array (
                            0 => 'dm_recycledlinks_id',
                        ),
                ),
        ),
);