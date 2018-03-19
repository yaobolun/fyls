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
    <dd><a href="/fyls/admin.php/Order/order">快递列表</a></dd>
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
       <h2 class="fl">人员资料修改</h2>
       <a class="fr top_rt_btn" href="/fyls/Admin/People/people">返回人员列表</a>
      </div>
     <section>
     <form action="" method="post"  enctype="multipart/form-data">
      <ul class="ulColumn2">
       <li>
        <span class="item_name" style="width:120px;">人员名称：</span>
        <input type="text" class="textbox textbox_295" value="<?php echo ($sel["name"]); ?>" name="title" />
       </li>
        <li>
        <span class="item_name" style="width:120px;">部门：</span>
        <select name="department_id" id="department_id" style='width:307px;height:38px;border: 1px #4fa3d3 solid;' onchange="changeDep()">
          <?php if(is_array($dep)): foreach($dep as $key=>$department): ?><option  value="<?php echo ($department["id"]); ?>" <?php if($department['id'] == $sel['department_id']){ echo "selected='selected'";}?>>
                    <?php echo ($department["department_name"]); ?>
              </option><?php endforeach; endif; ?>
        </select>
        <!-- <input type="text" class="textbox textbox_295" id="pass" placeholder="" name="department_id" /> -->
        
       </li>

       <li>
        <span class="item_name" style="width:120px;">岗位：</span>
        <select name="station_id" style='width:307px;height:38px;border: 1px #4fa3d3 solid;' >
          <?php if(is_array($sta)): foreach($sta as $key=>$station): ?><option  value="<?php echo ($station["id"]); ?>" <?php if($station['id'] == $sel['station_id']){ echo "selected='selected'";}?>>
                    <?php echo ($station["station_name"]); ?>
              </option><?php endforeach; endif; ?>
        </select>
        <!-- <input type="text" class="textbox textbox_295" id="pass" placeholder="" name="station_id" /> -->
        
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
    if($("#pass").val()==''||$("#pass").val().length<1)
    {
      alert('Password cannot be empty and no less than 1 bits');
      return false;
    }
  }
  
</script>
<script type="text/javascript">
  function changeDep(){
     var department_id = $("#department_id").val();//得到第一个下拉列表的值
     $.ajax({
        url:"/fyls/admin.php/People/update",
        type:'POST',
        data:{'did':department_id},
        dataType: "json",
        success:function(data){
          alert(111);
        }
     });
  }

</script>
</body>
</html>