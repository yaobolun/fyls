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
       <h2 class="fl">修改资质凭证到账凭证申请信息</h2>
       <a href="/fyls/Admin/Qualifications/qualifications" class="fr top_rt_btn add_icon">返回资质凭证到账凭证申请列表</a>
      </div>
     <section>
     <form action="" method="post"  enctype="multipart/form-data">
      <ul class="ulColumn2">
      <table class="table">
      <tr>
        <th>日期</th>
        <td><input type="text" class="textbox textbox_295" placeholder="到账的年月日" name="qualifications_date" value="<?php echo ($sel["qualifications_date"]); ?>"/></td>
        <th>市场部客服</th>
        <td><input type="text" class="textbox textbox_295" placeholder="市场部客服公司内部人员可选" name="qualifications_customer" value="<?php echo ($sel["qualifications_customer"]); ?>"/></td>
      </tr>
      <tr>
        <th>申请人</th>
        <td><input type="text" class="textbox textbox_295" placeholder="申请人联系方式" name="qualifications_applicant" value="<?php echo ($sel["qualifications_applicant"]); ?>"/></td>
        <th>企业名称</th>
        <td><input type="text" class="textbox textbox_295" placeholder="公司名称" name="qualifications_enterprise" value="<?php echo ($sel["qualifications_enterprise"]); ?>"/></td>
      </tr>
      <tr>
        <th>资质名称</th>
        <td><input type="text" class="textbox textbox_295" placeholder="资质名称" name="qualifications_aptitude" value="<?php echo ($sel["qualifications_aptitude"]); ?>"/></td>
        <th>本次到账日期</th>
        <td><input type="text" class="textbox textbox_295" placeholder="资金到账的年月日时分" name="qualifications_arrival" value="<?php echo ($sel["qualifications_arrival"]); ?>"/></td>
      </tr>
      <tr>
        <th>合同价格</th>
        <td><input type="text" class="textbox textbox_295" placeholder="按照合同价格" name="qualifications_contract" value="<?php echo ($sel["qualifications_contract"]); ?>"/></td>
        <th>已到账金额</th>
        <td><input type="text" class="textbox textbox_295" placeholder="已经到账的金额" name="qualifications_money" value="<?php echo ($sel["qualifications_money"]); ?>"/></td>
      </tr>
      <tr>
        <th>到账账户</th>
        <td><input type="text" class="textbox textbox_295" placeholder="到账的账户" name="qualifications_account" value="<?php echo ($sel["qualifications_account"]); ?>"/></td>
        <th>本次到账金额</th>
        <td><input type="text" class="textbox textbox_295" placeholder="人民币（大写） ￥全款  预付款 尾款 介绍费" name="qualifications_bmoney" value="<?php echo ($sel["qualifications_bmoney"]); ?>"/></td>
      </tr>
      <tr>
        <th>公关费</th>
        <td><input type="text" class="textbox textbox_295" placeholder="公关费" name="qualifications_relations" value="<?php echo ($sel["qualifications_relations"]); ?>"/></td>
        <th>备注</th>
        <td><input type="text" class="textbox textbox_295" placeholder="说明" name="qualifications_remarks" value="<?php echo ($sel["qualifications_remarks"]); ?>"/></td>
      </tr>
        <!-- <li>
        <span class="item_name" style="width:120px;">日期：</span>
        <input type="text" class="textbox textbox_295" placeholder="到账的年月日" name="qualifications_date" value="<?php echo ($sel["qualifications_date"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">市场部客服：</span>
        <input type="text" class="textbox textbox_295" placeholder="市场部客服公司内部人员可选" name="qualifications_customer" value="<?php echo ($sel["qualifications_customer"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">申请人：</span>
        <input type="text" class="textbox textbox_295" placeholder="申请人联系方式" name="qualifications_applicant" value="<?php echo ($sel["qualifications_applicant"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">企业名称：</span>
        <input type="text" class="textbox textbox_295" placeholder="公司名称" name="qualifications_enterprise" value="<?php echo ($sel["qualifications_enterprise"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">资质名称：</span>
        <input type="text" class="textbox textbox_295" placeholder="资质名称" name="qualifications_aptitude" value="<?php echo ($sel["qualifications_aptitude"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">本次到账日期：</span>
        <input type="text" class="textbox textbox_295" placeholder="资金到账的年月日时分" name="qualifications_arrival" value="<?php echo ($sel["qualifications_arrival"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">合同价格：</span>
        <input type="text" class="textbox textbox_295" placeholder="按照合同价格" name="qualifications_contract" value="<?php echo ($sel["qualifications_contract"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">已到账金额：</span>
        <input type="text" class="textbox textbox_295" placeholder="已经到账的金额" name="qualifications_money" value="<?php echo ($sel["qualifications_money"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">到账账户：</span>
        <input type="text" class="textbox textbox_295" placeholder="到账的账户" name="qualifications_account" value="<?php echo ($sel["qualifications_account"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">本次到账金额：</span>
        <input type="text" class="textbox textbox_295" placeholder="人民币（大写） ￥全款  预付款 尾款 介绍费" name="qualifications_bmoney" value="<?php echo ($sel["qualifications_bmoney"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">公关费：</span>
        <input type="text" class="textbox textbox_295" placeholder="公关费" name="qualifications_relations" value="<?php echo ($sel["qualifications_relations"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">备注：</span>
        <textarea type="text" class="textbox textbox_295" placeholder="说明" name="qualifications_remarks" value="<?php echo ($sel["qualifications_remarks"]); ?>"/></textarea>
       </li> -->
       </table>
      <input type="hidden" name='id' value="<?php echo ($sel["id"]); ?>"/>
       <li>
        <span class="item_name" style="width:120px;"></span>
        <input name="id" type="hidden" value="<?php echo ($sel["id"]); ?>" />
        <input type="submit" class="link_btn" name="sub"/>
       </li>
      </ul>
      </form>
     </section>
 </div>
</section>
</body>
</html>