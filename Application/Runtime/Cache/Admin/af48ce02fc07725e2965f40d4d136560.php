<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>网站后台</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="/zjtr/Public/admin/css/style.css">
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
<script src="/zjtr/Public/admin/js/jquery.js"></script>
<script src="/zjtr/Public/admin/js/jquery.mCustomScrollbar.concat.min.js"></script>
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
 <h1><img src="/zjtr/Public/admin/images/admin_logo.png"/></h1>
 <ul class="rt_nav">
  <li><a href="/zjtr/index.php/" target="_blank" class="website_icon">站点首页</a></li>
  <li><a href="/zjtr/admin.php/Index/tc" class="quit_icon">安全退出</a></li>
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
    <dd><a href="/zjtr/admin.php/Product/product">Product information</a></dd>
    <dd><a href="/zjtr/admin.php/Topsell/report">Top-Selling Reports</a></dd>
    <dd><a href="/zjtr/admin.php/New/news">Company/Market News</a></dd>

   </dl>
  </li>
  <li>
   <dl>
    <dt>会员管理</dt>
    <dd><a href="/zjtr/admin.php/Member/member">会员列表</a></dd>
    <dd><a href="/zjtr/admin.php/Member/guest">留言列表</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>订单信息</dt>
    <dd><a href="/zjtr/admin.php/Order/order">订单列表</a></dd>
   </dl>
  </li>  
  <li>
   <dl>
    <dt>网站栏目管理</dt>
    <dd><a href="/zjtr/admin.php/Lanmu/lanmu">栏目名称及图标</a></dd>
   </dl>
  </li>
 <li>
  <dl>
    <dt>前台内容显示设置</dt>
    <dd><a href="/zjtr/admin.php/Top/ab">About Us</a></dd>
    <dd><a href="/zjtr/admin.php/Top/co">Contact Us</a></dd>
    <dd><a href="/zjtr/admin.php/Top/emph">Email & phone</a></dd>
    <dd><a href="/zjtr/admin.php/Top/banner">Banner</a></dd>
    <dd><a href="/zjtr/admin.php/Top/od">Samples and Discounts</a></dd>
    <dd><a href="/zjtr/admin.php/Top/client">clients</a></dd>
    <dd><a href="/zjtr/admin.php/Top/rl">Custom Research and Services</a></dd>
   <dd><a href="/zjtr/admin.php/Top/sg">Shopping Guide</a></dd>
   </dl>
   </li>
   <li>
   <dl>
    <dt>登录设置</dt>
    <dd><a href="/zjtr/admin.php/Admin/admin">Administrators</a></dd>
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
       <h2 class="fl">产品列表</h2>
       
       <a href="/zjtr/Admin/Topsell/report_add" class="fr top_rt_btn add_icon">添加单个产品</a>
       <a href="/zjtr/Admin/Topsell/user" class="fr top_rt_btn add_icon">批量导入产品</a>
       <a href="/zjtr/Admin/Topsell/excel_out" class="fr top_rt_btn add_icon">批量导出产品</a>
      </div>
      <section class="mtb">
       <form action="" method="post">
       <input type="text" class="textbox textbox_225" placeholder="输入标题..." name="name"/>
       <input type="submit" value="查询" class="group_btn" name="sub"/>
       </form>
      </section>
      <table class="table">
       <tr>
        <th>编号</th>
        
        <th>标题</th>
        <th>摘要</th>
        <th>表的内容</th>
        <th>数据列表</th>
        <th>时间</th>
        <th>类别</th>
        <th>页数</th>
        <th>价格</th>
        
        <th>出版</th>
        <th>操作</th>
       </tr>
       <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><tr>
        <td class="center"><?php echo ($key+1); ?></td>
        <td style="text-align: justify;"><?php echo (substr(htmlspecialchars_decode($arr["title"]),0,30)); ?></td>
        <td style="text-align: justify;" ><?php echo (substr(htmlspecialchars_decode($arr["abstract"]),0,60)); ?></td>
        <td style="text-align: justify;" ><?php echo (substr(htmlspecialchars_decode($arr["table"]),0,60)); ?></td>
        <td style="text-align: justify;" ><?php echo (substr(htmlspecialchars_decode($arr["figures"]),0,60)); ?></td>
        <td class="center"><?php echo ($arr["time"]); ?></td>
        <td class="center"><?php echo ($arr["type"]); ?></td>
        <td class="center"><?php echo ($arr["pages"]); ?></td>
        <td class="" style=" font-size:10px;">Single User License:<strong class="money_icon" style="font-size:14px">$<?php echo ($arr["u_price"]); ?></strong><br /><br />Corporate User License:<strong class="money_icon"  style="font-size:14px">$<?php echo ($arr["u_price2"]); ?></strong></td>
        
        <td class="center"><?php echo ($arr['published']==1?'已出版':'未出版'); ?></td>
        <td class="center">
         <a href="/zjtr/Admin/Topsell/report_mod?id=<?php echo ($arr["type_id"]); ?>" title="编辑" class="link_icon">&#101;</a>
         <a href="/zjtr/Admin/Topsell/report_del?id=<?php echo ($arr["type_id"]); ?>" title="删除" class="link_icon">&#100;</a>
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