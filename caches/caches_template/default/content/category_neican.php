<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0049)http://www.jzcf168.com/product/red/mulu.asp?cid=1 -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>价值内线A级版本</title>
<meta http-equiv="Page-Enter" content="revealTrans(duration=1, transition=0)">
<meta http-equiv="Page-Exit" content="revealTrans(duration=1, transition=5)">
<link type="text/css" rel="stylesheet" href="<?php echo CSS_PATH;?>neican/mulu.css">
</head>
<body>
<div class="ncall">
  <div class="nc img1">
    <div class="div4"><span>《价值内线》研究内容来源于市场公开数据，不具有应公开而未公开的情况，这里不确保所有投资项目百分之百赚钱</span></div>
    <div class="div5"><span>对使用本报告及其内容所引发的任<br>
      &nbsp;何直接或间接失，本公司（职员）及其关联机构不承担相关投资风险</span></div>
  </div>
  
  <div class="nc img2"></div>
  <div class="nc img3">

    <div class="div1"><img class="mulupng" src="<?php echo IMG_PATH;?>neican/mulu.png"></div>
    <div class="div2">
		<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=894824ec88c3701696ad9d879ede6b1d&action=category&catid=%24top_parentid&num=15&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$top_parentid,'siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'15',));}?>
      <ul class="mulu1">

			<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
			<li><a href="<?php echo $r['url'];?>" target="_blank"><?php echo $r['catname'];?></a></li>
			<?php $n++;}unset($n); ?>
      </ul>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </div>
    <div class="height20"></div>

  </div>
  <div class="nc img5"></div>
  <div class="nc img7"><div class="div7"></div></div>
  <div class="nc img6">
    <div class="div3">
      <p class="dianhua"></p>
    </div>
  </div>
</div>
</body></html>