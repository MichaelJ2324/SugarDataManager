<?PHP

class dm_DedupeHashes extends SugarBean {

	public $new_schema = true;
	public $module_dir = 'dm_DedupeHashes';
	public $object_name = 'dm_DedupeHashes';
	public $table_name = 'dm_dedupehashes';
	public $importable = false;
	public $id;
	public $bean_id;
	public $dm_duplicaterule_id;
	public $dm_duplicaterules_dm_dedupehashes;
	public $data_hash;

	/**
	 * This is a deprecated method, please start using __construct() as this
	 * method will be removed in a future version.
	 *
	 * @see __construct
	 * @deprecated
	 */
	public function dm_DedupeHashes(){
		$GLOBALS['log']->deprecated('Calls to dm_DedupeHashes::dm_DedupeHashes are deprecated.');
		self::__construct();
	}

	public function __construct(){
		parent::__construct();
	}

	public static function get(SugarBean $bean){
		$query = new SugarQuery();
		$query->from(BeanFactory::get('dm_DedupeHashes'));
		$query->select('id');
		$dupeRules = $query->join('dm_duplicaterules_dm_dedupehashes')->joinName();
		$query->where()->equals("$dupeRules.bean_module",$bean->module_name);
		$query->where()->equals("bean_id",$bean->id);
		$GLOBALS['log']->error("Getting Dedupe Hashes");
		$GLOBALS['log']->error($query->compileSQL());
		$results = $query->execute();
		return $results;
	}

	public static function hashValues(SugarBean $bean, array $values){

	}
	public static function deleteMany(array $hashes){
		foreach($hashes as $hash){
			if (array_key_exists("id",$hash)) {
				$Hash = new static();
				$Hash->id = $hash['id'];
				$Hash->delete();
			}
		}
	}


	public function bean_implements($interface){
		return false;
	}

	public function delete(){
		//TODO:: Duplicate IDs between modules should be accounted for. Hash stores module, so would need to cross join to Duplicate Rules for easiest verification.
		$query = "DELETE FROM dm_dedupehashes WHERE id = ".$this->id;
		$this->db->query($query);
	}
	
}