<?php
class AdminExportLimit extends phplistPlugin
{
  public $name = "AdminExportLimit file plugin for phpList.";
  public $coderoot = '';
  public $version = "2.1";
  public $authors = 'nthanhsang';
  public $enabled = 1;
  public $description = 'backup file admin.php connect.php export.php in admin directory';
  private $numcriterias = 1;
  public $file_admin="admin.php";
  public $file_export="export.php";
  public $file_connect="connect.php";
  public $file_users="users.php";
  public $file_home="home.php";
  public $file_admins="admins.php";
  public $file_adminattributes="adminattributes.php";
  public $file_members="members.php";
 //test update phplist plugins v2..
  public $settings = array(
    "simpleattributeselect_numcriterias" => array (
      'value' => 2,
      'description' => 'copy file',
      'type' => "integer",
      'allowempty' => 0,
      'min' => 1,
      'max' => 10,
      'category'=> 'segmentation',
    )
  );

  function __construct() {

	parent::__construct();
  } 
  function initialise() {	
	file_put_contents("test.log", "active:", FILE_APPEND);
	//error_log("active");
	if (file_exists(dirname(dirname(__FILE__))."/".$this->file_admin)){
		$this->bak_copy_file($this->file_admin); 
	}
	if (file_exists(dirname(dirname(__FILE__))."/".$this->file_export)){
		$this->bak_copy_file($this->file_export);
	}
	if (file_exists(dirname(dirname(__FILE__))."/".$this->file_connect)){
		$this->bak_copy_file($this->file_connect);
	}
	if (file_exists(dirname(dirname(__FILE__))."/".$this->file_users)){
		$this->bak_copy_file($this->file_users);
	}
	if (file_exists(dirname(dirname(__FILE__))."/".$this->file_home)){
		$this->bak_copy_file($this->file_home);
	}
	if (file_exists(dirname(dirname(__FILE__))."/".$this->file_admins)){
		$this->bak_copy_file($this->file_admins);
	}
	if (file_exists(dirname(dirname(__FILE__))."/".$this->file_adminattributes)){
		$this->bak_copy_file($this->file_adminattributes);
	}
	if (file_exists(dirname(dirname(__FILE__))."/".$this->file_members)){
		$this->bak_copy_file($this->file_members);
	}
	
	if (file_exists(dirname(__FILE__)."/bak_file/".$this->file_admin)){
		$this->bak_copy_file($this->file_admin,1);
	}
	if (file_exists(dirname(__FILE__)."/bak_file/".$this->file_export)){
		$this->bak_copy_file($this->file_export,1);
	}
	if (file_exists(dirname(__FILE__)."/bak_file/".$this->file_connect)){
		$this->bak_copy_file($this->file_connect,1);
	}
	if (file_exists(dirname(__FILE__)."/bak_file/".$this->file_users)){
		
		$this->bak_copy_file($this->file_users,1);
		
	}
	
	if (file_exists(dirname(__FILE__)."/bak_file/".$this->file_home)){
		
		$this->bak_copy_file($this->file_home,1);
		
	}
	if (file_exists(dirname(__FILE__)."/bak_file/".$this->file_admins)){
		
		$this->bak_copy_file($this->file_admins,1);
		
	}
	if (file_exists(dirname(__FILE__)."/bak_file/".$this->file_adminattributes)){
		
		$this->bak_copy_file($this->file_adminattributes,1);
		
	}
	if (file_exists(dirname(__FILE__)."/bak_file/".$this->file_members)){
		
		$this->bak_copy_file($this->file_members,1);
		
	}
	
	parent::initialise();
  } 
function activate(){
	
	if($_GET['disable']){
		file_put_contents("test.log", "deactive:", FILE_APPEND);
		//error_log("deactivate");
		if (file_exists(dirname(dirname(__FILE__))."/".$this->file_admin.".bak-plugin")){
			$this->bak_copy_file($this->file_admin,2);
		}
		if (file_exists(dirname(dirname(__FILE__))."/".$this->file_export.".bak-plugin")){
			$this->bak_copy_file($this->file_export,2);
		}
		if (file_exists(dirname(dirname(__FILE__))."/".$this->file_connect.".bak-plugin")){
			$this->bak_copy_file($this->file_connect,2);
		}
		if (file_exists(dirname(dirname(__FILE__))."/".$this->file_users.".bak-plugin")){
			$this->bak_copy_file($this->file_users,2);
		}
		
		if (file_exists(dirname(dirname(__FILE__))."/".$this->file_home.".bak-plugin")){
			$this->bak_copy_file($this->file_home,2);
		}
		if (file_exists(dirname(dirname(__FILE__))."/".$this->file_admins.".bak-plugin")){
			$this->bak_copy_file($this->file_admins,2);
		}
		if (file_exists(dirname(dirname(__FILE__))."/".$this->file_adminattributes.".bak-plugin")){
			$this->bak_copy_file($this->file_adminattributes,2);
		}
		if (file_exists(dirname(dirname(__FILE__))."/".$this->file_members.".bak-plugin")){
			$this->bak_copy_file($this->file_members,2);
		}
		
	}
}
function upgrade($previous) {
    $this->initialise();
    return true;
  }	
public function bak_copy_file($file,$check){
	$file_des;
	$file_source;
	if($check ==1){
		$file_source=dirname(__FILE__)."/bak_file/".$file;
		$file_des=dirname(dirname(__FILE__))."/".$file;
	}
	else if($check ==2){
		$file_source=dirname(dirname(__FILE__))."/".$file.".bak-plugin";
		$file_des=dirname(dirname(__FILE__))."/".$file;
	}
	else{
		$file_source=dirname(dirname(__FILE__))."/".$file;
		$file_des=$file_source.".bak-plugin";
	}
	copy($file_source, $file_des); 
}
 
}
?>
