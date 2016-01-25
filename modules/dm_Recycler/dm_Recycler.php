<?PHP

class dm_Recycler extends SugarBean {

    public $new_schema = true;
    public $module_dir = 'dm_Recycler';
    public $object_name = 'dm_Recycler';
    public $table_name = 'dm_recycler';
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
    public $bean_module;
    public $bean_id;
    public $restored;
    public $restore_date;

    /**
     * This is a deprecated method, please start using __construct() as this
     * method will be removed in a future version.
     *
     * @see __construct
     * @deprecated
     */
    public function dm_Recycler(){
        $GLOBALS['log']->deprecated('Calls to dm_Recycler::dm_Recycler are deprecated.');
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
	public static function retrieveRecycled(SugarBean $bean){
        $query = new SugarQuery();
        $query->select(array('id'));
        $query->from(BeanFactory::getBean("dm_Recycler"));
        $query->where()->equals('bean_module',$bean->module_name);
        $query->where()->equals('bean_id',$bean->id);
        $query->where()->equals('deleted',0);
        $query->limit(1);
        $results = $query->execute();
        if (count($results)>0) {
            foreach ($results as $result) {
                return BeanFactory::getBean('dm_Recycler',$result['id']);
            }
        }
        return false;
	}
    public static function recycleBean(SugarBean $bean){
		$RecycledRecord              = new static();
		$RecycledRecord->name        = $bean->name;
		$RecycledRecord->bean_module = $bean->module_name;
		$RecycledRecord->bean_id     = $bean->id;
		$RecycledRecord->save();
		return $RecycledRecord;
    }

	public function restore(){
		$GLOBALS['log']->info("Restoring ".$this->bean_module." record: ".$this->bean_id);
        $ModuleBean = BeanFactory::retrieveBean($this->bean_module, $this->bean_id, array('disable_row_level_security' => true),false);
        if(!isset($ModuleBean)){
            $GLOBALS['log']->fatal("Recycler: Module bean not found! ".$this->bean_module." record: ".$this->bean_id);
            return false;
        }
		$ModuleBean->mark_undeleted($id);
        unset($ModuleBean);

        //All supported dbs have affected_rows, but lets check just to be sure
        if(isset($this->db->capabilities["affected_rows"]) && $this->db->capabilities["affected_rows"] == true){
            $ModuleBeanResult = $this->db->getAffectedRowCount();
        }else{
            $ModuleBeanResult = 1;
        }

        if($ModuleBeanResult > 0){
            $this->restored = true;
            $this->restore_date = gmdate('Y-m-d H:i:s');;
            $results = $this->save();

            if($results){
                return true;
            }else{
                $GLOBALS['log']->fatal("Recycler: Failed to update Recycler record. Record: ".$this->id);
                return false;
            }

        }else{
            $GLOBALS['log']->fatal("Recycler: Failed to undelete record. ".$this->bean_module." record: ".$this->bean_id);
            return false;
        }
		
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