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

      <?php if(isset($_SESSION['b'])): ?><dd><a class="dd" href="/fyls/admin.php/Travel/travel">外出列表</a></dd>
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

<style type="text/css">
.ccc{   
    overflow: hidden;  
    text-overflow: ellipsis;  
    white-space: nowrap;  
    cursor: pointer;  
}  
</style>
<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">退款人才凭证申请列表</h2>
       <a href="/fyls/Admin/Voucher/voucher_add" class="fr top_rt_btn add_icon">添加退款人才凭证申请</a>
      </div>
      <table class="table">
        <tr>
        <th>申请人</th>
        <th>本次到账日期</th>
        <th>配备企业</th>
        <th>合同价格</th>
        <th>到账金额</th>
        <th>审批状态</th>
        <th>操作</th>
       </tr>
       <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><tr>
        <td class="center ccc" title="<?php echo ($arr["voucher_applicant"]); ?>"><?php echo ($arr["voucher_applicant"]); ?></td>
        <td class="center ccc" title="<?php echo ($arr["voucher_account"]); ?>"><?php echo ($arr["voucher_account"]); ?></td>
        <td class="center ccc" title="<?php echo ($arr["voucher_equip"]); ?>"><?php echo ($arr["voucher_equip"]); ?></td>
        <td class="center ccc" title="<?php echo ($arr["voucher_contract"]); ?>"><?php echo ($arr["voucher_contract"]); ?></td>
        <td class="center ccc" title="<?php echo ($arr["voucher_contract"]); ?>"><?php echo ($arr["voucher_contract"]); ?></td>
        <?php if($arr["status"] == 0): ?><td class="center">未审批</td>
        <?php elseif($arr["status"] == 1): ?>
          <td style="color:blue;" class="center">审批中</td>
        <?php elseif($arr["status"] == 2): ?>
          <td style="color:red;" class="center">已审批</td><!--   <button class="layui-btn">默认按钮</button> -->
        <?php elseif($arr["status"] == 3): ?>
          <td style="color:#00FF00;" class="center">未通过</td><?php endif; ?>
        <td class="center">
        <?php if($arr["status"] == 1): ?><a disabled="disabled" onclick="sp();" class="link_icon">&#101;</a>
        <?php elseif($arr["status"] == 2): ?>
          <a disabled="disabled" onclick="qq();" class="link_icon">&#101;</a>
        <?php else: ?>
        <a href="/fyls/Admin/Voucher/voucher_mod?id=<?php echo ($arr["id"]); ?>" title="编辑" class="link_icon">&#101;</a><?php endif; ?>
        <?php if($arr["status"] == 1): ?><a disabled="disabled" onclick="sp();" class="link_icon">&#100;</a>
        <?php else: ?>
        <a href="/fyls/Admin/Voucher/del?id=<?php echo ($arr["id"]); ?>" title="删除" class="link_icon">&#100;</a>
        <a href="/fyls/Admin/Voucher/info?id=<?php echo ($arr["id"]); ?>" title="详细信息">详细信息</a><?php endif; ?>
       </td>
       </tr><?php endforeach; endif; else: echo "" ;endif; ?>
       <a href="/fyls/admin.php/Voucher/look"><button class="layui-btn layui-btn-primary">导出Excel表格</button></a>
      </table>
      <aside class="paging">
      <?php echo ($page); ?>
      </aside>
 </div>
</section>
<script type="text/javascript">
    function sp()
    {
      alert('审批过程中不能操作哦！');
    }
    function qq()
    {
      alert('无法操作哦！');
    }
</script>
</body>
</html>