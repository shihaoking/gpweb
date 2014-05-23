<?php 
	defined('IN_ADMIN') or exit('No permission resources.');
	include $this->admin_tpl('header', 'admin');
?>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>formvalidator.js" charset="UTF-8"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>formvalidatorregex.js" charset="UTF-8"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>content_addtop.js"></script>
<script type="text/javascript">
  var charset = '<?php echo CHARSET?>';
  $(document).ready(function() {
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#mobile").formValidator({onshow:"<?php echo L('input').L('mobile')?>",onfocus:"<?php echo L('one_msg').L('mobile')?>"}).inputValidator({min:11,max:110000,onerror:"<?php echo L('one_msg').L('mobile')?>"});
  });
</script>
<div class="pad-10">

<form name="smsform" action="index.php?m=sms&c=sms&a=exportmobile" method="post" >
<table width="100%" cellspacing="0" class="search-form">
    <tbody>
		<tr>
		<td>
		<div class="explain-col">		
			<?php echo L('regtime')?>：
			<?php echo form::date('start_time', $start_time)?>-
			<?php echo form::date('end_time', $end_time)?>

			<?php echo form::select($modellist, $modelid, 'name="modelid"', L('member_model'))?>
			<?php echo form::select($grouplist, $groupid, 'name="groupid"', L('member_group'))?>
			<input type="submit" name="search" class="button" value="<?php echo L('exportmobile')?>" />
		</div>
		</td>
		</tr>
    </tbody>
</table>
</form>
<div class="common-form">
<form name="myform" action="?m=sms&c=sms&a=sms_sent" method="post" id="myform">
<table width="100%" class="table_form">

<tr>
<td width="120"><?php echo L('select_scene')?></td> 
<td>
<span id="scene">
<?php echo $smsscene_arr;?>

</span> 
</td>
</tr>

<tr>
<td width="120"><?php echo L('tpl_case')?></td> 
<td>
<ul id="tpl" class="tpl_style">
<?php echo $default_tpl;?> 
</ul> 
<input type="hidden" value="16" id="tplid" name="tplid">
</td>
</tr>

<tr>
<td width="120"><?php echo L('msg_content')?></td> 
<td>
<span id="tpl_case">
<?php echo $show_default_tpl;?> 
</span>  
</td>
</tr>

 
<tr>
<td width="120"><?php echo L('mobile')?></td> 
<td><textarea name="mobile" style="width:200px; height:100px" id="mobile"></textarea></td>
</tr>
<tr>
<tr>
<td width="120"><?php echo L('sendtime')?></td> 
<td>
<?php echo form::date('sendtime', date('Y-m-d H:i:s', SYS_TIME), 1)?>
</td>
</tr>
</table>

<div class="btn text-l">
	<input name="dosubmit" type="submit" value="<?php echo L('submit')?>" class="button" id="dosubmit" onclick="check();return true;">
	<?php echo L('sms_remind')?>
</div>
<div class="bk15"></div>

</form>
</div>
<script language="JavaScript">
<!--
//检查短信参数情况
function check(){
	$("input[name='msg[]']").keyup();
}

//选择短信模版
function select_tpl(obj) {
	var sceneid = obj.value;
	if (sceneid == 0) {
		return false;
	}
  	//$('#tpl_tr').show();
 	$('#tpl').html('<img src="<?php echo IMG_PATH.'msg_img/loading.gif';?>">');
	$.get("index.php", {m:'sms', c:'sms', a:'public_get_tpl', sceneid:sceneid, tm:Math.random()}, function (data) {
		if (data) {
			$('#tpl').html(data);
		} else {
			alert('<?php echo L('检查选择的场景！')?>');
		}
	} );
}
//显示短信模版效果
function show_tpl(id) {
	var tplid = id;
	if (tplid == 0) {
		return false;
	}
	$("[name='tplarray[]']").removeClass();
	$('#tpl_'+id).attr('class','ac');
	$('#tplid').val(id);
  	$('#tpl_case').html('<img src="<?php echo IMG_PATH.'msg_img/loading.gif';?>">');
	$.get("index.php", {m:'sms', c:'sms', a:'public_show_tpl', tplid:tplid, tm:Math.random()}, function (data) {
		if (data) {
			$('#tpl_case').html(data);
		} else {
			alert('<?php echo L('检查选择的短信模版！')?>');
		}
	} );
}

function checkWord(len,evt){
   if(evt==null)
   evt = window.event;
   var src = evt.srcElement? evt.srcElement : evt.target;
   var str=src.value.trim();
   myLen=0;
   i=0;
   for(;(i<str.length)&&(myLen<=len);i++){
  //  if(str.charCodeAt(i)>0&&str.charCodeAt(i)<128)
     myLen++;
    // else
     //myLen+=2;
   }
   if(myLen>len){
    alert("您输入超过限定长度");
    src.value=str.substring(0,i-1);
	return false;
   }
}
//-->
</script>
</body>
</html>