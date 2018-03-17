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
    <dd><a href="/fyls/admin.php/Product/product">新闻</a></dd>
    
    <dd><a href="/fyls/admin.php/New/news">产品</a></dd>
    <dd><a href="/fyls/admin.php/Pclass/col">产品分类</a></dd>
    <dd><a href="/fyls/admin.php/Col/col">产品颜色</a></dd>

   </dl>
  </li>
  <li>
   <dl>
    <dt>请假管理</dt>
    <dd><a href="/fyls/admin.php/Member/member">会员列表</a></dd>
   <!--  <dd><a href="/fyls/admin.php/Member/guest">留言列表</a></dd> -->
   </dl>
  </li>
  <li>
   <dl>
    <dt>快递信息</dt>
    <dd><a href="/fyls/admin.php/Order/order">订单列表</a></dd>
   </dl>
  </li>  
  <!-- <li>
   <dl>
    <dt>网站栏目管理</dt>
    <dd><a href="/fyls/admin.php/Lanmu/lanmu">栏目名称及图标</a></dd>
   </dl>
  </li> -->
 <!-- <li>
  <dl>
    <dt>前台内容显示设置</dt>
    <dd><a href="/fyls/admin.php/Top/emph">公司信息</a></dd>
    <dd><a href="/fyls/admin.php/Top/banner">轮播图</a></dd>
    <dd><a href="/fyls/admin.php/Top/scfw?id=26">商城服务</a></dd>
   </dl>
   </li> -->
   <li>
   <dl>
    <dt>后台登录设置</dt>
    <dd><a href="/fyls/admin.php/Admin/admin">管理员</a></dd>
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
       <h2 class="fl">管理员修改</h2>
       <a class="fr top_rt_btn" href="/fyls/Admin/Admin/admin">返回管理员列表</a>
      </div>
     <section>
     <form action="" method="post"  enctype="multipart/form-data">
      <ul class="ulColumn2">
       <li>
        <span class="item_name" style="width:120px;">管理员名称：</span>
        <input type="text" class="textbox textbox_295" value="<?php echo ($sel["name"]); ?>" name="title" />
       </li>
       <li>
        <span class="item_name" style="width:120px;">重置密码：</span>
        <input type="password" class="textbox textbox_295" id="pass" name="password" />
        
       </li>
        
       <li>
        <span class="item_name" style="width:120px;"></span>
        <input name="id" type="hidden" value="<?php echo ($sel["id"]); ?>" />
        <input type="submit" class="link_btn" name="sub" onClick="return yz()"/>
       </li>
      </ul>
      </form>
     </section>
 </div>
</section>
<script src="/fyls/Public/admin/js/jquery.js"></script>
<script language="javascript">  

  function yz(){
    if($("#pass").val()==''||$("#pass").val().length<5)
    {
      alert('Password cannot be empty and no less than 5 bits');
      return false;
    }
  }
  
</script>

</body>
</html>