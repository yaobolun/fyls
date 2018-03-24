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
    <h1 class="layui-colla-title">审批管理</h1>
    <div class="layui-colla-content">
         <dd><a class="dd" href="/fyls/admin.php/Approval/leave">请假管理</a></dd>
         <dd><a class="dd" href="/fyls/admin.php/Permission/travel">外出管理</a></dd>
         <dd><a class="dd" href="/fyls/admin.php/Expre/express">快递管理</a></dd>
    </div>
  </div>
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
    <h1 class="layui-colla-title">请假 | 外出</h1>
    <div class="layui-colla-content">
      <dd><a class="dd" href="/fyls/admin.php/Leave/leave_list">我的请假</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Travel/travel_list">我的外出</a></dd>
    </div>
  </div>
  <div class="layui-colla-item">
    <h1 class="layui-colla-title">快递信息</h1>
    <div class="layui-colla-content">
      <dd><a class="dd" href="/fyls/admin.php/Expre/expre_index">快递列表</a></dd>
    </div>
  </div>
  <div class="layui-colla-item">
    <h1 class="layui-colla-title">网站栏目管理</h1>
    <div class="layui-colla-content">
      <dd><a class="dd" href="/fyls/admin.php/Lanmu/lanmu">栏目名称及图标</a></dd>
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
      <dd><a class="dd" href="/fyls/admin.php/Authority/authority">权限管理</a></dd>
      <dd><a class="dd" href="/fyls/admin.php/Journal/journal">日志管理</a></dd>
    </div>
  </div>
</div>
 <!-- <ul>
 <li>
   <dl>
    <dt>审批管理</dt>
    <dd><a class="dd" href="/fyls/admin.php/Approval/leave">请假管理</a></dd>
    <dd><a class="dd" href="/fyls/admin.php/Permission/travel">外出管理</a></dd>
    </dl>
  </li>
  <li>
   <dl>
    <dt>财务管理</dt>
    <dd><a class="dd" href="/fyls/admin.php/Transfer/transfer">转账申请列表</a></dd>
    <dd><a class="dd" href="/fyls/admin.php/Arrival/arrival">到账申请列表</a></dd>
    <dd><a class="dd" href="/fyls/admin.php/Qualifications/qualifications">资质凭证到账凭证申请列表</a></dd>
    <dd><a class="dd" href="/fyls/admin.php/Refund/refund">退款企业凭证申请列表</a></dd>
    <dd><a class="dd" href="/fyls/admin.php/Voucher/voucher">退款人才凭证申请列表</a></dd>
    </dl>
  </li>

  <li>
   <dl>
    <dt> 请假 | 外出 </dt>
    <dd><a class="dd" href="/fyls/admin.php/Leave/leave_list">我的请假</a></dd>
    <dd><a class="dd" href="/fyls/admin.php/Travel/travel_list">我的外出</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>快递信息</dt>
    <dd><a class="dd" href="/fyls/admin.php/Express/express">快递列表</a></dd>
   </dl>
  </li>
   <dl>
    <dt>网站栏目管理</dt>
    <dd><a class="dd" href="/fyls/admin.php/Lanmu/lanmu">栏目名称及图标</a></dd>
   </dl>
   <li>
   <dl>
    <dt>后台登录设置</dt>
    <dd><a class="dd" href="/fyls/admin.php/Parameter/parameter">参数</a></dd>
    <dd><a class="dd" href="/fyls/admin.php/Admin/admin">管理员</a></dd>
    <dd><a class="dd" href="/fyls/admin.php/Department/department">部门管理</a></dd>
    <dd><a class="dd" href="/fyls/admin.php/Station/station">岗位管理</a></dd>
    <dd><a class="dd" href="/fyls/admin.php/People/people">人员管理</a></dd>
    <dd><a class="dd" href="/fyls/admin.php/Authority/authority">权限管理</a></dd>
    <dd><a class="dd" href="/fyls/admin.php/Journal/journal">日志管理</a></dd>
   </dl>
  </li>
  <li>
   <p class="btm_infor">© 小牛在线 技术支持</p>
  </li>
 </ul> -->
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
       <h2 class="fl">快递申请</h2>
       <a class="fr top_rt_btn" href="/fyls/Admin/Expre/expre_index">返回</a>
      </div>
     <section>
     <form action="/fyls/Admin/Expre/doadd_expre" method="post">
      <ul class="ulColumn2">
      <li>
        <span class="item_name" style="width:120px;">寄件人：</span>
        <input type="text" required="required" class="textbox textbox_295" name="name" placeholder="寄件人" name="goods" />
       </li>
       <li>
        <span class="item_name" style="width:120px;">收件人：</span>
        <input type="text" required="required" class="textbox textbox_295" placeholder="收件人" name="addressee" />
       </li>
       <li>
        <span class="item_name" style="width:120px;">电话：</span>
        <input type="text" required="required" class="textbox textbox_295" placeholder="收件人电话" name="tel" />
       </li>
       <li>
        <span class="item_name" style="width:120px;">快递物品：</span>
        <input type="text" required="required" class="textbox textbox_295" placeholder="快递物品" name="goods" />
       </li>
       <li>
        <span class="item_name" style="width:120px;">快递地址：</span>
        <input type="text" required="required" class="textbox textbox_295" placeholder="快递地址" name="address" />
       </li>
       <li>
        <span class="item_name" style="width:120px;">备注：</span>
        <textarea name="remarks" placeholder="请填写备注，比如轻拿轻放。" class="textbox textbox_295" style="height: 60px"></textarea>
       </li>
        <input type="hidden" name="uid" value="<?php echo (session('id')); ?>">
        <input type="hidden" name="bm_id" value="<?php echo (session('department_id')); ?>">
       <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="submit" class="link_btn"/>
       </li>
      </ul>
      </form>
     </section>
 </div>
</section>
 <script src="/fyls/Public/admin/js/jquery.js"></script>

</body>
</html>