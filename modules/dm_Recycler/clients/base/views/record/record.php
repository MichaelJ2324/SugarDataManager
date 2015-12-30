<?php
$module_name = 'dm_Recycler';
$viewdefs[$module_name]['base']['view']['record'] = array(
    'buttons' => array(
        array(
            'type' => 'rowaction',
            'event' => 'button:preview_button:click',
            'name' => 'preview_button',
            'label' => 'LBL_PREVIEW_BUTTON',
            'acl_action' => 'view',
            'showOn' => 'view',
            'css_class' => 'btn',
        ),
        array(
            'type' => 'actiondropdown',
            'name' => 'restore_dropdown',
            'primary' => true,
            'showOn' => 'view',
            'buttons' => array(
                array(
                    'type' => 'rowaction',
                    'event' => 'button:restore_button:click',
                    'name' => 'restore_button',
                    'label' => 'LBL_RESTORE_BUTTON_LABEL',
                    'acl_action' => 'edit',
                ),
                array(
                    'type' => 'rowaction',
                    'event' => 'button:restoreAll_button:click',
                    'name' => 'restoreAll_button',
                    'label' => 'LBL_RESTORE_ALL_BUTTON_LABEL',
                    'acl_action' => 'edit',
                ),
            ),
        ),
        array(
            'type' => 'actiondropdown',
            'name' => 'delete_dropdown',
            'primary' => true,
            'showOn' => 'view',
            'buttons' => array(
                array(
                    'type' => 'rowaction',
                    'event' => 'button:delete_button:click',
                    'name' => 'delete_button',
                    'label' => 'LBL_DELETE_BUTTON_LABEL',
                    'acl_action' => 'delete',
                ),
                array(
                    'type' => 'rowaction',
                    'event' => 'button:deleteAll_button:click',
                    'name' => 'deleteAll_button',
                    'label' => 'LBL_DELETE_ALL_BUTTON_LABEL',
                    'acl_action' => 'delete',
                ),
            ),
        ),
        array(
            'name' => 'sidebar_toggle',
            'type' => 'sidebartoggle',
        ),
    ),
    'panels' =>
        array (
          0 => 
          array (
            'name' => 'panel_header',
            'label' => 'LBL_RECORD_HEADER',
            'header' => true,
            'fields' => 
            array (
              0 => 
              array (
                'name' => 'picture',
                'type' => 'avatar',
                'width' => 42,
                'height' => 42,
                'dismiss_label' => true,
                'readonly' => true,
              ),
              1 => 'name',
            ),
          ),
          1 => 
          array (
            'name' => 'panel_body',
            'label' => 'LBL_RECORD_BODY',
            'columns' => 2,
            'labelsOnTop' => true,
            'placeholders' => true,
            'newTab' => false,
            'panelDefault' => 'expanded',
            'fields' => 
            array (
              0 => 
              array (
                'name' => 'bean_module',
                'readonly' => true,
                'label' => 'LBL_BEAN_MODULE',
              ),
              1 => 
              array (
                'name' => 'bean_id',
                'studio' => true,
                'readonly' => true,
                'label' => 'LBL_BEAN_ID',
              ),
              2 => 
              array (
                'name' => 'date_entered_by',
                'readonly' => true,
                'inline' => true,
                'type' => 'fieldset',
                'label' => 'LBL_DATE_ENTERED',
                'fields' => 
                array (
                  0 => 
                  array (
                    'name' => 'date_entered',
                  ),
                  1 => 
                  array (
                    'type' => 'label',
                    'default_value' => 'LBL_BY',
                  ),
                  2 => 
                  array (
                    'name' => 'created_by_name',
                  ),
                ),
                'span' => 6,
              ),
              3 => array (
                  'name' => 'date_restored',
                  'comment' => 'Date record was restored',
                  'studio' => true,
                  'readonly' => true,
                  'label' => 'LBL_DATE_RESTORED',
                  'span' => 6,
              ),
            ),
          ),
          2 => 
          array (
            'newTab' => false,
            'name' => 'panel_hidden',
            'label' => 'LBL_SHOW_MORE',
            'hide' => true,
            'columns' => 2,
            'labelsOnTop' => true,
            'placeholders' => true,
            'fields' => 
            array (
              0 => 'assigned_user_name',
              1 => 'team_name',
              2 => 
              array (
                'name' => 'date_modified_by',
                'readonly' => true,
                'inline' => true,
                'type' => 'fieldset',
                'label' => 'LBL_DATE_MODIFIED',
                'fields' => 
                array (
                  0 => 
                  array (
                    'name' => 'date_modified',
                  ),
                  1 => 
                  array (
                    'type' => 'label',
                    'default_value' => 'LBL_BY',
                  ),
                  2 => 
                  array (
                    'name' => 'modified_by_name',
                  ),
                ),
                'span' => 12,
              ),
            ),
          ),
        ),
    'templateMeta' =>
        array (
          'useTabs' => false,
        ),
  );
