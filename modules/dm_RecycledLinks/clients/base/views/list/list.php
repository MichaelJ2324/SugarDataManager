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
