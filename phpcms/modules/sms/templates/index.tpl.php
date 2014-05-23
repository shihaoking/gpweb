<?php 
	defined('IN_ADMIN') or exit('No permission resources.');
	include $this->admin_tpl('header','admin');
?>
<div class="pad_10">
<div class="table-list">
<form name="smsform" action="" method="get" >
<input type="hidden" value="sms" name="m">
<input type="hidden" value="sms" name="c">
<input type="hidden" value="init" name="a">
<input type="hidden" value="<?php echo $_GET['menuid']?>" name="menuid">
<div class="explain-col search-form">
功能介绍：<br />
&nbsp;&nbsp;&nbsp;&nbsp;通过短信平台向已绑定手机的用户群发短信，即时通知公告、订单状态。<br />
&nbsp;&nbsp;&nbsp;&nbsp;用户注册、找回密码开启手机验证提高了网站的安全性。<br />
&nbsp;&nbsp;&nbsp;&nbsp;黄页商家会员可以通过短信平台管理订单信息。<br />
</div>
</form>
    <table width="100%" cellspacing="0">
        <thead>
            <tr>
            <th width="5%" align="center"><?php echo L('product_id')?></th>
            <th width="20%" align="left"><?php echo L('product_name')?></th>
            <th width="30%" align="left"><?php echo L('product_description')?></th>
            <th width="10%" align="left"><?php echo L('totalnum')?></th>
            <th width="10%" align="left"><?php echo L('give_away')?></th>
            <th width="10%" align="left"><?php echo L('product_price').L('yuan')?></th>
            <th width="10%" align="left"><?php echo L('buy')?></th>
            </tr>
        </thead>
    <tbody>

<?php if(is_array($smsprice_arr)) foreach($smsprice_arr as $k=>$v) {?>
	<tr>
	<td width="10%" align="center"><?php echo $v['productid']?></td>

	<td width="10%" align="left"><?php echo $v['name']?></td>
	<td width="10%" align="left"><?php echo $v['description']?></td>
	<td width="10%" align="left"><?php echo $v['totalnum']?></td>
	<td width="10%" align="left"><?php echo $v['give_away']?></td>
	<td width="10%" align="left"><?php echo $v['price']?></td>
	<td width="10%" align="left"><a href="<?php echo $this->smsapi->get_buyurl($v['productid']);?>" target="_blank"><?php echo L('buy')?></a></td>
	</tr>
<?php }?>
    </tbody>
    </table>

<div class="btn text-l">
<?php if(!empty($this->smsapi->userid)) {?>
<span class="font-fixh green"><?php echo L('account')?></span> ： <span class="font-fixh"><?php echo $this->smsapi->userid?></span> ， <span class="font-fixh green"><?php echo L('smsnumber')?></span> ： </span><span class="font-fixh"><?php echo $smsinfo_arr['surplus']?></span> <span class="font-fixh green"><?php echo L('item')?></span> ， <span class="font-fixh green"><?php echo L('iplimit')?></span> ： <span class="font-fixh"><?php if(empty($smsinfo_arr['allow_send_ip'])) {echo '未设置ip限制，建议到“<a href="http://sms.phpcms.cn/index.php?m=sms_service&c=center" target="_blank">短信通</a>”设置，多个服务器可绑定多个ip';} echo implode(' , ',$smsinfo_arr['allow_send_ip'])?></span> 

<?php } else {?>
<span class="font-fixh green">未绑定平台账户，请点击<a href="index.php?m=sms&c=sms&a=sms_setting&menuid=1539"><span class="font-fixh">平台设置</span></a>绑定。</span>
<?php }?>
</div>
<div class="btn text-l">
<span class="font-fixh green">当前服务器IP为 ： <span class="font-fixh"><?php echo $_SERVER["SERVER_ADDR"];?></span> <?php if(!empty($smsinfo_arr['allow_send_ip']) &&!in_array($_SERVER["SERVER_ADDR"],$smsinfo_arr['allow_send_ip'])) echo '当前服务器所在IP不允许发送短信';?>
</div>
 <div id="pages"></div>
</div>
</div>
</form>
</body>
</html>