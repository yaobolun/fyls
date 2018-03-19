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
.d{   
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
       <h2 class="fl">转账申请详细信息</h2>
       <a href="/fyls/Admin/Transfer/transfer" class="fr top_rt_btn add_icon">返回转账列表</a>
      </div>
      <table class="table">
      <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><tr>
        <th>申请人</th>
        <td class="center d" title="<?php echo ($arr["arrival_applicant"]); ?>"><?php echo ($arr["arrival_applicant"]); ?></td>
        <th>到账公司账号</th>
        <td class="center d" title="<?php echo ($arr["arrival_account"]); ?>"><?php echo ($arr["arrival_account"]); ?></td>
        </tr>
        <tr>
        <th>到账时间</th>
        <td class="center d" title="<?php echo ($arr["arrival_time"]); ?>"><?php echo ($arr["arrival_time"]); ?></td>
        <th>到账金额</th>
        <td class="center d" title="<?php echo ($arr["arrival_money"]); ?>"><?php echo ($arr["arrival_money"]); ?></td>
        </tr>
        <tr>
        <th>已付金额</th>
        <td class="center d" title="<?php echo ($arr["arrival_paid"]); ?>"><?php echo ($arr["arrival_paid"]); ?></td>
        <th>合同价格</th>
        <td class="center d" title="<?php echo ($arr["arrival_contract"]); ?>"><?php echo ($arr["arrival_contract"]); ?></td>
        </tr>
        <tr>
        <th>配备企业</th>
        <td class="center d" title="<?php echo ($arr["arrival_equip"]); ?>"><?php echo ($arr["arrival_equip"]); ?></td>
        <th>备注</th>
        <td class="center d" title="<?php echo ($arr["arrival_remarks"]); ?>"><?php echo ($arr["arrival_remarks"]); ?></td>
        </tr>
        <tr>
        <th>企业价格</th>
        <td class="center d" title="<?php echo ($arr["arrival_enterprise"]); ?>"><?php echo ($arr["arrival_enterprise"]); ?></td>
        <th>签约年限</th>
        <td class="center d" title="<?php echo ($arr["arrival_contrac"]); ?>"><?php echo ($arr["arrival_contrac"]); ?></td>
        </tr>
        <tr>
        <th>配备人才</th>
        <td class="center d" title="<?php echo ($arr["arrival_qualified"]); ?>"><?php echo ($arr["arrival_qualified"]); ?></td>
        <th>级别</th>
        <td class="center d" title="<?php echo ($arr["arrival_level"]); ?>"><?php echo ($arr["arrival_level"]); ?></td>
        </tr>
        <tr>
        <th>专业</th>
        <td class="center d" title="<?php echo ($arr["arrival_major"]); ?>"><?php echo ($arr["arrival_major"]); ?></td>
        <th>人才价格</th>
        <td class="center d" title="<?php echo ($arr["arrival_talent"]); ?>"><?php echo ($arr["arrival_talent"]); ?></td>
        </tr>
        <tr>
        <th>客服</th>
        <td class="center d" title="<?php echo ($arr["arrival_customer"]); ?>"><?php echo ($arr["arrival_customer"]); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      </table>
      <aside class="paging">
      <?php echo ($page); ?>
      </aside>
 </div>
</section>
</body>
</html>