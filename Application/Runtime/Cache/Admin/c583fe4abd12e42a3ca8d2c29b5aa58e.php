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
    </div>
  </div>
  <div class="layui-colla-item">
    <h1 class="layui-colla-title">快递信息</h1>
    <div class="layui-colla-content">
      <dd><a class="dd" href="/fyls/admin.php/Expre/expre_index">快递列表</a></dd>
    </div>
  </div>
  <?php if(session('administration') == 0): ?><div class="layui-colla-item">
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
       <h2 class="fl">退款企业凭证详情</h2>
<!--        <a class="fr top_rt_btn" href="/fyls/Admin/Product/product">返回</a> -->
      </div>
     <section>
     <form id="form" action="/fyls/Admin/Rexamination/adopt" method="post">
     <input type="hidden" name="bm_sp" value="<?php echo ($find["bm_sp"]); ?>">
     <input type="hidden" name="id" value="<?php echo ($find["id"]); ?>">
     <input type="hidden" name="status" value="<?php echo ($find["status"]); ?>">
     <table class="layui-table" style="width:900px; height:300px;">
        <thead>
          <tr>
            <th colspan="4" style="height:30px;text-align:center;"><h1><b>到账单</b></h1></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="width:50px;">申请人：</td>
            <td  style="width:100px;"><?php echo ($find["refund_applicant"]); ?></td>
            <td style="width:50px;">配出年月：</td>
            <td  class="b" title="<?php echo ($find["refund_match"]); ?>" style="width:100px;"><?php echo ($find["refund_match"]); ?></td>
          </tr><tr>
            <td style="width:50px;">配出企业：</td>
            <td  style="width:100px;"><?php echo ($find["refund_equip"]); ?></td>
            <td style="width:50px;">合同价格：</td>
            <td  style="width:100px;"><?php echo ($find["refund_contract"]); ?></td>
          </tr>
          <tr>
            <td style="width:50px;">备注：</td>
            <td  style="width:100px;"><?php echo ($find["refund_remarks"]); ?></td>
            <td style="width:50px;">已到账价格：</td>
            <td style="width:100px;"><?php echo ($find["refund_account"]); ?></td>
          </tr><tr>
            <td style="width:50px;">户名：</td>
            <td  style="width:100px;"><?php echo ($find["refund_name"]); ?></td>
            <td style="width:50px;">本次打款金额：</td>
            <td  style="width:100px;"><?php echo ($find["refund_money"]); ?></td>
          </tr>
          <tr>
            <td style="width:50px;">开户行：</td>
            <td  style="width:100px;"><?php echo ($find["refund_bank"]); ?></td>
            <td style="width:50px;">账号：</td>
            <td  style="width:100px;"><?php echo ($find["refund_number"]); ?></td>
          </tr>
          <tr>
            <td>部门主管</td>
            <td>
			       <?php echo ($uname); ?>
            </td>
            <td>
              <button type="button" class="layui-btn layui-btn-primary layui-btn-lg" onclick="yes()">通过</button></td>
            <td>
              <button type="button" class="layui-btn layui-btn-primary layui-btn-lg" onclick="Not(<?php echo ($find["id"]); ?>)">残忍拒绝</button>
            </td>
          </tr>
        </tbody>
        <?php echo ($page); ?>
      </table>
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

    function yes()
    {
     var a=confirm("确认通过吗?");
      	  if(a){
            $("#form").submit();
      		}else{
            return false;
          }
    }
    function Not($id)
    {
      var b=confirm("您将要拒绝了！");
      if(b){
        location.href = "<?php echo C('HOME_PATH');?>"+'/Rexamination/Not?id='+($id);
      }else{
        return false;
      }
    }

</script>
</body>
</html>