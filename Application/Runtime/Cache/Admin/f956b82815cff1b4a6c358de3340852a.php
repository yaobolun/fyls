<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>网站后台</title>
<meta name="author" content="DeathGhost" />
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> origin/yaobolun
=======
>>>>>>> origin/zhiwang
<link rel="stylesheet" type="text/css" href="/fyls/Public/admin/css/style.css">


<link rel="stylesheet" href="/fyls/Public/layui/css/layui.css"  media="all">

<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
<script src="/fyls/Public/admin/js/jquery.js"></script>
<script src="/fyls/Public/admin/js/jquery.mCustomScrollbar.concat.min.js"></script>
<<<<<<< HEAD
<<<<<<< HEAD
=======
<link rel="stylesheet" type="text/css" href="/zjtr/Public/admin/css/style.css">
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
<script src="/zjtr/Public/admin/js/jquery.js"></script>
<script src="/zjtr/Public/admin/js/jquery.mCustomScrollbar.concat.min.js"></script>
>>>>>>> origin/liushuai
=======
>>>>>>> origin/yaobolun
=======

<script src="/fyls/Public/layui/layui.js" charset="utf-8"></script>

>>>>>>> origin/zhiwang
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> origin/yaobolun
=======
>>>>>>> origin/zhiwang
 <h1><img src="/fyls/Public/admin/images/admin_logo.png"/></h1>
 <ul class="rt_nav">
  <li><a href="/fyls/index.php/" target="_blank" class="website_icon">站点首页</a></li>
  <li><a href="/fyls/admin.php/Index/tc" class="quit_icon">安全退出</a></li>
<<<<<<< HEAD
<<<<<<< HEAD
=======
 <h1><img src="/zjtr/Public/admin/images/admin_logo.png"/></h1>
 <ul class="rt_nav">
  <li><a href="/zjtr/index.php/" target="_blank" class="website_icon">站点首页</a></li>
  <li><a href="/zjtr/admin.php/Index/tc" class="quit_icon">安全退出</a></li>
>>>>>>> origin/liushuai
=======
>>>>>>> origin/yaobolun
=======
>>>>>>> origin/zhiwang
 </ul>
</header>
<aside class="lt_aside_nav content mCustomScrollbar">

 <uhl>
 <li>
   <dl>
    <dt>审批列表</dt>
    <dd><a href="/fyls/admin.php/Approval/leave">请假审批</a></dd>
    <dd><a href="/fyls/admin.php/Approval/travel">外出审批</a></dd>
    </dl>
  </li>
  <li>
   <dl>
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> origin/yaobolun
    <dt>财务管理</dt>
    <!--当前链接则添加class:active-->
    <dd><a href="/fyls/admin.php/Product/product">申请转账</a></dd>
    
    <dd><a href="/fyls/admin.php/New/news">申请到账</a></dd>
    <dd><a href="/fyls/admin.php/Pclass/col">资质到账</a></dd>
    <!-- <dd><a href="/fyls/admin.php/Col/col">产品颜色</a></dd> -->
<<<<<<< HEAD
=======
    <dt>新闻&产品</dt>
    <!--当前链接则添加class:active-->
    <dd><a href="/zjtr/admin.php/Product/product">新闻</a></dd>
    
    <dd><a href="/zjtr/admin.php/New/news">产品</a></dd>
    <dd><a href="/zjtr/admin.php/Pclass/col">产品分类</a></dd>
    <dd><a href="/zjtr/admin.php/Col/col">产品颜色</a></dd>
>>>>>>> origin/liushuai
=======
>>>>>>> origin/yaobolun

   </dl>
  </li>
  <li>
   <dl>
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> origin/yaobolun
    <dt>请假管理</dt>
    <dd><a href="/fyls/admin.php/Member/member">请假列表</a></dd>
    <dd><a href="/fyls/admin.php/Member/member">外出列表</a></dd>
   <!--  <dd><a href="/fyls/admin.php/Member/guest">留言列表</a></dd> -->
<<<<<<< HEAD
=======
    <dt>会员管理</dt>
    <dd><a href="/zjtr/admin.php/Member/member">会员列表</a></dd>
   <!--  <dd><a href="/zjtr/admin.php/Member/guest">留言列表</a></dd> -->
>>>>>>> origin/liushuai
=======
>>>>>>> origin/yaobolun
=======
    <dt>财务管理</dt>
    <!--当前链接则添加class:active-->
    <dd><a href="/fyls/admin.php/Transfer/transfer">转账申请列表</a></dd>
    <dd><a href="/fyls/admin.php/Arrival/arrival">到账申请列表</a></dd>
    <dd><a href="/fyls/admin.php/Qualifications/qualifications">资质凭证到账凭证申请列表</a></dd>
    </dl>
  </li>
  <li>
   <dl>
    <dt> 请假 | 外出 </dt>

    <dd><a href="/fyls/admin.php/Leave/add_leave">申请请假</a></dd>
    <dd><a href="/fyls/admin.php/Travel/add_travel">申请外出</a></dd>
    <dd><a href="/fyls/admin.php/Leave/leave_list">我的请假记录</a></dd>
    <dd><a href="/fyls/admin.php/Travel/travel_list">我的外出记录</a></dd>

>>>>>>> origin/zhiwang
   </dl>
  </li>
  <li>
   <dl>
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> origin/yaobolun
=======
>>>>>>> origin/zhiwang
    <dt>快递信息</dt>

    <dd><a href="/fyls/admin.php/Order/order">订单列表</a></dd>
    <dd><a href="/fyls/admin.php/Order/order">快递列表</a></dd>
   </dl>
  </li>

    
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

    <dd><a href="/fyls/admin.php/Department/department">部门管理</a></dd>
    <dd><a href="/fyls/admin.php/Station/station">岗位管理</a></dd>
    <dd><a href="/fyls/admin.php/People/people">人员管理</a></dd>
<<<<<<< HEAD
<<<<<<< HEAD
=======
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
    <!-- <dd><a href="/zjtr/admin.php/Top/ab">About Us</a></dd>
    <dd><a href="/zjtr/admin.php/Top/co">Contact Us</a></dd> -->
    <dd><a href="/zjtr/admin.php/Top/emph">公司信息</a></dd>
    <dd><a href="/zjtr/admin.php/Top/banner">轮播图</a></dd>
    <dd><a href="/zjtr/admin.php/Top/scfw?id=26">商城服务</a></dd>
   <!--  <dd><a href="/zjtr/admin.php/Top/od">Samples and Discounts</a></dd> -->
    <!-- <dd><a href="/zjtr/admin.php/Top/client">clients</a></dd> -->
  <!--   <dd><a href="/zjtr/admin.php/Top/rl">Custom Research and Services</a></dd> -->
   <!-- <dd><a href="/zjtr/admin.php/Top/sg">Shopping Guide</a></dd> -->
   </dl>
   </li>
   <li>
   <dl>
    <dt>后台登录设置</dt>
    <dd><a href="/zjtr/admin.php/Admin/admin">管理员</a></dd>
>>>>>>> origin/liushuai
=======
    <dd><a href="/fyls/admin.php/Authority/authority">权限管理</a></dd>
>>>>>>> origin/yaobolun
=======
    <dd><a href="/fyls/admin.php/Authority/authority">权限管理</a></dd>
    


>>>>>>> origin/zhiwang
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
       <h2 class="fl">管理员列表</h2>
       
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
       <a href="/fyls/Admin/Admin/admin_add" class="fr top_rt_btn add_icon">添加管理员</a>
=======
       <a href="/zjtr/Admin/Admin/admin_add" class="fr top_rt_btn add_icon">添加管理员</a>
>>>>>>> origin/liushuai
=======
       <a href="/fyls/Admin/Admin/admin_add" class="fr top_rt_btn add_icon">添加管理员</a>
>>>>>>> origin/yaobolun
=======
       <a href="/fyls/Admin/Admin/admin_add" class="fr top_rt_btn add_icon">添加管理员</a>
>>>>>>> origin/zhiwang
      </div>
      <table class="table">
       <tr>
        <th>编号</th>
        <th>管理员名称</th>
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        <th>最后修改时间</th>
=======
>>>>>>> origin/liushuai
=======
        <th>最后修改时间</th>
>>>>>>> origin/yaobolun
=======

        <th>最后修改时间</th>

>>>>>>> origin/zhiwang
        <th>操作</th>
       </tr>
       <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><tr>
        <td class="center"><?php echo ($key+1); ?></td>
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> origin/yaobolun
=======
>>>>>>> origin/zhiwang
        <td class="center"><?php echo ($arr["name"]); ?></td>
        <td class="center"><?php echo ($arr["updatetime"]); ?></td>
        
        <td class="center">
         <a href="/fyls/Admin/Admin/admin_update?id=<?php echo ($arr["id"]); ?>" title="编辑" class="link_icon">&#101;</a>

         <a href="/fyls/Admin/Admin/admin_del?id=<?php echo ($arr["id"]); ?>" title="删除" class="link_icon">&#100;</a>
<<<<<<< HEAD
<<<<<<< HEAD
=======
         
        <td class="center"><?php echo ($arr["name"]); ?></td>
        
        <td class="center">
         <a href="/zjtr/Admin/Admin/admin_mod?id=<?php echo ($arr["id"]); ?>" title="编辑" class="link_icon">&#101;</a>
         <a href="/zjtr/Admin/Admin/admin_del?id=<?php echo ($arr["id"]); ?>" title="删除" class="link_icon">&#100;</a>
>>>>>>> origin/liushuai
=======
>>>>>>> origin/yaobolun
=======
>>>>>>> origin/zhiwang
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