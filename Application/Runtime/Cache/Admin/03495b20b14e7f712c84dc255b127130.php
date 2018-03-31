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

<!--       <?php if(isset($_SESSION['b'])): ?><dd><a class="dd" href="/fyls/admin.php/Leave/leavelist1">请假列表</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Travel/travel">外出列表</a></dd>
      <?php else: endif; ?> -->
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
       <h2 class="fl">请假列表</h2>
       <a href="/fyls/Admin/Leave/add_leave" class="fr top_rt_btn add_icon">申请请假</a>
      </div>
      <section class="mtb">

      </section>
      <table class="table">
       <tr>
        <th>ID</th>
        <th>申请人</th>
        <th>请假开始时间</th>
        <th>请假结束时间</th>
        <th>请假原因</th>
        <th>假条状态</th>
        <th>操作</th>
       </tr>
       <?php if(is_array($show)): $i = 0; $__LIST__ = $show;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$show): $mod = ($i % 2 );++$i;?><tr>
        <td class="center"><?php echo ($show["id"]); ?></td>
        <td class="center"><?php echo ($show["applicant"]); ?></td>
        <td class="center"><?php echo ($show["start_time"]); ?></td>
        <td class="center"><?php echo ($show["end_time"]); ?></td>
        <td class="flow" title="<?php echo ($show["leave_reason"]); ?>"><?php echo ($show["leave_reason"]); ?></td>
        <?php if($show["flag"] == 0): ?><td class="center">未审批</td>
        <?php elseif($show["flag"] == 1): ?>
          <td style="color:blue;" class="center">审批中</td>
        <?php elseif($show["flag"] == 2): ?>
          <td style="color:#CC0066;" class="center" onclick="wcz(<?php echo ($show["id"]); ?>)" ><button class="layui-btn layui-btn-sm layui-btn-normal">回来请点击</button></td>
        <?php elseif($show["flag"] == 3): ?>
          <td style="color:red;" class="center">未通过</td>
          <?php elseif($show["flag"] == 4): ?>
          <td style="color:#000099;" class="center">请等待主管确认</td>
        <?php elseif($show["flag"] == 5): ?>
          <td style="color:#00FF00;" class="center">已完成</td><?php endif; ?>
        <td class="center">
<!--         <?php if($show["flag"] == 1): ?><a disabled="disabled" onclick="sp();" class="link_icon">&#101;</a>
        <?php elseif($show["flag"] == 2): ?>
          <a disabled="disabled" onclick="qq();" class="link_icon">&#101;</a>
        <?php else: ?>
          <a href="/fyls/Admin/Leave/leave_edit?id=<?php echo ($show["id"]); ?>" title="编辑" class="link_icon">&#101;</a><?php endif; ?>
        <?php if($show["flag"] == 1): ?><a disabled="disabled" onclick="sp();" class="link_icon">&#100;</a>
        <?php elseif($show["flag"] == 2): ?>
          <a disabled="disabled" onclick="sp();" class="link_icon">&#100;</a>
        <?php else: ?>
          <a href="/fyls/Admin/Leave/leave_del?id=<?php echo ($show["id"]); ?>" title="删除" class="link_icon">&#100;</a><?php endif; ?> -->
        <button type="button" onclick="back(<?php echo ($show["id"]); ?>)" class="layui-btn layui-btn-primary">已回到公司</button>
        </td>
       </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      </table>
      <aside class="paging">
      <?php echo ($page); ?>
      </aside>
 </div>
</section>
<div class="wc">
  
</div>
<script type="text/javascript">
    function sp()
    {
      alert('审批过程中无法操作哦！');
    }
    function qq()
    {
      alert('无法操作哦！');
    }
    function wcz($id)
    {
      var b=confirm("如果您已经回到公司请点击确认，等待主管查看！");
      if(b){
        location.href = "<?php echo C('HOME_PATH');?>"+'/Leave/goout?id='+($id);
      }else{
        return false;
      }
    }
    function back($id)
    {
      var a = confirm('确定TA已经回到公司吗？');
      if(a){
        var id = $id;
              $.ajax({
                type:"POST",
                url:"/fyls/admin.php/Leave/back",
                data:{"id":"id"},
                dataType:"json",
                success:function($data){
                  alert($data);
                  location.reload();
                }
              });
      }else{
        return false;
      }
    }
</script>
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