<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once 'clients/base/api/ModuleApi.php';

class RecyclerApi extends ModuleApi
{
	public function registerApiRest()
	{
		return array(
			'restore' => array(
				'reqType' => 'PUT',
				'noLoginRequired' => false,
				'path' => array('Recycler', '?'),
				'pathVars' => array('', 'id'),
				'method' => 'restore',
				'shortHelp' => 'Restores a Bean record',
				'longHelp' => 'modules/dm_Recycler/clients/base/api/help/restore.html',
			),
			'restoreAll' => array(
				'reqType' => 'PUT',
				'noLoginRequired' => false,
				'path' => array('Recycler', '?', 'all'),
				'pathVars' => array('', 'id', ''),
				'method' => 'restoreAll',
				'shortHelp' => 'Restores a Bean record, and all relationships',
				'longHelp' => 'modules/dm_Recycler/clients/base/api/help/restoreAll.html',
			),
			'delete' => array(
				'reqType' => 'DELETE',
				'noLoginRequired' => false,
				'path' => array('Recycler', '?'),
				'pathVars' => array('', 'id', ''),
				'method' => 'delete',
				'shortHelp' => 'Restores a Bean record, and all relationships',
				'longHelp' => 'modules/dm_Recycler/clients/base/api/help/restoreAll.html',
			),
			'deleteAll' => array(
				'reqType' => 'DELETE',
				'noLoginRequired' => false,
				'path' => array('Recycler', '?', 'all'),
				'pathVars' => array('', 'id', ''),
				'method' => 'deleteAll',
				'shortHelp' => 'Restores a Bean record, and all relationships',
				'longHelp' => 'modules/dm_Recycler/clients/base/api/help/restoreAll.html',
			),
			'massRestore' => array(
				'reqType' => 'PUT',
				'noLoginRequired' => false,
				'path' => array('Recycler', 'MassUpdate'),
				'pathVars' => array('', 'id', ''),
				'method' => 'restoreAll',
				'shortHelp' => 'Restores a Bean record, and all relationships',
				'longHelp' => 'modules/dm_Recycler/clients/base/api/help/massRestore.html',
			),
			'massDelete' => array(
				'reqType' => 'DELETE',
				'noLoginRequired' => false,
				'path' => array('Recycler', 'MassUpdate'),
				'pathVars' => array('', ''),
				'method' => 'massDelete',
				'shortHelp' => 'Restores a Bean record, and all relationships',
				'longHelp' => 'modules/dm_Recycler/clients/base/api/help/massDelete.html',
			)
		);
	}

	/**
	 * Restore should merely look for Restore property to be set on the model. Restored is the boolean field to be checked after restore is complete, but simply set Restore (no d) on the model and pass it to the standard PUT request for Recycler module.
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
	public function delete($api,$args){
		//custom logic
		return $args;
	}
	public function deleteAll($api,$args){
		//custom logic
		return $args;
	}
	public function massRestore($api,$args){
		//custom logic
		return $args;
	}
	public function massDelete($api,$args){
		//custom logic
		return $args;
	}
}

?>