<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php if(!HTTP_REFERER || strpos(HTTP_REFERER,'&a=login')) @header("Location: ".$_GET['forward']); ?>
<style>
body{background:url(<?php echo IMG_PATH;?>head_box2.gif) no-repeat;height:30px; padding:0; margin:0}
.log{line-height:27px;height:30px; font-size:12px;text-align:center; }
.log .logined_lk{margin-left:10px}
#code_img{vertical-align: middle;}
form{color:white;margin-bottom:0;height:100%;*padding-top:3px}
input:-webkit-autofill {
        background-color:rgba(0, 0, 0, 0)
}
form input{ vertical-align:middle;}
form label{ vertical-align:middle}
form label{font-size:14px}
.input-text{background:url(<?php echo IMG_PATH;?>textbox.gif) no-repeat !important;text-indent: 3px;border: 0;width: 110px;height:22px}
.vali_code{background:#FAFFBD url(<?php echo IMG_PATH;?>textbox.gif) no-repeat ;height:22px;border: 0;width:60px;margin-right:5px}
.u_info{color:white}
.u_info strong{color:#E7E03C}
.u_info a{color:white}
</style>
<body>
<div class="log">
<div class="u_info">
<?php if($_username) { ?>
	<strong><?php echo get_nickname();?></strong>欢迎您<strong style="margin-left:10px"><?php echo $_groupname;?></strong>用户
	<!--
	<a class="logined_lk" href="<?php echo APP_PATH;?>index.php?m=member&siteid=<?php echo $siteid;?>" target="_blank"><?php echo L('member_center');?></a>-->
	<?php if($_groupid == 2) { ?>
		<a class="logined_lk" href="<?php echo $CATEGORYS['20']['url'];?>" target="_blank">查看<strong>[价值内线]</strong></a>
	<?php } elseif ($_groupid == 3) { ?>
		<a class="logined_lk" href="<?php echo $CATEGORYS['19']['url'];?>" target="_blank">查看<strong>[价值内线]</strong></a>
	<?php } elseif ($_groupid == 4) { ?>
		<a class="logined_lk" href="<?php echo $CATEGORYS['6']['url'];?>" target="_blank">查看<strong>[价值内线]</strong></a>
	<?php } ?>
	<a class="logined_lk" href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=logout&forward=<?php echo urlencode($_GET['forward']);?>&siteid=<?php echo $siteid;?>" target="_top"><?php echo L('logout');?></a>
	</div>
<?php } else { ?>
	<form method="post" action="<?php echo APP_PATH;?>index.php?m=member&c=index&a=login" id="myform" name="myform" target="_top">
		<input type="hidden" name="forward" id="forward" value="<?php if($_GET['forward']) { ?><?php echo $_GET['forward'];?><?php } else { ?><?php echo HTTP_REFERER;?><?php } ?>">
		<label>账 号</label><input type="text" id="username" name="username" class="input-text">
		<label>密 码</label><input type="password" id="password" name="password" class="input-text">
		<label>验 证</label><input type="text" id="code" name="code" class="vali_code"><?php echo form::checkcode('code_img', '4', '14', 75, 22);?>
		<input type="submit" name="dosubmit" id="dosubmit" style="margin-left:5px;width:49px;height:22px;border:none;background:url(<?php echo IMG_PATH;?>btn_login.gif)" value="">
	</form>
<?php } ?>
</div>
</body>