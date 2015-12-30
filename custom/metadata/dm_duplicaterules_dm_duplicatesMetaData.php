<?php
// created: 2015-08-19 17:09:19
$dictionary["dm_duplicaterules_dm_duplicates"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'dm_duplicaterules_dm_duplicates' => 
    array (
      'lhs_module' => 'dm_Duplicates',
      'lhs_table' => 'dm_duplicates',
      'lhs_key' => 'id',
      'rhs_module' => 'dm_DuplicateRules',
      'rhs_table' => 'dm_duplicaterules',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'dm_duplicaterules_dm_duplicates_c',
      'join_key_lhs' => 'dm_duplicaterules_dm_duplicatesdm_duplicates_ida',
      'join_key_rhs' => 'dm_duplicaterules_dm_duplicatesdm_duplicaterules_idb',
    ),
  ),
  'table' => 'dm_duplicaterules_dm_duplicates_c',
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
      'name' => 'dm_duplicaterules_dm_duplicatesdm_duplicates_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'dm_duplicaterules_dm_duplicatesdm_duplicaterules_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'dm_duplicaterules_dm_duplicatesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'dm_duplicaterules_dm_duplicates_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'dm_duplicaterules_dm_duplicatesdm_duplicates_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'dm_duplicaterules_dm_duplicates_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'dm_duplicaterules_dm_duplicatesdm_duplicaterules_idb',
      ),
    ),
  ),
);