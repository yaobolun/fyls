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
    <dd><a href="/fyls/admin.php/Product/product">申请转账</a></dd>
    
    <dd><a href="/fyls/admin.php/New/news">申请到账</a></dd>
    <dd><a href="/fyls/admin.php/Pclass/col">资质到账</a></dd>
    <!-- <dd><a href="/fyls/admin.php/Col/col">产品颜色</a></dd> -->

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
    <dd><a href="/fyls/admin.php/Express/express">快递列表</a></dd>
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
    <dd><a href="/fyls/admin.php/Authority/authority">权限管理</a></dd>
    <dd><a href="/fyls/admin.php/Journal/journal">日志管理</a></dd>
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
       <h2 class="fl">权限列表</h2>
       
       <a href="/fyls/Admin/Authority/add" class="fr top_rt_btn add_icon">添加权限</a>
      </div>
      <table class="table">
       <tr>
        <th>岗位</th>
        <!-- <th>权限名称</th> -->
        <?php
 foreach($arr as $k=>$v){ ?>
              <th class="gwhc_table_headCell" style="width: 9%;"><?php echo $v['authority'];?></th>
        <?php
 } ?>
        <th>操作</th>
       </tr>
      
<?php  foreach($sta_name as $k=>$v){ ?>       
       <tr>
        <td class="center"><?php echo $v['station_name']?></td>
  <?php
 foreach($arr as $k1=>$v1){ ?>      
        <td class="center"><span><?php  $a = array("sta_name"=>$v['station_name']); $b = array("auth_name"=>$v1['authority']); $needle = array('a'=>$a,'d'=>$b); if (in_array($needle, $tasks)){ echo "√"; }else{ echo "×"; } ?></span></td>
  <?php
 } ?>       
        <td class="center">
        <a href="/fyls/Admin/Authority/update?id=<?php echo ($v["id"]); ?>" title="编辑" class="link_icon">&#101;</a>
         <a href="" title="删除" class="link_icon">&#100;</a>
         <!-- <a href="/fyls/Admin/Authority/update?id=<?php echo ($arr["id"]); ?>" title="编辑" class="link_icon">&#101;</a>
         <a href="/fyls/Admin/Authority/del?id=<?php echo ($arr["id"]); ?>" title="删除" class="link_icon">&#100;</a> -->
        </td>
       </tr>
       
<?php
} ?>     
      </table>
      <aside class="paging">
      <?php echo ($page); ?>
      </aside>
 </div>
</section>
</body>
</html>