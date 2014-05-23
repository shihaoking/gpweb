<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!--main-->
    <div id='coin-slider'>
	<a href="" target="_blank">
		<img src='<?php echo IMG_PATH;?>home_gallary/1.jpg' >
	</a>
	<a href="" target="_blank">
		<img src='<?php echo IMG_PATH;?>home_gallary/2.jpg' >
	</a>
	<a href="" target="_blank">
		<img src='<?php echo IMG_PATH;?>home_gallary/3.jpg' >
	</a>
	<a href="" target="_blank">
		<img src='<?php echo IMG_PATH;?>home_gallary/4.jpg' >
	</a>
	<a href="" target="_blank">
		<img src='<?php echo IMG_PATH;?>home_gallary/5.jpg' >
	</a>
    </div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#coin-slider').coinslider({width:690,height:300,links : false,navigation: true});
	});
</script>
    <div class="col-auto">
	    <!--<h5>财经观察</h5>-->
        <div class="box cat-area">
			   <h5 class="title-1"><?php echo $CATEGORYS['7']['catname'];?><a href="<?php echo $CATEGORYS['7']['url'];?>" class="more">更多>></a></h5>
             <div class="content">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=48704bf0d87f990ca8b8909366d25078&action=lists&catid=7&num=8&order=inputtime+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'7','order'=>'inputtime DESC','limit'=>'8',));}?>
						<ul class="list lh24 f14">
						<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
							<li class="cjgc_li">
							<a href="<?php echo $v['url'];?>" target="_blank" title="<?php echo $v['title'];?>"<?php echo title_style($v[style]);?>>
								<span class="tl"><?php echo str_cut($v['title'],130);?></span>
								<span class="it"><?php echo date('Y-m-d H:i:s',$v['inputtime']);?></span>
							</a>
							</li>
						<?php $n++;}unset($n); ?>
						</ul>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </div>
        </div>
    </div>
<div class="box blogroll ylink">
	<ul class="colli imgul">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"link\" data=\"op=link&tag_md5=80574ec69aa2a6c10ed30f7c49e0eda7&action=type_list&siteid=%24siteid&linktype=1&order=listorder+DESC&num=8&return=pic_link\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$link_tag = pc_base::load_app_class("link_tag", "link");if (method_exists($link_tag, 'type_list')) {$pic_link = $link_tag->type_list(array('siteid'=>$siteid,'linktype'=>'1','order'=>'listorder DESC','limit'=>'8',));}?>
        <?php $n=1;if(is_array($pic_link)) foreach($pic_link AS $v) { ?>
			<li><a href="<?php echo $v['url'];?>" title="<?php echo $v['name'];?>" target="_blank"><img src="<?php echo $v['logo'];?>" width="88" height="31" /></a></li>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </ul>

	<script type="text/javascript"> 
	$(function(){
		new slide("#main-slide","cur",310,260,1);//焦点图
		new SwapTab(".SwapTab","span",".tab-content","ul","fb");//排行TAB
	})
	</script>
</div>
<?php include template("content","footer"); ?>