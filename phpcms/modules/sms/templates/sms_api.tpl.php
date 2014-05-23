<?php 
	defined('IN_ADMIN') or exit('No permission resources.');
	include $this->admin_tpl('header', 'admin');
?>
<form name="myform" action="?m=admin&c=position&a=listorder" method="post">
<div class="pad_10">
<div class="explain-col search-form">
短信平台API接口类：<br />
sms/classes/smsapi.class.php<br /><br />
初始化：<br />
__construct($userid = '', $productid = '', $sms_key = '')<br /><br />
获取短信产品列表信息：<br />
get_price()<br /><br />
获取短信剩余条数和限制短信发送的ip地址：<br />
get_smsinfo()<br /><br />
获取充值记录：<br />
get_buyhistory()<br /><br />
获取消费记录接口：<br />
get_payhistory($page=1);<br /><br />
发送短信接口：<br />
send_sms($mobile='', $content='', $send_time='', $charset='gbk')
<br /><br />
使用方法：<br />

pc_base::load_app_class('smsapi', '', 0); //引入smsapi类<br />

$userid = '199310'; //在phpcms官网注册的用户id<br />
$productid = '10';	//获取的产品id<br />
$sms_key = 'JSSJJjse123jj41x24jx87mzxvnio'; //获取的密钥<br />
$smsapi = new smsapi($userid, $productid, $sms_key); //初始化接口类<br />
$smsapi->get_price(); //获取短信剩余条数和限制短信发送的ip地址<br />
$mobile = array('13911711111', '13634503861', '15810233333');<br />
$content = '这是一条测试短信，短信最多255个字喔！';<br />
$sent_time = date('Y-m-d H:i:s',SYS_TIME);//定时发送格式为日期格式：2011-9-10 11:08:03<br />
$status = $smsapi->send_sms($mobile='', $content='', $send_time='', $charset='gbk'); //发送短信<br />
echo $status; //发送状态
</div>

</div>
</div>
</form>
</body>
</html>