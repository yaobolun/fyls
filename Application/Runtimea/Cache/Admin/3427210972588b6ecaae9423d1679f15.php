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
      <dd><a class="dd" href="/fyls/admin.php/Leave/leave_list">我的请假</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Travel/travel_list">我的外出</a></dd>

<<<<<<< HEAD:Application/Runtimea/Cache/Admin/3427210972588b6ecaae9423d1679f15.php
<!--       <?php if(isset($_SESSION['b'])): ?><dd><a class="dd" href="/fyls/admin.php/Leave/leavelist1">请假列表</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Travel/travel">外出列表</a></dd>
      <?php else: endif; ?> -->
=======
      <?php if(isset($_SESSION['b'])): ?><dd><a class="dd" href="/fyls/admin.php/Leave/leavelist1">请假列表</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Travel/travel">外出列表</a></dd>
      <?php else: endif; ?>
>>>>>>> origin/liushuai:Application/Runtime/Cache/Admin/3427210972588b6ecaae9423d1679f15.php
    </div>
  </div>
  <div class="layui-colla-item">
    <h1 class="layui-colla-title">快递信息</h1>
    <div class="layui-colla-content">
      <dd><a class="dd" href="/fyls/admin.php/Expre/expre_index">我的快递</a></dd>
<!--         <?php if(isset($_SESSION['b'])): ?><dd><a class="dd" href="/fyls/admin.php/Expre/expre_index_list">快递列表</a></dd>
        <?php else: endif; ?> -->
    </div>
  </div>
  <?php if(!isset($_SESSION['a'])): ?><div class="layui-colla-item">
  <h1 class="layui-colla-title">审批管理</h1>
  <div class="layui-colla-content">
      <?php if(isset($_SESSION['b'])): ?><dd><a class="dd" href="/fyls/admin.php/Leave/leavelist1">请假列表</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Travel/travel">外出列表</a></dd>
      <?php else: endif; ?>
      <?php if(isset($_SESSION['b'])): ?><dd><a class="dd" href="/fyls/admin.php/Expre/expre_index_list">快递列表</a></dd>
        <?php else: endif; ?>
        <dd><a class="dd" href="/fyls/admin.php/Approval/leave">请假审批</a></dd>
        <dd><a class="dd" href="/fyls/admin.php/Permission/travel">外出审批</a></dd>
        <dd><a class="dd" href="/fyls/admin.php/Expre/express">快递审批</a></dd>
        <dd><a class="dd" href="/fyls/admin.php/Texamination/texamination">转账管理</a></dd>
        <dd><a class="dd" href="/fyls/admin.php/Aexamination/aexamination">到账管理</a></dd>
        <dd><a class="dd" href="/fyls/admin.php/Qexamination/qexamination">资质凭证到账凭证管理</a></dd>
        <dd><a class="dd" href="/fyls/admin.php/Rexamination/rexamination">退款企业凭证管理</a></dd>
        <dd><a class="dd" href="/fyls/admin.php/Vexamination/vexamination">退款人才凭证管理</a></dd>
  </div>
  </div>
    <?php else: endif; ?>
  <?php if($_SESSION['administration'] == 0): ?><div class="layui-colla-item">
    <h1 class="layui-colla-title">后台设置</h1>
    <div class="layui-colla-content">
<<<<<<< HEAD:Application/Runtimea/Cache/Admin/3427210972588b6ecaae9423d1679f15.php

=======
>>>>>>> origin/liushuai:Application/Runtime/Cache/Admin/3427210972588b6ecaae9423d1679f15.php
      <!-- <dd><a class="dd" href="/fyls/admin.php/Parameter/parameter">参数</a></dd> -->
      <dd><a class="dd" href="/fyls/admin.php/Admin/admin">管理员</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Department/department">部门管理</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Station/station">岗位管理</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/People/people">人员管理</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Journal/journal">日志管理</a></dd>
    </div>
  </div>
  <?php else: endif; ?>
</div>


</aside>
<script>
layui.use(['element', 'layer'], function(){
  var element = layui.element;
  var layer = layui.layer;
});
</script>

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
<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">资质到账凭证审批</h2>

      </div>
      <table class="table">
       <tr>
        <th>日期</th>
        <th>市场部客服</th>
        <th>申请人</th>
        <th>企业名称</th>
        <th>资质名称</th>
        <th>操作</th>
       </tr>
       <?php if(is_array($show)): $i = 0; $__LIST__ = $show;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$show): $mod = ($i % 2 );++$i;?><tr>
        <td class="center"><?php echo ($show["qualifications_date"]); ?></td>
        <td class="center"><?php echo ($show["qualifications_customer"]); ?></td>
        <td class="center"><?php echo ($show["qualifications_applicant"]); ?></td>
        <td class="center flow" title="<?php echo ($show["qualifications_enterprise"]); ?>"><?php echo ($show["qualifications_enterprise"]); ?></td>
        <td class="center flow" title="<?php echo ($show["qualifications_aptitude"]); ?>"><?php echo ($show["qualifications_aptitude"]); ?></td>
        <td class="center">
         <a href="/fyls/Admin/Qexamination/info?id=<?php echo ($show["id"]); ?>" title="查看详情" class="">查看</a>
        </td>
       </tr><?php endforeach; endif; else: echo "" ;endif; ?>
       <?php if(is_array($renshi)): $i = 0; $__LIST__ = $renshi;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$renshi): $mod = ($i % 2 );++$i;?><tr>
        <td class="center"><?php echo ($renshi["qualifications_date"]); ?></td>
        <td class="center"><?php echo ($renshi["qualifications_customer"]); ?></td>
        <td class="center"><?php echo ($renshi["qualifications_applicant"]); ?></td>
        <td class="center flow" title="<?php echo ($renshi["qualifications_enterprise"]); ?>"><?php echo ($renshi["qualifications_enterprise"]); ?></td>
        <td class="center flow" title="<?php echo ($renshi["qualifications_aptitude"]); ?>"><?php echo ($renshi["qualifications_aptitude"]); ?></td>
        <td class="center">
         <a href="javascript:;" title="人事无法操作" class="">人事无法操作</a>
        </td>
       </tr><?php endforeach; endif; else: echo "" ;endif; ?>
       <?php if(is_array($guanli)): $i = 0; $__LIST__ = $guanli;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$guanli): $mod = ($i % 2 );++$i;?><tr>
        <td class="center"><?php echo ($guanli["qualifications_date"]); ?></td>
        <td class="center"><?php echo ($guanli["qualifications_customer"]); ?></td>
        <td class="center"><?php echo ($guanli["qualifications_applicant"]); ?></td>
        <td class="center flow" title="<?php echo ($guanli["qualifications_enterprise"]); ?>"><?php echo ($guanli["qualifications_enterprise"]); ?></td>
        <td class="center flow" title="<?php echo ($guanli["qualifications_aptitude"]); ?>"><?php echo ($guanli["qualifications_aptitude"]); ?></td>
        <td class="center">
         <a href="javascript:;" title="管理员无法操作" class="">管理员无法操作</a>
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