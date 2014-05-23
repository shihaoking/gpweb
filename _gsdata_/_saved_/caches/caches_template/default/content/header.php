<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
<meta name="description" content="<?php echo $SEO['description'];?>">
<link href="<?php echo CSS_PATH;?>reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_PATH;?>default_blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>coin-slider.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>search_common.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>cookie.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>member_common.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>dialog.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>formvalidator.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>formvalidatorregex.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>dateutil.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.cycle.all.js" charset="UTF-8"></script>
</head>
<body onload="getNowDate();">
<div class="main_body">
<div class="header">
<div class="header-content">
<div class="body-top">
	<div class="header-logo"></div>
	<?php echo runhook('glogal_header')?>
	<script type="text/javascript">
		function save_username() {
			if($('#cookietime').attr('checked')==true) {
				var username = $('#username').val();
				setcookie('username', username, 3);
			} else {
				delcookie('username');
			}
			alert(getcookie('username'));
		}
		var username = getcookie('username');
		if(username != '' && username != null) {
			$('#username').val(username);
			$('#cookietime').attr('checked',true);
		}
		
		//顶部行情滚动
		$(document).ready(function(){
			$('#numero').cycle({ 
				fx:      'scrollDown', 
				speed:    600, 
				timeout:  2000 
			});
		});

	</script>
	<div class="time_auto">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody><tr>
                    <td><img src="<?php echo IMG_PATH;?>icon_clock.gif" width="15" height="16" align="absmiddle">GMT时间：<span id="refreshTimegmt">01:18:07</span></td>
                    <td><img src="<?php echo IMG_PATH;?>icon_clock.gif" width="15" height="16" align="absmiddle">北京时间：<span id="refreshTime">09:18:07</span></td>
                    <td><a href="#" onclick="addFavorite();" style="color:#e8bac0"><img src="<?php echo IMG_PATH;?>icon_star.gif" width="14" height="16" align="absmiddle">加入收藏</a></td>
                    <td><a href="#" onclick="setHomepage();" style="color:#e8bac0"><img src="<?php echo IMG_PATH;?>icon_home.gif" width="16" height="16" align="absmiddle">设为首页</a></td>
                    <td style="line-height:1.3em;" valign="bottom">中文简体</td>
            </tr>
			</tbody>
		</table>
	</div>
	<div class="login lh24 blue">
	<script type="text/javascript">document.write('<iframe src="<?php echo APP_PATH;?>index.php?m=member&c=index&a=mini&forward='+encodeURIComponent(location.href)+'&siteid=<?php echo get_siteid();?>" allowTransparency="true"  width="545" height="30" frameborder="0" scrolling="no"></iframe>')</script>
	</div>
</div>
<script type="text/javascript">
var requestServerName = ""
function addFavorite() {
	if(window.external) {
	      window.external.addFavorite("http://www.jdw2006.com", "简道网-恒生指数期货,股市行情,股指期货交易时间");
	}
	else if(window.sidebar) {
	      window.sidebar.addPanel("简道网-恒生指数期货,股市行情,股指期货交易时间", "http://www.cf1898.com", "");
	}
}
function setHomepage() {
	if(document.all) {
	    document.body.style.behavior='url(#default#homepage)';
		document.body.setHomePage("http://www.cf1898.com");
	}
	else if(window.sidebar) {
		if(window.netscape) {
	    	try {  
	        	netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");  
	     	}  
	     	catch (e) {  }
		} 
		var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components. interfaces.nsIPrefBranch);
		prefs.setCharPref('browser.startup.homepage', "http://www.cf1898.com");
	}
}
</script>
<div class="nav-bar">
	
    	<map>
    	<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b43f1459ac702900c8d44c91a5e796dd&action=category&catid=0&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
        	<ul class="nav-site">
			<li><a href="<?php echo siteurl($siteid);?>"><span>首页</span></a></li>
			<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
				<li class="line"></li>
				<li><a href="<?php echo $r['url'];?>"><span><?php echo $r['catname'];?></span></a></li>
			<?php $n++;}unset($n); ?>
            </ul>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		<?php echo runhook('glogal_menu')?>
        </map>
    </div> 
<div class="announcement">
    <div class="zenki"></div>
		<div id="numero" style="position: relative; overflow: hidden;">
            <ul style="position: absolute; top: 26px; left: 0px; z-index: 3; opacity: 1; display: none; width: 909px; height: 26px;">
	            <li>小型标准普尔期指1306</li>        
				<li class="yellow">1,560.75&nbsp;↓-2.00</li> 
	            <li>小型道琼期指1306</li>
	                    <li class="yellow">14,492.00&nbsp;↓-5.00</li> 
	                	<li>小型纳斯达克期指1306</li>
	                    <li class="yellow">2,810.25&nbsp;↓-0.75</li> 
	                	<li>法兰克福1306</li>
	                    <li class="green">7,840.50&nbsp;↑33.50</li>
			</ul>
            <ul style="position: absolute; top: 22.706296369710085px; left: 0px; display: block; z-index: 3; opacity: 1; width: 909px; height: 26px;">
	                	<li>金融时报1306</li>
	                    <li class="green">6,363.00&nbsp;↑32.00</li> 
	                	<li>印度Nifty期指1304</li>
	                    <li class="green">5,724.80&nbsp;↑48.95</li> 
	                	<li>台股期货1304</li>
	                    <li class="yellow">7,917.00&nbsp;↓-6.00</li>
	                	<li>黄金期货1306</li>
	                    <li class="green">1,598.80&nbsp;↑3.10</li>                  
            </ul>
            <ul style="position: absolute; top: -3.293703630289915px; left: 0px; display: block; z-index: 4; opacity: 1; width: 909px; height: 26px;">
	            <li>俄罗斯RTS股指期货1306</li>
	            <li class="green">141,200.00&nbsp;↑80.00</li> 
			</ul>
		</div> 
    </div>
</div>
</div>
<div class="main">
<div class="main_content">
<div class="main_right">
	<div class="box sshq">
		<iframe style="OVERFLOW: hidden" src="http://www.jzcf168.com/images/stock.htm" frameborder="no" width="299" scrolling="no" height="333"></iframe>
	</div>
	<div class="box cat-area spzz">
		<h5 class="title-1"><?php echo $CATEGORYS['7']['catname'];?><a href="<?php echo $CATEGORYS['7']['url'];?>" class="more">更多>></a></h5>
		<div class="content">
		   <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=671d64b69e85173ef4030fc3a2dd3968&action=lists&catid=15&num=10&order=inputtime+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'15','order'=>'inputtime DESC','limit'=>'10',));}?>
			<ul class="list lh24 f14">
				<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
				<li class="cjgc_li">
					<a href="<?php echo $v['url'];?>" target="_blank" title="<?php echo $v['title'];?>"<?php echo title_style($v[style]);?>>
						<?php echo str_cut($v['title'],130);?>
					</a>
				</li>
				<?php $n++;}unset($n); ?>
			</ul>
		   <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
	   </div>
	</div>
</div>
<div class="main_left">