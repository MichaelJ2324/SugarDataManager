<?php

    if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    class RecycledLinksLogicHookController
	{

		function recycle($bean, $event, $arguments)
		{
			if (strpos($bean->module_name,"dm_")===0){
				return;
			}
			$config = dm_Recycler::config();
			if (in_array($bean->module_name,$config['recycler_modules'])||in_array($arguments['related_module'],$config['recycler_modules'])) {
				if (is_object($bean->$arguments['link'])) {
					$type         = $bean->$arguments['link']->getType();
					$side         = $bean->$arguments['link']->getSide();
					$rightSide    = array();
					$leftSide     = array();
					$relationship = $arguments['relationship'];
					$RelatedBean  = BeanFactory::getBean($arguments['related_module'], $arguments['related_id']);
					if ($type == 'many') {
						if ($side == 'RHS') {
							$rightSide['id']     = $bean->id;
							$rightSide['name']   = $bean->name;
							$rightSide['module'] = $bean->module_name;
							$leftSide['id']      = $arguments['related_id'];
							$leftSide['name']    = $RelatedBean->name;
							$leftSide['module']  = $arguments['related_module'];
						} else if ($side == 'LHS') {
							$rightSide['id']     = $arguments['related_id'];
							$rightSide['name']   = $RelatedBean->name;
							$rightSide['module'] = $arguments['related_module'];
							$leftSide['id']      = $bean->id;
							$leftSide['name']    = $bean->name;
							$leftSide['module']  = $bean->module_name;
						} else {
							$GLOBALS['log']->error("Unknown relationship was Side detected.");
						}
					} else {
						$Relationship = $bean->$arguments['link']->getRelationshipObject();
						$table        = $Relationship->__get("table");
						if ($table !== NULL) {
							if ($side == 'RHS') {
								$rightSide['id']     = $bean->id;
								$rightSide['name']   = $bean->name;
								$rightSide['module'] = $bean->module_name;
								$leftSide['id']      = $arguments['related_id'];
								$leftSide['name']    = $RelatedBean->name;
								$leftSide['module']  = $arguments['related_module'];
							} else if ($side == 'LHS') {
								$rightSide['id']     = $arguments['related_id'];
								$rightSide['name']   = $RelatedBean->name;
								$rightSide['module'] = $arguments['related_module'];
								$leftSide['id']      = $bean->id;
								$leftSide['name']    = $bean->name;
								$leftSide['module']  = $bean->module_name;
							} else {
								$GLOBALS['log']->error("Unknown relationship was Side detected.");
							}
						} else {
							$GLOBALS['log']->debug("No intermediary table found for relationship. Data is stored on module table, and therefore is not added as recycled relationship."
							);
						}
					}
					$RecycledRelationship = dm_RecycledLinks::retrieveRecycled($rightSide['id'],
																			   $relationship,
																			   $leftSide['id']
					);
					if (is_object($RecycledRelationship) && $RecycledRelationship !== FALSE) {
						if ($RecycledRelationship->restored == 1 || $RecycledRelationship->restored == TRUE) {
							$RecycledRelationship->restored = 0;
							if ($side == 'RHS') {
								$RecycledRelationship->right_name = $bean->name;
								$RecycledRelationship->left_name  = $RelatedBean->name;
							} else if ($side == 'LHS') {
								$RecycledRelationship->left_name  = $bean->name;
								$RecycledRelationship->right_name = $RelatedBean->name;
							}
							$RecycledRelationship->save();
						}
					} else {
						$RecycledRelationship = dm_RecycledLinks::recycleRelationship($rightSide,
																					  $relationship,
																					  $leftSide
						);
						$RecycledRecord       = dm_Recycler::retrieveRecycled($bean);
						if ($RecycledRecord !== FALSE) {
							$rel_name = 'dm_recycler_dm_recycledlinks';
							$RecycledRecord->load_relationship($rel_name);
							$RecycledRecord->$rel_name->add($RecycledRelationship->id);
						}
					}
				}
			}
		}

		function purge($bean,$event,$arguments){
			$config = dm_Recycler::config();
			if (in_array($bean->left_module,$config['purge_modules'])||in_array($bean->right_module,$config['purge_modules'])) {
				$bean->purge();
			}
		}
	}

?>