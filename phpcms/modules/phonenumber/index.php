<?php
	defined('IN_PHPCMS') or exit('No permission resources.');

	class index{
		public $db;
		
		function __construct(){
			$this->db = pc_base::load_model('phonenumber_model');
		}
		
		public function init(){
			include template('phonenumber','add','default');
		}
		
		public function add(){
			if(isset($_POST['phonenumber'])){  
				$phonenumber = $_POST['phonenumber'];
				if(!preg_match('/\d{11}/', $phonenumber))
					echo "请输入正确的手机号！";
				else{
					$this->db->select("phone=$phonenumber");
					if($this->db->affected_rows() > 0)
						echo '您已经订阅过了！';
					else{
						$newDataId = $this->db->insert(array('phone'=>$phonenumber),1);
						echo '订阅成功！';
					}
				}
			}
		}
	}
?>