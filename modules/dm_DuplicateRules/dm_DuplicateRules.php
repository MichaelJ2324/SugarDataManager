<?PHP

class dm_DuplicateRules extends SugarBean {

	public $new_schema = true;
	public $module_dir = 'dm_DuplicateRules';
	public $object_name = 'dm_DuplicateRules';
	public $table_name = 'dm_duplicaterules';
	public $importable = false;
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
	public $field;

	/**
	 * This is a deprecated method, please start using __construct() as this
	 * method will be removed in a future version.
	 *
	 * @see __construct
	 * @deprecated
	 */
	public function dm_DuplicateRules(){
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