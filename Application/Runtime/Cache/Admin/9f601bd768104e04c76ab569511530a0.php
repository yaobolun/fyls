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
.dd{  
    overflow: hidden;  
    text-overflow: ellipsis;  
    white-space: nowrap;  
    cursor: pointer;  
} 
</style>
<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">退款凭证企业申请详细信息</h2>
       <?php
 $a = explode('=',$_SERVER['QUERY_STRING']); ?>
       <a href="/fyls/Admin/Refund/refund" class="fr top_rt_btn add_icon">返回退款凭证企业申请列表</a>
       <a href="/fyls/Admin/Refund/refund_mod?id=<?php echo ($a[1]); ?>" class="fr top_rt_btn add_icon">编辑</a>
       <a href="/fyls/Admin/Requipment/requipment_add?id=<?php echo ($a[1]); ?>" class="fr top_rt_btn add_icon">添加退款凭证企业配备信息</a>
      </div>
      <table class="table">
      <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><tr>
        <th>申请人</th>
        <td class="center dd" title="<?php echo ($arr["refund_applicant"]); ?>"><?php echo ($arr["refund_applicant"]); ?></td>
        <th>配出年月</th>
        <td class="center dd" title="<?php echo ($arr["refund_match"]); ?>"><?php echo ($arr["refund_match"]); ?></td>
        </tr>
        <tr>
        <th>配备企业</th>
        <td class="center dd" title="<?php echo ($arr["refund_equip"]); ?>"><?php echo ($arr["refund_equip"]); ?></td>
        <th>合同价格</th>
        <td class="center dd" title="<?php echo ($arr["refund_contract"]); ?>"><?php echo ($arr["refund_contract"]); ?></td>
        </tr>
        <tr>
        <th>备注</th>
        <td class="center dd" title="<?php echo ($arr["refund_remarks"]); ?>"><?php echo ($arr["refund_remarks"]); ?></td>
        <th>已到账金额</th>
        <td class="center dd" title="<?php echo ($arr["refund_account"]); ?>"><?php echo ($arr["refund_account"]); ?></td>
        </tr>
        <tr>
        <th>户名</th>
        <td class="center dd" title="<?php echo ($arr["refund_name"]); ?>"><?php echo ($arr["refund_name"]); ?></td>
        <th>本次打款金额</th>
        <td class="center dd" title="<?php echo ($arr["refund_money"]); ?>"><?php echo ($arr["refund_money"]); ?></td>
        </tr>
        <tr>
        <th>开户行</th>
        <td class="center dd" title="<?php echo ($arr["refund_bank"]); ?>"><?php echo ($arr["refund_bank"]); ?></td>
        <th>账号</th>
        <td class="center dd" title="<?php echo ($arr["refund_number"]); ?>"><?php echo ($arr["refund_number"]); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      </table>

      <div class="page_title">
       <h2 class="fl">退款凭证企业配备信息</h2>
      </div>
  <table class="table">

   <tr>
   <th>企业价格</th>
   <th>签约年限</th>
   <th>配备人才</th>
   <th>级别</th>
   <th>专业</th>
   <th>人才价格</th>
   <th>客服</th>
   <th>操作</th>
  </tr>
       <?php if(is_array($aeq)): $i = 0; $__LIST__ = $aeq;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$uid): $mod = ($i % 2 );++$i;?><tr>
        <td class="center dd" title="<?php echo ($uid["requipment_enterprise"]); ?>"><?php echo ($uid["requipment_enterprise"]); ?></td>
        <td class="center dd" title="<?php echo ($uid["requipment_contractyears"]); ?>"><?php echo ($uid["requipment_contractyears"]); ?></td>
        <td class="center dd" title="<?php echo ($uid["requipment_qualified"]); ?>"><?php echo ($uid["requipment_qualified"]); ?></td>
        <td class="center dd" title="<?php echo ($uid["requipment_level"]); ?>"><?php echo ($uid["requipment_level"]); ?></td>
        <td class="center dd" title="<?php echo ($uid["requipment_major"]); ?>"><?php echo ($uid["requipment_major"]); ?></td>
        <td class="center dd" title="<?php echo ($uid["requipment_talent"]); ?>"><?php echo ($uid["requipment_talent"]); ?></td>
        <td class="center dd" title="<?php echo ($uid["name"]); ?>"><?php echo ($uid["name"]); ?></td>
        <td class="center">
        <a href="/fyls/Admin/Requipment/requipment_mod?id=<?php echo ($uid["id"]); ?>" title="编辑" class="link_icon">&#101;</a>
        <a href="/fyls/Admin/Requipment/del?id=<?php echo ($uid["id"]); ?>" title="删除" class="link_icon">&#100;</a>
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