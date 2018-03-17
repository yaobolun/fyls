<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>网站后台</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="/Public/admin/css/style.css">
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
<script src="/Public/admin/js/jquery.js"></script>
<script src="/Public/admin/js/jquery.mCustomScrollbar.concat.min.js"></script>
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
 <h1><img src="/Public/admin/images/admin_logo.png"/></h1>
 <ul class="rt_nav">
  <li><a href="/index.php/" target="_blank" class="website_icon">站点首页</a></li>
  <li><a href="/admin.php/Index/tc" class="quit_icon">安全退出</a></li>
 </ul>
</header>
<!--aside nav-->
<!--aside nav-->
<aside class="lt_aside_nav content mCustomScrollbar">
  
 <ul>
  <li>
   <dl>
    <dt>产品(Product)</dt>
    <!--当前链接则添加class:active-->
    <dd><a href="/admin.php/Product/product">Product information</a></dd>
    <dd><a href="/admin.php/New/news">Custom Research Service</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>会员管理</dt>
    <dd><a href="/admin.php/Member/member">会员列表</a></dd>
    <dd><a href="/admin.php/Member/guest">留言列表</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>订单信息</dt>
    <dd><a href="/admin.php/Order/order">订单列表</a></dd>
   </dl>
  </li>  
 <li>
  <dl>
    <dt>前台内容显示设置</dt>
    <dd><a href="/admin.php/Top/ab">About Us</a></dd>
    <dd><a href="/admin.php/Top/emph">Email & phone</a></dd>
    <dd><a href="/admin.php/Top/banner">Banner</a></dd>
    <dd><a href="/admin.php/Top/od">Samples and Discounts</a></dd>
    <dd><a href="/admin.php/Top/client">client</a></dd>
    <dd><a href="/admin.php/Top/rl">Report Licenses</a></dd>
   <dd><a href="/admin.php/Top/sg">Shopping Guide</a></dd>
   </dl>
   </li>
   <li>
   <dl>
    <dt>登录设置</dt>
    <dd><a href="/admin.php/Admin/admin">Administrators</a></dd>
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
       <h2 class="fl">添加</h2>
       <a class="fr top_rt_btn" href="/Admin/Top/sg">返回</a>
      </div>
     <section>
     <form action="" method="post" enctype="multipart/form-data">
      <ul class="ulColumn2">
      <li> 
        <span class="item_name" style="width:120px;">标题：</span>
        <lable>
          <input type="text" name="name" class="textbox textbox_295"/>
        </lable>
      </li>

     <li>
        <span class="item_name" style="width:120px;">内容：</span>
        <script id="editor" type="text/plain" name="details" style="width:1024px;height:500px;margin-left:120px;margin-top:0;"></script>
        <div hidden="hidden" id="content"></div>

         
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
<script src="/Public/admin/js/ueditor.config.js"></script>
<script src="/Public/admin/js/ueditor.all.min.js"> </script>
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
 document.getElementById('editor').innerHTML=document.getElementById('content').innerHTML;
</script>
</body>
</html>