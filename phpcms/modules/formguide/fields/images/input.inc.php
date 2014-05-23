	function images($field, $value) {
		//取得图片列表
		$pictures = $_POST[$field.'_url'];
		//取得图片说明
		$pictures_alt = $_POST[$field.'_alt'];
		$array = $temp = array();
		if(!empty($pictures)) {
			foreach($pictures as $key=>$pic) {
				$temp['url'] = $pic;
				$temp['alt'] = $pictures_alt[$key];
				$array[$key] = $temp;
			}
		}
		$array = array2string($array);
		return $array;
	}
