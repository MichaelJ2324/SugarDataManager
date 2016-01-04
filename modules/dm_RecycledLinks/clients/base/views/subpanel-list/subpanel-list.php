<?php
/*
 * Your installation or use of this SugarCRM file is subject to the applicable
 * terms available at
 * http://support.sugarcrm.com/06_Customer_Center/10_Master_Subscription_Agreements/.
 * If you do not agree to all of the applicable terms or do not have the
 * authority to bind the entity as an authorized representative, then do not
 * install or use this SugarCRM file.
 *
 * Copyright (C) SugarCRM Inc. All rights reserved.
 */
$module_name = 'dm_RecycledLinks';
$viewdefs[$module_name]['base']['view']['subpanel-list'] = array(
  'panels' =>
      array (
          0 =>
              array (
                  'name' => 'panel_header',
                  'label' => 'LBL_PANEL_1',
                  'fields' => array (
					  0 =>
						  array (
							  'label' => 'LBL_NAME',
							  'enabled' => true,
							  'default' => true,
							  'name' => 'name',
							  'link' => true,
						  ),
					  1 =>
						  array (
							  'name' => 'right_name',
							  'label' => 'LBL_RIGHT_NAME',
							  'enabled' => true,
							  'readonly' => true,
							  'default' => true,
						  ),
					  2 =>
						  array (
							  'name' => 'relationship',
							  'label' => 'LBL_RELATIONSHIP',
							  'enabled' => true,
							  'readonly' => true,
							  'default' => true,
						  ),
					  3 =>
						  array (
							  'name' => 'left_name',
							  'label' => 'LBL_LEFT_NAME',
							  'enabled' => true,
							  'readonly' => true,
							  'default' => true,
						  ),
					  4 =>
						  array (
							  'name' => 'date_entered',
							  'label' => 'LBL_DATE_ENTERED',
							  'enabled' => true,
							  'readonly' => true,
							  'default' => true,
						  ),
					  5 =>
						  array (
							  'name' => 'date_restored',
							  'label' => 'LBL_DATE_RESTORED',
							  'enabled' => true,
							  'readonly' => true,
							  'default' => true,
						  ),
					  6 =>
						  array (
							  'name' => 'restored',
							  'label' => 'LBL_RESTORED',
							  'enabled' => true,
							  'readonly' => true,
							  'default' => true,
						  ),
				  ),
              ),
      ),
    'orderBy' => array(
        'field' => 'date_modified',
        'direction' => 'desc',
    ),
);
