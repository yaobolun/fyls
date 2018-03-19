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
       <h2 class="fl">修改转账信息</h2>
       <a href="/fyls/Admin/Transfer/transfer" class="fr top_rt_btn add_icon">返回转账列表</a>
      </div>
     <section>
     <form action="" method="post"  enctype="multipart/form-data">
      <ul class="ulColumn2">
      <table class="table">
      <tr>
        <th>申请人</th>
        <td><input type="text" class="textbox textbox_295" placeholder="申请转账人姓名" name="transfer_name" value="<?php echo ($sel["transfer_name"]); ?>" required="required"/></td>
        <th>人才合同价格</th>
        <td><input type="text" class="textbox textbox_295" placeholder="本人合同上的价格" name="transfer_contract" value="<?php echo ($sel["transfer_contract"]); ?>" required="required"/></td>
      </tr>
      <tr>
        <th>配置企业价格</th>
        <td><input type="text" class="textbox textbox_295" placeholder="企业价格" name="transfer_allocation" value="<?php echo ($sel["transfer_allocation"]); ?>" required="required"/></td>
        <th>证书类别</th>
        <td><input type="text" class="textbox textbox_295" placeholder="所属公司部门证书" name="transfer_certificate" value="<?php echo ($sel["transfer_certificate"]); ?>" required="required"/></td>
      </tr>
      <tr>
        <th>配置企业</th>
        <td><input type="text" class="textbox textbox_295" placeholder="申请人企业" name="transfer_configuration" value="<?php echo ($sel["transfer_configuration"]); ?>" required="required"/></td>
        <th>人才姓名</th>
        <td><input type="text" class="textbox textbox_295" placeholder="本人姓名" name="transfer_talent" value="<?php echo ($sel["transfer_talent"]); ?>" required="required"/></td>
      </tr>
      <tr>
        <th>配出年月</th>
        <td><input type="text" class="textbox textbox_295" placeholder="转账的年月日" name="transfer_match" value="<?php echo ($sel["transfer_match"]); ?>" required="required"/></td>
        <th>户名</th>
        <td><input type="text" class="textbox textbox_295" placeholder="收款人开户户名" name="transfer_huming" value="<?php echo ($sel["transfer_huming"]); ?>" required="required"/></td>
      </tr>
      <tr>
        <th>本次打款金额</th>
        <td><input type="text" class="textbox textbox_295" placeholder="人民币（大写） ￥全款  预付款 尾款 介绍费" name="transfer_amount" value="<?php echo ($sel["transfer_amount"]); ?>" required="required"/></td>
        <th>开户行</th>
        <td><input type="text" class="textbox textbox_295" placeholder="开户的银行" name="transfer_bank" value="<?php echo ($sel["transfer_bank"]); ?>" required="required"/></td>
      </tr>
      <tr>
        <th>账号</th>
        <td><input type="text" class="textbox textbox_295" placeholder="开户的账号" name="transfer_account" value="<?php echo ($sel["transfer_account"]); ?>" required="required"/></td>
        <th>备注说明</th>
        <td><input type="text" class="textbox textbox_295" placeholder="说明" name="transfer_note" value="<?php echo ($sel["transfer_note"]); ?>" required="required"/></td>
      </tr>
      <tr>
        <th>已付金额</th>
        <td><input type="text" class="textbox textbox_295" placeholder="已付金额" name="transfer_paid" value="<?php echo ($sel["transfer_paid"]); ?>" required="required"/></td>
        <th>上传图片</th>
        <td><input type="file" name="transfer_pic" value="<?php echo ($sel["transfer_pic"]); ?>"/><input type="text" name="transfer_pic" value="<?php echo ($sel["transfer_pic"]); ?>" disabled="true" title="图片路径" style="width:307px;"/></td>
        
      </tr>
      <tr>
        <th>财务备注信息</th>
        <td><input type="text" class="textbox textbox_295" placeholder="财务备注" name="transfer_information" value="<?php echo ($sel["transfer_information"]); ?>" required="required"/></td>
      </tr>
       <!-- <li>
        <span class="item_name" style="width:120px;">申请人：</span>
        <input type="text" class="textbox textbox_295" placeholder="申请转账人姓名" name="transfer_name" value="<?php echo ($sel["transfer_name"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">人才合同价格：</span>
        <input type="text" class="textbox textbox_295" placeholder="本人合同上的价格" name="transfer_contract" value="<?php echo ($sel["transfer_contract"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">配置企业价格：</span>
        <input type="text" class="textbox textbox_295" placeholder="企业价格" name="transfer_allocation" value="<?php echo ($sel["transfer_allocation"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">证书类别：</span>
        <input type="text" class="textbox textbox_295" placeholder="所属公司部门证书" name="transfer_certificate" value="<?php echo ($sel["transfer_certificate"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">配置企业：</span>
        <input type="text" class="textbox textbox_295" placeholder="申请人企业" name="transfer_configuration" value="<?php echo ($sel["transfer_configuration"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">人才姓名：</span>
        <input type="text" class="textbox textbox_295" placeholder="本人姓名" name="transfer_talent" value="<?php echo ($sel["transfer_talent"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">配出年月：</span>
        <input type="text" class="textbox textbox_295" placeholder="转账的年月日" name="transfer_match" value="<?php echo ($sel["transfer_match"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">户名：</span>
        <input type="text" class="textbox textbox_295" placeholder="收款人开户户名" name="transfer_huming" value="<?php echo ($sel["transfer_huming"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">本次打款金额：</span>
        <input type="text" class="textbox textbox_295" placeholder="人民币（大写） ￥全款  预付款 尾款 介绍费" name="transfer_amount" value="<?php echo ($sel["transfer_amount"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">开户行：</span>
        <input type="text" class="textbox textbox_295" placeholder="开户的银行" name="transfer_bank" value="<?php echo ($sel["transfer_bank"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">账号：</span>
        <input type="text" class="textbox textbox_295" placeholder="开户的账号" name="transfer_account" value="<?php echo ($sel["transfer_account"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">备注说明：</span>
        <textarea type="text" class="textbox textbox_295" placeholder="说明" name="transfer_note" value="<?php echo ($sel["transfer_note"]); ?>"/></textarea>
       </li>
       <li>
        <span class="item_name" style="width:120px;">已付金额：</span>
        <input type="text" class="textbox textbox_295" placeholder="已付金额" name="transfer_paid" value="<?php echo ($sel["transfer_paid"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">上传图片：</span>
          <label class="uploadImg">
           <input type="file" name="transfer_pic"value="<?php echo ($sel["transfer_pic"]); ?>"/>
           <span>上传图片</span>
          </label>
       </li>
       <li>
        <span class="item_name" style="width:120px;">财务备注信息：</span>
        <textarea type="text" class="textbox textbox_295" placeholder="财务备注" name="transfer_information" value="<?php echo ($sel["transfer_information"]); ?>"/></textarea>
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