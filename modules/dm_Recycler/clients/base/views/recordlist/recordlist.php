<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$viewdefs['dm_Recycler']['base']['view']['recordlist'] = array(
	'favorite' => false,
	'following' => false,
	'sticky_resizable_columns' => true,
	'selection' => array(
		'type' => 'multi',
		'actions' => array(
			array(
				'name' => 'restore_button',
				'type' => 'button',
				'label' => 'LBL_RESTORE_BUTTON_LABEL',
				'primary' => true,
				'events' => array(
					'click' => 'list:massRestore:fire',
				),
				'acl_action' => 'edit',
			),
			array(
				'name' => 'restoreAll_button',
				'type' => 'button',
				'label' => 'LBL_RESTORE_ALL_BUTTON_LABEL',
				'primary' => true,
				'events' => array(
					'click' => 'list:massRestoreAll:fire',
				),
				'acl_action' => 'edit',
			),
			array(
				'name' => 'delete_button',
				'type' => 'button',
				'label' => 'LBL_DELETE_BUTTON_LABEL',
				'acl_action' => 'delete',
				'primary' => true,
				'events' => array(
					'click' => 'list:massdelete:fire',
				),
			),
			array(
				'name' => 'delete_button',
				'type' => 'button',
				'label' => 'LBL_DELETE_ALL_BUTTON_LABEL',
				'acl_action' => 'delete',
				'primary' => true,
				'events' => array(
					'click' => 'list:massDeleteAll:fire',
				),
			),
		),
	),
	'rowactions' => array(
		'actions' => array(
			array(
				'type' => 'rowaction',
				'css_class' => 'btn',
				'tooltip' => 'LBL_PREVIEW',
				'event' => 'list:preview:fire',
				'icon' => 'fa-eye',
				'acl_action' => 'view',
			),
			array(
				'type' => 'rowaction',
				'name' => 'restore_button',
				'label' => 'LBL_RESTORE_BUTTON_LABEL',
				'event' => 'list:restorerow:fire',
				'acl_action' => 'edit',
			),
			array(
				'type' => 'rowaction',
				'name' => 'restoreAll_button',
				'label' => 'LBL_RESTORE_ALL_BUTTON_LABEL',
				'event' => 'list:restoreAllrow:fire',
				'acl_action' => 'edit',
			),
			array(
				'type' => 'rowaction',
				'name' => 'delete_button',
				'event' => 'list:deleterow:fire',
				'label' => 'LBL_DELETE_BUTTON_LABEL',
				'acl_action' => 'delete',
			),
			array(
				'type' => 'rowaction',
				'name' => 'deleteAll_button',
				'event' => 'list:deleteAllrow:fire',
				'label' => 'LBL_DELETE_ALL_BUTTON_LABEL',
				'acl_action' => 'delete',
			),
		),
	),
	'last_state' => array(
		'id' => 'record-list',
	),
);
