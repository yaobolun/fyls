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
.dd{   
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
       <h2 class="fl">退款凭证申请详细信息</h2>
       <a href="/fyls/Admin/Refund/refund" class="fr top_rt_btn add_icon">返回退款凭证申请列表</a>
      </div>
      <table class="table">
      <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><tr>
        <th>申请人</th>
        <td class="center dd" title="<?php echo ($arr["refund_applicant"]); ?>"><?php echo ($arr["refund_applicant"]); ?></td>
        <th>配出年月</th>
        <td class="center dd" title="<?php echo ($arr["refund_match"]); ?>"><?php echo ($arr["refund_match"]); ?></td>
        </tr>
        <tr>
        <th>配备企业</th>
        <td class="center dd" title="<?php echo ($arr["refund_equip"]); ?>"><?php echo ($arr["refund_equip"]); ?></td>
        <th>合同价格</th>
        <td class="center dd" title="<?php echo ($arr["refund_contract"]); ?>"><?php echo ($arr["refund_contract"]); ?></td>
        </tr>
        <tr>
        <th>备注</th>
        <td class="center dd" title="<?php echo ($arr["refund_remarks"]); ?>"><?php echo ($arr["refund_remarks"]); ?></td>
        <th>已到账金额</th>
        <td class="center dd" title="<?php echo ($arr["refund_account"]); ?>"><?php echo ($arr["refund_account"]); ?></td>
        </tr>
        <tr>
        <th>户名</th>
        <td class="center dd" title="<?php echo ($arr["refund_name"]); ?>"><?php echo ($arr["refund_name"]); ?></td>
        <th>本次打款金额</th>
        <td class="center dd" title="<?php echo ($arr["refund_money"]); ?>"><?php echo ($arr["refund_money"]); ?></td>
        </tr>
        <tr>
        <th>开户行</th>
        <td class="center dd" title="<?php echo ($arr["refund_bank"]); ?>"><?php echo ($arr["refund_bank"]); ?></td>
        <th>账号</th>
        <td class="center dd" title="<?php echo ($arr["refund_number"]); ?>"><?php echo ($arr["refund_number"]); ?></td>
        </tr>
        <tr>
        <th>企业价格</th>
        <td class="center dd" title="<?php echo ($arr["refund_enterprise"]); ?>"><?php echo ($arr["refund_enterprise"]); ?></td>
        <th>签约年限</th>
        <td class="center dd" title="<?php echo ($arr["refund_contractyears"]); ?>"><?php echo ($arr["refund_contractyears"]); ?></td>
        </tr>
        <tr>
        <th>配备人才</th>
        <td class="center dd" title="<?php echo ($arr["refund_qualified"]); ?>"><?php echo ($arr["refund_qualified"]); ?></td>
        <th>级别</th>
        <td class="center dd" title="<?php echo ($arr["refund_level"]); ?>"><?php echo ($arr["refund_level"]); ?></td>
        </tr>
        <tr>
        <th>专业</th>
        <td class="center dd" title="<?php echo ($arr["refund_major"]); ?>"><?php echo ($arr["refund_major"]); ?></td>
        <th>人才价格</th>
        <td class="center dd" title="<?php echo ($arr["refund_talent"]); ?>"><?php echo ($arr["refund_talent"]); ?></td>
        </tr>
        <tr>
        <th>客服</th>
        <td class="center dd" title="<?php echo ($arr["refund_customer"]); ?>"><?php echo ($arr["refund_customer"]); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      </table>
      <aside class="paging">
      <?php echo ($page); ?>
      </aside>
 </div>
</section>
</body>
</html>