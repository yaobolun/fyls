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
       <h2 class="fl">退款凭证申请列表</h2>
       <a href="/fyls/Admin/Refund/refund" class="fr top_rt_btn add_icon">返回退款凭证申请列表</a>
      </div>
     <section>
     <form action="/fyls/Admin/Refund/refund_doadd" method="post" enctype="multipart/form-data">
      <ul class="ulColumn2">
      <table class="table">
      <tr>
        <th>申请人</th>
        <td><input type="text" class="textbox textbox_295" placeholder="退款申请人姓名" name="refund_applicant" required="required"/></td>
        <th>配出年月</th>
        <td>
        <div class="layui-input-inline">
        <input type="text" class="textbox textbox_295" id="test5" placeholder="现金的年月日" name="refund_match" required="required"/>
          </div>
        </td>
      </tr>
      <tr>
        <th>配备企业</th>
        <td><input type="text" class="textbox textbox_295" placeholder="公司名称" name="refund_equip" required="required"/></td>
        <th>合同价格</th>
        <td><input type="text" class="textbox textbox_295" placeholder="合同上的价格" name="refund_contract" required="required"/></td>
      </tr>
      <tr>
        <th>备注</th>
        <td><input type="text" class="textbox textbox_295" placeholder="说明" name="refund_remarks" required="required"/></td>
        <th>已到账金额</th>
        <td><input type="text" class="textbox textbox_295" placeholder="人民币（大写） ￥全款  预付款 尾款 介绍费" name="refund_account" required="required"/></td>
      </tr>
      <tr>
        <th>户名</th>
        <td><input type="text" class="textbox textbox_295" placeholder="收款人姓名" name="refund_name" required="required"/></td>
        <th>本次打款金额</th>
        <td><input type="text" class="textbox textbox_295" placeholder="人民币（大写） ￥全款  预付款 尾款 介绍费" name="refund_money" required="required"/></td>
      </tr>
      <tr>
        <th>开户行</th>
        <td><input type="text" class="textbox textbox_295" placeholder="开户的所在银行" name="refund_bank" required="required"/></td>
        <th>账号</th>
        <td><input type="text" class="textbox textbox_295" placeholder="开户时的账户号" name="refund_number" required="required"/></td>
      </tr>
      <tr>
        <th>请选择您的主管</th>
        <td>
          <select name="zid" required="required" style='width:307px;height:38px;border: 1px #4fa3d3 solid;'>
            <option value="">--请选择--</option>
            <?php if(is_array($user)): foreach($user as $key=>$user): ?><option value="<?php echo ($user["id"]); ?>">
                      <?php echo ($user["name"]); ?>
                </option><?php endforeach; endif; ?>
          </select>
       </td>
       </tr>
       <!-- <li>
        <span class="item_name" style="width:120px;">申请人：</span>
        <input type="text" class="textbox textbox_295" placeholder="退款申请人姓名" name="refund_applicant" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">配出年月：</span>
        <input type="text" class="textbox textbox_295" placeholder="现金的年月日" name="refund_match" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">配备企业：</span>
        <input type="text" class="textbox textbox_295" placeholder="公司名称" name="refund_equip" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">合同价格：</span>
        <input type="text" class="textbox textbox_295" placeholder="合同上的价格" name="refund_contract" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">备注：</span>
        <textarea type="text" class="textbox textbox_295" placeholder="说明" name="refund_remarks" required="required"/></textarea>
       </li>
       <li>
        <span class="item_name" style="width:120px;">已到账金额：</span>
        <input type="text" class="textbox textbox_295" placeholder="人民币（大写） ￥全款  预付款 尾款 介绍费" name="refund_account" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">户名：</span>
        <input type="text" class="textbox textbox_295" placeholder="收款人姓名" name="refund_name" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">本次打款金额：</span>
        <input type="text" class="textbox textbox_295" placeholder="人民币（大写） ￥全款  预付款 尾款 介绍费" name="refund_money" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">开户行：</span>
        <input type="text" class="textbox textbox_295" placeholder="开户的所在银行" name="refund_bank" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">账号：</span>
        <input type="text" class="textbox textbox_295" placeholder="开户时的账户号" name="refund_number" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">企业价格：</span>
        <input type="text" class="textbox textbox_295" placeholder="企业注册资金" name="refund_enterprise" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">签约年限：</span>
        <input type="text" class="textbox textbox_295" placeholder="申请人与公司签约年份" name="refund_contractyears" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">配备人才：</span>
        <input type="text" class="textbox textbox_295" placeholder="本人" name="refund_qualified" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">级别：</span>
        <input type="text" class="textbox textbox_295" placeholder="级别" name="refund_level" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">专业：</span>
        <input type="text" class="textbox textbox_295" placeholder="专业" name="refund_major" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">人才价格：</span>
        <input type="text" class="textbox textbox_295" placeholder="人才价格" name="refund_talent" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">客服：</span>
        <input type="text" class="textbox textbox_295" placeholder="客服" name="refund_customer" required="required"/>
       </li> -->
       </table>
       <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="hidden" name="status" value="0"/>
        <input type="hidden" name="tid" value="<?php echo (session('id')); ?>" />
        <input type="hidden" name="department_id" value="<?php echo (session('department_id')); ?>"/>
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