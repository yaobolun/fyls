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
.f{   
    width: 500px;  
    height: 15px;  
    overflow: hidden;  
    text-overflow: ellipsis;  
    white-space: nowrap;  
    cursor: pointer;  
}  
</style>
<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">资质凭证到账凭证申请详细信息</h2>
       <a href="/fyls/Admin/Qualifications/qualifications" class="fr top_rt_btn add_icon">返回资质凭证到账凭证申请列表</a>
      </div>
      <table class="table">
      <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><tr>
        <th>日期</th>
        <td class="center f" title="<?php echo ($arr["qualifications_date"]); ?>"><?php echo ($arr["qualifications_date"]); ?></td>
        <th>市场部客服</th>
        <td class="center f" title="<?php echo ($arr["qualifications_customer"]); ?>"><?php echo ($arr["qualifications_customer"]); ?></td>
        </tr>
        <tr>
        <th>申请人</th>
        <td class="center f" title="<?php echo ($arr["qualifications_applicant"]); ?>"><?php echo ($arr["qualifications_applicant"]); ?></td>
        <th>企业名称</th>
        <td class="center f" title="<?php echo ($arr["qualifications_enterprise"]); ?>"><?php echo ($arr["qualifications_enterprise"]); ?></td>
        </tr>
        <tr>
        <th>资质名称</th>
        <td class="center f" title="<?php echo ($arr["qualifications_aptitude"]); ?>"><?php echo ($arr["qualifications_aptitude"]); ?></td>
        <th>本次到账日期</th>
        <td class="center f" title="<?php echo ($arr["qualifications_arrival"]); ?>"><?php echo ($arr["qualifications_arrival"]); ?></td>
        </tr>
        <tr>
        <th>合同价格</th>
        <td class="center f" title="<?php echo ($arr["qualifications_contract"]); ?>"><?php echo ($arr["qualifications_contract"]); ?></td>
        <th>已到账金额</th>
        <td class="center f" title="<?php echo ($arr["qualifications_money"]); ?>"><?php echo ($arr["qualifications_money"]); ?></td>
        </tr>
        <tr>
        <th>到账账户</th>
        <td class="center f" title="<?php echo ($arr["qualifications_account"]); ?>"><?php echo ($arr["qualifications_account"]); ?></td>
        <th>本次到账金额</th>
        <td class="center f" title="<?php echo ($arr["qualifications_bmoney"]); ?>"><?php echo ($arr["qualifications_bmoney"]); ?></td>
        </tr>
        <tr>
        <th>公关费</th>
        <td class="center f" title="<?php echo ($arr["qualifications_relations"]); ?>"><?php echo ($arr["qualifications_relations"]); ?></td>
        <th>备注</th>
        <td class="center f" title="<?php echo ($arr["qualifications_remarks"]); ?>"><?php echo ($arr["qualifications_remarks"]); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      </table>
      <aside class="paging">
      <?php echo ($page); ?>
      </aside>
 </div>
</section>
</body>
</html>