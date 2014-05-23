<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>﻿<input type="text" id="phone" name="phone" value="请输入手机号"></input>
<input type="submit" class="phone_btn" value="提交" onclick="addPhone()"></input>
<script type="text/javascript">
	$(document).ready(function(){
		$('#phone').blur(function(){
			if($(this).val()=='') $(this).val('请输入手机号');
		});
		$('#phone').focus(function(){
			if($(this).val()=='请输入手机号') $(this).val('');
		});
	});
	function addPhone(){
		var phone = $('#phone').val();
		if(!/\d{11}/.test(phone))
			alert('请输入正确的手机号');
		else{
			$.post('/index.php?m=phonenumber&c=index&a=add',{phonenumber:phone},
				function(result){
					alert(result);
					$('#phone').val('请输入手机号');
				}
			);	
		}
	}
</script>
