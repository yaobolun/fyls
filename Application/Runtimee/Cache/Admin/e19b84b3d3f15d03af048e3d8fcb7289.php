<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>网站后台</title>
<meta name="author" content="DeathGhost" />

<style type="text/css">
.dd{
  margin: 0;
  height: 40px;
  line-height: 40px;
/*  border-bottom: 1px #e9e9e9 dotted;*/
  border-bottom-width: 1px;
  border-bottom-style: dotted;
  border-bottom-color: rgb(233, 233, 233);
  display: block;
  padding-left:15px;
}
</style>

<link rel="stylesheet" type="text/css" href="/fyls/Public/admin/css/style.css">
<link rel="stylesheet" href="/fyls/Public/layui/css/layui.css"  media="all">
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
<header>
 <h1><img src="/fyls/Public/admin/images/admin_logo.png"/></h1>
 <ul class="rt_nav">
  <li><a href="/fyls/admin.php/Personal/personal" class="website_icon"><?php echo (session('name')); ?> </a></li>
  <li><a href="/fyls/admin.php/Index/tc" class="quit_icon">安全退出</a></li>
 </ul>
</header>
<aside class="lt_aside_nav content mCustomScrollbar">
<div class="layui-collapse" lay-filter="test">

  <div class="layui-colla-item">
    <h1 class="layui-colla-title">财务管理</h1>
    <div class="layui-colla-content">
      <dd><a class="dd" href="/fyls/admin.php/Transfer/transfer">转账申请列表</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Arrival/arrival">到账申请列表</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Qualifications/qualifications">资质到账凭证申请列表</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Refund/refund">退款企业凭证申请列表</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Voucher/voucher">退款人才凭证申请列表</a></dd>
    </div>
  </div>
  <div class="layui-colla-item">
    <h1 class="layui-colla-title">请假外出</h1>
    <div class="layui-colla-content">
      <dd><a class="dd" href="/fyls/admin.php/Leave/leave_list">请假管理</a></dd>

      <dd><a class="dd" href="/fyls/admin.php/Travel/travel_list">外出管理</a></dd>

      <?php if(isset($_SESSION['b'])): ?><dd><a class="dd" href="/fyls/admin.php/Leave/leavelist1">请假列表</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Travel/travel">外出列表</a></dd>
      <?php else: endif; ?>
    </div>
  </div>
  <div class="layui-colla-item">
    <h1 class="layui-colla-title">快递信息</h1>
    <div class="layui-colla-content">
      <dd><a class="dd" href="/fyls/admin.php/Expre/expre_index">我的快递</a></dd>
        <?php if(isset($_SESSION['b'])): ?><dd><a class="dd" href="/fyls/admin.php/Expre/expre_index_list">快递列表</a></dd>
        <?php else: endif; ?>
    </div>
  </div>
  <?php if(!isset($_SESSION['a'])): ?><div class="layui-colla-item">
  <h1 class="layui-colla-title">审批管理</h1>
  <div class="layui-colla-content">
        <dd><a class="dd" href="/fyls/admin.php/Approval/leave">请假管理</a></dd>
        <dd><a class="dd" href="/fyls/admin.php/Permission/travel">外出管理</a></dd>
        <dd><a class="dd" href="/fyls/admin.php/Expre/express">快递管理</a></dd>
        <dd><a class="dd" href="/fyls/admin.php/Texamination/texamination">转账管理</a></dd>
        <dd><a class="dd" href="/fyls/admin.php/Aexamination/aexamination">到账管理</a></dd>
        <dd><a class="dd" href="/fyls/admin.php/Qexamination/qexamination">资质凭证到账凭证管理</a></dd>
        <dd><a class="dd" href="/fyls/admin.php/Rexamination/rexamination">退款企业凭证管理</a></dd>
        <dd><a class="dd" href="/fyls/admin.php/Vexamination/vexamination">退款人才凭证管理</a></dd>
  </div>
  </div>
  <div class="layui-colla-item">
    <h1 class="layui-colla-title">后台登录设置</h1>
    <div class="layui-colla-content">
      <dd><a class="dd" href="/fyls/admin.php/Parameter/parameter">参数</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Admin/admin">管理员</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Department/department">部门管理</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Station/station">岗位管理</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/People/people">人员管理</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Journal/journal">日志管理</a></dd>
    </div>
  </div>
</div>
  <?php else: endif; ?>

</aside>
<script>
layui.use(['element', 'layer'], function(){
  var element = layui.element;
  var layer = layui.layer;
});
</script>


<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">我要请假</h2>
       <a class="fr top_rt_btn" href="/fyls/Admin/Product/product">返回</a>
      </div>
     <section>

     <form action="/fyls/Admin/Leave/leave_edit" method="post">
      <ul class="ulColumn2">
       <li>
        <span class="item_name" style="width:200px;">申请人:</span>
        <input type="text" class="textbox textbox_295" placeholder="申请人..." value="<?php echo ($show["applicant"]); ?>" name="applicant" />
       </li>
       <li>
        <span class="item_name" style="width:200px;">请假原因:</span>
        <textarea style="height: 100px" type="text" class="textbox textbox_295" placeholder="请假理由..." name="leave_reason"><?php echo ($show["leave_reason"]); ?></textarea>
       </li>
       <li>
          <span class="item_name" style="width: 200px" >开始日期:</span>
          <div class="layui-input-inline">
            <input type="text" name="start_time" class="textbox textbox_295" value="<?php echo ($show["start_time"]); ?>" id="test5" placeholder="请假开始日期">
          </div>
       </li>
       <li>
          <span class="item_name" style="width: 200px" >结束日期:</span>
          <div class="layui-input-inline">
            <input type="text" name="end_time" class="textbox textbox_295" value="<?php echo ($show["end_time"]); ?>" id="test1" placeholder="请假结束日期">
          </div>
       </li>
       <li>
        <span class="item_name" style="width:200px;"></span>
        <input type="hidden" name="id" value="<?php echo ($show["id"]); ?>" />
        <input type="submit" name="sub" class="link_btn"/>
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