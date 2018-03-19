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

   </dl>
  </li>
  <li>
   <dl>
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
<<<<<<< HEAD:Application/Runtime/Cache/Admin/323984d28b26169905472d43989d6c70.php
<<<<<<< HEAD
=======
    <dd><a href="/fyls/admin.php/Authority/authority">权限管理</a></dd>
>>>>>>> origin/yaobolun
=======
    <dd><a href="/fyls/admin.php/Authority/authority">权限管理</a></dd>
    


>>>>>>> origin/zhiwang:Application/Runtime/Cache/Admin/950e4f67b0dddaf03a8f367024e1ac33.php
   </dl>
  </li>
  <li>
   <p class="btm_infor">© 小牛在线 技术支持</p>
  </li>
 </ul>
</aside>

<<<<<<< HEAD:Application/Runtime/Cache/Admin/323984d28b26169905472d43989d6c70.php
<<<<<<< HEAD

=======
>>>>>>> origin/yaobolun
=======
<style type="text/css">
.flow{
    width: 176px;
    height: 20px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer;
}
</style>
>>>>>>> origin/zhiwang:Application/Runtime/Cache/Admin/950e4f67b0dddaf03a8f367024e1ac33.php
<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">请假审批</h2>
       
       <a href="#" class="fr top_rt_btn add_icon">啊啊啊</a>
  <!--      <a href="/fyls/Admin/Product/user" class="fr top_rt_btn add_icon">批量导入产品</a>
       <a href="/fyls/Admin/Product/excel_out" class="fr top_rt_btn add_icon">批量导出产品</a> -->
      </div>
      <section class="mtb">

       <form action="" method="post">
       <input type="text" class="textbox textbox_225" placeholder="输入标题..." name="name"/>
       <input type="submit" value="查询" class="group_btn" name="sub"/>
       </form>

      </section>
      <table class="table">
       <tr>

        <th>申请人</th>
        <th>请假开始时间</th>
        <th>请假结束时间</th>
        <th>请假理由</th>
        <th>假条详情</th>
       </tr>
       <?php if(is_array($show)): $i = 0; $__LIST__ = $show;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$show): $mod = ($i % 2 );++$i;?><tr>
        <td class="center"><?php echo ($show["applicant"]); ?></td>
        <td class="center"><?php echo ($show["start_time"]); ?></td>
        <td class="center"><?php echo ($show["end_time"]); ?></td>
        <td class="center flow" title="<?php echo ($show["leave_reason"]); ?>"><?php echo ($show["leave_reason"]); ?></td>

        <td class="center">
         <a href="/fyls/Admin/Approval/leaveinfo?id=<?php echo ($show["id"]); ?>" title="查看详情" class="">查看</a>
        </td>
       </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      </table>
      <aside class="paging">
      <?php echo ($page); ?>
      </aside>
 </div>
</section>

<!-- <script type="text/javascript">
  function set(id) {
      var a=confirm("确认发货吗?");
      if(a){
          location.href = <?php echo "'".C('HOME_PATH')."'";?>+'/Order/send?id='+id;
  }else{
      return false;
    }
  }
</script> -->
</body>
</html>