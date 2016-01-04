<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once 'clients/base/api/ModuleApi.php';

class RecycledLinksAPI extends ModuleApi
{
	public function registerApiRest()
	{
		return array(
			'restore' => array(
				'reqType' => 'POST',
				'noLoginRequired' => false,
				'path' => array('RecycledLinks', '?'),
				'pathVars' => array('', 'id'),
				'method' => 'restore',
				'shortHelp' => 'Restores a Relationship record from the database',
				'longHelp' => 'modules/dm_RecycledLinks/clients/base/api/help/restore.html',
			),
			'delete' => array(
				'reqType' => 'DELETE',
				'noLoginRequired' => false,
				'path' => array('RecycledLinks', '?'),
				'pathVars' => array('', 'id'),
				'method' => 'delete',
				'shortHelp' => 'Permanently Deletes a relationship record from the database',
				'longHelp' => 'modules/dm_RecycledLinks/clients/base/api/help/delete.html',
			),
		);
	}

	//TODO: restore = 1 must be passed in update
	public function restore($api, $args)
	{
		//custom logic
		return $args;
	}
	public function delete($api, $args)
	{
		//custom logic
		return $args;
	}

}