<?php 
	defined('IN_PHPCMS') or exit('No permission resources.');
    pc_base::load_app_class('admin','admin',0);
	
	class download {
		private $db;
		
		function __construct(){
			$this->db = pc_base::load_model('phonenumber_model');
		}
		
		public function init(){
			$phones = $this->db->select();
			header("Content-type:application/vnd.ms-excel");
			header("Content-Disposition:filename=ÍøÕ¾¼ÇÂ¼ÊÖ»úºÅ.csv");
			$result = ' ';
			
			foreach($phones as $key=>$value){
				$result .= $value['phone']."\t\n";
			}
			echo $result;
		}
	}
?>