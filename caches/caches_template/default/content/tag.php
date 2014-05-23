<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!--main-->
<div class="main">
	<div class="col-left">
    	<div class="crumbs"><a href="<?php echo siteurl($siteid);?>">首页</a><span> > </span><?php echo catpos($catid);?> 标签：<font color="red"><?php echo $tag;?></font> 总共有 <?php echo $total;?> 条记录</div>
        <ul class="list lh24 f14">
<?php $n=1;if(is_array($datas)) foreach($datas AS $r) { ?>
	<li><span class="rt"><?php echo date('Y-m-d H:i:s',$r[inputtime]);?></span>·<a href="<?php echo $r['url'];?>" target="_blank"<?php echo title_style($r[style]);?>><?php echo $r['title'];?></a></li>
	<?php if($n%5==0) { ?><li class="bk20 hr"></li><?php } ?>
<?php $n++;}unset($n); ?>
        </ul>
        <div id="pages" class="text-c"><?php echo $pages;?></div>
  </div>
    <div class="col-auto">
        <div class="box">
            <h5 class="title-2">频道总排行</h5>
             <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=3ce0c92850ba1ffd809f82f2a88eb97a&action=hits&catid=%24catid&num=10&order=views+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'hits')) {$data = $content_tag->hits(array('catid'=>$catid,'order'=>'views DESC','limit'=>'10',));}?>
            <ul class="content digg">
				<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
					<li><a href="<?php echo $r['url'];?>" target="_blank"><?php echo $r['title'];?></a></li>
				<?php $n++;}unset($n); ?>
            </ul>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </div>
       
    </div>
</div>
<?php include template("content","footer"); ?>