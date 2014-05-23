<?php
defined('IN_PHPCMS') or exit('No permission resources.');
//模型缓存路径
define('CACHE_MODEL_PATH',CACHE_PATH.'caches_model'.DIRECTORY_SEPARATOR.'caches_data'.DIRECTORY_SEPARATOR);

pc_base::load_app_func('util','content');
class tag {
	private $db;
	function __construct() {
		$this->db = pc_base::load_model('content_model');
	}
	/**
	 * 按照模型搜索
	 */
	public function init() {
		if(!isset($_GET['catid'])) showmessage(L('missing_part_parameters'));
		$catid = intval($_GET['catid']);
		$siteids = getcache('category_content','commons');
		$siteid = $siteids[$catid];
		$this->categorys = getcache('category_content_'.$siteid,'commons');
		if(!isset($this->categorys[$catid])) showmessage(L('missing_part_parameters'));
		if(isset($_GET['info']['catid']) && $_GET['info']['catid']) {
			$catid = intval($_GET['info']['catid']);
		} else {
			$_GET['info']['catid'] = 0;
		}
		if(isset($_GET['tag']) && trim($_GET['tag']) != '') {
			$tag = safe_replace(strip_tags($_GET['tag']));
		} else {
			showmessage(L('illegal_operation'));
		}
		$modelid = $this->categorys[$catid]['modelid'];
		$modelid = intval($modelid);
		if(!$modelid) showmessage(L('illegal_parameters'));
		$CATEGORYS = $this->categorys;

		$siteid = $this->categorys[$catid]['siteid'];
		$siteurl = siteurl($siteid);
		$this->db->set_model($modelid);
		$page = $_GET['page'];
		$datas = $infos = array();
		$infos = $this->db->listinfo("`status`=99 AND `keywords` LIKE '%$tag%'",'id DESC',$page,20);
		$total = $this->db->number;
		if($total>0) {
			$pages = $this->db->pages;
			foreach($infos as $_v) {
				if(strpos($_v['url'],'://')===false) $_v['url'] = $siteurl.$_v['url'];
				$datas[] = $_v;
			}
		}
		$SEO = seo($siteid, $catid, $tag);
		include template('content','tag');
	}
}
?>