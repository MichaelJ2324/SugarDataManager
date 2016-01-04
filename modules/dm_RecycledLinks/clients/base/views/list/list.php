<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


$module_name = 'dm_RecycledLinks';
$viewdefs[$module_name] = array (
	'base' => array (
		'view' => array (
			'list' => array (
				'panels' => array (
					0 => array (
						'label' => 'LBL_PANEL_1',
						'fields' => array (
							0 =>
							array (
								'name' => 'name',
								'label' => 'LBL_NAME',
								'default' => true,
								'enabled' => true,
								'link' => true,
							),
							1 =>
							array (
								'name' => 'right_module',
								'label' => 'LBL_RIGHT_MODULE',
								'enabled' => true,
								'readonly' => true,
								'default' => true,
							),
							2 =>
							array (
								'name' => 'right_id',
								'label' => 'LBL_RIGHT_ID',
								'enabled' => true,
								'readonly' => true,
								'default' => true,
							),
							3 =>
							array (
								'name' => 'relationship',
								'label' => 'LBL_RELATIONSHIP',
								'enabled' => true,
								'readonly' => true,
								'default' => true,
							),
							4 =>
							array (
								'name' => 'left_module',
								'label' => 'LBL_LEFT_MODULE',
								'enabled' => true,
								'readonly' => true,
								'default' => true,
							),
							5 =>
							array (
								'name' => 'left_id',
								'label' => 'LBL_LEFT_ID',
								'enabled' => true,
								'readonly' => true,
								'default' => true,
							),
							6 =>
							array (
								'name' => 'date_entered',
								'enabled' => true,
								'default' => true,
							),
							7 =>
							array (
								'name' => 'dm_recycler_dm_recycledlinks_name',
								'label' => 'LBL_DM_RECYCLER_DM_RECYCLEDLINKS_FROM_DM_RECYCLER_TITLE',
								'enabled' => true,
								'id' => 'DM_RECYCLER_ID',
								'link' => true,
								'sortable' => false,
								'default' => false,
							),
							8 =>
							array (
								'name' => 'left_name',
								'label' => 'LBL_LEFT_NAME',
								'enabled' => true,
								'readonly' => true,
								'default' => false,
							),
							9 =>
							array (
								'name' => 'restored',
								'label' => 'LBL_RESTORED',
								'enabled' => true,
								'readonly' => true,
								'default' => false,
							),
							10 => array (
								'name' => 'date_restored',
								'label' => 'LBL_DATE_RESTORED',
								'enabled' => true,
								'readonly' => true,
								'default' => false,
							),
							11 => array (
								'name' => 'right_name',
								'label' => 'LBL_RIGHT_NAME',
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