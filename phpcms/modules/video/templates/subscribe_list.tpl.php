<?php 
	defined('IN_ADMIN') or exit('No permission resources.');
	include $this->admin_tpl('header','admin');
?>
<div class="pad_10">
<div class="table-list">
<form name="searchform" id="searchform" action="" method="post" >
<input type="hidden" value="video" name="m">
<input type="hidden" value="video" name="c">
<input type="hidden" value="subscribe_list" name="a">
<input type="hidden" value="<?php echo $_GET['menuid']?>" name="menuid">
<div class="explain-col search-form">
<?php echo L('choose_channel');?><?php echo form::select($ku6_channels, $sub['channelid'], 'name="sub[channelid]" id="channelid"', L('please_choose_channel'))?> <?php echo L('subscribe_storage_section');?><?php echo $category_list;?>
 <?php echo L('subscribe_postions');?><span id="posid"></span>
<input type="submit" value=" <?php echo L('add');?> " class="button" name="dosubmit">
</div>
</form>
    <table width="100%" cellspacing="0">
        <thead>
            <tr>
            <th width="6%">ID</th>
            <th><?php echo L('channel');?></th>
            <th width="26%"><?php echo L('storage_cat');?></th>
            <th width="26%"><?php echo L('storage_pos');?></th>
            <th width="10%"><?php echo L('operations_manage')?></th>
            </tr>
        </thead>
    <tbody>
  <?php 
if(is_array($subscribes)){
	foreach($subscribes as $info){
?>   
	<tr>
	<td align="center"><?php echo $info['sid']?></td>
	<td align="center"><?php echo $info['channelid'];?> </td>
	<td align="center"><?php echo $CATEGORYS[$info['catid']]['catname'];?></td>
	<td align="center"><?php echo $position[$info['posid']]['name']?> </a>
	<td align="center"> 
 	<a href="javascript:confirmurl('index.php?m=video&c=video&a=sub_del&id=<?php echo $info['sid']?>&meunid=<?php echo $_GET['menuid']?>', '是否删除?')"><?php echo L('delete');?></a></td>
	</tr>
<?php 
	}
}
?>
    </tbody>
    </table>
<div class="btn text-r">

</div>
 <div id="pages"> <?php echo $pages?></div>
</div>
</div>
</form>
</body>
</html>
<script type="text/javascript">
<!--
function select_pos(obj) {
	var catid = obj.value;
	if (catid == 0) {
		return false;
	}
	var hash = '<?php echo $_GET['pc_hash']?>';
	$('#posid').html('<img src="<?php echo IMG_PATH.'msg_img/loading.gif';?>">');
	$.get("index.php", {m:'video', c:'video', a:'public_get_pos', catid:catid, tm:Math.random(), pc_hash:hash}, function (data) {
		if (data) {
			$('#posid').html(data);
		} else {
			alert('<?php echo L('check_choose_cat')?>');
		}
	} );
}

$('#searchform').submit(function (){
	if ($('#channelid').val()=='') {
		alert('<?php echo L('check_choose_cha_');?>');
		return false;
	}
	if ($('#catid').val()=='') {
		alert('<?php echo L('check_choose_cat_');?>');
		return false;
	} 
	return true;
});
//-->
</script>