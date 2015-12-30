<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$module_name = 'dm_Recycler';
$viewdefs[$module_name] = array (
	'base' => array (
		'view' => array (
			'list' => array (
				'panels' => array (
					0 => array (
					'label' => 'LBL_PANEL_1',
					'fields' => array (
						0 => array (
							'name' => 'bean_module',
							'label' => 'LBL_BEAN_MODULE',
							'default' => true,
							'enabled' => true,
						),
						1 => array (
							'name' => 'name',
							'label' => 'LBL_NAME',
							'default' => true,
							'enabled' => true,
							'link' => true,
						),
						2 => array (
							'name' => 'bean_id',
							'label' => 'LBL_BEAN_id',
							'default' => true,
							'enabled' => true,
						),
						3 => array (
							'name' => 'date_entered',
							'enabled' => true,
							'default' => true,
						),
						4 => array (
							'name' => 'created_by_name',
							'label' => 'LBL_CREATED',
							'enabled' => true,
							'readonly' => true,
							'id' => 'CREATED_BY',
							'link' => true,
							'default' => true,
						),
						5 => array (
							'name' => 'restored',
							'label' => 'LBL_RESTORED',
							'enabled' => true,
							'readonly' => true,
							'default' => false,
						),
						6 => array (
							'name' => 'date_modified',
							'label' => 'LBL_DATE_MODIFIED',
							'enabled' => true,
							'readonly' => true,
							'default' => false,
						),
						7 => array (
							'name' => 'modified_by_name',
							'label' => 'LBL_MODIFIED',
							'enabled' => true,
							'readonly' => true,
							'id' => 'MODIFIED_USER_ID',
							'link' => true,
							'default' => false,
						),
						8 => array (
							'name' => 'date_restored',
							'label' => 'LBL_DATE_RESTORED',
							'enabled' => true,
							'readonly' => true,
							'default' => false,
						),
					),
				),
			),
			'orderBy' => array (
					'field' => 'date_entered',
					'direction' => 'desc',
				),
			),
		),
	),
);
