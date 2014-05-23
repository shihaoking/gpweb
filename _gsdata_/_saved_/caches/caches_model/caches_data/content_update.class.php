<?php
class content_update {
	var $modelid;
	var $fields;
	var $data;

    function __construct($modelid,$id) {
		$this->modelid = $modelid;
		$this->fields = getcache('model_field_'.$modelid,'model');
		$this->id = $id;
    }
	function update($data) {
		$info = array();
		$this->data = $data;
		foreach($data as $field=>$value) {
			if(!isset($this->fields[$field])) continue;
			$func = $this->fields[$field]['formtype'];
			$info[$field] = method_exists($this, $func) ? $this->$func($field, $value) : $value;
		}
	}
function editor($field, $value) {
	$attachment_db = pc_base::load_model('attachment_model');
	$attachment_db->api_update($GLOBALS['downloadfiles'],'c-'.$this->data['catid'].'-'.$this->id,1);

	return $value;
}	function posid($field, $value) {
		if(!empty($value) && is_array($value)) {
			if($_GET['a']=='add') {
				$position_data_db = pc_base::load_model('position_data_model');
				$textcontent = array();
				foreach($value as $r) {
					if($r!='-1') {
						if(empty($textcontent)) {
							foreach($this->fields AS $_key=>$_value) {
								if($_value['isposition']) {
									$textcontent[$_key] = $this->data[$_key];
								}
							}
							$textcontent = array2string($textcontent);
						}
						$thumb = $this->data['thumb'] ? 1 : 0;
						$position_data_db->insert(array('id'=>$this->id,'catid'=>$this->data['catid'],'posid'=>$r,'thumb'=>$thumb,'module'=>'content','modelid'=>$this->modelid,'data'=>$textcontent,'listorder'=>$this->id));
					}
				}
			} else {
				$posids = array();
				$catid = $this->data['catid'];
				$push_api = pc_base::load_app_class('push_api','admin');
				foreach($value as $r) {
					if($r!='-1') $posids[] = $r;
				}
				$textcontent = array();
				foreach($this->fields AS $_key=>$_value) {
					if($_value['isposition']) {
						$textcontent[$_key] = $this->data[$_key];
					}
				}
				//颜色选择为隐藏域 在这里进行取值
				$textcontent['style'] = $_POST['style_color'] ? strip_tags($_POST['style_color']) : '';
				$textcontent['inputtime'] = strtotime($textcontent['inputtime']);
				if($_POST['style_font_weight']) $textcontent['style'] = $textcontent['style'].';'.strip_tags($_POST['style_font_weight']);
				$push_api->position_update($this->id, $this->modelid, $catid, $posids, $textcontent,0);
			}
		}
	}
	
	function video($field, $value) {
		if ($value) {
			$value = $GLOBALS[$field];
		} else {
			return '';
		}
		$video_content_db = pc_base::load_model('video_content_model');
		//先获取目前contentid下面的videoid
		$result = $video_content_db->select(array('contentid'=>$this->id, 'modelid'=>$this->modelid), 'videoid');
		if (is_array($result)) {
			$video_arr = array();
			foreach ($result as $r) {
				$video_arr[] = $r['videoid'];
			}
		}
		if(!empty($value) && is_array($value)) {
			
			foreach ($value as $v) {
				if (!empty($video_arr) && !in_array($v['videoid'], $video_arr)) {
					$video_content_db->insert(array('contentid'=>$this->id, 'modelid'=>$this->modelid, 'videoid'=>$v['videoid'], 'listorder'=>$v['listorder']));
					$s_key = array_search($v['videoid'], $video_arr);
					unset($video_arr[$s_key]);
				} elseif (empty($video_arr)) {
					$video_content_db->insert(array('contentid'=>$this->id, 'modelid'=>$this->modelid, 'videoid'=>$v['videoid'], 'listorder' => $v['listorder']));
				} elseif (in_array($v['videoid'], $video_arr)) {
					$video_content_db->update(array('listorder'=>$v['listorder']), array('contentid'=>$this->id, 'modelid'=>$this->modelid, 'videoid'=>$v['videoid']));
					$s_key = array_search($v['videoid'], $video_arr);
					unset($video_arr[$s_key]);
				}
			}
			//删除需要删除的videoid
			if ($video_arr && !empty($video_arr)) {
				foreach ($video_arr as $dvid) {
					$video_content_db->delete(array('contentid'=>$this->id, 'modelid'=>$this->modelid, 'videoid'=>$dvid));
				}
 			}
		} elseif (!empty($video_arr) && is_array($video_arr)) {
			foreach ($video_arr as $dvid) {
				$video_content_db->delete(array('contentid'=>$this->id, 'modelid'=>$this->modelid, 'videoid'=>$dvid));
			}
		}
	}
 } 
?>