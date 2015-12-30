<?php
// created: 2015-12-28 22:40:54
$viewdefs['dm_RecycledLinks']['base']['view']['subpanel-for-dm_recycler_dm_recycledlinks'] = array (
  'panels' => 
  array (
    0 => 
    array (
      'name' => 'panel_header',
      'label' => 'LBL_PANEL_1',
      'fields' => 
      array (
        0 => 
        array (
          'label' => 'LBL_NAME',
          'enabled' => true,
          'default' => true,
          'name' => 'name',
          'link' => true,
        ),
        1 => 
        array (
          'name' => 'relationship',
          'label' => 'LBL_RELATIONSHIP',
          'enabled' => true,
          'readonly' => true,
          'default' => true,
        ),
        2 => 
        array (
          'name' => 'related_id',
          'label' => 'LBL_BEAN_ID',
          'enabled' => true,
          'readonly' => true,
          'default' => true,
        ),
        3 => 
        array (
          'label' => 'LBL_DATE_MODIFIED',
          'enabled' => true,
          'default' => true,
          'name' => 'date_modified',
        ),
      ),
    ),
  ),
  'orderBy' => 
  array (
    'field' => 'date_modified',
    'direction' => 'desc',
  ),
  'type' => 'subpanel-list',
);