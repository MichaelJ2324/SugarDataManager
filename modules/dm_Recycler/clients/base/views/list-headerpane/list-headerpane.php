<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


$viewdefs['base']['view']['list-headerpane'] = array(
	'template' => 'headerpane',
	'buttons' => array(
		array(
			'name'    => 'config_button',
			'type'    => 'button',
			'label'   => 'LBL_CONFIG_BUTTON_LABEL',
			'css_class' => 'btn-primary',
			'acl_action' => 'admin',
			'route' => array(
				'action'=>'configure'
			)
		),
		array(
			'name' => 'sidebar_toggle',
			'type' => 'sidebartoggle',
		),
	),
);
