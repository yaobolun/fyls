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
    <dd><a href="/fyls/admin.php/Aexamination/aexamination">到账管理</a></dd>
    <dd><a href="/fyls/admin.php/Qexamination/qexamination">资质凭证到账凭证管理</a></dd>
    <dd><a href="/fyls/admin.php/Rexamination/rexamination">退款企业凭证管理</a></dd>
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
       <h2 class="fl">修改退款凭证申请信息</h2>
       <a href="/fyls/Admin/Refund/refund" class="fr top_rt_btn add_icon">返回退款凭证申请列表</a>
      </div>
     <section>
     <form action="" method="post"  enctype="multipart/form-data">
      <ul class="ulColumn2">
      <table class="table">
      <tr>
        <th>申请人</th>
        <td><input type="text" class="textbox textbox_295" placeholder="退款申请人姓名" name="refund_applicant" value="<?php echo ($sel["refund_applicant"]); ?>"/></td>
        <th>配出年月</th>
        <td>
        <div class="layui-input-inline">
        <input type="text" class="textbox textbox_295" id="test5" placeholder="现金的年月日" name="refund_match" value="<?php echo ($sel["refund_match"]); ?>" required="required"/>
          </div>
          </td>
      </tr>
      <tr>
        <th>配备企业</th>
        <td><input type="text" class="textbox textbox_295" placeholder="公司名称" name="refund_equip" value="<?php echo ($sel["refund_equip"]); ?>"/></td>
        <th>合同价格</th>
        <td><input type="text" class="textbox textbox_295" placeholder="合同上的价格" name="refund_contract" value="<?php echo ($sel["refund_contract"]); ?>"/></td>
      </tr>
      <tr>
        <th>备注</th>
        <td><input type="text" class="textbox textbox_295" placeholder="说明" name="refund_remarks" value="<?php echo ($sel["refund_remarks"]); ?>"/></td>
        <th>已到账金额</th>
        <td><input type="text" class="textbox textbox_295" placeholder="人民币（大写） ￥全款  预付款 尾款 介绍费" name="refund_account" value="<?php echo ($sel["refund_account"]); ?>"/>></td>
      </tr>
      <tr>
        <th>户名</th>
        <td><input type="text" class="textbox textbox_295" placeholder="收款人姓名" name="refund_name" value="<?php echo ($sel["refund_name"]); ?>"/></td>
        <th>本次打款金额</th>
        <td><input type="text" class="textbox textbox_295" placeholder="人民币（大写） ￥全款  预付款 尾款 介绍费" name="refund_money" value="<?php echo ($sel["refund_money"]); ?>"/></td>
      </tr>
      <tr>
        <th>开户行</th>
        <td><input type="text" class="textbox textbox_295" placeholder="开户的所在银行" name="refund_bank" value="<?php echo ($sel["refund_bank"]); ?>"/></td>
        <th>账号</th>
        <td><input type="text" class="textbox textbox_295" placeholder="开户时的账户号" name="refund_number" value="<?php echo ($sel["refund_number"]); ?>"/></td>
      </tr>
        <!-- <li>
        <span class="item_name" style="width:120px;">申请人：</span>
        <input type="text" class="textbox textbox_295" placeholder="退款申请人姓名" name="refund_applicant" value="<?php echo ($sel["refund_applicant"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">配出年月：</span>
        <input type="text" class="textbox textbox_295" placeholder="现金的年月日" name="refund_match" value="<?php echo ($sel["refund_match"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">配备企业：</span>
        <input type="text" class="textbox textbox_295" placeholder="公司名称" name="refund_equip" value="<?php echo ($sel["refund_equip"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">合同价格：</span>
        <input type="text" class="textbox textbox_295" placeholder="合同上的价格" name="refund_contract" value="<?php echo ($sel["refund_contract"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">备注：</span>
        <textarea type="text" class="textbox textbox_295" placeholder="说明" name="refund_remarks" value="<?php echo ($sel["refund_remarks"]); ?>"/></textarea>
       </li>
       <li>
        <span class="item_name" style="width:120px;">已到账金额：</span>
        <input type="text" class="textbox textbox_295" placeholder="人民币（大写） ￥全款  预付款 尾款 介绍费" name="refund_account" value="<?php echo ($sel["refund_account"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">户名：</span>
        <input type="text" class="textbox textbox_295" placeholder="收款人姓名" name="refund_name" value="<?php echo ($sel["refund_name"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">本次打款金额：</span>
        <input type="text" class="textbox textbox_295" placeholder="人民币（大写） ￥全款  预付款 尾款 介绍费" name="refund_money" value="<?php echo ($sel["refund_money"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">开户行：</span>
        <input type="text" class="textbox textbox_295" placeholder="开户的所在银行" name="refund_bank" value="<?php echo ($sel["refund_bank"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">账号：</span>
        <input type="text" class="textbox textbox_295" placeholder="开户时的账户号" name="refund_number" value="<?php echo ($sel["refund_number"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">企业价格：</span>
        <input type="text" class="textbox textbox_295" placeholder="企业注册资金" name="refund_enterprise" value="<?php echo ($sel["refund_enterprise"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">签约年限：</span>
        <input type="text" class="textbox textbox_295" placeholder="申请人与公司签约年份" name="refund_contractyears" value="<?php echo ($sel["refund_contractyears"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">配备人才：</span>
        <input type="text" class="textbox textbox_295" placeholder="本人" name="refund_qualified" value="<?php echo ($sel["refund_qualified"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">级别：</span>
        <input type="text" class="textbox textbox_295" placeholder="级别" name="refund_level" value="<?php echo ($sel["refund_level"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">专业：</span>
        <input type="text" class="textbox textbox_295" placeholder="专业" name="refund_major" value="<?php echo ($sel["refund_major"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">人才价格：</span>
        <input type="text" class="textbox textbox_295" placeholder="人才价格" name="refund_talent" value="<?php echo ($sel["refund_talent"]); ?>"/>
       </li>
       <li>
        <span class="item_name" style="width:120px;">客服：</span>
        <input type="text" class="textbox textbox_295" placeholder="客服" name="refund_customer" value="<?php echo ($sel["refund_customer"]); ?>"/>
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