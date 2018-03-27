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
<style type="text/css">
.f{   
    width: 500px;  
    height: 15px;  
    overflow: hidden;  
    text-overflow: ellipsis;  
    white-space: nowrap;  
    cursor: pointer;  
}  
</style>
<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">资质凭证到账凭证申请详细信息</h2>
       <?php
 $a = explode('=',$_SERVER['QUERY_STRING']); ?>
       <a href="/fyls/Admin/Qualifications/qualifications" class="fr top_rt_btn add_icon">返回资质凭证到账凭证申请列表</a>
       <a href="/fyls/Admin/Qualifications/qualifications_mod?id=<?php echo ($a[1]); ?>" class="fr top_rt_btn add_icon">编辑</a>
      </div>
      <table class="table">
      <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><tr>
        <th>日期</th>
        <td class="center f" title="<?php echo ($arr["qualifications_date"]); ?>"><?php echo ($arr["qualifications_date"]); ?></td>
        <th>市场部客服</th>
        <td class="center f" title="<?php echo ($arr["qualifications_customer"]); ?>"><?php echo ($arr["qualifications_customer"]); ?></td>
        </tr>
        <tr>
        <th>申请人</th>
        <td class="center f" title="<?php echo ($arr["qualifications_applicant"]); ?>"><?php echo ($arr["qualifications_applicant"]); ?></td>
        <th>企业名称</th>
        <td class="center f" title="<?php echo ($arr["qualifications_enterprise"]); ?>"><?php echo ($arr["qualifications_enterprise"]); ?></td>
        </tr>
        <tr>
        <th>资质名称</th>
        <td class="center f" title="<?php echo ($arr["qualifications_aptitude"]); ?>"><?php echo ($arr["qualifications_aptitude"]); ?></td>
        <th>本次到账日期</th>
        <td class="center f" title="<?php echo ($arr["qualifications_arrival"]); ?>"><?php echo ($arr["qualifications_arrival"]); ?></td>
        </tr>
        <tr>
        <th>合同价格</th>
        <td class="center f" title="<?php echo ($arr["qualifications_contract"]); ?>"><?php echo ($arr["qualifications_contract"]); ?></td>
        <th>已到账金额</th>
        <td class="center f" title="<?php echo ($arr["qualifications_money"]); ?>"><?php echo ($arr["qualifications_money"]); ?></td>
        </tr>
        <tr>
        <th>到账账户</th>
        <td class="center f" title="<?php echo ($arr["qualifications_account"]); ?>"><?php echo ($arr["qualifications_account"]); ?></td>
        <th>本次到账金额</th>
        <td class="center f" title="<?php echo ($arr["qualifications_bmoney"]); ?>"><?php echo ($arr["qualifications_bmoney"]); ?></td>
        </tr>
        <tr>
        <th>公关费</th>
        <td class="center f" title="<?php echo ($arr["qualifications_relations"]); ?>"><?php echo ($arr["qualifications_relations"]); ?></td>
        <th>备注</th>
        <td class="center f" title="<?php echo ($arr["qualifications_remarks"]); ?>"><?php echo ($arr["qualifications_remarks"]); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      </table>
      <aside class="paging">
      <?php echo ($page); ?>
      </aside>
 </div>
</section>
</body>
</html>