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


<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">到账配备信息添加</h2>
       <?php
 $a = explode('=',$_SERVER['QUERY_STRING']); ?>
       <a href="/fyls/Admin/Arrival/info?id=<?php echo ($a[1]); ?>" class="fr top_rt_btn add_icon">返回到账详情</a>
      </div>
     <section>
     <form action="" method="post" enctype="multipart/form-data">
      <ul class="ulColumn2">
      <table class="table">
      <tr>
        <th>企业价格</th>
        <td><input type="text" class="textbox textbox_295" placeholder="企业注册资金" name="aequipment_aenterprise" required="required"/></td>
        <th>签约年限</th>
        <td>
        <div class="layui-input-inline">
        <input type="text" class="textbox textbox_295" id="test5" placeholder="合同签约年份" name="aequipment_contrac" required="required"/>
          </div>
        </td>
      </tr>
      <tr>
        <th>配备人才</th>
        <td><input type="text" class="textbox textbox_295" placeholder="姓名" name="aequipment_qualified" required="required"/></td>
        <th>级别</th>
        <td>
        <select name="aequipment_level" required="required" style='width:307px;height:38px;border: 1px #4fa3d3 solid;'>
        <option value="">--请选择--</option>
        <option value="一级">一级</option>
        <option value="二级">二级</option>
        <option value="中级">中级</option>
        <option value="高级">高级</option>
        <option value="初级">初级</option>
        <option value="注册类">注册类</option>
        <option value="八大员">八大员</option>
        <option value="技工">技工</option>
        </select>
        <!-- <input type="text" class="textbox textbox_295" placeholder="申请人所在公司级别" name="aequipment_level" required="required"/> -->
        </td>
      </tr>
      <tr>
        <th>专业</th>
        <td><input type="text" class="textbox textbox_295" placeholder="专业" name="aequipment_major" required="required"/></td>
        <th>人才价格</th>
        <td><input type="text" class="textbox textbox_295" placeholder="人才价格" name="aequipment_talent" required="required"/></td>
      </tr>
      <tr>
        <th>请选择客服</th>
        <td>
          <select name="aequipment_customer" required="required" style='width:307px;height:38px;border: 1px #4fa3d3 solid;'>
            <option value="">--请选择--</option>
            <?php if(is_array($kefu)): foreach($kefu as $key=>$kefu): ?><option value="<?php echo ($kefu["id"]); ?>">
                      <?php echo ($kefu["name"]); ?>
                </option><?php endforeach; endif; ?>
          </select>
       </td>
       </tr>
      <?php
 $a = explode('=',$_SERVER['QUERY_STRING']); ?>
      <input type="hidden" name="aid" value="<?php echo $a[1];?>">
       </table>
       <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="submit" class="link_btn" name="sub" />
       </li>
      </ul>
      </form>
     </section>
 </div>
</section>
 <script src="/fyls/Public/admin/js/jquery.js"></script>
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