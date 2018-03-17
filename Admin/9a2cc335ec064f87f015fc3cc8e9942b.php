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
    <dd><a href="/SHT/admin.php/Member/guest">留言列表</a></dd>
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
    <dd><a href="/SHT/admin.php/Top/client">client</a></dd>
    <dd><a href="/SHT/admin.php/Admin/admin">Administrators</a></dd>
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
       <h2 class="fl">支付列表</h2>
       
       <a href="/SHT/Admin/Pay/pay_add" class="fr top_rt_btn add_icon">添加支付方式</a>
      </div>
      <table class="table">
       <tr>
        <th>编号</th>
        <th>支付方式</th>
        <th>支付接口</th>
        <th>操作</th>
       </tr>
       <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><tr>
        <td class="center"><?php echo ($key+1); ?></td>
         
        <td class="center"><?php echo ($arr["name"]); ?></td>
         <td class="center"><?php echo ($arr["jiekou"]); ?></td>
          
        <td class="center">
         <a href="/SHT/Admin/Pay/pay_mod?id=<?php echo ($arr["id"]); ?>" title="编辑" class="link_icon">&#101;</a>
         <a href="/SHT/Admin/Pay/pay_del?id=<?php echo ($arr["id"]); ?>" title="删除" class="link_icon">&#100;</a>
        </td>
       </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      
      </table>
      <aside class="paging">
      <?php echo ($page); ?>
      </aside>
 </div>
</section>
</body>
</html>