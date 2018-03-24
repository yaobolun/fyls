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
<header>
 <h1><img src="/fyls/Public/admin/images/admin_logo.png"/></h1>
 <ul class="rt_nav">
  <li><a href="/fyls/admin.php/Personal/personal" class="website_icon"><?php echo (session('name')); ?> </a></li>
  <li><a href="/fyls/admin.php/Index/tc" class="quit_icon">安全退出</a></li>
 </ul>
</header>
<aside class="lt_aside_nav content mCustomScrollbar">
 <uhl>
 <li>
   <dl>
    <dt>审批管理</dt>
    <dd><a href="/fyls/admin.php/Approval/leave">请假管理</a></dd>
    <dd><a href="/fyls/admin.php/Permission/travel">外出管理</a></dd>
    <dd><a href="/fyls/admin.php/Texamination/texamination">转账管理</a></dd>
    </dl>
  </li>
  <li>
   <dl>
    <dt>财务管理</dt>
    <dd><a href="/fyls/admin.php/Transfer/transfer">转账申请列表</a></dd>
    <dd><a href="/fyls/admin.php/Arrival/arrival">到账申请列表</a></dd>
    <dd><a href="/fyls/admin.php/Qualifications/qualifications">资质凭证到账凭证申请列表</a></dd>
    <dd><a href="/fyls/admin.php/Refund/refund">退款企业凭证申请列表</a></dd>
    <dd><a href="/fyls/admin.php/Voucher/voucher">退款人才凭证申请列表</a></dd>
    </dl>
  </li>
  <li>
   <dl>
   </dl>
  </li>
  <li>
   <dl>
    <dt> 请假 | 外出 </dt>
    <dd><a href="/fyls/admin.php/Leave/leave_list">我的请假</a></dd>
    <dd><a href="/fyls/admin.php/Travel/travel_list">我的外出</a></dd>
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
   <li>
   <dl>
    <dt>后台登录设置</dt>
    <dd><a href="/fyls/admin.php/Parameter/parameter">参数</a></dd>
    <dd><a href="/fyls/admin.php/Admin/admin">管理员</a></dd>
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

<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">退款人才凭证申请添加</h2>
       <a href="/fyls/Admin/Voucher/voucher" class="fr top_rt_btn add_icon">返回退款人才凭证申请列表</a>
      </div>
     <section>
     <form action="" method="post" enctype="multipart/form-data">
      <ul class="ulColumn2">
      <table class="table">
      <tr>
        <th>申请人</th>
        <td><input type="text" class="textbox textbox_295" placeholder="申请人姓名填写" name="voucher_applicant" required="required"/></td>
        <th>本次到账日期</th>
        <td><input type="text" class="textbox textbox_295" placeholder="本次到账日期" name="voucher_account" required="required"/></td>
      </tr>
      <tr>
        <th>配备企业</th>
        <td><input type="text" class="textbox textbox_295" placeholder="配备企业" name="voucher_equip" required="required"/></td>
        <th>合同价格</th>
        <td><input type="text" class="textbox textbox_295" placeholder="合同价格" name="voucher_contract" required="required"/></td>
      </tr>
      <tr>
        <th>到账金额</th>
        <td><input type="text" class="textbox textbox_295" placeholder="人民币（大写)￥全款 预付款 尾款 服务费" name="voucher_amount" required="required"/></td>
        <th>到账账户</th>
        <td><input type="text" class="textbox textbox_295" placeholder="到账账户" name="voucher_acc" required="required"/></td>
      </tr>
      <tr>
        <th>本次到账金额</th>
        <td><input type="text" class="textbox textbox_295" placeholder="人民币（大写)￥全款 预付款 尾款 服务费" name="voucher_this" required="required"/></td>
        <th>备注</th>
        <td><input type="text" class="textbox textbox_295" placeholder="备注" name="voucher_remarks" required="required"/></input></td>
      </tr>
       <!-- <li>
        <span class="item_name" style="width:120px;">申请人：</span>
        <input type="text" class="textbox textbox_295" placeholder="申请人姓名填写" name="voucher_applicant" required="required"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">本次到账日期：</span>
        <input type="text" class="textbox textbox_295" placeholder="本次到账日期" name="voucher_account" required="required"/>
       </li><li>
        <span class="item_name" style="width:120px;">配备企业：</span>
        <input type="text" class="textbox textbox_295" placeholder="配备企业" name="voucher_equip" required="required"/>
       </li><li>
        <span class="item_name" style="width:120px;">合同价格：</span>
        <input type="text" class="textbox textbox_295" placeholder="合同价格" name="voucher_contract" required="required"/>
       </li><li>
        <span class="item_name" style="width:120px;">到账金额：</span>
        <input type="text" class="textbox textbox_295" placeholder="人民币（大写)￥全款 预付款 尾款 服务费" name="voucher_amount" required="required"/>
       </li><li>
        <span class="item_name" style="width:120px;">到账账户：</span>
        <input type="text" class="textbox textbox_295" placeholder="到账账户" name="voucher_acc" required="required"/>
       </li><li>
        <span class="item_name" style="width:120px;">本次到账金额：</span>
        <input type="text" class="textbox textbox_295" placeholder="人民币（大写)￥全款 预付款 尾款 服务费" name="voucher_this" required="required"/>
       </li><li>
        <span class="item_name" style="width:120px;">备注：</span>
        <textarea type="text" class="textbox textbox_295" placeholder="备注" name="voucher_remarks" required="required"/></textarea>
       </li> -->
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

</body>
</html>