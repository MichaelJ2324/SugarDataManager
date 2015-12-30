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
    public $recycled_bean;
    public $relationship;
    public $related_module;
    public $related_id;
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

	public function restore(){
		$GLOBALS['log']->info("Restoring ".$this->bean_module." record: ".$this->bean_id);
        $ModuleBean = BeanFactory::retrieveBean($this->bean_module, $this->bean_id, array('disable_row_level_security' => true,'deleted'=>true));
		$ModuleBean->deleted = false;
        $ModuleBean->save();
        $this->restored = true;
		$this->restore_date = gmdate('Y-m-d H:i:s');;
        $this->save();
		unset($ModuleBean);
	}

    public function purge(){
        $GLOBALS['log']->info("Purging ".$this->bean_module." record: ".$this->bean_id);
        $ModuleBean = BeanFactory::retrieveBean($this->bean_module, $this->bean_id, array('disable_row_level_security' => true,'deleted'=>true));
        if (!($ModuleBean === null)){
            $this->db->query("DELETE FROM {$ModuleBean->table_name} WHERE id = '{$this->bean_id}'");
            $this->db->query("DELETE FROM {$this->table_name} WHERE id='{$this->id}'");
        }
        unset($ModuleBean);
    }
}