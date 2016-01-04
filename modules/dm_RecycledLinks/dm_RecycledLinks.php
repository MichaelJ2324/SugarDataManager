<?PHP

class dm_RecycledLinks extends SugarBean {

    public $new_schema = true;
    public $module_dir = 'dm_RecycledLinks';
    public $object_name = 'dm_RecycledLinks';
    public $table_name = 'dm_recycledlinks';
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
    public $right_module;
	public $right_id;
	public $right_name;
    public $relationship;
	public $left_module;
	public $left_id;
	public $left_name;
    public $restored;
    public $restore_date;

    /**
     * This is a deprecated method, please start using __construct() as this
     * method will be removed in a future version.
     *
     * @see __construct
     * @deprecated
     */
    public function dm_RecycledLinks(){
        $GLOBALS['log']->deprecated('Calls to dm_RecycledLinks::dm_RecycledLinks are deprecated.');
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

    public static function retrieveRecycled($right_id, $relationship, $left_id){
        $query = new SugarQuery();
        $query->select(array('id'));
        $query->from(BeanFactory::getBean("dm_RecycledLinks"));
        $query->where()->equals('right_id',$right_id);
        $query->where()->equals('relatiomship',$relationship);
        $query->where()->equals('left_id',$left_id);
        $query->where()->equals('deleted',0);
        $query->limit(1);
        $results = $query->execute();
        if (count($results)>0) {
            foreach ($results as $result) {
                return BeanFactory::getBean('dm_RecycledLinks',$result['id']);
            }
        }
        return false;
    }
    public static function recycleRelationship($rightSide, $relationship, $leftSide){
		$right = array();
		$left = array();
		if (is_object($rightSide)){
			if ($rightSide instanceof SugarBean){
				$right['id'] = $rightSide->id;
				$right['module'] = $rightSide->module_name;
				$right['name'] = $rightSide->name;
			}else{
				$GLOBALS['log']->fatal("Unidentified Object passed to RecycleRelationship for RightSide. Class passed was of type ".get_class($leftSide));
				return false;
			}
		}else if (is_array($rightSide)){
			if (!(array_key_exists('id',$rightSide)&&
				array_key_exists('module',$rightSide))){
				$GLOBALS['log']->fatal("RightSide array passed, does not contain proper data attributes.");
				return false;
			}
			$right = $rightSide;
		}else{
			$GLOBALS['log']->fatal("RightSide must be either SugarBean or Array for RecycleRelationship.");
		}
		if (is_object($leftSide)){
			if ($leftSide instanceof SugarBean){
				$left['id'] = $leftSide->id;
				$left['module'] = $leftSide->module_name;
				$left['name'] = $leftSide->name;
			}else{
				$GLOBALS['log']->fatal("Unidentified Object passed to RecycleRelationship for LeftSide. Class passed was of type ".get_class($leftSide));
				return false;
			}
		}else if (is_array($leftSide)){
			if (!(array_key_exists('id',$leftSide)&&
				array_key_exists('module',$leftSide))){
				$GLOBALS['log']->fatal("LeftSide array passed, does not contain proper data attributes.");
				return false;
			}
			$left = $leftSide;
		}else {
			$GLOBALS['log']->fatal("LeftSide must be either SugarBean or Array for RecycleRelationship.");
		}
		$RecycledRelationship           	= new static();
        $RecycledRelationship->relationship	= $relationship;
        $RecycledRelationship->right_id		= $right['id'];
        $RecycledRelationship->right_module = $right['module'];
        $RecycledRelationship->right_name	= $right['name'];
        $RecycledRelationship->left_id	  	= $left['id'];
		$RecycledRelationship->left_module 	= $left['module'];
		$RecycledRelationship->left_name	= $left['name'];
        $RecycledRelationship->save();
		return $RecycledRelationship;
    }

	public function restore(){
		$GLOBALS['log']->info("Restoring ".$this->bean_module." record: ".$this->bean_id);
	}

    public function purge(){
        $GLOBALS['log']->info("Purging ".$this->bean_module." record: ".$this->bean_id);

    }
}