<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin', 'admin', 0);
class index extends admin {
	private $config;
	public function __construct() {
		$this->config = getcache('cnzz', 'commons');
	}
	
	public function init() {
		if (empty($this->config)) {
			showmessage(L('reg_msg'));
		} else {
			$config =& $this->config;
			header('location:http://wss.cnzz.com/user/companion/phpcms_login.php?site_id='.$config['siteid'].'&password='.$config['password']);
		}
	}
	
	public function public_regcnzz() {
		if (empty($this->config)) {
			$key = md5(APP_PATH.'F0dkYYtw');
			if ($data = @file_get_contents('http://wss.cnzz.com/user/companion/phpcms.php?domain='.APP_PATH.'&key='.$key.'&cms=phpcms')) {
				//失败
				if (substr($data, 0, 1) == '-') {
					showmessage(L('application_fails'));
				} else {
					$data = explode('@', $data);
					$data['siteid'] = $data[0];
					$data['password'] = $data[1];
					unset($data[0], $data[1]);
					setcache('cnzz', $data, 'commons');
					showmessage(L('success'), '?m=cnzz&c=index&a=init');
				}
			} else {
				showmessage(L('donot_connect_server'));
			}
		} else {
			showmessage(L('has_been_registered'));
		}
	}
}