<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>网站后台</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="/fyls/Public/admin/css/style.css">
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
<script src="/fyls/Public/admin/js/jquery.js"></script>
<script src="/fyls/Public/admin/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script>

	(function($){
		$(window).load(function(){
			
			$("a[rel='load-content']").click(function(e){
				e.preventDefault();
				var url=$(this).attr("href");
				$.get(url,function(data){
					$(".content .mCSB_container").append(data); //load new content inside .mCSB_container
					//scroll-to appended content 
					$(".content").mCustomScrollbar("scrollTo","h2:last");
				});
			});
			
			$(".content").delegate("a[href='top']","click",function(e){
				e.preventDefault();
				$(".content").mCustomScrollbar("scrollTo",$(this).attr("href"));
			});
			
		});
	})(jQuery);
</script>
</head>
<body>
<!--header-->
<header>
 <h1><img src="/fyls/Public/admin/images/admin_logo.png"/></h1>
 <ul class="rt_nav">
  <li><a href="/fyls/index.php/" target="_blank" class="website_icon">站点首页</a></li>
  <li><a href="/fyls/admin.php/Index/tc" class="quit_icon">安全退出</a></li>
 </ul>
</header>
<!--aside nav-->
<!--aside nav-->
<aside class="lt_aside_nav content mCustomScrollbar">
  
 <ul>
  <li>
   <dl>
    <dt>财务管理</dt>
    <!--当前链接则添加class:active-->
    <dd><a href="/fyls/admin.php/Transfer/transfer">转账申请列表</a></dd>
    <dd><a href="/fyls/admin.php/Arrival/arrival">到账申请列表</a></dd>
    <dd><a href="/fyls/admin.php/Qualifications/qualifications">资质凭证到账凭证申请列表</a></dd>
    <dd><a href="/fyls/admin.php/Refund/refund">退款企业凭证申请列表</a></dd>
    <dd><a href="/fyls/admin.php/Voucher/voucher">退款人才凭证申请列表</a></dd>
   </dl>
  </li>
  <li>
   <p class="btm_infor">© 小牛在线 技术支持</p>
  </li>
 </ul>
</aside>

<style type="text/css">
.ccc{   
    overflow: hidden;  
    text-overflow: ellipsis;  
    white-space: nowrap;  
    cursor: pointer;  
}  
</style>
<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">退款人才凭证申请列表</h2>
       <a href="/fyls/Admin/Voucher/voucher_add" class="fr top_rt_btn add_icon">添加退款人才凭证申请</a>
      </div>
      <table class="table">
        <tr>
        <th>申请人</th>
        <th>本次到账日期</th>
        <th>配备企业</th>
        <th>合同价格</th>
        <th>到账金额</th>
        <th>操作</th>
       </tr>
       <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><tr>
        <td class="center ccc" title="<?php echo ($arr["voucher_applicant"]); ?>"><?php echo ($arr["voucher_applicant"]); ?></td>
        <td class="center ccc" title="<?php echo ($arr["voucher_account"]); ?>"><?php echo ($arr["voucher_account"]); ?></td>
        <td class="center ccc" title="<?php echo ($arr["voucher_equip"]); ?>"><?php echo ($arr["voucher_equip"]); ?></td>
        <td class="center ccc" title="<?php echo ($arr["voucher_contract"]); ?>"><?php echo ($arr["voucher_contract"]); ?></td>
        <td class="center ccc" title="<?php echo ($arr["voucher_contract"]); ?>"><?php echo ($arr["voucher_contract"]); ?></td>
        <td class="center">
        <a href="/fyls/Admin/Voucher/voucher_mod?id=<?php echo ($arr["id"]); ?>" title="编辑" class="link_icon">&#101;</a>
        <a href="/fyls/Admin/Voucher/del?id=<?php echo ($arr["id"]); ?>" title="删除" class="link_icon">&#100;</a>
        <a href="/fyls/Admin/Voucher/info?id=<?php echo ($arr["id"]); ?>" title="详细信息">详细信息</a>
       </td>
       </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      </table>
      <aside class="paging">
      <?php echo ($page); ?>
      </aside>
 </div>
</section>
</body>
</html>