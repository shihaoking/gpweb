<?php
function sms_status($status = 0,$return_array = 0) {
	$array = array(
			'0'=>'发送成功',
			'1'=>'手机号码非法',
			'2'=>'用户存在于黑名单列表',
			'3'=>'接入用户名或密码错误',
			'4'=>'产品代码不存在',
			'5'=>'IP非法',
			'6 '=>'源号码错误',
			'7'=>'调用网关错误',
			'8'=>'消息长度超过60',
			'9'=>'发送短信内容参数为空',
			'10'=>'用户已主动暂停该业务',
			'11'=>'wap链接地址或域名非法',
			'-1'=>'当日发送短信数量超过限制 3 条',
			'-2'=>'手机号码错误',
			'-11'=>'帐号验证失败',
			'-10'=>'SNDA接口没有返回结果',
		);
	return $return_array ? $array : $array[$status];
}

function checkmobile($mobilephone) {
		$mobilephone = trim($mobilephone);
		if(preg_match("/^13[0-9]{1}[0-9]{8}$|15[01236789]{1}[0-9]{8}$|18[01236789]{1}[0-9]{8}$/",$mobilephone)){  
 			return  $mobilephone;
		} else {    
			return false;
		}
		
}