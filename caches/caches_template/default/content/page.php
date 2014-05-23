<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<div class="about">
	<div class="crumbs"><a href="<?php echo siteurl($siteid);?>" class="home_link">首页</a> > <span class="catname"><?php echo $CATEGORYS[$parentid]['catname'];?></span></div>
	<div class="nav-bar">
    	<ul class="inner_nav">
        	<?php $n=1;if(is_array($arrchild_arr)) foreach($arrchild_arr AS $cid) { ?>
                <li<?php if($catid==$cid) { ?> class="cur"<?php } ?>><a href="<?php echo $CATEGORYS[$cid]['url'];?>" <?php if($catid==$cid) { ?> class="active_linker"<?php } ?>><?php echo $CATEGORYS[$cid]['catname'];?></a></li>
			<?php $n++;}unset($n); ?>
        </ul>
        <div class="bottom"></div>
    </div>
  <div class="about-cnt">
    	<h2 class="title"><?php echo $title;?></h2>
        <div class="content">
        	    <?php echo $content;?>
        </div>
    </div>
 </div>
<?php include template("content","footer"); ?>