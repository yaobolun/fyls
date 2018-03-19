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


<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">到账申请添加</h2>
       <a href="/fyls/Admin/Arrival/arrival" class="fr top_rt_btn add_icon">返回到账列表</a>
      </div>
     <section>
     <form action="" method="post" enctype="multipart/form-data">
      <ul class="ulColumn2">
      <table class="table">
      <tr>
        <th>申请人</th>
        <td><input type="text" class="textbox textbox_295" placeholder="申请人姓名填写" name="arrival_applicant" required="required"/></td>
        <th>到账公司账号</th>
        <td><input type="text" class="textbox textbox_295" placeholder="到账公司账号" name="arrival_account" required="required"/></td>
      </tr>
      <tr>
        <th>到账时间</th>
        <td><input type="text" class="textbox textbox_295" placeholder="到账时间" name="arrival_time" required="required"/></td>
        <th>到账金额</th>
        <td><input type="text" class="textbox textbox_295" placeholder="到账金额" name="arrival_money" required="required"/></td>
      </tr>
      <tr>
        <th>已付金额</th>
        <td><input type="text" class="textbox textbox_295" placeholder="已付金额" name="arrival_paid" required="required"/></td>
        <th>合同价格</th>
        <td><input type="text" class="textbox textbox_295" placeholder="按照合同上的价格" name="arrival_contract" required="required"/></td>
      </tr>
      <tr>
        <th>配备企业</th>
        <td><input type="text" class="textbox textbox_295" placeholder="申请人企业" name="arrival_equip" required="required"/></td>
        <th>备注</th>
        <td><input type="text" class="textbox textbox_295" placeholder="说明" name="arrival_remarks" required="required"/></td>
      </tr>
      <tr>
        <th>企业价格</th>
        <td><input type="text" class="textbox textbox_295" placeholder="企业注册资金" name="arrival_enterprise" required="required"/></td>
        <th>签约年限</th>
        <td><input type="text" class="textbox textbox_295" placeholder="合同签约年份" name="arrival_contrac" required="required"/></td>
      </tr>
      <tr>
        <th>配备人才</th>
        <td><input type="text" class="textbox textbox_295" placeholder="企业注册资金" name="arrival_qualified" required="required"/></td>
        <th>级别</th>
        <td><input type="text" class="textbox textbox_295" placeholder="申请人所在公司级别" name="arrival_level" required="required"/></td>
      </tr>
      <tr>
        <th>专业</th>
        <td><input type="text" class="textbox textbox_295" placeholder="专业" name="arrival_major" required="required"/></td>
        <th>人才价格</th>
        <td><input type="text" class="textbox textbox_295" placeholder="人才价格" name="arrival_talent" required="required"/></td>
      </tr>
      <tr>
        <th>客服</th>
        <td><input type="text" class="textbox textbox_295" placeholder="客服" name="arrival_customer" required="required"/></td>
      </tr>
       <!-- <li>
        <span class="item_name" style="width:120px;">申请人：</span>
        <input type="text" class="textbox textbox_295" placeholder="申请人姓名填写" name="arrival_applicant" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">到账公司账号：</span>
        <input type="text" class="textbox textbox_295" placeholder="到账公司账号" name="arrival_account" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">到账时间：</span>
        <input type="text" class="textbox textbox_295" placeholder="到账时间" name="arrival_time" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">到账金额：</span>
        <input type="text" class="textbox textbox_295" placeholder="到账金额" name="arrival_money" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">已付金额：</span>
        <input type="text" class="textbox textbox_295" placeholder="已付金额" name="arrival_paid" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">合同价格：</span>
        <input type="text" class="textbox textbox_295" placeholder="按照合同上的价格" name="arrival_contract" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">配备企业：</span>
        <input type="text" class="textbox textbox_295" placeholder="申请人企业" name="arrival_equip" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">备注：</span>
        <textarea type="text" class="textbox textbox_295" placeholder="说明" name="arrival_remarks" required="required"/></textarea>
       </li>
       <li>
        <span class="item_name" style="width:120px;">企业价格：</span>
        <input type="text" class="textbox textbox_295" placeholder="企业注册资金" name="arrival_enterprise" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">签约年限：</span>
        <input type="text" class="textbox textbox_295" placeholder="合同签约年份" name="arrival_contrac" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">配备人才：</span>
        <input type="text" class="textbox textbox_295" placeholder="姓名" name="arrival_qualified" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">级别：</span>
        <input type="text" class="textbox textbox_295" placeholder="申请人所在公司级别" name="arrival_level" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">专业：</span>
        <input type="text" class="textbox textbox_295" placeholder="专业" name="arrival_major" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">人才价格：</span>
        <input type="text" class="textbox textbox_295" placeholder="人才价格" name="arrival_talent" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">客服：</span>
        <input type="text" class="textbox textbox_295" placeholder="客服" name="arrival_customer" required="required"/>
       </li> -->
       </table>
       <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="submit" class="link_btn" name="sub" />
       </li>
      </ul>
      </form>
     </section>
 </div>
</section>
 <script src="/fyls/Public/admin/js/jquery.js"></script>

</body>
</html>