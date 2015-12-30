<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once 'clients/base/api/ModuleApi.php';

class RecyclerAPI extends ModuleApi
{
	public function registerApiRest()
	{
		return array(
			'restore' => array(
				'reqType' => 'POST',
				'noLoginRequired' => false,
				'path' => array('Recycler', '?', 'restore'),
				'pathVars' => array('', 'id', ''),
				'method' => 'restore',
				'shortHelp' => 'Restores a Bean record',
				'longHelp' => 'modules/dm_Recycler/clients/base/api/help/restore.html',
			),
			'restoreAll' => array(
				'reqType' => 'POST',
				'noLoginRequired' => false,
				'path' => array('Recycler', '?', 'restoreAll'),
				'pathVars' => array('', 'id', ''),
				'method' => 'restoreAll',
				'shortHelp' => 'Restores a Bean record, and all relationships',
				'longHelp' => 'modules/dm_Recycler/clients/base/api/help/restoreAll.html',
			),
		);
	}

	/**
	 * Method to be used for my MyEndpoint/GetExample endpoint
	 */
	public function restore($api, $args)
	{
		//custom logic
		return $args;
	}
	public function restoreAll($api, $args)
	{
		//custom logic
		return $args;
	}

}

?>