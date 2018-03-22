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
        <dd><a href="/fyls/admin.php/Refund/refund">退款企业凭证申请列表</a></dd>
    <dd><a href="/fyls/admin.php/Voucher/voucher">退款人才凭证申请列表</a></dd>
    </dl>
  </li>
  <li>
   <dl>
    <!-- <dd><a href="/fyls/admin.php/Col/col">产品颜色</a></dd> -->
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
    <dd><a href="/fyls/admin.php/Express/express">快递列表</a></dd>
   </dl>
  </li>
   <dl>
    <dt>网站栏目管理</dt>
    <dd><a href="/fyls/admin.php/Lanmu/lanmu">栏目名称及图标</a></dd>
   </dl>
  </li>  
   </dl>
  </li>  
   <li>
   <dl>
    <dt>后台登录设置</dt>
    <dd><a href="/fyls/admin.php/Admin/admin">管理员</a></dd>
    <dd><a href="/fyls/admin.php/Transfer/transfer">转账申请列表</a></dd>
    <dd><a href="/fyls/admin.php/Arrival/arrival">到账申请列表</a></dd>
    <dd><a href="/fyls/admin.php/Qualifications/qualifications">资质凭证到账凭证申请列表</a></dd>
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

<!-- 
提出问题  分析问题 解决问题

干了什么 该干什么  有什么问题（早上） -->

<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">修改资质凭证到账凭证申请信息</h2>
       <a href="/fyls/Admin/Qualifications/qualifications" class="fr top_rt_btn add_icon">返回资质凭证到账凭证申请列表</a>
      </div>
     <section>
     <form action="" method="post"  enctype="multipart/form-data">
      <ul class="ulColumn2">
      <table class="table">
      <tr>
        <th>日期</th>
        <td><input type="text" class="textbox textbox_295" placeholder="到账的年月日" name="qualifications_date" value="<?php echo ($sel["qualifications_date"]); ?>" required="required"/></td>
        <th>市场部客服</th>
        <td><input type="text" class="textbox textbox_295" placeholder="市场部客服公司内部人员可选" name="qualifications_customer" value="<?php echo ($sel["qualifications_customer"]); ?>" required="required"/></td>
      </tr>
      <tr>
        <th>申请人</th>
        <td><input type="text" class="textbox textbox_295" placeholder="申请人联系方式" name="qualifications_applicant" value="<?php echo ($sel["qualifications_applicant"]); ?>" required="required"/></td>
        <th>企业名称</th>
        <td><input type="text" class="textbox textbox_295" placeholder="公司名称" name="qualifications_enterprise" value="<?php echo ($sel["qualifications_enterprise"]); ?>" required="required"/></td>
      </tr>
      <tr>
        <th>资质名称</th>
        <td><input type="text" class="textbox textbox_295" placeholder="资质名称" name="qualifications_aptitude" value="<?php echo ($sel["qualifications_aptitude"]); ?>" required="required"/></td>
        <th>本次到账日期</th>
        <td><input type="text" class="textbox textbox_295" placeholder="资金到账的年月日时分" name="qualifications_arrival" value="<?php echo ($sel["qualifications_arrival"]); ?>" required="required"/></td>
      </tr>
      <tr>
        <th>合同价格</th>
        <td><input type="text" class="textbox textbox_295" placeholder="按照合同价格" name="qualifications_contract" value="<?php echo ($sel["qualifications_contract"]); ?>" required="required"/></td>
        <th>已到账金额</th>
        <td><input type="text" class="textbox textbox_295" placeholder="已经到账的金额" name="qualifications_money" value="<?php echo ($sel["qualifications_money"]); ?>" required="required"/></td>
      </tr>
      <tr>
        <th>到账账户</th>
        <td><input type="text" class="textbox textbox_295" placeholder="到账的账户" name="qualifications_account" value="<?php echo ($sel["qualifications_account"]); ?>" required="required"/></td>
        <th>本次到账金额</th>
        <td><input type="text" class="textbox textbox_295" placeholder="人民币（大写） ￥全款  预付款 尾款 介绍费" name="qualifications_bmoney" value="<?php echo ($sel["qualifications_bmoney"]); ?>" required="required"/></td>
      </tr>
      <tr>
        <th>公关费</th>
        <td><input type="text" class="textbox textbox_295" placeholder="公关费" name="qualifications_relations" value="<?php echo ($sel["qualifications_relations"]); ?>" required="required"/></td>
        <th>备注</th>
        <td><input type="text" class="textbox textbox_295" placeholder="说明" name="qualifications_remarks" value="<?php echo ($sel["qualifications_remarks"]); ?>" required="required"/></td>
      </tr>
        <!-- <li>
        <span class="item_name" style="width:120px;">日期：</span>
        <input type="text" class="textbox textbox_295" placeholder="到账的年月日" name="qualifications_date" value="<?php echo ($sel["qualifications_date"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">市场部客服：</span>
        <input type="text" class="textbox textbox_295" placeholder="市场部客服公司内部人员可选" name="qualifications_customer" value="<?php echo ($sel["qualifications_customer"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">申请人：</span>
        <input type="text" class="textbox textbox_295" placeholder="申请人联系方式" name="qualifications_applicant" value="<?php echo ($sel["qualifications_applicant"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">企业名称：</span>
        <input type="text" class="textbox textbox_295" placeholder="公司名称" name="qualifications_enterprise" value="<?php echo ($sel["qualifications_enterprise"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">资质名称：</span>
        <input type="text" class="textbox textbox_295" placeholder="资质名称" name="qualifications_aptitude" value="<?php echo ($sel["qualifications_aptitude"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">本次到账日期：</span>
        <input type="text" class="textbox textbox_295" placeholder="资金到账的年月日时分" name="qualifications_arrival" value="<?php echo ($sel["qualifications_arrival"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">合同价格：</span>
        <input type="text" class="textbox textbox_295" placeholder="按照合同价格" name="qualifications_contract" value="<?php echo ($sel["qualifications_contract"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">已到账金额：</span>
        <input type="text" class="textbox textbox_295" placeholder="已经到账的金额" name="qualifications_money" value="<?php echo ($sel["qualifications_money"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">到账账户：</span>
        <input type="text" class="textbox textbox_295" placeholder="到账的账户" name="qualifications_account" value="<?php echo ($sel["qualifications_account"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">本次到账金额：</span>
        <input type="text" class="textbox textbox_295" placeholder="人民币（大写） ￥全款  预付款 尾款 介绍费" name="qualifications_bmoney" value="<?php echo ($sel["qualifications_bmoney"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">公关费：</span>
        <input type="text" class="textbox textbox_295" placeholder="公关费" name="qualifications_relations" value="<?php echo ($sel["qualifications_relations"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">备注：</span>
        <textarea type="text" class="textbox textbox_295" placeholder="说明" name="qualifications_remarks" value="<?php echo ($sel["qualifications_remarks"]); ?>"/></textarea>
       </li> -->
       </table>
      <input type="hidden" name='id' value="<?php echo ($sel["id"]); ?>"/>
       <li>
        <span class="item_name" style="width:120px;"></span>
        <input name="id" type="hidden" value="<?php echo ($sel["id"]); ?>" />
        <input type="submit" class="link_btn" name="sub"/>
       </li>
      </ul>
      </form>
     </section>
 </div>
</section>
</body>
</html>