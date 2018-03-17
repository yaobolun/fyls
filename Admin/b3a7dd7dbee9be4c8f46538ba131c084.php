<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>网站后台</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="/SHT/Public/admin/css/style.css">
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
<script src="/SHT/Public/admin/js/jquery.js"></script>
<script src="/SHT/Public/admin/js/jquery.mCustomScrollbar.concat.min.js"></script>
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
 <h1><img src="/SHT/Public/admin/images/admin_logo.png"/></h1>
 <ul class="rt_nav">
  <li><a href="/SHT/index.php/" target="_blank" class="website_icon">站点首页</a></li>
  <li><a href="/SHT/admin.php/Index/tc" class="quit_icon">安全退出</a></li>
 </ul>
</header>
<!--aside nav-->
<!--aside nav-->
<aside class="lt_aside_nav content mCustomScrollbar">
 <h2><a href="/SHT/admin.php/">后台首页</a></h2>
 <ul>
  <li>
   <dl>
    <dt>产品(Product)</dt>
    <!--当前链接则添加class:active-->
    <dd><a href="/SHT/admin.php/Product/product">Product information</a></dd>
    <dd><a href="/SHT/admin.php/New/news">News(新闻信息)</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>会员管理</dt>
    <dd><a href="/SHT/admin.php/Member/member">会员列表</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>订单信息</dt>
    <dd><a href="/SHT/admin.php/Order/order">订单列表</a></dd>
   </dl>
  </li>  
  <li>
   <dl>
    <dt>配送与支付设置</dt>
    <dd><a href="/SHT/admin.php/Pay/pay">支付方式</a></dd>
   </dl>
  </li>
  
   <li>
   <dl>
    <dt>基础设置</dt>
    <dd><a href="/SHT/admin.php/Top/emph">Email & phone</a></dd>
    <dd><a href="/SHT/admin.php/Top/banner">Banner</a></dd>
    <dd><a href="/SHT/admin.php/Admin/admin">Administrators</a></dd>
   </dl>
  </li>
  <li>
   <p class="btm_infor">© 小牛在线 版权所有</p>
  </li>
 </ul>
</aside>


<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">支付添加</h2>
       <a class="fr top_rt_btn" href="/SHT/Admin/Pay/pay">返回支付列表</a>
      </div>
     <section>
     <form action="" method="post" enctype="multipart/form-data">
      <ul class="ulColumn2">
       <li>
        <span class="item_name" style="width:120px;">支付方式：</span>
        <input type="text" class="textbox textbox_295" placeholder="标题..." name="title" />
         
       </li>
       
       <li>
        <span class="item_name" style="width:120px;">支付链接：</span>
         <input type="text" class="textbox textbox_295" placeholder="时间..." name="time" />
         
       </li>
     
       <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="submit" class="link_btn" name="sub"/>
       </li>
      </ul>
      </form>
     </section>
 </div>
</section>
<script src="/SHT/Public/admin/js/ueditor.config.js"></script>
<script src="/SHT/Public/admin/js/ueditor.all.min.js"> </script>
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
    
</script>
</body>
</html>