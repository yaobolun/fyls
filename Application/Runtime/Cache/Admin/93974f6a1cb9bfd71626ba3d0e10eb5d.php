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
<<<<<<< HEAD
<div class="layui-collapse" lay-filter="test">
  <div class="layui-colla-item">
    <h2 class="layui-colla-title">审批管理</h2>
    <div class="layui-colla-content">
     <dd><a href="/fyls/admin.php/Approval/leave">请假管理</a></dd>
    <dd><a href="/fyls/admin.php/Permission/travel">外出管理</a></dd>
    </div>
  </div>
  <div class="layui-colla-item">
    <h2 class="layui-colla-title">为什么前端工程师多不愿意用 Bootstrap 框架？</h2>
    <div class="layui-colla-content">
      <p>因为不适合。如果希望开发长期的项目或者制作产品类网站，那么就需要实现特定的设计，为了在维护项目中可以方便地按设计师要求快速修改样式，肯定会逐步编写出各种业务组件、工具类，相当于为项目自行开发一套框架。——来自知乎@Kayo</p>
    </div>
  </div>
  <div class="layui-colla-item">
    <h2 class="layui-colla-title">layui 更适合哪些开发者？</h2>
    <div class="layui-colla-content">
      <p>在前端技术快速变革的今天，layui 仍然坚持语义化的组织模式，甚至于模块理念都是采用类AMD组织形式，并非是有意与时代背道而驰。layui 认为以jQuery为核心的开发方式还没有到完全消亡的时候，而早期市面上基于jQuery的UI都普通做得差强人意，所以需要有一个新的UI去重新为这一领域注入活力，并采用一些更科学的架构方式。
      <br><br>
      因此准确地说，layui 更多是面向那些追求开发简单的前端工程师们，以及所有层次的服务端程序员。</p>
    </div>
  </div>
  <div class="layui-colla-item">
    <h2 class="layui-colla-title">贤心是男是女？</h2>
    <div class="layui-colla-content">
      <p>man！ 所以这个问题不要再出现了。。。</p>
    </div>
  </div>
</div>
 <ul>
=======
 <uhl>
>>>>>>> origin/liushuai
 <li>
   <dl>
    <dt>审批管理</dt>
    <dd><a href="/fyls/admin.php/Approval/leave">请假管理</a></dd>
    <dd><a href="/fyls/admin.php/Permission/travel">外出管理</a></dd>
<<<<<<< HEAD
=======
    <dd><a href="/fyls/admin.php/Texamination/texamination">转账管理</a></dd>
<<<<<<< HEAD
>>>>>>> origin/liushuai
=======
    <dd><a href="/fyls/admin.php/Aexamination/aexamination">到账管理</a></dd>
    <dd><a href="/fyls/admin.php/Qexamination/qexamination">资质凭证到账凭证管理</a></dd>
    <dd><a href="/fyls/admin.php/Rexamination/rexamination">退款企业凭证管理</a></dd>
    <dd><a href="/fyls/admin.php/Vexamination/vexamination">退款人才凭证管理</a></dd>
>>>>>>> origin/liushuai
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
<<<<<<< HEAD
<script>
layui.use(['element', 'layer'], function(){
  var element = layui.element;
  var layer = layui.layer;
});
</script>
=======
>>>>>>> origin/liushuai
<style type="text/css">
.b{    
    overflow: hidden;  
    text-overflow: ellipsis;  
    white-space: nowrap;  
    cursor: pointer;  
}  
</style>
<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">转账申请列表</h2>
       <a href="/fyls/Admin/Transfer/transfer_add" class="fr top_rt_btn add_icon">添加转账申请</a>
      </div>
      <table class="table">
        <tr>
        <th>申请人</th>
        <th>人才合同价格</th>
        <th>配置企业价格</th>
        <th>证书类别</th>
        <th>配置企业</th>
        <th>审批状态</th>
        <th>操作</th>
       </tr>
       <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><tr>
        <td class="center b" title="<?php echo ($arr["transfer_name"]); ?>"><?php echo ($arr["transfer_name"]); ?></td>
        <td class="center b" title="<?php echo ($arr["transfer_contract"]); ?>"><?php echo ($arr["transfer_contract"]); ?></td>
        <td class="center b" title="<?php echo ($arr["transfer_allocation"]); ?>"><?php echo ($arr["transfer_allocation"]); ?></td>
        <td class="center b" title="<?php echo ($arr["transfer_certificate"]); ?>"><?php echo ($arr["transfer_certificate"]); ?></td>
        <td class="center b" title="<?php echo ($arr["transfer_configuration"]); ?>"><?php echo ($arr["transfer_configuration"]); ?></td>
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
        <a href="/fyls/Admin/Transfer/transfer_mod?id=<?php echo ($arr["id"]); ?>" title="编辑" class="link_icon">&#101;</a><?php endif; ?>
        <?php if($arr["status"] == 1): ?><a disabled="disabled" onclick="sp();" class="link_icon">&#100;</a>
        <?php else: ?>
        <a href="/fyls/Admin/Transfer/del?id=<?php echo ($arr["id"]); ?>" title="删除" class="link_icon">&#100;</a>
        <a href="/fyls/Admin/Transfer/info?id=<?php echo ($arr["id"]); ?>" title="详细信息">详细信息</a><?php endif; ?>
       </td>
       </tr><?php endforeach; endif; else: echo "" ;endif; ?>
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