<?php

$app_list_strings['moduleList']['dm_Recycler'] = 'Recycle Bin';
$app_list_strings['moduleList']['dm_RecycledLinks'] = 'Recycled Relationships';
$app_list_strings['moduleList']['dm_Duplicates'] = 'Duplicates';
$app_list_strings['moduleList']['dm_DuplicateRules'] = 'Duplicate Rules';
$app_list_strings['moduleListSingular']['dm_Recycler'] = 'Recycled Record';
$app_list_strings['moduleListSingular']['dm_Duplicates'] = 'Duplicate Record';
$app_list_strings['moduleListSingular']['dm_DuplicateRules'] = 'Duplicate Rule';
$app_list_strings['moduleListSingular']['dm_RecycledLinks'] = 'Recycled Relationship';

$app_list_strings['dm_conf_owner'] = array(
	'user' => 'Specified User',
	'created' => 'Copy Record\'s Created User',
	'manager_created' => 'Copy Record\'s Created User\'s Manager',
	'assigned' => 'Copy Record\'s Assigned User',
	'manager_assigned' => 'Copy Record\'s Assigned User\'s Manager'
);
$app_list_strings['dm_conf_team'] = array(
	'user' => 'Specified Teams',
	'created' => 'Copy Record\'s Teams'
);
$app_list_strings['dm_ignored_modules'] = array(
		'Home' => 'Home',
		'Calendar',
		'Currencies',
		'WebLogicHooks',
		'Forecasts',
		'ForecastWorksheets',
		'ForecastManagerWorksheets',
		'MergeRecords',
		'Quotas',
		'Teams',
		'TeamNotices',
		'Manufacturers',
		'Activities',
		'Comments',
		'Subscriptions',
		'Feeds',
		'iFrames',
		'TimePeriods',
		'TaxRates',
		'ContractTypes',
		'Schedulers',
		'CampaignLog',
		'CampaignTrackers',
		'DocumentRevisions',
		'Connectors',
		'Roles',
		'Notifications',
		'Sync',
		'ReportMaker',
		'DataSets',
		'CustomQueries',
		'pmse_Inbox',
		'pmse_Project',
		'pmse_Business_Rules',
		'pmse_Emails_Templates',
		'WorkFlow',
		'Worksheet',
		'Users',
		'Employees',
		'Administration',
		'ACLRoles',
		'Releases',
		'Queues',
		'SNIP',
		'SavedSearch',
		'UpgradeWizard',
		'Trackers',
		'TrackerPerfs',
		'TrackerSessions',
		'TrackerQueries',
		'FAQ',
		'Newsletters',
		'KBDocuments',
		'SugarFavorites',
		'Sugar_Favorites',
		'PdfManager',
		'OAuthKeys',
		'OAuthTokens',
		'Filters',
		'UserSignatures',
		'Shippers',
		'Styleguide',
		'Feedbacks',
		'dm_Recycler',
		'dm_RecycledLinks',
		'dm_Duplicates',
		'dm_DuplicateRules',
		'Words',
		'Library',
		'EmailAddresses',
		'InboundEmail',
		'EAPM',
);
$dm_moduleList = array();
foreach($app_list_strings['moduleList'] as $moduleKey => $moduleName){
	if (!in_array($moduleKey,$app_list_strings['dm_ignored_modules'])){
		$dm_moduleList[$moduleKey] = $moduleName;
	}
}
ksort($dm_ModuleList);
$app_list_strings['dm_moduleList'] = $dm_moduleList;

$app_strings['LBL_DM_DATAMANAGER_ENABLED_MODULES'] = 'Enabled Modules';
$app_strings['LBL_DM_DATAMANAGER_DEFAULT_OWNER_TYPE'] = 'Default Owner Setup';
$app_strings['LBL_DM_DATAMANAGER_DEFAULT_TEAM_TYPE'] = 'Default Team Setup';
$app_strings['LBL_DM_DATAMANAGER_PURGE_AFTER_DAYS'] = 'Purge Data After <i>X</i> Days';