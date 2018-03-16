<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>网站后台</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="/fyls/Public/admin/css/style.css">
<link rel="stylesheet" href="/fyls/Public/layui/css/layui.css"  media="all">
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
<script src="/fyls/Public/admin/js/jquery.js"></script>
<script src="/fyls/Public/admin/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/fyls/Public/layui/layui.js" charset="utf-8"></script>
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
    <dt> 请假 | 外出 </dt>
    <dd><a href="/fyls/admin.php/Leave/add_leave">申请请假</a></dd>
    <dd><a href="/fyls/admin.php/Travel/add_travel">申请外出</a></dd>
    <dd><a href="/fyls/admin.php/Leave/leave_list">请假记录</a></dd>
    <dd><a href="/fyls/admin.php/Travel/travel_list">外出记录</a></dd>
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
       <h2 class="fl">我要请假</h2>
       <a class="fr top_rt_btn" href="/fyls/Admin/Product/product">返回</a>
      </div>
     <section>
 <form action="/fyls/Admin/Travel/doadd_travel" method="post">
      <ul class="ulColumn2">
       <li>
        <span class="item_name" style="width:200px;">申请人:</span>
        <input type="text" class="textbox textbox_295" placeholder="申请人..." name="applicant" />
       </li>
       <li>
        <span class="item_name" style="width:200px;">外出地址:</span>
        <textarea style="height: 60px" type="text" class="textbox textbox_295" placeholder="请假理由..." name="out_addr"></textarea>
       </li>
       <li>
        <span class="item_name" style="width:200px;">外出原因:</span>
        <textarea style="height: 60px" type="text" class="textbox textbox_295" placeholder="比如出差..收购..." name="out_reason"></textarea>
       </li>
       <li>
          <span class="item_name" style="width: 200px" >开始日期:</span>
          <div class="layui-input-inline">
            <input type="text" name="out_time" class="textbox textbox_295" id="test5" placeholder="外出开始日期">
          </div>
       </li>
       <li>
          <span class="item_name" style="width: 200px" >结束日期:</span>
          <div class="layui-input-inline">
            <input type="text" name="back_time" class="textbox textbox_295" id="test1" placeholder="外出结束日期">
          </div>
       </li>
       <li>
        <span class="item_name" style="width:200px;"></span>
        <input type="hidden" name="uid" value="<?php echo (session('id')); ?>" />
        <input type="submit" class="link_btn"/>
       </li>
      </ul>
      </form>

     </section>
 </div>
</section>
<script type="text/javascript">
  layui.use('laydate', function(){
    var laydate = layui.laydate;

      //时间选择器
      laydate.render({
        elem: '#test5'
        ,type: 'datetime'
      });
    });

    layui.use('laydate', function(){
    var laydate = layui.laydate;

      //时间选择器
      laydate.render({
        elem: '#test1'
        ,type: 'datetime'
      });
    });
</script>
</body>
</html>