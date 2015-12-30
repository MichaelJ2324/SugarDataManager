<?PHP

class dm_Duplicates extends SugarBean {

	public $new_schema = true;
	public $module_dir = 'dm_Duplicates';
	public $object_name = 'dm_Duplicates';
	public $table_name = 'dm_duplicates';
	public $importable = false;
	public $team_id;
	public $team_set_id;
	public $team_count;
	public $team_name;
	public $team_link;
	public $team_count_link;
	public $teams;
	public $assigned_user_id;
	public $assigned_user_name;
	public $assigned_user_link;
	public $id;
	public $name;
	public $date_entered;
	public $date_modified;
	public $modified_user_id;
	public $modified_by_name;
	public $created_by;
	public $created_by_name;
	public $deleted;
	public $created_by_link;
	public $modified_user_link;
	public $module;
	/**
	 * This is a deprecated method, please start using __construct() as this
	 * method will be removed in a future version.
	 *
	 * @see __construct
	 * @deprecated
	 */
	public function dm_Duplicates(){
		$GLOBALS['log']->deprecated('Calls to dm_DuplicateRules::dm_DuplicateRules are deprecated.');
		self::__construct();
	}

	public function __construct(){
		parent::__construct();
	}

	public function bean_implements($interface){
		switch($interface){
			case 'ACL': return true;
		}
		return false;
	}

	
}