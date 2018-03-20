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
       <h2 class="fl">资质凭证到账凭证申请添加</h2>
       <a href="/fyls/Admin/Refund/refund" class="fr top_rt_btn add_icon">返回资质凭证到账凭证申请列表</a>
      </div>
     <section>
     <form action="" method="post" enctype="multipart/form-data">
      <ul class="ulColumn2">
      <table class="table">
      <tr>
        <th>申请人</th>
        <td><input type="text" class="textbox textbox_295" placeholder="退款申请人姓名" name="refund_applicant" required="required"/></td>
        <th>配出年月</th>
        <td><input type="text" class="textbox textbox_295" placeholder="现金的年月日" name="refund_match" required="required"/></td>
      </tr>
      <tr>
        <th>配备企业</th>
        <td><input type="text" class="textbox textbox_295" placeholder="公司名称" name="refund_equip" required="required"/></td>
        <th>合同价格</th>
        <td><input type="text" class="textbox textbox_295" placeholder="合同上的价格" name="refund_contract" required="required"/></td>
      </tr>
      <tr>
        <th>备注</th>
        <td><input type="text" class="textbox textbox_295" placeholder="说明" name="refund_remarks" required="required"/></td>
        <th>已到账金额</th>
        <td><input type="text" class="textbox textbox_295" placeholder="人民币（大写） ￥全款  预付款 尾款 介绍费" name="refund_account" required="required"/></td>
      </tr>
      <tr>
        <th>户名</th>
        <td><input type="text" class="textbox textbox_295" placeholder="收款人姓名" name="refund_name" required="required"/></td>
        <th>本次打款金额</th>
        <td><input type="text" class="textbox textbox_295" placeholder="人民币（大写） ￥全款  预付款 尾款 介绍费" name="refund_money" required="required"/></td>
      </tr>
      <tr>
        <th>开户行</th>
        <td><input type="text" class="textbox textbox_295" placeholder="开户的所在银行" name="refund_bank" required="required"/></td>
        <th>账号</th>
        <td><input type="text" class="textbox textbox_295" placeholder="开户时的账户号" name="refund_number" required="required"/></td>
      </tr>
      <tr>
        <th>企业价格</th>
        <td><input type="text" class="textbox textbox_295" placeholder="企业注册资金" name="refund_enterprise" required="required"/></td>
        <th>签约年限</th>
        <td><input type="text" class="textbox textbox_295" placeholder="申请人与公司签约年份" name="refund_contractyears" required="required"/></td>
      </tr>
      <tr>
        <th>配备人才</th>
        <td><input type="text" class="textbox textbox_295" placeholder="本人" name="refund_qualified" required="required"/></td>
        <th>级别</th>
        <td><input type="text" class="textbox textbox_295" placeholder="级别" name="refund_level" required="required"/></td>
      </tr>
      <tr>
        <th>专业</th>
        <td><input type="text" class="textbox textbox_295" placeholder="专业" name="refund_major" required="required"/></td>
        <th>人才价格</th>
        <td><input type="text" class="textbox textbox_295" placeholder="人才价格" name="refund_talent" required="required"/></td>
      </tr>
      <tr>
        <th>客服</th>
        <td><input type="text" class="textbox textbox_295" placeholder="客服" name="refund_customer" required="required"/></td>
      </tr>
       <!-- <li>
        <span class="item_name" style="width:120px;">申请人：</span>
        <input type="text" class="textbox textbox_295" placeholder="退款申请人姓名" name="refund_applicant" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">配出年月：</span>
        <input type="text" class="textbox textbox_295" placeholder="现金的年月日" name="refund_match" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">配备企业：</span>
        <input type="text" class="textbox textbox_295" placeholder="公司名称" name="refund_equip" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">合同价格：</span>
        <input type="text" class="textbox textbox_295" placeholder="合同上的价格" name="refund_contract" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">备注：</span>
        <textarea type="text" class="textbox textbox_295" placeholder="说明" name="refund_remarks" required="required"/></textarea>
       </li>
       <li>
        <span class="item_name" style="width:120px;">已到账金额：</span>
        <input type="text" class="textbox textbox_295" placeholder="人民币（大写） ￥全款  预付款 尾款 介绍费" name="refund_account" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">户名：</span>
        <input type="text" class="textbox textbox_295" placeholder="收款人姓名" name="refund_name" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">本次打款金额：</span>
        <input type="text" class="textbox textbox_295" placeholder="人民币（大写） ￥全款  预付款 尾款 介绍费" name="refund_money" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">开户行：</span>
        <input type="text" class="textbox textbox_295" placeholder="开户的所在银行" name="refund_bank" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">账号：</span>
        <input type="text" class="textbox textbox_295" placeholder="开户时的账户号" name="refund_number" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">企业价格：</span>
        <input type="text" class="textbox textbox_295" placeholder="企业注册资金" name="refund_enterprise" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">签约年限：</span>
        <input type="text" class="textbox textbox_295" placeholder="申请人与公司签约年份" name="refund_contractyears" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">配备人才：</span>
        <input type="text" class="textbox textbox_295" placeholder="本人" name="refund_qualified" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">级别：</span>
        <input type="text" class="textbox textbox_295" placeholder="级别" name="refund_level" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">专业：</span>
        <input type="text" class="textbox textbox_295" placeholder="专业" name="refund_major" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">人才价格：</span>
        <input type="text" class="textbox textbox_295" placeholder="人才价格" name="refund_talent" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">客服：</span>
        <input type="text" class="textbox textbox_295" placeholder="客服" name="refund_customer" required="required"/>
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