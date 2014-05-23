<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<div class="news_list">
    <div class="crumbs"><a href="<?php echo siteurl($siteid);?>" class="home_link">首页</a> > <span class="catname"><?php echo $catname;?></span></div>
    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=5ab4b05e97fd14c3ed386604ee1a9399&action=lists&catid=%24catid&num=25&order=id+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 25;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
        <ul class="list lh24 f14">
			<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
				<li><span class="rt"><?php echo date('Y-m-d H:i:s',$r[inputtime]);?></span><a href="<?php echo $r['url'];?>" target="_blank"<?php echo title_style($r[style]);?>><?php echo $r['title'];?></a></li>
			<?php $n++;}unset($n); ?>
        </ul>
    <div id="pages" class="text-c"><?php echo $pages;?></div>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
</div>
<?php include template("content","footer"); ?>